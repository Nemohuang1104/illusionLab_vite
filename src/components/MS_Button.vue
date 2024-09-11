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
    border-radius: 40px;
    color: #855F49;
    border: unset;
    background-color: #FDC274;
    width: 200px;
    height: 60px;
    border-radius: 30px;
    font-size: 20px;
    cursor: pointer;
    transition: .2s;

    &:hover{
      background: #FFEDBC;

    }
}

</style>