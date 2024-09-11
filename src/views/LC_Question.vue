<script setup>
import { ref } from "vue";
import Header_0 from "../components/Header_0.vue";

import Footer_0 from "@/components/Footer_0.vue";
import Btn_Lifecasino from "@/components/Btn_Lifecasino.vue";
import LC_Text3 from '@/components/LC_Text3.vue';

import Btn3_Lifecasino from "@/components/Btn3_Lifecasino.vue";
import Btn2_Lifecasino from "@/components/Btn2_Lifecasino.vue";

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
  return { "transform": question.expanded ? "scale(1 ,1)" : "scale(1 ,0)" };
};
</script>


<template>

  <div class="wrapper">
    <div class="tab">

        <RouterLink tag="div" to="/LC_Question" class="tab-item" replace >
          <Btn2_Lifecasino Button="常見問題" ></Btn2_Lifecasino>
        </RouterLink>

        <RouterLink tag="div" to="/LC_TicketRule" class="tab-item" replace>
          <Btn3_Lifecasino Button="票務規則"></Btn3_Lifecasino>
          <!-- <component :is="currentComponent" @click="currentButton.value = 'tab3'" Button="票務規則"/> -->
        </RouterLink>

        <RouterLink tag="div" to="/LC_TicketChange" class="tab-item" replace>
          <Btn3_Lifecasino Button="退換票政策"></Btn3_Lifecasino>
        </RouterLink>
        </div>

        <div class="top_img">
        <img src="../assets/images/Line 24.png" alt="">
        </div>
      <div class="title">
        <LC_Text3
            Title1="常見問題"
            English="Q & A">
        </LC_Text3> 
      </div>
      <section class="info">
          <article v-for="question in questions" :key="question.id" class="question">
              <header class="question-title">
                <div class="q_warp" @click="toggle(question)">
                  <h4  >
                      {{ question.title }}
                  </h4>
                  
                </div>
              <button class="btn" @click="toggle(question)">
                  <svg
                  v-show="question.expanded"
                  class="w-6 h-6"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                  >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M20 12H4"
                  ></path>
                  </svg>
                  <svg
                  v-show="!question.expanded"
                  class="w-6 h-6"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                  >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                  ></path>
                  </svg>
              </button>
              </header>
              <div :style="getContentStyle(question)" class="content">
              <p :style="getInfoStyle(question)" class="info">{{ question.info }}</p>
              </div>
          </article>
        </section>

    </div>
    
  </template>
  
  
  
  <style scoped lang="scss">

    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

    @import "../assets/style";
    .template{
        background: #313131;
        // height: 180vh;
    }

    .top_img{
      img{
        max-width: 800px;
        width: 100%;

      }
  
  display: flex;
  justify-content: center;
  margin: 0 10px;
  margin-bottom: 4%;

}

    .title{
        margin-bottom: 32px;
    }

    // .title h1{
    //     width: 100%;
    //     text-align: center;
    //     font-size: map-get($fontSize, h1);
    //     font-weight: bold;
    //     font-family: map-get($fontStyle, style_2);
    //     color: map-get($color_0, btn_orange);
    // }
    // .title h3{
    //     width: 100%;
    //     text-align: center;
    //     font-size: map-get($fontSize, h3);
    //     font-weight: bold;
    //     font-family: map-get($fontStyle, style_2);
    //     color: map-get($color_0, btn_orange);
    // }
    .q_warp{
      // border: 2px solid rgb(0, 60, 255);
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    .question {
      // border: 2px solid rgb(0, 255, 0);
        // padding: 1rem 1.5rem;
        // border: 2px solid hsl(209, 34%, 30%); /* --clr-grey-3 */
        margin-bottom: 1rem;
        border-radius: 0.25rem; /* --radius */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* --light-shadow */
        background-color: var(--clr-white);
        font-family: map-get($fontStyle, style_2);
        border-radius: 24px;
        // font-weight: bold;
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
    }

    .question p {
        color: hsl(210, 22%, 49%); /* --clr-grey-5 */
        // margin-top: 0.5rem;
        margin-left: 0;
        margin-right: 0;
        width: 100%;
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
        // cursor: pointer;
        // border: 2px solid red

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
        max-width: 800px;
        padding: 0 5%;
        z-index: -1;
        opacity: 1;
        // transition: opacity 0.2s ease-out;
        transform-origin: top left;
        transition: transform 0.1s ease-out;
        p{
          line-height: 1.2;
          font-size: map-get($map: $fontSize, $key:p );
        }
    }
    .tab-item{
      max-width: 200px;
      width: 100%;
      
    }

    .tab{
    display: flex;
    gap: 2%;
    max-width: 660px;
    justify-content: space-around;
    margin: 0 auto;
    margin-bottom: 2%;
    padding: 0 20px;
    }

  @media (max-width: 430px) {
    .tab{
      gap: 8px;
    }

    
}
    
</style>
  
  
  