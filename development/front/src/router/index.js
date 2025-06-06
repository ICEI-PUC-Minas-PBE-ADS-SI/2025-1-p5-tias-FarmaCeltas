import { createRouter, createWebHistory } from 'vue-router'
import LoginPage from '../pages/LoginPage.vue'
import HomePage from '../pages/HomePage.vue'
import Register from "@/pages/Register.vue";

const routes = [
    { path: '/', component: HomePage },
    { path: '/login', component: LoginPage },
    {path: '/register', component: Register },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
