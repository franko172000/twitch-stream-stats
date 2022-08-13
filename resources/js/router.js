import {createRouter, createWebHistory} from 'vue-router'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      component: () => import('./components/Dashboard.vue'),
    },
      {
      path: '/auth/login',
      component: () => import('./components/Login.vue'),
    }
  ]
})

export default router
