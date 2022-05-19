
<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
export default {
    data() {
      return {
        Usuario: "",
        estado: "",
      }
    },
    methods: {
        logout() {
            this.estado=false;
            this.sessioStore.set({idUser:"",estadoLogin:this.estado,username:"",apellido:"", contrasena:"",correo:""})
            this.$router.push("/");
        }
    },
     computed: {
        ...mapStores(sessioStore)
    },beforeMount() {
        //MIRO EL LOCAL STORAGE, SI HAY ALGO LO CARGO
        this.Usuario = this.sessioStore.get.username;
        this.estado = this.sessioStore.get.estadoLogin;
        this.idUserL = this.sessioStore.get.idUser; 
    }
}
</script>
<template >
    <header>
        <nav class="navbar navbar-light justify-content-end">
            <div id="hd">
                <form v-if="!this.estado === true" class="form">    
                    <RouterLink to="/"><button style="color: white" class="btn btn-dark">Home</button></RouterLink>
                    <RouterLink to="/admin"><button class="btn btn-warning" type="button">Admin</button></RouterLink>
                    <RouterLink to="/login"><button class="btn btn-warning" type="button">Log in</button></RouterLink>
                    <RouterLink to="/register"><button class="btn btn-warning" type="button">Registarse</button></RouterLink>
                </form>
                <form v-else class="form">
                    <button>{{this.Usuario}}</button>    
                    <RouterLink :to="`/usuario/${this.idUserL}`"><button style="color: white" class="btn btn-dark">Home</button></RouterLink>
                    <RouterLink :to="`/datosUs/${this.idUserL}`"><button style="color: white" class="btn btn-warning">Perfil</button></RouterLink>
                    <button @click="logout" class="btn btn-warning" type="button">Log out</button>
                </form>
            </div>
        </nav>
    </header>
</template>


<style scoped>
    nav {
        background-color: blueviolet;
        height: 7vh;
    }

    form {
        margin-left: -40%;
        margin-right: 0%;
    }

    button {
        margin-left: 3%;
        color: white;
    }
</style>
