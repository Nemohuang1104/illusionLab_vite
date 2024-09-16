<template>
  <div class="wrap">
    <img src="../assets/images/LC_h2_icon.svg" alt="">
    <h2>{{ Title }}</h2>

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
.wrap{
  display: flex;
  align-content: center;
  border-bottom: 1px solid white;
  padding-bottom: 5px;
  max-width: 200px;
  justify-content: center;
  margin: 0 auto;
  
}

h2{
 font-family: map-get($map: $fontStyle, $key: style_2);
 font-size: map-get($map: $fontSize, $key: h2);
 font-weight: 700;
//  background: linear-gradient(90deg, rgba(255, 215, 0, 0.36) 0%, rgba(153, 129, 0, 0.36) 100%);
 background: url(../assets/images/LC_text_bg.png) lightgray 50% / cover no-repeat;
 background-clip: text;
 color: transparent;
 width: 150px;
}

img{
  width: 36px;
  animation: ro 4s linear infinite;
  // margin-right: 10px;
}

@keyframes ro{
  0%{
    transform: rotate3d(0, 1, 0, 0deg);
  }
  50%{
    transform: rotate3d(0, 1, 0, 360deg);
  }
  100%{
    transform: rotate3d(0, 1, 0, 0deg);

  }
}


@media screen and (max-width:712px){
  .title{
  margin: 20px 10% 20px;
}
}
</style>