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

<style lang="scss" >

.btn{
    border-radius: 40px;
    border: 4px solid #000;
    background: rgb(255, 255, 255);
    width: 200px;
    height: 60px;
    border-radius: 30px;
    font-size: 20px;
    cursor: pointer;
}

</style>