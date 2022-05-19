<script>
import { RouterLink, RouterView } from 'vue-router'
import { sessioStore } from '@/stores/sessioStore'
import { mapStores } from 'pinia'
</script>


<template>
    <header>
        <nav class="navbar navbar-light justify-content-end">
            <div id="hd">
                <form id="form">
                    <RouterLink to="/"><button style="color: white" class="btn btn-dark">Home</button></RouterLink>
                    <RouterLink to="/login"><button style="color: white" class="btn btn-warning">Log In</button></RouterLink>
                    <RouterLink to="/register"><button class="btn btn-warning" type="button">Registarse</button></RouterLink>
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
