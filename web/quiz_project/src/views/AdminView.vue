<script>
import { RouterLink, RouterView } from 'vue-router'
import Admin from '../components/Admin.vue'
import Heather from '../components/HeatherIn.vue'
export default {
  components: {
    Admin,
    Heather
  }
}

</script>


<template>
    <main>
        <heather/>
        <admin/>
    </main>
</template>