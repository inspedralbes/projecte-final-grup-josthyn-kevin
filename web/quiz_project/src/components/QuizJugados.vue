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
    <div v-if="this.quizLeng === 0">
        <h1>No hay partidas</h1>
    </div>
    <div v-else>
        <div v-for="(quizse,index) in this.quiz" :key="index">
            <RouterLink :to="`/pregunta/${quizse.id}`">
                    <h5>{{quizse.titulo}}</h5>
            </RouterLink>
            <p>{{quizse.puntuacion}}</p>
        </div>
    </div>    
    </main>
</template>

<style scoped>
    div {
        margin: 2%;
        border: 2px solid black
    }
</style>