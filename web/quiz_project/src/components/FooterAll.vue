<script>
import { RouterLink, RouterView } from 'vue-router'
</script>


<template>
    <footer>
            <div id="cont_footer" class="grid-container">
                    <div id="info" class="grid-item">
                        <b><p>QUIENES SOMOS? </p></b>
                        <b><p>Somos dos estudiantes de GS DAW (Josthyn,kevin)
                            . Creamos una pagina web con la posibilidad de crear y realizar quidz.
                            Es una ide nuestra pensada en INS pedralbes
                        </p></b>
                    </div>
                    <div id="contacto" class="grid-item">
                        <b><p>CONTACTO</p></b>
                        <div class="grid-info-container">
                            <div class="grid-info-item">
                                <br>
                                <b><p>Josthyn</p></b>
                                <b><p>Email: jost243@gmail.com</p></b>
                                <b><p>Tel: 674678488</p></b>
                            </div>
                            <div class="grid-info-item">
                                <b><p>Josthyn</p></b>
                                <b><p>Email: jost243@gmail.com</p></b>
                                <b><p>Tel: 674678488</p></b>
                            </div>
                        </div>
                    </div>
                    <div id="copy" class="grid-item">
                    </div>
            </div>
        </footer>
</template>

<style scoped>

footer {
        background-color: red;
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 200px;
        background-color: blueviolet;
    }

    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        margin-right: 20%;
        margin-left: 6%;
        margin-top: 1%;
        justify-content: center;
    }

    .grid-item {
        margin-right: 10%;
        margin-left: 30%;
    }

    .grid-info-container {
        display: grid;
        grid-template-columns: auto auto;
        justify-content: baseline;
        margin-left: -20;
        padding-right: -10;
    }

    .grid-info-item {
        justify-content: space-between;
    }

    p {
        color: black;
    }

</style>