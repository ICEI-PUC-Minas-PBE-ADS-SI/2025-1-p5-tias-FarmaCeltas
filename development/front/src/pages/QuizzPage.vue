<template>
  <div class="quiz-page">
    <h1 class="title">{{ quiz.title }}</h1>

    <div v-if="!submitted">
      <div v-for="(q, index) in quiz.questions" :key="q.id" class="question-box">
        <p><strong>{{ index + 1 }}.</strong> {{ q.exercise_statement }}</p>

        <div v-for="option in q.options" :key="option" class="option-item">
          <label>
            <input
                type="radio"
                :name="`question_${q.id}`"
                :value="option"
                v-model="answers[q.id]"
            />
            {{ option }}
          </label>
        </div>
      </div>

      <button @click="submitAnswers" class="submit-btn">Enviar Respostas</button>
    </div>

    <div v-else>
      <h2 class="result">Você acertou {{ result.score }} de {{ result.total_questions }}</h2>

      <div v-for="(r, index) in result.results" :key="index" class="feedback-box">
        <p><strong>{{ index + 1 }}.</strong> {{ r.statement }}</p>
        <p>
          Sua resposta: <strong>{{ r.user_answer }}</strong>
          <span :class="r.is_correct ? 'correct' : 'incorrect'">
            ({{ r.is_correct ? 'Correta' : 'Errada' }})
          </span>
        </p>
        <p v-if="!r.is_correct">Resposta correta: <strong>{{ r.correct_answer }}</strong></p>
      </div>
    </div>
  </div>
</template>

<script setup>
/* Este componente renderiza um quiz interativo com feedback de respostas */
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import api from '../api/axios'

const route = useRoute()
const quiz = ref({ title: '', questions: [] })
const answers = ref({})
const result = ref(null)
const submitted = ref(false)

const fetchQuiz = async () => {
  const res = await api.get(`/quizzes/${route.params.id}`)
  quiz.value = res.data
}

const submitAnswers = async () => {
  const payload = {
    answers: Object.entries(answers.value).map(([question_id, answer]) => ({
      question_id: parseInt(question_id),
      answer
    }))
  }

  const res = await api.post(`/quizzes/${quiz.value.id}/submit`, payload)
  result.value = res.data
  submitted.value = true
}

onMounted(() => {
  fetchQuiz()
})
</script>

<style scoped>
.quiz-page {
  max-width: 700px;
  margin: 2rem auto;
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.title {
  font-size: 1.8rem;
  font-weight: bold;
  margin-bottom: 2rem;
  text-align: center;
}

.question-box {
  margin-bottom: 2rem;
}

.option-item {
  margin-top: 0.7rem;
  padding-left: 0;
}

.option-item label {
  display: block;
  background: #fff;
  border: 2px solid #00e600;
  border-radius: 8px;
  padding: 0.8rem 1.2rem;
  cursor: pointer;
  font-size: 1.1rem;
  transition: background 0.2s, border 0.2s, color 0.2s;
  margin-bottom: 0.5rem;
  box-shadow: 0 2px 8px rgba(0,0,0,0.04);
  position: relative;
  color: #222;
}

.option-item input[type="radio"] {
  display: none;
}

.feedback-box {
  border-top: 1px solid #eee;
  padding-top: 1rem;
  margin-bottom: 1rem;
}

/* Quando selecionado, preenche TODO o label com verde claro */
.option-item input[type="radio"]:checked + label,
.option-item label:has(input[type="radio"]:checked) {
  background: #b6fcb6;
  color: #111;
  border-color: #00b300;
}

/* Hover mais suave */
.option-item label:hover {
  background: #e6ffe6;
  border-color: #00b300;
}

.submit-btn {
  background-color: #00e600;
  border: none;
  color: black;
  font-weight: bold;
  padding: 0.9rem 1.5rem;
  border-radius: 10px;
  cursor: pointer;
  margin-top: 1.5rem;
  display: block;
  width: 100%;
}

.result {
  font-size: 1.5rem;
  font-weight: bold;
  color: #2d9c2d;
  margin-bottom: 1.5rem;
  text-align: center;
}

.feedback-box {
  border-top: 1px solid #eee;
  padding-top: 1rem;
  margin-bottom: 1rem;
}

.correct {
  color: green;
  font-weight: bold;
}

.incorrect {
  color: red;
  font-weight: bold;
}
</style>
