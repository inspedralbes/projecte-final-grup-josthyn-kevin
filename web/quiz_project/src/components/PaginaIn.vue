<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
  export default {
    data() {
      return {
      quizMasJugados: [],
      quizTemas: [],
      quizMejores: []
      }
    },
    computed: {
        ...mapStores(sessioStore)
    },
   mounted () {

       fetch(`http://192.168.1.148:8000/masjugados`) 
      .then(res => res.json())
      .then((data) => {
        this.quizMasJugados = data;
        console.log(this.quizMasJugados);
      });

     fetch(`http://192.168.1.148:8000/tema`) 
      .then(res => res.json())
      .then((data) => {
        this.quizTemas = data;
        console.log(this.quizTemas)
      });


       fetch(`http://192.168.1.148:8000/mejores`) 
      .then(res => res.json())
      .then((data) => {
        this.quizMejores = data;
        console.log(this.quizMejores)
      });
    },
  }
</script>


<template>

    <div v-if="!this.sessioStore.get.estadoLogin === true" id="contenidor">
      <article>

          <div v-for="(temas,index) in this.quizTemas" :key="index">
              <h5>{{temas.titulo}}</h5>
          </div>
          <div v-for="(quizses,index) in this.quizMasJugados" :key="index">
                  <h5>{{quizses.Titulo}}</h5>
          </div>
          <div v-for="(mejores,index) in this.quizMejores" :key="index">
                  <p>{{mejores.nombre}}</p>
                  <p>{{mejores.apellido}}</p>
                  <p>{{mejores.puntuacion}}</p>
          </div>
      </article> 
    </div>
    
    <div v-else id="contenidor">
      <article>
          <div v-for="(temas,index) in this.quizTemas" :key="index">
              <RouterLink :to="`/usuario/${temas.id}`">{{temas.id}}{{temas.titulo}}</RouterLink>
          </div>
          <div v-for="(quizses,index) in this.quizMasJugados" :key="index">
                <RouterLink :to="`/pregunta/${quizses.id}`">
                  <h5>{{quizses.Titulo}}</h5>
                </RouterLink>
          </div>
          <div v-for="(mejores,index) in this.quizMejores" :key="index">
                  <p>{{mejores.nombre}}</p>
                  <p>{{mejores.apellido}}</p>
                  <p>{{mejores.puntuacion}}</p>
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