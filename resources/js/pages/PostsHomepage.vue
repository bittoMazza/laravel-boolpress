<template>
  <div class="container">

    <div v-if="isLoading">
        <LoadingComponent/>
    </div>
    <div v-else>
        <div>
            <h3 class="text-center py-4"> Tutti i post </h3>
            <div class="d-flex  justify-content-center flex-wrap py-4">
                <PostCard v-for="post in posts" :key="post.id" :post="post"/>
            </div>
        </div>
    </div>
   
</div>
</template>

<script>
import Axios from 'axios';
import PostCard from '../components/PostCard';
import LoadingComponent from '../components/LoadingComponent.vue' 
export default {
    name:'PostsHomepage',
    components:{
        PostCard,
        LoadingComponent,
    },

    data:function(){
        return{
            isLoading : true,
            posts : Array,
            tags : Array,
        }
    },
    methods:{
        getPosts(){
            Axios.get('/api/posts',{
            }).then((response) => {
                console.log(response.data.results);
                this.posts = response.data.results.data;
                this.isLoading = false;
            }).catch((error) => {
                console.error(error);
            })
        },
    },
    created(){
        setTimeout(this.getPosts,1500);
    }
}
</script>

<style>

</style>