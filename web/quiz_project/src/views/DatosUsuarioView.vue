<script>
import { RouterLink, RouterView } from 'vue-router'
import Heather from '../components/Heathers/HeatherIn.vue'
import Datos from '../components/DatosUs.vue'
import Footer from '../components/FooterAll.vue'
export default {
  components: {
    Datos,
    Footer,
    Heather
  }
}

</script>

<template>
    <main>
        <heather/>
        <Datos/>
        <Footer/>
    </main>
</template>
