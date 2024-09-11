<template>
    <div id="app">
        <button class="btn">{{ Button }}</button>
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

.btn{
 font-family: map-get($map: $fontStyle, $key: style_2);

    border-radius: 40px;
    // border: 2px solid #ffffff00;
    border: unset;
    background: linear-gradient(180deg, rgba(19, 44, 121, 0.8) 44.5%, rgba(7, 143, 242, 0.7) 100%);
    width: 200px;
    height: 60px;
    border-radius: 30px;
    font-size: 20px;
    cursor: pointer;
    color: #ffffff;
    transition: .5s;


    &:hover{
      background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
      color: #000;
    }
}

</style>