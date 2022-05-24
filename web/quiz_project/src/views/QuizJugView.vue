<script>
import { RouterLink, RouterView } from 'vue-router'
import Heather from '../components/Heathers/HeatherAll.vue'
import QuizJugados from '../components/QuizJugados.vue'
import Footer from '../components/FooterAll.vue'
export default {
  components: {
    Heather,
    QuizJugados,
    Footer
  }
}
</script>

<template>
    
    <main>
        <heather/>
        <quizJugados/>
        <Footer/>
    </main>
</template>
