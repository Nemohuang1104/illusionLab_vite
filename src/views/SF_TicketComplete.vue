<script setup>

import SF_planetButton  from "@/components/SF_planetButton.vue";


import { defineProps } from 'vue';

const props = defineProps({
    ticketData: {
      type: Object,
      required: true
    }
});

</script>


<template>
  <div class="wrapper">
    
    <div class="title">
      <!-- <p>票券完成!</p> -->
    </div>

    <div class="envolope-outside">

      <div class="envelope">
        <!-- 信封口 -->
        <div class="top">
          <img src="../assets/images/SF_ticketEnvolope_top.svg"  alt="Envelope" class="envelope-image top">
        </div>
        <!-- 背後的信封 -->
        <img src="@/assets/images/SF_ticketEnvolope.svg" alt="Envelope" class="envelope-image back" />
        <!-- 中間的票券 -->
        <div class="ticket">
          <div class="finalTicket">
            <img class="style" v-if="ticketData.style" :src="ticketData.style" alt="Style" />
            <div class="selected-sticker">
              <img class="sticker" v-if="ticketData.sticker" :src="ticketData.sticker" alt="Sticker" />
            </div>
          </div>
        </div>
        
        <!-- 前面的信封 -->
        <img src="@/assets/images/SF_ticketEnvolope2.svg" alt="Envelope" class="envelope-image front" />
      </div>

    </div>

    <div class="info">
      <p>已收到您客製的票券!</p>
      <p>期待您的蒞臨!</p>
    </div>

    <!-- 點選跳轉回首頁 -->
    <div class="finish"> 
      <router-link to="/SF_Homepage">
        <SF_planetButton p="完成"></SF_planetButton>
      </router-link>
    </div>
  </div>
  </template>
  
  
  
  <style lang="scss" scoped>
  @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');
  @import '@/assets/SASS/basic/_color.scss';

  * {
    font-family: "Noto Serif TC" ;
    color:map-get($colofont_2 , text);
  }

  .wrapper {
    background:linear-gradient(rgba(5, 5, 5, 0.847), rgba(0, 0, 0, 0.63)) ,
    url(../assets/images/STBackground.png);
  }
  
  .info{
    text-align: center;
  }

  .title{
    padding-top: 120px;
  }

  .envolope-outside{
    position: relative;
    width: 100%;
    max-width: 28%;
    display: block;
    margin: auto;
  }
    
  .ticket{
    z-index: 2;
    animation: slideIn 2s ease-in-out forwards; /* 動畫名稱及參數 */

    position: absolute;
    top: 38%;

  }

.finalTicket {
  max-width: 470px;
  aspect-ratio: 100 / 44;
  position: relative;
  margin: auto;
}

.finalTicket img {
  width: 100%;
  display: block;
  margin: 0 auto;
}


.selected-sticker {
  display: block;
  width: 100%;
  max-width: 8%;
  height: auto;
  position: absolute;
  top: 45%;
  right: 11%;
}


  // 信封口
  .top img{
    display: block;
    margin: 0 auto;
  }

  .envelope-image.top{
    width: 100%;
    max-width: 50vw;
    
    transform-origin: bottom; /* 設定旋轉中心 */
    animation: Down 2s ease-in-out forwards; /* 合蓋動畫 */
    animation-delay: 2s; /* 延遲時間，等待票券動畫結束 */
    position: relative;
  }


  .envelope-image.back {
    z-index: 1; /* 背後的信封在最底層 */
    width: 100%;
    max-width: 250vw; 
  }


  .envelope-image.front {
    z-index: 3; /* 前面的信封在最上層，蓋住部分票券 */
    position: absolute;
    top: 9.5vw;
    left: 0vw;
    width: 100%;
    max-width: 230vw; 
    // display: none;

  }

  // 資訊文字
  .info{
    margin: 6% auto;
  }

  .info p {
    line-height: 3;
  }

  .finish{
    margin-bottom: 30px;
  }

  @keyframes slideIn {
  0% {
    transform: translateY(-70px) rotate(10deg); /* 初始狀態 */
  }

  100% {
    transform: translateY(10px) rotate(0deg); /* 最終狀態 */
  }
}

// 信封口
@keyframes Down {
  0% {
    transform: rotateX(0deg); /* 初始打開狀態 */
  }
  100% {
    transform: rotateX(180deg); 
    z-index: 5;
  }
}



  </style>
  