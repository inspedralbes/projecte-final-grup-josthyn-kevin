<script>
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
            <h1>Admin</h1>
            <div>
                 <label> Correo</label>
                <input id="Correo" type="text" value="Correo" >
                <br>
                 <label>Contrasenta</label>
                <input id="Contrasenta" type="text" value="Contrasenya">
            </div>
            <button id="login">Log In</button>
        </div>
</template>
