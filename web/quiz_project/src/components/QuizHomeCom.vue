<script>
     export default {
    data() {
      return {
      myjson: [],
      respuestas:[],
      Nombre: "",
      }
    },
   mounted () {
      fetch('http://proyectefinaljoskevback.alumnes.inspedralbes.cat/preguntas/1')
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
    
    
    <main>

    <h4>Quiz</h4>

    <a :href="'/pregunta/' + myjson.id_quiz">
        <div>
            <h5>{{this.myjson.titulo}}</h5>
        </div>
    </a>

    </main>

</template>

<style scoped>
    div {
        margin: 20%;
        border: 2px solid black
    }
</style>