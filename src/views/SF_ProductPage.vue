<script setup>
import { ref } from 'vue';

// 頁首頁尾
import Header_0 from '@/components/Header_0.vue';
// 使用 ref 定義  currentMode 狀態 
const currentMode = ref('three');

import Footer_2 from '@/components/Footer_2.vue';

import StrellarFrontierTitle from '@/components/SFTitle.vue';  // 匯入漸層藍色標題樣式
  
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
   <Header_0 :mode="currentMode" ></Header_0 >
  </div>

  <!--  螢幕寬度高度-->
  <!-- <div>
    <p>螢幕寬度: {{ screenWidth }}px</p>
    <p>螢幕高度: {{ screenHeight }}px</p>
  </div>
   -->
  <div class="warpper">

    <div class="center">
      <StrellarFrontierTitle h1="體驗內容" p="ADVENTURES"></StrellarFrontierTitle>

      <div class="producttitle">
        <div class="arrowleft">
          <font-awesome-icon icon="fa-solid fa-arrow-left-long" />
          <router-link to="/lifeCasino"><P>人生賭場</P></router-link>
        </div>
        <div class="arrowright">
          <router-link to="/mindspectrum"><P>心靈光譜</P></router-link>
          <font-awesome-icon icon="fa-solid fa-arrow-right-long" />
        </div>
      </div>
      <!-- 放置一個商品列的外框 -->
      <div class="pagebox">
        <div class="list">
          <div class="pro">
            <router-link><img src="../assets/images/SF_cup.png" alt=""></router-link>
            <div>
              <p>太空鋼杯</p>
              <div class="price">
                <span>NT$ 350元</span>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <router-link><img src="../assets/images/SF_bag.png" alt=""></router-link>
            <div>
              <p>帆布袋</p>
              <div class="price">
                <p>NT$ 660元</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <router-link><img src="../assets/images/SF_easycard_1.png" alt=""></router-link>
            <div>
              <p>悠遊卡</p>
              <div class="price">
                <p>NT$ 200元</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <router-link><img src="../assets/images/SFbook.svg" alt=""></router-link>
            <div>
              <p>筆記本</p>
              <div class="price">
                <p>NT$ 200元</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <router-link><img src="../assets/images/SF_Pillow.png" alt=""></router-link>
            <div>
              <p>抱枕</p>
              <div class="price">
                <p>NT$ 600元</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>

          <div class="pro">
            <img src="../assets/images/productstshirt.png" alt="">
            <div>
              <p>T-shirt</p>
              <div class="price">
                <p>NT$ 880元</p>
                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
    <Footer_2></Footer_2>
    </div>
  </div>
</template>



<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');
@import '@/assets/SASS/basic/_color.scss';
* {
    font-family: "Noto Serif TC" ;
    color:map-get($colofont_2 , text);
    text-decoration: none;
}

.warpper {
  max-width: 1440px;
  width: 100%;
  margin: 0 auto;
  // border: 1px solid red;
  // background:linear-gradient(rgba(5, 5, 5, 0.847), rgba(164, 164, 164, 0));

  background-image: url(../assets/images/STBackground.png);

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
  box-shadow: 0px 4px 25px -1px rgba(0, 0, 0, 0.25);
  border: 1px solid #e8e8e8;
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

.pro:hover {
  transform: scale(1.1,1.1);
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