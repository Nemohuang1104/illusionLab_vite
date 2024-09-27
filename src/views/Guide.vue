<template>

<div class="video-background-container">
  <!-- 背景影片 -->
  <video autoplay muted loop playsinline class="background-video">
      <source src="../assets/video/guide_bg.mp4" type="video/mp4">
  </video>

  <div class="content-overlay">
    <!-- 背景的煙霧 -->
    <div class="smoke">
      <img src="../assets/images/cloud_left.png" alt="" class="bg_cloudleft">
      <img src="../assets/images/cloud_right.png" alt="" class="bg_cloudright">
      <img src="../assets/images/longcloud_left.png" alt="" class="longcloud_left">
      <img src="../assets/images/longcloud_right.png" alt="" class="longcloud_right">
    </div>
      <!-- Logo -->
        <img src="../assets/images/illusionLabLOGO.svg" alt="Logo" class="logo">
  
  <!-- <div class="cloud">
    <img src="../assets/images/cloudbutton.png" alt="" class="cloud_left">
    <img src="../assets/images/cloudbutton.png" alt="" class="cloud_right">
  </div> -->

  <!-- 按鈕 -->
        <!-- <div class="button-container">
            <button class="btn font-btn"  @click="goToEnter">前台</button>
            <button class="btn back-btn" @click="goToBack">後台</button>
        </div> -->
  </div>


  <!-- ============================================= -->

  <div class="leftCloud">
    <img src="../assets/images/cloudbutton.png" alt="" class="cloud_left">
    <button class="btn font-btn"  @click="goToEnter">前台</button>
  </div>

  <div class="rightCloud"> 
    <img src="../assets/images/cloudbutton.png" alt="" class="cloud_right">
    <button class="btn back-btn" @click="goToBack">後台</button>
  </div>
</div>
  <div class="marquee">
    <p>本網站為緯育TibaMe【第93期】前端工程師專業技術養成班學員作品，僅供學習、展示之用途。 
      Copyright &copy; 2024 幻浸實驗室 All rights reserved </p>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function goToEnter() {
  router.push('/enter');
}

function goToBack() {
  router.push('/logincms');
}
</script>

<style lang="scss" scoped>

.video-background-container {
  font-family: "Noto Sans TC";
  background-image: url(../../public/images/cloud_bg.png);
  background-size: contain;
  background-repeat: no-repeat;
  position: relative;
  width: 100%;
  height: 100vh; /* 設定全螢幕背景 */
  overflow: hidden;
  position: relative;
}

.background-video {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  object-fit: cover; /* 確保影片覆蓋整個區域 */
  transform: translate(-50%, -50%);
  z-index: -1; /* 確保影片在內容後面 */
}

.content-overlay {
  position: relative;
  z-index: 1;
  color: white;
  padding: 10px;
}

.smoke{}

.bg_cloudleft{
  width: 70%;
  position: absolute;
  top: -15%;
  left: -8%;
  z-index: 2;
  animation: bg_cloudleft 3s 0.3s linear backwards;
}

@keyframes bg_cloudleft{
  0%{
    left: 2%;
  };
  100%{
    left: -8%;    
  };
}

.bg_cloudright{
  position: absolute;
  width: 70%;
  top: -10%;
  right: -10%;
  z-index: 3;
  animation: bg_cloudright 3s 0.5s linear backwards;
}

@keyframes bg_cloudright{
  0%{
    right:3%;
  };
  100%{
    right:-10%;
  };
}


.longcloud_left{
  position: absolute;
  width: 70%;
  top: 44%;
  left: 18%;
  z-index: 4;
  animation: longcloud_left 3s 0.2 linear backwards;
}

@keyframes longcloud_left{
  0%{
    left: 25%;
  };
  100%{
    left: 18%;
  };
}

.longcloud_right{
  position: absolute;
  width: 70%;
  top: 46%;
  right:17%;
  z-index: 5;
  animation: longcloud_right 3s 0.3 linear backwards;
}

@keyframes longcloud_left{
  0%{
    right: 26%;
  };
  100%{
    right:17%;
  };
}


.logo {
  max-width: 590px;
  width: 100%;
  display: block;
  margin: 0 auto;
  margin-top: 40px;
  animation: logo 8s 0.5 ease-out forwards;
  z-index: 150;
}

@keyframes logo {
  0% {
      transform: scale(0.5) translateZ(0);
  }
  50% {
      transform: scale(0.8) translateZ(0); /* 中間狀態縮放至0.8 */
  }
  100% {
      transform: scale(1) translateZ(0);
  }
}


.button-container {
  display: flex;
  justify-content: center;

}

.btn {
  border: none;
  cursor: pointer;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  color: #0006A2;
  background-color: transparent;
  width: 580px;
  height: 350px;
  font-size: 56px;
  font-family: "Noto Sans TC";
  font-weight:600;
  
}

.leftCloud{
  position: absolute;
  top: 35%;
  right: 47%;
  z-index: 10;
  animation: cloud_left 3s linear infinite;
}

.cloud_left{
  max-width: 600px;
  width: 100%;
  position: relative;
}

@keyframes cloud_left {
  0% {
      transform: translateY(0); /* 起始位置 */
  }
  50% {
      transform: translateY(-20px); /* 向上移動 20px */
  }
  100% {
      transform: translateY(0); /* 回到起始位置 */
  }
}


.rightCloud{
  // border: 2px solid rgb(0, 255, 0);

  position: absolute;
  top:50%;
  left: 47%;
  z-index: 10;
  animation: cloud_right 3s 0.5s linear infinite;
}

.cloud_right{
  // border: 2px solid red;
  // width: 64%;
  max-width: 600px;
  width: 100%;
  position : relative;
  object-fit: cover;
}

@keyframes cloud_right {
  0% {
      transform: translateY(0); /* 起始位置 */
  }
  50% {
      transform: translateY(-20px); /* 向上移動 20px */
  }
  100% {
      transform: translateY(0); /* 回到起始位置 */
  }
}

.font-btn {
    // border: 2px solid red;
    max-width: 200px;
    max-height: 100px;
    position: absolute;
    top: 30%;
    right: 35%;
    z-index: 12;
}

.back-btn {
    position: absolute;
    top: 23%;
    left: 35%;
    z-index: 12;
    max-width: 200px;
    max-height: 100px;
}


.marquee{
  width: 100%;
  position: absolute;
  bottom: 1%;
  left: 0;
  overflow: hidden;
}

.marquee p{
  color: #fff;
  animation: marquee 20s linear infinite;
  font-size: 16px;
}

@keyframes marquee {
  0% {
    transform: translateX(100%); /* 從容器的右邊開始 */
  }
  100% {
    transform: translateX(-100%); /* 到容器的左邊，持續循環 */
  }
}

//===================RWD===============================================

@media screen and (max-width: 820px){
  .leftCloud{
 
    top: 25%;
    right: 47%;
    z-index: 10;
    
  }

  .rightCloud{
    position: absolute;
    top: 28%;
    left: 47%;

  }

}

@media screen and (max-width: 430px){
  
  .bg_cloudright{
    width: 70%;
    top: 15%;
    right: -10%;
  }

  .bg_cloudleft[data-v-9b68c88b] {

    top: 5%;
    left: -8%;
  }

  .btn{
    font-size:36px;
    max-width: 100px;
    max-height: 50px;
  }

  .font-btn{
    top: 22%;
    right: 27%;
  }

  .leftCloud{
    top: 22%;
    right: 47%;
  }

  .rightCloud{
    top: 26%;
  }
}

</style>