<template>
  <header class="container">
    <nav class="py-4">
        <ul class="d-flex justify-content-center">
            <li class="mx-2">
                <router-link class="route-link" to="/about">About</router-link>
            </li>
            <li class="mx-2">
                <router-link class="route-link" to="/home">Home</router-link>
            </li>
            <li class="mx-2">
                <router-link class="route-link" to="/contacts">Contatti</router-link>
            </li>
            <li class="mx-2">
                <router-link class="route-link" to="/about">Tags</router-link>
            </li>
        </ul>
    </nav>
  </header>
</template>

<script>
export default {

}
</script>

<style scoped>
 nav ul li{
    list-style: none;
 }
 ul{
    padding: 0;
    margin: 0;
 }

 .route-link{
    color: black;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
 }

</style>