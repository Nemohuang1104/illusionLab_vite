<template>
  
  <div class="LifeCasio_btn">
    <p>{{ Button }}</p>
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
  max-width: 200px;
  width: 100%;

  height: 60px;
  font-size: 20px;
  cursor: pointer;

  text-align: center;
  transition: .5s;
  color: white;
}
.LifeCasio_btn:hover{
    color: map-get($colofont_1, gold);
}

p{
  line-height: 60px;
}

</style>