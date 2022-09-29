<template>
  <div class="col-3 post-card">
    <img  class="img-fluid" :src="isValidUrl(post.thumb) ? post.thumb : 'storage/' + post.thumb" alt="">
    <router-link :to="'/posts/'+ post.id">{{ post.title }}</router-link>
  </div>
</template>

<script>

export default {
    props:{
      post:Object,
    },

    methods:{
      isValidUrl(str) {
      var regex = /(?:https?):\/\/(\w+:?\w*)?(\S+)(:\d+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
      if(!regex .test(str)) {
        return false;
      } else {
        return true;
      }
   }
 }
}
</script>

<style scoped>
.post-card{
  padding: 20px;
  border: 2px solid black;
  border-radius: 5px;
} 
</style>