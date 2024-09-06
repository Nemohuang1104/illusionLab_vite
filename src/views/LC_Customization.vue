<script setup>
import { ref, watch } from 'vue';
import Header from "../components/Header_0.vue";
import Footer_1 from "@/components/Footer_1.vue";
import Btn_Lifecasino from "@/components/Btn_Lifecasino.vue";

// 導入圖片
import defaultTicket from '../assets/images/lc_custom_blank1.svg'; // 預設圖片
import lc_custom_blank2 from '../assets/images/lc_custom_blank2.svg'
import lc_custom_blank3 from '../assets/images/lc_custom_blank3.svg'
import lc_custom_blank4 from '../assets/images/lc_custom_blank4.svg'
import lc_custom_blank5 from '../assets/images/lc_custom_blank5.svg'
import lc_custom_blank6 from '../assets/images/lc_custom_blank6.svg'



import lc_custom_profile1 from '../assets/images/lc_custom_profile1.svg';
import lc_custom_profile2 from '../assets/images/lc_custom_profile2.svg';
import lc_custom_profile3 from '../assets/images/lc_custom_profile3.svg';
import lc_custom_ticket1 from '../assets/images/lc_custom_ticket1.svg';
import lc_custom_ticket2 from '../assets/images/lc_custom_ticket2.svg';
import lc_custom_ticket3 from '../assets/images/lc_custom_ticket3.svg';
import LC_CUSTOM_BORDER1 from '../assets/images/LC_CUSTOM_BORDER1.svg';
import LC_CUSTOM_BORDER2 from '../assets/images/LC_CUSTOM_BORDER2.svg';
import LC_CUSTOM_BORDER3 from '../assets/images/LC_CUSTOM_BORDER3.svg';
import LC_CUSTOM_BORDER4 from '../assets/images/LC_CUSTOM_BORDER4.svg';
import lc_custom_icon1 from '../assets/images/lc_custom_icon1.svg';
import lc_custom_icon2 from '../assets/images/lc_custom_icon2.svg';
import lc_custom_icon3 from '../assets/images/lc_custom_icon3.svg';
import lc_custom_icon4 from '../assets/images/lc_custom_icon4.svg';
import lc_custom_icon5 from '../assets/images/lc_custom_icon5.svg';
import lc_custom_icon6 from '../assets/images/lc_custom_icon6.svg';
import lc_custom_icon7 from '../assets/images/lc_custom_icon7.svg';
import lc_custom_icon8 from '../assets/images/lc_custom_icon8.svg';
import lc_custom_icon9 from '../assets/images/lc_custom_icon9.svg';
import lc_custom_icon10 from '../assets/images/lc_custom_icon10.svg';
import lc_custom_icon11 from '../assets/images/lc_custom_icon11.svg';
import lc_custom_icon12 from '../assets/images/lc_custom_icon12.svg';
import lc_custom_icon13 from '../assets/images/lc_custom_icon13.svg';
import lc_custom_icon14 from '../assets/images/lc_custom_icon14.svg';
import lc_custom_icon15 from '../assets/images/lc_custom_icon15.svg';
import lc_custom_icon16 from '../assets/images/lc_custom_icon16.svg';
import lc_custom_icon17 from '../assets/images/lc_custom_icon17.svg';
import lc_custom_icon18 from '../assets/images/lc_custom_icon18.svg';








// 響應式數據

const profileImage = ref('');
const templateImage = ref(defaultTicket);
const backgroundColor = ref('');
const borderImage = ref('');
const iconImage = ref('');

//控制更換新模板之後，不能再進行客製化疊加的功能>>控制變數
const isTemplateLocked = ref(false)

// 響應式變數
const selectedTemplate = ref(''); // 追踪選中的模板

// 更新預覽的方法
const updateProfile = (src) => {
  selectedTemplate.value = src; // 設置當前選中的模板
  console.log(isTemplateLocked.value);
  if(!isTemplateLocked.value){
    profileImage.value = src;
  }
  
};

const updateTemplate = (src) => {
  selectedTemplate.value = src; // 設置當前選中的模板

  // 重置所有客製化選項，清除疊加效果
  profileImage.value = '';
  backgroundColor.value = '';
  borderImage.value = '';
  iconImage.value = '';
  templateImage.value = src;

  //開啟限制客製化功能的設定
  isTemplateLocked.value = true
};

