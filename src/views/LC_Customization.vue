<script setup>
import { ref, watch } from 'vue';
import Header from "../components/Header_0.vue";
// import Header_2 from "@/components/Header_2.vue";
import Footer_1 from "@/components/Footer_1.vue";
import Btn_Lifecasino from "@/components/Btn_Lifecasino.vue";
import html2canvas from 'html2canvas'; // 使用 html2canvas 來將票券轉成圖片

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


import LC_Text3 from '@/components/LC_Text3.vue';


const scrollToTOP = () => {
  window.scrollTo({
    top: 0,  // 頁面的頂部
    behavior: 'smooth'  // 平滑滾動
  });
};




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
  };

  
  
};

// 監聽預覽圖片變化並處理
watch([profileImage, templateImage, backgroundColor, borderImage, iconImage], () => {
  // 這裡可以添加更多邏輯來處理預覽區域的更新
});

//人生賭場header
const currentMode = ref('two'); 

//切換顯示客製票券完成頁
const currentpage = ref(1); //預設顯示第一頁製作頁
const updatepage = () => {  //點擊送出按鈕之後顯示第二頁製作完成頁
  window.scrollTo({
    top: 0,  // 頁面的頂部
    behavior: 'auto'  // 平滑滾動
  });
  currentpage.value = 2

//=================不依賴後端下載開始 // =================使用 html2canvas(base64) 來截取票券區域為圖片，提供使用者下載(開始)

// 1. 使用 html2canvas 將票券區域轉換為圖片
const ticketPreviewElement = document.querySelector('.ticket-preview');
  
 
  // html2canvas(ticketPreviewElement, { backgroundColor: null }).then(canvas => {
  //   // 2. 將圖片轉為 Base64 格式
  //   const imageData = canvas.toDataURL('image/png');

  //   // 3. 創建一個隱藏的下載連結
  //   const downloadLink = document.createElement('a');
  //   downloadLink.href = imageData;
  //   downloadLink.download = 'custom_ticket.png'; // 設定下載的圖片名稱

  //   // 4. 自動點擊下載連結，觸發下載
  //   downloadLink.click();
  // });

  // =================使用 html2canvas (base64) 來截取票券區域為圖片，提供使用者下載(結束)


//=================依賴後端存取開始(base64)
  // // 1. 使用 html2canvas 將票券區域轉換為圖片
  // const ticketPreviewElement = document.querySelector('.ticket-preview');
  
  // // 這裡利用 html2canvas 來截取票券區域為圖片
  // html2canvas(ticketPreviewElement).then(canvas => {
  //   // 2. 將圖片轉為 Base64 格式
  //   const imageData = canvas.toDataURL('image/png');

  //   // 3. 發送 AJAX 請求，將圖片發送到後端進行存儲
  //   $.ajax({
  //     url: 'save_ticket.php', // PHP 後端處理圖片存儲的路徑
  //     type: 'POST',
  //     data: {
  //       image: imageData
  //     },
  //     success: function(response) {
  //       console.log('圖片儲存成功:', response);
  //     },
  //     error: function(error) {
  //       console.error('圖片儲存失敗:', error);
  //     }
  //   });

  //   // 4. 添加下載圖片的功能
  //   const downloadLink = document.createElement('a');  // 建立一個 <a> 元素
  //   downloadLink.href = imageData;  // 將 Base64 格式的圖片設定為 href 屬性
  //   downloadLink.download = 'ticket.png';  // 設定下載的檔案名
  //   downloadLink.click();  // 模擬點擊來觸發下載
  // });

  //=================依賴後端存取結束(base64)

  //=================依賴後端存取開始(圖片相對路徑)
  html2canvas(ticketPreviewElement, { backgroundColor: null }).then(canvas => {
  canvas.toBlob(blob => {
    const formData = new FormData();
    formData.append('image', blob, 'LC_ticket.png');

    fetch('http://illusionlab.local/PDO/TicketOrder/save_custom_ticket.php', {
      method: 'POST',
      body: formData,
    })
    .then(response => response.json())
    .then(data => {
      console.log('圖片路徑儲存成功:', data);
    })
    .catch(error => {
      console.error('圖片儲存失敗:', error);
    });
  }, 'image/png');
});
  //=================依賴後端存取結束(圖片相對路徑)

}


</script>


<template>

