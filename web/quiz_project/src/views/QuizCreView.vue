<script>
import { RouterLink, RouterView } from 'vue-router'
import Heather from '../components/Heathers/HeatherAll.vue'
import QuizCreados from '../components/QuizCreados.vue'
export default {
  components: {
    Heather,
    QuizCreados,
  }
}
</script>

<template>
    <main>
        <heather/>
        <quizCreados/>
    </main>
</template>
