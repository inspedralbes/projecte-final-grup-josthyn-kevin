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
    },
}

//Quiz del usuario --> /quiz/usuario/id

//Quiz usuarios jugados --> /quiz/puntuacion/id


</script>

<template>

    <div id="f" v-if="this.estado === true">
        <label>Titulo de Quiz: </label>
        <input type="text" v-model="this.Titulo"  class="info form-control" id="titulo" >
            <div v-for="(item,index) in 10" :key="index">
                <label>Pregunta:</label>
                <input type="text" v-model="this.Pregunta"  class="info form-control" id="nombre" >
                 <div v-for="(item,index) in 5" :key="index">
                    <label>Respuesta:</label>
                    <input type="text" v-model="this.Respuesta"  class="info form-control" id="nombre" >
                    <label>Estado:</label>
                    <input type="text" v-model="this.Estado"  class="info form-control" id="nombre" >
                
                </div>

            </div>
    </div>
    
</template>


<style scoped>

    #f {
        margin-top: 20%;
    }



</style>