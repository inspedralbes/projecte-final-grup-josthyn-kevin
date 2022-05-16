<script>
import { RouterLink, RouterView } from 'vue-router'
     export default {
    data() {
      return {
      quiz: [],
      Nombre: "",


      }
    },
   mounted () {
      fetch(`http://192.168.210.161:8000/quiz`)
      .then(res => res.json())
      .then((data) => {
        this.quiz = data;
       
      });
    },
  }
</script>


<template>

    <main>


    

    <h4>Quiz</h4>
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