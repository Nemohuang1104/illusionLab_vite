<template>
  <header :class="headerClass">
    <div class="divnull"></div>
    <div class="logo">
      <!-- 人生賭場 LOGO  @click="handleClick('two')"  -->
      <router-link  to='/LoginCMS'>
        <img :src="logos['two']" :class="['LS', { 'inactive': !isActive('two'), 'active': isActive('two') }]"
          alt="人生賭場" />
      </router-link>

      <!-- 星際邊境 LOGO  @click="handleClick('three')" -->
      <router-link to="/strellarfrontierintro">
        <img :src="logos['three']" :class="['SF', { 'inactive': !isActive('three'), 'active': isActive('three') }]"
          alt="星際邊境" />
      </router-link>

      <!-- 心靈光譜 LOGO  @click="handleClick('four')"-->
      <router-link to="/mindspectrum" >
        <img :src="logos['four']" :class="['LI', { 'inactive': !isActive('four'), 'active': isActive('four') }]"
          alt="心靈光譜" />
      </router-link>
    </div>
    <div class="icons">
      <font-awesome-icon icon="fa-solid fa-cart-shopping" class="shoppingicon" />
      <font-awesome-icon icon="fa-regular fa-face-meh" class="peopleicon" />
    </div>
  </header>
</template>

<script setup>
import { ref, computed } from 'vue';

const logos = {
  'two': new URL('@/assets/images/logo_lifecasino.svg', import.meta.url).href,
  'three': new URL('@/assets/images/logo_StrellarFrontierIntro.svg', import.meta.url).href,
  'four': new URL('@/assets/images/logo_heartlight_1.svg', import.meta.url).href
};

const props = defineProps({
  mode: {
    type: String,
    default: 'three',
    validator: value => ['two', 'three', 'four'].includes(value)
  }
});

const isActive = (logoName) => props.mode === logoName;

const headerClass = computed(() => {
  return `header-${props.mode}`;
});

// 定義 handleClick 函數
const emit = defineEmits(['update:mode']);
const handleClick = (mode) => {
  emit('update:mode', mode);
};
</script>


<style scoped>
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  max-width: 1440px;
  height: 80px;
}

/* 中間三個LOGO配置 */
.logo {
  width: 700px;
  width: calc(100% - 330px);
  /* line-height: 80px; */
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: all 0.3s;
}

/* 預留一個div給他一個寬 */
.divnull {
  width: 130px;

}

/* LOGO設定 */


img {
  width: 145px;
  flex-shrink: 0;
  height: 50px;
  /* padding: 10px 20px; */
  transition: all 0.3s;
  cursor: pointer;
}


.LS {
  width: 135px;
  height: auto;
  flex-shrink: 0;

  /* height: 45px; */
}

.SF {
  width: 150px;
  height: auto;
  flex-shrink: 0;
}

.LI {
  width: 150px;
  height: auto;
  flex-shrink: 0;
}

/* 啟動時會有顏色 */
.active {
  filter: none;
  /* 顯示原本顏色 */
  /* transform: scale(1.1); 放大選中的 LOGO */
}

/* 關閉時顏色會灰色處理 */
.inactive {
  filter: grayscale(100%);
  /* 灰色處理 */
  opacity: 0.5;
  /* 淡化未選中的 LOGO */
}



/* 右側ICON */
.icons {
  display: inline-block;
  justify-content: end;
  align-items: center;
  padding: 10px 20px;
  /* border: 1px solid red; */
}

.shoppingicon {
  width: 35px;
  height: 25px;
  color: #fff;
  margin-right: 20px;
}

.peopleicon {
  width: 35px;
  height: 25px;
  color: #fff;
}



/* //公版及各活動的背景顏色 */

/* //公版(one) */
.header-one {
  background: linear-gradient(180deg, #15104A 26.17%, rgba(42, 36, 106, 0.00) 99.67%);
  height: 80px;
  /* 添加高度 */
}

/* //活動一人生賭場(two) */
.header-two {
  background-color: rgba(217, 217, 217, 0);
  /* 透明度為100% */
  height: 80px;
  /* 添加高度 */
}

/* //活動二星際邊境(three) */

.header-three {
  background: linear-gradient(360deg, #000 26%, #505050 100%);
  height: 80px;
  /* 添加高度 */
}

/* //活動三心靈光譜(four) */
.header-four {
  background-color: #B89977;
  height: 80px;
  /* 添加高度 */
}
</style>