<div class="template">
    <div>
      <Header :mode="currentMode"/> 
    </div>
    <LC_Text3
      Title1="票卷製作"
      English="BOOKING"
            ></LC_Text3> 
    <div v-if="currentpage === 1" class="customization">
      <div class="show">
        <div class="content">
           
          <hr>
          <!-- 動態生成預覽圖 -->
          <div class="ticket-preview" >
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
          <p>頭貼選擇</p>
          <img src="../assets/images/lc_custom_profile1.svg" alt="" :class="{ click_profile: selectedTemplate === lc_custom_profile1 }" @click="updateProfile(lc_custom_profile1)">
          <img src="../assets/images/lc_custom_profile2.svg" alt="" :class="{ click_profile: selectedTemplate === lc_custom_profile2 }" @click="updateProfile(lc_custom_profile2)">
          <img src="../assets/images/lc_custom_profile3.svg" alt="" :class="{ click_profile: selectedTemplate === lc_custom_profile3 }" @click="updateProfile(lc_custom_profile3)">
        </div>
        <!-- 模板樣式 -->
        <div class="theChosenTemplate">
          <p>公版樣式</p>
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
    <div class="submit_btn" @click="updatepage" >
      <Btn_Lifecasino Button="送出" ></Btn_Lifecasino>
    </div>
    </div>
    

    <!-- 顯示票券製作完成頁面 -->
    <div v-if="currentpage === 2"  class="customization_complete">
      <h1>製作完成!</h1>
      <div class="show_complete">
        <div class="content">
          <!-- 動態生成預覽圖 -->
          <div class="ticket-preview" :style="{ backgroundColor }">
            <img v-if="templateImage" :src="templateImage" alt="Template" class="template-image">
            <img v-if="profileImage" :src="profileImage" alt="Profile" class="profile-image">
            <img v-if="borderImage" :src="borderImage" alt="Border" class="border-image">
            <img v-if="iconImage" :src="iconImage" alt="Icon" class="icon-image">
          </div>
        </div>
        <!-- 右上角的亮點 -->
        <!-- <div class="blink"></div> -->
      </div>
      <p>收到您訂製的票卷!<br>期待活動當天您的蒞臨!</p>

      <!-- 新增一個下載按鈕
      <button @click="updatepage" class="download-btn">下載票券</button> -->

      <RouterLink to="/lifecasino" >
        <div class="submit_btn" >
        <Btn_Lifecasino Button="完成" ></Btn_Lifecasino>
        </div>
      </RouterLink>
    </div>

    
  </div>
  <Footer_1></Footer_1>
  </template>
  
  
  
  <style scoped lang="scss">

    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

    @import "../assets/style";
    .template{
      background-image: url(../assets/images/lifecasino_bg2.png);

        padding-bottom: 80px;
        
        // height: 180vh;
    }

    .line[data-v-231aa63d]{
      margin-top: 20px;
      margin-bottom: 30px;
    }

    a{
      text-decoration: none;
      font-family: map-get($fontStyle, style_2);
    }

    //CSS 部分（設置預覽區域的樣式）============

    .ticket-preview {
      position: relative;
      width: 60%;
      max-width: 768px;
      margin: 0 auto;
      text-align: center;
      // height: 280px;
      padding-bottom: 22.2%; // 16:9 比例的高度（可以根据需要调整）
      
  
  }

.template-image,
.profile-image,
.border-image,
.icon-image {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  height: auto;
  pointer-events: none; /* 確保圖層不會阻擋點擊事件 */
  object-fit: contain; // 确保图像保持比例并适应容器
}

.template-image {
  /* 預設模板底色 */
  z-index: 1; /* 位於最底層 */
}

.profile-image {
  /* 頭貼 */
  top: 43.5%;
  left: 30%;
  transform: translate(-50%, -50%);
  // top: 60px; /* 根據需要調整 */
  // left: 170px; /* 根據需要調整 */
  z-index: 3; /* 位於模板上方 */
  width: 15%; /* 調整這裡來控制頭貼的寬度 */
  height: auto; /* 自動調整高度，保持圖片比例 */
}

.border-image {
  /* 邊框 */


  z-index: 2; /* 位於頭貼和其他元素上方 */
  width: 65%; /* 調整這裡來控制頭貼的寬度 */
  height: auto; /* 自動調整高度，保持圖片比例 */
  top: 50.5%;
  left: 50%;
  transform: translate(-50%, -50%);
  
}

