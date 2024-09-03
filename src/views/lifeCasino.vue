<template>
    <div class="wrapper">
    <Header :class="{ 'show-header': showHeader }" class="header-nav"></Header>

    <swiper ref="mySwiper" class="mySwiper"
    :direction="'vertical'"
    :pagination="{
      clickable: false
    }"
    :mousewheel= "true"
    :speed="2000"
    :freemode="true" 
    :modules="modules"
    :parallax="true"
    @swiper="onSwiperInit"
   >
   

    <div slot="container-start" class="parallax-bg" data-swiper-parallax="-23%">
        <img src="../assets/images/lifecasino_bg1.png" alt="">
       <!-- ===background animation=== -->
        <LC_smoke class="smoke"></LC_smoke>
        <PokerFall class="poker"></PokerFall>
    </div>
    <!-- ===========section1============= -->
    <swiper-slide>

        <section class="slide slide1" data-swiper-parallax="-23%">
            <div class="slide1__contain">
                <img class="logo" src="../assets/images/logo_lifecasino.svg" alt="">
                <p>放下名字和身分，參加不能回頭的賭局，你願意為了勝利賭上多少？ </p>
                <Btn_Lifecasino class="LC_btn" Button = "進入賭場"></Btn_Lifecasino>
            </div>
            <img class="slide1__img" src="../assets/images/lifecasino_p3.png" alt="">
        </section>
    </swiper-slide>

    <!-- ===========section2============= -->


    <swiper-slide>
        <section class="slide slide2">
        

        </section>
    </swiper-slide>

</swiper>


   
   </div>
</template>

<script setup>
// import { ref, onMounted, reactive, computed, } from 'vue';

import Btn_Lifecasino from '@/components/Btn_Lifecasino.vue';
import LC_smoke from '@/components/LC_smoke.vue';
import PokerFall from '@/components/PokerFall.vue';
import Header from '@/components/Header_0.vue';

// ===============swiper============//
import 'swiper/css';
import 'swiper/css/pagination';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination, Mousewheel, Autoplay, Parallax} from 'swiper/modules';
import 'swiper/css/mousewheel'

const modules = [Pagination, Mousewheel, Autoplay, Parallax];

// =============gsap============//
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// ============header=============//

import { ref, onMounted, onUnmounted } from 'vue';

const showHeader = ref(false);
const slide2 = ref(null);

// 檢查 slide2 是否在視口內
const checkSlide2Visibility = () => {
  const slide2Rect = slide2.value.getBoundingClientRect();
  if (slide2Rect.top <= window.innerHeight && slide2Rect.bottom >= 0) {
    showHeader.value = true;
  } else {
    showHeader.value = false;
  }
};

onMounted(() => {
  // 當窗口滾動時檢查 slide2 的可見性
  window.addEventListener('scroll', checkSlide2Visibility);
  checkSlide2Visibility(); // 初始化檢查
});

onUnmounted(() => {
  // 清理滾動事件監聽器
  window.removeEventListener('scroll', checkSlide2Visibility);
});

</script>

<style lang="scss" scoped>
@import "../assets/style";
*{
    font-family: map-get($fontStyle, style_2);;
};




.wrapper{

    z-index: 0;
    // background-color: black;
    position: relative;
    height: 100vh;
    overflow: hidden;
    
}

.header-nav {
  position: fixed;
  top: 0;
  width: 100%;
//   background-color: #fff;
  z-index: 10;
//   opacity: 0;
//   visibility: hidden;
  transition: opacity 0.5s ease
}

.show-header {
  opacity: 1;
//   visibility: visible;
}


.parallax-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('path/to/your-image.jpg');
    background-size: cover;
    background-position: center;
    z-index: -10;
    //   mask-image: linear-gradient(to bottom, black 70%, transparent 100%)
    .smoke{
        position: absolute;
        bottom: -30%;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }
    
    .poker{
        position: absolute;
        top:500%;

        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }
    
}
@keyframes logoMove{
    0%{
        transform: scale(1) translateY(0px);
    }
    100%{
        transform: scale(0.4) translateY(100px);

    }
}


.slide1{


    &__img{
        // height: 100vh;
        width: 100%;
        object-fit: contain;
        // background-position:center;
        
        position: absolute;
        left: 0;
        
        bottom: -50%;
        z-index: -1;
        // mask: linear-gradient(180deg, transparent, #fff);
        // mask-image: linear-gradient(to bottom, black 70%, transparent 100%)
        }
        

    &__contain{

        .logo{
            display: block;
            margin: 0 auto;
            margin-top:60px;
            width: 60%;
            z-index: 10;
        }

        p{
            color: map-get($colofont_1, white);
            text-shadow: 5px 4px 5.3px rgba(0, 0, 0, 0.676);
            font-size: map-get($fontSize, h3);
            font-weight: 600;
            text-align: center;
            margin-top: 20px;
            z-index: 10;
        }

        .LC_btn{
            margin: 0 auto;
            margin-top: 60px;


        }
    }

}

.slide2{
    z-index: -10;
    background-color: black;
    mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
}

.slide{
    height: 100vh;  
    width: 100%; 
    position: relative;

   
}

// ====================
.swiper {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  /* Center slide text vertically */
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>