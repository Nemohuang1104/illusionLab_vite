<template>
  <Header class="header"></Header>
  <RouterLink to="/littlequiz">
    <div class="littleQuiz" >
      <h2>小測驗</h2>
      <p>選擇障礙專區</p>
    </div>             
  </RouterLink>
  <swiper
    :pagination="{
      dynamicBullets: true,
    }"
    :loop="true"
    :mousewheel= "true"
    :speed="800"
    
    :freemode="true" 

    :modules="modules"
    
    :autoplay="{delay: 4000, disableOnInteraction: false}"
    class="mySwiper"
    >
    <!-- :autoplay="{delay: 4000, disableOnInteraction: false}" -->
  <!-- =================activity1=================== -->
    <swiper-slide>
      <div class="slide slide1">
        
          <PokerFall class="slide__content layer2"></PokerFall>
          <img class="slide__main layer1 woman" src="../assets/images/carousel1_1_1.png" alt="">
          <div class="text layer3" >
            <img class="logo LC_logo" src="../assets/images/logo_lifecasino2.svg" alt="">
            <p>歡迎來到人生賭場，在這裡，<br>
              每一次下注都是對命運的挑戰，體驗人生選擇的風險與回報。<br>
              準備迎接命運的賭局嗎？</p>
             <RouterLink to="/lifecasino">
              <Btn_Lifecasino class="LC_btn" Button="ENTER" ></Btn_Lifecasino>
             </RouterLink>
         
        </div>
      </div>
    </swiper-slide>

  <!-- =================activity2=================== -->

    <swiper-slide>
      <div class="slide slide2">
    <div >
      <StoneFall class="slide__content layer2" 
                  ></StoneFall>
      <img class="slide__main layer1 " src="../assets/images/carousel2_1.png" alt="">
      <div class="text layer3">
        <img class="logo" src="../assets/images/logo_StrellarFrontierIntro.svg" alt="">
        <p>體驗前所未有的奇幻冒險<br>
          揭開宇宙的神秘面紗</p>
          <router-link to="strellarfrontierintro">
            <ActivityButton class="LC_btn" Button="ENTER" ></ActivityButton>
          </router-link>
      </div>
    </div>
  </div>
    </swiper-slide>

<!-- =================activity3=================== -->
    
    <swiper-slide>
      <div class="slide slide3">
        <div >
          <FlowerFall class="slide__content layer2"></FlowerFall>
          <img class="slide__main layer1 duck" src="../assets/images/carousel3_1_1.png" alt="">
          <div class="text layer3">
            <img class="logo" src="../assets/images/logo_MindSpectrum.svg" alt="">
            <p>心靈光譜是為孤獨而痛苦著的你，提供一個療癒的旅程，<br>
              進入繪本的世界拋開一切煩惱，沉浸在充滿代入感的世界。
            </p>
            <RouterLink to="/mindspectrum">
              <MS_Button class="LC_btn" Button="ENTER"></MS_Button>
            </RouterLink>
          </div>
        </div>
      </div>
    </swiper-slide>
    
  </swiper>
</template>


<script setup>
import Header from '@/components/Header_0.vue';
import PokerFall from '@/components/PokerFall.vue';
import StoneFall from '@/components/StoneFall.vue';
import FlowerFall from '@/components/FlowerFall.vue';
import ActivityButton from '@/components/ActivityButton.vue';
import Btn_Lifecasino from '@/components/Btn_Lifecasino.vue';
import SF_planetButton from '@/components/SF_planetButton.vue';
import MS_Button from '@/components/MS_Button.vue';
// import "@/assets/css/style.css"


import 'swiper/css';
import 'swiper/css/pagination';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination, Mousewheel, Autoplay} from 'swiper/modules';
import { ref, onMounted, reactive } from 'vue';


import 'swiper/css/mousewheel'

const modules = [Pagination, Mousewheel, Autoplay];

// ===============gsap=============//

// import { onMounted } from 'vue';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
// import gasp from 'gasp';
// gsap.registerPlugin(ScrollTrigger);

