<template>
  <div class="post-wrapper">
    <div class="post-box">
      <h1>Materiais de Estudo</h1>

      <div v-if="posts.length === 0" class="empty-msg">
        Nenhum material encontrado.
      </div>

      <div v-else class="post-grid">
        <div v-for="post in posts" :key="post.id" class="post-card">
          <h2>{{ post.title }}</h2>
          <p><strong>Tipo:</strong> {{ post.type }}</p>

          <div v-if="post.type === 'video'">
            <a :href="post.content" target="_blank" class="post-link">Assista ao vídeo</a>
          </div>

          <div v-else-if="post.type === 'link'">
            <a :href="post.content" target="_blank" class="post-link">Acesse o link</a>
          </div>

          <div v-else class="post-text">
            {{ post.content.substring(0, 200) }}...
            <br />
            <a :href="/posts/${post.id}" class="post-link">Ler mais</a>
          </div>
        </div>
      </div>

      <div class="pagination">
        <button @click="fetchPosts(meta.current_page - 1)" :disabled="!meta.prev_page_url">
          Anterior
        </button>
        <button @click="fetchPosts(meta.current_page + 1)" :disabled="!meta.next_page_url">
          Próxima
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import api from '../api/axios'

const posts = ref([])
const meta = ref({
  current_page: 1,
  next_page_url: null,
  prev_page_url: null,
})

const fetchPosts = async (page = 1) => {
  try {
    const response = await api.get(/posts?page=${page})
    posts.value = response.data.data
    meta.value = {
      current_page: response.data.current_page,
      next_page_url: response.data.next_page_url,
      prev_page_url: response.data.prev_page_url,
    }
  } catch (err) {
    console.error('Erro ao carregar posts:', err)
  }
}

onMounted(() => {
  fetchPosts()
})
</script>

<style scoped>
.post-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #d6f5d6;
  padding: 3rem 1rem;
  box-sizing: border-box;
}

.post-box {
  background-color: #ffffff;
  padding: 2rem;
  border-radius: 16px;
  box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 1200px;
  display: flex;
  flex-direction: column;
}

.post-box h1 {
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

.post-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.5rem;
}

.post-card {
  border: 2px solid #e0e0e0;
  border-radius: 12px;
  padding: 1rem;
  background-color: #fefefe;
  transition: 0.2s ease;
}

.post-card:hover {
  border-color: #00cc00;
  background-color: #f6fff6;
}

.post-card h2 {
  font-size: 1.2rem;
  color: #006600;
  margin-bottom: 0.5rem;
}

.post-link {
  display: inline-block;
  margin-top: 0.75rem;
  color: #00aa00;
  text-decoration: none;
  font-weight: bold;
}

.post-link:hover {
  text-decoration: underline;
}

.pagination {
  margin-top: 2.5rem;
  display: flex;
  justify-content: center;
  gap: 1rem;
}

.pagination button {
  padding: 0.6rem 1.4rem;
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
