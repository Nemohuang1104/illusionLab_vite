<script setup>
import { ref } from 'vue';
import Header_2 from '@/components/Header_2.vue';
import Footer_2 from '@/components/Footer_2.vue';



</script>

<template>
  <div>
    <Header_2></Header_2>
  </div>
  <div class="warpper">
    
    <div class="center">
      <h1>精選商品</h1>
      <p>PRODUCTS</p>
      <div class="producttitle">
        <div class="arrowlift">
          <font-awesome-icon icon="fa-solid fa-arrow-left-long" />
          <P>人生賭場</P>
        </div>
        <div class="arrowright">
          <P>心靈光譜</P>
          <font-awesome-icon icon="fa-solid fa-arrow-right-long" />
        </div>
      </div>
      <div class="pagebox">
        <!-- 放置一個商品列的外框 -->
        <div class="list">
          <div class="pro">
            <a href="">
              <img src="../assets/images/productscup.png" alt="">
              <p>太空鋼杯</p>
              <div class="text">
                <div class="price">
                  <span>NT$ 350元</span>
                </div>
                <div class="icon"></div>
              </div>
            </a>
          </div>

          <div class="pro">
            <a href="">
              <img src="../assets/images/productspillow 1.png" alt="">
              <p>造型抱枕</p>
              <div class="text">
                <div class="price">
                  <span>NT$ 500元</span>
                </div>
                <div class="icon"></div>
              </div>
            </a>
          </div>
          <div class="pro">
            <a href="">
              <img src="../assets/images/productstshirt.png" alt="">
              <p>限定 T-shirt</p>
              <div class="text">
                <div class="price">
                  <span>NT$ 800元</span>
                </div>
                <div class="icon"></div>
              </div>
            </a>
          </div>

          <div class="pro">
            <a href="">
              <img src="../assets/images/productsbook_2.png" alt="">
              <p>太空系列筆記本</p>
              <div class="text">
                <div class="price">
                  <span>NT$ 450元</span>
                </div>
                <div class="icon"></div>
              </div>
            </a>
          </div>
          <div class="pro">
            <a href="">
              <img src="../assets/images/productsbag.png" alt="">
              <p>帆布袋</p>
              <div class="text">
                <div class="price">
                  <span>NT$ 660元</span>
                </div>
                <div class="icon"></div>
              </div>
            </a>
          </div>
          <div class="pro">
            <a href="">
              <img src="../assets/images/easycard.png" alt="">
              <p class="easycard">星際邊際悠遊卡</p>
              <div class="text">
                <div class="price">
                  <span>NT$ 200元</span>
                </div>
                <div class="icon"></div>
              </div>
            </a>
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
.warpper {
  font-family: "Noto Serif SC";
  max-width: 1440px;
  width: 100%;

  margin: 0 auto;
  // border: 1px solid red;
  background:linear-gradient(rgba(5, 5, 5, 0.847), rgba(164, 164, 164, 0)) ,
    url(../assets/images/STBackground.png);


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

.center h1 {
  font-size: 40px;
  font-weight: 700;
  margin-bottom: 5px;

  background: -webkit-linear-gradient(90deg, #078FF2 2.12%, #0FF 50.65%, #5BCAE8 93.64%);
  background-clip: text;
  -webkit-background-clip: text;
  color: transparent;

}


.center p {
  font-size: 20px;
  font-weight: 700;
  background: -webkit-linear-gradient(90deg, #078FF2 2.12%, #0FF 50.65%, #5BCAE8 93.64%);
  background-clip: text;
  -webkit-background-clip: text;
  color: transparent;
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
  max-width: 800px;
  width: 90%;
  height: 750px;
  overflow: hidden;
  // background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
  border-radius: 20px;
  display: flex;
  flex-direction: column;
  padding: 70px 80px 100px 80px;
  margin-bottom: 50px;
  box-shadow: 0px 4px 25px -1px rgba(0, 0, 0, 0.25);
  border: 1px solid #f1f1f1;
}

.list {
  width: 80%;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 26px;
  /* 使用 gap 代替 margin-right，確保元素之間的間隔一置 */
  /* 商品換行 */

}

.pro {
  // border: 1px solid red;
  width: 160px;
  height: 250px;
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
  font-weight: normal;
  font-size: 18px;
  color: #fff;
  text-align: left;
  margin-bottom: 10px;
}



//商品
.pagebox img {
  max-width: 150px;
  flex-shrink: 0;
  margin-bottom: 15px;
}

.price span {
  color: #fff;
  font-size: 16px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.easycard{
  
}
</style>