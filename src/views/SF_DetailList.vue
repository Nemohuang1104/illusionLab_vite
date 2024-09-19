<script setup>
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

// 頁首頁尾
import Header_0 from '@/components/Header_0.vue';
const currentMode = ref('three');

import Footer_2 from '@/components/Footer_2.vue';


// 匯入漸層藍色標題樣式
import StrellarFrontierTitle from '@/components/SFTitle.vue';

const props = defineProps({
    productInfo: Object
})


//在商品細項撈取商品資料
const item = ref([]);
const route = useRoute();
// const router = useRouter();
const productDetail = ref(null);

// 根據商品 ID 撈取商品細項資料
async function fetchProductDetail() {
    try {
        // console.log(router);

        console.log(route.params);

        console.log(route.params.id);

        const productId = route.params.id; // 從路由獲取商品 ID
        const response = await fetch(`http://illusionlab.local/public/PDO/ProductData/SF_FetchProductDetail.php?productId=${productId}`, {
            headers: {
                'Content-Type': 'application/json'
            }
        });


        console.log(response);

        if (response.ok) {
            try {
                const data = await response.json();
                console.log(data);
                item.value = data;

            } catch (error) {
                console.error('Error fetching product details:', error);
            }



        }

        // fetch(`http://illusionlab.local/public/PDO/ProductData/SF_FetchProductDetail.php?productId=${productId}`).then(response => response.json()).then(
        //     json => console.log(json)
        // )



    } catch (error) {
        console.error('Error fetching product details:', error);
    }

}

onMounted(() => {
    // router.push('/')
    fetchProductDetail(); // 撈取商品細項資料
});






// 輪播圖
// Import Swiper and modules
// import { Swiper, SwiperSlide } from 'swiper/vue';
// import 'swiper/css';
// import 'swiper/css/free-mode';
// import 'swiper/css/navigation';
// import 'swiper/css/thumbs';

// Import required modules
// import { FreeMode, Navigation, Thumbs } from 'swiper/modules';


// Define the thumbsSwiper reference
// const thumbsSwiper = ref(null);

// Function to set the thumbsSwiper instance
// const setThumbsSwiper = (swiper) => {
//   thumbsSwiper.value = swiper;
// };

// Swiper modules used
// const modules = [FreeMode, Navigation, Thumbs];



</script>

<template>
    <div>
        <Header_0 :mode="currentMode"></Header_0>
    </div>

    <div class="warpper">
        <div class="title">
            <StrellarFrontierTitle h1="精選商品" p="PRODUCTS"></StrellarFrontierTitle>
        </div>

        <div class="pboxout">
            <div aria-label="Breadcrumb">
                <ul class="breadcrumb">
                    <li><router-link to="/SF_ProductPage">全部商品 </router-link></li>
                    <li><a href="#">{{ item.PRODUCT_NAME }}</a></li>
                </ul>
            </div>
            <div class="pbox" v-if="item">
                <!-- <swiper :style="{
                    '--swiper-navigation-color': '#fff',
                    '--swiper-pagination-color': '#fff',
                }" :spaceBetween="20" :navigation="flase" :thumbs="{ swiper: thumbsSwiper }" :modules="modules"
                    class="mySwiper2">
                    <swiper-slide><img src="../assets/images/SF_bag.png" /></swiper-slide><swiper-slide><img
                            src="../assets/images/SF_cup.png" /></swiper-slide><swiper-slide><img
                            src="../assets/images/SF_Pillow.png" /></swiper-slide><swiper-slide><img
                            src="../assets/images/SF_easycard_1.png" /></swiper-slide>
                </swiper> -->
                <div class="pimg"><img :src="item.PRODUCT_IMG" alt=""></div>
                <div>
                    <div class="textbox">
                        <p>商品編號 :　{{ item.PRODUCT_ID }}</p>
                        <h3>{{ item.PRODUCT_NAME }}</h3>
                        <h4>NT $ {{ item.PRODUCT_PRICE }} </h4>
                        <!-- <div class="leftlight">
                            <p>作者 : Nemo  </p>
                            <p>與知名插畫家 Nina 聯名推出</p>
                        </div> -->
                        <p>材質：{{ item.MATERIAL }}</p>
                        <p>商品規格 :{{ item.PRODUCT_SIZE }}</p>
                    </div>
                    <!-- <swiper @swiper="setThumbsSwiper" :spaceBetween="10" :slidesPerView="4" :freeMode="true"
                        :watchSlidesProgress="true" :modules="modules" class="mySwiper">
                        <swiper-slide><img src="../assets/images/SF_bag.png" /></swiper-slide>
                        <swiper-slide><img src="../assets/images/SF_cup.png" /></swiper-slide>
                        <swiper-slide><img src="../assets/images/SF_Pillow.png" /></swiper-slide>
                        <swiper-slide><img src="../assets/images/SF_easycard_1.png" /></swiper-slide>
                    </swiper> -->
                    <div class="rightdown">
                        <div class="but">
                            <input type="button" value=" - " class="sub">
                            <div class="counter" id="counter">1</div>
                            <input type="button" value=" + " class="add">
                        </div>
                        <div class="size">
                            <select name="size-select" id="size-select">
                                <option value="----- 商品尺寸 -----">商品規格</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>

                        <p>加入購物車</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
        <Footer_2></Footer_2>
    </div>
</template>



<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');


* {
    text-decoration: none;
    font-family: "Noto Serif TC";

}

