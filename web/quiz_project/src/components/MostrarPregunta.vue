
<script>
  export default {
    data() {
      return {
        myjson:{Quiz:{
        }
      }}
    },
   mounted () {
      fetch('./quiz.json')
      .then(res => res.json())
      .then((data) => {
        this.myjson = data;
        console.log(this.myjson)
        console.log(this.myjson.Quiz.Preguntes[1].id)
      });
    },
  }

</script>

<template>
  <div>
      <h4>{{this.myjson.Quiz.titulo}}</h4>

      <div v-for="(pre,index) in this.myjson.Quiz.Preguntes" :key="index">
        <h3>{{pre.Enunciat}}</h3>
						<input type="radio" :name="'r'+index" id="r1" value="r1">
						<label for="r1">{{pre.r1}}</label>
            <input type="radio" :name="'r'+index" id="r2" value="r2">
						<label for="r2">{{pre.r2}}</label>
            <input type="radio" :name="'r'+index" id="r3" value="r3">
						<label for="r3">{{pre.r3}}</label>
            <input type="radio" :name="'r'+index" id="r4" value="r4">
						<label for="r4">{{pre.r4}}</label>
            <input type="radio" :name="'r'+index" id="r5" value="r5">
						<label for="r5">{{pre.r5}}</label>
        <br>
        <br>
      </div>
  </div>
</template>
