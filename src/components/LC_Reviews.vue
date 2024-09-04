<template>
  <div class="wrapper">

 
<swiper
    :effect="'flip'"
    :grabCursor="true"
    :pagination="{
      el:'.swiper-pagination',
      clickable: false
    }"
    :navigation="true"
    :modules="modules"
    :loop="true"
    class="mySwiper"
  >
  <!-- <div class="swiper-button-prev swiper-button-black" slot="button-prev" @click="prev">
    <img src="../assets/images/LC_btn_prev.svg" alt="">
  </div> -->
  <!-- =======slide1========== -->
    <swiper-slide>
      <section>
        <img class="poker poker_right" src="../assets/images/LC_Poker1.svg" alt="">
        <div class="wraper_R">
          <img class="photo_R" src="../assets/images/LC_R_p1.jpg" alt="">
          <div class="text_R">
            <p class="p1">jefff2223</p>
            <p>這是我體驗過最刺激的活動！每個決策都讓我心跳加速，彷彿真的在賭上人生。太棒了！</p>
          </div>
        </div>
        <img class="poker poker_left" src="../assets/images/LC_Poker1.svg" alt="">
      </section>
    </swiper-slide>

  <!-- =======slide2========== -->
    <swiper-slide>
      <section>
        <img class="poker poker_right heart" src="../assets/images/LC_Poker2.svg" alt="">
          <div class="wraper_R">
            <img class="photo_R" src="../assets/images/LC_R_p2.jpg" alt="">
            <div class="text_R">
              <p class="p1">kett_ou</p>
              <p>人生賭場讓我重新思考了生活中的選擇與風險。沉浸在這樣的環境中，感覺每一步都是命運的抉擇。</p>
            </div>
          </div>
          <img class="poker poker_left heart" src="../assets/images/LC_Poker2.svg" alt="">
      </section>
    </swiper-slide>

  <!-- =======slide3========== -->    
   <swiper-slide>
    <section>
        <img class="poker poker_right " src="../assets/images/LC_Poker3.svg" alt="">
          <div class="wraper_R">
            <img class="photo_R" src="../assets/images/LC_R_p3.jpg" alt="">
            <div class="text_R">
              <p class="p1">Jack23</p>
              <p>這次體驗太真實了，讓我覺得自己真正在賭場裡。無論輸贏，都讓我學到人生中關於決策的重要性。</p>
            </div>
          </div>
          <img class="poker poker_left " src="../assets/images/LC_Poker3.svg" alt="">
      </section>
   </swiper-slide>

   <!-- =======slide4========== -->    
   <swiper-slide>
    <section>
        <img class="poker poker_right " src="../assets/images/LC_Poker4.svg" alt="">
          <div class="wraper_R">
            <img class="photo_R" src="../assets/images/LC_R_p4.jpg" alt="">
            <div class="text_R">
              <p class="p1">Tinabeauty</p>
              <p>從沒想過一個遊戲能帶來這麼深刻的感悟。人生賭場不僅刺激，還讓我重新審視自己在生活中的每個選擇。</p>
            </div>
          </div>
          <img class="poker poker_left " src="../assets/images/LC_Poker4.svg" alt="">
      </section>
  </swiper-slide>
    
  </swiper>
</div>
</template>

<script setup>
import 'swiper/css';
import 'swiper/css/pagination';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { EffectFlip, Pagination, Navigation} from 'swiper/modules';
import 'swiper/css/mousewheel'

const modules = [EffectFlip, Pagination, Navigation];

import 'swiper/css/effect-flip';
import 'swiper/css/navigation';





</script>

<style lang="scss" scoped>
@import "../assets/style";
p{
  font-weight: 300;
  line-height: 150%;
  font-size: map-get($map: $fontSize, $key: p);
  color: white;
}

.wrapper{
  // --swiper-navigation-size: 0;
}

section{
  display: flex;
  flex-direction: column;
  align-content: center;
  .poker{
    width: 24px;
    padding:15px 10px;
  }
  .poker_right{
    // border: 2px solid red;
    align-self: flex-end;
  }

  .wraper_R{
    // border: 2px solid red;
    // background-color: #1E1E2F;
    background-image: linear-gradient(147deg, #12121a 3.26%, rgba(30, 30, 47, 0.836) 97.45%);
    height: 399px;

    .photo_R{
      width: 100%;
      height: 260px;
      object-fit: cover;
    }

    .text_R{
      padding: 10px;
      
      .p1{
        margin-bottom: 10px;
      }
    }
  }

  .poker_left{
    transform: rotateX(180deg);
    // border: 2px solid red;
  }
}

.heart{
  padding:18px 10px !important;
}

// =========箭頭============//




// ==========================

.swiper {
  // background-color: #333;
  // border: 2px solid red;
  width: 300px;
  height: 520px;
  padding: 20px 100px;
}

.swiper-slide {
  // border: 2px solid rgb(0, 255, 4);
  background-color: white;
  border-radius: 10px;

  background-position: center;
  background-size: cover;
  width: 300px;
  height: 520px;
}

</style>

<style>
.swiper-pagination-current,
.swiper-pagination-total,
.swiper-pagination-fraction {
    display: none;
}

.swiper .swiper-button-next, .swiper .swiper-button-prev{
    --swiper-theme-color: #ff990000;
    background-image: url('../assets/images/LC_btn_prev.svg');
    background-repeat: no-repeat;
    background-size: contain;
    --swiper-navigation-size: 16%;
    /* --swiper-navigation-top-offset:115%; */
    /* --swiper-navigation-bottom-offset:115%; */
}




.swiper-button-next{
    
    transform: rotateY(180deg);
}
</style>