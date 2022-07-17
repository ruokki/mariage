import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Home.vue'
import InfoView from '../views/Infos.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/Home',
    name: 'home2',
    component: HomeView
  },
  {
    path: '/Infos',
    name: 'info',
    component: InfoView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
