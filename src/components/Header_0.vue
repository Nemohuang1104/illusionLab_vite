<script setup>
import { computed, defineProps, ref, onMounted, onUnmounted, inject } from 'vue';
import { useRouter } from 'vue-router';


// import { inject } from 'vue';
// const cartCount = inject('cartCount'); // 接收全局的購物車數量



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
  'four': '/mindspectrum',
};

const logoLink = computed(() => {
  return logoLinkMap[props.mode] || logoLinkMap['one'];
});


// 控制菜單顯示狀態
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

// ========================添加是否登入的狀態判斷=======================

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





// 注入 cartItemCount
const cartItemCount = inject('cartItemCount');


const isClicked = ref(false);

function handleClick() {
  isClicked.value = !isClicked.value; // 切換點擊狀態
}
</script>

<template>
  <header :class="headerClass">
    <div class="logo">
      <router-link :to="logoLink"><img :src="logoSrc" alt="Logo" class="logo" /></router-link>
    </div>
    <div class="icons">
      <router-link :to="{ name: 'shop' }" @click="handleClick">
        <font-awesome-icon icon="fa-solid fa-cart-shopping" class="shoppingicon" />
        <span class="cart-count" :class="{ clicked: isClicked }">{{ cartItemCount }}</span> <!-- 顯示購物車商品數量 -->
      </router-link>
      <!-- <router-link :to="{ name: 'login' }"><font-awesome-icon icon="fa-regular fa-face-smile" class="peopleicon" 
        /></router-link> -->
      <!-- ===========================添加是否登入的狀態判斷======================== -->
      <font-awesome-icon :icon="isLoggedIn ? 'fa-regular fa-address-card' : 'fa-regular fa-circle-user'"
        class="peopleicon" @click="handleAvatarClick" />
      <!-- ========================================================================= -->


      <font-awesome-icon icon="fa-solid fa-bars" class="hamburger" @click="toggleMenu" />
    </div>
    <!-- 半圓形菜單 -->
    <div class="MenuClass" :class="['menu-' + props.mode, { 'menu-open': isMenuOpen }]">
      <ul class="menu">
        <li class="one">
          <router-link :to="{ name: 'login' }">會員登入</router-link>
        </li>
        <li class="two">
          <router-link :to="{ name: 'shop' }">購物車</router-link>
          <span class="cart-count2" :class="{ clicked: isClicked }">{{ cartItemCount }}</span> <!-- 顯示購物車商品數量 -->
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
  width: 100%;

  height: 80px;
  position: fixed;

  z-index: 1000;
}


.logo img {
  width: 145px;
  flex-shrink: 0;
  cursor: pointer;
}

//右側ICON
.icons {
  // display: inline-block;
  justify-content: end;
  align-items: center;
  padding: 10px 20px;
  // border: 1px solid red;
  display: flex;
}

.header-cart {
  position: relative;
}

.shoppingicon {
  width: 35px;
  height: 25px;
  color: #fff;
  margin-right: 20px;
}

.cart-count {
  background-color: #FCB600;
  height: 20px;
  width: 20px;
  border-radius: 12px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  right: 70px;
  bottom: 42px;
}

.cart-count.clicked {
  color: black;
  /* 點擊後的顏色 */
}

.cart-count:active,
.cart-count:focus {
  color: black;
  /* 確保點擊時顏色不變 */
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
  // cursor: pointer;
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
  // cursor: pointer;
  font-family: "Noto Serif TC";

}


.menu-two {
  background-color: rgba(217, 217, 217, 0);
}


//活動二星際邊境(three)

.header-three {
  // background-image: url(../assets/images/STBackground.png);
  background: linear-gradient(360deg, #000 26%, #505050 100%);
  height: 80px;
  /* 添加高度 */
  // cursor: pointer;
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
  // cursor: pointer;
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



.cartCount {
  background: #000000;
  color: #ffffff;
  border-radius: 20px;
  position: absolute;
  top: 22px;
  right: 72px;
  display: block;
  width: 17px;
  height: 17px;
  text-align: center;
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

  .cart-count {
    display: none;
  }

  .cart-count2 {
    display: block;
    background-color: #FCB600;
    height: 20px;
    width: 20px;
    border-radius: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 64px;
    left: 115px;
  }

  .cart-count2.clicked {
    color: black;
    /* 點擊後的顏色 */
  }

  .cart-count2:active,
  .cart-count2:focus {
    color: black;
    /* 確保點擊時顏色不變 */
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
