<template>
    <header :class="headerClass">
      <div class="logo">
        <img :src="logoSrc" alt="Logo">
      </div>
      <nav>
        <ul>
          <li><a href="/">首頁</a></li>
          <li><a href="/shop">商品頁</a></li>
          <li><a href="/activity">一頁式</a></li>
        </ul>
      </nav>
      <div class="icons">
        <a href="/cart"><img src="@/assets/cart.svg" alt="購物車"></a>
        <a href="/profile"><img src="@/assets/profile.svg" alt="會員中心"></a>
      </div>
    </header>
  </template>
  
  <script setup>
// 使用 `defineProps` 來接收組件的 props
const props = defineProps({
  logoSrc: {
    type: String,
    required: true
  },
  headerClass: {
    type: String,
    default: 'default-header'
  }
});
</script>
  
  <style scoped lang="scss">
@import '@/assets/styles/style.scss';

// 在這裡可以定義這個組件特有的樣式
.additional-class {
  background-color: $primary-color;
}
</style>

  