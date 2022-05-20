<script>
import { RouterLink, RouterView } from 'vue-router'
import Admin from '../components/AdminUser.vue'
import Heather from '../components/Heathers/HeatherAll.vue'
import Footer from '../components/FooterAll.vue'
export default {
  components: {
    Admin,
    Heather,
    Footer
  }
}

</script>


<template>
    <main>
        <heather/>
        <admin/>
        <Footer/>
    </main>
</template>