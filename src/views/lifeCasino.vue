

<template>
    <div class="wrapper">
        <Header 
    class="header" 
    :mode="currentMode"
    
    
    /> 
    <router-link to="/LC_Ticket_step0" 
    :class="{'show-btn': buyNow}"
    class="buyNow" 
    >
            <p>購票去</p>
    </router-link>
        
<swiper
    ref="mySwiper"
    class="mySwiper1"
    :modules="[Pagination, Mousewheel, Parallax]"
    :mousewheel="true"
    :direction="'vertical'"
    :pagination="pagination"
    :speed="1500"
    :freemode="true"
    :parallax="true"
    
    :slides-per-view="1" 
    @swiper="onSwiper"
    
    
  >
     
    <div  slot="container-start" class="parallax-bg" data-swiper-parallax="-90%">
        <img src="../assets/images/lifecasino_bg2.png" alt="">
       <!-- ===background animation=== -->
    </div>
    <LC_smoke class="smoke"></LC_smoke>
    <PokerFall class="poker"></PokerFall>
    <!-- ===========slide1 圖============= -->
    <swiper-slide >

        <section class="slide slide1" data-swiper-parallax="-23%" >
            <div class="slide1__contain">
                <img class="logo" src="../assets/images/logo_lifecasino.svg" alt="">
                <p>放下名字和身分，參加不能回頭的賭局，你願意為了勝利賭上多少？ </p>
                <Btn_Lifecasino class="LC_btn" Button = "進入賭場" @click="goToSecondSlide"></Btn_Lifecasino>
            </div>
            <img class="slide1__img" src="../assets/images/lifecasino_p3.png" alt="">
        </section>
    </swiper-slide>

    <!-- ===========slide2 About============= -->
    <swiper-slide>
        <section class="slide slide2">
            <div class="slide2__title">
                <LC_text Title="ABOUT"></LC_text>
                <p>歡迎來到人生賭場，在這裡，每一次下注都是對命運的挑戰，體驗人生選擇的風險與回報。準備好迎接命運的賭局嗎？</p>
            </div>
            <LC_AboutSwiper v-if="isMobile2"/>
            <ul class="slide2__contain" v-else>
             
                <li class="slide2__contain__item">
                    <LC_h2Text Title="命運之門" class="slide2__contain__title"></LC_h2Text>
                    <img src="../assets/images/LC_slide2_p1.png" class="slide2__contain__image">
                    <p>從兩扇門中選擇一扇，開啟專屬的人生旅程。</p>
                </li>
                <li class="slide2__contain__item">
                    <LC_h2Text Title="人生賭注" class="slide2__contain__title"></LC_h2Text>
                    <img src="../assets/images/LC_slide2_p2.png" class="slide2__contain__image">
                    <p>在健康、愛情、事業等不同領域下注，獲得人生點數。</p>
                </li>
                <li class="slide2__contain__item">
                    <LC_h2Text Title="命運輪盤" class="slide2__contain__title"></LC_h2Text>
                    <img src="../assets/images/LC_slide2_p3.png" class="slide2__contain__image">
                    <p>轉動大輪盤，接受命運的挑戰與啟示。</p>
                </li>
                <li class="slide2__contain__item">
                    <LC_h2Text Title="最後賭徒" class="slide2__contain__title"></LC_h2Text>
                    <img src="../assets/images/LC_slide2_p4.png" class="slide2__contain__image">
                    <p>用贏得的點數參加終極挑戰，總結人生教訓。</p>
                </li>
                <li class="slide2__contain__item">
                    <LC_h2Text Title="人生回顧" class="slide2__contain__title"></LC_h2Text>
                    <img src="../assets/images/LC_slide2_p5.png" class="slide2__contain__image">
                    <p>紀錄參加者在活動中的精彩瞬間。</p>
                </li>
              
            </ul>

        </section>
    </swiper-slide>

    <!-- ============slide3 服務=============== -->

    <swiper-slide>
        <section class="slide slide3" v-if="isMobile">
         
            <h2 class="slide3__h2">在這裡你會得到...</h2>
            <LC_ServeSwiper class="LC_ServeSwiper"></LC_ServeSwiper>
           
        </section>
        <section class="slide slide3" v-else>
         
         <h2 class="slide3__h2">在這裡你會得到...</h2>
         <ul class="slide3__items ">
             <li class="slide3__items__item">
                 <img src="../assets/images/LC_slide3_p1.svg" alt="" class="slide3__items__item__image">
                 <p class="slide3__items__item__p">酒精無限暢飲</p>
             </li>
             <li class="slide3__items__item">
                 <img src="../assets/images/LC_slide3_p2.svg" alt="" class="slide3__items__item__image">
                 <p class="slide3__items__item__p">精緻點心自助吧</p>
             </li>
             <li class="slide3__items__item">
                 <img src="../assets/images/LC_slide3_p3.svg" alt="" class="slide3__items__item__image">
                 <p class="slide3__items__item__p">享受120分鐘<br>精彩刺激的賭局</p>
             </li>
         </ul>
     </section>
        
    </swiper-slide>

    <!-- ============slide4 拉霸機================== -->
    <swiper-slide>
        <section class="slide slide2">
            <div class="slide2__title">
                <LC_text Title="幸運之手"></LC_text>
                <p>扳動拉霸機，來試試您的手氣吧!</p>
            </div>
            <router-link 
                class="demo"
                :to="'/lifecasino_demo'" 
                tag="a" 
                target="_blank" 
                rel="noopener noreferrer">
                000
            </router-link>
            <SlotMachine_RWD2 v-if="isMobile3"/>
            <SlotMachine_RWD v-else-if="isMobile" />
            <SlotMachine v-else ></SlotMachine>
        </section>
    </swiper-slide>
    <!-- :icon="faTicket" -->
     <!-- ===========slide5 預約================== -->
     <swiper-slide>
        <section class="slide slide5">
            <div class="slide5__title">
                <LC_Text2
                Title1="預約"
                :icon= "icon1"
                Title2="入場"
                English="BOOKING"></LC_Text2>        
            </div>
            <img class="slide5__image"src="../assets/images/LC_ticket.png" alt="">
            <div class="slide5__text">
                <h2>貴賓卷</h2>
                <h2>$2,200 / 人</h2>
            </div>
            <div class="slide5__contain">
                <span>
                    <img src="../assets/images/LC_coin.svg" alt="">
                    <p>入場時間120分鐘 ( 含行前解說 ) 。</p>
                </span>
                <span>
                    <img src="../assets/images/LC_coin.svg" alt="">
                    <p>場內提供酒精飲料、點心無限暢飲。</p>
                </span>
            </div>
            <router-link to="/LC_Ticket_step0">
                <Btn_Lifecasino Button="立即預約" class="LC_btn" ></Btn_Lifecasino>
            </router-link>
                
         
        </section>
    </swiper-slide>

    <!-- ============slide6 顧客回饋=============-->
    <swiper-slide>
        <section class="slide slide6">
            <div class="slide6__title">
                <LC_Text2
                Title1="賭客"
                :icon= "icon2"
                Title2="好評"
                English="REVIEWS"></LC_Text2>        
            </div>
         <LC_Reviews class="slide6__Reviews"></LC_Reviews>
        </section>
    </swiper-slide>

    <!-- ============slide7 精選商品=============-->
    <swiper-slide>
    <section class="slide slide7">
        <div class="slide7__title">
            <LC_Text2
            Title1="精選"
            :icon= "icon3"
            Title2="商品"
            English="PRODUCT"></LC_Text2>        
        </div>
        <LC_ProductSwiper v-if="isMobile" class="slide7_RWD2"/>
        <ul v-else>
            <li>
                <img class="crown" src="../assets/images/LC_icon4.svg" alt="">
                <img src="../assets/images//LC_Product1.png" alt="">
                <div class="te">
                    <h4>奢華金杯</h4>
                    <p>帶上這杯，你就是賭場最潮 ! </p>
                </div>
            </li>
            <li>
                <img class="crown" src="../assets/images/LC_icon4.svg" alt="">
                <img src="../assets/images/LC_Product2.png" alt="">
                <div class="te">
                    <h4>賭聖帽T</h4>
                    <p>穿上這件，你就是賭場焦點 ! </p>
                </div>
            </li>
            <li>
                <img class="crown" src="../assets/images/LC_icon4.svg" alt="">
                <img src="../assets/images//LC_Product3.png" alt="">
                <div class="te">
                    <h4>暗黑撲克牌組</h4>
                    <p>秀出這張，你就是牌桌勝者 !  </p>
                </div>
            </li>
            
        </ul>
        <router-link to="/LC_ProductPage">
        
            <Btn_Lifecasino class="LC_btn2" Button="前往商品專區"></Btn_Lifecasino>
        </router-link>
    </section>
