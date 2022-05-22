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
        console.log(this.sessioStore.get.estadoLogin);
      });
    },
  }
</script>


<template>

    <div v-if="!this.sessioStore.get.estadoLogin === true" id="contenidor">
      <article>
          <div v-for="(quizs,index) in this.quiz" :key="index">
                  <h5>{{quizs.titulo}}</h5>
                  <p>Registrate o incia Secion para realizar el quiz</p>
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
      margin: 0;
  	  padding: 0;
      line-height: 1.5em;
	    padding-top: 80px;
    }

    div {
        margin: 4%;
        padding-top: 2%;
        padding-bottom: 2%;
        border: 2px solid black;
    }

    #contenidor{
     margin-top:8%;
     margin-bottom: 6%;
     margin-right: 7%;
     margin-left: 7%;
     padding: 1%;
    }
</style>