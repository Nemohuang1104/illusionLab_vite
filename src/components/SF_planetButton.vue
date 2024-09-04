<template>
    <div class="img-container">
      <p>{{ p }}</p>
    </div>
  </template>
  
  <script setup>
  defineProps({
    p: {
      type: String,
      default: 'Send', // 預設文字
    },
  });
  </script>
  
  <style lang="scss" scoped>
  @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');
  
  * {
    font-family: "Noto Serif TC";
  }
  
  .img-container {
    display: flex;
    background-image: url(../assets/images/SF_button.svg);
    background-repeat: no-repeat;
    background-size: contain;
    width: 200px; /* 設置容器寬度 */
    height: 100px; 
    cursor: pointer;
    margin: 0 auto; // 按鈕置中
  }
  
  p {
    color: #000000;
    background: none;
    padding: 14% 42%; //文字置中
  }

  p:hover{
    color: #e8e8e8;

  }
  </style>
  