
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
        }
    },
    methods: {
        login() {

            const datosEnvio = new FormData();
            datosEnvio.append("correo",this.Correo);
            datosEnvio.append("contrasena",this.Contrasena);
            datosEnvio.append("apellido",this.Apellido);
            datosEnvio.append("nombre",this.Nombre)
            fetch(`http://192.168.210.161:8000/login`, {
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
            <h1>Log In</h1>
            <div>
                 <label> Correo</label>
                <input id="Correo" type="text" v-model="Correo"  >
                <br>
                 <label>Contrasenya</label>
                <input id="Contrasenta" type="password" v-model="Contrasena">
            </div>
            <button id="login" @click="login()">Login</button>
            <RouterLink to="/register">
                <button id="register" value="register">Register</button>
            </RouterLink>
            <p>{{this.estado}}</p>
        </div>
</template>