</swiper-slide>

<!-- ============slide8 位置=============-->
<swiper-slide>
        <section class="slide slide8">
            <div class="slide8__title">
                <LC_Text2
                Title1="賭場"
                :icon= "icon5"
                Title2="位置"
                English="LOCATION"></LC_Text2>        
            </div>
            <p>地址 | 104台北市中山區南京東路三段219號4F</p>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.4676872268733!2d121.54067797462108!3d25.052132837562638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abe6b0446815%3A0xf006dde8c27afcc7!2z57ev6IKyVGliYU1l6ZmE6Kit5Y-w5YyX6IG36KiT5Lit5b-D!5e0!3m2!1szh-TW!2stw!4v1725365211265!5m2!1szh-TW!2stw" width="800" height="360" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         
        </section>
    </swiper-slide>

    <!-- ============slide9 入場須知=============-->
    <swiper-slide>
        <section class="slide slide9">
            <div class="slide6__title">
                <LC_Text2
                Title1="入場"
                :icon= "icon6"
                Title2="須知"
                English="RULE"></LC_Text2>        
            </div>
            <span>
                <img src="../assets/images/LC_coin.svg" alt="">
                <p>入場時間120分鐘 ( 含行前解說 ) 。</p>
            </span>
            <span class="span2">
                <img src="../assets/images/LC_coin.svg" alt="">
                <p >本活動提供酒精飲料，18歲以下請勿參加</p>
            </span>
            <router-link to="/LC_QuestionIntro">
                <Btn_Lifecasino Button="查看須知" class="LC_btn3"></Btn_Lifecasino>
                <h4>常見問題 / 票務規則 / 退換票相關政策</h4>

            </router-link>
        </section>
    </swiper-slide>

    <!-- ============slide10 聯絡我們=============-->
    <swiper-slide>
        <section class="slide slide10">
            <div class="slide10__title">
                <LC_Text2
                Title1="聯絡"
                :icon= "icon7"
                Title2="我們"
                English="CONTACT"></LC_Text2>        
            </div>
            <p>我們非常重視您的意見與建議，如果您有任何問題、建議或需要幫助，請隨時與我們聯繫。<br>我們的團隊將盡快回覆您的訊息。</p>
            <h4>客服信箱</h4>
            <h4>illusionlab@gmail.com</h4>
            <div class="social">
                <img src="../assets/images/LC_line.svg" alt="">
                <img src="../assets/images/LC_fb.svg" alt="">
                <img src="../assets/images/LC_ig.svg" alt="">
            </div>
            <p>週一到週五 10:00 ~ 20:00 會由專人回覆訊息</p>
    </section>
    </swiper-slide>

    <!-- ============slide11 會員=============-->
    <swiper-slide>
        <section class="slide slide11">
            <div class="slide11__title">
                <LC_Text2
                Title1="尊榮"
                :icon= "icon8"
                Title2="會員"
                English="VIP"></LC_Text2>        
            </div>
            <p>加入會員獲得更多活動的第一手消息 ! </p>
            <p>商品購買、折價卷還有生日禮...更多好康等你 ! </p>
            <router-link to="/login">
                <Btn_Lifecasino Button="會員專區" class="LC_btn3"></Btn_Lifecasino>  
            </router-link>
    </section>
    </swiper-slide>

    <!-- ============slide12 合作廠商=============-->
    <swiper-slide>
        <section class="slide slide12">
            <div class="slide12__title">
                <LC_Text2
                Title1="合作"
                :icon= "icon9"
                Title2="廠商"
                English="SPONSOR"></LC_Text2>        
            </div>
            <div class="logo">
                <a href="https://isnina47.github.io/nina_project/index.html">
                    <img class="first"
                        src="../assets/images/logo_08.png">
                </a>
                <a href="https://wennieshe1235.github.io/CORE/">
                    <img src="../assets/images/logo_09.png">
                </a>
                <a href="https://nemohuang1104.github.io/project/">
                    <img src="../assets/images/logo_13.png">
                </a>
                <a href="https://ping355168.github.io/belleu/">
                    <img src="../assets/images/logo_11.png">
                </a>
                <a href="https://ting-yuuuu.github.io/La-Vin-En-Rose/">
                    <img src="../assets/images/logo_06.png">
                </a>
                <a href="https://17-ching.github.io/cyanLightStudio/">
                    <img src="../assets/images/logo_02.png">
                </a>
            </div>
            <Footer_1 class="footer"></Footer_1>
    </section>
    </swiper-slide>

    <!-- 控制分頁器顯示的按鈕 -->
    <button 
    class="toggle-pagination" 
    @click="togglePagination" 
    :style="toggleButton" 
    :class="{'active-button': isActive, 'default-button': !isActive}"
    >
      {{ isPaginationVisible ? 'CLOSE >' : '< OPEN' }} 
    </button>

    <!-- Swiper內建的分頁器 -->
    <div v-show="isPaginationVisible" class="swiper-pagination">

    </div>