// onMounted(() => {
//   const layer1 = document.querySelectorAll('.layer1')
//   const slide = document.querySelectorAll('.slide')
//   gsap.utils.toArray(slide).forEach((slide) => {
//     gsap.from(slide.layer1, {
//       opacity: 0,
//       y: 100,
//       duration: 1,
//       ease: 'power1.out',
//       scrollTrigger: {
//         trigger: slide,
//         start: 'top 80%',
//         toggleActions: 'play none none reverse',
//       },
//     });
//   });
// });

// import { useRouter } from 'vue-router';

// const router = useRouter();


</script>

<style lang="scss" scoped>
  // @import "../assets/style";
*{
  text-decoration: none;
}


.header{
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10;
}

.warpper{
  // border: 2px solid red;

  scroll-snap-type: y mandatory;
  // scroll-snap-type: y proximity;
  // scroll-snap-type: none; // default
  
  overflow: auto;
  font-family: "Noto Sans TC";
}


.slide1{
  // border: 2px solid red;
  background-image: url(../assets/images/carousel1.png);
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: calc(100% - 80px);
}


.slide2{
  background-image: url(../assets/images/STBackground.png);
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 100vh;
}

.slide3{
  background-image: url(../assets/images/carousel3.png);
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 100vh;
}

@keyframes layer1{
  0% {
    left: 100%;
  }
  100%{
    left: 0%;
  }
  
}

@keyframes layer2{
  0% {
    left: 100%;
  }
  100%{
    left: 0%;
  }
}

@keyframes layer3{
  0% {
    left: 100%;
  }
  100%{
    left: 0%;
  }
}

.slide{
  position: relative;
  height: 100vh;
  overflow: hidden;
  scroll-snap-align: center;

  

  .layer1{
   animation: layer1 1.7s ease forwards;
   
  }
  .layer2{
   animation: layer2 1.3s ease  forwards;
  }
  .layer3{
    animation: layer3 1s ease forwards;
  }

  &__content {
  // border: 2px solid green;
  // max-width: 1200px;
  width: 100%;  
  

  }

  &__main{
   
    width: 100%;
    position: absolute;
    left: 0;
    bottom: -15px;
    height: 100%;
    object-fit: cover;
    transform: scale(1.3);

    }
  .woman{
    max-width: 1440px;
    width: 100%;
    left: 0;
    bottom: 95px;
    transform: scale(1.4);
  }

  .text{
    // border: 2px solid red;
    position: absolute;
    left: 0;
    right: 0;
    bottom:calc(50vh - (465px/2));
    width: 100%;


    .logo{
      max-width: 700px;
      width: 100%;
      display: block;
      margin: 0 auto;
      // -webkit-backdrop-filter:drop-shadow(0px 0px 10px rgba(0,0,0,.5));
    }

    p{
      font-size: 20px;
      color: white;
      font-family: "Noto Serif TC";
      text-shadow: 2px 4px 5.3px rgba(0, 0, 0, 0.7);
      text-align: center;
      line-height: 2;
      font-family: "Noto Sans TC";

    }

    .LC_logo{
      margin-bottom: 30px;

    }

    .LC_btn{
      // border: 2px solid red;
      margin: 0 auto;
      margin-top: 30px;
      text-align: center;
      
    }

    .SF_btn{
      margin: 0 auto;
      margin-top: 30px;
      text-align: center;
    }
  }

}


  .swiper{
    --swiper-theme-color: #7976BB;/* 设置Swiper风格 */
    
    --swiper-navigation-size: 30px;/* 设置按钮大小 */
  }

.littleQuiz{
  border: 1px solid white;
  border-radius: 50%;
  background: rgba(131, 131, 131, 0.40);
  width: 100px;
  height: 100px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: fixed;
  right: 50px;
  bottom: 50px;
  z-index: 10;
  box-shadow: 1px 3px 12px 0px rgba(0, 0, 0, 0.52);
  cursor: pointer;

  h2{
    text-align: center;
    font-size: 24px;
    margin-bottom: 5px;
    color: white;
  }

  p{
    text-align: center;
    font-size: 14px;
    color: white;

  }
}

@media screen and (max-width: 430px){}
</style>