.warpper {
    // max-width: 1440px;
    width: 100%;

    height: 100%;
    min-height: 600px;
    margin: 0 auto;
    // border: 1px solid red;
    background-image: url(../assets/images/STBackground.png);
    // border: 1px solid red;

    text-align: center;
    padding-top: 120px;


}

//標題
.title {
    max-width: 1440px;
    width: 100%;
    // padding-top: 10px;
    margin-bottom: 30px;
}



//商品照片及價格框
.pboxout {
    // border: 1px solid red;
    max-width: 800px;
    width: 100%;
    // height: 800px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    // align-items: center;
}

.pbox {
    // border: 1px solid red;
    max-width: 800px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 50px;
    box-sizing: border-box;
}

//麵包屑

.breadcrumb {
    list-style: none;
    display: flex;
    // padding-left: 22%;

}

.breadcrumb li {
    margin-right: 8px;
    color: #FFFFFF;
}

.breadcrumb li a {
    text-decoration: none;
    color: #ffffff;
}

.breadcrumb li::after {
    content: '>';
    margin-left: 8px;
}

.breadcrumb li:last-child::after {
    content: '';
    /* Remove the last separator */
}

//左側商品照片
.pimg img {
    width: 400px;
    height: 400px;
    border-radius: 12px;
}

//右側上方文字框
.textbox {
    // border: 1px solid red;
    width: 240px;
    // height: 150px;

    // background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
    color: #fff;
    overflow: hidden;
    line-height: 35px;
    text-align: left;
}

.leftlight {
    border-left: 5px solid #132C79;
    line-height: 20px;
    padding-left: 5px;
}

.textbox h3 {
    font-size: 28px;
    font-weight: 600;
}
.textbox h4{
    font-size: 20px;
    font-weight: 800;
}


.textbox p {
    font-size: 16px;
    color: #FFFFFF;
}


.btn {
    flex-direction: row;
}

//數量增減
.but {
    // border: 1px solid red;
    display: flex;
    align-items: center;
    text-align: center;
    justify-content: space-between;
    line-height: 50px;
    width: 200px;
    height: 30px;
    line-height: 30px;
    margin: 20px auto;
    border-radius: 12px;


    color: #fff;
    outline: none;
    // background-color: black;
    opacity: 1;
    border: 1px solid #ffffff;
    outline: none;

}

.counter {
    color: #FFFFFF;
    font-size: 16px;
}

.sub {
    border-radius: 40px 0px 0px 40px;
    color: #ffffff;
    background-color: transparent;
    font-size: 30px;
    border: none;
    cursor: pointer;
}

.add {
    border-radius: 40px 0px 0px 40px;
    color: #ffffff;
    background-color: transparent;
    font-size: 30px;
    border: none;
    cursor: pointer;
}

//尺寸下拉式選單

.size {
    position: relative;
    display: inline-block;
}

.size select {
    width: 200px;
    text-align: center;
    height: 30px;
    border-radius: 12px;
    display: block;
    line-height: 30px;
    margin: 0 auto;
    margin-bottom: 20px;
    color: #ffffff;
    outline: none;
    background: none;
    //select箭頭
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    font-size: 14px;
}
.size::after {
    content: '\25BC'; /* Unicode的下箭頭符號 */
    position: absolute;
    right: 10px;
    top: 30%;
    transform: translateY(-50%);
    color: white;
    pointer-events: none; /* 防止箭頭阻擋下拉選單的點擊 */
    font-size: 10px;  /* 控制箭頭大小 */
}

.size option {
    color: black;

}

.size select:hover {
    background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
}

//加入購物車
.rightdown p {
    width: 200px;
    height: 40px;
    border-radius: 40px;
    display: block;
    text-align: center;
    line-height: 50px;
    // display: flex;
    // justify-content: center;
    // align-items: center;

    cursor: pointer;
    text-decoration: none;
    // font-size: 20px;
    color: #fff;
    background: linear-gradient(180deg, rgba(19, 44, 121, 0.80) 44.5%, rgba(7, 143, 242, 0.70) 100%);
    margin: 0 auto;
    
}

.rightdown p:hover{
    background: linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%);
}

//小圖換大圖
.swiper {
    width: 100%;
    height: 100%;
    margin: 0px;

}

.swiper-slide {
    width: 50%;
    display: flex;
    justify-content: space-between;
    align-items: center;

    background-size: cover;
    background-position: center;
}

//大圖
.mySwiper2 {
    height: 70%;
    width: 70%;
    // border-radius: 12px;
    object-fit: cover;
    box-sizing: border-box;
    border-radius: 12px;
    margin: 0 auto;
}

//小圖
.mySwiper {
    height: 70%;
    width: 85%;
    box-sizing: border-box;
    padding: 5px 0;
    // border-radius: 12px;
    object-fit: cover;
    // border: 5px solid #122A74;

}




.mySwiper .swiper-slide {
    width: 30%;
    height: 100%;
    opacity: 0.6;
}

.mySwiper .swiper-slide img {
    border: 3px solid #C1693B;
    border-radius: 12px;
    margin-right: 5px;
    box-sizing: border-box;
}

.mySwiper .swiper-slide-thumb-active {
    opacity: 1;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    // border: 5px solid #122A74;
}

// RWD

@media(max-width: 920px) {
    .breadcrumb {
        padding-left: 5%;
    }

    .producttitle {
        width: 80%;
    }

    .pagebox {
        padding: 0px;
        height: auto;
    }

    .pbox {
        flex-direction: column;
    }

    .size select {
        text-align-last: center;
    }

}


@media (max-width: 430px) {
    .size select {
        text-align-last: center;
    }
}
</style>