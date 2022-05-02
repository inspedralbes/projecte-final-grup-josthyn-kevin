
<script>
  export default {
    data() {
      return {
        myjson: [],      
      };
    },
    mounted () {
       console.log("patata")
      fetch('./quiz.json')
      .then(res => res.json())
      .then((data) => {
        this.myjson = data;
        console.log(this.myjson)
       
      });
    },
  }

</script>

<template>

  <div>


  </div>




</template>
