import Vue from 'vue'
import Vuex from 'vuex'
import auth from './modules/auth'
import blogs from './modules/blogs'
import category from './modules/category'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    auth,
    blogs,
    category
  }
})
