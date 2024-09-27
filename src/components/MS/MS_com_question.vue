<template>
  <div class="wrapper">
    <div class="carousel">
      <div 
        v-for="(emoji, index) in emojis" 
        :key="index" 
        class="carousel__item"
        draggable="false"
        :style="{ animationDelay: `calc(${animationDelayFraction} * ${index})` }"
      >
        <div class="carousel__item-head" draggable="false">
          <font-awesome-icon :icon="emoji[0].split(' ')" />
        </div>
        <div class="carousel__item-body" draggable="false">
          <p class="title">{{ emoji[1] }}</p>
          <p class="text">{{ emoji[2] }}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="warning">週一到週五 10:00 ~ 20:00 會由專人回覆訊息</div>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faFacebook, faLine, faInstagram, faYoutube, faThreads, faBilibili, faTiktok, faXTwitter, faWeibo } from '@fortawesome/free-brands-svg-icons'

library.add(faFacebook, faLine, faInstagram, faYoutube, faThreads, faBilibili, faTiktok, faXTwitter, faWeibo)

export default {
  components: {
    FontAwesomeIcon
  },
  data() {
    return {
      emojis: [
        ["fa-brands fa-facebook", "Facebook", "幻浸實驗室－沉浸式體驗活動"],
        ["fa-brands fa-line", "Line", "@huanjingLN"],
        ["fa-brands fa-instagram", "Instagram", "@huanjingIG"],
        ["fa-brands fa-youtube", "YouTube", "@huanjingYT"],
        ["fa-brands fa-threads", "Threads", "@huanjingTS"],
        ["fa-brands fa-bilibili", "BiliBili", "@huanjingBL"],
        ["fa-brands fa-tiktok", "TikTok", "@huanjingTT"],
        ["fa-brands fa-x-twitter", "X", "@huanjingXX"],
        ["fa-brands fa-weibo", "Weibo", "@huanjingWB"],
      ],
      animationTiming: '27s',
      carouselItems: 9,
      slideChangeTiming: 3, 
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
  @import "../../assets/SASS/component/ms";

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
  height: 40vh;
  margin-top: 80px;
  display: flex;
  justify-content: center;
}

.carousel {
  position: relative;
  display: flex;
  justify-content: center;
}

.carousel__item {
  color: #FFFFFF;
  display: flex;
  align-items: center;
  position: absolute;
  padding: 0 12px;
  opacity: 0;
  filter: drop-shadow(0 2px 2px #555);
  will-change: transform, opacity;
  animation: carousel-animate-vertical 27s linear infinite;
}

.carousel__item-head {
  border-radius: 50%;
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
  user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -webkit-user-drag: none;
}

.carousel__item-body {
  width: 40vw;
  height: 18vh;
  margin-right: 15px;
  background-color: #fff;
  color: #9F7557;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  justify-content: center;


}

.title {
  font-size: 20px !important;
  font-weight: bold;
}

.text{
  font-size: 16px !important;

  /* margin-right: 50px; */
}

@keyframes carousel-animate-vertical {
  0% {
    transform: translateY(100%) scale(0.5);
    opacity: 0;
    visibility: hidden;
  }
  3%,
  11.11% {
    transform: translateY(100%) scale(0.7);
    opacity: 0.4;
    visibility: visible;
  }
  14.11%,
  22.22% {
    transform: translateY(0%) scale(1);
    opacity: 1;
    visibility: visible;
  }
  25.22%,
  33.33% {
    transform: translateY(-100%) scale(0.7);
    opacity: 0.4;
    visibility: visible;
  }
  36.33% {
    transform: translateY(-100%) scale(0.5);
    opacity: 0;
    visibility: hidden;
  }
  100% {
    transform: translateY(-100%) scale(0.5);
    opacity: 0;
    visibility: hidden;
  }
}
.warning{
  text-align: center;
  width: 40vw;
  color: #9F7557;
  position: absolute;
  bottom: 2%;
  font-size: 16px;
  left: calc(50vw - (40vw / 2 ));
  font-weight: bold;
}
  @media screen and (max-width: 820px) {
    .carousel__item-body{
      width: 80vw;
      height: 15vh;
    }
    .wrapper{
      height: 0vh;
    }
    .warning{
      width: 80vw;
      left: 10vw;
    }
  }
</style>
