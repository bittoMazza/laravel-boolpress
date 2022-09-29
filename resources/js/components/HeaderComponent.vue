<template>
  <header class="container">
    <nav class="py-4">
        <ul class="d-flex justify-content-center">
            <li>
                <router-link to="/about">Vai a About</router-link>
            </li>
            <li class="mx-2">
                <router-link to="/home">Home</router-link>
            </li>
            <li>
                <router-link to="/contacts">Contatti</router-link>
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
    font-size: 18px;
 }
 ul{
    padding: 0;
    margin: 0;
 }


</style>