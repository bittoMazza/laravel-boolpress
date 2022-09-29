<template>
    <div>
        <HeaderComponent/>
        <router-view></router-view>
    </div>
</template>

<script>
import Axios from 'axios';
import HomePage from '../pages/HomePage.vue'
import HeaderComponent  from '../components/HeaderComponent.vue';

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
        HeaderComponent,
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