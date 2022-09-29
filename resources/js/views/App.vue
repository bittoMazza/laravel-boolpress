<template>

<div class="container">
    <h3 class="text-center py-4"> Tutti i post </h3>
    <div class="d-flex justify-content-center flex-wrap">
        <PostCard v-for="post in posts" :key="post.id" :post="post"/>
    </div>

    <div class="py-5">
        <h2 class="text-center py-4">Titoli dei post per ogni tag</h2>
        <div class="d-flex flex-wrap justify-content-center">
            <TagCard v-for="tag in tags" :key="tag.id" :tag="tag"/> 
        </div>
    </div>
</div>

</template>

<script>
import Axios from 'axios';
import PostCard from '../components/PostCard';
import TagCard from '../components/TagCard';

export default {
    name: "App",
    data:function(){
        return{
            posts : [],
            tags : [],
            isLoading : true,
        }
    },
    components:{
        PostCard,
        TagCard,
    },
    methods:{
        getPosts(postsPage = 1){
            Axios.get('/api/posts',{
                page: postsPage
            }).then((response) => {
                console.log(response.data.results);
                this.posts = response.data.results.data;
                /* a fine chiamata torniamo un isLoading = false */
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
        this.getPosts();
        this.getTags();
    }


}
</script>

<style>

</style>