<template>
  <main class="news">
    <Header class="header"></Header>
    <Swiper></Swiper>
    <h2 class="title">最新消息</h2>
    <h3 class="title2">News</h3>
    <ul class="news_lists">
      <li class="news_card" 
          v-for="(card, index) in paginatedCards" 
          :class="{'flip': isEven(index)}" 
          data-aos="fade-up"
          :key="card.NEWS_ID"
          >
        <img :src="getImageUrl(card.NEWS_IMG)" alt="" class="card_image">
        <div class="contain">
          <h2>{{ card.NEWS_TITLE }}</h2>
          <p class="description">{{ card.NEWS_CONTENT }}</p>
          <p class="date">{{ card.UPDATE_DATE }}</p>
          <p class="read" @click="openModal(card)">閱讀全文</p>
        </div>

      </li>
    </ul>

   <!-- 分頁器 -->
   <div class="pagination">
      <button 
        v-for="page in totalPages" 
        :key="page" 
        :class="{ active: page === currentPage }" 
        @click="goToPage(page)"
      >
        {{ page }}
      </button>
  </div>

  <!-- 彈窗 -->
  <div v-if="modalVisible" 
      class="modal-overlay"  
      @click="closeModal"
      >
      <div class="modal-content" @click.stop>
        <h2 class="modal-title">{{ selectedCard.NEWS_TITLE }}</h2>
        <img :src="getImageUrl(selectedCard.NEWS_IMG)" :alt="selectedCard.NEWS_TITLE" class="modal-image" />
        <p class="modal-description">{{ selectedCard.NEWS_CONTENT }}</p>
        <button class="modal-close" @click="closeModal">關閉</button>
      </div>
    </div>
    <Footer/>
  </main>

 
</template>

<script setup>
import Header from '@/components/Header_0.vue';
import Swiper from '../components/NewsSwiper.vue'
import { computed, ref } from 'vue'
import Footer from '@/components/Footer_0.vue';
import { onMounted } from 'vue'
import AOS from 'aos'
import 'aos/dist/aos.css'

// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(開始)
async function get_news() {
  try {
    // const response = await fetch('${import.meta.env.VITE_API_URL}/News/get_news.php'); // 替換成你實際的 API URL
    const response = await fetch(`${import.meta.env.VITE_API_URL}/News/get_news.php`); // 替換成你實際的 API URL
    const data = await response.json();
    cards.value = data;
  } catch (error) {
    console.error('Error fetching news:', error);
  }
}

// 在組件掛載時初始化 AOS
onMounted(() => {
  AOS.init()
  get_news(); // 當頁面加載時撈取資料
})



// ======image========//
// import card1 from '@/assets/images/News_p1.png'
// import card2 from '@/assets/images/News_p2.png'
// import card3 from '@/assets/images/News_p3.png'
// import card4 from '@/assets/images/News_p4.png'
// import card5 from '@/assets/images/News_p5.jpg'
// import card6 from '@/assets/images/News_p5.png'
// import teacher from '@/assets/images/News_teacher.jpg'
// import moon from '@/assets/images/News_moon.jpg'

