<script>
import { RouterLink, RouterView } from 'vue-router'
export default {
    data() {
        return {
            Nom: "",
            Apellido: "",
            Correo: "",
            Contraseny: "",
            estatError: false,
            msgError: [],
            estado:"",
            conectado:"",
        }
    },methods: {
        Registrarse() {
            const datosEnvio = new FormData();
            datosEnvio.append('nombre',this.Nombre);
            datosEnvio.append('apellido',this.Apellido);
            datosEnvio.append('correo',this.Correo);
            datosEnvio.append('contrasena',this.Contraseny)
            fetch(`http://localhost:8000/anadir/usuario` , {
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
                    this.estado="ERROR DE AUTENTIFICACION";
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
        <div>
            <h1>Register</h1>
            <div>
                <label>Nombre</label>
                <input id="Nombre" type="text" v-model="Nombre">
                <br>
                <label>Apellido</label>
                <input id="Apellido" type="text" v-model="Apellido" >
                <br>
                <label>Correo</label>
                <input id="Correo" type="text" v-model="Correo" >
                <br>
                <label>Contrasenya</label>
                <input id="Contrasenta" type="text" v-model="Contrasenya">
            </div>
            <button id="register" value="register" @click="Registrarse()">Register</button>
            <RouterLink to="/login">
                <button id="login" value="login">Login</button>
            </RouterLink>
            <!--Mostrara el mensaje dependiendo del mensaje que envia symfony-->
            <br>
            {{this.estado}}
        </div>
</template>
