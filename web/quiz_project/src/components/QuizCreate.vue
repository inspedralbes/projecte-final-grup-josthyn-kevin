<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
export default {
    data() {
      return {
        usuario: "",
        titulo: "",
        respues: 
            [
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

            //const respues = JSON.stringify(this.respues);

            fetch(`http://proyectefinaljoskevback.alumnes.inspedralbes.cat/anadir/quiz` , {
                method: 'POST',
                body: JSON.stringify({usuario:this.usuario,titulo: this.titulo,preguntas: this.respues}),   
              }).then(res => {
                return res.json();
              }).then(data => {
              });
            }
    }
}

//Quiz del usuario --> /quiz/usuario/id

//Quiz usuarios jugados --> /quiz/puntuacion/id


</script>

<template>

    <div id="f" v-if="this.estado === true" class="contenidor">
        <h4 style="color:yellow">Titulo de Quiz: </h4>
        <input type="text" name="titulo" v-model="titulo"  class="info form-control" id="titulo" >

            <div class="pregunta" v-for="(item,indexPR) in 5" :key="indexPR">
            Introduce 0 si es falso i 1 es verdadero
                <h5>Pregunta:</h5>
                <input type="text" v-model="this.respues[indexPR].enunciado" :name="'p' + indexPR"  class="info form-control" id="preguntas" >
                 <div class="respuestas" v-for="(res,indexRESP) in 5" :key="indexRESP">
                    <h5>Respuesta:</h5>
                    <input type="text" v-model="this.respues[indexPR].respuestas[indexRESP].respuesta"  :name="'re' + indexI + '_' + indexJ "   class="info form-control" id="respuesta" >
                    <h5>Estado:</h5>
                    <input id="estado" type="text" v-model="this.respues[indexPR].respuestas[indexRESP].estado"  :name="'e' + indexI + '_' + indexJ "   class="info form-control">  
                </div>
            </div>
            <button class="btn btn-warning" @click="crearQuiz()">crear quiz</button>
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

    label {
        color: #5C1473;
    }

    #estado {
        width: 10%;
    }

    .pregunta {
        margin-left: 3%;
        margin-right: 3%;
        margin-top: 3%;
        padding: 4%;
        background-color: yellow;
        border: 4px solid black;
        border-radius: 25px;
    }

    .respuestas {
         margin-left: 5%;
         margin-right: 5%;
         
    }

    button {
        margin-left: 47%;
        margin-top: 3%;
    }

   




</style>