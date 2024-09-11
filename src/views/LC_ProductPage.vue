<script setup>
import Header from '@/components/Header_0.vue';
import Footer_2 from '@/components/Footer_1.vue';
import LC_ProductInfo from './LC_ProductInfo.vue';
import CoinFall2 from '@/components/CoinFall.vue';
import LC_Text2 from '@/components/LC_Text2.vue';
import icon3 from '../assets/images/LC_icon3.svg' 

import { ref } from 'vue';

const currentMode = ref('two');

const productInfo = ref([
  {id:'1',cardImage: '../src/assets/images/LC_Product_item1.svg',productName:'奢華金杯',price:'599'},
  {id:'2',cardImage: '../src/assets/images/LC_Product_item2.svg',productName:'賭聖帽T',price:'1099'},
  {id:'3',cardImage: '../src/assets/images/LC_Product_item3.svg',productName:'暗黑撲克牌組',price:'299'},
  {id:'4',cardImage: '../src/assets/images/LC_Product_item4.svg',productName:'幸運骰子',price:'99'},
  {id:'5',cardImage: '../src/assets/images/LC_Product_item5.svg',productName:'必勝籌碼',price:'199'},
  {id:'6',cardImage: '../src/assets/images/LC_Product_item6.svg',productName:'賭城帆布袋',price:'599'},
  {id:'7',cardImage: '../src/assets/images/LC_Product_item7.svg',productName:'賭勝yoyo卡',price:'250'},

])

function goToLoginCMS(){
  router.push('/LoginCMS');

}




</script>

<template>
  
  
  <div class="warpper">
    <div>
      <Header :mode="currentMode" class="header"/> 
    </div>
    
    <div class="center">
      <div class="warp">
      <LC_Text2 class="title"
            Title1="精選"
            :icon= "icon3"
            Title2="商品"
            English="PRODUCT">
      </LC_Text2>   
      <div class="producttitle">
        <div class="arrowlift">
          <font-awesome-icon icon="fa-solid fa-arrow-left-long" />
          <router-link to="/SF_ProductPage">
          <P @click="goToLoginCMS" class="link">星際邊境</P>
        </router-link>
        </div>
        <div class="arrowright">
          <router-link to="/MS_ProductPage">
          <P class="link">心靈光譜</P>
        </router-link>
          <font-awesome-icon icon="fa-solid fa-arrow-right-long" />
        </div>
      </div>
      <div class="pagebox">
        <!-- 放置一個商品列的外框 -->
         <router-link to="LC_ProductInfo">
        <div class="list">
          <div  v-for="(item,index) in productInfo" class="pro"  :key="item.id" >
           
              <img :src="item.cardImage" alt="">
              <p>{{ item.productName }}</p>
              <div class="text">
                <div class="price">
                  <span>NT$ {{ item.price }}元</span>
                </div>
                <div class="icon"></div>
              </div>
          </div>
        </div>
      </router-link>
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

.header{
  position: unset;
}
.title{
  margin-top: 10px;
  width: 400px;
}

.warpper {
  font-family: "Noto Serif SC";
  // max-width: 1440px;
  width: 100%;
  // height: 100vh;
  margin: 0 auto;
  // border: 1px solid red;
  // background-image: url(../assets/images/SFbg.png);
  // background-color: #1E1E2F;
  background:url(../assets/images/lifecasino_bg1.png);
        // height: 180vh;
  background-size: cover;
  position: relative;
  overflow: hidden;
  z-index: 0;
  background-repeat: no-repeat;

        &::before{
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

}

.coin{
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

    }
    @keyframes opacity{
    0%{
        opacity: 0;
    }
    100%{
        opacity:.5;
    }
  }

.warp{
  position: relative;
  padding: 0 50px;
}

.center {
   color: map-get($colorfont_0, white);
  font-weight: 500;
  font-family: map-get($fontStyle, style_2);
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
  font-family: "Noto Serif SC";
  font-size: 20px;
  display: flex;
  justify-content: space-between;
  margin-top: 40px;
  margin-bottom: 30px;
  // border: 1px solid red;


}

.link {
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
  width: 100%;
  // height: 750px;
  overflow: hidden;
  background: linear-gradient(147deg, #1E1E2F 3.26%, rgba(30, 30, 47, 0.60) 97.45%);
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
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
  /*浮起來及陰影效果 */
  border-radius: 10px;
  // display: flex;
  // flex-direction: column;
  // align-items: center; /* 確保內容居中 */

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
  max-width: 100%;
  max-height: 150px; /* 限制圖片高度 */
  object-fit: contain; /* 保持圖片比例 */
  margin-bottom: 10px;
}



.pro p {
  font-weight: 600;
  font-size: 18px;
  color: #fff;
  text-align: left;
  margin-bottom: 10px;
  font-family: map-get($fontStyle, style_2);
}



//商品
.pagebox img {
  object-fit: cover;
  width: 100%;
  border-radius: 12px;
  margin-bottom: 15px;
}

.price span {
  color: #fff;
  font-size: 16px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
  
  font-family: map-get($fontStyle, style_2);
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