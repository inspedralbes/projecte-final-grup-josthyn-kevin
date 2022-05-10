<script>
export default {
    data() {
        return {
            Nom: "",
            Apellido: "",
            Correo: "",
            Contraseny: ""
        }
    },methods: {
        Registrarse() {   
            const datosEnvio = new FormData();
            datosEnvio.append('nombre',this.Nombre);
            datosEnvio.append('apellido',this.Apellido);
            datosEnvio.append('correo',this.Correo);
            datosEnvio.append('contrasena',this.Contraseny)
            fetch(`http://192.168.210.161:8000/anadir/usuario` , {
                method: 'POST',
                body: datosEnvio
            }).then(function(res) {
                return res.json();
            }).then(function(data) {
                console.log(data)
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
        </div>
</template>
