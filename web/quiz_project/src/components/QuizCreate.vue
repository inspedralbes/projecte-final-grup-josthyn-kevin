<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
export default {
    data() {
      return {
        titulo: "",
        preguntas: [],
        respues:[],
        respuesta: "",
        enunciado: ""
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

        crearQuiz() {

            console.log(this.titulo);
            const respues = JSON.stringify(this.respues)
            const preguntas = JSON.stringify(this.preguntas);
            const pre = JSON.stringify(preguntas[{respues}])
            console.log(respues);
            console.log(pre)
        }
    }
}

//Quiz del usuario --> /quiz/usuario/id

//Quiz usuarios jugados --> /quiz/puntuacion/id


</script>

<template>

    <div id="f" v-if="this.estado === true">
        <label>Titulo de Quiz: </label>
        <input type="text" name="titulo" v-model="titulo"  class="info form-control" id="titulo" >
            <div id="pregunta" v-for="(item,index) in 10" :key="index">
                <label>Pregunta:</label>
                <input type="text" v-model="preguntas[index]" :name="'p' + index"  class="info form-control" id="preguntas" >
                 <div id="respuestas" v-for="(res,index) in 5" :key="index">
                    <label>Respuesta:</label>
                    <input type="text" v-model="this.respues[index]"  :name="'re' + [index+1]"   class="info form-control" id="respuesta" >
                    <label>Estado:</label>
                    <input type="text" v-model="this.respues[index]" :name="'e' + [index]"   class="info form-control" id="estado" >
                </div>
            </div>
            <button @click="crearQuiz()">crear quiz</button>
    </div>
    
</template>


<style scoped>

    #f {
        margin-top: 20%;
        margin-left: 5%;
        margin-right: 5%;
    }

    #pregunta {
        margin-left: 3%;
        margin-right: 3%;
    }

    #respuestas {
         margin-left: 5%;
         margin-right: 5%;
    }

    #preguntas {
        background-color: red;
    }

    #respuesta {
        background-color: blue;
    }

    #estado {
        background-color: yellow;
    }





</style>