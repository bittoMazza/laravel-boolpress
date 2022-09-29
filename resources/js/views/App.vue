<template>
    <div class="body-color">
        <HeaderComponent/>
        <router-view></router-view>
    </div>
</template>

<script>
import HeaderComponent  from '../components/HeaderComponent.vue';

export default {
    name: "App",
    components:{
        HeaderComponent,
    },

}
</script>

<style scoped>
</style>