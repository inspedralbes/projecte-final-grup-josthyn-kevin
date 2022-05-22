import { createRouter, createWebHistory } from 'vue-router'
import Pregunta from '../views/PreguntaView.vue'
import Quizhome from '../views/Quizhome.vue'
import LogIn from '../views/LogInView.vue'
import Register from '../views/RegisterView.vue'
import datosUsuario from '../views/DatosUsuarioView.vue'
import Admin from '../views/AdminView.vue'
import AdminUs from '../views/AdminUsView.vue'
import QuizJugados from '../views/QuizJugView.vue'
import QuizCreados from '../views/QuizCreView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'QuizHome',
      component: Quizhome
    },
    {
      path: '/usuario/:idLogin',
      name: 'QuizHomeLog',
      component: Quizhome,
      props: true
    },
    {
      path: '/pregunta/:id',
      name: 'pregunta',
      component: Pregunta
    },
    {
      path: '/login',
      name: 'login',
      component: LogIn
    },
    {
      path: '/register',
      name: 'register',
      component: Register
    },
    {
      path: '/admin',
      name: 'admin',
      component: Admin
    },
    {
      path: '/datosUs/:idUser',
      name: 'datosUs',
      component: datosUsuario

    },
    {
      path: '/adminUs',
      name: 'adminUs',
      component: AdminUs
    },
    {
      path: '/partidas/:idUs',
      name: 'partidas',
      component: QuizJugados
    },
    {
      path: '/quizCreadas/:idUsu',
      name: 'creadas',
      component: QuizCreados
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
