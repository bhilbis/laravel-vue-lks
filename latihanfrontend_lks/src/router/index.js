import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),

  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/utama',
      name: 'utama',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/UtamaView.vue')
    },
    {
      path: '/kontak',
      name: 'kontak',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/KontakView.vue')
    },
    {
      path: '/crud',
      name: 'crud',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/CrudView.vue')
    },
    {
      path: '/crud/add',
      name: 'crud-add',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AddSocietyView.vue')
    },
    {
      path: '/crud/:id_society/update/',
      name: 'crud-update',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/UpdateView.vue'),
      props: true
    },
    {
      path: '/crud/:id_society/show',
      name: 'crud-show',
      component: () =>  import('../views/ShowView.vue'),
    },
    {
      path: '/auth/login',
      name: 'society-login',
      component: () =>  import('../views/LoginView.vue'),
    },
  ],
})

export default router