</swiper>



   
   </div>
</template>


<script setup>
import icon1 from '../assets/images/LC_icon1.svg'
import icon2 from '../assets/images/LC_icon2.svg'
import icon3 from '../assets/images/LC_icon3.svg' 
import icon5 from '../assets/images/LC_icon5.svg'
import icon6 from '../assets/images/LC_icon6.svg'
import icon7 from '../assets/images/LC_icon7.svg'
import icon8 from '../assets/images/LC_icon8.svg'
import icon9 from '../assets/images/LC_icon9.svg'


import { ref, onMounted, onBeforeUnmount, computed, onBeforeMount, } from 'vue';

import Btn_Lifecasino from '@/components/Btn_Lifecasino.vue';
import LC_smoke from '@/components/LC_smoke.vue';
import PokerFall from '@/components/PokerFall2.vue';
import LC_text from '@/components/LC_text.vue';
import LC_h2Text from '@/components/LC_h2Text.vue';
import SlotMachine from '@/components/SlotMachine.vue';
import LC_Text2 from '@/components/LC_Text2.vue';
import LC_Reviews from '@/components/LC_Reviews.vue';
import Footer_1 from '@/components/Footer_1.vue'
import LC_ServeSwiper from '@/components/LC_ServeSwiper.vue'
import LC_ProductSwiper from '@/components/LC_ProductSwiper.vue'
import SlotMachine_RWD from '@/components/SlotMachine_RWD.vue'
import LC_AboutSwiper from '@/components/LC_AboutSwiper.vue'
import SlotMachine_RWD2 from '@/components/SlotMachine_RWD2.vue'
// ============header=============//
import Header from '@/components/SFHeader_0.vue'
const currentMode = ref('two');

