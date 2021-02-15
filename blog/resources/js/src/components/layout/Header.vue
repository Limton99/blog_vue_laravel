<template>
  <div class="header">
    <div class="logo"><router-link class="logotip" :to="{name: 'home'}">Blog</router-link></div>
    <div class="nav navbar">
      <router-link class="link" active-class="active" :to="{name: 'home'}">Home</router-link>
      <router-link class="link" active-class="active" :to="{name: 'archive'}">Archive</router-link>
      <router-link class="link" active-class="active" :to="{name: 'pages'}">Pages</router-link>
      <router-link class="link" active-class="active" :to="{name: 'contact'}">Contact</router-link>
    </div>
    <div class="social">
      <a href="#"><i class="fa fa-instagram"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-skype"></i></a>
      <div class="dropdown">
        <button class="dropbtn"><i class="fa fa-user"></i></button>
        <div class="dropdown-content">
          <template v-if="isLoggedIn">
            <span>{{currentUser.email}}</span>
            <h1 @click="onLogout">
            <router-link to="/" @click.prevent="onLogout" style="margin-left: 0px">Logout</router-link>
            </h1>
          </template>
          <template v-else>
            <router-link :to="{name: 'login'}">Login</router-link>
            <router-link :to="{name: 'register'}" style="margin-left: 0px">Register</router-link>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import { actionTypes } from '../../store/modules/auth'

export default {
  name: 'VueHeader',
  computed: {
    ...mapState({
      currentUser: state => state.auth.currentUser,
      isLoggedIn: state => state.auth.isLoggedIn
    })
  },
  methods: {
    onLogout () {
      this.$store
        .dispatch(actionTypes.logout)
    }
  }
}
</script>

<style scoped>
.header {
  display: flex;
  justify-content: space-between;
  width: 80%;
  margin: 10px auto;

}

.logo .logotip{
  font-family: "Nunito", sans-serif;
  text-decoration: none;
  font-weight: bold;
  color: #1d2124;
  font-size: 30px;
}

.nav {
  width: 33%;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;

}

.nav .link{
  margin-left: 5%;
  text-decoration: none;
  color: gray;
}

.nav .link:first-child{
  margin-left: 0;
}

.social {
  margin: auto 0;
}

.social a, .social div{
  font-family: "Nunito", sans-serif;
  text-decoration: none;
  color: gray;
  font-size: 20px;
  margin-left: 10px;
}

.social a:first-child{
  margin-left: 0px;
}

.dropbtn {
  color: gray;
  border: none;
  background-color: white;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  font-size: 12px;
}

span {
  font-size: 14px;
  padding: 12px 16px;
}

.dropdown-content a:hover {background-color: #1a202c;}

.dropdown:hover .dropdown-content {display: block; background-color: #ddd;}

.router-link-exact-active.menuItem-active-link{
  border-bottom-color: #F19238;
  color:#F19238
}

</style>
