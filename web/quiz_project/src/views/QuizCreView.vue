<script>
import { RouterLink, RouterView } from 'vue-router'
import Heather from '../components/Heathers/HeatherAll.vue'
import QuizCreados from '../components/QuizCreados.vue'
import Footer from '../components/FooterAll.vue'
export default {
  components: {
    Heather,
    QuizCreados,
    Footer
  }
}
</script>

<template>
    <main>
        <heather/>
        <quizCreados/>
        <Footer/>
    </main>
</template>
