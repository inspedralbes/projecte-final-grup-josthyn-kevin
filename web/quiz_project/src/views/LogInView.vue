<script>
import { RouterLink, RouterView } from 'vue-router'
import Login from '../components/LogIn.vue'
import Heather from '../components/Heathers/HeatherIn.vue'
import Footer from '../components/FooterAll.vue'
export default {
  components: {
    Login,
    Footer,
    Heather
   
  }
}

</script>


<template>
    <main>
        <heather/>
        <login/>
        <Footer/>
    </main>
</template>