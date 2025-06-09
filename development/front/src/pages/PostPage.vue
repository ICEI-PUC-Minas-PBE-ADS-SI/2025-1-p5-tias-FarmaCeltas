<template>
  <div class="post-wrapper">
    <div class="post-box">
      <div v-if="loading" class="loading">
        Carregando...
      </div>

      <div v-else-if="error" class="error">
        {{ error }}
      </div>

      <div v-else-if="post" class="post-content">
        <h1 class="post-title">{{ post.title }}</h1>
        <p class="post-type"><strong>Tipo:</strong> <span>{{ post.type }}</span></p>

        <div v-if="post.type === 'video'" class="post-media">
          <a :href="post.content" target="_blank" class="post-link">Assista ao vídeo</a>
        </div>

        <div v-else-if="post.type === 'link'" class="post-media">
          <a :href="post.content" target="_blank" class="post-link">Acesse o link</a>
        </div>

        <div v-else class="post-text">
          {{ post.content }}
        </div>

        <div class="post-actions">
          <router-link to="/posts" class="back-button">Voltar para lista</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import api from '../api/axios'

const route = useRoute()
const post = ref(null)
const loading = ref(true)
const error = ref(null)

const fetchPost = async () => {
  try {
    loading.value = true
    error.value = null
    const response = await api.get(/posts/${route.params.id})
    post.value = response.data
  } catch (err) {
    console.error('Erro ao carregar post:', err)
    error.value = 'Não foi possível carregar o post. Por favor, tente novamente.'
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchPost()
})
</script>

<style scoped>
.post-wrapper {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: 100vh;
  background: linear-gradient(135deg, #e8fce8 0%, #c6f7e2 100%);
  padding: 2rem;
}

.post-box {
  background-color: #fff;
  padding: 2.5rem 2.5rem 2rem 2.5rem;
  border-radius: 22px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.10);
  width: 100%;
  max-width: 650px;
  margin-top: 2rem;
}

.post-title {
  text-align: center;
  font-size: 2.3rem;
  margin-bottom: 1.2rem;
  font-weight: 800;
  color: #1a3d1a;
  letter-spacing: 0.5px;
}

.post-type {
  text-align: center;
  color: #4e6e4e;
  margin-bottom: 2.2rem;
  font-size: 1.1rem;
}
.post-type span {
  color: #009900;
  font-weight: 600;
}

.post-media {
  text-align: center;
  margin: 2rem 0;
}

.post-text {
  line-height: 1.8;
  color: #222;
  margin: 2.5rem 0 2rem 0;
  font-size: 1.13rem;
  padding: 0 0.5rem;
  text-align: justify;
}

.post-link {
  display: inline-block;
  padding: 0.85rem 1.7rem;
  background-color: #00cc00;
  color: white;
  text-decoration: none;
  border-radius: 10px;
  font-weight: bold;
  font-size: 1.1rem;
  transition: background-color 0.2s;
  margin-top: 1rem;
}

.post-link:hover {
  background-color: #009900;
}

.post-actions {
  margin-top: 2.5rem;
  text-align: center;
}

.back-button {
  display: inline-block;
  padding: 0.9rem 2.2rem;
  background-color: #f3f3f3;
  color: #222;
  text-decoration: none;
  border-radius: 10px;
  font-weight: bold;
  font-size: 1.1rem;
  box-shadow: 0 2px 8px rgba(0,0,0,0.04);
  transition: background 0.2s, color 0.2s;
}

.back-button:hover {
  background-color: #e0e0e0;
  color: #009900;
}

.loading, .error {
  text-align: center;
  padding: 2rem;
  color: #666;
}

.error {
  color: #cc0000;
}
</style>