const changeColors = (src) => {
  selectedTemplate.value = src; // 設置當前選中的模板
  isTemplateLocked.value = false
  console.log(isTemplateLocked.value);
  
  templateImage.value = src; // 這裡應根據需求更新
};

// const changeColors = (color1, color2, color3) => {
//   backgroundColor.value = color1; // 這裡應根據需求更新
// };

const updateBorder = (src) => {
  selectedTemplate.value = src; // 設置當前選中的模板
  if(!isTemplateLocked.value){
    borderImage.value = src;
  }
  
};

const updateIcon = (src) => {
  selectedTemplate.value = src; // 設置當前選中的模板
  if(!isTemplateLocked.value){
    iconImage.value = src;
  }
  
};

// 監聽預覽圖片變化並處理
watch([profileImage, templateImage, backgroundColor, borderImage, iconImage], () => {
  // 這裡可以添加更多邏輯來處理預覽區域的更新
});
</script>


<template>

<div class="template">
    <div>
      <Header :mode="currentMode"/> 
    </div>
    <div class="customization">
      <div class="show">
        <div class="content">
          <h1>票券製作</h1>
          <hr>
          <!-- 動態生成預覽圖 -->
          <div class="ticket-preview" :style="{ backgroundColor }">
            <img v-if="templateImage" :src="templateImage" alt="Template" class="template-image">
            <img v-if="profileImage" :src="profileImage" alt="Profile" class="profile-image">
            <img v-if="borderImage" :src="borderImage" alt="Border" class="border-image">
            <img v-if="iconImage" :src="iconImage" alt="Icon" class="icon-image">
          </div>
          <hr>
        </div>
      </div>
      <!-- 客製化選項 -->
      <div class="choosen">
        <!-- 頭貼選擇 -->
        <div class="profile">
          <h2>頭貼選擇</h2>
          <img src="../assets/images/lc_custom_profile1.svg" alt="" :class="{ click_profile: selectedTemplate === lc_custom_profile1 }" @click="updateProfile(lc_custom_profile1)">
          <img src="../assets/images/lc_custom_profile2.svg" alt="" :class="{ click_profile: selectedTemplate === lc_custom_profile2 }" @click="updateProfile(lc_custom_profile2)">
          <img src="../assets/images/lc_custom_profile3.svg" alt="" :class="{ click_profile: selectedTemplate === lc_custom_profile3 }" @click="updateProfile(lc_custom_profile3)">
        </div>
        <!-- 模板樣式 -->
        <div class="theChosenTemplate">
          <h2>公版樣式</h2>
          <img src="../assets/images/lc_custom_ticket1.svg" :class="{ click_public: selectedTemplate === lc_custom_ticket1 }" alt="" @click="updateTemplate(lc_custom_ticket1)">
          <img src="../assets/images/lc_custom_ticket2.svg" :class="{ click_public: selectedTemplate === lc_custom_ticket2 }" alt="" @click="updateTemplate(lc_custom_ticket2)">
          <img src="../assets/images/lc_custom_ticket3.svg" :class="{ click_public: selectedTemplate === lc_custom_ticket3 }" alt="" @click="updateTemplate(lc_custom_ticket3)">
        </div>
        <!-- 客製化底色 -->
        <h2 class="custom_title">客製化樣式</h2>
        <div class="ticket_colors">
          <h2>模板底色</h2>
          <img class="ticket_color" src="../assets/images/lc_blank1_color.svg" :class="{ click_template: selectedTemplate === defaultTicket }" alt="" @click="changeColors(defaultTicket)">
          <img class="ticket_color" src="../assets/images/lc_blank2_color.svg" :class="{ click_template: selectedTemplate === lc_custom_blank2 }" alt="" @click="changeColors(lc_custom_blank2)">
          <img class="ticket_color" src="../assets/images/lc_blank3_color.svg" :class="{ click_template: selectedTemplate === lc_custom_blank3 }" alt="" @click="changeColors(lc_custom_blank3)">
          <img class="ticket_color" src="../assets/images/lc_blank4_color.svg" :class="{ click_template: selectedTemplate === lc_custom_blank4 }" alt="" @click="changeColors(lc_custom_blank4)">
          <img class="ticket_color" src="../assets/images/lc_blank5_color.svg" :class="{ click_template: selectedTemplate === lc_custom_blank5 }" alt="" @click="changeColors(lc_custom_blank5)">
          <img class="ticket_color" src="../assets/images/lc_blank6_color.svg" :class="{ click_template: selectedTemplate === lc_custom_blank6 }" alt="" @click="changeColors(lc_custom_blank6)">
        </div>
        <!-- 邊框選擇 -->
        <div class="border">
          <h2>邊框</h2>
          <img src="../assets/images/LC_CUSTOM_BORDER1.svg" :class="{ click_border: selectedTemplate === LC_CUSTOM_BORDER1 }" alt="" @click="updateBorder(LC_CUSTOM_BORDER1)">
          <img src="../assets/images/LC_CUSTOM_BORDER2.svg" :class="{ click_border: selectedTemplate === LC_CUSTOM_BORDER2 }" alt="" @click="updateBorder(LC_CUSTOM_BORDER2)">
          <img src="../assets/images/LC_CUSTOM_BORDER3.svg" :class="{ click_border: selectedTemplate === LC_CUSTOM_BORDER3 }" alt="" @click="updateBorder(LC_CUSTOM_BORDER3)">
          <img src="../assets/images/LC_CUSTOM_BORDER4.svg" :class="{ click_border: selectedTemplate === LC_CUSTOM_BORDER4 }" alt="" @click="updateBorder(LC_CUSTOM_BORDER4)">
        </div>
        <!-- 小圖示選擇 -->
        <div class="icon">
          <h2>小圖示</h2>
          <img src="../assets/images/lc_custom_icon1.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon1 }" alt="" @click="updateIcon(lc_custom_icon1)">
          <img src="../assets/images/lc_custom_icon2.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon2 }" alt="" @click="updateIcon(lc_custom_icon2)">
          <img src="../assets/images/lc_custom_icon3.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon3 }" alt="" @click="updateIcon(lc_custom_icon3)">
          <img src="../assets/images/lc_custom_icon4.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon4 }" alt="" @click="updateIcon(lc_custom_icon4)">
          <img src="../assets/images/lc_custom_icon5.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon5 }" alt="" @click="updateIcon(lc_custom_icon5)">
          <img src="../assets/images/lc_custom_icon6.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon6 }" alt="" @click="updateIcon(lc_custom_icon6)">
          <img src="../assets/images/lc_custom_icon7.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon7 }" alt="" @click="updateIcon(lc_custom_icon7)">
          <img src="../assets/images/lc_custom_icon8.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon8 }" alt="" @click="updateIcon(lc_custom_icon8)">
          <img src="../assets/images/lc_custom_icon9.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon9 }" alt="" @click="updateIcon(lc_custom_icon9)">
          <img src="../assets/images/lc_custom_icon10.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon10 }" alt="" @click="updateIcon(lc_custom_icon10)">
          <img src="../assets/images/lc_custom_icon11.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon11 }" alt="" @click="updateIcon(lc_custom_icon11)">
          <img src="../assets/images/lc_custom_icon12.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon12 }" alt="" @click="updateIcon(lc_custom_icon12)">
          <img src="../assets/images/lc_custom_icon13.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon13 }" alt="" @click="updateIcon(lc_custom_icon13)">
          <img src="../assets/images/lc_custom_icon14.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon14 }" alt="" @click="updateIcon(lc_custom_icon14)">
          <img src="../assets/images/lc_custom_icon15.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon15 }" alt="" @click="updateIcon(lc_custom_icon15)">
          <img src="../assets/images/lc_custom_icon16.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon16 }" alt="" @click="updateIcon(lc_custom_icon16)">
          <img src="../assets/images/lc_custom_icon17.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon17 }" alt="" @click="updateIcon(lc_custom_icon17)">
          <img src="../assets/images/lc_custom_icon18.svg" :class="{ click_icon: selectedTemplate === lc_custom_icon18 }" alt="" @click="updateIcon(lc_custom_icon18)">
          <!-- 添加更多圖示 -->
        </div>
      </div>
    </div>
    <!-- 確認區域 -->
    <div class="confirm">
      <label class="custom-checkbox">
        <input type="checkbox">
        <span class="checkmark"></span>
        <span class="text">我了解 一經送出後不可修改。</span>
      </label>
      <label class="custom-checkbox">
        <input type="checkbox">
        <span class="checkmark"></span>
        <span class="text">我了解 活動當日憑訂單QR-CODE換實體票卷入場。</span>
      </label>
    </div>
    <!-- 送出按鈕 -->
    <div class="submit_btn">
      <Btn_Lifecasino Button="送出"></Btn_Lifecasino>
    </div>
    
  </div>
  <Footer_1></Footer_1>
  </template>
  
  
  
  <style scoped lang="scss">

    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

    @import "../assets/style";
    .template{
        background: #313131;
        padding-bottom: 80px;
        // height: 180vh;
    }

    a{
      text-decoration: none;
      font-family: map-get($fontStyle, style_2);
    }

    //CSS 部分（設置預覽區域的樣式）============

    .ticket-preview {
  position: relative;
  width: 60%;
  margin: 0 auto;
  text-align: center;
  height: 280px;
  
  
}

