
<script>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <nav class="navbar navbar-light justify-content-end">
        <div id="hd">
            <form id="form">
                <RouterLink to="/"><button style="color: white" class="btn btn-dark">Home</button></RouterLink>
                <RouterLink to="/admin"><button class="btn btn-warning" type="button">Admin</button></RouterLink>
                <RouterLink to="/login"><button class="btn btn-warning" type="button">Log in</button></RouterLink>
                <RouterLink to="/register"><button class="btn btn-warning" type="button">Registarse</button></RouterLink>
            </form>
        </div>
    </nav>
</template>

<style scoped>

    
    nav {
        background-color: rgb(155, 82, 224);
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
