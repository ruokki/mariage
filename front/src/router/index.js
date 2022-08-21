import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Home.vue'
import Invite from '../views/Invite.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/invite',
    name: 'invite',
    component: Invite
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
