<script setup>
import Header from '@/components/Header_0.vue';
import Footer_2 from '@/components/Footer_1.vue';
import Btn_Lifecasino from '@/components/Btn_Lifecasino.vue';
import LC_Text2 from '@/components/LC_Text2.vue';
import icon3 from '../assets/images/LC_icon3.svg'
import CoinFall2 from '@/components/CoinFall.vue';

import { useRoute } from 'vue-router';
import { defineProps, ref, onMounted } from 'vue';
const currentMode = ref('two');
const props = defineProps({
  productInfo: Object
})

const item = ref([
  // {id:'1',productList:'20240904001', cardImage: '../src/assets/images/LC_Product_item1.svg',productName:'奢華金杯',price:599,material:'銅鍍合金',size:'直徑6.5cm，高6cm',quantity: 1},
])


const route = useRoute();

// function goToLoginCMS(){
//   router.push('/LoginCMS');

// }

// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(開始)
async function fetchProducts() {
  try {
    const productId = route.params.id;
    // const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/LC_GetProductInfo.php?productId=${productId}`); // 替換成你實際的 API URL
    const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/LC_GetProductInfo.php?productId=${productId}`);
    const data = await response.json();
    item.value = data;
    // item.value = { ...data, quantity: 1 };  // 初始化數量為 1
    // selectedSize.value = item.value.PRODUCT_SIZE[0];  // 預設選中第一個尺寸
    // selectedStyle.value = item.value.PRODUCT_STYLE[0]; // 預設選中第一個樣式

  } catch (error) {
    console.error('Error fetching products:', error);
  }
}

onMounted(() => {
  fetchProducts(); // 當頁面加載時撈取資料
});


// ===================加入購物車至localStorage
// 添加到購物車的函數
function addToCart() {

  if (!item.value) return;  // 確保 `item.value` 已載入
  // 構造要儲存的商品資料
  const product = {
    id: item.value.PRODUCT_ID,
    name: item.value.PRODUCT_NAME,
    price: item.value.PRODUCT_PRICE,
    img: item.value.PRODUCT_IMG,
    quantity: counter.value,
    size: selectedSize.value // 你可以從 select 元素中獲取尺寸
  };

  // 從 localStorage 中獲取當前購物車商品
  const cart = JSON.parse(localStorage.getItem("cart")) || [];

  // 檢查此商品是否已經存在於購物車
  const existingProduct = cart.find(p => p.id === product.id && p.size === product.size);

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
  alert("商品已成功加入購物車！");

  console.log('Current cart items in localStorage:', localStorage.getItem('cart'));
}


// =====加減數量
// 定義計數器，使用 ref 來創建響應式變量
const counter = ref(1);// 商品數量
const selectedSize = ref(""); // 儲存選擇的尺寸

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


// const product = ref(null);
// const route = useRoute();

// onMounted(async () => {
//   const productId = route.params.id;
//   const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/getProductDetail.php?productId=${productId}`);
//   product.value = await response.json();
// });

</script>

<template>
  <div class="warpper">
    <div>
      <Header :mode="currentMode" />
    </div>

    <div class="center">
      <div class="warp">

        <LC_Text2 class="title" Title1="精選" :icon="icon3" Title2="商品" English="PRODUCT">
        </LC_Text2>
        <!-- <div class="producttitle">
        <div class="arrowlift">
          <font-awesome-icon icon="fa-solid fa-arrow-left-long" />
          <p >上一頁</p>
        </div>
      </div>
       -->
        <div class="pboxout">
          <div aria-label="Breadcrumb">
            <ul class="breadcrumb">
              <li><router-link to="/LC_ProductPage">全部商品 </router-link></li>
              <li>{{ item.PRODUCT_NAME }}</li>
            </ul>
          </div>

          <div v-if="item" class="pagebox">
            <!-- 放置一個商品列的外框 -->
            <img :src="item.PRODUCT_IMG" alt="">
            <div class="list">
              <div class="pro">
                <p>商品編號 : {{ item.PRODUCT_ID }}</p>
                <p>{{ item.PRODUCT_NAME }}</p>
                <p>NT $ {{ item.PRODUCT_PRICE }}</p>
                <p>材質 : {{ item.MATERIAL }}</p>
                <p>規格 : {{ item.PRODUCT_SIZE }}</p>

                <!-- 尺寸選擇 -->
                <div class="input" v-if="item.PRODUCT_ID === 2">
                  <p class="txt">選擇尺寸：</p>
                  <select v-model="selectedSize" id="size">
                    <option v-for="size in item.PRODUCT_SIZES" :key="size" :value="size">
                      {{ size }}
                    </option>
                  </select>
                </div>
               
               

                <!-- 數量選擇 -->
                <!-- <p class="txt">選擇數量：</p>
                <div class="quantity-input" id="quantity">
                  <button class="quantity-button" id="minus6" @click="item.quantity > 1 && item.quantity--">-</button>
                  <input type="text" v-model="item.quantity" min="1" />
                  <button class="quantity-button" id="plus6" @click="item.quantity++">+</button>
                </div> -->


                <p class="txt">選擇數量：</p>
                <div class="quantity-input" id="quantity">
                  <input class="quantity-button" id="minus6" @click="decrement" type="button" value=" - ">
                  <div class="counter">{{ counter }}</div>
                  <input type="button" value=" + " class="quantity-button" id="plus6" @click="increment">
                </div>
                <input type="hidden" name="quantity" :value="counter"> <!-- 傳送商品數量 -->


                <div class="icon" @click="addToCart">
                  <Btn_Lifecasino Button="加入購物車"></Btn_Lifecasino>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>

    <div>
    </div>
    <CoinFall2 class="coin"></CoinFall2>

    <Footer_2></Footer_2>
  </div>
</template>



<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

@import "../assets/style";

.warpper {
  box-sizing: border-box;

  font-family: "Noto Serif SC";
  // max-width: 1440px;
  width: 100%;
  // height: 100%;
  margin: 0 auto;
  // border: 1px solid red;
  // background-image: url(../assets/images/SFbg.png);'
  background: url(../assets/images/lifecasino_bg1.png);
  // height: 180vh;
  background-size: cover;
  position: relative;
  overflow: hidden;
  z-index: 0;
  background-repeat: no-repeat;

  &::before {
    z-index: -2;
    content: "";
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 80%;
    background-color: rgba(0, 0, 0, 0.689);
    mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
  }

  .coin {
    // border: 2px solid red;
    position: absolute;
    right: 0;
    top: 0;
    z-index: -5;
    // max-height: 100%;
    // width: 50px;
    // overflow: hidden;
    opacity: .5;
    animation: opacity 8s linear;
    // height: 100vh;

  }

  @keyframes opacity {
    0% {
      opacity: 0;
    }

    100% {
      opacity: .5;
    }
  }

}

.title {
  margin-top: 10px;
  width: 400px;
}

.warp {
  position: relative;
  // height: 100vh;
  //  border: 2px solid red;
}

.center {
  box-sizing: border-box;

  color: map-get($colorfont_0, white);
  font-weight: 500;
  font-family: map-get($fontStyle, style_2);
  max-width: 800px;
  width: 100%;
  // display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding-top: 20px;
  margin: 0 auto
}


//麵包屑

.breadcrumb {
  list-style: none;
  display: flex;
  padding-left: 20px;
  margin: 30px auto;
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

.producttitle {
  max-width: 700px;
  width: 100%;
  font-family: "Noto Serif SC";
  font-size: 20px;
  display: flex;
  justify-content: space-between;
  margin-top: 40px;
  margin-bottom: 30px;
  // border: 1px solid red;


}

.producttitle p {
  width: 110px;
  color: #fff;
  padding: 10px 0px;
  font-family: map-get($fontStyle, style_2);

}

.producttitle h1 {
  font-size: 48px;

}

.arrowlift {
  color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-bottom: 1px solid #fff;
}

.arrowright {
  color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-bottom: 1px solid #fff;
}

//商品外框
.pagebox {
  font-family: "Noto Serif SC";
  max-width: 1000px;
  // width: 100%;
  overflow: hidden;
  background: linear-gradient(147deg, #1E1E2F 3.26%, rgba(30, 30, 47, 0.60) 97.45%);
  border-radius: 20px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr;
  padding: 70px 80px 100px 80px;
  box-shadow: 0px 4px 25px -1px rgba(0, 0, 0, 0.25);
  // border: 1px solid #fff;
  justify-content: space-between;
  align-items: start;
  gap: 8%;
  margin: 0 20px 50px;

}

.list {
  // width: 80%;
  flex-basis: 50%;

  // justify-content: center;

  gap: 26px;
  /* 使用 gap 代替 margin-right，確保元素之間的間隔一置 */
  /* 商品換行 */

}

.pro {
  // border: 1px solid red;
  width: 200px;
  // height: 250px;
  // margin-bottom: 20px;
  padding: 10px;
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
  /*浮起來及陰影效果 */
  border-radius: 10px;
  // display: flex;
  // flex-direction: column;
  // align-items: center; /* 確保內容居中 */

}

// .pro:hover {
//   transform: translateY(-5px);
//   /* 往上是負，輕微浮起 */
//   box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.5);
//   /* 明顯的阴影效果 */
//   border-color: rgba(255, 255, 255, 0.5);
//   /* 懸停時增加邊框颜色 */
// }




.pro p {
  font-weight: 600;
  font-size: 24px;
  color: #fff;
  text-align: left;
  margin-bottom: 10px;
  font-family: map-get($fontStyle, style_2);
}

.pro p:first-child {
  font-size: 12px;
  font-weight: 300;
}

.pro p:nth-child(3) {
  font-size: 18px;
  font-weight: 800;
}

.pro p:nth-child(4) {
  font-size: 16px;
  font-weight: 300;
  border-left: 3px solid map-get($color_0 , btn_orange);
  padding-left: 8px;

}

.pro p:nth-child(5) {
  font-size: 12px;
  font-weight: 300;
  margin-bottom: 20px;
}

//商品
.pagebox img {
  width: 100%;
  max-width: 300px;
  max-height: 300px;
  height: 100%;
  /* 限制圖片高度 */
  object-fit: cover;
  /* 保持圖片比例 */


  border-radius: 12px;
  margin-bottom: 15px;
  flex-grow: 2;
  justify-self: right;
}

.price span {
  color: #fff;
  font-size: 16px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;

  font-family: map-get($fontStyle, style_2);
}

.input {
  width: 100%;
  position: relative;
  /* 為了偽元素定位 */
  // margin-bottom: 8px;
  border: 0
}

.input select {
  width: 100%;
  height: 20px;
  line-height: 28px;
  /* 確保游標高度與input框高度一致 */
  // border: 1px solid #ccc;
  border-radius: 6px;
  padding: 0 8px;
  font-size: 16px;
  transition: border-color 0.3s ease-in-out;
  appearance: none;
  /* 隱藏默認的下拉箭頭 */
  background: #ffedbc00;
  border: 1px solid #fff;
  border-radius: 8px;
  height: 28px;
  color: #fff;
  text-align: center;
  margin-bottom: 15px;

}

.input>select>option {
  line-height: 20px;
  /* 讓選項的高度與select框一致 */
  vertical-align: middle;
  /* 垂直置中 */
  text-align: center;
  /* 水平靠左對齊 */
  /* 加上內邊距，讓文字與邊框有間隔 */
  color: #313131;
}

.txt {
  font-size: 16px !important;
}




.input::after {
  content: "▼";
  /* 使用自定義的箭頭符號 */
  font-size: 16px;
  color: map-get($color_0 , btn_orange);
  position: absolute;
  right: 10px;
  top: 60%;
  transform: translateY(-50%);
  pointer-events: none;
  /* 確保偽元素不會干擾選擇操作 */
}

.input select:focus {
  // border-color: #B36243;
  box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
  /* 暈染效果 */
  outline: none;
  /* 移除默認的黑框 */
}

.quantity-input {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: px;
  width: 100%;
  border: 1px solid #fff;
  border-radius: 8px;
  height: 28px;
  margin-bottom: 20px;

}

.quantity-button {
  display: inline-block;
  text-align: center;
  font-size: 16px;
  width: 40px;
  height: 28px;
  /* 將高度設置為 40px，與輸入框一致 */
  line-height: 28px;
  /* 將 line-height 設置為 40px，確保文字垂直居中 */
  background-color: #ffedbc00;
  /* 設置背景色，根據需求調整 */
  border: 0;
  color: #fff;
  cursor: pointer;

}

// 人生賭場原本 
// .quantity-input>button:last-child:hover {
//   background-color: map-get($color_0 , btn_orange);
//   transition: 0.3s;
//   border-radius: 0 8px 8px 0;
// }

// .quantity-input>button:first-child:hover {
//   background-color: map-get($color_0 , btn_orange);
//   transition: 0.3s;
//   border-radius: 8px 0 0 8px;
// }

//weiwei調整後
.quantity-input>input:last-child:hover {
  background-color: map-get($color_0 , btn_orange);
  transition: 0.3s;
  border-radius: 0 8px 8px 0;
}

.quantity-input>input:first-child:hover {
  background-color: map-get($color_0 , btn_orange);
  transition: 0.3s;
  border-radius: 8px 0 0 8px;
}

.quantity-input>input {
  display: inline-block;
  text-align: center;
  font-size: 16px;
  width: 50px;
  /* 適當調整寬度，使其與按鈕相匹配 */
  height: 25px;
  /* 將高度設置為 40px，與按鈕一致 */
  line-height: 25px;
  /* 將 line-height 設置為 40px，確保文字垂直居中 */
  background-color: #ffedbc00;
  /* 設置背景色，根據需求調整 */
  // margin: 0 2px;
  /* 添加 margin 以確保輸入框與按鈕之間有適當的間距 */
  box-sizing: border-box;
  /* 確保 padding 和 border 不會影響元素的寬度 */
  border: 0;
  // margin-bottom: 80px;
  color: #fff;
}

@media screen and (max-width: 820px) {
  .pagebox {
    padding: 70px 40px 80px;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 1fr;

    img {
      text-align: center;
      margin: auto auto;

    }

    .pro {
      margin: 0 auto;
    }

  }

}

@media screen and (max-width: 430px) {
  .pagebox {
    padding: 20px 10px 60px;
    gap: 2%;
  }
}
</style>