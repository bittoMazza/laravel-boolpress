<template>       
        <div class="col-6 p-3 border border-primary">
            <h3>{{ tag.name }}</h3>
            <ul>
                <li v-for="post  in tag.posts" :key="post.id">
                    {{ post.title }} --- {{ post.user.name }}
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