// ===============swiper============//
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/swiper-bundle.css';
import { Swiper, SwiperSlide, } from 'swiper/vue';
import { Pagination, Mousewheel, Parallax} from 'swiper/modules';
import { useRoute, useRouter } from 'vue-router';


import 'swiper/css/mousewheel'



const modules = [Pagination, Mousewheel, Parallax];

// ============導航按鈕===========//
const mySwiper = ref(null);
const isPaginationVisible = ref(false); // 初始狀態，分頁器隱藏

// 切換分頁器顯示狀態
const togglePagination = () => {
  isPaginationVisible.value = !isPaginationVisible.value;
  mySwiper.value.pagination.el.style.right = isPaginationVisible.value ? '8px' : '-100px';
  isActive.value = !isActive.value;
    // 根據狀態動態更新樣式
  toggleButton.value.right = isActive.value ? '138px' : '30px';
};  

const isActive = ref(false);
    // 按鈕的動態樣式
const toggleButton = ref({
padding: '10px 10px',
color: 'white',
});



// // ----第二張才出現header-------//
const showHeader = ref(false);
const buyNow = ref(false); //購票鈕

const swiperInstance = ref(null);

// 當 Swiper 實例初始化後，將其保存到 mySwiper
const onSwiper = (swiper) => {
    mySwiper.value = swiper;
    // swiperInstance.value = swiper;

    // swiperInstance.on('slideChange', () => {
    // showHeader.value = swiperInstance.activeIndex >= 1;})

    // showHeader.value = swiperInstance.activeIndex >= 1;


};

