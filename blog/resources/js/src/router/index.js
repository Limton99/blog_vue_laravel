import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Register from '../views/auth/Register'
import Login from '../views/auth/Login'
import Blog from '../views/Blog'
import NotFound from '../views/NotFound'
import Admin from "../Admin";
import Client from "../Client";
import store from '../store/index'
import AdminBlog from '../views/admin/Blogs'
import AdminDashboard from '../views/admin/Dashboard'
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'client',
    component: Client,
    children: [
      {
        path: '/',
        name: 'home',
        component: Home,
      },
      {
        path: '/register',
        name: 'register',
        component: Register
      },
      {
        path: '/login',
        name: 'login',
        component: Login
      },
      {
        path: '/blog/:id',
        name: 'blogDetail',
        component: Blog
      },
    ]
  },
    {
      path: '/admin',
      name: 'admin',
      component: Admin,
      children: [
          {
              path: 'dashboard',
              name: 'admin-dashboard',
              component: AdminDashboard
          },
          {
              path: 'blogs',
              name: 'admin-blogs',
              component: AdminBlog
          }
      ],
      // beforeEnter: (to, from, next) => {
      //     if (!store.state.auth.isAdmin)
      //     {
      //         next({ name: 'notFound' })
      //     }
      //     else next()
      // }
    },
  {
    path: '*',
    name: 'notFound',
    component: NotFound
  }
]

const router = new VueRouter({
  routes,
  linkExactActiveClass: 'active'
})

export default router