.template-image,
.profile-image,
.border-image,
.icon-image {
  position: absolute;
  top: -15px;
  left: 0;
  width: 100%;
  height: auto;
  pointer-events: none; /* 確保圖層不會阻擋點擊事件 */
}

.template-image {
  /* 預設模板底色 */
  z-index: 1; /* 位於最底層 */
}

.profile-image {
  /* 頭貼 */
  top: 60px; /* 根據需要調整 */
  left: 170px; /* 根據需要調整 */
  z-index: 3; /* 位於模板上方 */
  width: 120px; /* 調整這裡來控制頭貼的寬度 */
  height: auto; /* 自動調整高度，保持圖片比例 */
}

.border-image {
  /* 邊框 */
  z-index: 2; /* 位於頭貼和其他元素上方 */
  width: 492px; /* 調整這裡來控制頭貼的寬度 */
  height: auto; /* 自動調整高度，保持圖片比例 */
  top: 39px; /* 根據需要調整 */
  left: 132px; /* 根據需要調整 */
  
}

.icon-image {
  /* 小圖示 */
  z-index: 4; /* 位於所有元素上方 */
  width: 3%; /* 調整這裡來控制頭貼的寬度 */
  height: auto; /* 自動調整高度，保持圖片比例 */
  top: 80px; /* 根據需要調整 */
  left: 460px; /* 根據需要調整 */
}


    // 上方圖示區==================

    .show{
        
        
        width: 100%;
        // display: flex;
        // justify-content: center;
        position: sticky;
        top: 0; /* 固定在頁面頂部 */
        background-color: #313131; /* 背景顏色，防止滾動時內容重疊 */
        z-index: 10; /* 確保在其他元素之上 */

    }

    .show h1{
        text-align: center;
        font-family: map-get($fontStyle, style_2);
        color: map-get($colorfont_0, white);
        font-size: 28px;
        margin-bottom: 20px;
        font-weight: bold;
    }


    .content{
        width: 100%;
        text-align: center;
        // position: sticky;
        // top: 0; /* 固定在頁面頂部 */
        // background-color: #313131; /* 背景顏色，防止滾動時內容重疊 */
        // z-index: 10; /* 確保在其他元素之上 */
        // padding: 10px; /* 添加一些內距讓預覽區更美觀 */
    }

  

    // 下方樣式選擇區==================

    .choosen{
        
        
        width: 60vw;
        max-width: 1000px;
        margin: 0 auto;

    }

    .profile{
        font-family: map-get($fontStyle, style_2);
        color: map-get($colorfont_0, white);
        font-size: 16px;
        width: 100%;
        margin-top: 40px;
        margin-bottom: 20px;
        font-weight: bold;
        
    }

    .profile img{
        margin-right: 20px;
        margin-bottom: 20px;
        
    }

    .profile h2{
        margin-bottom: 20px;
    }

    .theChosenTemplate{
        font-family: map-get($fontStyle, style_2);
        color: map-get($colorfont_0, white);
        font-size: 16px;
        width: 100%;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .theChosenTemplate img{
        max-width:32%;
        object-fit: cover;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .custom_title{
        font-family: map-get($fontStyle, style_2);
        color: map-get($colorfont_0, white);
        font-size: 16px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .ticket_colors{
        width: 100%;
        margin-bottom: 20px;
        // padding:40px 0;
        align-items: center;
        // background-color: white;
        height: 16vh;
        border: 1px solid #FFF;
        border-radius: 12px;
        
    }

    .ticket_colors h2{
        font-family: map-get($fontStyle, style_2);
        font-weight: bold;
        padding: 4px;
        text-align: center;
        background: #FFF;
        border-radius: 10px 10px 0px 0px;
    }

    .ticket_color{
        width: 4vw;
        margin: 12px;
    }

    .border{
        border: 1px solid #FFF;
        border-radius: 12px;
        margin-bottom: 20px;

    }

    .border img{
        width:21%;
        object-fit: cover;
        margin: 12px;

    }

    .border h2{
        font-family: map-get($fontStyle, style_2);
        font-weight: bold;
        padding: 4px;
        text-align: center;
        background: #FFF;
        border-radius: 10px 10px 0px 0px;
    }


    .icon{
        border: 1px solid #FFF;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .icon h2{
        font-family: map-get($fontStyle, style_2);
        font-weight: bold;
        padding: 4px;
        text-align: center;
        background: #FFF;
        border-radius: 10px 10px 0px 0px;
    }

    .icon img{
        
        margin: 12px;

    }


    /* 調整checkbox的樣式 */
    /* 隱藏預設的 checkbox */
    .custom-checkbox input[type="checkbox"] {
        display: none;
    }

    /* 自訂的 checkbox 外觀 */
    .custom-checkbox {
        /* border: 1px solid red; */

        display: inline-block;
        position: relative;
        padding-left: 35px;
        cursor: pointer;
        font-size: 22px;
        user-select: none;
        vertical-align: center;
        line-height: 22px;
    }

    /* checkbox 的方塊 */
    .custom-checkbox .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 16px;
        width: 16px;
        background-color: #ffffff00;
        border: 2px solid #FFF;

    }

    /* checkbox 被勾選時的樣式 */
    .custom-checkbox input:checked+.checkmark {
        background-color: #b3634300;
    }

    /* 自訂的勾號 */
    .custom-checkbox .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* 勾號的樣式 */
    .custom-checkbox input:checked+.checkmark:after {
        display: block;
    }

    /* 勾號的圖案 */
    .custom-checkbox .checkmark:after {
        left: 4px;
        top: 0px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg);
    }

    

    .confirm{
        width: 40%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: start;
        font-family: map-get($fontStyle, style_2);
        color: map-get($colorfont_0, white);
        font-weight: bold;
        
    }

    .text{
        font-size: 16px;
        height: 16px;
        line-height: 20px;
        vertical-align: text-top;
    }


    .submit_btn{
        width: 100%;
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    //點擊狀態，顯示外框class
    .click_public {
      box-shadow: 0 0 0 3px rgb(253, 231, 120); /* 模擬 outline 並支持圓角 */
      border-radius: 8px; /* 圓角 */
    }

    .click_profile {
      box-shadow: 0 0 0 5px rgb(253, 231, 120); /* 模擬 outline 並支持圓角 */
      border-radius: 50%; /* 圓角 */
        
    }

    .click_template {
      box-shadow: 0 0 0 3px rgb(253, 231, 120); /* 模擬 outline 並支持圓角 */
      border-radius: 50%; /* 圓角 */
    }

    .click_border {
      box-shadow: 0 0 0 3px rgb(253, 231, 120); /* 模擬 outline 並支持圓角 */
      border-radius: 8px; /* 圓角 */
      // padding: 4px;
    }

    .click_icon {
      box-shadow: 0 0 0 3px rgb(253, 231, 120); /* 模擬 outline 並支持圓角 */
      border-radius: 8px; /* 圓角 */
      // padding: 4px;
    }



   
    

    
</style>