<template>
  <div class="profile-wrapper">
    <div class="profile-box">
      <div v-if="loading" class="loading">
        Carregando perfil...
      </div>

      <div v-else-if="error" class="error">
        {{ error }}
      </div>

      <div v-else-if="user" class="profile-content">
        <div class="profile-header">
          <div class="avatar-section">
            <div class="avatar">
              {{ user.name.charAt(0).toUpperCase() }}
            </div>
            <h1>{{ user.name }}</h1>
          </div>
        </div>

        <div class="profile-info">
          <div class="info-section">
            <h2>Informações Pessoais</h2>
            
            <div class="info-item">
              <label>Nome:</label>
              <span>{{ user.name }}</span>
            </div>

            <div class="info-item">
              <label>Email:</label>
              <span>{{ user.email }}</span>
            </div>

            <div class="info-item">
              <label>Telefone:</label>
              <span>{{ user.celphone || 'Não informado' }}</span>
            </div>

            <div class="info-item">
              <label>Membro desde:</label>
              <span>{{ formatDate(user.created_at) }}</span>
            </div>
          </div>

          <div class="stats-section">
            <h2>Estatísticas</h2>
            
            <div class="stats-grid">
              <div class="stat-card">
                <div class="stat-number">{{ stats.quizzesCompleted || 0 }}</div>
                <div class="stat-label">Quizzes Concluídos</div>
              </div>
              
              <div class="stat-card">
                <div class="stat-number">{{ stats.averageScore || 0 }}%</div>
                <div class="stat-label">Média de Acertos</div>
              </div>
            </div>
          </div>
        </div>

        <div class="profile-actions">
          <button @click="editProfile" class="edit-btn">
            Editar Perfil
          </button>
          
          <button @click="changePassword" class="password-btn">
            Alterar Senha
          </button>
          
          <button @click="logout" class="logout-btn">
            Sair da Conta
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import api from '../api/axios'

const router = useRouter()
const user = ref(null)
const loading = ref(true)
const error = ref(null)
const stats = ref({
  quizzesCompleted: 0,
  postsRead: 0,
  averageScore: 0
})

const fetchUserProfile = async () => {
  try {
    loading.value = true
    error.value = null
    
    const response = await api.get('/me')
    user.value = response.data
    
    // Buscar estatísticas reais
    const statsResponse = await api.get('/user/stats')
    stats.value = statsResponse.data
    
  } catch (err) {
    console.error('Erro ao carregar perfil:', err)
    if (err.response?.status === 401) {
      error.value = 'Sessão expirada. Por favor, faça login novamente.'
      setTimeout(() => {
        router.push('/login')
      }, 2000)
    } else {
      error.value = 'Não foi possível carregar o perfil. Tente novamente.'
    }
  } finally {
    loading.value = false
  }
}

