import axios from 'axios'
import { getItem } from '../helpers/persistanceStorage'

axios.defaults.baseURL = 'http://localhost:8000/api/v1'
axios.defaults.headers.Authorization = 'Bearer ' + getItem('accessToken')

export default axios
