

<script setup>
import { computed, defineProps, ref } from 'vue';


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

const MenuClass = computed(() => {
  return `menu-${props.mode}`; //確保使用反引號來拼接字符串 
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


// 控制菜單顯示狀態

import { onMounted, onUnmounted } from 'vue';

const isMenuOpen = ref(false);

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};

const closeMenu = (event) => {
  // 檢查點擊事件是否發生在菜單或漢堡線上
  if (!event.target.closest('.MenuClass') && !event.target.closest('.hamburger')) {
    isMenuOpen.value = false;
  }
};

onMounted(() => {
  // 當組件掛載時添加事件監聽器
  document.addEventListener('click', closeMenu);
});

onUnmounted(() => {
  // 當組件卸載時移除事件監聽器
  document.removeEventListener('click', closeMenu);
});

</script>

<template>
  <header :class="headerClass">
    <div class="logo">
      <router-link :to="logoLink"><img :src="logoSrc" alt="Logo" class="logo" /></router-link>
    </div>
    <div class="icons">
      <router-link :to="{ name: 'shop' }"><font-awesome-icon icon="fa-solid fa-cart-shopping"
          class="shoppingicon" /></router-link>
      <router-link :to="{ name: 'login' }"> <font-awesome-icon icon="fa-regular fa-face-meh"
          class="peopleicon" /></router-link>
      <font-awesome-icon icon="fa-solid fa-bars" class="hamburger" @click="toggleMenu" />
    </div>
    <!-- 半圓形菜單 -->
    <div class="MenuClass" :class="['menu-' + props.mode, { 'menu-open': isMenuOpen }]">
      <ul class="menu">
        <li class="one"> <router-link :to="{ name: 'shop' }">會員登入</router-link>
        </li>
        <li class="two">
          <router-link :to="{ name: 'login' }">購物車</router-link>
        </li>
        <li class="three">
          <router-link to="/lifeCasino">人生賭場</router-link>
        </li>
        <li class="four">
          <router-link to="/SF_Homepage">星際邊境</router-link>
        </li>
        <li class="five">
          <router-link to="/mindspectrum">心靈光譜</router-link>
        </li>
      </ul>
    </div>
  </header>


  <!-- <font-awesome-icon icon="fa-solid fa-bars" /> 這是漢堡線 -->
</template>


<style lang="scss" scoped>
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100vw;

  height: 80px;
  position: absolute;
  z-index: 1000;
}



.logo img {
  height: 60px;
  flex-shrink: 0;
  cursor: pointer;
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
  background: linear-gradient(180deg, #15104A 26.17%, rgba(42, 36, 106, 0) 99.67%);
  height: 80px;
  /* 添加高度 */
  cursor: pointer;
  font-family: "Noto sans TC";
}

.menu-one {
  background: linear-gradient(180deg, #22247A 26.17%, rgba(42, 36, 106, 0.00) 99.67%);
}

//活動一人生賭場(two)
.header-two {
  background-color: rgba(217, 217, 217, 0);
  /* 透明度為100% */
  height: 80px;
  /* 添加高度 */
  cursor: pointer;
  font-family: "Noto Serif TC";

}


.menu-two {
  background-color: rgba(217, 217, 217, 0);
}


//活動二星際邊境(three)

.header-three {
  background-image: url(../assets/images/STBackground.png);
  height: 80px;
  /* 添加高度 */
  cursor: pointer;
  font-family: "Noto Serif TC";
}

.menu-three {
  background-color: #03030171;

}

//活動三心靈光譜(four)
.header-four {
  background-color: #B89977;
  height: 80px;
  /* 添加高度 */
  cursor: pointer;
  font-family: "Noto sans TC";
}

.menu-four {
  background-color: #B89977;
}







/* 漢堡按鈕 */
.hamburger {
  font-size: 35px;
  color: white;
  cursor: pointer;
  display: none;
  /* 在大螢幕上隱藏 */
}


/* 半圓形菜單樣式 */



.MenuClass {
  position: fixed;
  top: 80px;
  right: 0px;
  width: 330px;
  height: 300px;
  // background:linear-gradient(180deg, #22247A 26.17%, rgba(42, 36, 106, 0.00) 99.67%);
  border-radius: 0 0 0 100%;

  transform: translateX(100%);
  transition: transform 0.5s ease;
  z-index: 1000;
  overflow-x: hidden
}

.menu {
  display: flex;
  flex-direction: column;
  text-align: left;
  padding-top: 20px;
}


.menu ul {
  list-style-type: none;
  padding: 0;
}

.menu li {
  margin: 10px 0;
}

.menu a {
  color: white;
  text-decoration: none;
}

.menu .one {
  padding-left: 40px;
}

.menu .two {
  padding-left: 60px;
}

.menu .three {
  padding-left: 75px;
}

.menu .four {
  padding-left: 100px;

}

.menu .five {
  padding-left: 120px;
}

/* 打開菜單時，從右側滑入 */
.menu-open {
  transform: translateX(0);
  /* 滑入畫面 */
}

/* RWD：小螢幕時顯示漢堡按鈕 */
@media (max-width: 768px) {
  .menunone {
    display: block;
  }

  .header-one {
    background-color: #22247A;
  }

  .shoppingicon {
    display: none;
  }

  .peopleicon {
    display: none;
  }

  .hamburger {
    display: block;
  }
}
</style>



<!-- 以下是各活動複製過去更改 -->

<!-- <template>
  //     <div>
  //     <Header :mode="currentMode"> 
  //     </div>
  // </template>
    
  // <script setup>
  // const currentMode = ref('');  //公版LOGO 為 one 人生賭場 為 two  星際邊境 為 three 心靈光譜 為 four
  
  // </script>
 
<script setup>
const currentMode = ref('');  //公版LOGO 為 one 人生賭場 為 two  星際邊境 為 three 心靈光譜 為 four

</script>
 -->
