
<script>
  export default {
    data() {
      return {
        myjson:{Quiz:{
        },
      
      },
      respuestas:[]
          
      }
    },methods: {
      enviarRespoestes() {
        console.log("hola");
        console.log(this.myjson.Quiz.idQuiz);
        console.log(this.myjson.Quiz.Preguntes[0].r1)



      //const datosEnvio = new FormData();
      //datosEnvio.append(this.myjson.Quiz.Preguntes[0].id);




      }
    },
   mounted () {
      fetch('./quiz.json')
      .then(res => res.json())
      .then((data) => {
        this.myjson = data;
        console.log(this.myjson)
        console.log(this.myjson.Quiz.Preguntes[3].id);
      });
    },
  }

</script>

<template>
  <div>
      <h4>{{this.myjson.Quiz.titulo}}</h4>
    el valor del prmer radio 
    {{this.respuestas.r0}}
      <div v-for="(pre,index) in this.myjson.Quiz.Preguntes" :key="index">
        <h3>{{pre.Enunciat}}</h3>
						<input type="radio" :name="'r'+index" id="r1" value="r1"  v-model="respuestas[index]">
						<label for="r1">{{pre.r1}}</label>
            <input type="radio" :name="'r'+index" id="r2" value="r2"  v-model="respuestas[index]">
						<label for="r2">{{pre.r2}}</label>
            <input type="radio" :name="'r'+index" id="r3" value="r3"  v-model="respuestas[index]">
						<label for="r3">{{pre.r3}}</label>
            <input type="radio" :name="'r'+index" id="r4" value="r4"  v-model="respuestas[index]">
						<label for="r4">{{pre.r4}}</label>
            <input type="radio" :name="'r'+index" id="r5" value="r5"  v-model="respuestas[index]">
						<label for="r5">{{pre.r5}}</label>
        <br>
        <br>
      </div>

      <button id="EnviarRes" type="button" @click="enviarRespoestes()"  class="btn btn-primary">Terminar Quiz!</button>

  </div>
</template>
