<script setup>
import { ref, computed, provide, watch } from 'vue';

const cart = ref([])
// 使用 ref 來存放購物車資料
const cart_data = localStorage.getItem("cart")

if (cart_data) {
     cart.value = JSON.parse(cart_data)
}


// const cart = ref(JSON.parse(localStorage.getItem("cart")) || []);

const cartItemCount = ref(0)

// 計算購物車中的唯一商品數量
const caclucateCart = () => {
     const uniqueItemsMap = new Map();
     cart.value.forEach(item => {
          const key = `${item.id}-${item.size}-${item.style}`;
          uniqueItemsMap.set(key, item);
     });
     cartItemCount.value = uniqueItemsMap.size;
};

caclucateCart()

// 提供 cartItemCount 和 cart 以供子組件使用
provide('cartItemCount', cartItemCount);
provide('caclucateCart', caclucateCart);
provide('cart', cart);

// const cart_increment = () => {

// }

// 當購物車更新時，將最新的購物車存回 localStorage
watch(cart, (newCart) => {
     // console.log('watch', 546);

     localStorage.setItem("cart", JSON.stringify(newCart));
     caclucateCart();
     // cartItemCount = newCart.length
}, { deep: true });



</script>


<template>
     <RouterView />
</template>

<style lang="scss" scoped></style>