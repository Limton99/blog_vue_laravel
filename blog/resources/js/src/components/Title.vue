<template>
  <div class="title-box" :style="{ backgroundImage: `url(${image})` }">
    <h3>{{title}}</h3>
  </div>
</template>

<script>
export default {
  name: 'VueTitle',
  props: {
    title: {
      type: String,
      required: true
    },
    image: {
      type: String,
      required: true
    }
  }
}
</script>

<style scoped>
  .title-box {
    /*background: #5a6268;*/
    background-repeat: no-repeat;
    background-size: cover;
    width: 80%;
    margin:  1% auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 15% 0;
  }

  .title-box h3 {
    color: white;
  }
</style>