const formatDate = (dateString) => {
  if (!dateString) return 'Data não disponível'
  
  const date = new Date(dateString)
  return date.toLocaleDateString('pt-BR', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
}

const editProfile = () => {
  alert('Funcionalidade de edição será implementada em breve!')
}

const changePassword = () => {
  alert('Funcionalidade de alteração de senha será implementada em breve!')
}

const logout = async () => {
  try {
    await api.post('/logout')
  } catch (err) {
    console.error('Erro ao fazer logout:', err)
  }
  
  localStorage.removeItem('token')
  router.push('/login')
}

onMounted(() => {
  fetchUserProfile()
})
</script>

<style scoped>
.profile-wrapper {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: 100vh;
  background: linear-gradient(135deg, #e8fce8 0%, #c6f7e2 100%);
  padding: 2rem;
}

.profile-box {
  background-color: #fff;
  padding: 2.5rem;
  border-radius: 22px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.10);
  width: 100%;
  max-width: 800px;
  margin-top: 2rem;
}

.profile-header {
  text-align: center;
  margin-bottom: 3rem;
  padding-bottom: 2rem;
  border-bottom: 2px solid #f0f0f0;
}

.avatar-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.avatar {
  width: 100px;
  height: 100px;
  background: linear-gradient(135deg, #00e600, #00b300);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.5rem;
  font-weight: bold;
  color: white;
  box-shadow: 0 4px 20px rgba(0, 230, 0, 0.3);
}

.profile-header h1 {
  font-size: 2.5rem;
  font-weight: 800;
  color: #1a3d1a;
  margin: 0;
}

.profile-info {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  margin-bottom: 3rem;
}

.info-section, .stats-section {
  background: #f9f9f9;
  padding: 2rem;
  border-radius: 16px;
  border: 1px solid #e0e0e0;
}

.info-section h2, .stats-section h2 {
  font-size: 1.5rem;
  font-weight: 700;
  color: #1a3d1a;
  margin-bottom: 1.5rem;
  text-align: center;
}

.info-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 0;
  border-bottom: 1px solid #e0e0e0;
}

.info-item:last-child {
  border-bottom: none;
}

.info-item label {
  font-weight: 600;
  color: #666;
  min-width: 120px;
}

.info-item span {
  color: #1a3d1a;
  font-weight: 500;
}

.stats-grid {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  width: 100%;
}

.stat-row {
  display: flex;
  gap: 1rem;
}

.stat-card {
  background: linear-gradient(135deg, #f4fff7 0%, #e0fbe6 100%);
  border: 1.5px solid #b6fcb6;
  color: #1a3d1a;
  box-shadow: 0 2px 8px rgba(0, 230, 0, 0.04);
  padding: 1.2rem 1rem;
  border-radius: 22px;
  text-align: center;
  font-size: 1rem;
  flex: 1 1 0;
  position: relative;
  transition: border 0.2s, box-shadow 0.2s, transform 0.2s;
}

.stat-card:hover, .stat-card-large:hover {
  border-color: #7be495;
  box-shadow: 0 4px 16px #d6f5d6;
  transform: translateY(-2px) scale(1.03);
}

.stat-card-large {
  margin-top: 0.5rem;
  padding: 2rem 1rem;
  font-size: 1.2rem;
  background: linear-gradient(90deg, #e0fbe6 0%, #b6fcb6 100%);
  border: 2px solid #b6fcb6;
  color: #1a3d1a;
  font-weight: 700;
  box-shadow: 0 4px 24px rgba(182,252,182,0.13);
  border-radius: 28px;
}

.stat-number {
  font-size: 2.2rem;
  font-weight: 900;
  color: #00b300;
  margin-bottom: 0.3rem;
  letter-spacing: 1px;
  text-shadow: 0 2px 8px #e0fbe6;
}

.stat-card-large .stat-number {
  font-size: 2.7rem;
  color: #009900;
  text-shadow: 0 4px 16px #b6fcb6;
}

.stat-label {
  font-size: 1rem;
  color: #222;
  font-weight: 600;
  letter-spacing: 0.5px;
}

.profile-actions {
  display: flex;
  gap: 1rem;
  justify-content: center;
  flex-wrap: wrap;
}

.edit-btn, .password-btn, .logout-btn {
  padding: 0.9rem 2rem;
  border: none;
  border-radius: 10px;
  font-weight: 600;
  font-size: 1rem;
  cursor: pointer;
  transition: all 0.3s ease;
  min-width: 150px;
}

.edit-btn {
  background: #00e600;
  color: white;
}

.edit-btn:hover {
  background: #00b300;
  transform: translateY(-2px);
}

.password-btn {
  background: #f0f0f0;
  color: #333;
  border: 2px solid #ddd;
}

.password-btn:hover {
  background: #e0e0e0;
  border-color: #00e600;
  color: #00e600;
}

.logout-btn {
  background: #ff4444;
  color: white;
}

.logout-btn:hover {
  background: #cc0000;
  transform: translateY(-2px);
}

.loading, .error {
  text-align: center;
  padding: 3rem;
  color: #666;
  font-size: 1.1rem;
}

.error {
  color: #cc0000;
}

@media (max-width: 768px) {
  .profile-info {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
  
  .stat-row {
    flex-direction: column;
    gap: 1rem;
  }
  
  .stat-card-large {
    font-size: 1rem;
    padding: 1.2rem 1rem;
  }
  
  .profile-actions {
    flex-direction: column;
    align-items: center;
  }
  
  .edit-btn, .password-btn, .logout-btn {
    width: 100%;
    max-width: 300px;
  }
}
</style> 