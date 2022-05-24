<script>
import { RouterLink, RouterView } from 'vue-router'
import Heather from '../components/Heathers/HeatherAll.vue'
import Quizhome from '../components/PaginaIn.vue'
import Footer from '../components/FooterAll.vue'
export default {
  components: {
    Heather,
    Quizhome,
    Footer
  }
}
</script>

<template>
    
    <main>
        <heather/>
        <quizhome/>
        <Footer/>
    </main>
</template>
