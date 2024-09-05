<template>
    <swiper :style="{
        '--swiper-navigation-color': '#fff',
        '--swiper-pagination-color': '#fff',
    }" :spaceBetween="10" :navigation="true" :thumbs="{ swiper: thumbsSwiper }" :modules="modules" class="mySwiper2">
        <swiper-slide><img src="../assets/images/productstshirt.png" /></swiper-slide><swiper-slide><img
                src="../assets/images/productspostcard.png" /></swiper-slide><swiper-slide><img
                src="../assets/images/productspillow 1.png" /></swiper-slide><swiper-slide><img
                src="../assets/images/easycard_1.png" /></swiper-slide><swiper-slide><img
                src="../assets/images/productsbook_2.svg" /></swiper-slide>
    </swiper>
    <swiper @swiper="setThumbsSwiper" :spaceBetween="10" :slidesPerView="4" :freeMode="true" :watchSlidesProgress="true"
        :modules="modules" class="mySwiper">
        <swiper-slide><img src="../assets/images/productstshirt.png" /></swiper-slide><swiper-slide><img
                src="../assets/images/productspostcard.png" /></swiper-slide><swiper-slide><img
                src="../assets/images/productspillow 1.png" /></swiper-slide><swiper-slide><img
                src="../assets/images/easycard_1.png" /></swiper-slide><swiper-slide><img
                src="../assets/images/productsbook_2.svg" /></swiper-slide>
    </swiper>
</template>
<script>
import { ref } from 'vue';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';

import 'swiper/css/free-mode';
import 'swiper/css/navigation';
import 'swiper/css/thumbs';



// import required modules
import { FreeMode, Navigation, Thumbs } from 'swiper/modules';

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        const thumbsSwiper = ref(null);

        const setThumbsSwiper = (swiper) => {
            thumbsSwiper.value = swiper;
        };

        return {
            thumbsSwiper,
            setThumbsSwiper,
            modules: [FreeMode, Navigation, Thumbs],
        };
    },
};
</script>
<style>
.swiper {
    width: 20%;
    height: 20%;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-slide img {
    display: block;
    width: 400px;
    height: 400px;
    /* width: 100%;
    height: 100%; */
    object-fit: cover;
}

body {
    background: #000;
    color: #000;
}

.swiper {
    width: 100%;
    height: 300px;
    margin-left: auto;
    margin-right: auto;
}

.swiper-slide {
    background-size: cover;
    background-position: center;
}

.mySwiper2 {
    height: 30%;
    width: 30%;
}

.mySwiper {
    height: 20%;
    width: 20%;
    box-sizing: border-box;
    padding: 10px 0;
}

.mySwiper .swiper-slide {
    width: 25%;
    height: 100%;
    opacity: 0.4;
}

.mySwiper .swiper-slide-thumb-active {
    opacity: 1;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>