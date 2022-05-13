<script>
import { RouterLink, RouterView } from 'vue-router'
import Login from '../components/LogIn.vue'
import Heather from '../components/HeatherIn.vue'
export default {
  components: {
    Login,
    Heather
  }
}

</script>


<template>
    <main>
        <heather/>
        <login/>
    </main>
</template>