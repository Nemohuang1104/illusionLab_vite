<template>
  <div class="h1_line">
    <h1>{{Title}}</h1>

  </div>
</template>

<script setup>
  import { defineProps } from 'vue';


  const props = defineProps({
    Title: {
      type: String,
      required: true
    }
});
</script>


<style lang="scss" scoped>
@import "../assets/style";

.h1_line{
  width: 400px;
  border-bottom: 1px solid white;
  margin-top: 15vh;
}

h1{
 font-family: map-get($map: $fontStyle, $key: style_2);
 font-size: map-get($map: $fontSize, $key: h1);
 font-weight: 900;
 background: url(../assets/images/LC_text_bg.png) lightgray 50% / cover no-repeat;
 background-clip: text;
 color: transparent;
 width: 150px;
 margin-bottom: 10px;
}

</style>