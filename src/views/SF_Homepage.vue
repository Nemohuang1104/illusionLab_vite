<script setup>
// import { ref } from 'vue';
import { ref, onMounted, onBeforeUnmount } from 'vue';
import StrellarFrontierTitle from '@/components/SFTitle.vue';  // 匯入漸層藍色標題樣式

//隕石及popup
import SF_Stone from '../components/SF_Stone.vue';

// 旅行心得頁面
import SF_Comments from './SF_Comments.vue';

// 頁首頁尾
import SFHeader_0 from '@/components/SFHeader_0.vue';
const currentMode = ref('three');
import Footer_2 from '@/components/Footer_2.vue';



// 商品
import 'swiper/css';
import 'swiper/css/pagination';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination, Autoplay } from 'swiper/modules';


// 體驗活動字體
import SFAdventuresTitle from '@/components/SFAdventuresTitle.vue';

const modules = [Pagination, Autoplay];


// 規則問答功能
const activeIndex = ref(null);

const items = ref([
    { question: '‧ 預約完成後，要注意什麼?', answer: '我們將於體驗日前7天寄送行前須知信，告知地點和時間，體驗當天也會寄送提醒簡訊，請記得確認你的信箱與簡訊。' },
    { question: '‧ 現場是否寄存服務?', answer: '為維護體驗品質，於進入體驗區域前，所有觀眾都必須寄物。報到處設有密碼鎖寄物櫃，體驗前請將個人物品及手機存放於此處，但無提供較大型的物品（如：行李箱）寄物服務，建議大家輕便前來、放鬆體驗。且現場並未提供任何幼兒及寵物寄存服務。' },
    { question: '‧ 我應該什麼時候抵達?是否需要提前報到?', answer: '請提早20分鐘抵達。' },
    { question: '‧ 現場可以拍照攝影嗎?', answer: '依照著作權法，星際邊境體驗過程未經許可，禁止拍照或錄影；為避免影響表演進行，請將手機放入報到處置物櫃，禁止攜帶入場。' },
    { question: '‧ 體驗中肢體碰觸環節?', answer: '體驗中將有部分內容與演員會有肢體碰觸，如欲避免與演員肢體碰觸，請於開演前與乘務員確認。過程中如有任何不適狀況，歡迎雙手在胸前比叉，演員將會調整互動環節。' },
]);

const toggleAccordion = (index) => {
    if (activeIndex.value === index) {
        activeIndex.value = null;
    } else {
        activeIndex.value = index;
    }
};

import { useRouter } from 'vue-router';


const router = useRouter();

function gotoTicketChange() {
    router.push('/SF_BookingChange');
};

//購票去

// import { ref, onMounted, onBeforeUnmount } from 'vue';

const isLogoVisible = ref(false); // 控制 LOGO 顯示的變量

