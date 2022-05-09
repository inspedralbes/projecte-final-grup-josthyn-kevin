
<script>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <nav class="navbar navbar-light justify-content-end">
        <div id="hd">
            <form id="form">
                <RouterLink to="/"><button style="color: white" class="btn btn-dark">Home</button></RouterLink>
                <RouterLink to="/login"><button class="btn btn-warning" type="button">Admin</button></RouterLink>
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

    button {
        margin-left: 3%;
        color: white;
    }

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: blueviolet;
        display: table;
        transition: opacity .3s ease;
    }

    .modal.warpper {
        display: table-cell;
        vertical-align: middle;
    }


</style>
