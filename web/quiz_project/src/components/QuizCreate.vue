<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
export default {
    data() {
      return {
        usuario: "",
        titulo: "",
        respues: [
            {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            },
            {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            },
            {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            },
                {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            },
            {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            },
            {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            },
                {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            },
            {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            },
            {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            },
            {
            enunciado:'',
            respuestas:[{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''},{respuesta:'',estado:''}]
            }
        ],
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
        this.usuario = this.sessioStore.get.idUser; 
    },methods: {

        crearQuiz() {

           // const respues = JSON.stringify(this.respues);
            const datosEnvio = new FormData();
            datosEnvio.append('usuario',this.usuario)
            datosEnvio.append('titulo',this.titulo)
            console.log(this.titulo)
            datosEnvio.append('preguntas',this.respues)
            console.log(this.respues);
            fetch(`http://192.168.210.161:8000/anadir/quiz` , {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: datosEnvio,
              }).then(res => {
                return res.json();
              }).then(data => {
                console.log(data)
              });
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
            <div id="pregunta" v-for="(item,indexPR) in 1" :key="indexPR">
                <label>Pregunta:</label>
                <input type="text" v-model="this.respues[indexPR].enunciado" :name="'p' + indexPR"  class="info form-control" id="preguntas" >
                 <div id="respuestas" v-for="(res,indexRESP) in 5" :key="indexRESP">
                    <label>Respuesta:</label>
                    <input type="text" v-model="this.respues[indexPR].respuestas[indexRESP].respuesta"  :name="'re' + indexI + '_' + indexJ "   class="info form-control" id="respuesta" >
                    <label>Estado:</label>
                    <input type="text" v-model="this.respues[indexPR].respuestas[indexRESP].estado"  :name="'e' + indexI + '_' + indexJ "   class="info form-control" id="estado" >
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