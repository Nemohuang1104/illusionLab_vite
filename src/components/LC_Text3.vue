<template>
  <div class="line">
    <div class="text2">
      <h1>{{ Title1 }}</h1>
    </div>
    <h4>{{ English }}</h4>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
const props = defineProps({
  Title1: {
    type: String,
    required: true
  }, 
  English: {
    type: String,
    required: true
  }
});
</script>

<style lang="scss" scoped>
@import "../assets/style";

.line{
  max-width: 360px;
  width: 100%;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
  border-bottom: 1px solid white;
  padding: 0 10px;
  padding-bottom: 30px;
  margin-top: 60px;
  // margin-bottom: 60px;
}

.text2{
  display: flex;
  // margin: 0 auto;
 margin-bottom: 10px;
 align-content: center;
 justify-content: center;

}

h1{
 font-family: map-get($map: $fontStyle, $key: style_2);
 font-size: map-get($map: $fontSize, $key: h1);
 font-weight: 900;
 background: url(../assets/images/LC_text_bg.png) lightgray 50% / cover no-repeat;
 background-clip: text;
 color: transparent;
 width: 180px;
 text-align: center;
}

h4{
  // border: 2px solid red;
  font-family: map-get($map: $fontStyle, $key: style_2);
  font-size: map-get($map: $fontSize, $key: h4);
  font-weight: 900;
  background: url(../assets/images/LC_text_bg.png) lightgray 50% / cover no-repeat;
  background-clip: text;
  color: transparent;
  max-width: 250px;
  height: 30px;
  margin-bottom: 10px;
  text-align: center;
  margin: 0 auto;
}


@media (max-width: 430px) {
  .line{
    margin-top: 20px;
    padding-bottom: 10px;

    max-width: 260px;

  }
  h4{
  font-size: map-get($map: $fontSize, $key: 6);
  }

  h1{
 font-size: map-get($map: $fontSize, $key: h3);

  }
    
}


</style>