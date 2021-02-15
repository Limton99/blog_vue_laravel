import categoryApi from '../../api/category'

const state = {
  categories: null,
  isLoading: false,
  validationErrors: null
}

export const mutationTypes = {
  categoriesStart: '[auth] categories start',
  categoriesSuccess: '[auth] categories success',
  categoriesFailure: '[auth] categories failure'
}

export const actionTypes = {
  getCategories: '[auth] Get categories'

}

const mutations = {
  [mutationTypes.categoriesStart] (state) {
    state.isLoading = true
  },
  [mutationTypes.categoriesSuccess] (state, payload) {
    state.categories = payload
    state.isLoading = false
  },
  [mutationTypes.categoriesFailure] (state) {
    state.isLoading = false
  }
}

const actions = {
  [actionTypes.getCategories] (context) {
    return new Promise(resolve => {
      context.commit(mutationTypes.categoriesStart)
      categoryApi.getCategories()
        .then(res => {
          setTimeout(() => {
            context.commit(mutationTypes.categoriesSuccess, res.data)
            resolve(res.data)
            console.log(res.data)
          }, 1000)
        })
        .catch(e => {
          context.commit(mutationTypes.categoriesFailure)
          console.log(e)
        })
    })
  }
}

export default {
  state,
  mutations,
  actions
}
