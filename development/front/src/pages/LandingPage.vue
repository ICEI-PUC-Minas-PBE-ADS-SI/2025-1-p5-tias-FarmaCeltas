<template>
  <div class="landing-body">
    <section class="destaque">
      <h1>Farmaceltas</h1>
      <p>Conheça mais sobre seus medicamentos</p>
      <button @click="navigateTo('search')">BUSQUE AQUI!</button>
    </section>

    <section class="banner">
      <img
        :src="homeImg"
        alt="Farmacêutico"
        class="banner-image"
      />
      <div class="banner-text">
        <p>
          Apoie os <strong>FarmaCeltas</strong> e leve conhecimento de qualidade para toda
          <strong class="highlight">população brasileira.</strong>
        </p>
      </div>
    </section>

    <section class="content-section">
      <h2>Um remédio para seu conhecimento</h2>
      <p>Acabaram de sair da caixinha</p>

      <div v-if="loading" class="loading">
        Carregando conteúdo...
      </div>

      <div v-else-if="error" class="error">
        {{ error }}
      </div>

      <div v-else class="cards">
        <div v-for="item in contentItems" :key="item.id" class="card" @click="navigateToItem(item)">
          <h3>{{ item.title }}</h3>
          <p>{{ item.type === 'quiz' ? 'Quiz' : item.type === 'video' ? 'Vídeo' : 'Artigo' }}</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import homeImg from '@/assets/homeimg.svg'
import api from '../api/axios'

const router = useRouter()
const loading = ref(true)
const error = ref(null)
const contentItems = ref([])

const fetchContent = async () => {
  try {
    loading.value = true
    error.value = null

    // Fetch both posts and quizzes
    const [postsResponse, quizzesResponse] = await Promise.all([
      api.get('/posts'),
      api.get('/quizzes')
    ])

    // Transform posts into card format
    const posts = postsResponse.data.data.map(post => ({
      id: post.id,
      title: post.title,
      type: post.type,
      contentType: 'post'
    }))

    // Transform quizzes into card format
    const quizzes = quizzesResponse.data.data.map(quiz => ({
      id: quiz.id,
      title: quiz.title,
      type: 'quiz',
      contentType: 'quiz'
    }))

    // Combine and sort by most recent (assuming IDs are sequential)
    contentItems.value = [...posts, ...quizzes].sort((a, b) => b.id - a.id).slice(0, 6)
  } catch (err) {
    console.error('Erro ao carregar conteúdo:', err)
    error.value = 'Não foi possível carregar o conteúdo. Por favor, tente novamente.'
  } finally {
    loading.value = false
  }
}

const navigateToItem = (item) => {
  if (item.contentType === 'quiz') {
    router.push(`/quizzes/${item.id}`)
  } else {
    router.push(`/posts/${item.id}`)
  }
}

const navigateTo = (destination) => {
  router.push(`/${destination}`)
}

onMounted(() => {
  fetchContent()
})
</script>

<style scoped>
.landing-body {
  font-family: Arial, sans-serif;
}

.destaque {
  background-color: #c8f0d2;
  text-align: center;
  padding: 60px 20px;
}

.destaque h1 {
  font-size: 40px;
  margin-bottom: 10px;
  color: #000;
}

.destaque p {
  font-size: 20px;
  color: #666;
  margin-bottom: 20px;
}

.destaque button {
  background-color: #222;
  color: white;
  border: none;
  padding: 12px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.banner {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 40px 20px;
  background-color: #f9f9f9;
}

.banner-image {
  width: 80%;
  max-width: 640px; /* ajuste gradual */
  height: auto;
  display: block;
  margin: 0 auto;
  border-radius: 16px;
  object-fit: cover;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
}

.banner-text p {
  font-size: 18px;
  text-align: center;
  max-width: 600px;
}

.banner-text .highlight {
  color: green;
}

.content-section {
  padding: 40px 20px;
  background-color: #fff;
  text-align: left ;
  color: #000;
}

.content-section h2 {
  font-size: 26px;
  margin-bottom: 5px;
}

.content-section p {
  color: #888;
  margin-bottom: 30px;
}

.cards {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  max-width: 1000px;
  margin: 0 auto;
}

.loading, .error {
  text-align: center;
  padding: 2rem;
  color: #666;
}

.error {
  color: #cc0000;
}

.card {
  background: #f7f7f7;
  border-radius: 10px;
  padding: 20px;
  cursor: pointer;
  transition: 0.2s;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 120px;
}

.card h3 {
  color: #000;
  margin-bottom: 10px;
  font-size: 1.1rem;
}

.card p {
  color: #666;
  font-size: 0.9rem;
}

.card:hover {
  background: #eaeaea;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
</style>