const handleScroll = () => {
    const scrollPosition = window.scrollY;
    isLogoVisible.value = scrollPosition >= 700; // 當滾動位置大於 1240px 時顯示 LOGO
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onBeforeUnmount(() => {
    window.removeEventListener('scroll', handleScroll);
});

</script>


<template>
    <SFHeader_0 :mode="currentMode"></SFHeader_0>

    <div class="wrapper">
        <!-- 星球運轉 -->
        <div class="intro">
            <!-- <video src="../assets/video/IntroVideo.mp4" width="100%" autoplay loop></video> -->
            <video src="../assets/video/sf.mp4"  autoplay muted loop class="movie"></video>
            <!-- <video src="../assets/video/SFmovie.mp4 controls autoplay muted loop" class="movie"></video> -->
        </div>

        <!-- 歡迎文字 -->
        <div class="introText">
            <SFAdventuresTitle h2="歡迎來到星際邊境，一起踏上這場前所未有的冒險吧！"></SFAdventuresTitle>
        </div>

        <!-- 體驗內容 -->
        <div class="adventures">
            <div class="Title">
                <StrellarFrontierTitle h1="體驗內容" p="ADVENTURES"></StrellarFrontierTitle>
            </div>
        </div>

        <!-- 隕石及popup -->
        <SF_Stone></SF_Stone>

        <!-- 購票去 -->
        <router-link>
            <div v-show="isLogoVisible" id="fixed-logo">
                <img src="../assets/images/SF_moontoticket.png" alt="" class="rotate">
            </div>
        </router-link>


        <!-- 心得 -->
        <div class="comments">
            <div class="Title">
                <StrellarFrontierTitle h1="旅行心得" p="COMMENTS"></StrellarFrontierTitle>
            </div>
            <SF_Comments></SF_Comments>
        </div>

        <!-- 票價 -->
        <div class="ticket">
            <div class="Title">
                <StrellarFrontierTitle h1="票券資訊" p="TICKET"></StrellarFrontierTitle>
            </div>
            <div class="ticketInfo">
                <img src="../assets/images/StrellarFrontierTicket.png">
            </div>
        </div>

        <!-- 熱門商品 -->
        <div class="product">

            <div class="Title">
                <StrellarFrontierTitle h1="熱門商品" p="PRODUCTS"></StrellarFrontierTitle>
            </div>

            <div class="carousel-container">
                <swiper :direction="'vertical'" :slidesPerView="1" :spaceBetween="50" :mousewheel="true" :pagination="{
                    clickable: true,
                }" :modules="modules" :autoplay="{
                    delay: 4000,
                    disableOnInteraction: false,
                }" class="mySwiper">

                    <swiper-slide>
                        <router-link to="./SF_DetailList">
                            <div class="carousel">
                                <div class="carousel-item">
                                    <img id="tshirt" src="../assets/images/SF_Tshirt.png">
                                    <div class="product-info">
                                        <h3>T-shirt</h3>
                                        <p>穿上UV透氣感的上衣和夥伴<br>並肩作戰。</p>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </swiper-slide>
                    <swiper-slide>
                        <router-link to="./SF_DetailList">
                            <div class="carousel">
                                <div class="carousel-item">
                                    <img src="../assets/images/SFbook.svg">
                                    <div class="product-info">
                                        <h3>筆記本</h3>
                                        <p>開啟星際冒險，記錄下每一段屬於<br>你的璀璨時刻。</p>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </swiper-slide>
                    <swiper-slide>
                        <router-link to="./SF_DetailList">
                            <div class="carousel">
                                <div class="carousel-item">
                                    <img src="../assets/images/SF_cup.png">
                                    <div class="product-info">
                                        <h3>鋼杯</h3>
                                        <p>可愛的太空人，人人都該擁有！</p>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </swiper-slide>

                </swiper>
            </div>
        </div>

        <!-- 航站資訊 -->
        <div class="info">
            <div class="Title">
                <StrellarFrontierTitle h1="航站資訊" p="INFO"></StrellarFrontierTitle>
            </div>
            <div class="infoText">
                <div class="left">
                    <div class="worktime">
                        <p class="time">時間 :</p>
                        <span>
                            週一、週二 | 公休日 <br>
                            週三至週五 | 17 : 00 - 22 : 00 <br>
                            週六、週日 | 12 : 00 - 22 : 00 <br>
                            連假期間與週末營業時間相同
                        </span>
                    </div>
                    <div class="address">
                        <p class="time">地址 : </p>
                        <span>104 台北市中山區南京東路三段219號5F</span>
                    </div>
                </div>
                <div class="right">
                    <img src="../assets/images/infoPic.svg">
                </div>
            </div>
        </div>

        <!-- 常見規則 -->
        <div class="rules">
            <div class="Title">
                <StrellarFrontierTitle h1="航站規則" p="RULES"></StrellarFrontierTitle>
            </div>
            <div class="mainSel">
                <button class="changeRules" @click="gotoTicketChange">
                    退換票政策
                </button>
                <div class="accordion">
                    <div class="accordion-item" v-for="(item, index) in items" :key="index">
                        <div class="accordion-question" @click="toggleAccordion(index)">
                            <span>{{ item.question }}</span>
                            <button class="accordion-toggle"><span
                                    :class="{ 'up': activeIndex === index, 'down': activeIndex !== index }"></span></button>
                        </div>
                        <div class="accordion-answer" :class="{ active: activeIndex === index }">
                            <p class="answer">{{ item.answer }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- 合作廠商 -->
        <div class="sponsor">
            <div class="Title">
                <StrellarFrontierTitle h1="合作廠商" p="SPONSOR"></StrellarFrontierTitle>
            </div>
            <div class="logo">
                <a href="https://isnina47.github.io/nina_project/index.html"><img class="first"
                        src="../assets/images/logo_08.png"></a>
                <a href="https://wennieshe1235.github.io/CORE/"><img src="../assets/images/logo_09.png"></a>
                <a href="https://nemohuang1104.github.io/project/"><img src="../assets/images/logo_13.png"></a>
                <a href="https://ping355168.github.io/belleu/"><img src="../assets/images/logo_11.png"></a>
                <a href="https://ting-yuuuu.github.io/La-Vin-En-Rose/"><img src="../assets/images/logo_06.png"></a>
                <a href="https://17-ching.github.io/cyanLightStudio/"><img src="../assets/images/logo_02.png"></a>
            </div>
        </div>

        <!-- 聯絡我們 -->
        <div class="contact">
            <div class="Title">
                <StrellarFrontierTitle h1="聯絡我們" p="CONTACT"></StrellarFrontierTitle>
            </div>
            <p id="text">我們非常重視您的意見與建議。如果您有任何問題、建議或需要幫助，請隨時與我們聯繫。<br>我們的團隊將盡快回覆您的訊息。</p>
            <p>有任何問題，歡迎寄信到客服信箱：</p>
            <p style="font-weight: bold;">illusionlab@gmail.com</p>
            <div class="icons">
                <img src="../assets/images/SF_line-Icon.svg">
                <img src="../assets/images/SF_FB-Icon.svg">
                <img src="../assets/images/SF_IG-Icon.svg">
            </div>
            <p>週一到週五 10:00 ~ 20:00 會由專人回覆訊息</p>
        </div>
        <Footer_2></Footer_2>
    </div>

</template>



<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');
@import '@/assets/SASS/basic/_color.scss';

* {
    font-family: "Noto Serif TC";
    color: map-get($colofont_2 , text);
}

.wrapper {
    background: linear-gradient(rgba(5, 5, 5, 0.847), rgba(164, 164, 164, 0)),
        url(../assets/images/STBackground.png);
   
}

//影片

.intro{
    position: relative;
    padding-bottom:56.25%;
    width:100%;
    height:0;
    margin-bottom: 40px;
}

.movie {
    // display: flex;
  
    // max-width: 1400px;
    // width: 100%;
    // height: 750px;


    position: absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
}

.Title {
    //大標題
    text-align: center;
    margin-bottom: 55px;
    box-sizing: border-box;
}

.introText {
    //歡迎文字
    font-family: ToronoGlitchSerif H1;
    font-size: 36px;
    font-weight: 500;
    text-align: center;
    margin-bottom: 5%;
}


// 票價資訊
.ticketInfo {
    margin: 5%;
}

.ticketInfo img {
    display: block;
    margin: 0 auto;
    width: 100%;
    max-width: 550px;
}

// 熱門商品
.swiper {
    width: 50%;
    height: 100%;
    --swiper-theme-color: #f1f1f1; // 點點顏色
}

.swiper-slide {
    text-align: center;

    /* Center slide text vertically */
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel-item {
    display: flex;
    align-items: center;
    justify-content: center;
}

.carousel-container {
    height: 500px;
}

.carousel-container img {
    width: 100%;
    max-width: 250px;
}

.product-info {
    margin-left: 20px;
}

.product-info h3 {
    //商品名稱
    font-size: 24px;
    margin-bottom: 50px;
    font-weight: bold;
}

.product-info p {
    font-weight: normal;
    text-align: left;
    line-height: 1.5;
}


// 航站資訊
.infoText {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 5%;
    line-height: 2;
}

.left .worktime {
    margin-bottom: 20px;
}

.infoText .right {
    margin-left: 30px;
}

.infoText .right img {
    width: 100%;
    max-width: 320px;
}

.infoText .time {
    font-weight: bold;
    margin-bottom: 5px;
}



//常見規則
.rules {
    margin-bottom: 5%;
}

.mainSel {
    display: block;
    width: 100%;
    max-width: 500px;
    margin: 3% auto;
}

.changeRules {
    // 退換票政策
    background: none;
    border: none;

    margin: 2% auto 5% auto;
    cursor: pointer;
    font-size: 20px;
    // 讓按鈕置中
    display: flex;
    align-items: center;
    justify-content: center;
    transition: .5s ease-out;
}

.changeRules:hover {
    transform: scale(1.1);

}

.accordion-item {
    margin-bottom: 5%
}

.accordion-question {
    width: 500px;
    height: 30px;
    flex-shrink: 0;
    cursor: pointer;

    display: flex;
    justify-content: space-between;
}

.accordion-question span {
    display: flex;
    align-items: center;
    padding-left: 2%;
    font-weight: 600;
    font-size: 18px;
}

.accordion-answer {
    // border-radius: 10px;
    width: 500px;
    justify-content: center;
    align-items: center;
    // 收合效果
    overflow: hidden;
    max-height: 0;
    opacity: 0;
    transition: max-height 0.5s ease-out, opacity 0.3s ease-out;
}

.accordion-answer.active {
    max-height: 500px;
    opacity: 1;
    transition: max-height 1s ease-in, opacity 0.5s ease-in;
}

.accordion-answer .answer {
    padding: 3%;
    line-height: 1.6;
    font-weight: normal;
    background: none;
}

//  button  
.accordion-toggle {
    background: none;
    border: none;
    cursor: pointer;
}


.accordion-toggle span {
    display: inline-block;
    width: 20px;
    height: 20px;
    position: relative;

    transition: transform 0.3s ease;
}

.accordion-toggle .up {
    transform: rotate(-90deg);
    /* 向上 */
    color: #C1693B;
}

.accordion-toggle .down {
    transform: rotate(90deg);
    /* 向下 */
    color: #e8e8e8;
}

.accordion-toggle span::before {
    content: '<';
    position: absolute;
    font-size: 20px;
    right: 0;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}


// 合作廠商
.logo {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin: 5% auto;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.logo a {
    display: block;
    margin: 0 auto;
    width: 100%;
    max-width: 150px; // 和logo等大
}

.logo .first {
    max-width: 100px;
}

.logo img {
    width: 100%;
    max-width: 150px;

}

// 聯絡我們
.contact {
    margin: 5%;
}

.contact #text {
    text-align: center;
    margin: 3% auto 7% auto;
    line-height: 1.6;
}

.icons {
    width: 100%;
    max-width: 30%;
    display: flex;
    margin: 3% auto;
    justify-content: space-evenly;

}

.icons img {
    width: 100%;
    max-width: 40px;
    cursor: pointer;
}

.contact p,
.contactTime p {
    text-align: center;
    line-height: 1.6;
}


//購票去

#fixed-logo {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;

}

#fixed-logo img {
    width: 100px;
    height: auto;
    max-width: 100px;

}

.rotate {
    animation: spin 10s linear infinite;
}


@keyframes spin {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}



</style>
