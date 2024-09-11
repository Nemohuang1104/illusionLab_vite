<template>

  <div class="img-container">
    <div class="text">
      <p>{{ p }}</p>
    </div>
  </div>

  </template>
  
  <script setup>
  defineProps({
    p: {
      type: String,
      default: '送出', // 預設文字
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
    width: 100%;
    max-width: 220px;
    height: 100px; 
    cursor: pointer;
    margin: 0 auto; // 按鈕置中

    position: relative;
  }

  .text{
    
    width: 100%;
    max-width: 50px;
    position: absolute;
    top: 32px;
    left: 99px;
  }

  p {
    color: #000000;
    background: none;
    font-weight: bold;
    
  }

  p:hover{
    color: #e8e8e8;

  }
  </style>
  