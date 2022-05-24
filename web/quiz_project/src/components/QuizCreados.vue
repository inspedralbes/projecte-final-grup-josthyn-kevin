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
    <div v-if="this.quizLeng === 0" class="contenidor" >
        <h1 style="color:white">No Tienes ningun quiz creado</h1>
    </div>
    <div v-else class="contenidor"  >
        <div  class="quizs" v-for="(quizs,index) in this.quiz" :key="index">
                    <h5>{{quizs.titulo}}</h5>
            <button @click="eliminarQuiz(quizs.id)">Eliminar Quiz</button>
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