<script setup>
import { ref, computed } from "vue";
import Header from "../components/Header_0.vue";
// import Header_2 from "@/components/Header_2.vue";
import Footer_1 from "@/components/Footer_1.vue";
import Btn3_Lifecasino from "@/components/Btn3_Lifecasino.vue";
import Btn2_Lifecasino from "@/components/Btn2_Lifecasino.vue";
import CoinFall from '@/components/CoinFall.vue';

const currentMode = ref('two');
const currentButton = ref('btn1');

</script>


<template>

    <div class="template">
      <div>
        <Header :mode="currentMode"/> 
      </div>

        <RouterView class="view">
        
          
        
          

          </RouterView>
      <CoinFall class="coin"></CoinFall>
          
      
        <div class="icons">
            <img src="../assets/images/cib_line.svg" alt="">
            <img src="../assets/images/simple-icons_facebook.svg" alt="">
            <img src="../assets/images/bi_instagram.svg" alt="">
        </div>
        <Footer_1></Footer_1>
    </div>
    
  </template>
  
  
  
  <style scoped lang="scss">

    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

    @import "../assets/style";
    .template{
        background:url(../assets/images/lifecasino_bg2.png);
        // height: 180vh;
        background-size: cover;
        background-position: 0 0;
        position: relative;
        overflow: hidden;
        z-index: 0;
        background-repeat: no-repeat;

        &::before{
          z-index: -1;
          content: "";
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          height: 80%;
          background-color: rgba(0, 0, 0, 0.689);
          mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
        }
    }
    .coin{
      position: fixed;
      right: 0;
      top: 0;
      z-index: -1;
      // max-height: 100%;
      // width: 50px;
      // overflow: hidden;
      opacity: .5;
      animation: opacity 8s linear;

    }
    @keyframes opacity{
    0%{
        opacity: 0;
    }
    100%{
        opacity:.5;
    }
}

header{
  position: unset;
}

a{
  font-family: map-get($map: $fontStyle, $key: style_2);
}
    // .tab{
    //   z-index: 12;
    // }
    // .view{
    //   z-index: 10;
    // }

    // a{
    //   text-decoration: none;
    //   font-family: map-get($fontStyle, style_2);
    // }

    .icons{
      margin-top: 150px;
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
      // margin-bottom: 4%;
      
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



    .tab{
    display: flex;
    gap: 28px;
    justify-content: center;
    margin-bottom: 2%;
    }

    
    
</style>
  