<script setup>
import Header from '@/components/Header_0.vue';
import Footer_03 from '@/components/Footer_03.vue';
import LC_ProductInfo from './LC_ProductInfo.vue';
import MS_com_title from '@/components/MS/MS_com_title.vue';


import { ref, onMounted } from 'vue'; // 確保有引入 onMounted

const currentMode = ref('four');

const productInfo = ref([
  // {id:'1',cardImage: '../src/assets/images/LC_Product_item1.svg',productName:'奢華金杯',price:'599'},
  // {id:'2',cardImage: '../src/assets/images/LC_Product_item2.svg',productName:'賭聖帽T',price:'1099'},
  // {id:'3',cardImage: '../src/assets/images/LC_Product_item3.svg',productName:'暗黑撲克牌組',price:'299'},
  // {id:'4',cardImage: '../src/assets/images/LC_Product_item4.svg',productName:'幸運骰子',price:'99'},
  // {id:'5',cardImage: '../src/assets/images/LC_Product_item5.svg',productName:'必勝籌碼',price:'199'},
  // {id:'6',cardImage: '../src/assets/images/LC_Product_item6.svg',productName:'賭城帆布袋',price:'599'},
  // {id:'7',cardImage: '../src/assets/images/LC_Product_item7.svg',productName:'賭勝yoyo卡',price:'250'},

])
// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(結束)




// onUnmounted(() => {
//   window.removeEventListener('resize', updateDimensions);
// });
// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(開始)
async function fetchProducts() {
  try {
    const response = await fetch('http://illusionlab.local/public/PDO/ProductData/MS_FetchProducts.php'); // 替換成你實際的 API URL
    const data = await response.json();
    productInfo.value = data;
  } catch (error) {
    console.error('Error fetching products:', error);
  }
}

onMounted(() => {
  fetchProducts(); // 當頁面加載時撈取資料
});

</script>

<template>
  
  
  <div class="warpper">
    <div>
      <Header :mode="currentMode"/> 
    </div>
    
    <div class="center">
      <div class="warp">
      <div class="title">
        <MS_com_title 
            mode="three"  
            mainTitle="精選商品" 
            subTitle="PRODUCT"/>
      </div>   
      <div class="producttitle">
        <div class="arrowlift">
          <font-awesome-icon icon="fa-solid fa-arrow-left-long" />
          <router-link to="/SF_ProductPage"><P class="link">星際邊境</P></router-link>
        </div>
        <div class="arrowright">
          <router-link to="/lifecasino"><P class="link">人生賭場</P></router-link>
          <font-awesome-icon icon="fa-solid fa-arrow-right-long" class="arrow"/>
        </div>
      </div>
      <div class="pagebox">
       
        <div class="list">
          <div  v-for="item in productInfo" class="pro"  :key="item.PRODUCT_ID" >
            <router-link :to="{ name:'MS_ProductList', params: { id: item.PRODUCT_ID } }">
           
              <img :src="item.PRODUCT_IMG" alt="">
              <p>{{ item.PRODUCT_NAME }}</p>
              <div class="text">
                <div class="price">
                  <span>NT$ {{ item.PRODUCT_PRICE }}元</span>
                  <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
                </div>
                <div class="icon"></div>
              </div>
            </router-link>
          </div>
        </div>
      
      </div>
    </div>
  </div>

    <Footer_03></Footer_03>
  </div>
</template>



<style lang="scss" scoped>
@import "../assets/style";

p{
  color: #FB9D3C;


}
.title{
  margin-top: 10px;
  margin: 0 auto;
}

.warpper {
  font-family: "Noto Sans TC";
  // max-width: 1440px;
  width: 100%;
  // height: 100vh;
  margin: 0 auto;
  // border: 1px solid red;
  // background-image: url(../assets/images/SFbg.png);
  // background-color: #1E1E2F;
  background:url(../assets/images/MS_paperbg.jpg);
        // height: 180vh;
  background-size: cover;
  position: relative;
  overflow: hidden;
  z-index: 0;
  background-repeat: no-repeat;
}


.warp{
  position: relative;
  padding: 0 50px;
}

.center {
  background: linear-gradient(147deg, rgba(255, 255, 255, 0.40) 3.26%, rgba(255, 255, 255, 0.20) 97.45%);
  box-shadow: 0px 4px 25px -1px rgba(0, 0, 0, 0.25);
  font-weight: 500;
  max-width: 1440px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding-top: 20px;
  // position: relative;
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

.link {
  width: 110px;
  color: #FB9D3C;
  padding: 10px 0px;
}

.producttitle h1 {
  font-size: 48px;

}

.arrowlift {
  color: #FB9D3C;
  display: flex;
  justify-content: center;
  align-items: center;
  border-bottom: 2px solid #FB9D3C;
}

.arrowright {
  color: #FB9D3C;
  display: flex;
  justify-content: center;
  align-items: center;
  border-bottom: 2px solid #FB9D3C;
}

//商品外框
.pagebox {
  font-family: "Noto Serif SC";
  width: 100%;
  // height: 750px;
  overflow: hidden;
  border-radius: 20px;
  display: flex;
  flex-direction: column;
  padding: 50px ;
  margin-bottom: 50px;
  box-shadow: 0px 4px 25px -1px rgba(0, 0, 0, 0.25);
  // border: 1px solid #fff;
  
}

.list {
  width: 100%;
  display: grid;
  grid-template-rows: 1fr 1fr ;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  // justify-content: center;
  
  gap: 18px;
  /* 使用 gap 代替 margin-right，確保元素之間的間隔一置 */
  /* 商品換行 */
  

}

.pro {
  // border: 1px solid red;
  // max-width: 160px;
  // max-height: 250px;
  // margin-bottom: 20px;
  padding: 10px;
  /*浮起來及陰影效果 */
  border-radius: 10px;
  // display: flex;
  // flex-direction: column;
  // align-items: center; /* 確保內容居中 */
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;

  &:hover {
    transform: translateY(-5px);
    /* 往上是負，輕微浮起 */
    box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.5);
    /* 明顯的阴影效果 */
    border-color: rgba(255, 255, 255, 0.5);
    /* 懸停時增加邊框颜色 */
  }

}



.pro img {
  max-width: 100%;
  max-height: 150px; /* 限制圖片高度 */
  object-fit: contain; /* 保持圖片比例 */
  margin-bottom: 10px;
  cursor: pointer;

    
}



.pro p {
  font-weight: 600;
  font-size: 18px;
  color: #855F49;
  text-align: left;
  margin-bottom: 10px;
}



//商品
.pagebox img {
  object-fit: cover;
  width: 100%;
  border-radius: 12px;
  margin-bottom: 15px;
}

.price span {
  color: #855F49;
  font-size: 16px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
  font-family:Arial, Helvetica, sans-serif;
}
.price{
  display: flex;
  flex-direction: column;
}

.shoopingcar{
  color: #855F49;
  display: block;
  align-self: flex-end;
  transition: .3s;

  &:hover{
    color: map-get($map: $colofont_3, $key: orange);

  }
}

@media screen and (max-width: 430px){

.list{
  grid-template-rows: 1fr 1fr;
  grid-template-columns: 1fr 1fr  ;
}
.pagebox{
  padding: 10px;
  
}
}

</style>