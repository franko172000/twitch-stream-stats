import {createRouter, createWebHistory} from 'vue-router'
import localStore from 'store'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'dashboard',
      component: () => import('./components/Dashboard.vue'),
      meta:{
          authRequired:true
      }
    },
      {
      path: '/auth/login',
      name: 'login',
      component: () => import('./components/Login.vue'),
    }
  ]
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.authRequired)) {
        if (!localStore.get('accessToken')) {
            next({
                path: '/auth/login',
                query: { redirect: to.fullPath },
            })
        } else {
            next()
        }
    } else {
        next()
    }
})

export default router
