<script>
import { RouterLink, RouterView } from 'vue-router'
import Admin from '../components/Admin.vue'
import Heather from '../components/Heathers/HeatherAd.vue'
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