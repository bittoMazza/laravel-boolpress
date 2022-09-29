<template>
  <div class="col-3">
    <img  class="img-fluid" :src="isValidUrl(post.thumb) ? post.thumb : 'storage/' + post.thumb" alt="">
    <h3>{{ post.title }}</h3>
  </div>
</template>

<script>

export default {
    props:{
      post:Object,
    },

    methods:{
      isValidUrl(url){
      try {
        new URL(url);
      } catch (e) {
        console.error(e);
        return false;
      }
      return true;
  },
}
}
</script>

<style>

</style>