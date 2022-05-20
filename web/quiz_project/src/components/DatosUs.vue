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
            console.log(this.Contrasena);
            datosEnvio.append("apellido",this.apellido);
            console.log(this.apellido)
            datosEnvio.append("nombre",this.Usuario);
            console.log(this.Usuario)
            datosEnvio.append("correo",this.Correo);
            console.log(datosEnvio)
            fetch(`http://proyectefinaljoskevback.alumnes.inspedralbes.cat/modificar/usuario/${this.idUserL}`, {
                method: 'POST',
                body: datosEnvio
            }).then(res => {
                return res.json();
            }).then(data => {
                console.log(data);
                console.log(this.estado);
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
        <h2>{{this.Usuario}} {{this.apellido}}</h2>
        <button>Crear Quiz</button>
        <button>Quiz creados</button>
        <button>Quiz Jugados</button>
        <div>
            <label>Nombre Usuario</label>
            <input type="text" v-model="this.Usuario"  class="info form-control" id="nombre" :disabled="disabled == 0">
            <label>Apellido Usuario</label>
            <input type="text" v-model="this.apellido" class="info form-control" id="apellido" :disabled="disabled == 0">
            <label>Correo</label>
            <input type="text" v-model="this.Correo" class="info form-control" id="correo" :disabled="disabled == 0">
            <label>Contrasenya</label>
            <input type="text" v-model="this.Contrasena" class="info form-control" id="contrasena" :disabled="disabled == 0">
            <button @click="cambiarInformacion()" class="info" id="contrasena" :disabled="disabled == 0">Cambiar datos</button>
            <button @click="disabled = (disabled + 1) % 2">Habilitar campos</button>
        </div>
    </div>
    
</template>


<style scoped>


</style>
