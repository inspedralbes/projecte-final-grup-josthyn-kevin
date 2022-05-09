
<script>
import { RouterLink, RouterView } from 'vue-router'
export default {

    data() {
        return {
            Correo: "",
            Contrasenya: ""
        }
    }
}
</script>

<template>   
        <div>
            <h1>Log In</h1>
            <div>
                 <label> Correo</label>
                <input id="Correo" type="text" value="Correo" >
                <br>
                 <label>Contrasenta</label>
                <input id="Contrasenta" type="text" value="Contrasenya">
            </div>

            <button id="login">Login</button>
            <RouterLink to="/register">
                <button id="register" value="register">Register</button>
            </RouterLink>
        </div>
</template>
