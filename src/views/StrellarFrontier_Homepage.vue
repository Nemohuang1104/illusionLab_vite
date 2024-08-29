<script setup>
import StrellarFrontierTitle from '@/components/StrellarFrontierTitle.vue';  // 匯入漸層藍色標題樣式
// 熱門商品圖片
import img1 from '@/assets/images/StrellarFrontier_tShirt.png';
import img2 from '@/assets/images/StrellarFrontier_cup.png';
import img3 from '@/assets/images/StrellarFrontier_book.png';

// 規則問答功能
import { ref } from 'vue';

const activeIndex = ref(null);

const items = ref([
    { question: 'Q.預約完成後，要注意什麼?', answer: '我們將於體驗日前7天寄送行前須知信，告知地點和時間，體驗當天也會寄送提醒簡訊，請記得確認你的信箱與簡訊。' },
    { question: 'Q.現場是否寄存服務?', answer: '為維護體驗品質，於進入體驗區域前，所有觀眾都必須寄物。報到處設有密碼鎖寄物櫃，體驗前請將個人物品及手機存放於此處，但無提供較大型的物品（如：行李箱）寄物服務，建議大家輕便前來、放鬆體驗。且現場並未提供任何幼兒及寵物寄存服務。' },
    { question: 'Q.我應該什麼時候抵達?是否需要提前報到?', answer: '請提早20分鐘抵達。' },
    { question: 'Q.現場可以拍照攝影嗎?', answer: '依照著作權法，星際邊境體驗過程未經許可，禁止拍照或錄影；為避免影響表演進行，請將手機放入報到處置物櫃，禁止攜帶入場。' },
    { question: 'Q.體驗中肢體碰觸環節?', answer: '體驗中將有部分內容與演員會有肢體碰觸，如欲避免與演員肢體碰觸，請於開演前與乘務員確認。過程中如有任何不適狀況，歡迎雙手在胸前比叉，演員將會調整互動環節。' },
]);

const toggleAccordion = (index) => {
    if (activeIndex.value === index) {
        activeIndex.value = null;
    } else {
        activeIndex.value = index;
    }
};

</script>

