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
    },beforeMount() {
        this.estados = this.sessioStore.get.estadoLogin;
    },
   mounted () {
      fetch(`http://192.168.1.148:8000/quiz`)
      .then(res => res.json())
      .then((data) => {
        this.quiz = data;
        console.log(this.sessioStore.get.estadoLogin);
      });
    },
  }
</script>


<template>

    <div v-if="!this.estados === true" id="contenidor">
      <article>
     
          <div v-for="(quizs,index) in this.quiz" :key="index">
                  <h5>{{quizs.titulo}}</h5>
                  <p>Tiene quu estar registrado para iniar quiz</p>
          </div>
     
      </article> 
    </div>
    <div v-else id="contenidor">
      <article>
          <div v-for="(quizs,index) in this.quiz" :key="index">
                <RouterLink :to="`/pregunta/${quizs.id}`">
                  <h5>{{quizs.titulo}}</h5>
                </RouterLink>
          </div>
      </article>
      </div> 
</template>

<style scoped>

     body {
      width: 100%;
    }
    
    div {
        margin: 2%;
        border: 2px solid black
    }

    #contenidor{
     margin-top:6%;
    }
</style>