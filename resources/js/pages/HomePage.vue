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
import PostCard from '../components/PostCard';
import TagCard from '../components/TagCard';    
export default {
    props:{
        posts : Object,
        tags : Object,
    },

    components:{
        PostCard,
        TagCard,
    }
}
</script>

<style>

</style>