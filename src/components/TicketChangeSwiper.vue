<template>
  <swiper
    :slidesPerView="3"
    :spaceBetween="10"
    :pagination="{
      clickable: true,
    }"
    :modules="modules"
    :loop="true"
    class="mySwiper"
    :breakpoints="{
          1440:{
            slidesPerView: 5,
          },
          1230:{
            slidesPerView: 5,
          },
          1100: {
            slidesPerView: 4,
          },
          820: {
            slidesPerView: 3,
          },
          500: {
            slidesPerView: 2,
          },
          390:{
            slidesPerView: 1,
          },
          100:{
            slidesPerView: 1,
          }
        }" 
  >
    <swiper-slide>
      <div class="card">
      <div class="Refund">
      <!-- 卡片正面 -->
        <div class="front">
          <h4>體驗當天</h4>
        </div>

        <!-- 卡片背面 -->
        <div class="back">
          <h5>體驗當天<br>
            退票NO !</h5>
          <p>但票卷可轉讓</p>
          <img src="../assets/images/no-bear.png" alt="" class="pic1">
        </div>
      </div>
    </div>
    </swiper-slide>

    <swiper-slide>
      <div class="card">
      <div class="Refund">
      <!-- 卡片正面 -->
        <div class="front">
        <h4>體驗前三天</h4>
        </div>

        <!-- 卡片背面 -->
      <div class="back">
        <h5>體驗前三天<br>
          退票NO !</h5>
        <p>但票卷可轉讓</p>
        <img src="../assets/images/no-rabbit.png" alt="" class="pic2">
      </div>
      </div>
    </div>
    </swiper-slide>

    <swiper-slide>
      <div class="card">
      <div class="Refund">
      <!-- 卡片正面 -->
        <div class="front">
        <h4>體驗前六天</h4>
        </div>

        <!-- 卡片背面 -->
        <div class="back">
          <h5>
            體驗前六天<br>
            可退費50%
          </h5>
          <p>且票卷可轉讓</p>
          <img src="../assets/images/ok-cat.png" alt="" class="pic3">
        </div>
      </div>
    </div>

    </swiper-slide>

    <swiper-slide>
      <div class="card">
      <div class="Refund">
      <!-- 卡片正面 -->
        <div class="front">
        <h4>體驗前九天</h4>
        </div>

        <!-- 卡片背面 -->
        <div class="back">
        <h5>體驗前九天<br>
          可退費90%</h5>
        <p>且票卷可轉讓</p>
        <img src="../assets/images/ok-bear.png" alt="" class="pic4">
        </div>
      </div>
    </div>
    </swiper-slide>

    <swiper-slide>
    <div class="card">
      <div class="Refund">
      <!-- 卡片正面 -->
        <div class="front">
        <h4>訂購完成後</h4>
        </div>

        <!-- 卡片背面 -->
        <div class="back">
          <h5>訂購完成後<br>
            可退票90%</h5>
          <p>且票卷可轉讓</p>
          <img src="../assets/images/ok-rabbit.png" alt=""
          class="pic5">
        </div>
      </div>
    </div>
    </swiper-slide>
  </swiper>
</template>

<script>
  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue';
  import 'swiper/css';
  // Import Swiper styles
  import 'swiper/css/pagination';
  // import required modules
  import { Pagination } from 'swiper/modules';

  export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    setup() {
      return {
        modules: [Pagination],
      };
    },
  };
</script>

<style lang="scss" scoped>
@import "../assets/SASS/basic/color";

.Refund{
  width: 200px;
  height: 300px;
  background-color:map-get($color_3, ticket);
  border-radius: 20px;
  perspective: 1000px;
  position: relative;
  transform-style: preserve-3d;
  transition: transform 1s;
  text-align: center;
}

.card{
  width: 200px;
}

.card:hover>.Refund {
  transform: rotateY(180deg);
}


.Refund .front{
  backface-visibility: hidden;
  position: absolute;
  width: 100%;
  height: 100%;
  margin: 0 auto;
  position: absolute;
  top: 0;
  left: 0;
}

.Refund .front h4{
  font-size: 24px;
  color:map-get($colofont_1, $key: white);
  line-height: 300px;
}


.Refund .back {
  backface-visibility: hidden;
  transform: rotateY(180deg);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  padding-top: 24px;
}

.Refund .back h5{
  font-size: 20px;
  color:map-get($colofont_3,text);
  font-weight: bold;
  text-align: center;
  line-height: 1.1;
}

.Refund .back p{
  font-size: 14px;
  text-align: center;
  color:map-get($colofont_3,text);
}

.Refund .back img{
  width: 150px;
  display: block;
}

.Refund .back .pic1{
  margin: 57px auto 0px;
}

.Refund .back .pic2{
  margin: 14px auto 0px;
}

.Refund .back .pic3{
  margin: 62px auto 0px;
}

.Refund .back .pic4{
  margin: 57px auto 0px;
}

.Refund .back .pic5{
  margin: 15px auto 0px;
}

.swiper {
  width: 86vw;
  height: 100%;
}


.swiper-slide {
  text-align: center;
  width: 100%;
  /* Center slide text vertically */
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 18px;
  text-align: center;
  margin-bottom: 10%;
}

.swiper-slide img {
  display: block;
  object-fit: cover;
}

</style>

<style>
  .swiper-pagination-bullet-active{
  background:#FDC274;
  }
</style>
