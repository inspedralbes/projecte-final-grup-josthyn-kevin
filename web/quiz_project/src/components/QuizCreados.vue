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
    }, beforeMount() {
        //MIRO EL LOCAL STORAGE, SI HAY ALGO LO CARGO
        this.Usuario = this.sessioStore.get.username;
        this.estado = this.sessioStore.get.estadoLogin;
        this.apellido = this.sessioStore.get.apellido;
        this.Correo = this.sessioStore.get.correo;
        this.Contrasena = this.sessioStore.get.contrasena
        this.idUserL = this.sessioStore.get.idUser; 
    },methods: {
        eliminarQuiz(id) {
           fetch(`http://192.168.1.148:8000/quiz/eliminar/${id}` , {
                method: 'DELETE',
              }).then(res => {
                return res.json();
              }).then(data => {
                console.log(data);
              });
        }
    },
   mounted () {
      fetch(`http://192.168.1.148:8000/quiz/usuario/${this.idUserL}`)
      .then(res => res.json())
      .then((data) => {
        this.quiz = data;
        console.log(this.$route.params.idUsu)
        this.quizLeng = this.quiz.length;
        this.estado=this.sessioStore.get.estadoLogin;
        this.idUserL = this.sessioStore.get.idUser;
      });
    },
  }
</script>


<template>

    <main>
    <!--<h4>Quiz</h4> <h1>{{this.Usuario}}{{this.AUsuario}}</h1>-->
     <p>{{this.quizLeng}}</p>
    <div v-if="this.quizLeng === 0">
        <h1>No Tienes ningun quiz creado</h1>
    </div>
    <div v-else>
        <div v-for="(quizs,index) in this.quiz" :key="index">
            <RouterLink :to="`/pregunta/${quizs.id}`">
                    <h5>{{quizs.titulo}}</h5>
            </RouterLink>
            <button @click="eliminarQuiz(quizs.id)">Eliminar Quiz</button>
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