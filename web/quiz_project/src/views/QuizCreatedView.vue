<script>
import { RouterLink, RouterView } from 'vue-router'
import Heather from '../components/Heathers/HeatherAll.vue'
import Quizcreated from '../components/QuizCreate.vue'
import Footer from '../components/FooterAll.vue'
export default {
  components: {
    Heather,
    Quizcreated,
    Footer
  }
}
</script>

<template>
    
    <main>
        <heather/>
        <quizcreated/>
        <Footer/>
    </main>
</template>