const isEven = (index) => index % 2 != 0;
const cards = ref([
// {
//     image: moon, 
//     title:" 歡慶中秋！幻浸實驗室 x Lazy Dessert 獨家推出月餅", 
//     description: "今年中秋，我們幻浸實驗室聯手知名甜點品牌 Lazy Dessert，特別打造了一款限量聯名月餅。每一顆月餅不僅延續了傳統美味，更融入了獨特的創新風格。精選高級食材，搭配出新穎的口味組合，讓你在團圓時刻品味到甜美與驚喜的交融。這次聯名產品數量有限，絕對是饋贈親友的最佳選擇。快來與我們一起，感受創新與傳統交織的中秋盛宴！",
//     is_flip: false,
//   },
// {
//     image: teacher, 
//     title:" 感恩教師節：向心靈導師致敬", 
//     description: "在這個特別的日子裡，我們向所有辛勤付出的教師們致以最誠摯的敬意。老師不僅傳授知識，更如同人生的導航者，指引我們走向未來。無論是啟發我們思考的課堂，還是陪伴我們成長的點滴，教師的影響無處不在。在這個教師節，讓我們感謝每一位曾經指引過我們的老師，感恩他們無私的奉獻與愛，讓我們的人生道路更加光明與豐富。祝所有教師節日快樂，您們是我們人生中最珍貴的燈塔！",
//     is_flip: true,
//   },
//   {
//     image: card1, 
//     title:" 最具話題性的沉浸式體驗-心靈光譜，即將至高雄舉辦啦!!", 
//     description: "在這個快節奏的世界中，你是否曾想過停下腳步，重新審視自己的內心？「心靈光譜」將帶領你走進繪本的世界，透過精心設計的燈光效果投影和身歷其境的場景設計，讓你與內心深處的自己對話。",
//     is_flip: false,
//   },
//   {
//     image: card2, 
//     title:" 心靈光譜升級：深度冥想全新體驗", 
//     description: "結合了自然音效、光影藝術與色彩療法，帶來全方位的感官享受。這次更新專注於放鬆心靈，幫助參加者釋放壓力並找回內在平衡。透過色彩引導與光影變化，你將進入一個寧靜而療癒的空間，感受全新的自我探索。這是一次身心靈的全面釋放，讓你從繁忙的生活中抽離，重新找回內在的平和與力量。",
//     is_flip: true,
//   },
//   {
//     image: card3, 
//     title:" 人生賭場全新劇情：角色與命運升級！", 
//     description: "人生賭場迎來全面升級，新增多種角色選擇，讓你能夠化身不同的命運挑戰者。這次更新還加入了全新劇情分支，每個選擇都將改變你的未來，讓每場賭局更具挑戰與不可預測性。無論是高風險的押注，還是謹慎的策略運籌，都將影響你的人生走向。快來體驗這場命運的博弈，看看你是否能在這場人生賭局中脫穎而出！",
//     is_flip: false,
//   },
//   {
//     image: card4, 
//     title:" 星際邊際新發現：探索無限星球！", 
//     description: "全新星球探險線路已正式解鎖！這次的更新讓玩家能夠進一步探索宇宙邊界，挑戰前所未有的太空冒險。無論是神秘的星球遺跡，還是未解的宇宙謎團，這次冒險將帶你進入未知的世界。新的太空裝備與解謎工具也已上線，讓你能夠更深入探索星球的奧秘。準備好你的太空船，邀請好友一同加入這場宇宙之旅，揭開無限可能的星際世界！",
//     is_flip: true,
//   },
//   {
//     image: card5, 
//     title:"人生賭場新挑戰：命運抉擇再升級！", 
//     description: "人生賭場再度更新，為你帶來更加刺激的命運抉擇體驗！這次推出了全新“雙重押注”模式，讓每個決策都充滿更高的風險與回報。玩家將面對多層次的抉擇，每一個選擇都將改變故事的走向，讓你的命運不再是一條直線。除了經典的賭局外，還有全新的心理戰場挑戰，測試你的直覺和智慧。這是一場智慧、運氣與膽量的全面較量，快來見證你是否能在這場人生賭局中取得勝利！",
//     is_flip: false,
//   },
//   {
//     image: card6, 
//     title:"心靈光譜全新療程：探索內在光影的奧秘！", 
//     description: "心靈光譜推出全新「光影冥想」療程，將光影藝術與深度冥想完美結合，帶來全新的心靈療癒體驗。這次更新將引領你進入一個充滿流動光影的空間，透過動態光線的變化，引導你進行內在的探索與反思。療程中特別設計的聲音與視覺效果，旨在幫助你釋放壓力、平衡情緒，並提升自我覺察力。",
//     is_flip: true,
//   },
  
]) 

// 每頁顯示的卡片數量
const itemsPerPage = 5;

// 當前頁碼
const currentPage = ref(1);

// 總頁數，根據卡片數量和每頁顯示的數量計算
const totalPages = computed(() => {
  return Math.ceil(cards.value.length / itemsPerPage);
});

// 計算應該顯示的卡片
const paginatedCards = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  return cards.value.slice(start, end);
});

// 切換頁面
const goToPage = (pageNumber) => {
  currentPage.value = pageNumber;

  window.scrollTo({
    top: 0,  // 頁面的頂部
    behavior: 'smooth'  // 平滑滾動
  });
};


// =============彈窗=================//

// 彈窗狀態和所選卡片
const modalVisible = ref(false);
const selectedCard = ref({});

// 打開彈窗
const openModal = (card) => {
  selectedCard.value = card;
  modalVisible.value = true;
  document.body.style.overflow='hidden'; //打開彈窗背景不能滾動
};

// 關閉彈窗
const closeModal = () => {
  modalVisible.value = false;
  document.body.style.overflow=''; //關閉彈窗背景恢復滾動
};

const baseUrl = import.meta.env.VITE_IMAGE_URL; // or any other method to get baseUrl


const getImageUrl = (imgPath) => {
  return `${baseUrl === '/' ? '' : baseUrl }${imgPath}`;
};
</script>