// // ==============RWD================//

const isMobile = ref(window.innerWidth <= 820);
const isMobile2 = ref(window.innerWidth <= 712);
const isMobile3 = ref(window.innerWidth <= 430);

const handleResize = () => {
  isMobile.value = window.innerWidth <= 820;
  isMobile2.value = window.innerWidth <= 712;
  isMobile3.value = window.innerWidth <= 430;
};


onMounted(()=>{

    // 初始時隱藏分頁器
    mySwiper.value.pagination.el.style.right = '-188px';
    toggleButton.value.right = '30px';
    //  restoreScrollPostion();

     window.addEventListener('resize', handleResize);

     if (swiperInstance.value) {
    swiperInstance.value.on('scroll', (swiper) => {
      // 檢查 Swiper 的滾動位置來更新 header 顯示
      showHeader.value = swiper.activeIndex >= 1;
    });
  }

})




// 切換到第二張幻燈片的函數
const goToSecondSlide = () => {
  if (mySwiper.value && mySwiper.value.slideTo) {
    mySwiper.value.slideTo(1); // 切換到第二張幻燈片，索引從 0 開始
  } else if (mySwiper.value?.swiper?.slideTo) {
    mySwiper.value.swiper.slideTo(1); // Swiper 6.x/7.x 版本使用這個
  }
};



// 当离开路由时，保存滚动位置
onBeforeUnmount(() => {
  
  window.removeEventListener('resize', handleResize);
});



// onUnmounted(() => {
//   // 清理滾動事件監聽器
//   window.removeEventListener('scroll', checkSlide2Visibility);
// });

// // ===========nav===============//
// Define menu for pagination bullets
const menu = ['HOME','ABOUT', 'SERVE','GAME', 'BOOKING','REVIEWS', 'PRODUCT', 'LOCATION', 'RULE', 'CONTACT', 'VIP', 'SPONSOR'];


    
    // Pagination configuration
    var pagination = {
        clickable: true,
      renderBullet: (index, className) => {
        console.log(`Rendering bullet for index ${index}: ${menu[index]}`);
        // Return custom bullet with text from the `menu` array
        return `<span class="${className}">${menu[index]}</span>`;
      },
    }


   

   

</script>


<style lang="scss" scoped>
@import "../assets/style";

// =====錨點開關按鈕======//
.active-button {
//   border: 2px solid green;
transition: .5s ;
}

.default-button {
//   border: 2px solid gray;
transition: .5s ;

}

*{
    font-family: map-get($fontStyle, style_2);
    // text-decoration: none
};

/* 切換分頁器顯示狀態的按鈕 */
.toggle-pagination {
  position: absolute;
  top: 50%;
  right: 0;
  background-color:map-get($map: $color_1, $key: btn_gold);
  color: white;
  border: none;
//   padding: 10px 35px;
  cursor: pointer;
  font-size: 14px;
  z-index: 1000;
  animation: nav 1s linear infinite;
  border-radius: 30px;
}

@keyframes nav{
    0%{
        transform: translate(0 ,0);
    }
    50%{
        transform: translate(10px ,0);
    }
    100%{
        transform: translate(0 ,0);
    }
}

/* Swiper 分頁器的位置 */
.swiper-pagination {
    // position: relative;
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  transition: .5s;
}

h2{
    font-size: map-get($map: $fontSize, $key: h2);
    color: map-get($map: $colofont_1, $key: white);
    background: url(../assets/images/LC_text_bg.png) lightgray 50% / cover no-repeat;
    background-clip: text;
    color: transparent;
    font-weight: 700;
    width: 250px;   
}

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

