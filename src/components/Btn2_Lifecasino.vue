<template>
  
  <div class="LifeCasio_btn">
    <p>{{ Button }}</p>
    <img class="pokerIcon" src="../assets/images/LC_icon10.svg" alt="">
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

// 定義 props
const props = defineProps({
  Button: {
    type: String,
    required: true
  }
});

</script>

<style lang="scss" scoped>
  @import "../assets/style";


.LifeCasio_btn{
  background-image: url(@/assets/images/btn_lifecasino.svg);
  background-size:contain;
  background-repeat: no-repeat;
  background-position: center;
  max-width: 180px;
  width: 100%;
  
  height: 60px;
  font-size: 20px;
  cursor: pointer;

  text-align: center;
  transition: .5s;
  color: map-get($colofont_1,gold);
  position: relative;
}
.LifeCasio_btn:hover{
    color: map-get($colofont_1,gold);
}

p{
  line-height: 60px;
  font-family: map-get($map: $fontStyle, $key: style_2);
}


.pokerIcon{
  position: absolute;
  left: -23px;
  top: -20px;
  max-width: 50px;
  width: 100%;
}

@media (max-width: 430px) {
  .pokerIcon{
  max-width: 30px;
  left: -12px;
  top: 0px;
  }

  p{
      font-size: 16px;
    }
}
</style>