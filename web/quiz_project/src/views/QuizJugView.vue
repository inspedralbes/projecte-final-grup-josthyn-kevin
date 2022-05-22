<script>
import { RouterLink, RouterView } from 'vue-router'
import Heather from '../components/Heathers/HeatherAll.vue'
import QuizJugados from '../components/QuizJugados.vue'
export default {
  components: {
    Heather,
    QuizJugados,
  }
}
</script>

<template>
    
    <main>
        <heather/>
        <quizJugados/>
    </main>
</template>
