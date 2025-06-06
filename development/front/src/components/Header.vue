<template>
  <header class="navbar">
    <div class="navbar-content">
      <router-link to="/" class="logo-link">
        <img src="@/assets/logo.svg" alt="Farmaceltas" class="logo" />
        <span class="title">Farmaceltas</span>
      </router-link>

      <nav class="nav-links">
        <router-link to="/" class="nav-link">Início</router-link>
        <router-link to="/quizzes" class="nav-link">Quizzes</router-link>
        <router-link to="/login" class="nav-link">Login</router-link>
        <router-link to="/register" class="nav-link">Registrar</router-link>
      </nav>
    </div>
  </header>
</template>

<style scoped>
.navbar {
  background-color: #000;
  padding: 1rem 2rem;
  color: white;
  box-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.navbar-content {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo-link {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: white;
}

.logo {
  height: 36px;
  margin-right: 0.75rem;
}

.title {
  font-size: 1.5rem;
  font-weight: bold;
}

.nav-links {
  display: flex;
  gap: 1.5rem;
}

.nav-link {
  color: #ccc;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.2s;
}

.nav-link:hover {
  color: #00e600;
}
</style>
