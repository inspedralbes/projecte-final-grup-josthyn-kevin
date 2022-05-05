import { createRouter, createWebHistory } from 'vue-router'
import Pregunta from '../views/PreguntaView.vue'
import Quizhome from '../views/Quizhome.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'QuizHome',
      component: Quizhome
    },
    {
      path: '/pregunta/:id',
      name: 'pregunta',
      component: Pregunta
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