.wrapper{
    z-index: 0;
    // background-color: black;
    position: relative;
    height: 100vh;
    overflow: hidden;
    // border: 2px solid blue;
    padding-top:0 ;

}
.header{
    // position: fixed;
    // top: 0;
    // z-index: 100;
    // opacity: 0;
    // visibility: hidden;
    // transition: opacity 0.5s ease, visibility 0.5s ease;
    
}
.header, .buyNow {
//   opacity: 0;
//   visibility: hidden;
  transition: opacity 0.5s ease, visibility 0.5s ease;
}

.show-header, .show-btn{
  opacity: 1;
  visibility: visible;
}


.buyNow{
    background-image: url(@/assets/images/LC_chip.png);
    position: fixed;
    right: 2%;
    bottom: 2%;
    z-index: 10;
    width: 150px;
    height: 100px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    text-align: center;
    transition: .5s ease;
    perspective: 100px;
    // opacity: 0;
    // visibility: hidden;
    
    p{
        line-height: 90px;
        color: #FEEAB7;
        font-weight: 600;
        
    }

    &:hover{
        transform:translate3d(-10px, -10px, 500px) scale(1.1);
    }
}


.parallax-bg {
    // border: 2px solid green;

    position: absolute;
    top:  0;
    left: 0;
    // position: relative;
    width: 100%;
    height: 100%;
    // background-image: url('../assets/images/lifecasino_bg1.png');
    background-image: url(@/assets/images/lifecasino_bg2.png);
    // background: linear-gradient(180deg, #110338 0%, #30099E 100%);
    background-size: cover;
    // background-position: center;
    z-index: -10;
    //   mask-image: linear-gradient(to bottom, black 70%, transparent 100%)

    // > img{
    //     // border: 2px solid red;
    //     object-fit: cover;
    //     width: 100%;
    //     position: absolute;
    //     left: 0;
    //     top: 0;
    // }
    
}

.smoke{
    // border: 2px solid yellow;

    position:fixed;
    bottom:-20%;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.poker{
    // border: 2px solid red;
    position: fixed;
    top: 0;
    left: 0;
    z-index:0;
    animation: opacity 8s linear;
}

@keyframes opacity{
    0%{
        opacity: 0;
    }
    100%{
        opacity: 1;
    }
}

.slide1{
    position: relative;
    z-index: -2;

   

    &__img{
        // height: 100vh;
        // width: 100%;
        object-fit: cover;
        // background-position:center;
        
        position: absolute;
        left: calc(50vw - (1490px/2));
        
        bottom: calc(50vh - (1490px/2));
        z-index: -1;
        // mask: linear-gradient(180deg, transparent, #fff);
        // mask-image: linear-gradient(to bottom, black 70%, transparent 100%)

  
        }
        

    &__contain{
        z-index:100;

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
            
            z-index: 10;
            margin: 20px 10px 0;
        }

        .LC_btn{
            z-index:100;
            margin: 0 auto;
            margin-top: 60px;


        }
    }

}

.slide2{
    position: relative;

    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: -2%;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
        
    }

    &__title{
        max-width: 560px;
        margin: 90px 10% 60px;

        p{
          margin-top: 10px;
        }
    }

    &__contain{
        display: flex;
        flex-wrap: wrap;
        margin: 0 auto;
        max-width: 1200px;
        justify-content: space-around;
        padding: 0 50px 50px;


        &__item{
            // border: 2px solid red;
            max-width: 200px;
            display: block;
            text-align: center;
            // gap: 1%;

        }
        

        &__image{
            max-width: 180px;
            margin-top: 20px;
        }

        p{
            text-align: left;
            margin-top: 10px;

        }
    }
}

.slide3{
    position: relative;
    
    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: -100px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }

    &__h2{
      margin: 0 auto;
      text-align: center;
      margin-top: 20vh;
    }

    &__items{
        display: flex;
        justify-content: space-around;
        margin: 0 auto;
        margin-top: 100px;
        max-width: 1000px;

        &__item{
            width: fit-content;
            animation: move 3s infinite linear;

            &__image{
                width: 250px;
            }
    
            &__p{
                text-align: center;
            }
    
        }

    }
  
   
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
    // 75% {
    //     transform: translateX(0),translateY(0)
    //     }
    // 100% {
    //     transform: translateX(0),translateY(0)
    //     }
}

.slide4{
    position: relative;
    
    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: 0px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }

}

.demo{
    
    width: 15px;
    height: 15px;
color: #000;
}


