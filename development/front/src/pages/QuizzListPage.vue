<template>
  <div class="quiz-wrapper">
    <div class="quiz-box">
      <h1>Quizzes Disponíveis</h1>

      <button v-if="isAdmin" class="create-quiz-btn" @click="goToCreateQuiz">
        + Criar Quiz
      </button>

      <div v-if="quizzes.length === 0" class="empty-msg">
        Nenhum quiz encontrado.
      </div>

      <div v-else class="quiz-grid">
        <div v-for="quiz in quizzes" :key="quiz.id" class="quiz-card">
          <h2>{{ quiz.title }}</h2>
          <p><strong>Tema:</strong> {{ quiz.theme }}</p>
          <p><strong>Dificuldade:</strong> {{ quiz.difficulty }}</p>

          <router-link :to="`/quizzes/${quiz.id}`" class="quiz-link">
            Ver quiz →
          </router-link>
        </div>
      </div>

      <div class="pagination">
        <button @click="fetchQuizzes(meta.current_page - 1)" :disabled="!meta.prev_page_url">
          Anterior
        </button>
        <button @click="fetchQuizzes(meta.current_page + 1)" :disabled="!meta.next_page_url">
          Próxima
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import api from '../api/axios'
import { useRouter } from 'vue-router'

const quizzes = ref([])
const meta = ref({
  current_page: 1,
  next_page_url: null,
  prev_page_url: null,
})

const isAdmin = ref(false)
const router = useRouter()

const fetchQuizzes = async (page = 1) => {
  try {
    const response = await api.get(`/quizzes?page=${page}`)
    quizzes.value = response.data.data
    meta.value = {
      current_page: response.data.current_page,
      next_page_url: response.data.next_page_url,
      prev_page_url: response.data.prev_page_url,
    }
  } catch (err) {
    console.error('Erro ao carregar quizzes:', err)
  }
}

const checkAdmin = async () => {
  try {
    const response = await api.get('/me')
    isAdmin.value = response.data.role === 'admin'
  } catch (err) {
    isAdmin.value = false
  }
}

const goToCreateQuiz = () => {
  router.push('/quizzes/create')
}

onMounted(() => {
  fetchQuizzes()
  checkAdmin()
})
</script>

<style scoped>
.quiz-wrapper {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: 100vh;
  background-color: #d6f5d6;
  padding: 2rem;
}

.quiz-box {
  background-color: white;
  padding: 2rem;
  border-radius: 16px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 1100px;
}

.quiz-box h1 {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 2rem;
  font-weight: bold;
  color: #222;
}

.empty-msg {
  text-align: center;
  color: #666;
  font-style: italic;
}

.quiz-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
}

.quiz-card {
  border: 2px solid #ccc;
  border-radius: 12px;
  padding: 1rem;
  transition: 0.2s ease;
  background-color: #fefefe;
}

.quiz-card:hover {
  border-color: #00cc00;
  background-color: #f6fff6;
}

.quiz-card h2 {
  font-size: 1.1rem;
  color: #006600;
  margin-bottom: 0.5rem;
}

.quiz-link {
  display: inline-block;
  margin-top: 0.75rem;
  color: #00aa00;
  text-decoration: none;
  font-weight: bold;
}

.quiz-link:hover {
  text-decoration: underline;
}

.pagination {
  margin-top: 2rem;
  display: flex;
  justify-content: space-between;
}

.pagination button {
  padding: 0.6rem 1.2rem;
  background-color: #eee;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
}

.pagination button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.pagination button:hover:not(:disabled) {
  background-color: #ddd;
}

.create-quiz-btn {
  display: block;
  margin: 0 0 2rem auto;
  background: linear-gradient(90deg, #00e600 0%, #b6fcb6 100%);
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  padding: 0.8rem 2rem;
  font-size: 1.1rem;
  cursor: pointer;
  box-shadow: 0 2px 8px rgba(0,230,0,0.07);
  transition: background 0.2s, transform 0.2s;
}
.create-quiz-btn:hover {
  background: linear-gradient(90deg, #00b300 0%, #e6ffe6 100%);
  transform: translateY(-2px) scale(1.04);
}
</style>
