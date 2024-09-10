<template>
    <swiper
    :slidesPerView="1"
    :spaceBetween="30"
    :loop="true"
    :navigation="true"
    :modules="modules"
    class="mySwiper5"
  >
    <swiper-slide class="slide2" >
      <li class="item">
          <LC_h2Text Title="命運之門" class="title"></LC_h2Text>
          <img src="../assets/images/LC_slide2_p1.png" class="image">
          <p>從兩扇門中選擇一扇，開啟專屬的人生旅程。</p>
      </li>
    </swiper-slide>
   
    <swiper-slide class="contain">
      <li class="item">
          <LC_h2Text Title="人生賭注" class="title"></LC_h2Text>
          <img src="../assets/images/LC_slide2_p2.png" class="image">
          <p>在健康、愛情、事業等不同領域下注，獲得人生點數。</p>
      </li>
    </swiper-slide>

    <swiper-slide class="contain">
      <li class="item">
          <LC_h2Text Title="命運輪盤" class="title"></LC_h2Text>
          <img src="../assets/images/LC_slide2_p3.png" class="image">
          <p>轉動大輪盤，接受命運的挑戰與啟示。</p>
      </li>
    </swiper-slide>

    <swiper-slide class="contain">
      <li class="item">
          <LC_h2Text Title="最後賭徒" class="title"></LC_h2Text>
          <img src="../assets/images/LC_slide2_p4.png" class="image">
          <p>用贏得的點數參加終極挑戰，總結人生教訓。</p>
      </li>
    </swiper-slide>

    <swiper-slide class="contain">
      <li class="item">
          <LC_h2Text Title="人生回顧" class="title"></LC_h2Text>
          <img src="../assets/images/LC_slide2_p5.png" class="image">
          <p>紀錄參加者在活動中的精彩瞬間。</p>
      </li>
    </swiper-slide>
  </swiper>
    
</template>

<script>
import LC_h2Text from './LC_h2Text.vue';
   // Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';

import 'swiper/css/pagination';

// import required modules
import { Pagination, Navigation } from 'swiper/modules';

export default {
  components: {
    Swiper,
    SwiperSlide,
    LC_h2Text
  },
  setup() {
    return {
      modules: [Pagination, Navigation],
    };
  },
};
</script>


<style lang="scss" scoped>
@import "../assets/style";

h4{
    font-size: map-get($map: $fontSize, $key: h4);
    color: map-get($map: $colofont_1, $key: white);
    font-weight: 600;
}
p{
    font-weight: 300;
    line-height: 200%;
    font-size: map-get($map: $fontSize, $key: p);
    color: white;
}

.contain{
       margin: 0 auto;
       max-width: 1100px;
       justify-content: space-around;
       padding: 0 50px 50px;
}
.item .title{
    max-width: 560px;
    margin: 20px 10% 20px;

  }

.item p{
  // border: 2px solid red;

    text-align: center;
    margin: 0 auto;
    margin-top: 25px;
    max-width: 380px;


}
.item img{
    // border: 2px solid red;
      max-width: 380px;
      // margin-top: 20px;
      display: block;
      text-align: center;
      margin: 0 auto;
    }
    
.item{
        // border: 2px solid rgb(0, 255, 34);
        // max-width: 400px;
        width: 100%;
        margin: 0 auto;

    }



.mySwiper4 {

  // border: 2px solid green;
  width: 100%;
  // height: 60%;
}

.mySwiper4 .swiper-slide {
  
  // border: 2px solid rgb(128, 0, 0);
  height: 100%;
  text-align: center;
  font-size: 18px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}


.mySwiper4 .swiper{
    --swiper-theme-color: #7976BB;/* 设置Swiper风格 */
    
    --swiper-navigation-size: 30px;/* 设置按钮大小 */
  }
</style>

<style>
.mySwiper5 .swiper-pagination-current,
.swiper-pagination-total,
.swiper-pagination-fraction {
    display: none;
}

.mySwiper5 .swiper-button-next, .mySwiper5 .swiper-button-prev{
    --swiper-theme-color: #ff990000;
    background-image: url('../assets/images/LC_btn_prev.svg');
    background-repeat: no-repeat;
    background-size: contain;
    --swiper-navigation-size: 10%;
    
    /* --swiper-navigation-top-offset:115%; */
    /* --swiper-navigation-bottom-offset:115%; */
}

.mySwiper5 .swiper-button-prev{
    left: 15%;
}


.mySwiper5 .swiper-button-next{
    
    transform: rotateY(180deg);
    right: 15%;
}
</style>