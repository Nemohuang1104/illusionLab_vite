<script setup>

import Header_0 from '@/components/Header_0.vue';
const currentMode = ref('four');
import Footer_03 from '@/components/Footer_03.vue';

import { useRoute } from 'vue-router';
import { defineProps, ref, onMounted } from 'vue';
const props = defineProps({
    productInfo: Object
})

//彈跳視窗
import Swal from 'sweetalert2'; // 在 script setup 中引入
import 'sweetalert2/src/sweetalert2.scss';

const item = ref([])

const selectedSize = ref('');  // 尺寸選擇
const selectedStyle = ref(''); // 樣式選擇
const selectedImage = ref('');  // 用來儲存當前顯示的圖片
const route = useRoute();


async function fetchProducts() {
    try {
        const productId = route.params.id;
        // const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/MS_GetProductInfo.php?productId=${productId}`); // 替換成你實際的 API URL
        const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/MS_GetProductInfo.php?productId=${productId}`); // 替換成你實際的 API URL
        const data = await response.json();
        item.value = data;
        item.value = { ...data, quantity: 1 };  // 初始化數量為 1
        selectedSize.value = item.value.PRODUCT_SIZES[0];  // 預設選擇第一個尺寸
        selectedStyle.value = item.value.PRODUCT_STYLES[0].STYLE_VALUE;  // 預設選擇第一個樣式
        selectedImage.value = item.value.PRODUCT_STYLES[0].STYLE_IMG;   // 預設顯示第一個樣式圖片

    } catch (error) {
        console.error('Error fetching products:', error);
    }
}

onMounted(() => {
    fetchProducts(); // 當頁面加載時撈取資料
});


// 切換樣式並更新圖片
function selectStyle(style) {
    selectedStyle.value = style.STYLE_VALUE;
    selectedImage.value = style.STYLE_IMG;  // 更新主圖片為所選樣式的圖片

}
// 注入購物車
import { inject } from 'vue';
const cart_data = inject('cart');
// ===================加入購物車至localStorage
// 添加到購物車的函數
function addToCart() {
    // 構造要儲存的商品資料
    const product = {
        id: item.value.PRODUCT_ID,
        name: item.value.PRODUCT_NAME,
        price: item.value.PRODUCT_PRICE,
        img: selectedImage.value,
        quantity: counter.value,
        size: selectedSize.value, // 你可以從 select 元素中獲取尺寸
        style: item.value.PRODUCT_STYLES ? selectedStyle.value : null,  // 如果有樣式的選擇，也可以在這裡獲取
        discount_amount: '',
    };

    // 檢查數量、尺寸和樣式是否被選擇
    if (counter.value < 1) {
        Swal.fire({
            title: '數量錯誤',
            text: '請選擇至少一個商品數量！',
            icon: 'warning',
            confirmButtonText: '確定',
            willOpen: () => {
                document.body.style.paddingRight = '0';
            }
        });
        return; // 中止執行
    }
    // 檢查是否需要尺寸
    if (item.value.requiresSize && !selectedSize.value) {
        Swal.fire({
            title: '尺寸未選擇',
            text: '請選擇商品尺寸！',
            icon: 'warning',
            confirmButtonText: '確定',
            willOpen: () => {
                document.body.style.paddingRight = '0';
            }
        });
        return; // 中止執行
    }



    // 從 localStorage 中獲取當前購物車商品
    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    // 檢查此商品是否已經存在於購物車
    const existingProduct = cart.find(p => p.id === product.id &&
        p.size === product.size &&
        p.style === product.style);

    if (existingProduct) {
        // 如果商品已存在，更新數量
        existingProduct.quantity += product.quantity;
    } else {
        // 如果商品不存在，將其添加到購物車
        cart.push(product);
    }

    // 將更新後的購物車數據存回 localStorage
    localStorage.setItem("cart", JSON.stringify(cart));

    // 可選：顯示成功提示
    // alert("商品已成功加入購物車！");

    // 顯示 SweetAlert 提示
    Swal.fire({
        title: 'Good job!',
        text: '商品已成功加入購物車！',
        icon: 'success',
        // confirmButtonText: '確定' // 自定義按鈕文本
        timer: 1200,
        showConfirmButton: false,// 隱藏確認按鈕
        willOpen: () => {
            document.body.style.paddingRight = '0';
        }
    });


    console.log('Current cart items in localStorage:', localStorage.getItem('cart'));
    //增加數量
    cart_data.value = cart
}


// =====加減數量
// 定義計數器，使用 ref 來創建響應式變量
const counter = ref(1);// 商品數量


// 增加數量
const increment = () => {
    counter.value++;
};

// 減少數量 (確保不小於 1)
const decrement = () => {
    if (counter.value > 1) {
        counter.value--;
    }
};

const baseUrl = import.meta.env.VITE_IMAGE_URL || import.meta.env.BASE_URL;


const getImageUrl = (imgPath) => {
  return `${baseUrl === '/' ? '' : baseUrl }${imgPath}`;
};
</script>

<template>
    <div>
        <Header_0 :mode="currentMode"></Header_0>
    </div>

    <div class="warpper">
        <div class="title">
            <h1>精選商品</h1>
            <p>PRODUCTS</p>
        </div>

        <div class="pboxout">
            <div aria-label="Breadcrumb">
                <ul class="breadcrumb">
                    <li><router-link to="/MS_ProductPage">全部商品 </router-link></li>
                    <li>{{ item.PRODUCT_NAME }}</li>
                </ul>
            </div>
            <div class="pbox" v-if="item">
                <div class="pimg">
                    <img :src="getImageUrl(selectedImage)" alt="product image" class="main-product-image">
                </div>
                <div>
                    <div class="textbox">
                        <p>商品編號 : {{ item.PRODUCT_ID }}</p>
                        <h3>{{ item.PRODUCT_NAME }}</h3>
                        <h4>NT $ {{ item.PRODUCT_PRICE }} </h4>
                        <div class="leftlight">
                            <p>作者：Dandy · Syike</p>
                            <p>與知名插畫家DoMeDo聯名推出</p>
                        </div>
                        <p>材質：{{ item.MATERIAL }}</p>
                        <p>商品規格 : {{ item.PRODUCT_SIZE }}</p>
                    </div>
                    
                    <div v-if="item.EVENT_ID = 3" class="style-selection">
                        <p class="txt">選擇樣式：{{ selectedStyle }}</p>

                        <div class="style-options">
                            <img v-for="style in item.PRODUCT_STYLES" :key="style.STYLE_VALUE" :src="getImageUrl(style.STYLE_IMG)"
                                :alt="style.STYLE_VALUE" :class="{ 'selected': style.STYLE_VALUE === selectedStyle }"
                                @click="selectStyle(style)" class="style-image">

                        </div>

                    </div>


                    

                    <p class="txt">選擇數量：</p>
                    <div class="quantity-input" id="quantity">
                        <input class="quantity-button" id="minus6" @click="decrement" type="button" value=" - ">
                        <div class="counter">{{ counter }}</div>
                        <input type="button" value=" + " class="quantity-button" id="plus6" @click="increment">
                    </div>
                    <input type="hidden" name="quantity" :value="counter"> <!-- 傳送商品數量 -->
                    <!-- <p class="txt">選擇數量：</p>
                    <div class="quantity-input" id="quantity">
                        <button class="quantity-button" id="minus6"
                            @click="item.quantity > 1 && item.quantity--">-</button>
                        <input type="text" v-model="item.quantity" min="1" />
                        <button class="quantity-button" id="plus6" @click="item.quantity++">+</button>
                    </div> -->

                    <!-- <div class="rightdown">
                        <div class="but">
                            <input type="button" value=" - " class="sub">
                            <div class="counter" id="counter">1</div>
                            <input type="button" value=" + " class="add">
                        </div> -->

                    <!-- 尺寸選擇 -->
                    <div class="size" v-if="item.PRODUCT_ID == 22">
                        <p class="txt">選擇尺寸：</p>
                        <select v-model="selectedSize" id="size">
                            <option v-for="size in item.PRODUCT_SIZES" :key="size" :value="size">
                                {{ size }}
                            </option>
                        </select>
                    </div>
                    <!-- <p class="shop">加入購物車</p> -->
                    <button class="shop" @click="addToCart">加入購物車</button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <Footer_03></Footer_03>
    </div>
</template>



<style lang="scss" scoped>
* {
    text-decoration: none;
}

@import "../assets/style";


.warpper {
    font-family: "Noto Sans TC";
    // max-width: 1440px;
    width: 100%;

    height: 100%;
    min-height: 600px;
    margin: 0 auto;
    // border: 1px solid red;
    background-image: url(../assets/images/MS_paperbg.jpg);
    // border: 1px solid red;

    text-align: center;
    padding-top: 120px;

}

//標題
.title {
    max-width: 1440px;
    width: 100%;
    // padding-top: 10px;
    margin-bottom: 50px;
}


.title h1 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 8px;
    background: #855F49;
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;

}




.title>p {
    font-size: 20px;
    font-weight: 700;
    background: #855F49;
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
}



//商品照片及價格框
.pboxout {
    // border: 1px solid red;
    max-width: 740px;
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
    color: #9F7557;
}

.breadcrumb li a {
    text-decoration: none;
    color: #9F7557;
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
    width: 300px;
    border-radius: 12px;
}

//右側上方文字框
.textbox {
    // border: 1px solid red;
    // width: 240px;
    // height: 150px;

    // background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
    color: #9F7557;
    overflow: hidden;
    line-height: 35px;
    text-align: left;
}

.leftlight {
    border-left: 5px solid #FDC274;
    line-height: 20px;
    padding-left: 10px;
}

.textbox h3 {
    font-size: 28px;
    color: #9F7557;
    font-weight: bold;
}

.textbox h4 {
    font-size: 20px;
    color: #FB9D3C;
    font-weight: bold;
}


.textbox p {
    font-size: 16px;
    color: #9F7557;
}


.btn {
    flex-direction: row;
}

//數量增減
.but {
    // border: 1px solid red;
    display: flex;
    justify-content: space-between;
    line-height: 40px;
    width: 300px;
    height: 40px;
    line-height: 40px;

    margin-bottom: 12px;
    border-radius: 12px;


    color: #9F7557;
    outline: none;
    // background-color: black;
    opacity: 1;
    border: 1px solid #9F7557;
    outline: none;

}

.counter {
    color: #9F7557;
    font-size: 20px;
}

.sub {
    border-radius: 40px 0px 0px 40px;
    color: #9F7557;
    background-color: transparent;
    font-size: 30px;
    border: none;
}

.add {
    border-radius: 40px 0px 0px 40px;
    color: #9F7557;
    background-color: transparent;
    font-size: 30px;
    border: none;
}

//尺寸下拉式選單
.size select {
    width: 300px;
    height: 40px;
    border-radius: 12px;
    display: block;
    text-align: center;
    line-height: 40px;
    margin-bottom: 12px;
    font-size: 18px;
    color: #9F7557;
    outline: none;
    background: #FCF7EC;
    // border: 1px solid ;
    border: 1px solid #9F7557;

}

//將下拉式選單select箭頭刪掉 
.size select {
    // -webkit-appearance: none;
    // -moz-appearance: none;
    appearance: none;

}

.size option {
    // color: black;

}

// ========選擇數量===========//
.quantity-input {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 300px;
    height: 40px;
    border-radius: 12px;
    // display: block;
    text-align: center;
    line-height: 40px;
    margin-bottom: 12px;
    font-size: 18px;
    color: #9F7557;
    outline: none;
    background: #FCF7EC;
    border: 1px solid #9F7557;
}

.quantity-button {
    display: inline-block;
    text-align: center;
    font-size: 20px;
    width: 40px;
    height: 40px;
    /* 將高度設置為 40px，與輸入框一致 */
    line-height: 40px;
    /* 將 line-height 設置為 40px，確保文字垂直居中 */
    background-color: transparent;
    // border-radius: 12px;
    color: #9F7557;
    border: 0;
    cursor: pointer;

}

.quantity-input>button:last-child:hover {
    color: map-get($colofont_3 , orange);
    transition: 0.3s;
    border-radius: 0 12px 12px 0;
}

.quantity-input>button:first-child:hover {
    color: map-get($colofont_3 , orange);
    transition: 0.3s;
    border-radius: 12px 0 0 12px;
}

.quantity-input>input {
    display: inline-block;
    text-align: center;
    font-size: 16px;
    // width: 50px;
    // /* 適當調整寬度，使其與按鈕相匹配 */
    // height: 20px;
    // /* 將高度設置為 40px，與按鈕一致 */
    line-height: 40px;
    /* 將 line-height 設置為 40px，確保文字垂直居中 */
    background-color: #ffedbc00;
    /* 設置背景色，根據需求調整 */
    // margin: 0 2px;
    /* 添加 margin 以確保輸入框與按鈕之間有適當的間距 */
    box-sizing: border-box;
    /* 確保 padding 和 border 不會影響元素的寬度 */
    border: 0;
    // margin-bottom: 80px;
    color: #9F7557;

}

// ==============選擇樣式==============//
.main-product-image {
    width: 100%;
    height: auto;
}

.style-options {
    display: flex;
    gap: 4px;
}

.style-image {
    width: 45px;
    height: 45px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border 0.3s;
    padding: 2px;
    margin-bottom: 10px;
    border-radius: 5px;
}

.style-image.selected {
    border: 2px solid #bfa185;
    border-radius: 5px;
}

//加入購物車
.shop {
    cursor: pointer;
    width: 300px;
    height: 40px;
    border-radius: 12px;
    display: block;
    text-align: center;
    line-height: 40px;
    // display: flex;
    // justify-content: center;
    // align-items: center;


    text-decoration: none;
    font-size: 18px;
    color: #9F7557;
    background: #FEDCAA;
    margin-bottom: 50px;
    border: none;
    cursor: pointer;
}

.txt {
    font-size: 16px;
    color: #9F7557;
    text-align: left;
    margin-bottom: 10px;
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
        justify-content: center;
        margin-bottom: 8px;
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

}
</style>