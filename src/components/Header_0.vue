<template>
  <header :class="headerClass">
    <div class="logo">
    <router-link :to="logoLink">
      <img :src="logoSrc" alt="Logo" class="logo" />
    </router-link>
    </div>
    <div class="icons">
      <font-awesome-icon icon="fa-solid fa-cart-shopping" class="shoppingicon" />
      <font-awesome-icon icon="fa-regular fa-face-meh" class="peopleicon" />
    </div>
  </header>
</template>

<script setup>
import { computed, defineProps } from 'vue';

const props = defineProps({
  mode: {
    type: String,
    default: 'one',
    validator: value => ['one', 'two', 'three', 'four'].includes(value)
  }
});

// 計算動態類名
const headerClass = computed(() => {
  return `header-${props.mode}`; //確保使用反引號來拼接字符串 
});

// 使用 import.meta.url 動態導入資源
const logoMap = {
  'one': new URL('@/assets/images/logo_lab.svg', import.meta.url).href,
  'two': new URL('@/assets/images/logo_lifecasino.svg', import.meta.url).href,
  'three': new URL('@/assets/images/logo_StrellarFrontierIntro.svg', import.meta.url).href,
  'four': new URL('@/assets/images/logo_heartlight_1.svg', import.meta.url).href
};

const logoSrc = computed(() => {
  return logoMap[props.mode] || logoMap['one'];
});


// 根據 mode 設置不同的路由鏈接 //當點擊img時他會導到下面的頁面
const logoLinkMap = {
  'one': '/Home',
  'two': '/lifecasino',
  'three': '/SF_Homepage',
  'four': '/mindspectrum'
};

const logoLink = computed(() => {
  return logoLinkMap[props.mode] || logoLinkMap['one'];
});



</script>

<style lang="scss" scoped>

header{
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  max-width: 1440px;
  height: 80px;
}



.logo img {
  width: 145px;
  flex-shrink: 0;
  padding: 10px 20px;
}


//右側ICON
.icons {
  display: inline-block;
  justify-content: end;
  align-items: center;
  padding: 10px 20px;
  // border: 1px solid red;
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



//公版及各活動的背景顏色

//公版(one)
.header-one {
  background: linear-gradient(180deg, #15104A 26.17%, rgba(42, 36, 106, 0.00) 99.67%);
  height: 80px;/* 添加高度 */
  cursor: pointer;
}

//活動一人生賭場(two)
.header-two {
  background-color: rgba(217,217,217, 0); /* 透明度為100% */
  height: 80px;/* 添加高度 */
  cursor: pointer;
  
}

//活動二星際邊境(three)

.header-three {
  background-image: url(../assets/images/STBackground.png);
  height: 80px;/* 添加高度 */
  cursor: pointer;
  
}

//活動三心靈光譜(four)
.header-four {
  background-color: #B89977;
  height: 80px;/* 添加高度 */
  cursor: pointer;
}
</style>



<!-- 以下是各活動複製過去更改 -->

<!-- <template>
    <div>
    <Header :mode="currentMode"> 
    </div>
</template>
  
<script setup>
const currentMode = ref('');  //公版LOGO 為 one 人生賭場 為 two  星際邊境 為 three 心靈光譜 為 four

</script>
 -->

