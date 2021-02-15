<template>
  <div>
    <div class="newsletter">
      <h1>Newsletter</h1>
      <form>
        <input type="text" placeholder="Enter email"/>
        <!--            <select class="selectpicker" multiple data-live-search="true">-->
        <!--              <option>Mustard</option>-->
        <!--              <option>Ketchup</option>-->
        <!--              <option>Relish</option>-->
        <!--            </select>-->
        <br>
        <br>
        <button class="btn btn-warning">Send</button>
      </form>
    </div>
    <div class="categories">
      <h1>Categories</h1>
      <ul v-for="(category, index) in categories" :key="index">
        <li>{{category.name}}</li>
      </ul>
    </div>
  </div>
</template>

<script>
import { actionTypes } from '../store/modules/category'
import { mapState } from 'vuex'

export default {
  name: 'VueRightSide',
  computed: {
    ...mapState({
      categories: state => state.category.categories,
      isLoading: state => state.category.isLoading
    })
  },
  mounted () {
    this.$store.dispatch(actionTypes.getCategories)
  }
}
</script>

<style scoped>
.newsletter {
  background-color: #f9f9fe;
  padding: 10% 5%;
}

.newsletter h1 {
  font-size: 25px;
  color: #39424e;
}

.newsletter input {
  width: 100%;
  height: 35px;
}

.btn {
  width: 100%;
}

.categories {
  margin-top: 3%;
  background-color: #f9f9fe;
  padding: 10% 5%;
}

.categories h1{
  font-size: 25px;
  color: #39424e;
}

li {
  width: 100%;
  background-color: white;
  padding: 3%;
}
</style>
