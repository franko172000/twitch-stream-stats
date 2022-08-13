import {createRouter, createWebHistory} from 'vue-router'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      component: () => import('./components/Dashboard.vue'),
    },
      {
      path: '/home',
      component: () => import('./components/Dashboard.vue'),
    },
    {
      path: '/auth',
      redirect: 'auth/login',
    },
  ]
})

export default router
