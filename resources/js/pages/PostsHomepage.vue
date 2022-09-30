<template>
  <div class="container">

    <div v-if="isLoading">
        <LoadingComponent/>
    </div>
    <div v-else>
        <div>
            <h3 class="text-center py-4"> Tutti i post </h3>
            <div class="d-flex  justify-content-center flex-wrap">
                <PostCard v-for="post in posts" :key="post.id" :post="post"/>
            </div>
        </div>
        <div class="py-5">
        <h2 class="text-center py-4">Titoli dei post per ogni tag</h2>
        <div class="d-flex flex-wrap justify-content-center">
            <TagCard v-for="tag in tags" :key="tag.id" :tag="tag"/> 
        </div>
        </div>
    </div>
   
</div>
</template>

<script>
import Axios from 'axios';
import PostCard from '../components/PostCard';
import TagCard from '../components/TagCard';  
import LoadingComponent from '../components/LoadingComponent.vue' 
export default {
    name:'PostsHomepage',
    components:{
        PostCard,
        TagCard,
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
        setTimeout(this.getPosts,1500);
        this.getTags();
    }
}
</script>

<style>

</style>