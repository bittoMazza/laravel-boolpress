<template>
    <div>
        <HomePage :posts="posts" :tags="tags"/>
    </div>
</template>

<script>
import Axios from 'axios';
import HomePage from '../pages/HomePage.vue'

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
        HomePage,
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