<template>
    <div class="container">
  
      <div v-if="isLoading">
          <LoadingComponent/>
      </div>
      <div v-else>
          <div>
              <h3 class="text-center py-4"> Tutti i Tag con relativi post e nome utente </h3>
              <div class="d-flex  justify-content-center flex-wrap">
                 <TagCard v-for="tag in tags" :key="tag.id" :tag="tag"/> 
              </div>
          </div>
      </div>
     
  </div>
  </template>
  
  <script>
  import Axios from 'axios';
  import TagCard from '../components/TagCard';  
  import LoadingComponent from '../components/LoadingComponent.vue' 
  export default {
      name:'TagsPostsPage',
      components:{
          TagCard,
          LoadingComponent,
      },
  
      data:function(){
          return{
              isLoading : true,
              tags : Array,
          }
      },
      methods:{
          getTags(){
              Axios.get('/api/tags',{
              }).then((response) => {
                  this.tags = response.data.results.data;
              }).catch((error) => {
                  console.error(error);
              })
          }
      },
      created(){
          setTimeout(this.getTags,1000);
      }
  }
  </script>
  
  <style>
  
  </style>