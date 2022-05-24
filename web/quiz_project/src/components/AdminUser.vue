<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
  export default {
    data() {
      return {
      quiz: [],
      estado:false,
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
        this.idUserL = this.sessioStore.get.idAdmin; 
    },methods: {
        eliminarQuiz(id) {
           fetch(`http://192.168.1.148:8000/quiz/eliminar/${id}` , {
                method: 'DELETE',
              }).then(res => {
                return res.json();
              }).then(data => {
              });
        }
    },
   mounted () {
      fetch(`http://192.168.1.148:8000/quiz`) 
      .then(res => res.json())
      .then((data) => {
        this.quiz = data;
       
      });
    },
  }
</script>


<template>
    <div v-if="!this.sessioStore.get.estaLogin === true" id="contenidor">
      <article>
          <div  class="quizs" v-for="(quizs,index) in this.quiz" :key="index">
                    <h5>{{quizs.titulo}}</h5>
            <button @click="eliminarQuiz(quizs.id)">Eliminar Quiz</button>
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

    .quizs {
        margin: 2%;
        padding-top: 1%;
        padding-bottom: 1%;
        border: 3px solid black;
        text-align: center;
        background-color: #e3e014;
        border-radius: 20px;
    }

    button {
      margin-top: 2%;
      padding: 1%;
      border: 2px solid black;
      border-radius: 10px;
      color: white;
      background-color: #5C1473;

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