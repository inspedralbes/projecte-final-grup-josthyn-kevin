
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
    }
}
</script>
<template >
    <header id="main-header">
		<a id="logo-header" href="#">
			<span class="site-name">QuizDaw</span>
			<span class="site-desc">La mejor web de Quiz</span>
		</a>
		<nav>
			<ul v-if="!this.estado === true">
				<li><RouterLink to="/">Inicio</RouterLink></li>
				<li><RouterLink to="/admin">Admin</RouterLink></li>
				<li><RouterLink to="/login">Login</RouterLink></li>
                <li><RouterLink to="/register">Registro</RouterLink></li>
			</ul>
            <ul v-else>
                <li><RouterLink :to="`/usuario/${this.idUserL}`">Inicio</RouterLink></li>
				<li><RouterLink :to="`/datosUs/${this.idUserL}`">perfil</RouterLink></li>
                <li><button @click="logout" class="btn btn-warning" type="button">Log out</button></li>
            </ul>
		</nav><!-- / nav -->

	</header>
    <!--
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
                    <p>{{this.Usuario}}</p>    
                    <RouterLink :to="`/usuario/${this.idUserL}`"><button style="color: white" class="btn btn-dark">Home</button></RouterLink>
                    <RouterLink :to="`/datosUs/${this.idUserL}`"><button style="color: white" class="btn btn-warning">Perfil</button></RouterLink>
                    <button @click="logout" class="btn btn-warning" type="button">Log out</button>
                </form>
            </div>
        </nav>
    </header>
    -->
</template>


<style scoped>

    
    form {
        margin-left: -40%;
        margin-right: 0%;
    }

    p {
	margin: 0 0 1.5em 0;
    }

    button {
        margin-left: 3%;
        color: white;
    }

    #main-header {
	background: #333;
	color: white;
	height: 80px;
    width: 100%; /* hacemos que la cabecera ocupe el ancho completo de la página */
	left: 0; /* Posicionamos la cabecera al lado izquierdo */
	top: 0; /* Posicionamos la cabecera pegada arriba */
	position: fixed; /* Hacemos que la cabecera tenga una posición fija */
}	
	#main-header a {
		color: white;
	}

    #logo-header {
	float: left;
	padding: 15px 0 0 20px;
	text-decoration: none;
}
	#logo-header:hover {
		color: #0b76a6;
	}
	
	#logo-header .site-name {
		display: block;
		font-weight: 700;
		font-size: 1.2em;
	}
	
	#logo-header .site-desc {
		display: block;
		font-weight: 300;
		font-size: 0.8em;
		color: #999;
	}

    nav {
	float: right;
}
	nav ul {
		margin: 0;
		padding: 0;
		list-style: none;
		padding-right: 20px;
	}
	
		nav ul li {
			display: inline-block;
			line-height: 80px;
		}
			
			nav ul li a {
				display: block;
				padding: 0 10px;
				text-decoration: none;
			}
			
				nav ul li a:hover {
					background: #0b76a6;
				}

</style>