<!-- 旅行心得 -->
<script>
export default {
    data() {
        return {
            travelCards: [
                "「當我穿越在不同星球之間，感受到宇宙的無限和神秘，每一顆星球都充滿了驚喜。彷彿自己真的置身於遙遠的銀河系，不僅拓寬我的視野，也讓我重新審視了人類在宇宙中的位置。」- 2024.02.05 Jason Wu",
                "「體驗中的外星人元素真的讓人驚喜！設計得栩栩如生的外星生命和他們的傳說讓我感到既神秘又震撼。」- 2024.03.15 Ivy Lin",
                "「這次的星際邊境沉浸式體驗完全超出了我的預期！從星際旅行到與外星生命的互動，深入的學習旅程，讓我對宇宙和未來充滿了好奇與期待。」- 2024.05.20 Belly Liu",
                "「能夠親身體驗太空人的生活是一件非常酷的事情！每一個細節都讓我感覺自己像是真正的宇航員。這次沉浸式體驗讓我更深刻地理解了太空探索的艱辛和偉大，也更感謝那些默默付出的科學家和宇航員。」- 2024.6.28 Queen Yang",
                "「走進宇宙的那一刻，我感受到了從未有過的孤寂和壯麗。無邊無際的星空和沉默的行星讓我深刻地體會到了人類的渺小與宇宙的浩瀚。」- 2024.07.02 Alex",
                "「在這次的體驗中，我感受到了探索未知星球的刺激和驚喜。每一個星球都有其獨特的生態和故事，讓我彷彿在探索一個個奇幻的世界。這樣的體驗讓我重新思考了宇宙的神秘和人類對未知的追求。」- 2024.07.14 Nicole Chen",
                "「這次沉浸式體驗的科技設計讓我大開眼界。從先進的模擬技術到身臨其境的互動，所有細節都做得非常到位。這種未來科技的感受不僅令人興奮，也讓我對科技的未來充滿了期待。」- 2024.07.22 Amy Yu",
                "「這次的沉浸式體驗簡直是一次超現實的冒險之旅！每一個場景都像是從科幻小說中走出來的，讓我真的成為了一名宇宙探險者。這種奇妙的感覺真的是無法用言語形容。」- 2024.08.14 Albert Lee",
                "「這次旅程讓我對宇宙和未來有了更多的思考和期待。我體會到了前所未有的寧靜和浩瀚。無論是寬廣的星空還是孤獨的行星，這種沉靜的感受讓我對宇宙有了更深層的理解和尊敬。」- 2024.08.25 Jackson Wang"
            ],
            travelCurrentIndex: 0,
            travelCardsToShow: 3,
            // 商品部分
            productCurrentIndex: 0,
            interval: null,
            products: [
                {
                    image: img1,
                    name: '星際邊境T-shirt',
                    description: '穿上UV透氣感的上衣和夥伴並肩作戰。',
                },
                {
                    image: img2,
                    name: '星際邊境T-shirt',
                    description: '太空風格杯子，讓您的飲品更具太空感。',
                },
                {
                    image: img3,
                    name: '星際邊境T-shirt',
                    description: '探索無垠星空，開啟您的星際旅程。',
                },
            ]
        };
    },
    // 商品
    mounted() {
        this.startProductAutoSlide();
        this.startProductAutoSlide();
    },
    beforeDestroy() {
        clearInterval(this.interval);
    },

    // 旅行心得
    computed: {
        travelNumIndicators() {
            return Math.ceil(this.travelCards.length / this.travelCardsToShow);
        },
        travelVisibleCards() {
            const start = this.travelCurrentIndex * this.travelCardsToShow;
            return this.travelCards.slice(start, start + this.travelCardsToShow);
        },
        travelShowPrevButton() {
            return this.travelCurrentIndex > 0;
        },
        travelShowNextButton() {
            return this.travelCurrentIndex < this.travelNumIndicators - 1;
        },
        travelCommentCardsStyle() {
            return {
                transform: `translateX(-${this.travelCurrentIndex * (100 / this.travelCardsToShow)}%)`,
                transition: 'transform 0.5s ease',
                width: `${100 * this.travelCards.length / this.travelCardsToShow}%`
            };
        },
        travelCommentCardStyle() {
            return {
                flex: `${100 / this.travelCardsToShow}%`
            };
        },

        // 商品
        productNumIndicators() {
            return this.products.length;
        }

    },

    methods: {
        prevTravelCard() {  // 旅行心得
            if (this.travelCurrentIndex > 0) {
                this.travelCurrentIndex--;
            }
        },
        nextTravelCard() {
            if (this.travelCurrentIndex < this.travelNumIndicators - 1) {
                this.travelCurrentIndex++;
            }
        },
        setTravelCurrentIndex(index) {
            this.travelCurrentIndex = index;
        },
        // 熱門商品
        startProductAutoSlide() {
            this.interval = setInterval(() => {
                this.productCurrentIndex = (this.productCurrentIndex + 1) % this.products.length;
            }, 5000);
        },
        goToProductSlide(index) {
            this.productCurrentIndex = index;
            clearInterval(this.interval);
            this.startProductAutoSlide();
        }
    },
};

</script>


