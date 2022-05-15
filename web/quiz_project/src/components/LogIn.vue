
<script>
import { RouterLink, RouterView } from 'vue-router'
export default {
    data() {
        return {
            Correo: "",
            Contrasena: "",
            Nombre: "",
            Apellido: "",
            estado: "",
            URl: "http://192.168.210.161:8000/login"
        }
    },
    methods: {
        login() {

            const datosEnvio = new FormData();
            datosEnvio.append("correo",this.Correo);
            datosEnvio.append("contrasena",this.Contrasena);
            datosEnvio.append("apellido",this.Apellido);
            datosEnvio.append("nombre",this.Nombre)
            fetch(`http://localhost:8000/login`, {
                method: 'POST',
                body: datosEnvio
            }).then(res => {
                return res.json();
            }).then(data => {
                console.log(data);
                console.log(data.correo);
                if(data.status == "Correo no registrado o incorrecto") {
                    this.estado = "Correo no registrado o incorrecto";
                } else if(data.status == "Contraseña incorrecta") {
                    this.estado = "Contraseña Incorrecta";
                } else if (data.correo == this.Correo && data.contrasena == this.Contrasena) {
                    this.$router.push('/');
                }
            })
        }
    },
}
</script>

<template>
    <div>
        <div  id="container">
            <div id="log">
                <h1>Log In</h1>
                <label>Correo </label>
                <input type="email" class="form-control" id="Correo" aria-describedby="emailHelp"  v-model="Correo">
                <br>
                <b><label>Contrasenya</label></b>
                <input type="password" class="form-control" id="Contrasena" v-model="Contrasena">
                <br>
            </div>
            <div id="button">
                <button id="login" type="button" class="btn btn-warning"  @click="login()">Log In</button>
                 <RouterLink to="/register">
                    <button type="button" class="btn btn-warning" id="reg">Registrarse</button>
                 </RouterLink>   
                <br>
                <div id="res">
                    <small id="registerHelp" class="form-text ">Si no tienes cuenta registrate</small>
                </div>
                <h5 id="error">{{this.estado}}</h5>
            </div>
        </div> 
    </div>    
</template>


<style scoped>

    body {
        background-image: url("../../public/fondo.jgp");
        position: fixed;
        width: 100%;
    }

    #container {
        margin-top: 6%;
        margin-right: 30%;
        margin-left: 38%;
        margin-bottom: 12%;
        padding-bottom: 4%;
        width: 25%;
        background-color: blueviolet;
        border: 3px solid black;
        border-radius: 15px;
    }

    #log {
        margin-top: 12%;
        margin-left: 12%;
        margin-right: 12%;
    }

    #button {
        margin-left: 2%;
        text-align: center;
       
    }

    #registerHelp {
        margin-left: 1%;
        color: black;
    }

    #res {
        margin-top: 2%;
    }

    #reg {
        margin-left: 3%;
    }

    #error {
        color: red;
    }

</style>
