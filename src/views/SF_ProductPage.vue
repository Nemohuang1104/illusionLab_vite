<script setup>
import { ref, onMounted } from 'vue';

// 頁首頁尾
import Header_0 from '@/components/Header_0.vue';
// 使用 ref 定義  currentMode 狀態 
const currentMode = ref('three');

import Footer_2 from '@/components/Footer_2.vue';

import StrellarFrontierTitle from '@/components/SFTitle.vue';  // 匯入漸層藍色標題樣式

const productInfo = ref([

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
// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(結束)

const baseUrl = import.meta.env.VITE_IMAGE_URL; // or any other method to get baseUrl


const getImageUrl = (imgPath) => {
  return `${baseUrl === '/' ? '' : baseUrl}${imgPath}`;
};
</script>

<template>
  <div class="warpper">
    <Header_0 :mode="currentMode"></Header_0>

    <div class="center">
      <div class="warp">
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
            <div  v-for="item in productInfo" class="pro" :key="item.PRODUCT_ID">
              <router-link :to="{ name: 'SF_DetailList', params: { id: item.PRODUCT_ID } }">
                <img :src="getImageUrl(item.PRODUCT_IMG)" alt="">
                <div>
                  <p>{{ item.PRODUCT_NAME }}</p>
                  <div class="text">
                  <div class="price">
                    <span>NT$ {{ item.PRODUCT_PRICE }}元</span>
                    <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
                  </div>
                </div>
                </div>
              </router-link>
            </div>
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
  background-image: url(../assets/images/STBackground.png);
  background-size: cover;
  position: relative;
  overflow: hidden;
  z-index: 0;
  background-repeat: no-repeat;
}


.warp {
  position: relative;
  padding: 100px 50px 0;
}


.center {
  // max-width: 1440px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding-top: 20px;
  z-index:0;

}



.producttitle {
  // max-width: 700px;
  width: 100%;
  font-family: "Noto Sans TC";
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
  border-bottom: 2px solid #fff;

}

.arrowright {
  // color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-bottom: 2px solid #fff;
}

//商品外框
.pagebox {
  
  border: 2px solid #e8e8e8;
  border-radius: 20px;
  width: 100%;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  padding: 3vw;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
  margin-bottom: 50px;
}



.pagebox img {
  max-width: 150px;
  height: 150px;
  margin-bottom: 15px;
}

.list {
  width: 100%;
  display: grid;
  grid-template-rows: 1fr 1fr;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  // justify-content: center;
  gap: 3vw;
}

.pro {
  // width: calc(25% - 26px); // 使用百分比設置寬度，讓元素在縮小時能換行
  // min-width: 160px; // 設置最小寬度，避免過度縮小
  // height: 220px;
  // margin-bottom: 20px;
  padding: 10px;
  border-radius: 10px;
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
  cursor: pointer;
}

.pro:hover {
    transform: translateY(-5px);
    /* 往上是負，輕微浮起 */
    box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.5);
    /* 明顯的阴影效果 */
    border-color: rgba(255, 255, 255, 0.5);
    /* 懸停時增加邊框颜色 */

  }

.pro img {
  width: 100%;
  max-width: 150px;
  height: 100%;
  max-height: 150px; /* 限制圖片高度 */
  object-fit: cover; /* 保持圖片比例 */
  margin-bottom: 10px;
  border-radius: 10px;
}





.pro p {
  // font-weight: normal;
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




// .shoopingcar:hover {
//   color: #C1693B;
// }

// RWD

@media(max-width: 920px) {
  // .producttitle {
  //   width: 80%;
  // }

  .pagebox {
    padding: 0px;
    height: auto;
  }

  .list {
    gap: 0px;
  }

}

@media(max-width: 570px) {
  .list {
    grid-template-rows: 1fr 1fr;
    grid-template-columns: 1fr 1fr;
  }

}
</style>