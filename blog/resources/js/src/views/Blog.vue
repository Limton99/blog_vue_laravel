<template>
  <div>
    <div>
      <div class="box">
        <vue-title :title="title" :image="image"/>
      </div>
      <div class="blogs">
        <div class="left">
          <template v-if="!isLoading">
                <div class="blog">
                  <div class="image">
                    <img :src='url+blog.image' alt="">
                  </div>
                  <h1>{{blog.title}}</h1>
                  <p>{{blog.description}}</p>
                  <div class="tags">
                    Tags: <li v-for="(tag, index) in blog.tags" :key="index" ><sapn style="margin-right: 4px">{{tag.name}}, &nbsp;</sapn></li>
                  </div>
                </div>
          </template>
          <template v-else>
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
          </template>
        </div>
        <div class="right">
          <right-side />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { actionTypes } from '../store/modules/blogs'
import { mapState } from 'vuex'
import Image from '../../../img/blog2.jpg'
import VueTitle from '../components/Title'
import RightSide from '../components/RightSide'

export default {
  name: 'VueBlog',
  components: {
    VueTitle,
    RightSide
  },
  computed: {
    ...mapState({
      blog: state => state.blogs.blog,
      isLoading: state => state.blogs.isLoading
    })
  },
  mounted () {
    this.$store.dispatch(actionTypes.getBlog, this.$route.params.id)
  },
  data () {
    return {
      title: 'Detail Page',
      image: Image,
      url: 'http://localhost:8000'
    }
  }
}
</script>

<style scoped>
.blogs {
  width: 80%;
  margin: 0 auto;
  display: flex;
  text-decoration: none;
}

li {
  list-style: none;
}

.blog .image {
  height: 350px;
}

.blog img {
  width: 100%;
  height: 100%;
}

.left {
  width: 66%;
  margin-right: 1%;
}

.right {
  width: 33%;
}

.newsletter {
  background-color: #6c757d;
  padding: 10% 5%;
}

.newsletter h1 {
  font-size: 25px;
}

.newsletter input {
  width: 100%;
  height: 35px;
}

.btn {
  width: 100%;
}

.tags {
  display: flex;
}
</style>
