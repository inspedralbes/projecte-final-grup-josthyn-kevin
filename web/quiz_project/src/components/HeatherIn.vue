
<script>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <nav class="navbar navbar-light justify-content-end">
        <div id="hd">
            <form id="form">
                <button style="color: white" class="btn btn-dark"><RouterLink to="/">Home</RouterLink></button>
                <button class="btn btn-warning" type="button">Admin</button>
                <button class="btn btn-warning" type="button">Log in</button>
                <button class="btn btn-warning" type="button">Registarse</button>
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

    button. {
        margin-left: 3%;
        color: white;
    }


</style>
