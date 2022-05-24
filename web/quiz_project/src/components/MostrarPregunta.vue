
<script>
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
  export default {
    data() {
      return {
      myjson: [],
      respost:[],
      Nombre: "",
      puntuacion: "",
      Id: "",
      }
    }, computed: {
        ...mapStores(sessioStore)
    },methods: {
      enviarRespostes() {
      //Creamos formato json
        const resp = JSON.stringify(this.respost);
        if(this.respost.length!= 10 || resp.includes(null)) {
          alert("Responde todas las preguntas")
        } else {     
            const datosEnvio = new FormData();
            datosEnvio.append('quiz',this.myjson.id_quiz);
            datosEnvio.append('idUsuario',this.Id)
            datosEnvio.append('respostas',resp);
            //const da = JSON.stringify(this.datosEnvio);
              fetch(`http://proyectefinaljoskevback.alumnes.inspedralbes.cat/anadir/partida` , {
                method: 'POST',
                body: datosEnvio
              }).then(res => {
                return res.json();
              }).then(data => {
                this.puntuacion = data[0]
              });
            }
        },
      },
   mounted () {
      fetch(`http://proyectefinaljoskevback.alumnes.inspedralbes.cat/preguntas/${this.$route.params.id}`)
      .then(res => res.json())
      .then((data) => {
        this.myjson = data;
        this.Id = this.sessioStore.get.idUser;
      });
    },
  }

</script>

<template>  
  <div class="contenidor">
      <h2 style="color:yellow">{{this.myjson.titulo}}</h2>
      <div class="conPregunta" v-for="(pre,index) in this.myjson.preguntas" :key="index">
        <h3 style="color:yellow">{{pre.enunciado}}</h3>
        <div class="respuestas" v-for="(res,index1) in this.myjson.preguntas[index].respuestas" :key="index1"> 
              <input type="radio" :name="'r' + index"  :value="res.id" v-model="respost[index] ">
              <label>{{res.respuesta}}</label>
        </div>  
          <br>
          <br>
      </div>
      <button id="EnviarRes" type="button" @click="enviarRespostes()"  class="btn btn-warning">Terminar Quiz!</button>
      <h1 id="puntuacion">PUNTUACION : {{this.puntuacion}}</h1>
  </div>
</template>

<style scoped>


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

  .conPregunta {
    margin: 5%;

  }

  .respuestas {
    background-color:yellow;
    margin-top:1%;
    padding-top: 1%;
    padding-bottom: 1%;
    text-align: center;
    border: 4px solid black;
    border-radius: 15px;
  }
  button {
    margin-left: 45%;
  }

  #puntuacion {
    margin-top: 3%;
    margin-left: 25%;
    margin-bottom: 3%;
    color: yellow
  }

</style>
