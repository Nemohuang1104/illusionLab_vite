
<template>
  <header :class="headerClass">
    <div class="logo">
      <img :src="logoSrc" alt="Logo" class="logo" />
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
}

//活動一人生賭場(two)
.header-two {
  background-color: rgba(217,217,217, 0); /* 透明度為100% */
  height: 80px;/* 添加高度 */
}

//活動二星際邊境(three)

.header-three {
  background: linear-gradient(360deg, #000 26%, #505050 100%);
  height: 80px;/* 添加高度 */
}

//活動三心靈光譜(four)
.header-four {
  background-color: #B89977;
  height: 80px;/* 添加高度 */
}
</style>


<!-- 以下是各活動複製過去更改
const currentMode = ref('');
填上 各組別的活動編號  -->

<!-- <template>
    <div>
    使用 Header 組件並傳遞 mode 屬性
    
    <Header :mode="currentMode" />
    
    切换活动模式的按钮
    <button @click="switchMode('one')">活动一</button>
    <button @click="switchMode('two')">活动二</button>
    <button @click="switchMode('three')">活动三</button>


    //於頁面顯示當前 mode 值，來確認資料有無錯誤
 <p>目前顯示的活動頁: {{ currentMode }} </p>  
  </div>
</template>
  
<script setup>
import Header from './WeiText.vue'; // 引入 Header 组件
import { ref } from 'vue';
  
// 使用 ref 定義  currentMode 狀態 
const currentMode = ref('');
  
// 切換個活動頁的函式
const switchMode = (mode) => {
  // console.log('切换到模式:', mode); 
  currentMode.value = mode;
};
</script>
 -->