.icon-image {
  /* 小圖示 */
  z-index: 4; /* 位於所有元素上方 */
  width: 2.7%; /* 調整這裡來控制頭貼的寬度 */
  height: auto; /* 自動調整高度，保持圖片比例 */
  top: 32.5%;
  left: 62.4%;
  transform: translate(-50%, -50%);
}


    // 上方圖示區==================

    .show{
        
        
        width: 100%;
        // display: flex;
        // justify-content: center;
        position: sticky;
        top: 0; /* 固定在頁面頂部 */
        // background-color: white;
        background-image:map-get($map: $color_1, $key: product); /* 背景顏色，防止滾動時內容重疊 */
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
        font-size: 16px !important;
        width: 100%;
        margin-top: 40px;
        margin-bottom: 20px;
        font-weight: bold;
        
    }

    .profile img{
        max-width:14%;
        object-fit: cover;
        margin-right: 20px;
        margin-bottom: 20px;
        
    }

    p{
        font-weight: 800;
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
        
        border: 1px solid #FFF;
        border-radius: 12px;
        
    }

    .ticket_colors h2{
        font-family: map-get($fontStyle, style_2);
        font-size: 16px;

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
        font-size: 16px;

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
        font-size: 16px;

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
        top: 2px;
        left: 8px;
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
        top: -2px;
        width: 3px;
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


    //票券製作完成====================

    /* 定義票券完成動畫 */
    @keyframes shake {
      0% { transform: rotate(0deg); }
      10% { transform: rotate(5deg); }
      20% { transform: rotate(-5deg); }
      30% { transform: rotate(4deg); }
      40% { transform: rotate(-4deg); }
      50% { transform: rotate(3deg); }
      60% { transform: rotate(-3deg); }
      70% { transform: rotate(2deg); }
      80% { transform: rotate(-2deg); }
      90% { transform: rotate(1deg); }
      100% { transform: rotate(0deg); }
    }

    /* 調整亮點彈出動畫，讓其在扭動後出現 */
    @keyframes sparkle {
      0% {
        opacity: 0;
        transform: scale(0) rotate(0deg);
      }
      50% {
        opacity: 1;
        transform: scale(1.5) rotate(180deg);
      }
      100% {
        opacity: 0;
        transform: scale(1) rotate(360deg);
      }
    }


    /* 給票券容器增加扭動效果 */
    .show_complete {
      width: 100%;
      animation: shake 1.5s ease-in-out;
      position: relative; /* 為亮點彈出效果定位 */
    }

    /* 亮點的樣式，使用 CSS 畫出火花效果 */
    .blink {
      position: absolute;
      top: 25px;
      right: 360px;
      width: 40px;
      height: 40px;
      background-color: transparent;
      opacity: 0; /* 初始狀態隱藏亮點 */
      animation: sparkle 0.5s ease-in-out forwards;
      animation-delay: 1.5s; /* 延遲2秒後出現，與扭動結束時間相同 */
    }

    /* 火花的形狀 */
    .blink::before,
    .blink::after {
      content: '';
      position: absolute;
      background: gold;
      border-radius: 50%;
    }

    /* 外圈火花 */
    .blink::before {
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      box-shadow:
        0 0 10px 5px rgba(255, 215, 0, 0.8),
        0 0 20px 10px rgba(255, 215, 0, 0.6),
        0 0 30px 15px rgba(255, 215, 0, 0.4);
    }

    /* 內圈火花 */
    .blink::after {
      width: 50%;
      height: 50%;
      top: 25%;
      left: 25%;
      box-shadow:
        0 0 5px 2px rgba(255, 255, 255, 0.9),
        0 0 10px 5px rgba(255, 255, 255, 0.7);
    }

    
    .customization_complete h1{
      font-family: map-get($fontStyle, style_2);
      color: map-get($colorfont_0, white);
      font-size: 28px;
      margin-bottom: 20px;
      font-weight: bold;
      line-height: 40px;
      text-align: center;
    }

    .customization_complete p{
      font-family: map-get($fontStyle, style_2);
      color: map-get($colorfont_0, white);
      font-size: 16px;
      margin-top: 40px;
      margin-bottom: 20px;
      font-weight: bold;
      line-height: 40px;
      text-align: center;
    }


    /* ==========RWD斷點============== */

    @media screen and (max-width: 780px) { 

      .ticket-preview {
        position: relative;
        width: 100vw;
        max-width: 768px;
        margin: 0 auto;
        text-align: center;
        // height: 280px;
        padding-bottom: 28%; // 16:9 比例的高度（可以根据需要调整）
        
  
      }
      .choosen{
        width: 80vw;
        max-width: 1000px;
        margin: 0 auto;

      }

      .profile img{
        max-width:20%;
        object-fit: cover;
        margin-right: 20px;
        margin-bottom: 20px;
        
      }
      .theChosenTemplate img{
        max-width:100%;
        object-fit: cover;
        margin-top: 20px;
        margin-bottom: 20px;
      }

      .ticket_color{
        width: 8vw;
        margin: 12px;
      }

      .icon-image {
        /* 小圖示 */
        z-index: 4; /* 位於所有元素上方 */
        width: 2.7%; /* 調整這裡來控制頭貼的寬度 */
        height: auto; /* 自動調整高度，保持圖片比例 */
        top: 28%;
        left: 62.4%;
        transform: translate(-50%, -50%);
      }

      .confirm{
        width: 80vw;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: start;
        font-family: map-get($fontStyle, style_2);
        color: map-get($colorfont_0, white);
        font-weight: bold;
        
      }

      
    }


    
</style>