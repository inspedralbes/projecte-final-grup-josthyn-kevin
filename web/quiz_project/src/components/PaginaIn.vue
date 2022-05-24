<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
  export default {
    data() {
      return {
      quizMasJugados: [],
      }
    },
    computed: {
        ...mapStores(sessioStore)
    },
   mounted () {
      fetch(`http://192.168.1.148:8000/quiz/masJugados`) 
      .then(res => res.json())
      .then((data) => {
        this.quizMasJugados = data;
        console.log(this.quizMasJugados);
      });
    },
  }
</script>


<template>


    <div id="contenidor">
      <article>
          <div id="quizes" v-for="(quizs,index) in this.quizMasJugados" :key="index">
                <RouterLink :to="`/pregunta/${quizs.id}`">
                  <h5>{{quizs.titulo}}</h5>
                </RouterLink>
                <p>{{quizs.cont}}</p>
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

    #quizes {
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