<template>
    <swiper
    :slidesPerView="1"
    :spaceBetween="30"
    :loop="true"
    :pagination="{
      clickable: true,
    }"
    :navigation="true"
    :modules="modules"
    class="mySwiper4"
  >
    <swiper-slide class="items" >
      <div class="warp">
        <img class="crown" src="../assets/images/LC_icon4.svg" alt="">
        <img src="../assets/images//LC_Product1.png" alt="">
        <div class="te">
            <h4>奢華金杯</h4>
            <p>帶上這杯，你就是賭場最潮 ! </p>
        </div>
      </div>
    </swiper-slide>
   
    <swiper-slide class="items">
      <div class="warp">
        <img class="crown" src="../assets/images/LC_icon4.svg" alt="">
        <img src="../assets/images//LC_Product2.png" alt="">
        <div class="te">
            <h4>賭聖帽T</h4>
            <p>穿上這件，你就是賭場焦點 ! </p>
        </div>
    </div>
    </swiper-slide>

    <swiper-slide class="items">
      <div class="warp">
        <img class="crown" src="../assets/images/LC_icon4.svg" alt="">
        <img src="../assets/images//LC_Product3.png" alt="">
        <div class="te">
            <h4>暗黑撲克牌組</h4>
            <p>秀出這張，你就是牌桌勝者 !  </p>
        </div>
      </div>
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
  .items{
    text-align: center;

    .warp{

      background-image:map-get($map: $color_1, $key: product);
      border-radius: 24px;
      padding:30px 30px 5px 30px;
      position: relative;


      img{
        max-width: 550px;
        width: 100%;
        
        
      }
      .crown{
        width: 80px;
        
        position: absolute;
        left:5%;
        top: -5%;
    }
  
    p{
      color: white;
    }
    .te{
        // border: 2px solid red;
        text-align: left;
        padding: 10px 30px;
  
        > h4{
            margin-bottom: 10px;
        }
    }
    }


  }



    
        


.mySwiper4 {

  // border: 2px solid green;
  width:60%;
  height: 60%;
}

.mySwiper4 .swiper-slide {
  
  // border: 2px solid rgb(128, 0, 0);
  height: 90%;
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
.mySwiper4 .swiper-pagination-current,
.swiper-pagination-total,
.swiper-pagination-fraction {
    display: none !important;
}

.mySwiper4 .swiper-button-next, .mySwiper4 .swiper-button-prev{
    --swiper-theme-color: #ff990000;
    background-image: url('../assets/images/LC_btn_prev.svg');
    background-repeat: no-repeat;
    background-size: contain;
    --swiper-navigation-size: 10%;
    
    /* --swiper-navigation-top-offset:115%; */
    /* --swiper-navigation-bottom-offset:115%; */
}

.mySwiper4 .swiper-button-prev{
    left: 15%;
}


.mySwiper4 .swiper-button-next{
    
    transform: rotateY(180deg);
    right: 15%;
}
</style>