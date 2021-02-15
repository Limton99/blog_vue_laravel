import axios from './axios'

const register = credentials => {
  return axios.post('/register', credentials)
}

const login = credentials => {
  return axios.post('/login', credentials)
}

const userCheck = credentials => {
  return axios.post('/check', credentials)
}

const logout = credentials => {
  return axios.post('/logout')
}

export default {
  register,
  login,
  logout,
  userCheck
}
