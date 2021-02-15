import blogApi from '../../api/blogs'

const state = {
  blogs: null,
  blog: null,
  isLoading: false,
  validationErrors: null
}

export const mutationTypes = {
  blogsStart: '[blog] Blogs start',
  blogsSuccess: '[blog] Blogs success',
  blogsFailure: '[blog] Blogs failure',

  blogStart: '[blog] Blog start',
  blogSuccess: '[blog] Blog success',
  blogFailure: '[blog] Blog failure',

  blogCreateStart: '[blog] Blog Create start',
  blogCreateSuccess: '[blog] Blog Create success',
  blogCreateFailure: '[blog] Blog Create failure',

  blogUpdateStart: '[blog] Blog Update start',
  blogUpdateSuccess: '[blog] Blog Update success',
  blogUpdateFailure: '[blog] Blog Update failure',

  blogDeleteStart: '[blog] Blog Delete start',
  blogDeleteSuccess: '[blog] Blog Delete success',
  blogDeleteFailure: '[blog] Blog Delete failure'
}

export const actionTypes = {
  getBlogs: '[blog] Get Blogs',
  getBlog: '[blog] Get Blog',
  storeBlog: '[blog] Store Blog',
  updateBlog: '[blog] Update Blog',
  destroyBlog: '[blog] Destroy Blog'
}

const mutations = {
  [mutationTypes.blogsStart] (state) {
    state.isLoading = true
  },
  [mutationTypes.blogsSuccess] (state, payload) {
    console.log(payload)
    state.blogs = payload
    state.isLoading = false
  },
  [mutationTypes.blogsFailure] (state) {
    state.isLoading = false
  },

  [mutationTypes.blogStart] (state) {
    state.isLoading = true
  },
  [mutationTypes.blogSuccess] (state, payload) {
    console.log(payload)
    state.blog = payload
    state.isLoading = false
  },
  [mutationTypes.blogFailure] (state) {
    state.isLoading = false
  },

    [mutationTypes.blogDeleteStart] (state) {
        state.isLoading = true
    },
    [mutationTypes.blogDeleteSuccess] (state, payload) {
        console.log(payload)
        state.blog = payload
        state.isLoading = false
    },
    [mutationTypes.blogDeleteFailure] (state) {
        state.isLoading = false
    }
}

const actions = {
  [actionTypes.getBlogs] (context) {
    return new Promise(resolve => {
      context.commit(mutationTypes.blogsStart)
      blogApi.getBlogs()
        .then(res => {
          setTimeout(() => {
            context.commit(mutationTypes.blogsSuccess, res.data)
            resolve(res.data)
            console.log(res.data)
          }, 50)
        })
        .catch(e => {
          context.commit(mutationTypes.blogsFailure)
          console.log(e)
        })
    })
  },

  [actionTypes.getBlog] (context, id) {
    return new Promise(resolve => {
      context.commit(mutationTypes.blogStart)
      blogApi.getBlog(id)
        .then(res => {
          setTimeout(() => {
            context.commit(mutationTypes.blogSuccess, res.data)
            resolve(res.data)
            console.log(res.data)
          }, 100)
        })
        .catch(e => {
          context.commit(mutationTypes.blogsFailure)
          console.log(e)
        })
    })
  },

    [actionTypes.storeBlog] (context, credentials) {
        return new Promise(resolve => {
            blogApi.store(credentials)
                .then(res => {
                        resolve(res.data)
                        console.log(res.data)
                })
                .catch(e => {
                    // context.commit(mutationTypes.blogsFailure)
                    console.log(e)
                })
        })
    },

    [actionTypes.updateBlog] (context, credentials) {
        return new Promise(resolve => {
            blogApi.store(credentials)
                .then(res => {
                    resolve(res.data)
                    console.log(res.data)
                })
                .catch(e => {
                    // context.commit(mutationTypes.blogsFailure)
                    console.log(e)
                })
        })
    },

    [actionTypes.destroyBlog] (context, id) {
        return new Promise(resolve => {
            context.commit(mutationTypes.blogDeleteStart)
            blogApi.destroy(id)
                .then(res => {
                    setTimeout(() => {
                        context.commit(mutationTypes.blogDeleteSuccess, res.data)
                        resolve(res.data)
                        console.log(res.data)
                    }, 1000)

                })
                .catch(e => {
                    context.commit(mutationTypes.blogDeleteFailure)
                    console.log(e)
                })
        })
    },
}

export default {
  state,
  mutations,
  actions
}
