<template>
  <div>
    <div class="box">
      <vue-title :title="title" :image="image"/>
    </div>
    <div class="blogs">
     <div class="left">
       <template v-if="!isLoading">
         <ul v-for="(blog, index) in blogs" :key="index">
             <div class="blog">
               <div class="image" style="margin-bottom: 100px;">
                 <img :src='url+blog.image' alt="">
               </div>
               <h1>{{blog.title}}</h1>
               <p class="text">{{blog.description}}</p>
               <router-link :to="{name: 'blogDetail', params: {id: blog.id}}" class="link">Read more</router-link>
               <div class="tags">
                 Tags: <li v-for="(tag, index) in blog.tags" :key="index" ><sapn style="margin-right: 4px">{{tag.name}}, &nbsp;</sapn></li>
               </div>
             </div>

         </ul>
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
</template>

<script>
import Image from '../../../img/blog1.png'
import VueTitle from '../components/Title'
import { actionTypes } from '../store/modules/blogs'
import { mapState } from 'vuex'
import RightSide from '../components/RightSide'

export default {
  name: 'Home',
  components: {
    VueTitle,
    RightSide
  },
  computed: {
    ...mapState({
      blogs: state => state.blogs.blogs,
      isLoading: state => state.blogs.isLoading
    })
  },
  mounted () {
    this.$store.dispatch(actionTypes.getBlogs)
  },
  data () {
    return {
      title: 'Home Page',
      image: Image,
      url: 'http://localhost:8000'
    }
  }
}
</script>

<style>
.blogs {
  width: 80%;
  margin: 0 auto;
  display: flex;
}

/*.link {*/
/*  color: #1a202c;*/
/*}*/

/*.link:hover {*/
/*  text-decoration: none;*/
/*  color: black;*/
/*}*/

ul {
  list-style: none;
  margin-left: -2rem;
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

.tags {
  display: flex;
}

.text {
    height: 43px;
    overflow: hidden;
    order: 0;
}
</style>
