<template>
  <div class="auth-page">
    <div class="container page">
      <div class="row">
        <br>
        <div class="col-md-6 offset-md-3 col-xs-12">
          <h1 class="text-xs-center" style="text-align: center">Sign in</h1>
          <p class="text-xs-center ">
            <router-link class="have-account" :to="{name: 'register'}">Do not have an account?</router-link>
          </p>
          <br>
          <!--          <mcv-validation-errors v-if="validationErrors" :validation-errors="validationErrors"/>-->
          <form @submit.prevent="onSubmit">
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
import { mapState } from 'vuex'

import { actionTypes } from '../../store/modules/auth'

export default {
  name: 'VueLogin',
  components: {
  },
  data () {
    return {
      email: '',
      password: ''
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
      this.$store
        .dispatch(actionTypes.login, {
          email: this.email,
          password: this.password
        })
        .then(() => {
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
