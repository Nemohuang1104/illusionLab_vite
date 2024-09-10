<script setup>
import { ref } from 'vue';

// 頁首頁尾
import Header_0 from '@/components/Header_0.vue';
// 使用 ref 定義  currentMode 狀態 
const currentMode = ref('four');

import Footer_03 from '@/components/Footer_03.vue';
  
// 螢幕寬高度
// import { ref, onMounted, onUnmounted } from 'vue';

// const screenWidth = ref(window.innerWidth);
// const screenHeight = ref(window.innerHeight);

// function updateDimensions() {
//   screenWidth.value = window.innerWidth;
//   screenHeight.value = window.innerHeight;
// }

// onMounted(() => {
//   window.addEventListener('resize', updateDimensions);
// });

// onUnmounted(() => {
//   window.removeEventListener('resize', updateDimensions);
// });

</script>

<template>
  <div>
   <Header_0 :mode="currentMode" class="header"></Header_0 >
  </div>

  <!--  螢幕寬度高度-->
  <!-- <div>
    <p>螢幕寬度: {{ screenWidth }}px</p>
    <p>螢幕高度: {{ screenHeight }}px</p>
  </div>
   -->
  <div class="warpper">

    <div class="center">

      <div class="title">
        <h1>周邊商品</h1>
        <p>PRODUCT</p>
      </div>

      <div class="producttitle">
        <div class="arrowleft">
          <font-awesome-icon icon="fa-solid fa-arrow-left-long" class="arrow"/>
          <router-link to="/LC_ProductPage"><P>人生賭場</P></router-link>
        </div>
        <div class="arrowright">
          <router-link to="/SF_ProductPage"><P>星際邊際</P></router-link>
          <font-awesome-icon icon="fa-solid fa-arrow-right-long" class="arrow"/>
        </div>
      </div>
      <!-- 放置一個商品列的外框 -->
      <div class="pagebox">
        <div class="list">
          <div class="pro">
            <router-link><img src="../assets/images/MS_bearnotebook.png" alt=""></router-link>
            <div>
              <p>繪本風格筆記本</p>
              <div class="price">
                <span>NT$ 180</span>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <router-link><img src="../assets/images/MS_littlebag.png" alt=""></router-link>
            <div>
              <p>小女孩帆布袋</p>
              <div class="price">
                <p>NT$ 590</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <router-link><img src="../assets/images/MS_YOYOcard.png" alt=""></router-link>
            <div>
              <p>小蜥蜴悠遊卡</p>
              <div class="price">
                <p>NT$ 300</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <router-link><img src="../assets/images/MS_productphone.jpg" alt=""></router-link>
            <div>
              <p>防摔手機殼</p>
              <div class="price">
                <p>NT$ 1280</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <router-link><img src="../assets/images/MS_productcard.jpg" alt=""></router-link>
            <div>
              <p>繪本風格卡片</p>
              <div class="price">
                <p>NT$ 80</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <img src="../assets/images/MS_productsticker.jpg" alt="">
            <div>
              <p>繪本風貼紙</p>
              <div class="price">
                <p>NT$ 80</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
    <Footer_03></Footer_03>
    </div>
  </div>
</template>



<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');
@import '@/assets/SASS/basic/_color.scss';
* {
    font-family: "Noto Sans TC" ;
    color:map-get($colofont_3 , text);
    text-decoration: none;
}

.warpper {
  max-width: 1440px;
  width: 100%;
  margin: 0 auto;
  // border: 1px solid red;
  // background:linear-gradient(rgba(5, 5, 5, 0.847), rgba(164, 164, 164, 0));
  background-image: url(../assets/images/MS_paperbg.jpg);
  padding-top: 150px;
}

.header{
  position: fixed;
  z-index: 20;
}

.center {
  max-width: 1440px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding-top: 20px;

}

.title{}

.title h1{
  font-size: 36px;
  color: #855F49;
  font-weight: bold;
}

.title p{
  font-size: 20px;
  color: #855F49;
  font-weight: bold;
  margin-top: 8px;
}

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



.arrowleft,.arrowright {
  display: flex;
  justify-content: center;
  align-items: center;
  border-bottom: 2px solid #FB9D3C;
}



.arrowleft p ,.arrowright p{
  color: #FB9D3C;
  font-weight: bold;
}

.arrow{
  color: #FB9D3C;
}

//商品外框
.pagebox {
  width: 63%;
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
  box-shadow: 0px 4px 25px -1px rgba(0, 0, 0, 0.25);
  border: 1px solid #e8e8e8;
}

.pagebox img {
  max-width: 150px;
  margin-bottom: 15px;
  background-size: cover;
  border-radius: 12px;
}

.list {
  display: flex;
  flex-wrap: wrap;
  gap: 2vw;
  /* 使用 gap 代替 margin-right，確保元素之間的間隔一置 */
  /* 商品換行 */
}

.pro {
  // border: 1px solid red;
  width: 160px;
  height: 220px;
  margin-bottom: 20px;
  padding: 10px;
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
  /*浮起來及陰影效果 */
  border-radius: 10px;
  cursor: pointer;
}



.pro p {
  font-weight: normal;
  font-size: 18px;
  // color: #fff;
  text-align: left;
  margin-bottom: 10px;
}



//商品價格
.price{
  // color: #fff;
  font-size: 16px;
  display: flex;
  justify-content: space-between;
}




// RWD

@media(max-width: 920px) {
  .producttitle{
    width: 80%;
  }
  .pagebox {
        padding: 0px;
        height: auto;
    }
 
}

</style>