<style lang="scss" scoped>
@import "../assets/style";

*{
  box-sizing: border-box;
}


.news{
  background-image: map-get($map: $color_0, $key: bgc_blue);
  color: map-get($map: $colorfont_0, $key: white);
  font-family: map-get($map: $fontStyle, $key: style_1);

  // min-height: 1800px;
  overflow: hidden;
}
.header{
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10;
}

.title{
  font-size: map-get($map: $fontSize, $key: h2);
  font-weight:500;
  text-align: center;
  margin: 50px auto 10px auto;
}

.title2{
  font-size: map-get($map: $fontSize, $key: h3);
  font-weight:500;
  text-align: center;
  margin-top: 10px ;
}

// 翻轉
.flip{
  flex-direction: row-reverse;
}

// ====card========//
.news_card{
  display: flex;
  // border: 2px solid red;
  max-width: 900px;
  margin: 0 auto;
  margin-top: 50px;

  img{
      width: 200px;
      height: 260px;
      object-fit: cover;
      border-radius: 12px;
    }


  .contain{
  // border: 2px solid rgb(9, 255, 0);
  border-bottom: 1px solid white;
  margin: 0 50px;
  margin-bottom: 15px;
  display: flex;
  flex-direction: column;

    h2{
      font-size: map-get($map: $fontSize, $key: h2);
      font-family: map-get($map: $fontStyle, $key: style_1);
      font-weight: 700;
      max-width: 560px;
      line-height: 1.4;
      // padding-top: 50px;
    }
    .description{
      padding-top: 10px;
      line-height: 1.4;
      
      // width: 60%;
      display: -webkit-box;
      overflow: hidden;
      text-overflow: ellipsis;
      -webkit-line-clamp: 2;   // 超過三行時，顯示 ...
      -webkit-box-orient: vertical;
      white-space: normal;
    }

    .read{
      color: map-get($map: $colorfont_0, $key: white);
      background-color: map-get($map: $color_0, $key: btn_orange);
      width: 80px;
      height: 30px;
      border-radius:20px;
      font-size: 12px;
      text-align: center;
      line-height: 30px;
      align-self: end;
      margin-top: 10px;
      margin-right: 5px;
      cursor: pointer;
      transition: .2s linear;

      &:hover{

      background-color: map-get($map: $color_0, $key: dark_blue);
      }
    }
    

  }
  
}

// =====分頁器====//
.pagination {
  display: flex;
  justify-content: center;
  margin-top: 50px;
  margin-bottom: 100px;
}

.pagination button {
  background-color: rgba(255, 255, 255, 0.5);
  border: none;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  margin: 0 5px;
  cursor: pointer;
  color:white;
}

.pagination button:hover {
  background-color: map-get($map:$color_0 , $key: dark_blue)
}
.pagination button.active{
  background-color: map-get($map:$color_0 , $key: dark_blue)

}

// ===========彈窗==============//

.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 10;
}

.modal-content {
  background-color: map-get($map: $color_0, $key:dark_blue );
  background-image: map-get($map: $color_0, $key:  bgc_white);
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  // max-height: 80vh;
  width: 80%;
}

.modal-title{
  font-size: map-get($map: $fontSize, $key: h2);
  font-family: map-get($map: $fontStyle, $key: style_1);
  font-weight: 900;
  // max-width: 480px;
  line-height: 1.4;
  padding-top: 20px;
  color: map-get($map:$color_0 , $key: dark_blue);
  margin-bottom: 30px;
}

.modal-image {
  max-width:500px;
  width: 100%;
  max-height: 260px;
  width: 100%;
  object-fit: cover;
  border-radius: 12px;
  margin-bottom: 30px;

}

.modal-description{
  max-width: 500px;
  text-align: left;
  margin: 0 auto;
  line-height: 1.4;
  margin-bottom: 15px;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.379);
}

.modal-close{
  color: map-get($map: $colorfont_0, $key: white);
      background-color: map-get($map: $color_0, $key: btn_orange);
      width: 80px;
      height: 30px;
      border-radius:20px;
      font-size: 12px;
      text-align: center;
      line-height: 30px;
      align-self: end;
      margin-top: 10px;
      margin-right: 5px;
      cursor: pointer;
      transition: .2s linear;
      border: none;
      

      &:hover{

      background-color: map-get($map: $color_0, $key: dark_blue);
      }

    }
    .date{
      margin-top: 5px;
      font-size: 12px;
      color: map-get($map:$color_0, $key: btn_page);
    }

    
</style>