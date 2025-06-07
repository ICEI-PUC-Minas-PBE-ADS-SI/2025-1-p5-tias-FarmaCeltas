<template>
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-branding">
        <img src="@/assets/logo.svg" alt="Farmaceltas logo" class="footer-logo" />
        <span class="footer-title">Farmaceltas</span>
      </div>
      <p class="footer-text">
        &copy; 2025 Farmaceltas — Conhecimento para salvar vidas.
      </p>
    </div>
  </footer>
</template>

<style scoped>
.footer {
  background-color: #000;
  color: #fff;
  padding: 1.5rem 2rem;
  text-align: center;
  margin-top: auto;
  box-shadow: 0 -2px 6px rgba(0,0,0,0.3);
}

.footer-content {
  width: 100%;
}

.footer-branding {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0.6rem;
  margin-bottom: 0.75rem;
}

.footer-logo {
  height: 28px;
}

.footer-title {
  font-size: 1.2rem;
  font-weight: bold;
}

.footer-text {
  font-size: 0.95rem;
  color: #ccc;
}
</style>
