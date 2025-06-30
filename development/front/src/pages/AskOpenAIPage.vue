<template>
  <div class="ask-openai-wrapper">
    <div class="ask-openai-box">
      <h1>Tire sua dúvida de saúde com o FarmaCeltas GPT</h1>
      <form @submit.prevent="sendQuestion" class="ask-form">
        <textarea v-model="question" placeholder="Digite sua dúvida sobre saúde, medicamentos ou bem-estar..." required :disabled="loading"></textarea>
        <button type="submit" :disabled="loading || !question">
          {{ loading ? 'Enviando...' : 'Perguntar' }}
        </button>
      </form>

      <div v-if="answer" class="answer-box">
        <h2>Resposta do Assistente</h2>
        <p>{{ answer }}</p>
      </div>

      <div class="history-section">
        <h2>Histórico de Perguntas</h2>
        <div v-if="history.length === 0" class="empty-history">Nenhuma pergunta feita ainda.</div>
        <ul v-else class="history-list">
          <li v-for="item in history" :key="item.id" class="history-item">
            <div class="question">Q: {{ item.question }}</div>
            <div class="answer">A: {{ item.answer }}</div>
            <div class="date">{{ formatDate(item.created_at) }}</div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import api from '../api/axios'

const question = ref('')
const answer = ref('')
const loading = ref(false)
const history = ref([])

const sendQuestion = async () => {
  if (!question.value) return
  loading.value = true
  answer.value = ''
  try {
    const response = await api.post('/openai/ask', { question: question.value })
    answer.value = response.data.answer
    fetchHistory()
  } catch (err) {
    answer.value = 'Erro ao buscar resposta. Tente novamente.'
  } finally {
    loading.value = false
  }
}

const fetchHistory = async () => {
  try {
    const response = await api.get('/openai/history')
    history.value = response.data
  } catch (err) {
    history.value = []
  }
}

const formatDate = (dateString) => {
  const date = new Date(dateString)
  return date.toLocaleString('pt-BR', { dateStyle: 'short', timeStyle: 'short' })
}

onMounted(() => {
  fetchHistory()
})
</script>

<style scoped>
.ask-openai-wrapper {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: 100vh;
  background: linear-gradient(135deg, #e8fce8 0%, #c6f7e2 100%);
  padding: 2rem;
}

.ask-openai-box {
  background: #fff;
  padding: 2.5rem 2rem;
  border-radius: 18px;
  box-shadow: 0 4px 24px rgba(0, 230, 0, 0.10);
  width: 100%;
  max-width: 600px;
  margin-top: 2rem;
  text-align: center;
}

h1 {
  font-size: 1.5rem;
  font-weight: bold;
  color: #1a3d1a;
  margin-bottom: 2rem;
}

.ask-form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin-bottom: 2rem;
}

.ask-form textarea {
  min-height: 80px;
  font-size: 1.1rem;
  border-radius: 10px;
  border: 2px solid #c8f0d2;
  padding: 1rem;
  resize: vertical;
  background: #f9fff9;
  transition: border 0.2s;
}
.ask-form textarea:focus {
  border-color: #00e600;
}
.ask-form button {
  background: linear-gradient(90deg, #00e600 0%, #b6fcb6 100%);
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  padding: 0.9rem;
  font-size: 1.1rem;
  cursor: pointer;
  transition: background 0.2s, transform 0.2s;
}
.ask-form button:hover:not(:disabled) {
  background: linear-gradient(90deg, #00b300 0%, #e6ffe6 100%);
  transform: translateY(-2px) scale(1.03);
}

.answer-box {
  background: #f4fff7;
  border: 2px solid #b6fcb6;
  border-radius: 14px;
  padding: 1.5rem 1rem;
  margin-bottom: 2rem;
  margin-top: 1rem;
  text-align: left;
}
.answer-box h2 {
  color: #009900;
  font-size: 1.1rem;
  margin-bottom: 0.7rem;
}
.answer-box p {
  color: #222;
  font-size: 1.1rem;
}

.history-section {
  margin-top: 2.5rem;
  text-align: left;
}
.history-section h2 {
  color: #009900;
  font-size: 1.1rem;
  margin-bottom: 1rem;
}
.empty-history {
  color: #888;
  font-style: italic;
  text-align: center;
}
.history-list {
  list-style: none;
  padding: 0;
  margin: 0;
}
.history-item {
  background: #f9f9f9;
  border-radius: 10px;
  border: 1.5px solid #e0e0e0;
  margin-bottom: 1.2rem;
  padding: 1rem 1.2rem;
  box-shadow: 0 2px 8px rgba(0,230,0,0.04);
}
.history-item .question {
  font-weight: 600;
  color: #006600;
  margin-bottom: 0.3rem;
}
.history-item .answer {
  color: #222;
  margin-bottom: 0.2rem;
}
.history-item .date {
  color: #888;
  font-size: 0.9rem;
  text-align: right;
}
</style> 