<script>
import { RouterLink, RouterView } from 'vue-router'
export default {
    data() {
        return {
            Nom: "",
            Apellido: "",
            Correo: "",
            Contrasenya: "",
            estatError: false,
            estado:"",
            conectado:"",
        }
    },methods: {
        Registrarse() {
            const datosEnvio = new FormData();
            datosEnvio.append('nombre',this.Nombre);
            datosEnvio.append('apellido',this.Apellido);
            datosEnvio.append('correo',this.Correo);
            datosEnvio.append('contrasena',this.Contrasenya)
            fetch(`http://127.0.0.1:8000/anadir/usuario` , {
                method: 'POST',
                body: datosEnvio
            }).then(res => {
                return res.json();
            }).then(data => {

                //Si el mensaje de data es el que llega de symfony 
                //cambviamos el mensaje de la variable
                if (data.status=="El Usuario ya existe"){
                    this.estado="El usuario ya existe";
                }
                else{
                    this.conectado=true;
                    this.$router.push('/login')
                    //this.estado="Te has registrado correctament";
                }
            });
        }
    },
}
</script>
<template>   
        <div id="container">
            <div id="log">
                <h1>Register</h1>
                <label>Nombre</label>
                <input id="Nombre" type="text" class="form-control" v-model="Nombre" required>
                <label>Apellido</label>
                <input id="Apellido" type="text" class="form-control" v-model="Apellido" required>
                <label>Correo</label>
                <input id="Correo" type="text" class="form-control" v-model="Correo" required>
                <label>Contrasenya</label>
                <input id="Contrasenta" class="form-control" type="text" v-model="Contrasenya" required>
            </div>
            <div id="button">
                <button id="register" class="btn btn-warning" value="register" @click="Registrarse()">Registrarse</button>
                <!--Mostrara el mensaje dependiendo del mensaje que envia symfony-->
                <br>
                <div id="res">
                    <h5 id="registerHelp">{{this.estado}}</h5>
                </div>
            </div>
        </div>
        
</template>

<style scoped>

    body {
        background-image: url("fondo.jpg");
        position: fixed;
        width: 100%;
    }

   #container {
        margin-right: 15%;
        margin-left: 20%;
        margin-top: 25%;
        margin-bottom: 8.06%;
        color: white;
        padding-bottom: 3.540%;
        width: 60%;
        background-color: #5C1473;
        border: 5px solid black;
        border-radius: 15px;
    }

    #log {
        margin-top: 12%;
        margin-left: 12%;
        margin-right: 12%;
    }

    #button {
        margin-left: 2%;
        margin-top: 7%;
        text-align: center;
    
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


           @media screen and (min-width: 600px){
       #container {
        margin-top: 20%;
        margin-left: 25%;
        width: 50%;
        }

    }
     @media screen and (min-width: 800px){
       #container {
        /*margin-top: 15%;*/
        margin-left: 30%;
        width: 40%;
        }
    }
    @media screen and (min-width: 992px){
       #container {
        margin-top: 10%;
        margin-left: 37%;
        width: 25%;
        }
    }


</style>