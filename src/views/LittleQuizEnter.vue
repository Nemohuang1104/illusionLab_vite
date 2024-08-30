<script setup>
import Header_1 from '../components/Header_1.vue'
  
</script>


<template>
<div class="wrapper">
<!-- 頁首 -->
<Header_1></Header_1>

<main>
  <!-- 中間圖片區 -->
    <div class="pic">
      <img src="../assets/images/quiz_middlebluesmoke.png" alt="" class="smoke1">
      <img src="../assets/images/quiz-enter_hand.png" alt="" class="hand">
      <img src="../assets/images/quiz_longsmoke.png" alt="" class="smoke2">
    </div>
  
  <!-- 小測驗介紹文字 -->
   <p>準備好踏入奇幻世界，探索最適合你的沉浸式體驗活動嗎？<br>
    透過這個簡單的小測驗，我們將引導你找到最適合你的沉浸式體驗，<br>
    讓我們一起尋找那個能讓你全心投入的夢幻之地吧！</p>

    <!-- start按鈕 -->
     <input type="submit" value="START!">
 </main>

</div>

</template>

<style lang="scss" scoped>
@import "../assets/SASS/basic/color";

.wrapper{
  background:map-get($color_0,bgc_blue);
  background-repeat: no-repeat;
  width: 100%;
  height: 100vh;
  font-family:"Noto Sans TC";
}


main{
  width: 100%;
  padding-top: 30px; 
}

.pic{
  max-width: 1000px;
  width: 100%;
  position: relative;
  margin: 0 auto;
  margin-bottom: 40px;
}

.pic .smoke1{
  display: block;
  width: 280px;
  margin: 0 auto;
  animation: smoke1 3s linear infinite;
}

@keyframes smoke1 {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

.pic .hand{
  display: inline-block;
  width: 160px;
  position: absolute;
  left: 50%;
  transform: translate(-50%,-120%);
  z-index: 1;
}

.pic .smoke2{
  display: block;
  width: 500px;
  position: absolute;
  left: 50%;
  transform: translate(-50%,-65%);
}

p{
  font-size: 20px;
  color:map-get($colorfont_0,white);
  font-weight: bold;
  text-align: center;
  margin-bottom: 20px;
  line-height: 1.5;
}

input{
  display: block;
  font-size: 20px;
  font-weight: bold;
  color:map-get($colorfont_0,black3);
  background-color:map-get($color_0,btn_yellow);
  width: 124px;
  height: 52px;
  border-radius: 20px;
  border: none;
  margin: 0 auto;
  margin-bottom: 30px;
  cursor: pointer;
}

input:hover{
  background-color:transparent;
  color:map-get($color_0,btn_yellow);
  border: 2px solid map-get($color_0,btn_yellow);
}


</style>
