<template>
  <div id="app">
    <Header />
    <main>
      <router-view />
    </main>
    <Footer />
    <ModalLoginAlert v-if="showLoginModal" @close="showLoginModal = false" />
  </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useRoute } from 'vue-router'
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
import ModalLoginAlert from './components/ModalLoginAlert.vue'

const showLoginModal = ref(false)
const route = useRoute()

// Rotas que exigem login
const protectedRoutes = ['/quizz-list', '/quizzes', '/posts', '/materiais', '/quizzes/', '/posts/']

watch(
  () => route.fullPath,
  (newPath) => {
    const token = localStorage.getItem('token')
    if (
      protectedRoutes.some(r => newPath.startsWith(r)) &&
      !token
    ) {
      showLoginModal.value = true
    } else {
      showLoginModal.value = false
    }
  },
  { immediate: true }
)
</script>

<style>
#app {
  width: 100%;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  background-color: #d6f5d6;
}

main {
  width: 100%;
  margin: 0;
  padding: 0;
  min-height: calc(100vh - 120px);
  background-color: #d6f5d6;
}

* {
  box-sizing: border-box;
}

body {
  min-height: 100vh;
  min-width: 100vw;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
}
</style>
