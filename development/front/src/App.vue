<template>
  <div id="app">
    <Header />
    <main>
      <router-view />
    </main>
    <Footer />
  </div>
</template>

<script setup>
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
</script>

<style>
#app {
  width: 100%;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  background-color: #d6f5d6;
  /* border: 5px solid blue !important; */
}

main {
  width: 100%;
  margin: 0;
  padding: 0;
  min-height: calc(100vh - 120px); /* Ajuste este valor baseado na altura do seu header + footer */
  background-color: #d6f5d6;
}

body {
  min-height: 100vh;
  min-width: 100vw;
}

</style>