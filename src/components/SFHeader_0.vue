<script setup>
import { computed, defineProps, ref } from 'vue';


//宣告每一個連結都有專屬要連結出去的網址
const logos = {
  'two': new URL('@/assets/images/logo_lifecasino.svg', import.meta.url).href,
  'three': new URL('@/assets/images/logo_StrellarFrontierIntro.svg', import.meta.url).href,
  'four': new URL('@/assets/images/logo_heartlight_1.svg', import.meta.url).href
};

//而這些LOGO都有給她專屬的mode 
const props = defineProps({
  mode: {
    type: String,
    default: 'two',
    validator: value => ['two', 'three', 'four'].includes(value)
  }
});


//透過headerClass 的 mode 去決定要切換哪一個活動header
const isActive = (logoName) => props.mode === logoName;

// 計算 headerClass，依據活動來改變樣式
const headerClass = computed(() => {
  return `header-${props.mode}`;
});

// 定義 handleClick 函數
const emit = defineEmits(['update:mode']);
const handleClick = (mode) => {
  emit('update:mode', mode);
};


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






// 控制螢幕寬度的狀態(三個LOGO變一個LOGO的狀態 )
const screenWidth = ref(window.innerWidth);

const updateWidth = () => {
  screenWidth.value = window.innerWidth;
};

onMounted(() => {
  window.addEventListener('resize', updateWidth);
});

onUnmounted(() => {
  window.removeEventListener('resize', updateWidth);
});



//點擊商品時購物車icon會出現增加數字 
import { inject } from 'vue';

const cart = inject('cart');  // 獲取購物車數據
// ========================添加是否登入的狀態判斷=======================
import { useRouter } from 'vue-router';
const router = useRouter();

// 檢查用戶是否已登入
const isLoggedIn = ref(false);

onMounted(() => {
  // 檢查 sessionStorage 中是否存在 token
  const token = sessionStorage.getItem('token');
  isLoggedIn.value = !!token;
});


// 點擊會員圖示時的處理邏輯
const handleAvatarClick = () => {
  if (isLoggedIn.value) {
    // 若已登入，導向會員中心
    router.push('/MemberCenter');
  } else {
    // 未登入，導向登入頁面
    router.push('/Login');
  }
};
</script>

<template>

  <header :class="headerClass">
    <div class="divnull"></div>
    <div class="logo">
      <!-- 人生賭場 LOGO  @click="handleClick('two')"  -->
      <router-link to='/lifeCasino' @click="handleClick('two')" v-show="screenWidth > 768 || isActive('two')">
        <img :src="logos['two']" :class="['LS', { 'inactive': !isActive('two'), 'active': isActive('two') }]"
          alt="人生賭場" />
      </router-link>

      <!-- 星際邊境 LOGO  @click="handleClick('three')" -->
      <router-link to="/SF_Homepage" @click="handleClick('three')" v-show="screenWidth > 768 || isActive('three')">
        <img :src="logos['three']" :class="['SF', { 'inactive': !isActive('three'), 'active': isActive('three') }]"
          alt="星際邊境" />
      </router-link>

      <!-- 心靈光譜 LOGO  @click="handleClick('four')"-->
      <router-link to="/mindspectrum" @click="handleClick('four')" v-show="screenWidth > 768 || isActive('four')">
        <img :src="logos['four']" :class="['LI', { 'inactive': !isActive('four'), 'active': isActive('four') }]"
          alt="心靈光譜" />
      </router-link>

    </div>
    <div class="icons">
      <router-link :to="{ name: 'shop' }"><font-awesome-icon icon="fa-solid fa-cart-shopping"
          class="shoppingicon" /></router-link>
      <!-- <router-link :to="{ name: 'login' }"> <font-awesome-icon icon="fa-regular fa-face-smile"class="peopleicon" /></router-link>
      <font-awesome-icon icon="fa-solid fa-bars" class="hamburger" @click="toggleMenu" /> -->

       <!-- ===========================添加是否登入的狀態判斷======================== -->
       <font-awesome-icon 
        :icon="isLoggedIn ? 'fa-regular fa-address-card' : 'fa-regular fa-circle-user'"
        class="peopleicon" 
        @click="handleAvatarClick"
      />
      <!-- ========================================================================= -->
      <font-awesome-icon icon="fa-solid fa-bars" class="hamburger" @click="toggleMenu" />
    </div>

    <!-- 半圓形菜單 -->
    <div class="MenuClass" :class="['menu-' + props.mode, { 'menu-open': isMenuOpen }]">
      <ul class="menu">
        <li class="one"> <router-link :to="{ name: 'login' }">會員登入</router-link>
        </li>
        <li class="two">
          <router-link :to="{ name: 'shop' }">購物車</router-link>
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
  <!-- <div class="body">

  </div> -->
</template>



<style lang="scss" scoped>
@import "../assets/style";

// .body{
// height: 1000px;
// width: 100%;
// background-color: red;
// }

header {
  position: fixed;
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;

  height: 80px;
  z-index: 10000;

}

/* 中間三個LOGO配置 */
.logo {
  width: 700px;
  width: calc(100% - 260px);
  /* line-height: 80px; */
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: all 0.3s;
  box-sizing: border-box;
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
  padding: 10px 20px;
  transition: all 0.3s;
  cursor: pointer;
}


.LS {
  width: 160px;
  height: auto;
  flex-shrink: 0;

  /* height: 45px; */
}

.SF {
  width: 170px;
  height: auto;
  flex-shrink: 0;
}

.LI {
  width: 160px;
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
  // display: inline-block;
  justify-content: end;
  align-items: center;
  padding: 10px 20px;
  /* border: 1px solid red; */
  cursor: pointer;
  box-sizing: border-box;
  display: flex;
}

.header-cart{
  position: relative;
}

.shoppingicon {
  width: 35px;
  height: 25px;
  color: #fff;
  margin-right: 20px;
}

.cart-count{
  background-color: #FCB600;
  height: 20px;
  width: 20px;
  border-radius: 12px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  right: 15px;
  bottom: 15px;
}

.peopleicon {
  width: 35px;
  height: 25px;
  color: #fff;
}



/* 各活動的背景顏色 */


/* //活動一人生賭場(two) */
.header-two {
  // background-color: rgba(217, 217, 217, 0);
  background: map-get($color_1, product3);
  /* 透明度為100% */
  height: 80px;
  /* 添加高度 */
}

.menu-two {
  background: map-get($color_1, product4);
}

/* //活動二星際邊境(three) */

.header-three {
  background: linear-gradient(360deg, #000 26%, #505050 100%);
  height: 80px;

}

.menu-three {
  background-color: #0303017c;
}

/* //活動三心靈光譜(four) */
.header-four {
  background-color: #B89977;
  height: 80px;
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
  /* position: absolute; */
  top: 80px;
  right: 0px;
  width: 330px;
  height: 300px;

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

.menu-open {
  transform: translateX(0);
  /* 滑入畫面 */
}



/* RWD：小螢幕時顯示漢堡按鈕 */
@media (max-width: 768px) {

  /* for RWD 切LOGO對齊 開始  */
  .divnull {
    width: 70px;
  }

  .logo {
    width: calc(100% - 140px);
    justify-content: center;
  }

  /* for RWD 切LOGO對齊 結束  */

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
