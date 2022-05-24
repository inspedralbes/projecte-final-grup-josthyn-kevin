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
    <div v-if="!this.sessioStore.get.estadoLogin === true" class="contenidor">
      <article>
        <h3>Categories</h3>
          <div class="container">
            <div class="grid-item" v-for="(temas,index) in this.quizTemas" :key="index">
              <RouterLink :to="`/QuizHome/${temas.id}`"><button class="categoria">{{temas.titulo}}</button></RouterLink>
            </div>
          </div>
       </article>   
        <aside>
            <h4>Quiz mas Jugados</h4>
            <ol>
               <li class="nostyle" v-for="(quizses,index) in this.quizMasJugados" :key="index">{{quizses.Titulo}}</li>
            </ol>
           
            <h4>Mejores Jugadores</h4>
            <ol>
              <li class="nostyle" v-for="(mejores,index) in this.quizMejores" :key="index">{{mejores.nombre}}{{mejores.apellido}} / Puntuacion : {{mejores.puntuacion}}</li>
            </ol>  
        </aside>
        
      
    </div>

    <div v-else class="contenidor">
      <article>
        <h3>Categories</h3>
          <div class="container">
            <div class="grid-item" v-for="(temas,index) in this.quizTemas" :key="index">
                <RouterLink :to="`/usuario/${temas.id}`"><button class="categoria">{{temas.titulo}}</button></RouterLink>
            </div>
          </div>
      </article>
      <aside>

        <h4>Quiz mas Jugados</h4>
          <ol>
            <li class="nostyle" v-for="(quizses,index) in this.quizMasJugados" :key="index">
                  <RouterLink :to="`/pregunta/${quizses.id}`">
                    {{quizses.Titulo}}
                  </RouterLink>
            </li>
          </ol>
          <h4>Mejores Jugadores</h4>
          <ol>
              <li class="nostyle" v-for="(mejores,index) in this.quizMejores" :key="index">{{mejores.nombre}}{{mejores.apellido}} Puntuacion : {{mejores.puntuacion}}</li>
          </ol>
      </aside>
         
    </div> 
</template>

<style scoped>


    .contenidor{
        margin-top: 7%;
        display: grid;
        grid-template-columns: 50% 50%;
        margin-bottom: 28.200%;
    }

    .container{
        display: grid;
        grid-template-columns: repeat(3, auto);
        margin-right: 10%;
        height: 90%;
        /*border: solid #5C1473 1px;*/
    }

    .categoria{
        font-size: small;
        line-height: 10%;
        text-align: center;
        width: 50%;
        height: 50%;
        border-radius: 30px;
        color: #5C1473;
    }

    article{
        text-align: center;
    }

    li.nostyle {
        list-style-type: none;
    }

    aside{
        text-align: center;
        padding-top: 2%;
    }

    .aleatorio{
        font-size: small;
        line-height: 10%;
        text-align: center;
        width: 17%;
        padding: 3%;
        border-radius: 30px;
        color: #5C1473;
        margin-right: 2%;
    }

    #aleatorio{
        height: 40%;
        border: 1px black solid;
    }



</style>

