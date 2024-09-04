<script setup>
import { ref } from "vue";
import Header_0 from "../components/Header_0.vue";
import Header_2 from "@/components/Header_2.vue";
import Footer_0 from "@/components/Footer_0.vue";
import Btn_Lifecasino from "@/components/Btn_Lifecasino.vue";


// 問題數據
const questions = ref([
  { id: 1, title: "Q.什麼是沉浸式體驗？", info: "沉浸式體驗是一種互動活動，讓參與者完全沉浸在虛擬或現實的環境中，感覺自己是體驗的一部分。", expanded: false },
  { id: 2, title: "Q.參加沉浸式體驗需要特殊準備嗎？", info: "不需要特殊準備。建議穿著舒適的衣物，並提前到場以了解活動的背景和指引。", expanded: false },
  { id: 3, title: "Q.活動時長是多少？", info: "活動的時長通常在1到2小時之間，具體時間會因體驗內容而異。", expanded: false },
  { id: 4, title: "Q.體驗是否適合所有年齡層？", info: "大多數沉浸式體驗適合成人及青少年，但有些活動可能對於兒童或年長者不太適合。請查閱每個活動的詳細說明。", expanded: false },
  { id: 5, title: "Q.我可以中途退出體驗嗎？", info: "可以。雖然我們希望你能完整參與，但如果感到不適，隨時可以告知我們的工作人員。", expanded: false },
  { id: 6, title: "Q.是否需要預訂門票", info: "是的，我們建議提前預訂，以確保你能參加心儀的體驗活動。", expanded: false },
  { id: 7, title: "Q.體驗過程中允許拍照或錄影嗎？", info: "為了保護其他參與者的隱私和保留體驗的神秘感，多數活動不允許拍照或錄影。具體政策請參考各活動的規則。", expanded: false },
  { id: 8, title: "Q.如果我有健康問題，還可以參加嗎？", info: "我們建議有特殊健康狀況的參與者提前告知我們，某些體驗可能需要特別注意或不建議參與。", expanded: false },
  { id: 9, title: "Q.是否有提供退款或改期的政策？", info: "我們有一定的退款和改期政策，具體條款請參考購票頁面的相關說明。", expanded: false },
  { id: 10, title: "Q.活動中使用的語言是什麼？", info: "大多數體驗使用當地語言進行。我們也提供其他語言版本的活動，具體信息請參閱活動介紹。", expanded: false },
]);

// 切換問題的展開狀態
const toggle = (question) => {
  if (question.expanded) {
    question.expanded = false;
  } else {
    questions.value.forEach((q) => {
      q.expanded = false;
    });
    question.expanded = !question.expanded;
  }
};

// 根據展開狀態設定內容樣式
const getContentStyle = (question) => {
  return { "max-height": question.expanded ? "100px" : 0 };
};

// 根據展開狀態設定信息的透明度樣式
const getInfoStyle = (question) => {
  return { opacity: question.expanded ? 1 : 0 };
};
</script>


<template>

    <div class="template">
      <Header_0></Header_0>
        <div class="tab">
          
          <RouterLink tag="div" to="/LC_Question" class="tab-item" replace><Btn_Lifecasino Button="常見問題"></Btn_Lifecasino></RouterLink>
          <RouterLink tag="div" to="/LC_TicketRule" class="tab-item" replace><Btn_Lifecasino Button="票務規則"></Btn_Lifecasino></RouterLink>
          <RouterLink tag="div" to="/LC_TicketChange" class="tab-item" replace><Btn_Lifecasino Button="退換票政策"></Btn_Lifecasino></RouterLink>
        </div>
        <div class="top_img">
          <img src="../assets/images/Line 24.png" alt="">
        </div>
          
        <div class="replace">
          <RouterView></RouterView>
          
      </div>
        <div class="icons">
            <img src="../assets/images/cib_line.svg" alt="">
            <img src="../assets/images/simple-icons_facebook.svg" alt="">
            <img src="../assets/images/bi_instagram.svg" alt="">
        </div>
        <Footer_0></Footer_0>
    </div>
    
  </template>
  
  
  
  <style scoped lang="scss">

    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

    @import "../assets/style";
    .template{
        background: #313131;
        // height: 180vh;
    }

    .icons{
      margin-top: 80px;
      display: flex;
      justify-content: center;
      margin-bottom: 80px;
      gap: 32px;
    }

    .icons img{
      width: 40px;
      cursor: pointer;
    }

    .top_img{
      width: 100%;
      display: flex;
      justify-content: center;
      margin-bottom: 4%;
      
    }

    .title{
        margin-bottom: 32px;
    }

    .title h1{
        width: 100%;
        text-align: center;
        font-size: map-get($fontSize, h1);
        font-weight: bold;
        font-family: map-get($fontStyle, style_2);
        color: map-get($color_0, btn_orange);
    }
    .title h3{
        width: 100%;
        text-align: center;
        font-size: map-get($fontSize, h3);
        font-weight: bold;
        font-family: map-get($fontStyle, style_2);
        color: map-get($color_0, btn_orange);
    }

    .question {
        // padding: 1rem 1.5rem;
        // border: 2px solid hsl(209, 34%, 30%); /* --clr-grey-3 */
        margin-bottom: 1rem;
        border-radius: 0.25rem; /* --radius */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* --light-shadow */
        background-color: var(--clr-white);
        font-family: map-get($fontStyle, style_2);
        border-radius: 24px;
        font-weight: bold;
        background: #1E1E2F;
    }

    .question:last-child {
        // padding: 1rem 1.5rem;
        // border: 2px solid hsl(209, 34%, 30%); /* --clr-grey-3 */
        margin-bottom: 100px;

    }

    .question h4 {
        color: map-get($colorfont_0, white);
        text-transform: none;
        line-height: 1.5;
        cursor: pointer;
    }

    .question p {
        color: hsl(210, 22%, 49%); /* --clr-grey-5 */
        // margin-top: 0.5rem;
        margin-left: 0;
        margin-right: 0;
        width: 98%;
        background: map-get($colorfont_0, white);
        // padding: 1rem 0 1rem 1.5rem ;
        padding: 2% 0;
        padding-left: 2%;
        border-radius:  0 0 20px 20px;
        
       
    }

    .question header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        // background: #1E1E2F;
        padding: 8px 20px;
        // border-radius: 20px 20px ;

    }

    .btn {
        background: transparent;
        border-color: transparent;
        width: 2rem;
        height: 2rem;
        background: #eae6eb; /* --clr-grey-special */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #b4345c; /* --clr-red-special */
        cursor: pointer;
        margin-left: 1rem;
        align-self: center;
        min-width: 2rem;
        z-index: 1;
    }

    .content {
        max-height: 0;
        transition: max-height 0.2s ease-out;
        width: 100%;
    }

    .info {
        margin: 0 auto;
        width: 70%;
        z-index: -1;
        opacity: 1;
        transition: opacity 0.2s ease-out;
        
    }

    .tab{
    display: flex;
    gap: 8px;
    justify-content: center;
    margin-bottom: 2%;
    }

    
</style>
  