<script>
import { RouterLink, RouterView } from 'vue-router'
import Heather from '../components/HeatherIn.vue'
import Quizhome from '../components/QuizHomeCom.vue'



export default {
  components: {
    Heather,
    Quizhome,
  }
}

</script>

<template>
    
    <main>
        <heather/>
        <quizhome/>
    </main>

</template>
