<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
export default {
    data() {
      return {
        disabled: 0,
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
        cambiarInformacion() {
         //   const datosEnvio = new FormData();
            var datosEnvio= new URLSearchParams();
            datosEnvio.append("contrasena",this.Contrasena);
            
            datosEnvio.append("apellido",this.apellido);
           
            datosEnvio.append("nombre",this.Usuario);
            
            datosEnvio.append("correo",this.Correo);
        
            fetch(`http://192.168.1.148:8000/modificar/usuario/${this.idUserL}`, {
                method: 'POST',
                body: datosEnvio
            }).then(res => {
                return res.json();
            }).then(data => {
                if(this.estado == true && data.status == "Usuario modificado correctamente") {
                    this.sessioStore.set({})
                    this.$router.push("/login");
                }
            })
        }
    },
}

//Quiz del usuario --> /quiz/usuario/id

//Quiz usuarios jugados --> /quiz/puntuacion/id


</script>

<template>

    <div v-if="this.estado === true">
        <div id="container">
            <div id="log">
                <h1>Register</h1>
                <label>Nombre</label>
                <input id="nombre" type="text" class="form-control" v-model="this.Usuario" :disabled="disabled == 0">
                <label>Apellido</label>
                <input id="apellido" type="text" class="form-control" v-model="this.apellido" :disabled="disabled == 0">
                <label>Correo</label>
                <input id="correo" type="text" class="form-control" v-model="this.Correo" :disabled="disabled == 0">
                <label>Contrasenya</label>
                <input id="contrasena" class="form-control" type="text" v-model="this.Contrasena" :disabled="disabled == 0">
                <div id="button">
                    <button @click="cambiarInformacion()" class="btn btn-warning" id="cambiar" :disabled="disabled == 0">Cambiar datos</button>
                    <button @click="disabled = (disabled + 1) % 2" class="btn btn-warning">Habilitar campos</button>
                </div>
                <div id="opcions">
                    <RouterLink :to="`/quizCreated/${this.idUserL}`"><button class="btn btn-warning">Crear Quiz</button></RouterLink>
                    <RouterLink :to="`/quizCreadas/${this.idUserL}`"><button class="btn btn-warning">Quiz creados</button></RouterLink>
                    <RouterLink :to="`/partidas/${this.idUserL}`" ><button class="btn btn-warning">Quiz Jugados</button></RouterLink>
                </div>
            </div>
        </div>
    </div>
    
</template>


<style scoped>

    #container {
        margin-top: 7.100%;
        margin-right: 30%;
        margin-left: 15%;
        margin-bottom: 5.309%;
        color: white;
        padding-bottom:1%;
        width: 70%;
        background-color: #5C1473;
        border: 5px solid black;
        border-radius: 15px;
    }

    #log {
        margin-top: 5%;
        margin-left: 12%;
        margin-right: 12%;
        margin-bottom: 4%;
    }

    #button {
        margin-left: 2%;
        margin-top: 3%;
        text-align: center;
       
    }

    #opcions {
        display: flex;
        justify-content: space-between;
        margin-top: 5%;
    }

    #cambiar {
        margin-right: 2%;
    }

    #res {
        margin-top: 2%;
    }

    #reg {
        margin-left: 3%;
    }

    #error {
        margin-left: 1%;
        color: red;
    }


</style>
