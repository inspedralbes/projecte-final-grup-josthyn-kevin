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
            fetch(`http://192.168.210.161:8000/anadir/usuario` , {
                method: 'POST',
                body: datosEnvio
            }).then(res => {
                return res.json();
            }).then(data => {
                console.log(data)
                console.log("HOLA" + data.status)
                //Si el mensaje de data es el que llega de symfony 
                //cambviamos el mensaje de la variable
                if (data.status=="El Usuario ya existe"){
                    this.estado="El usuario ya existe";
                }
                else{
                    this.conectado=true;
                    this.$router.push('/')
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
                <RouterLink to="/login">
                    <button id="login" class="btn btn-warning" value="login">Login</button>
                </RouterLink>
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
        margin-top: 2%;
        margin-right: 20%;
        margin-left: 38%;
        padding-bottom: 2%;
        background-color: blueviolet;
        border: 3px solid black;
        border-radius: 15px;
        width: 25%;
    }

    #log {
        margin-top: 9%;
        margin-left: 12%;
        margin-right: 12%;
    }

    #button {
        margin-top: 5%;
        margin-left: 1%;
        text-align: center;

    }

    #login {
        margin-left: 4%;
        width: 27%;
    }

    #res {
        margin-left: -14px;
    }

    #registerHelp {
        margin-top: 2%;
        margin-left: 4%;
        color: red;
    }


</style>