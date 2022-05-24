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
           fetch(`http://192.168.210.161:8000/quiz/eliminar/${id}` , {
                method: 'DELETE',
              }).then(res => {
                return res.json();
              }).then(data => {
                console.log(data);
              });
        }
    },
   mounted () {
      fetch(`http://192.168.210.161:8000/quiz`) 
      .then(res => res.json())
      .then((data) => {
        this.quiz = data;
        console.log(this.quiz)
       
      });
    },
  }
</script>


<template>

    <div v-if="!this.sessioStore.get.estaLogin === true" id="contenidor">
      <article>
          <div v-for="(quizs,index) in this.quiz" :key="index">
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