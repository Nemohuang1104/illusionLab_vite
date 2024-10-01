<template>
    <div class="wrapper">
      <div class="background">
      </div>
      <div class="item-bg" ref="itemBg"></div>
  
      <div class="news-slider">
        <div class="news-slider__wrp swiper-wrapper">
          <div
            class="news-slider__item swiper-slide"
            v-for="(news, index) in newsItems"
            :key="index"
          >
           <a :href="news.date" class="news__item">
                <div class="news__img">
                    <img :src="news.image" alt="news" />
                </div>
                <div class="news__title">{{ news.title }}</div>
                <div class="news__txt">{{ news.text }}</div>

            </a>
          </div>
        </div>
        </div>
    </div>
  </template>
  
  <script setup>
  import { onMounted, ref } from 'vue';
  import Swiper from 'swiper';
  import logo1 from '@/assets/images/ms/logo_of_parnter6.png'
  import logo2 from '@/assets/images/ms/logo_of_parnter1.png'
  import logo3 from '@/assets/images/ms/logo_of_parnter2.png'
  import logo4 from '@/assets/images/ms/logo_of_parnter3.png'
  import logo5 from '@/assets/images/ms/logo_of_parnter4.png'
  import logo6 from '@/assets/images/ms/logo_of_parnter5.png'
  import logo7 from '@/assets/images/ms/logo_of_parnter7.png'
  import logo8 from '@/assets/images/ms/logo_of_parnter8.png'
  import logo9 from '@/assets/images/ms/logo_of_parnter10.png'
  import logo10 from '@/assets/images/ms/logo_of_parnter11.png'
  import logo11 from '@/assets/images/ms/logo_of_parnter9.png'
  
  const itemBg = ref(null);
  const prevButton = ref(null);
  const nextButton = ref(null);
  const pagination = ref(null);

  
  const newsItems = ref([
  {
      date: 'https://wennieshe1235.github.io/CORE/',
      month: 'May',
      title: 'CORE',
      text: "熱愛蜆精的中性服飾品牌。",
      image: logo1,
    },
    {
      date: ' https://ting-yuuuu.github.io/La-Vin-En-Rose/',
      month: 'May',
      title: 'La Vie En Rose',
      text: "打Code打到滿手瘀青的網路花店。",
      image: logo2,
    },

    {
      date: 'https://nemohuang1104.github.io/project/',
      month: 'May',
      title: '宅‧抒室',
      text: "熱愛海卻沒賣有關海的香氛蠟燭。",
      image: logo3,
    },
    {
      date: 'https://ping355168.github.io/belleu/',
      month: 'May',
      title: 'BELLEU.',
      text: "聽說加顆鼻屎會看起來比較高級的服飾品牌。",
      image: logo4,
    },
    {
      date: 'https://isnina47.github.io/nina_project/index.html',
      month: 'May',
      title: '屋裡',
      text: "想吃麥當勞但是怕胖的老屋網站。",
      image: logo5,
    },
    {
      date: 'https://17-ching.github.io/cyanLightStudio/',
      month: 'May',
      title: '青芒影像工作室',
      text: "好想吃脆皮烤鴨沾白糖的影像工作室。",
      image: logo6,
    },

    {
      date: 'https://sunknight002.github.io/GameHex/',
      month: 'May',
      title: 'GAME HEX',
      text: "工程師可能都不睡覺的獨立遊戲平台。",
      image: logo7,
    },

    {
      date: 'https://terry60909.github.io/littlEnjoys/',
      month: 'May',
      title: 'LitteEnJoys',
      text: "甜點行銷大師的飲料品牌。",
      image: logo8,
    },

    
    {
      date: 'https://phoebewang04.github.io/project/',
      month: 'May',
      title: '貓奴養成日記',
      text: "喵。",
      image: logo9,
    },
    {
      date: 'https://atlaskuo.github.io/Atlas-Travel/',
      month: 'May',
      title: 'Atlas Travel',
      text: "PM兼工程師兼DBA大哥的旅遊網站。",
      image: logo10,
    },
    {
      date: 'https://yunyylin.github.io/lazydessert/index.html',
      month: 'May',
      title: 'Lazy Dessert',
      text: "製作人全糖的甜點品牌。",
      image: logo11,
    },
  ]);
  
  function updateBackgroundPosition(sliderItem) {
    const rect = sliderItem.getBoundingClientRect();
    itemBg.value.style.width = `${rect.width}px`;
    itemBg.value.style.height = `${rect.height}px`;
    itemBg.value.style.transform = `translateX(${rect.left}px) translateY(230px)`;
  }
  
  onMounted(() => {
    const swiper = new Swiper('.news-slider', {
      effect: 'coverflow',
      grabCursor: true,
      loop: true,
      centeredSlides: true,
      keyboard: true,
      spaceBetween: 0,
      slidesPerView: 'auto',
      speed: 300,
      navigation: {
        nextEl: nextButton.value,
        prevEl: prevButton.value,
      },
      pagination: {
        el: pagination.value,
        clickable: true,
      },
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 3,
        slideShadows: false,
      },
      on: {
        init: function () {
          const activeItem = document.querySelector('.swiper-slide-active .news__item');
          updateBackgroundPosition(activeItem);
          activeItem.classList.add('active');
          itemBg.value.classList.add('active');
        },
        slideChangeTransitionEnd: function () {
          const activeItem = document.querySelector('.swiper-slide-active .news__item');
          updateBackgroundPosition(activeItem);
          activeItem.classList.add('active');
          itemBg.value.classList.add('active');
        },
      },
    });
  
    document.querySelectorAll('.news__item').forEach((element) => {
      element.addEventListener('mouseover', () => {
        updateBackgroundPosition(element);
        itemBg.value.classList.add('active');
        element.classList.add('active');
      });
  
      element.addEventListener('mouseleave', () => {
        itemBg.value.classList.remove('active');
        element.classList.remove('active');
      });
    });
  });
  </script>
  
