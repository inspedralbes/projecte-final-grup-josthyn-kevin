<script>
import { RouterLink, RouterView } from 'vue-router'
import Register from '../components/Register.vue'
import Heather from '../components/Heathers/HeatherRegister.vue'
import Footer from '../components/FooterAll.vue'
export default {
  components: {
    Register,
    Heather,
    Footer
  }
}
</script>
<template>
    <main>
        <Heather/>
        <register/>
        <Footer/>
    </main>
</template>