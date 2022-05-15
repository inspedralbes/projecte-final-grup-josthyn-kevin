<script >
import { RouterLink, RouterView } from 'vue-router'
import MostrarPregunta from '../components/MostrarPregunta.vue'
import Heather from '../components/Heathers/HeatherIn.vue'
export default {
  components: {
    MostrarPregunta,
    Heather
  }
}
</script>

<template>
  
  <main>
    <heather/>
    <mostrar-pregunta/>
  </main>
</template>
