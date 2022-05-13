
<script>
  export default {
    data() {
      return {
      myjson: [],
      respost:[],
      Nombre: "",
      }
    },methods: {
      enviarRespostes() {
      //Creamos formato json

const resp = JSON.stringify(this.respost);

      console.log(this.$route.params.id)

      if(this.respost.length!= 10 || resp.includes(null)) {
        alert("Responde todas las preguntas")
      } else {     
      const datosEnvio = new FormData();
      datosEnvio.append('quiz',this.myjson.id_quiz);
      datosEnvio.append('resposta',resp);
      console.log(resp);
      datosEnvio.append('nombre',this.Nombre);
      console.log(this.Nombre)

      fetch(`http://proyectefinaljoskevback.alumnes.inspedralbes.cat/anadir/partida` , {
        method: 'POST',
        body: datosEnvio
      }).then(function(res) {
        return res.json();
      }).then(function(data) {
        console.log(data)
      });
      }
      },
    },
   mounted () {
      fetch(`http://proyectefinaljoskevback.alumnes.inspedralbes.cat/preguntas/${this.$route.params.id}`)
      .then(res => res.json())
      .then((data) => {
        this.myjson = data;
        console.log(this.myjson)
        console.log(this.myjson.titulo)
        console.log( " estado " + this.myjson.preguntas[0].respuestas[0].respuesta)
      });
    },
  }

</script>

<template>  
  <div>
      <h4>{{this.myjson.titulo}}</h4>
      <div v-for="(pre,index) in this.myjson.preguntas" :key="index">
        <h3>{{pre.enunciado}}</h3>
        <div v-for="(res,index1) in this.myjson.preguntas[index].respuestas" :key="index1"> 
              <input type="radio" :name="'r' + index"  :value="res.estado" v-model="respost[index]">
              <label>{{res.respuesta}}</label>
            
        </div>  
          <br>
          <br>
      </div>

      

      <h3>Jugadores con mejor puntuacion</h3>

      <div v-for="(punt,index) in this.myjson.jugadores" :key="index">
        

        <p>Jugador: {{punt.nombre}} Puntacion: {{punt.puntuacion}} </p>

      </div>

      <label for="Nombre">Nombre</label>
                <input v-model="Nombre" type="text" class="form-control" id="UsNom" placeholder="Introduzca vuestro nombre">
      <button id="EnviarRes" type="button" @click="enviarRespostes()"  class="btn btn-primary">Terminar Quiz!</button>

  </div>
</template>
