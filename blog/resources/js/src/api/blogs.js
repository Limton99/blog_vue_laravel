import axios from './axios'

const getBlogs = () => {
  return axios.get('/blogs/all')
}

const getBlog = (id) => {
  return axios.get(`/blogs/${id}`)
}

const store = (credentials) => {
    return axios.post(`/blogs/store/`, credentials)
}

const edit = (id, credentials) => {
    return axios.get(`/blogs/update/${id}`, credentials)
}

const destroy = (id) => {
    return axios.delete(`/blogs/delete/${id}`)
}

export default {
  getBlogs,
  getBlog,
  store,
  edit,
  destroy
}
