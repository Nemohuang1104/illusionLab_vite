<template>
  <div>
    
        <div class="card-container">
                
          <swiper
          :effect="'coverflow'"
          :grabCursor="true"
          :centeredSlides="true"
          :slidesPerView="'auto'"
          :coverflowEffect="{
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
          }"
          :pagination="true"
          :modules="modules"
          class="mySwiper"
        >

            <swiper-slide>
            <li class="commentCard">
                <div class="img">
                    <div class="commText">
                        <p>「當我穿越在不同星球之間，感受到宇宙的無限和神秘，每一顆星球都充滿了驚喜。彷彿自己真的置身於遙遠的銀河系，不僅拓寬我的視野，也讓我重新審視了人類在宇宙中的位置。」<br> - 2024.02.05 Jason Wu</p>
                    </div>
                </div>
            </li>
            </swiper-slide>
            <swiper-slide>
            <li class="commentCard">
                <div class="img">
                    <div class="commText">
                        <p>「體驗中的外星人元素真的讓人驚喜！設計得栩栩如生的外星生命和他們的傳說讓我感到既神秘又震撼。」<br>— 2024.03.15 Ivy Lin</p>
                    </div>
                </div>
            </li>
            </swiper-slide>
            <swiper-slide>
            <li class="commentCard">
                <div class="img">
                    <div class="commText">
                        <p>「走進宇宙的那一刻，我感受到了從未有過的孤寂和壯麗。無邊無際的星空和沉默的行星讓我深刻地體會到了人類的渺小與宇宙的浩瀚。」<br>— 2024.07.02 Alex</p>
                    </div>
                </div>
            </li>
            </swiper-slide>
            <swiper-slide>
            <li class="commentCard">
                <div class="img">
                    <div class="commText">
                        <p>「這次沉浸式體驗的科技設計讓我大開眼界。從先進的模擬技術到身臨其境的互動，所有細節都做得非常到位。這種未來科技的感受不僅令人興奮，也讓我對科技的未來充滿了期待。」<br>— 2024.07.22 Amy Yu</p>
                    </div>
                </div>
            </li>
            </swiper-slide>
            <swiper-slide>
            <li class="commentCard">
                <div class="img">
                    <div class="commText">
                        <p>「這次的沉浸式體驗簡直是一次超現實的冒險之旅！每一個場景都像是從科幻小說中走出來的，讓我真的成為了一名宇宙探險者。這種奇妙的感覺真的是無法用言語形容。」<br>— 2024.08.14 Albert Lee</p>
                    </div>
                </div>
            </li>
            </swiper-slide>
            <swiper-slide>
            <li class="commentCard">
                <div class="img">
                    <div class="commText">
                        <p>「這次旅程讓我對宇宙和未來有了更多的思考和期待。我體會到了前所未有的寧靜和浩瀚。無論是寬廣的星空還是孤獨的行星，這種沉靜的感受讓我對宇宙有了更深層的理解和尊敬。」<br>— 2024.08.25 Jackson Wang</p>
                    </div>
                </div>
            </li>
            </swiper-slide>
    </swiper>
        </div>
    
  </div>
</template>

<script>
   import { Swiper, SwiperSlide } from 'swiper/vue';

  // Import Swiper styles
  import 'swiper/css';

  import 'swiper/css/effect-coverflow';
  import 'swiper/css/pagination';

  // import './style.css';

  // import required modules
  import { EffectCoverflow, Pagination } from 'swiper/modules';
  export default{
  components: {
      Swiper,
      SwiperSlide,
    },
    setup() {
      return {
        modules: [EffectCoverflow, Pagination],
      };
    },
  };
</script>

<style lang="scss" scoped>

@import '@/assets/SASS/basic/_color.scss';

  .swiper {
    width: 100%;
    padding-top: 80px;
    padding-bottom: 80px;
    --swiper-theme-color:none; //點點
}

  .swiper-slide {
    width: 300px;
    height: 400px;
  }

.commText p{
  background: none;
  color:map-get($colofont_2 , text);
  padding:20px;
  line-height: 1.6;
  text-align: justify;
}


.swiper-slide:nth-child(1) {
  background-image: url(../assets/images/commentBackground2.png);
}

.swiper-slide:nth-child(2) {
  background-image: url(../assets/images/commentBackground.png);

}

.swiper-slide:nth-child(3) {
  background-image: url(../assets/images/commentBackground3.jpg);

}

.swiper-slide:nth-child(4) {
  background-image: url(../assets/images/commentBackground4.png);

}

.swiper-slide:nth-child(5) {
  background-image: url(../assets/images/commentBackground5.png);

}

.swiper-slide:nth-child(6) {
  background-image: url(../assets/images/commentBackground6.png);
}

</style>