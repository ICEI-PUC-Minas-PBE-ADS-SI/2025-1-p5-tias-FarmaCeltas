<template>
  <div class="register-wrapper">
    <div class="register-box">
      <img :src="logo" alt="Farmaceltas logo" class="logo" />

      <h1>Criar Conta</h1>

      <form @submit.prevent="submit">
        <label for="name">Nome</label>
        <input id="name" type="text" v-model="name" required placeholder="Seu nome completo" />

        <label for="email">Email</label>
        <input id="email" type="email" v-model="email" required placeholder="exemplo@email.com" />

        <label for="password">Senha</label>
        <input id="password" type="password" v-model="password" required placeholder="" />

        <label for="phone">Celular (opcional)</label>
        <input id="phone" type="text" v-model="phone" placeholder="(XX) 99999-9999" />

        <button type="submit">Registrar</button>

        <p v-if="error" class="error-message">{{ error }}</p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import api from '../api/axios'
import router from '@/router'
import logo from '../assets/logo.svg'

const name = ref('')
const email = ref('')
const password = ref('')
const phone = ref('')
const error = ref('')

const submit = async () => {
  error.value = ''
  try {
    const response = await api.post('/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      phone: phone.value || null,
    })

    if (response.data.token) {
      localStorage.setItem('token', response.data.token)
      router.push('/')
    } else {
      router.push('/login')
    }
  } catch (err) {
    error.value = 'Erro ao registrar usuário. Verifique os dados.'
  }
}
</script>

<style scoped>
.register-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #d6f5d6;
  padding: 1rem;
}

.register-box {
  background-color: white;
  padding: 2.5rem;
  border-radius: 16px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 100%;
  max-width: 400px;
}

.logo {
  width: 80px;
  margin-bottom: 1.5rem;
}

h1 {
  font-size: 1.8rem;
  margin-bottom: 1.5rem;
  font-weight: bold;
  color: #222;
}

form {
  text-align: left;
}

form label {
  display: block;
  margin: 1rem 0 0.4rem;
  font-weight: 600;
  color: #333;
}

form input {
  width: 100%;
  padding: 0.75rem;
  border: 2px solid #ccc;
  border-radius: 8px;
  font-size: 1rem;
  outline: none;
  transition: border 0.2s ease;
}

form input:focus {
  border-color: #00e600;
  background-color: #f9fff9;
}

form input:hover {
  border-color: #00cc00;
}

form button {
  margin-top: 1.5rem;
  background-color: #00e600;
  color: black;
  font-weight: bold;
  border: none;
  padding: 0.9rem;
  width: 100%;
  border-radius: 10px;
  font-size: 1.1rem;
  cursor: pointer;
  transition: background-color 0.2s;
}

form button:hover {
  background-color: #00cc00;
}

.error-message {
  margin-top: 1rem;
  color: red;
  font-weight: bold;
  text-align: center;
}
</style>
