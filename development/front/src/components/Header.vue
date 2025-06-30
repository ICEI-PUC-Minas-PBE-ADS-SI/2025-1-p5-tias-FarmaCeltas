<template>
  <header class="navbar">
    <div class="navbar-content">
      <router-link to="/" class="logo-link">
        <img src="@/assets/logo.svg" alt="Farmaceltas" class="logo" />
        <span class="title">Farmaceltas</span>
      </router-link>

      <nav class="nav-links">
        <router-link to="/" class="nav-link">Início</router-link>
        <router-link to="/quizz-list" class="nav-link">Quizzes</router-link>
        <router-link to="/materiais-list" class="nav-link">Materiais de estudo</router-link>

        <template v-if="!isAuthenticated">
          <router-link to="/login" class="nav-link">Login</router-link>
          <router-link to="/register" class="nav-link">Registrar</router-link>
        </template>

        <template v-else>
          <router-link to="/profile" class="nav-link">Perfil</router-link>
          <button @click="logout" class="nav-link">Sair</button>
        </template>
      </nav>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import api from '../api/axios'

const isAuthenticated = ref(false)
const router = useRouter()

const checkAuth = () => {
  const token = localStorage.getItem('token')
  isAuthenticated.value = !!token
}

const logout = async () => {
  try {
    await api.post('/logout')
  } catch (err) {
    console.error('Erro ao fazer logout:', err)
  }
  
  localStorage.removeItem('token')
  isAuthenticated.value = false
  router.push('/login')
}

onMounted(() => {
  checkAuth()
})

window.addEventListener('storage', checkAuth)
</script>

<style scoped>
.navbar {
  background: #fff;
  padding: 1rem 2rem;
  color: #222;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  position: sticky;
  top: 0;
  z-index: 10;
}

.navbar-content {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo-link {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: #222;
  gap: 0.75rem;
}

.logo {
  height: 40px;
}

.title {
  font-size: 2rem;
  font-weight: 700;
  letter-spacing: 1px;
}

.nav-links {
  display: flex;
  gap: 2rem;
}

.nav-link {
  color: #222;
  text-decoration: none;
  font-weight: 500;
  padding: 0.5rem 1.1rem;
  border-radius: 8px;
  transition: background 0.2s, color 0.2s;
  background: none;
  border: none;
  cursor: pointer;
  font-size: 1.05rem;
}

.nav-link:hover, .nav-link:focus {
  background: #e6ffe6;
  color: #00b300;
}

.nav-link:last-child {
  background: #00e600;
  color: #fff;
  font-weight: 600;
  box-shadow: 0 2px 8px rgba(0,230,0,0.07);
}

.nav-link:last-child:hover {
  background: #00b300;
  color: #fff;
}
</style>
