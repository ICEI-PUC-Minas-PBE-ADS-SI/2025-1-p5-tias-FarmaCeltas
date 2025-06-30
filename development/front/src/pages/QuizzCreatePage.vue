<template>
  <div class="create-quiz-wrapper">
    <div class="create-quiz-box">
      <h1>Criar Novo Quiz</h1>
      <form @submit.prevent="submitQuiz">
        <div class="form-group">
          <label for="title">Título do Quiz</label>
          <input id="title" v-model="title" type="text" required placeholder="Digite o título do quiz" />
        </div>
        <div class="form-group">
          <label for="theme">Tema/Descrição</label>
          <input id="theme" v-model="theme" type="text" required placeholder="Digite o tema ou descrição" />
        </div>
        <div class="form-group">
          <label for="difficulty">Dificuldade</label>
          <select id="difficulty" v-model="difficulty" required>
            <option value="">Selecione</option>
            <option value="fácil">Fácil</option>
            <option value="médio">Médio</option>
            <option value="difícil">Difícil</option>
          </select>
        </div>

        <div class="questions-section">
          <h2>Perguntas</h2>
          <div v-for="(question, qIdx) in questions" :key="qIdx" class="question-block">
            <div class="form-group">
              <label>Enunciado da Pergunta {{ qIdx + 1 }}</label>
              <textarea v-model="question.statement" required placeholder="Digite o enunciado da pergunta"></textarea>
            </div>
            <div class="alternatives-group">
              <div v-for="(alt, aIdx) in question.options" :key="aIdx" class="alternative-item">
                <label class="custom-radio-label">
                  <input
                    type="radio"
                    :name="`correct_${qIdx}`"
                    :checked="question.correctIndex === aIdx"
                    @change="setCorrectAlternative(qIdx, aIdx)"
                    required
                  />
                  <span class="custom-radio"></span>
                </label>
                <input
                  v-model="question.options[aIdx]"
                  type="text"
                  :placeholder="`Alternativa ${String.fromCharCode(65 + aIdx)}`"
                  required
                  class="alternative-input"
                />
                <span v-if="question.correctIndex === aIdx" class="correct-label">✔ Correta</span>
              </div>
            </div>
            <button type="button" class="remove-question-btn" @click="removeQuestion(qIdx)" v-if="questions.length > 1">Remover Pergunta</button>
          </div>
          <button type="button" class="add-question-btn" @click="addQuestion">+ Adicionar Pergunta</button>
        </div>

        <button type="submit" class="submit-btn" :disabled="loading">
          {{ loading ? 'Criando...' : 'Criar Quiz' }}
        </button>
        <p v-if="error" class="error-msg">{{ error }}</p>
        <p v-if="success" class="success-msg">Quiz criado com sucesso!</p>
      </form>
      <button class="back-btn" @click="goBack">Voltar</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import api from '../api/axios'
import { useRouter } from 'vue-router'

const title = ref('')
const theme = ref('')
const difficulty = ref('')
const loading = ref(false)
const error = ref('')
const success = ref(false)
const router = useRouter()

const questions = ref([
  {
    statement: '',
    options: ['', '', '', ''],
    correctIndex: 0,
  },
])

const addQuestion = () => {
  questions.value.push({
    statement: '',
    options: ['', '', '', ''],
    correctIndex: 0,
  })
}

const removeQuestion = (idx) => {
  questions.value.splice(idx, 1)
}

const setCorrectAlternative = (qIdx, aIdx) => {
  questions.value[qIdx].correctIndex = aIdx
}

const submitQuiz = async () => {
  error.value = ''
  success.value = false
  loading.value = true
  try {
    // Monta o payload para o backend
    const quizPayload = {
      title: title.value,
      theme: theme.value,
      difficulty: difficulty.value,
      questions: questions.value.map(q => ({
        statement: q.statement,
        options: q.options,
        correct_index: q.correctIndex,
      })),
    }
    await api.post('/quizzes', quizPayload)
    success.value = true
    setTimeout(() => {
      router.push('/quizz-list')
    }, 1200)
  } catch (err) {
    error.value = err.response?.data?.error || 'Erro ao criar quiz.'
  } finally {
    loading.value = false
  }
}

const goBack = () => {
  router.push('/quizz-list')
}
</script>