#SlotMachine {
// border: 2px solid red;
margin: 0 auto;
}

.slide5{

    position: relative;
    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: -50px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }

    &__image{
        // border: 2px solid red;
        max-width: 360px;
        display: block;
        margin: 20px auto;
    }
    &__text{
        // border: 2px solid red;
        text-align: center;
        display: block;
        margin: 0 auto;
        max-width: 1200px;

        h2{
        //    border: 2px solid red;
           margin: 0 auto;
           margin-bottom: 10px;
        }
    }

    &__contain{
        // border: 2px solid red;
        text-align: center;
        display: block;
        width: fit-content;
        margin: 0 auto;
        span{
            // border: 2px solid rgb(13, 255, 0);
            width: fit-content;

            display: flex;
            justify-content: center;
            align-items: center;

            > img{
                width: 20px;
                margin-right: 5px
            }

           
        }

    }

    .LC_btn{
                margin: 0 auto;
                margin-top: 20px;
                z-index: 15;
            }
}

.slide6{

    position: relative;
    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: -40px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }

    &__Reviews{
        
        transform: translateY(-40px) scale(0.87);
        // width: 500px;
        overflow: visible;
        margin: 0 auto;
    }

}

.slide7{
    position: relative;
    z-index: 10;

    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: -80px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }
    .crown{
        width: 30px;
    }

    > ul{
        // border: 2px solid red;
        display: flex;
        max-width: 800px;
        justify-content: space-around;
        margin: 0 auto;
        padding:30px 30px 5px 30px;
        background-image:map-get($map: $color_1, $key: product);
        margin-top: 20px;
        border-radius: 24px;

        > li{
            text-align: center;
            position: relative;

            > img{
                width: 80%;
            }

            .te{
                // border: 2px solid red;
                text-align: left;
                padding: 10px 22px;

                > h4{
                    margin-bottom: 10px;
                }
            }
            .crown{
            width: 36px;
            position: absolute;
            left:5%;
            top: -5%;
            }
        }
    }
   .LC_btn2{
        margin: 0 auto;
        margin-top: 10px;
   }
}

.slide8{
    position: relative;

    &::before{
        z-index: -2;
        content: "";
        position: absolute;
        left: 0;
        top: 20px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }

    > p{
        text-align: center;
        margin: 20px 0;
    }
    .map{
        display: block;
        margin: 0 auto;
        border-radius:50px;
        max-width: 800px;
        width: 100%;
        padding: 0 20px;
    }
    .icon{
        max-width: 30px;
    }
   
}

.slide9{
    text-align: center;
    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: -80px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }
    span{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;

        > img{
            width: 20px;
            margin-right: 5px
        }
    }
    .LC_btn3{
        margin: 0 auto;
        margin-top: 100px;
    }
    h4{
        padding-top: 20px;

    }
    .span2{
        margin-top: 10px;
    }

    .line{
        margin-top: 100px   ;
    }
}

.slide10{
    
    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: -80px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }
    .icon{
        width: 30px;
    }
    > p{
        // max-width: 600px;
        text-align: center;
        margin: 40px 0;

    }

    > h4{
        text-align: center;
        margin-top: 15px;
    }

    .social{
        // border: 2px solid red;
        // text-align: center;
        margin: 0 auto;
        max-width: 400px;
        display: flex;
        justify-content: space-around;
        margin-top: 50px;
        > img{
            width: 40px;
        }
    }
}

.slide11{
    text-align: center;
    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: -80px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }

    > p{
        margin-top: 50px;
    }
    .LC_btn3{
        margin: 0 auto;
        margin-top: 50px;
    }
    .line{
        margin-top: 180px;
    }
}

.slide12{
    position: relative;
    text-align: center;
    &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: -80px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
    }

    .logo {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin: 1% 5%;
    align-items: center;
    justify-content: center;
    text-align: center;
    }

    .logo a {
        display: block;
        margin: 0 auto;
        width: 100%;
        max-width: 250px; // 和logo等大
    }

    .logo .first {
        max-width: 100px;
    }

    .logo img {
        width: 100%;
        max-width: 350px;
    }

    .footer{
    position: absolute;
    right: 0;
    bottom: 0;
    }

    
}

