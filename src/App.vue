<script setup>
import { provide, computed } from 'vue';
// import { RouterView } from 'vue-router'; // 確保導入 RouterView
import Header_0 from './components/Header_0.vue';
// import SFHeader_0 from './components/SFHeader_0.vue';

// 計算購物車中的商品數量
const cartItemCount = computed(() => {
     const cart = JSON.parse(localStorage.getItem("cart")) || [];
     return cart.reduce((total, item) => total + item.quantity, 0); // 計算商品數量
});

// 提供 cartItemCount 以供注入
provide('cartItemCount', cartItemCount);



</script>

<template>
     <div id="app">
          <Header_0 />

          <RouterView />
     </div>
</template>

<style lang="scss" scoped>
/* 在這裡添加樣式 */
</style>