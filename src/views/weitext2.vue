<template>
  <div>
    <!-- 使用 Header 組件並傳遞 mode 屬性，並監聽事件 -->
    <Header :mode="currentMode" @update:mode="switchMode" ></Header>
  </div>
</template>

<script setup>
import Header from './WeiText.vue';
import { ref } from 'vue';

const currentMode = ref('three');

const switchMode = (mode) => {
  currentMode.value = mode;
};
</script>