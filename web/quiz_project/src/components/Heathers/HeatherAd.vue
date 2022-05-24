<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
</script>


<template>
    <header id="main-header">
		<div id="logo-header" >
			<span class="site-name">QuizDaw</span>
		</div>
		<nav>
			<ul v-if="!this.estado === true">
				<li><RouterLink to="/">Home</RouterLink></li>
				<li><RouterLink to="/login">Log In</RouterLink></li>
                
			</ul>
		</nav>
	</header>
</template>

<style scoped>
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
