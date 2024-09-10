<template>
    <swiper
    :slidesPerView="1"
    :spaceBetween="30"
    :loop="true"
    :navigation="true"
    :modules="modules"
    class="mySwiper3"
  >
    <swiper-slide class="items" >
        <img src="../assets/images/LC_slide3_p1.svg" alt="" >
        <p class="text">酒精無限暢飲</p>
    </swiper-slide>
   
    <swiper-slide class="items">
        <img src="../assets/images/LC_slide3_p2.svg" alt="" >
        <p class="text">精緻點心自助吧</p>
    </swiper-slide>

    <swiper-slide class="items">
          <img src="../assets/images/LC_slide3_p3.svg" alt="" >
          <p class="text">享受120分鐘<br>精彩刺激的賭局</p>
    </swiper-slide>
  </swiper>
    
</template>

<script>
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


  .items{
      // width: fit-content;
      height: fit-content;
      animation: move 3s infinite linear;


      img{
        max-width: 450px;
        width: 100%;
        padding: 0 20px;
        
      }
  }


  .text{
      text-align: center;
      font-weight: 300;
      line-height: 200%;
      font-size: map-get($map: $fontSize, $key: h3);
      color: white;
  }
    
        
@keyframes move{
    0% {
        transform: translate(0, 0)
        }
    25% {
        transform: translate(-5px, -5px)
        }
    50% {
    transform: translate(0, -10px)
    }
    75% {
    transform: translate(5px, -5px)
    }
    100% {
    transform: translate(0, 0)
    }
  }

.mySwiper3 {

  // border: 2px solid green;
  width: 100%;
  height: 60%;
}

.mySwiper3 .swiper-slide {
  
  // border: 2px solid rgb(128, 0, 0);
  height: 100%;
  text-align: center;
  font-size: 18px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}


.mySwiper3 .swiper{
    --swiper-theme-color: #7976BB;/* 设置Swiper风格 */
    
    --swiper-navigation-size: 30px;/* 设置按钮大小 */
  }
</style>

<style>
.mySwiper3 .swiper-pagination-current,
.swiper-pagination-total,
.swiper-pagination-fraction {
    display: none;
}

.mySwiper3 .swiper-button-next, .mySwiper3 .swiper-button-prev{
    --swiper-theme-color: #ff990000;
    background-image: url('../assets/images/LC_btn_prev.svg');
    background-repeat: no-repeat;
    background-size: contain;
    --swiper-navigation-size: 10%;
    
    /* --swiper-navigation-top-offset:115%; */
    /* --swiper-navigation-bottom-offset:115%; */
}

.mySwiper3 .swiper-button-prev{
    left: 15%;
}


.mySwiper3 .swiper-button-next{
    
    transform: rotateY(180deg);
    right: 15%;
}
</style>