<style lang="scss" scoped>
h1,h2,h3,h4,h5,h6,p{
  text-align: center;
}
  @import "../../assets/SASS/component/ms";

html {
  position: relative;
  overflow-x: hidden!important;
}

body {
  font-family: 'Noto Sans TC', sans-serif;
}

a, a:hover {
  text-decoration: none;
}

.icon {
  display: inline-block;
  width: 1em;
  height: 1em;
  stroke-width: 0;
  stroke: currentColor;
  fill: currentColor;
}

.background {
  position: fixed;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  pointer-events: none;
  
  &:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    // background-image: linear-gradient(45deg, rgba(209, 0, 42, 0.6) 0%, #0E5DC4 100%);
    opacity: 0.9;
    pointer-events: none;
  }

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    pointer-events: none;
    user-select: none;
  }

}

.item-bg {
  width: 300px;
  height: 500px;
  position: absolute;
  top: 30px;
  background: rgba(255, 255, 255, 0.30);
  border-radius: 10px;
  box-shadow: 0 6px 26px 6px rgba(0,0,0,0.25);
  opacity: 0;
  transition: all .3s;
  left: -30px;
  //left: 50%;
  //transform: translateX(-50%);

  &.active {
    left: 0;
    top: 0;
    opacity: 1;
  background: rgba(255, 255, 255, 0.30);
    background-color: rgba(255, 255, 255, 0.30);
  }

}
.news-slider{
    margin-top: 30px;
}
.news {

  &-slider {
    z-index: 2;
    width: 30vw;
    margin-left: auto;
    margin-right: auto;
    // margin-top: 60px;

    @media screen and (max-width: 1000px) {
    width: 70vw;

    }

    @media screen and (max-width: 576px) {
    //   margin-top: 45px;
    }

    &__wrp {
      display: flex;
      align-items: flex-start;
      position: relative;
      z-index: 2;
    }

    &__item {
      width: 400px;
      flex-shrink: 0;
      // cursor: alias;
      //padding: 15px;

      @media screen and (max-width: 992px) {
        width: 340px;
      }

      &.swiper-slide {
        opacity: 0;
        pointer-events: none;
        transition: all .3s;
      }

      &.swiper-slide-active,
      &.swiper-slide-prev,
      &.swiper-slide-next {
        opacity: 1;
        pointer-events: auto;
      }


    }

    &__ctr {
      position: relative;
      z-index: 12;
    }

    &__arrow {
      background: #fff;
      border: none;
      display: inline-flex;
      width: 50px;
      height: 50px;
      justify-content: center;
      align-items: center;
      box-shadow: 0 6px 26px 6px rgba(0,0,0,0.25);
      border-radius: 50%;
      position: absolute;
      top: 50%;
      z-index: 12;
      cursor:move;
      outline: none!important;

      &:focus {
        outline: none!important;
      }

      .icon-font {
        display: inline-flex;
      }

      &.news-slider-prev {
        left: 15px;
        transform: translateY(-50%);
      }

      &.news-slider-next {
        right: 15px;
        transform: translateY(-50%);
      }

    }

    &__pagination {
      text-align: center;
      margin-top: 50px;

      // @media screen and (max-width: 576px) {
      //   margin-top: 50px;
      // }

      .swiper-pagination-bullet {
        width: 13px;
        height: 10px;
        display: inline-block;
        background: #fff;
        opacity: .2;
        margin: 0 5px;
        border-radius: 20px;
        transition: opacity .5s, background-color .5s, width .5s;
        transition-delay: .5s, .5s, 0s;
      }

      .swiper-pagination-bullet-active {
        opacity: 1;
        background: #ffffff;
        width: 100px;
        transition-delay: 0s;

        @media screen and (max-width: 576px) {
          width: 70px;
        }

      }
    }

  }

  &__item {
    box-sizing: border-box;
    cursor:ew-resize;
    padding: 20px 40px;
    color: #CFBCA2;
    border-radius: 10px;
    display: block;

    // .news-date{
    //     display: none;
    // }
    // .news__txt{
    //     display: block;
    // }

    transition: all .3s;
    @media screen and (min-width: 800px) {
      &:hover {
        color: #855F49;
        transition-delay: .1s;
        background-color: #F6E8DD;
        //background: #fff;
        //box-shadow: 0 6px 26px 6px rgba(0,0,0,0.25);

        .news-date,.news__title,.news__txt {
          font-weight: bold;
          opacity: 1;
          transition-delay: .1s;
        }
        // .news-date{
        // display: block;
        // }
        // .news__txt{
        // display: none;
        // }

        .news__img {
          box-shadow: none;
        }

      }
    }



    &.active {
      color: #9b7657;

      .news-date,.news__title,.news__txt {
        opacity: 1;
      }

      .news__img {
        box-shadow: none;
        // background-color: #AA8765;
      }

    }

    @media screen and (max-width: 992px) {
      padding: 30px;
    }

    @media screen and (max-width: 576px) {
      padding: 20px;
    }

  }

  &-date {
    padding-bottom: 20px;
    margin-bottom: 20px;
    border-bottom: 2px solid;
    display: inline-block;
    opacity: .7;
    transition: opacity .3s;

    @media screen and (max-width: 576px) {
      margin-bottom: 10px;
      display: inline-flex;
      align-items: center;
      padding-bottom: 0;
    }

    &__title {
      display: block;
      font-size: 32px;
      margin-bottom: 10px;
      font-weight: 500;

      @media screen and (max-width: 576px) {
        margin-right: 10px;
      }

    }

    &__txt {
      font-size: 16px;
    }

  }

  &__title {
    font-size: 25px;
    font-weight: 500;
    opacity: .7;
    margin-top: 25px;
    margin-bottom: 15px;
    transition: opacity .3s;

    @media screen and (max-width: 576px) {
      font-size: 22px;
      margin-bottom: 10px;
    }

  }

  &__txt {
    margin: 10px 0;
    line-height: 1.6em;
    font-size: 15px;
    opacity: .7;
    transition: opacity .3s;
  }

  &__img {
    border-radius: 10px;
    box-shadow: 0 6px 26px 6px rgba(0,0,0,0.15);
    height: 200px;
    // margin-top: 30px;
    width: 100%;
    transition: all .3s;
    transform-origin: 0% 0%;

    @media screen and (max-width: 576px) {
      height: 180px;
      margin-top: 20px;
    }

    img {
      max-width: 100%;
      border-radius: 10px;
      height: 100%;
      width: 100%;
    }

  }


}
.news__img{
    background-color: #FFFCF5;
    // box-shadow: none;
}
// .news-date__title,.news-date__txt{
//     color: #855F49;
// }
// .news-date{
//     border-bottom: 2px solid #855F49;
// }
.wrapper{
  // margin-top:40px;
  padding-top: 20px;
}
.news__title, .news__txt{
  text-align: center;
}
@media screen and (max-width:820px) {
    .item-bg.active{
            display: none;
        }
    }
</style>
  