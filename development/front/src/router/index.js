import { createRouter, createWebHistory } from 'vue-router'
import LoginPage from '../pages/LoginPage.vue'
import HomePage from '../pages/LandingPage.vue'
import Register from '../pages/RegisterPage.vue'
import QuizzListPage from '../pages/QuizzListPage.vue'
import QuizzPage from '../pages/QuizzPage.vue'
import PostListPage from '../pages/PostListPage.vue'
import ProfilePage from '../pages/ProfilePage.vue'
import QuizzCreatePage from '../pages/QuizzCreatePage.vue'
import PostPage from '../pages/PostPage.vue'
import AskOpenAIPage from '../pages/AskOpenAIPage.vue'

const routes = [
    { path: '/', component: HomePage },
    { path: '/login', component: LoginPage },
    { path: '/register', component: Register },
    { path: '/quizz-list', component: QuizzListPage },
    { path: '/quizzes/:id', component: QuizzPage, props: true },
    { path: '/materiais-list', component: PostListPage },
    { path: '/posts/:id', component: PostPage, props: true },
    { path: '/profile', component: ProfilePage },
    { path: '/quizzes/create', component: QuizzCreatePage },
    { path: '/ask-openai', component: AskOpenAIPage },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
