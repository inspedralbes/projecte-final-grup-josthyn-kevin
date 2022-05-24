<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
  export default {
    data() {
      return {
      quizMasJugados: [],
      quizTemas: [],
      }
    },
    computed: {
        ...mapStores(sessioStore)
    },
   mounted () {

     //Fetch recupera los mejores quiz
      fetch(`http://192.168.1.148:8000/quiz/masJugados`) 
      .then(res => res.json())
      .then((data) => {
        this.quizMasJugados = data;
        console.log(this.quizMasJugados);
      });

      //Fetch recupera los temas
      fetch(`http://192.168.1.148:8000/tema`) 
      .then(res => res.json())
      .then((data) => {
        this.quizTemas = data;
        console.log(this.quizTemas);
      });
    },
  }
</script>


<template>

    <div v-if="!this.sessioStore.get.estadoLogin === true" id="contenidor">
      <article>

          <div v-for="(temas,index1) in this.quizTemas" :key="index1">
              <h5>{{temas.titulo}}</h5>
          </div>
          <div v-for="(quizses,index) in this.quizMasJugados" :key="index">
                  <h5>{{quizses.Titulo}}</h5>
          </div>
          <RouterLink to="/QuizHome"><button>Home</button></RouterLink>
      </article> 
    </div>
    <div v-else id="contenidor">
      <article>
          <div v-for="(temas,index1) in this.quizTemas" :key="index1">
              <RouterLink :to="`/usuario/USUARIOQUEDARA`"><button @click="irQuiz()">Home</button></RouterLink>
          </div>
          <div v-for="(quizses,index) in this.quizMasJugados" :key="index">
                <RouterLink :to="`/pregunta/${quizses.id}`">
                  <h5>{{quizses.Titulo}}</h5>
                </RouterLink>
          </div>
           <RouterLink :to="`/usuario/${this.sessioStore.get.idUser}`"><button>Home</button></RouterLink>
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