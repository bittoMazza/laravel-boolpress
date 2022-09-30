<template>       
        <div class="col-4">
            <h3>{{ tag.name }}</h3>
            <ul>
                <li v-for="post  in tag.posts" :key="post.id">
                    {{ post.title }}
                </li>
            </ul>
        </div>
</template>
  
  <script>
  
  export default {
      props:{
        tag:Object,
      },
  
      methods:{

      }
  }
  </script>
  
  <style>
  
  </style>