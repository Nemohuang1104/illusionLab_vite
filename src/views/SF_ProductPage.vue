<script setup>
import { ref, onMounted } from 'vue';

// 頁首頁尾
import Header_0 from '@/components/Header_0.vue';
// 使用 ref 定義  currentMode 狀態 
const currentMode = ref('three');

import Footer_2 from '@/components/Footer_2.vue';

import StrellarFrontierTitle from '@/components/SFTitle.vue';  // 匯入漸層藍色標題樣式

const productInfo = ref([
  // {id:'1',cardImage: '../src/assets/images/LC_Product_item1.svg',productName:'奢華金杯',price:'599'},
  // {id:'2',cardImage: '../src/assets/images/LC_Product_item2.svg',productName:'賭聖帽T',price:'1099'},
  // {id:'3',cardImage: '../src/assets/images/LC_Product_item3.svg',productName:'暗黑撲克牌組',price:'299'},
  // {id:'4',cardImage: '../src/assets/images/LC_Product_item4.svg',productName:'幸運骰子',price:'99'},
  // {id:'5',cardImage: '../src/assets/images/LC_Product_item5.svg',productName:'必勝籌碼',price:'199'},
  // {id:'6',cardImage: '../src/assets/images/LC_Product_item6.svg',productName:'賭城帆布袋',price:'599'},
  // {id:'7',cardImage: '../src/assets/images/LC_Product_item7.svg',productName:'賭勝yoyo卡',price:'250'},

])

// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(開始)
async function fetchProducts() {
  try {
    // const response = await fetch('${import.meta.env.VITE_API_URL}/ProductData/SF_FetchProducts.php'); // 替換成你實際的 API URL
    const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/SF_FetchProducts.php`); // 替換成你實際的 API URL
    const data = await response.json();
    productInfo.value = data;
  } catch (error) {
    console.error('Error fetching products:', error);
  }
}

onMounted(() => {
  fetchProducts(); // 當頁面加載時撈取資料
});
// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(開始)
</script>

<template>
  <div>
    <Header_0 :mode="currentMode"></Header_0>
  </div>


  <div class="warpper">

    <div class="center">
      <StrellarFrontierTitle h1="精選商品" p="PRODUCTS"></StrellarFrontierTitle>

      <div class="producttitle">
        <div class="arrowleft">
          <font-awesome-icon icon="fa-solid fa-arrow-left-long" />
          <router-link to="/LC_ProductPage">
            <P>人生賭場</P>
          </router-link>
        </div>
        <div class="arrowright">
          <router-link to="/MS_ProductPage">
            <P>心靈光譜</P>
          </router-link>
          <font-awesome-icon icon="fa-solid fa-arrow-right-long" />
        </div>
      </div>
      <!-- 放置一個商品列的外框 -->
      <div class="pagebox">
        <div class="list">
          <div class="pro" v-for="item in productInfo" :key="item.PRODUCT_ID">
            <router-link :to="{ name: 'SF_DetailList', params: { id: item.PRODUCT_ID } }">
              <img :src="item.PRODUCT_IMG" alt="">
        
              <div>
                <p>{{ item.PRODUCT_NAME }}</p>
                <div class="price">
                  <span>NT$ {{ item.PRODUCT_PRICE }}元</span>
                  <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
                </div>
              </div>
            </router-link>
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
@import '@/assets/SASS/basic/_color.scss';

* {
  font-family: "Noto Serif TC";
  color: map-get($colofont_2 , text);
  text-decoration: none;
}

.warpper {
  // max-width: 1440px;
  width: 100%;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding-top: 80px;
  // border: 1px solid red;
  // background:linear-gradient(rgba(5, 5, 5, 0.847), rgba(164, 164, 164, 0));

  background-image: url(../assets/images/STBackground.png);

}



.center {
  // max-width: 1440px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding-top: 20px;

}

// .center h1 {
//   font-size: 38px;
//   font-weight: 700;
//   margin-bottom: 5px;
//   background: -webkit-linear-gradient(90deg, #078FF2 2.12%, #0FF 50.65%, #5BCAE8 93.64%);
//   background-clip: text;
//   -webkit-background-clip: text;
//   color: transparent;

// }


// .center p {
//   font-size: 20px;
//   font-weight: 700;
//   background: -webkit-linear-gradient(90deg, #078FF2 2.12%, #0FF 50.65%, #5BCAE8 93.64%);
//   background-clip: text;
//   -webkit-background-clip: text;
//   color: transparent;
// }



.producttitle {
  max-width: 700px;
  width: 100%;
  font-size: 20px;
  display: flex;
  justify-content: space-between;
  margin-top: 40px;
  margin-bottom: 30px;
  // border: 1px solid red;


}

.producttitle p {
  width: 110px;
  // color: #fff;
  padding: 10px 0px;

}

.producttitle h1 {
  font-size: 48px;

}



.arrowleft {
  // color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-bottom: 1px solid #fff;

}

.arrowright {
  // color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-bottom: 1px solid #fff;
}

//商品外框
.pagebox {
  max-width: 800px;
  width: 90%;
  height: auto;
  // height: 750px;
  overflow: hidden;
  // background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
  border-radius: 20px;
  display: flex;
  flex-direction: column;
  // padding: 70px 80px 100px 80px;
  padding: 3%;
  margin-bottom: 50px;
  // box-shadow: 0px 4px 25px -1px rgba(0, 0, 0, 0.25);
  border: 1px solid #e8e8e8;
  // box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;


}



.pagebox img {
  max-width: 150px;
  height: 150px;
  margin-bottom: 15px;
}

.list {
  display: flex;
  flex-wrap: wrap;
  gap: 26px;


  // display: grid;
  // align-items: start;
  // max-width: 100%;
  // gap: 4%;
  // flex-wrap: wrap;
  // margin-bottom: 20px;
  // padding: 1%;
  // grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  /* 使用 gap 代替 margin-right，確保元素之間的間隔一置 */
  /* 商品換行 */

}

.pro {
  width: calc(25% - 26px); // 使用百分比設置寬度，讓元素在縮小時能換行
  min-width: 160px; // 設置最小寬度，避免過度縮小
  height: 220px;
  margin-bottom: 20px;
  padding: 10px;
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
  border-radius: 10px;
  cursor: pointer;
}

.pro:hover {
  transform: scale(1.1, 1.1);
  /* 往上是負，輕微浮起 */
  box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.5);
  /* 明顯的阴影效果 */
  border-color: rgba(255, 255, 255, 0.5);
  /* 懸停時增加邊框颜色 */

}




.pro p {
  font-weight: normal;
  font-size: 18px;
  // color: #fff;
  text-align: left;
  margin-bottom: 10px;
}



//商品價格
.price {
  // color: #fff;
  font-size: 16px;
  display: flex;
  justify-content: space-between;

}


.shoopingcar:hover{
  color: #C1693B;
}

// RWD

@media(max-width: 920px) {
  .producttitle {
    width: 80%;
  }

  .pagebox {
    padding: 0px;
    height: auto;
  }

}
</style>