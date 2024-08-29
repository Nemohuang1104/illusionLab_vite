<template>

    <div class="video-background-container">
        <video autoplay muted loop playsinline class="background-video">
            <source src="../assets/video/smoke.mp4" type="video/mp4">
        </video>
        <div class="content-overlay">

         <!-- Logo -->
            <img src="../assets/images/lab_logo.png" alt="Logo" class="logo">
      
      <!-- 按鈕 -->
            <div class="button-container">
                <button class="btn font-btn" @click="goToEnter" >前台</button>
                <button class="btn back-btn" @click="goToBack">後台</button>
                <!-- <img src="../../public/image/cloud.png" alt=""> -->
            </div>
        </div>
    </div>
    
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function goToEnter() {
  router.push('/enter');
}

function goToBack() {
  router.push('/back');
}
</script>

<style lang="scss" scoped>

.video-background-container {
  font-family: "Noto Sans TC";
  background-image: url(../assets/images/cloud_bg.png);
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
  text-align: center;
  padding: 20px;
}

.logo {
  width: 600px;
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
  font-size: 64px;
  font-family: "Noto Sans TC";
  font-weight:600;
  
}

.font-btn {
    background-image: url(../assets/images/cloud.png) ;
    position: absolute;
    top: 60%;
    left: 4%;
 
}

.back-btn {
    background-image: url(../assets/images/cloud.png);
    position: absolute;
    top: 90%;
    right:  4%;
}

</style>