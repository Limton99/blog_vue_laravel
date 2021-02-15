import axios from './axios'

const getCategories = () => {
  return axios.get('/categories')
}

export default {
  getCategories
}
