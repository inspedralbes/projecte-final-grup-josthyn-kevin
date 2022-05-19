<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
  export default {
    data() {
      return {
      quiz: [],
      Nombre: "",
      }
    },
    computed: {
        ...mapStores(sessioStore)
    },
   mounted () {
      fetch(`http://192.168.1.148:8000/quiz`)
      .then(res => res.json())
      .then((data) => {
        this.quiz = data;
        this.estado=this.sessioStore.get.estadoLogin;
      });
    },
  }
</script>


<template>

    <main>
    <!--<h4>Quiz</h4> <h1>{{this.Usuario}}{{this.AUsuario}}</h1>-->
      <div v-for="(quizs,index) in this.quiz" :key="index">
        <RouterLink :to="`/pregunta/${quizs.id}`">
                <h5>{{quizs.titulo}}</h5>
        </RouterLink>
      </div>    

    </main>
</template>

<style scoped>
    div {
        margin: 2%;
        border: 2px solid black
    }
</style>