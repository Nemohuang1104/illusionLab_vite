<template>
    <div>
      <!-- 其他內容 -->
      <div v-show="isLogoVisible" id="logo">
        <img src="../assets/images/SF_moontoticket.png" alt="Logo">
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted, onBeforeUnmount } from 'vue';
  
  const isLogoVisible = ref(false);
  
  const handleScroll = () => {
    const scrollPosition = window.scrollY;
    isLogoVisible.value = scrollPosition >= 1240;
  };
  
  onMounted(() => {
    window.addEventListener('scroll', handleScroll);
  });
  
  onBeforeUnmount(() => {
    window.removeEventListener('scroll', handleScroll);
  });
  </script>
  
  <style scoped>
  #logo {
    position: fixed;
    top: 0;
    right: 0;
    display: none; /* 預設為隱藏 */
    z-index: 1000; /* 確保它在最上層 */
  }
  
  #logo.show {
    display: block; /* 當添加 show 類名時顯示 */
  }
  </style>
  