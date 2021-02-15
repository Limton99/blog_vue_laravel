import authApi from '../../api/auth'
import { setItem, getItem } from '../../helpers/persistanceStorage'

const state = {
  isSubmitting: false,
  isLoggedIn: null,
  isLoading: false,
  currentUser: null,
  isAdmin: null,
  validationErrors: null
}

export const mutationTypes = {
  registerStart: '[auth] Register start',
  registerSuccess: '[auth] Register success',
  registerFailure: '[auth] Register failure',

  loginStart: '[auth] Login start',
  loginSuccess: '[auth] Login success',
  loginFailure: '[auth] Login failure',

  logoutStart: '[auth] Logout start',
  logoutSuccess: '[auth] Logout success',
  logoutFailure: '[auth] Logout failure',

  userCheckStart: '[auth] Check user  start',
  userCheckSuccess: '[auth] Check user success',
  userCheckFailure: '[auth] Check user failure'

}

export const actionTypes = {
  register: '[auth] Register',
  login: '[auth] Login',
  logout: '[auth] Logout',
  userCheck: '[auth] Check user'
}

const mutations = {
  [mutationTypes.registerStart] (state) {
    state.isSubmitting = true
    state.validationErrors = null
  },
  [mutationTypes.registerSuccess] (state, payload) {
    state.isSubmitting = false
    state.isLoggedIn = true
    state.currentUser = payload.user
    state.isAdmin = payload.isAdmin
  },
  [mutationTypes.registerFailure] (state, payload) {
    state.isSubmitting = false
    state.validationErrors = payload
  },
  [mutationTypes.loginStart] (state) {
    state.isSubmitting = true
    state.validationErrors = null
  },
  [mutationTypes.loginSuccess] (state, payload) {
    console.log(payload)
    state.isSubmitting = false
    state.isLoggedIn = true
    state.currentUser = payload.user
    state.isAdmin = payload.isAdmin
  },
  [mutationTypes.loginFailure] (state, payload) {
    state.isSubmitting = false
    state.validationErrors = payload
  },

  [mutationTypes.logoutStart] (state) {
    state.isSubmitting = true
    state.validationErrors = null
  },
  [mutationTypes.logoutSuccess] (state) {
    state.isSubmitting = false
    state.currentUser = null
    state.isLoggedIn = false
    state.isAdmin = null
  },
  [mutationTypes.logoutFailure] (state) {
    state.isSubmitting = false
  },
  [mutationTypes.userCheckStart] (state) {
    state.isLoading = true
  },
  [mutationTypes.userCheckSuccess] (state, payload) {
    state.isLoading = false
    state.currentUser = payload.user
    state.isLoggedIn = true
    state.isAdmin = payload.isAdmin
  },
  [mutationTypes.userCheckFailure] (state) {
    state.isLoading = false
  }
}

const actions = {
  [actionTypes.register] (context, credentials) {
    return new Promise(resolve => {
      context.commit(mutationTypes.registerStart)
      authApi.register(credentials)
        .then(res => {
          context.commit(mutationTypes.registerSuccess, res.data)
          setItem('accessToken', res.data.token.accessToken)
          setItem('user', res.data.user)
          resolve(res.data.user)
          // console.log(res.data.user)
        })
        .catch(e => {
          context.commit(mutationTypes.registerFailure)
          console.log(e)
        })
    })
  },
  [actionTypes.login] (context, credentials) {
    return new Promise(resolve => {
      context.commit(mutationTypes.loginStart)
      authApi.login(credentials)
        .then(res => {
          context.commit(mutationTypes.loginSuccess, res.data)
          setItem('accessToken', res.data.token.accessToken)
          setItem('user', res.data.user)
          resolve(res.data.user)
        })
        .catch(e => {
          context.commit(mutationTypes.loginFailure)
          console.log(e)
        })
    })
  },
  [actionTypes.userCheck] (context) {
    return new Promise(() => {
      context.commit(mutationTypes.userCheckStart)
      if (localStorage.getItem('user')) {
        authApi.userCheck(getItem('user'))
          .then(res => {
            context.commit(mutationTypes.userCheckSuccess, res.data)
          })
          .catch(() => context.commit(mutationTypes.userCheckFailure))
      }
    })
  },
  [actionTypes.logout] (context) {
    return new Promise(() => {
      context.commit(mutationTypes.logoutStart)
      authApi.logout()
        .then(() => {
          context.commit(mutationTypes.logoutSuccess)
          localStorage.removeItem('accessToken')
          localStorage.removeItem('user')
        })
        .catch(() => context.commit(mutationTypes.logoutFailure))
    })
  }
}

export default {
  state,
  mutations,
  actions
}
