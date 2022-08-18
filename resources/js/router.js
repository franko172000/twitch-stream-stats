import {createRouter, createWebHistory} from 'vue-router'
import localStore from 'store'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      component: () => import('./layout/UserPanel.vue'),
      meta:{
          authRequired:true
      },
      children: [
          {
              path: '/',
              name: 'dashboard',
              component: () => import('./components/Dashboard.vue'),
          },
          {
              path: '/streams',
              name: 'streams',
              component: () => import('./components/Streams.vue'),
          },
          {
              path: '/followed-streams',
              name: 'followedStreams',
              component: () => import('./components/FollowedStreams.vue'),
          },
      ]
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
