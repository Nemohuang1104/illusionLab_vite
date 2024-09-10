<template>
  <div class="bg">
    <!-- 彈出框 -->
    <div v-if="activePopup === 1" class="popup" >
      <div class="popup-content  popupone">
        <span class="popup-title">星球探索</span>
        <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark"  @click="closePopup"></div>
        <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
        <p>虛擬行星探索: 創建虛擬現實或擴增實境體驗，讓體驗者“登陸”，探索不同的地形、生物和環境。</p>
      </div>
    </div>

    <div  v-if="activePopup === 2" class="popup ">
      <div class="popup-content popuptwo">
        <span class="popup-title">太空人生活</span>
        <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark"  @click="closePopup"></div>
        <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
        <p>從服裝到飲食，日常活動到駕駛飛行船，一次體驗宇航者生活!</p>
      </div>
    </div>

    <div  v-if="activePopup === 3" class="popup ">
      <div class="popup-content popupthree">
        <span class="popup-title">外星文明</span>
        <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark"  @click="closePopup"></div>
        <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
        <p>探索神秘的外星文化，另一個地球。銀河系中至少有36個與地球相似的、活躍的、科技發達的智慧文明。或者說外星文明。</p>
      </div>
    </div>

    <div  v-if="activePopup === 4" class="popup ">
      <div class="popup-content popupfour">
        <span class="popup-title">互動體驗</span>
        <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark"  @click="closePopup"></div>
        <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
        <p>交互式星圖，可以探索星座、行星和其他天體。</p>
      </div>
    </div>

    <div  v-if="activePopup === 5" class="popup">
      <div class="popup-content  popupfive">
        <span class="popup-title">視聽覺饗宴</span>
        <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark"  @click="closePopup"></div>
        <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
        <p>360度的宇宙全景影片，感受身臨其境的星際旅行。</p>
      </div>
    </div>

    <!-- 觸發按鈕 -->

    <button @click="togglePopup(1)">顯示 POPUP 1</button>
    <button @click="togglePopup(2)">顯示 POPUP 2</button>
    <button @click="togglePopup(3)">顯示 POPUP 3</button>
    <button @click="togglePopup(4)">顯示 POPUP 4</button>
    <button @click="togglePopup(5)">顯示 POPUP 5</button>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// 定義 activePopup 狀態
const activePopup = ref(null);

// 切換對應的 Popup 顯示狀態
function togglePopup(popupNumber) {
  activePopup.value = popupNumber;
}

// 關閉 Popup
function closePopup() {
  activePopup.value = null;
}
</script>

<style scoped>
.bg {
  background-color: black;
  width: 100%;
  height: 2000px;
}

.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 20px;
  /* background-color: white; */
  border: none;
  z-index: 1000;
}

.popup-content {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: end;
  /* 確保子元素居中 */
  width: 350px;
  height: 200px;
  border: 5px solid #2668C866;
  border-radius: 12px;
  padding:20px;
  box-sizing: border-box;
  background-color: rgba(0, 0, 0, 0);
  /* 確保背景透明 */
  animation: draw-border 3s forwards;
  /* 邊框動畫 */
}



.popup-title {
  font-weight: bold;
  font-size: 24px;

  background: black;
  /* background-color: red; */
  /* 黑色背景 */
  background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;

  /* 文字在邊框上 */
  position: fixed;
  top: -13px;
  left: 21px;

}



@keyframes draw-border {
  0% {
    border-color: transparent;
  }

  25% {
    border-top-color: #2668C866;
  }

  50% {
    border-top-color: #2668C866;
    border-right-color: #2668C866;
  }

  75% {
    border-top-color: #2668C866;
    border-right-color: #2668C866;
    border-bottom-color: #2668C866;
  }

  100% {
    border-color: #2668C866;
  }
}

.icon-xmark{
  margin-bottom: 10px;
}


.popup-content p {
  color: white;
  line-height: 1.6;
}

/* 控制位置的 */
.popupone{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-170%, -150%);
}

.popuptwo{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-155%, -25%);
}

.popupthree{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-45%, 55%);
}

.popupfour{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(55%, -130%);
}


.popupfive{
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(65%, 5%);
}
</style>
