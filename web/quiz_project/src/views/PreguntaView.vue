<script >
import { RouterLink, RouterView } from 'vue-router'
import MostrarPregunta from '../components/MostrarPregunta.vue'
import Heather from '../components/HeatherIn.vue'
export default {
  components: {
    MostrarPregunta,
    Heather
  }
}
</script>

<template>
  
  <main>
    <h1>{{$route.params.id}}</h1>
    <heather/>
    <mostrar-pregunta/>
  </main>
</template>
