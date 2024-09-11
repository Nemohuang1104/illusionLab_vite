<template>

    <!-- <div class="questionLeft">
      常見問題
    </div>
    

    <div class="questionRight">
      票券問題
    </div> -->
  <div class="wrapper">
      <div class="carousel">
        <div 
          v-for="(emoji, index) in emojis" 
          :key="index" 
          class="carousel__item"
          :style="{ animationDelay: `calc(${animationDelayFraction} * ${index - 1})` }"
        >
          <div class="carousel__item-head">
            <i :class="emoji[0]"></i>
          </div>
          <div class="carousel__item-body">
            <p class="title">{{ emoji[1] }}</p>
            <p class="text"> {{ emoji[2] }}</p>
          </div>
        </div>
      </div>
    </div>
  <div class="warning">週一到週五 10:00 ~ 20:00 會由專人回覆訊息</div>
</template>

<script>
export default {
  data() {
    return {
      emojis: [
        ["fa-brands fa-facebook"  , "Facebook"  , "幻浸實驗室－沉浸式體驗活動 "],
        ["fa-brands fa-line"      , "Line"      , "@huanjingLN"],
        ["fa-brands fa-instagram" , "Instagram" , "@huanjingIG"],
        ["fa-brands fa-youtube"   , "YouTube"   , "@huanjingYT"],
        ["fa-brands fa-threads"   , "Threads"   , "@huanjingTS"],
        ["fa-brands fa-bilibili"  , "BiliBili"  , "@huanjingBL"],
        ["fa-brands fa-tiktok"    , "TikTok"    , "@huanjingTT"],
        ["fa-brands fa-x-twitter" , "X"         , "@huanjingXX"],
        ["fa-brands fa-weibo"     , "Weibo"     , "@huanjingWB"],
      ],
      animationTiming: '27s',
      carouselItems: 9,
      slideChangeTiming: 3, // percentage of total animation cycle
    };
  },
  computed: {
    animationDelayFraction() {
      return `calc(${this.animationTiming} / ${this.carouselItems})`;
    },
    animationStepsFraction() {
      return 100 / this.carouselItems;
    },
  },
};
</script>

<style lang="scss" scoped >
*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  font-family: 'Noto Sans TC', sans-serif;
  font-weight: 400;
}

.wrapper {
  /* background: linear-gradient(60deg, #420285, #08BDBD); */
  /* height: 100%; */
  height: 40vh;
  margin-top: 80px;
  /* width: 100%; */
  display: flex;
  justify-content: center;
}

.carousel {
  position: relative;
  /* width: 100%; */
  /* max-width: 500px; */
  display: flex;
  justify-content: center;
  /* flex-direction: column; */
}

.carousel__item {
  /* -----------------------------------改這裡------------------------------------- */
  color: #FFFFFF;
  display: flex;
  align-items: center;
  position: absolute;
  /* width: 100%; */
  padding: 0 12px;
  opacity: 0;
  filter: drop-shadow(0 2px 2px #555);
  will-change: transform, opacity;
  animation: carousel-animate-vertical 27s linear infinite;
}

.carousel__item-head {
  border-radius: 50%;
  /* -----------------------------------改這裡------------------------------------- */
  background-color: #9F7557;
  width: 80px;
  height: 80px;
  padding: 14px;
  position: relative;
  margin-right: -45px;
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 50px;
}

.carousel__item-body {
  width: 40vw;
  height: 18vh;
  margin-right: 15px;
  background-color: #fff;
  color: #9F7557;
  border-radius: 8px;
  /* padding: 16px 20px 16px 70px; */
  display: flex;
  flex-direction: column;
  justify-content: center;

}

.title {
  font-size: 20px !important;
  font-weight: bold;
  /* margin-right: 50px; */
}

.text{
  font-size: 16px !important;

  /* margin-right: 50px; */
}

@keyframes carousel-animate-vertical {
  0% {
    transform: translateY(140%) scale(0.5);
    opacity: 0;
    visibility: hidden;
  }
  3%,
  11.11% {
    transform: translateY(140%) scale(0.7);
    opacity: 0.4;
    visibility: visible;
  }
  14.11%,
  22.22% {
    transform: translateY(40%) scale(1);
    opacity: 1;
    visibility: visible;
  }
  25.22%,
  33.33% {
    transform: translateY(-60%) scale(0.7);
    opacity: 0.4;
    visibility: visible;
  }
  36.33% {
    transform: translateY(-60%) scale(0.5);
    opacity: 0;
    visibility: hidden;
  }
  100% {
    transform: translateY(-60%) scale(0.5);
    opacity: 0;
    visibility: hidden;
  }
}
.warning{
  width: 40vw;
  color: #9F7557;
  position: absolute;
  bottom: 2%;
  font-size: 16px;
  left: calc(50vw - (40vw / 2 ));
  font-weight: bold;
}
// .questionTop{
//   position: relative;

// }
// .questionLeft{
//   position: absolute;
//   top: 50%;
// }
// .questionRight{
//   position: absolute;
//   top: 50%;
// }
</style>
