<template>
    <div class="wrapper">
        <Header v-if = "showHeader" class="header_nav"></Header>
    <swiper
    :direction="'vertical'"
    :pagination="{
      clickable: false
    }"
    :mousewheel= "true"
    :speed="2000"
    :freemode="true" 
    :modules="modules"
    class="mySwiper"
    :parallax="true"
    @slideChange="onSlideChange">

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
import { ref, onMounted, reactive } from 'vue';

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
const showHeader = ref(false);

const onSlideChange = (swiper) => {
    showHeader.value = swiper.activeIndex >= 2;
};

onMounted(()=>{
    return {
      showHeader,
      onSlideChange,
    };
})

</script>

<style lang="scss" scoped>
@import "../assets/style";
*{
    font-family: map-get($fontStyle, style_2);;
};



.wrapper{
    z-index: 0;
    background-color: black;
    position: relative;
    height: 100vh;
    overflow: hidden;
    
    .header-nav {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 10;
      transition: opacity 0.5s ease; /* 添加淡入淡出效果 */
    }

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