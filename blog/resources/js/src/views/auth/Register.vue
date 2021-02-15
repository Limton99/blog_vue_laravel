<template>
  <div class="auth-page">
    <div class="container page">
      <div class="row">
        <br>
        <div class="col-md-6 offset-md-3 col-xs-12">
          <h1 class="text-xs-center" style="text-align: center">Sign up</h1>
          <p class="text-xs-center ">
            <router-link class="have-account" :to="{name: 'login'}">Have an account?</router-link>
          </p>
          <br>
<!--          <mcv-validation-errors v-if="validationErrors" :validation-errors="validationErrors"/>-->
          <form @submit.prevent="onSubmit">
            <fieldset class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Username" v-model="name"/>
            </fieldset>
            <fieldset class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Email" v-model="email"/>
            </fieldset>
            <fieldset class="form-group">
              <input type="password" class="form-control form-control-lg" placeholder="Password" v-model="password"/>
            </fieldset>
            <button class="btn btn-lg btn-primary pull-xs-right" :disabled="isSubmitting">Sign Up</button>
          </form>
          <br>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { actionTypes } from '../../store/modules/auth'
import { mapState } from 'vuex'

export default {
  name: 'Register',
  data () {
    return {
      email: '',
      password: '',
      name: ''
    }
  },
  computed: {
    ...mapState({
      isSubmitting: state => state.auth.isSubmitting,
      validationErrors: state => state.auth.validationErrors
    })
  },
  methods: {
    onSubmit () {
      console.log('submitted form')
      this.$store.dispatch(actionTypes.register, {
        email: this.email,
        password: this.password,
        name: this.name
      }).then(user => {
        console.log(user)
        this.$router.push({ name: 'home' })
      })
    }
  }
}
</script>

<style scoped>
.row {
  text-align: center;
}
fieldset {
  margin-bottom: 3%;
}

.have-account {
  color: #545b62;
  text-decoration: none;
  font-size: 12px;
}
</style>
