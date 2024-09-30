<script setup>
import { ref, computed, provide, watch } from 'vue';


// 使用 ref 來存放購物車資料
const cart = ref(JSON.parse(localStorage.getItem("cart")) || []);

// 計算購物車中的唯一商品數量
const cartItemCount = computed(() => {
     const uniqueItemsMap = new Map();
     cart.value.forEach(item => {
          const key = `${item.id}-${item.size}-${item.style}`;
          uniqueItemsMap.set(key, item);
     });
     return uniqueItemsMap.size;
});

// 提供 cartItemCount 和 cart 以供子組件使用
provide('cartItemCount', cartItemCount);
provide('cart', cart);

// 當購物車更新時，將最新的購物車存回 localStorage
watch(cart, (newCart) => {
     localStorage.setItem("cart", JSON.stringify(newCart));
});



</script>


<template>
     <RouterView />
</template>

<style lang="scss" scoped></style>