<style scoped>
.create-quiz-wrapper {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: 100vh;
  background: linear-gradient(135deg, #e8fce8 0%, #c6f7e2 100%);
  padding: 2rem;
}

.create-quiz-box {
  background: #fff;
  padding: 2.5rem 2.5rem 2rem 2.5rem;
  border-radius: 22px;
  box-shadow: 0 4px 24px rgba(0, 230, 0, 0.10);
  width: 100%;
  max-width: 700px;
  margin-top: 2rem;
  text-align: center;
}

h1 {
  font-size: 2rem;
  font-weight: bold;
  color: #1a3d1a;
  margin-bottom: 2.5rem;
}

.form-group {
  margin-bottom: 2rem;
  text-align: left;
}

label {
  display: block;
  font-weight: 600;
  color: #009900;
  margin-bottom: 0.5rem;
}

input, select, textarea {
  width: 100%;
  padding: 0.8rem;
  border: 2px solid #c8f0d2;
  border-radius: 8px;
  font-size: 1rem;
  outline: none;
  transition: border 0.2s;
  background: #f9fff9;
  margin-bottom: 0.5rem;
}

input:focus, select:focus, textarea:focus {
  border-color: #00e600;
}

.questions-section {
  background: #f9f9f9;
  border-radius: 16px;
  padding: 2rem 1.5rem;
  margin-bottom: 2.5rem;
  margin-top: 2.5rem;
  text-align: left;
}

.questions-section h2 {
  color: #009900;
  font-size: 1.3rem;
  margin-bottom: 1.5rem;
  font-weight: 700;
}

.question-block {
  background: #fff;
  border: 2px solid #c8f0d2;
  border-radius: 12px;
  padding: 1.5rem 1rem;
  margin-bottom: 2rem;
  box-shadow: 0 2px 8px rgba(0,230,0,0.04);
}

.alternatives-group {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-top: 1rem;
}

.alternative-item {
  display: flex;
  align-items: center;
  gap: 1rem;
  width: 100%;
}

.custom-radio-label {
  display: flex;
  align-items: center;
  cursor: pointer;
}

.custom-radio-label input[type="radio"] {
  display: none;
}

.custom-radio {
  width: 22px;
  height: 22px;
  border: 2px solid #00e600;
  border-radius: 50%;
  background: #fff;
  display: inline-block;
  position: relative;
  transition: border 0.2s;
}

.custom-radio-label input[type="radio"]:checked + .custom-radio {
  border: 2.5px solid #00b300;
  background: linear-gradient(135deg, #b6fcb6 0%, #00e600 100%);
}

.custom-radio-label input[type="radio"]:checked + .custom-radio::after {
  content: '';
  display: block;
  width: 10px;
  height: 10px;
  background: #00b300;
  border-radius: 50%;
  position: absolute;
  top: 4px;
  left: 4px;
}

.alternative-input {
  flex: 1;
  margin-left: 0;
  margin-right: 0;
}

.correct-label {
  color: #00b300;
  font-weight: 700;
  margin-left: 1rem;
  font-size: 1rem;
  background: #e6ffe6;
  border-radius: 8px;
  padding: 0.2rem 0.7rem;
  box-shadow: 0 1px 4px #b6fcb6;
  display: flex;
  align-items: center;
  gap: 0.3rem;
}

.add-question-btn {
  display: block;
  margin: 0 auto 0 0;
  background: linear-gradient(90deg, #00e600 0%, #b6fcb6 100%);
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  padding: 0.7rem 2rem;
  font-size: 1rem;
  cursor: pointer;
  box-shadow: 0 2px 8px rgba(0,230,0,0.07);
  transition: background 0.2s, transform 0.2s;
}
.add-question-btn:hover {
  background: linear-gradient(90deg, #00b300 0%, #e6ffe6 100%);
  transform: translateY(-2px) scale(1.04);
}

.remove-question-btn {
  background: #ff4444;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 0.5rem 1.2rem;
  font-size: 0.95rem;
  font-weight: 600;
  cursor: pointer;
  margin-top: 1rem;
  transition: background 0.2s;
}
.remove-question-btn:hover {
  background: #cc0000;
}

.submit-btn {
  width: 100%;
  background: linear-gradient(90deg, #00e600 0%, #b6fcb6 100%);
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  padding: 1rem;
  font-size: 1.2rem;
  cursor: pointer;
  margin-top: 1.5rem;
  transition: background 0.2s, transform 0.2s;
}
.submit-btn:hover {
  background: linear-gradient(90deg, #00b300 0%, #e6ffe6 100%);
  transform: translateY(-2px) scale(1.03);
}

.error-msg {
  color: #cc0000;
  margin-top: 1rem;
  font-weight: 600;
}
.success-msg {
  color: #009900;
  margin-top: 1rem;
  font-weight: 600;
}

.back-btn {
  margin-top: 2rem;
  background: #f0f0f0;
  color: #222;
  border: none;
  border-radius: 8px;
  padding: 0.7rem 2rem;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s;
}
.back-btn:hover {
  background: #e0e0e0;
}
</style> 