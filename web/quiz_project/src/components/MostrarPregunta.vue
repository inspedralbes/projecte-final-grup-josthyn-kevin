
<script>
  export default {
    data() {
      return {
      myjson: [],
      respuestas:[],
      Nombre: "",
      }
    },methods: {
      enviarRespostes() {
      //Creamos formato json
  console.log(this.respuestas);
const resp = JSON.stringify(this.respuestas);

      if(this.respuestas.length!= 10 || resp.includes(null)) {
        alert("Responde todas las preguntas")
      } else {     
      const datosEnvio = new FormData();
      datosEnvio.append('quiz',this.myjson.id_quiz);
      datosEnvio.append('resposta',resp);
      console.log(resp);
      datosEnvio.append('nombre',this.Nombre);

      fetch(`http://192.168.210.160:8000/anadir` , {
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
      fetch('http://192.168.210.160:8000/preguntas/1')
      .then(res => res.json())
      .then((data) => {
        this.myjson = data;
        console.log(this.myjson)
        console.log(this.myjson.titulo)
      });
    },
  }

</script>

<template>
  <div>
      <h4>{{this.myjson.titulo}}</h4>
    el valor del prmer radio 
    {{this.respuestas.r0}}
      <div v-for="(pre,index) in this.myjson.preguntas" :key="index">
        <h3>{{pre.enunciado}}</h3>
						<input type="radio" :name="'r'+index" id="r1" value="r1"  v-model="respuestas[index]">
						<label >{{pre.r1}}</label>
            <input type="radio" :name="'r'+index" id="r2" value="r2"  v-model="respuestas[index]">
						<label >{{pre.r2}}</label>
            <input type="radio" :name="'r'+index" id="r3" value="r3"  v-model="respuestas[index]">
						<label >{{pre.r3}}</label>
            <input type="radio" :name="'r'+index" id="r4" value="r4"  v-model="respuestas[index]">
						<label >{{pre.r4}}</label>
            <input type="radio" :name="'r'+index" id="r5" value="r5"  v-model="respuestas[index]">
						<label >{{pre.r5}}</label>
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
