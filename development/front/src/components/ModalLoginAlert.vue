<template>
    <div class="modal-overlay" @click.self="close">
      <div class="modal-content">
        <h2>Faça login para acessar!</h2>
        <p>Você precisa estar logado para acessar esta área do sistema.</p>
        <button @click="goToLogin">Fazer login</button>
        <button class="close-btn" @click="close">Fechar</button>
      </div>
    </div>
  </template>
  
  <script setup>
  import { useRouter } from 'vue-router'
  const router = useRouter()
  const emit = defineEmits(['close'])
  
  function goToLogin() {
    router.push('/login')
    emit('close')
  }
  
  function close() {
    emit('close')
  }
  </script>
  
  <style scoped>
  .modal-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
  }
  .modal-content {
    background: #fff;
    border-radius: 16px;
    padding: 2.5rem 2rem 2rem 2rem;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    text-align: center;
    max-width: 350px;
    width: 90%;
  }
  .modal-content h2 {
    margin-bottom: 1rem;
    color: #00b300;
  }
  .modal-content p {
    margin-bottom: 2rem;
    color: #333;
  }
  .modal-content button {
    background: #00e600;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 0.7rem 1.5rem;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    margin: 0 0.5rem;
    transition: background 0.2s;
  }
  .modal-content button:hover {
    background: #00b300;
  }
  .close-btn {
    background: #eee;
    color: #333;
  }
  .close-btn:hover {
    background: #ccc;
  }
  </style>