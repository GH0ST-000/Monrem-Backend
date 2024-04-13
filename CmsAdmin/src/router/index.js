import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/Auth/AppLogin.vue'
import store from "../store";

const routes=[
  {
    path: '/app',
    name: 'app',
    component: () => import('../components/Layout/AppLayout.vue'),
    meta: {
      requiresAuth: true
    },
    children:[
      {
        path:'/dashboard',
        name:'app.dashboard',
        component: () => import('../views/Dashboard.vue'),
      },
        {
            path:'/posts',
            name:'app.posts',
            component: () => import('../views/Posts.vue'),
        },

    ]
  },
  {
    path:'/',
    name:'login',
    component:Login,
    meta: {
      requiresGuest: true
    }
  },

];

const router = createRouter({
  history: createWebHistory(),
  routes
})
router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.state.user.token ) {
    next({name: 'login'})
  } else if (to.meta.requiresGuest && store.state.user.token) {
    next({name: 'app.dashboard'})
  } else {
    next();
  }

})

export default router