<template>
    <div class="wrapper">
        <div class="Intro"></div>
        <!-- 體驗內容 -->
        <div class="adventures">
            <div class="Title">
                <StrellarFrontierTitle h1="體驗內容" p="ADVENTURES"></StrellarFrontierTitle>
            </div>
        </div>
        <!-- 心得 -->
        <div class="comments">
            <div class="Title">
                <StrellarFrontierTitle h1="旅行心得" p="COMMENTS"></StrellarFrontierTitle>
            </div>
            <div class="card-container">
                <div class="nav-button left" :class="{ hidden: !travelShowPrevButton }">
                    <button @click="prevTravelCard">&lt;</button>
                </div>
                <ul class="commentCards" :style="travelCommentCardsStyle">
                    <li v-for="(card, index) in travelVisibleCards" :key="index" class="commentCard"
                        :style="travelCommentCardStyle">
                        <div class="img">
                            <div class="commText">
                                <p>{{ card }}</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="nav-button right" :class="{ hidden: !travelShowNextButton }">
                    <button @click="nextTravelCard">&gt;</button>
                </div>
            </div>
            <div class="indicator">
                <span v-for="index in travelNumIndicators" :key="index"
                    :class="{ 'active': index - 1 === travelCurrentIndex }"
                    @click="setTravelCurrentIndex(index - 1)"></span>
            </div>
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
                <div class="carousel" :style="{ transform: `translateY(-${productCurrentIndex * 100}%)` }">
                    <div class="carousel-item" v-for="(item, index) in products" :key="index">
                        <img :src="item.image" alt="Product image" />
                        <div class="product-info">
                            <h3>{{ item.name }}</h3>
                            <p>{{ item.description }}</p>
                        </div>
                    </div>
                </div>
                <div class="indicators">
                    <span v-for="(item, index) in products" :key="index"
                        :class="{ active: productCurrentIndex === index }" @click="goToProductSlide(index)"></span>
                </div>
            </div>
        </div>

        <!-- 航站資訊 -->
        <div class="info">
            <div class="Title">
                <StrellarFrontierTitle h1="航站資訊" p="INFO"></StrellarFrontierTitle>
            </div>
            <div class="infoText">
                <div class="left">
                    <p class="time">時間 :</p>
                    <span>
                        週一、週二 | 公休日 <br>
                        週三至週五 | 17 : 00 - 22 : 00 <br>
                        週六、週日 | 12 : 00 - 22 : 00 <br>
                        連假期間與週末營業時間相同
                    </span>
                    <p class="time">地址 : </p>
                    <span>104506 台北市中山區南京東路三段219號5樓</span>
                </div>
                <div class="right">
                    <img src="../assets/images/infoPic.svg">
                </div>
            </div>
        </div>
        <!-- 常見規則 -->
        <div class="rules">
            <div class="Title">
                <StrellarFrontierTitle h1="常見航站規則" p="RULES"></StrellarFrontierTitle>
            </div>
            <div class="mainSel">
                <button class="changeRules">
                    退換票政策
                </button>
                <div class="accordion">
                    <div class="accordion-item" v-for="(item, index) in items" :key="index">
                        <div class="accordion-question">
                            <span>{{ item.question }}</span>
                            <button class="accordion-toggle" @click="toggleAccordion(index)"><span
                                    :class="{ 'plus': activeIndex !== index, 'minus': activeIndex === index }"></span></button>
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
            <p>有任何問題，歡迎寄信到下方Email</p>
            <p>illusionlab@gmail.com</p>
        </div>
        <div class="contactTime">
            <p>週一到週五 10:00 ~ 20:00 會由專人回覆訊息</p>
        </div>
    </div>
</template>



<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap');

* {
    font-family: "Noto Serif TC" !important; 
}

.wrapper {
    background-image: url(../assets/images/StrellarFrontierBackground.png);

}

.Title {
    text-align: center;
}

// 旅行心得
.comments {
    margin: 5%;
}

.card-container {
    display: flex;
    align-items: center;
    justify-content: space-around;
    position: relative;
    overflow: hidden;
    width: 100%;
}

.commentCards {
    // ul
    display: flex;
    margin-left: 40px;
    margin-right: 40px;
    transition: transform 0.5s ease;
    width: calc(100% * 3);
}

.commentCard {
    //li
    margin: 1%;
    box-sizing: border-box;
}

// 左右 < > 按鈕
.nav-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1;
}

.nav-button button {
    background: none;
    border: none;
    font-size: 30px;
    padding: 5px 10px;
    cursor: pointer;
    color: #fff;
}

.nav-button.left {
    left: 0;

}

