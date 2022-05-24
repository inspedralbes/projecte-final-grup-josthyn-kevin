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
        //MIRO EL LOCAL STORAGE, SI HAY ALGO LO CARGO
        this.Usuario = this.sessioStore.get.username;
        this.estado = this.sessioStore.get.estadoLogin;
        this.apellido = this.sessioStore.get.apellido;
        this.Correo = this.sessioStore.get.correo;
        this.Contrasena = this.sessioStore.get.contrasena
        this.idUserL = this.sessioStore.get.idUser;
        this.quizsId = this.sessioStore.get.quizId;
    },
   mounted () {
      fetch(`http://192.168.1.148:8000/quiz/puntuacion/${this.idUserL}`)
      .then(res => res.json())
      .then((data) => {
        this.quiz = data;
        this.quizLeng = this.quiz.length;
        console.log(this.quiz)
        this.estado=this.sessioStore.get.estadoLogin;
        this.idUserL=this.sessioStore.get.idUser;
      });
    },
  }
</script>


<template>

    <main>
    <!--<h4>Quiz</h4> <h1>{{this.Usuario}}{{this.AUsuario}}</h1>-->
     <p>{{this.quizLeng}}</p>
    <div v-if="this.quizLeng === 0" class="contenidor" >
        <h1>No hay partidas</h1>
    </div>
    <div v-else class="contenidor" >
        <div v-for="(quizse,index) in this.quiz" :key="index">

            <button><RouterLink :to="`/pregunta/${quizse.id}`">
                    <h5>{{quizse.titulo}}</h5>
                    <p>Puntuacion: {{quizse.puntuacion}}</p>
            </RouterLink>
            </button>
        </div>
    </div>    
    </main>
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