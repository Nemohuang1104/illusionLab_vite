<template>
  <Header class="header"></Header>

 <swiper class="mySwiper"
 :navigation="true" 
 :modules="modules" 
 :loop="true"
 :autoplay="{delay: 4000, disableOnInteraction: false}"
  :speed="800"

 >
    <swiper-slide class="slide slide1">
      <div class="contain">
        <img src="../assets/images/logo_lifecasino.svg" alt="">
        <p>加入全新「命運之輪」挑戰，決策力將主宰你的一切，來場智慧與膽識的較量吧！</p>
      </div>
    </swiper-slide>

    <swiper-slide class="slide slide2">
      <div class="contain">
        <img src="../assets/images/logo_StrellarFrontierIntro.svg" alt="">
        <p>全新星球探險線路解鎖！探索未知的宇宙邊界，解開前所未有的星際謎團，挑戰極限。</p>
      </div>
    </swiper-slide>

    <swiper-slide class="slide slide3">
      <div class="contain">
        <img src="../assets/images/logo_MindSpectrum.svg" alt="">
        <p>透過自然音效和光影藝術的融合，心靈光譜帶來更深層的冥想體驗，讓你徹底釋放壓力。</p>
      </div>
    </swiper-slide>
  </swiper>
</template>

<script>
import Header from '@/components/Header_0.vue';
import { Swiper, SwiperSlide } from 'swiper/vue';

  // Import Swiper styles
  import 'swiper/css';

  import 'swiper/css/navigation';


  // import required modules
  import { Navigation, Autoplay } from 'swiper/modules';

  export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    setup() {
      return {
        modules: [Navigation, Autoplay],
      };
    },
  };
</script>

<style lang="scss" scoped>
@import "../assets/style";


.slide1{
  background-image: url(../assets/images/News_swiper1.jpg);
}

.slide2{
  background-image: url(../assets/images/News_swiper2.jpg);
  background-position: center;
}

.slide3{
  background-image: url(../assets/images/carousel3.png);
  background-position: right;

}

.contain{
  text-align: left;
  padding-left: 50px;
  > img{
    width: 500px;
   }
   p{
    max-width: 500px;
    font-size: map-get($map: $fontSize, $key: h4);
    font-family: map-get($map: $fontStyle, $key: style_1);
    color: map-get($map: $colorfont_0, $key: white);
    padding-left: 30px;
    line-height: 2;
   }
}

.slide{
  // border: 2px solid red;
  height: 480px;
  background-repeat: no-repeat;
  background-size: cover;
  flex-direction: column;
  text-align: center;
  font-size: 18px;

  /* Center slide text vertically */
  display: flex;
  justify-content: center;
  align-items: start;

  
  
}
.swiper {
  width: 100%;
  height: 100%;
}




</style>

<style>
.swiper-button-next, .swiper-button-prev{
    --swiper-theme-color: #ffffff;

}
</style>