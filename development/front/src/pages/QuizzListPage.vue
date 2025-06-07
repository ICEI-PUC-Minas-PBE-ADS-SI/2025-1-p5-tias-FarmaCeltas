<template>
  <div class="quiz-wrapper">
    <div class="quiz-box">
      <h1>Quizzes Disponíveis</h1>

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

const quizzes = ref([])
const meta = ref({
  current_page: 1,
  next_page_url: null,
  prev_page_url: null,
})

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

onMounted(() => {
  fetchQuizzes()
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
</style>
