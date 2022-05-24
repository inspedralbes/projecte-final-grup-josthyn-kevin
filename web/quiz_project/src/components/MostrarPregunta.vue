
<script>
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
  export default {
    data() {
      return {
      myjson: [],
      respost:[],
      Nombre: "",
      Id: "",
      }
    }, computed: {
        ...mapStores(sessioStore)
    },methods: {
      enviarRespostes() {
      //Creamos formato json
        const resp = JSON.stringify(this.respost);
        console.log(this.$route.params.id);
        if(this.respost.length!= 10 || resp.includes(null)) {
          alert("Responde todas las preguntas")
        } else {     
            const datosEnvio = new FormData();
            datosEnvio.append('quiz',this.myjson.id_quiz);
            console.log(this.myjson.id_quiz);
            datosEnvio.append('idUsuario',this.Id)
            console.log(this.Id)
            datosEnvio.append('respostas',resp);
            console.log(resp);
            //const da = JSON.stringify(this.datosEnvio);
              fetch(`http://192.168.1.148:8000/anadir/partida` , {
                method: 'POST',
                body: datosEnvio
              }).then(res => {
                return res.json();
              }).then(data => {
                console.log(data)
              });
            }
        },
      },
   mounted () {
      fetch(`http://192.168.1.148:8000/preguntas/${this.$route.params.id}`)
      .then(res => res.json())
      .then((data) => {
        this.myjson = data;
        console.log(this.myjson);
        this.Id = this.sessioStore.get.idUser;
      });
    },
  }

</script>

<template>  
  <div class="contenidor">
      <h2 style="color:yellow">{{this.myjson.titulo}}</h2>
      <div class="conPregunta" v-for="(pre,index) in this.myjson.preguntas" :key="index">
        <h3>{{pre.enunciado}}</h3>
        <div v-for="(res,index1) in this.myjson.preguntas[index].respuestas" :key="index1"> 
              <input type="radio" :name="'r' + index"  :value="res.id" v-model="respost[index] ">
              <label>{{res.respuesta}}</label>
        </div>  
          <br>
          <br>
      </div>
      <button id="EnviarRes" type="button" @click="enviarRespostes()"  class="btn btn-primary">Terminar Quiz!</button>
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
    background-color: yellow;
  }

</style>
