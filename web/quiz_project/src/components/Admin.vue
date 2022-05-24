<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
export default {
    data() {
        return {
            Correo: "",
            Contrasenya: "",
            estadoAd: "",
            logueado: false
        }
    }, computed: {
        ...mapStores(sessioStore)
    },methods: {
        loginAdmin() {
            const datosEnvio = new FormData();
            datosEnvio.append("correo",this.Correo);
            datosEnvio.append("contrasena",this.Contrasena);
            datosEnvio.append("apellido",this.Apellido);
            datosEnvio.append("nombre",this.Nombre)
            fetch(`http://127.0.0.1:8000/login`, {
                method: 'POST',
                body: datosEnvio
            }).then(res => {
                return res.json();
            }).then(data => {
                console.log(data);
                if(data.admin != true) {
                    this.estadoAd = "Este usuario no es administrador"
                } else {
                    this.logueado = true;
                    this.sessioStore.set({});
                    this.sessioStore.set({idAdmin:data.id,estadoAdmin:this.logueado,username:data.nombre, apellido: data.apellido,contrasena: data.contrasena, correo: data.correo});
                    this.$router.push("/adminUs")
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
                <h1>Administrador</h1>
                <label>Correo </label>
                <input type="email" class="form-control" id="Correo" aria-describedby="emailHelp"  v-model="Correo">
                <br>
                <b><label>Contrasenya</label></b>
                <input type="text" class="form-control" id="Contrasena" v-model="Contrasenya">
                <br>
            </div>
            <div id="button">
                <button id="login" type="button" class="btn btn-warning"  @click="loginAdmin()">Log In</button>
                <br>
                <h5 id="error">{{this.estadoAd}}</h5>
            </div>
        </div> 
    </div>        
</template>

<style scoped>

     body {
        background-image: url("");
        position: fixed;
        width: 100%;
    }

    #container {
        margin-top: 11.4%;
        margin-right: 30%;
        margin-left: 38%;
        margin-bottom: 11.100%;
        color: white;
        padding-bottom: 4%;
        width: 25%;
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
        text-align: center;
       
    }

    #registerHelp {
        margin-left: 1%;
        color: white;
    }

    #reg {
        margin-left: 3%;
    }

    #error {
        color: red;
    }
</style>