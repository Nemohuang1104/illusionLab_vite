//定義購物車

// src/stores/cartStore.js
import { defineStore } from 'pinia';

export const useCartStore = defineStore('cart', {
  state: () => ({
    items: [],  // 購物車中的商品列表
  }),
  actions: {
    addToCart(product) {
      const existingItem = this.items.find(item => item.id === product.id && item.size === product.size);
      if (existingItem) {
        existingItem.quantity += product.quantity;  // 如果商品已存在，則增加數量
      } else {
        this.items.push(product);  // 如果商品不存在，則添加到購物車
      }
    },
  },
});