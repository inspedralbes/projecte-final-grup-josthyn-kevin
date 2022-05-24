<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
  export default {
    data() {
      return {
      quiz: [],
      }
    },
    computed: {
        ...mapStores(sessioStore)
    },
   mounted () {
      fetch(`http://192.168.1.148:8000/quiz/${this.$route.params.idLogin}`) 
      .then(res => res.json())
      .then((data) => {
        this.quiz = data;
        console.log(this.quiz)
      });
    },
  }
</script>


<template>

    <div v-if="!this.sessioStore.get.estadoLogin === true" class="contenidor">
      <article>
          <div class="quizs" v-for="(quizs,index) in this.quiz" :key="index">
                  <h5>{{quizs.titulo}}</h5>
                  <p>Registrate o incia Secion para realizar el quiz</p>
          </div>
      </article> 
    </div>

    <div v-else class="contenidor">
      <article>
          <div v-for="(quizs,index) in this.quiz" :key="index">
                <button><RouterLink :to="`/pregunta/${quizs.id}`">
                  <h5>{{quizs.titulo}}</h5>
                </RouterLink>
                </button>
                
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

    a {
      text-decoration: none;
      color: black;
    }

    button {
       margin: 3%;
        padding-top: 2%;
        padding-bottom: 2%;
        border: 3px solid black;
        width: 95%;
        text-align: center;
        background-color: #e3e014;
        border-radius: 20px;
    }

    .quizs {
     margin: 4%;
        padding-top: 2%;
        padding-bottom: 2%;
        border: 3px solid black;
        text-align: center;
        background-color: #e3e014;
        border-radius: 20px;
    }

    

    .contenidor{
     margin-top:8%;
     margin-bottom: 6%;
     margin-right: 7%;
     margin-left: 7%;
     padding: 1%;
     border: 5px solid black;
     border-radius: 25px;
     background-color: #5C1473;
    }
</style>