.slide{

    height: 100vh;  
    width: 100%; 
    position: relative;
}

// ====================
.mySwiper1 {
    

  width: 100%;
  height: 100%;
}

.mySwiper1 .swiper-slide {
  z-index: -1;

  /* Center slide text vertically */
  display: flex;
  justify-content: center;
  align-items: center;
}


// ==========RWD============//

@media screen and (max-width: 820px) {

.slide{
    height: calc(100vh - 80px);
}

.slide1{
    &::before{
    z-index: 0;
    content: "";
    position: absolute;
    left: 0;
    bottom:-30%;
    width: 100%;
    height: 60vh;
    background-color: black;
    mask: linear-gradient(0deg, rgba(0, 0, 0, 0.00) 1.5%, #000 20.67%, #000 20.68%, rgba(102, 102, 102, 0.00) 100%);

    }

    

}
.slide1__contain .logo[data-v-5fa87e5d]{
    margin-top: 260px;
}

.slide2{
    &__contain{
        flex-wrap: wrap;
            &__item{
                margin-bottom: 40px;

            }   
    }
}

.line[data-v-0cd65ac8] {
        // margin-top: 50px;
    }

.demo{
    display: none
}
}

.slide9,.slide10,.slide11{
    .line{
        margin-top: 25vh;
    }

    .footer{
        // position: fixed;
        // bottom: 0;
        // right: 0;
    }
}

@media screen and (max-width: 430px) {
    .slide{
        height: calc(100vh - 80px);
    }
    .line[data-v-0cd65ac8] {
        // margin-top: 150px;
    }

    .footer{
        position: fixed;
        bottom: 0;
        right: 0;
    }

    .slide2{
        .slide2__title{
            .h1_line[data-v-62ba1fc1]{
                width: 0;
                margin-top: 5vh ;
            }

            margin: 50px 10% 40px;
        }
    }

    .slide5{
        .line{
            margin-top: 8vh;
        }
    }

    .slide6{
        .line{
            margin-top: 6vh;

        }
    }

    .slide7{
        .slide7__title{
            .line{
                margin-top: 8vh;
            }
        }
    }

    .slide9{
        .line{
            margin-top: 12vh;
        }
    }

    .slide10{
        .line{
            margin-top: 12vh;
        }
    }

    .slide7_RWD2{
        width: 60%;
        height: 60%;

    }
    .mySwiper4 .swiper-slide{
        height: 80%;
    }


}



// .line[data-v-0cd65ac8]{
//     margin-top: 30%;
// }

</style>

<style lang="scss">

.swiper-pagination {
    transition: .5s;
	// position: absolute;
	// top: 10px;
	// right: 10px;
	// width: auto !important;
	// left: auto !important;
	// margin: 0;
   
}
.mySwiper1 .swiper-pagination-bullet {
	padding: 15px 0px;
	border-radius: 0;
	width: 100px;
	height: 25px;
	text-align: left;
	line-height: 30px;
	font-size: 12px;
    font-weight: 500;
	color:#ffffff;
	opacity: 1;
	background: rgba(0, 0, 0, 0);
    transition: .3s;

    &:hover{
    text-shadow: 0px 0px 10px  #ffd900d0;

	color:#FFD700;
        
    }
}
.mySwiper1 .swiper-pagination-bullet-active {
	color:#FFD700;
	/* background: #007aff; */
    // border-bottom: 1px solid #FFD700;
    position: relative;
    text-shadow: 0px 0px 15px  #ffd900d0;


    &::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: -15px;
        height: 0.5px;
        background-color: #FFD700;
        width: 100px;
        animation: line .5s, light 2s infinite linear;
       
        transform-origin: (right bottom);
        // box-shadow: 0px 0px 15px 4px #ffd900d0;
    }
}

@keyframes line{
    0%{
        transform: scalex(0);
        
    }
    100%{
        transform: scalex(1);
    }
}

@keyframes light{
    0%{
        box-shadow: 0px 0px 15px 1px #ffd900d0;
    }
    50%{
        box-shadow: 0px 0px 12px 4px #ffd900d0;

    }
    100%{
        box-shadow: 0px 0px 15px 1px #ffd900d0;

    }
}



</style>