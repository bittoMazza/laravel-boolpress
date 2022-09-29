<template>
  <div class="container d-flex justify-content-center">
   <PostCard :post="post"/>
  </div>
</template>

<script>
import Axios from 'axios';
import PostCard from '../components/PostCard.vue';
export default {
    components:{
        PostCard,
    },

    data:function(){
        return{
            post:{},
            isLoading : true,
        }
    },
    methods:{
        getPost(){
            const id = this.$route.params.id;
            Axios.get(`/api/posts/${id}`,{
            }).then((response) => {
                console.log(response.data.results);
                this.post = response.data.results.data;
                this.isLoading = false;
            }).catch((error) => {
                console.error(error);
            })
        },
    },
    created(){
        this.getPost();
    }
}
</script>

<style>

</style>