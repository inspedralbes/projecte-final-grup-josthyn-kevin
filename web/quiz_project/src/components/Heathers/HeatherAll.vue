
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
        this.Cambiado = this.sessioStore.get.cambiado;
		this.apellido = this.sessioStore.get.apellido;
		this.idAdminL = this.sessioStore.get.idAdmin;
		this.estadoAd = this.sessioStore.get.estadoAdmin;
    }
}
</script>
<template >
    <header id="main-header">
		<div id="logo-header" >
			<span class="site-name">QuizDaw</span>
		</div>
		<nav>
			<ul v-if="this.estado === true && !this.estadoAd === true ">
				<li style="color:yellow">Usuario: {{this.Usuario}} {{this.apellido}}</li>
                <li><RouterLink :to="`/${this.idUserL}`">Inicio</RouterLink></li>
				<li><RouterLink :to="`/datosUs/${this.idUserL}`">perfil</RouterLink></li>
                <li><button @click="logout" class="btn btn-warning" type="button">Log out</button></li>
			</ul>
			<ul v-else-if="this.estadoAd === true && !this.estado === true">
				<li style="color:yellow">Usuario: {{this.Usuario}} {{this.apellido}}</li>
                <li><RouterLink :to="`/adminUs`">Inicio</RouterLink></li>
                <li><button @click="logout" class="btn btn-warning" type="button">Log out</button></li>
			</ul>
            <ul v-else>
				<li><RouterLink to="/admin">Admin</RouterLink></li>
				<li><RouterLink to="/login">Login</RouterLink></li>
                <li><RouterLink to="/register">Registro</RouterLink></li>
            </ul>
		</nav>
	</header>
</template>


<style scoped>

    button {
        margin-left: 3%;
        color: white;
    }

    #main-header {
	background: #5C1473;
	color: white;
	height: 80px;
    width: 100%; 
	left: 0;
	top: 0;
	position: fixed;
	z-index: 2;
}	
	#main-header a {
		color: white;
	}

    #logo-header {
	float: left;
	padding: 15px 20px;

    }

	#logo-header:hover {
		color: yellow;
	}
	
	#logo-header .site-name {
		display: block;
	}
	
	#logo-header .site-desc {
		display: block;
		color: white;
	}

    nav {
	float: right;
}
	nav ul {
		margin: 0;
		padding: 0;
	
		padding-right: 20px;
	}
	
		nav ul li {
			display: inline-block;
			line-height: 80px;
		}
			
			nav ul li a {
				display: block;
				padding: 0 10px;
				
			}
			
				nav ul li a:hover {
					background: #BBB933;
				}

</style>