.nav-button.right {
    right: 0;
}

.nav-button.hidden {
    display: none;
}

.indicator {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.indicator span {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: white;
    margin: 0 5px;
    display: inline-block;
    cursor: pointer;
}

.indicator .active {
    background: linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%);

}

.commText p {
    // 心得文字
    color: white;
    text-align: justify; //文字左右對齊
    line-height: 1.6;
    padding: 10%;
    font-family: "Noto Serif TC";
}

.comments .img {
    width: 300px;
    height: 400px;
    background-image: url(../assets/images/commentBackground3.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    box-sizing: border-box;
}

// 票價資訊
.ticketInfo {
    margin: 3%;
}

.ticketInfo img {
    display: block;
    margin: 0 auto;
    width: 100%;
    max-width: 600px;
}

// 熱門商品
.carousel-container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
    height: 600px;
}

.carousel-container img {
    width: 100%;
    max-width: 200px;
}

.carousel {
    display: flex;
    flex-direction: column;
    transition: transform 0.5s ease;
}

.carousel-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-width: 600px;
    background: linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%);

    flex: 0 0 100%;
    max-height: 100%;
}

.product-info {
    text-align: center;
    margin-top: 10px;
}

// 小圓點
.indicators {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
}

.indicators span {
    display: block;
    width: 10px;
    height: 10px;
    background-color: white;
    border-radius: 50%;
    margin-bottom: 5px;
    cursor: pointer;
}

.indicators span.active {
    background: linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%);
}



// 航站資訊
.infoText {
    display: flex;
    justify-content: center;
    margin: 5%;
    line-height: 1.6;
}

.infoText .right img {
    width: 100%;
    max-width: 350px;
    // height: 200px;
}

.infoText .time {
    font-weight: bold;
}

.infoText .time,
.infoText span {
    color: white;
    font-size: 24px;
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
    background: linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%);
    border: none;
    border-radius: 5px;
    color: white;
    padding: 1% 3%;
    margin: 2% auto 5% auto;
    cursor: pointer;
    font-size: 16px;
    // 讓按鈕置中
    display: flex;
    align-items: center;
    justify-content: center;

}

.accordion-item {
    margin-bottom: 5%
}

.accordion-question {
    border-radius: 10px;
    background: linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%);
    width: 500px;
    height: 30px;
    flex-shrink: 0;
    color: white;
    // 讓+號靠右
    display: flex;
    justify-content: space-between;
}

.accordion-question span {
    display: flex;
    align-items: center;
    padding-left: 2%;
    font-weight: 600;
}

.accordion-answer {
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.85);
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
    color: black;
    padding: 3%;
    line-height: 1.6;
}

// + button  
.accordion-toggle {
    background: none;
    border: none;
    color: white;
    cursor: pointer;

}

.accordion-toggle span {
    display: inline-block;
    width: 20px;
    height: 20px;
    position: relative;
}

.accordion-toggle span::before,
.accordion-toggle span::after {
    content: '';
    position: absolute;
    width: 80%;
    height: 5%;
    background-color: #fff;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    transition: transform 0.3s ease;
}

.accordion-toggle .plus::after {
    transform: rotate(90deg) translateY(-50%);
}

.accordion-toggle .minus::after {
    transform: rotate(0deg) translateY(-50%);
    background-color: transparent;
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
.contact #text {
    color: white;
    // font-weight: bold;
    text-align: center;
    margin: 3%;
    line-height: 1.6;
}

.contact p,
.contactTime p {
    color: white;
    text-align: center;
    line-height: 2;
}

// 專人回覆那段
.contactTime {
    background: linear-gradient(rgba(0, 0, 0, 0.991), rgba(255, 255, 255, 0)),
        url(../assets/images/earth.png);
    background-size: cover;
    /* 讓背景圖片覆蓋整個區塊 */
    background-position: center;
    background-repeat: no-repeat;
    padding-bottom: 25%;
    padding-top: 5%;
}
</style>
