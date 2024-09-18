<script setup>
import Header_CMS from '@/components/Header_CMS.vue';
import NewsPopCMS from '@/components/NewsPopCMS.vue';
import { ref, computed, onMounted } from 'vue';


import axios from 'axios'; // 註解掉 axios 的引入


/* 搜尋資料功能============================*/
const searchQuery = ref('');

const orders = ref([
// {
//     news_id: '1',
//     news_title: '聖誕節雙人同行優惠',
//     news_content: '聖誕節一定要記得耶穌愛你唷!一起來心靈光譜活動，讓耶穌安慰修復你受傷的心吧!雙人同行，限時特價1200元!',
//     post_date: '2024-08-10',
//     news_status: 2,
//     update_date: '2024-08-28',
//     cardimage: ''
//   },
//   {
//     news_id: '2',
//     news_title: '中秋烤肉大作戰',
//     news_content: '今年中秋節不只有烤肉活動，還有月餅DIY體驗，讓你在過節的同時享受美食樂趣!',
//     post_date: '2024-09-01',
//     news_status: 1,
//     update_date: '2024-09-10',
//     cardimage: ''
//   },
//   {
//     news_id: '3',
//     news_title: '新年倒數派對',
//     news_content: '2025年即將來臨，快來參加我們的新年倒數派對，享受音樂、舞蹈和美食的盛宴!',
//     post_date: '2024-12-20',
//     news_status: 2,
//     update_date: '2024-12-25',
//     cardimage: ''
//   },
//   {
//     news_id: '4',
//     news_title: '夏日海灘音樂節',
//     news_content: '迎接炎炎夏日，來參加我們的海灘音樂節，享受陽光、海浪和無盡的音樂!',
//     post_date: '2024-06-15',
//     news_status: 1,
//     update_date: '2024-07-01',
//     cardimage: ''
//   },
//   {
//     news_id: '5',
//     news_title: '春季花卉展覽',
//     news_content: '春暖花開，快來參觀我們的春季花卉展覽，感受大自然的美麗與生機!',
//     post_date: '2024-03-10',
//     news_status: 2,
//     update_date: '2024-03-20',
//     cardimage: ''
//   },
//   {
//     news_id: '6',
//     news_title: '萬聖節南瓜燈籠製作',
//     news_content: '今年萬聖節，不妨來製作屬於自己的南瓜燈籠，為節日增添一份獨特的氛圍!',
//     post_date: '2024-10-10',
//     news_status: 1,
//     update_date: '2024-10-15',
//     cardimage: ''
//   },
//   {
//     news_id: '7',
//     news_title: '情人節特別套餐',
//     news_content: '情人節當天，享受我們為你準備的浪漫套餐，讓你和你的另一半度過一個難忘的夜晚!',
//     post_date: '2024-02-01',
//     news_status: 2,
//     update_date: '2024-02-14',
//     cardimage: ''
//   },
//   {
//     news_id: '8',
//     news_title: '端午節龍舟競賽',
//     news_content: '端午節怎麼能少了龍舟競賽？來參加我們的龍舟競賽活動，為你的隊伍加油打氣!',
//     post_date: '2024-05-05',
//     news_status: 1,
//     update_date: '2024-05-20',
//     cardimage: ''
//   },
//   {
//     news_id: '9',
//     news_title: '感恩節感恩聚餐',
//     news_content: '感恩節是感謝的時刻，來參加我們的感恩聚餐，與家人朋友一同分享美好的時光!',
//     post_date: '2024-11-10',
//     news_status: 2,
//     update_date: '2024-11-15',
//     cardimage: ''
//   },
//   {
//     news_id: '10',
//     news_title: '兒童節親子活動',
//     news_content: '兒童節當天，我們為孩子們準備了一系列有趣的親子活動，讓孩子們玩得開心，家長們也能輕鬆一日!',
//     post_date: '2024-04-01',
//     news_status: 1,
//     update_date: '2024-04-05',
//     cardimage: ''
//   },
//   {
//     news_id: '11',
//     news_title: '母親節康乃馨義賣',
//     news_content: '母親節快到了，快來我們的康乃馨義賣活動，為母親獻上一份最真摯的心意!',
//     post_date: '2024-05-01',
//     news_status: 2,
//     update_date: '2024-05-10',
//     cardimage: ''
//   },
//   {
//     news_id: '12',
//     news_title: '復活節彩蛋尋寶活動',
//     news_content: '復活節來了，參加我們的彩蛋尋寶活動，尋找隱藏的彩蛋，贏取豐富的獎品!',
//     post_date: '2024-03-30',
//     news_status: 1,
//     update_date: '2024-04-01',
//     cardimage: ''
//   }
 
  
  // 更多訂單數據...
]);


// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(開始)
async function get_news() {
  try {
    const response = await fetch('http://illusionlab.local/public/PDO/News/get_news.php'); // 替換成你實際的 API URL
    const data = await response.json();
    orders.value = data;
  } catch (error) {
    console.error('Error fetching products:', error);
  }
}

onMounted(() => {
  get_news(); // 當頁面加載時撈取資料
});



const initialItems = ref([...orders.value]); // 保存初始資料的副本

// 过滤后的数据
const filteredItems = computed(() => {
  if (!searchQuery.value) {
    return orders.value;
  }
  return orders.value.filter(item =>
    item.NEWS_ID.toString().toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    item.NEWS_TITLE.toString().toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});

// 恢復顯示所有資料
const resetSearch = () => {
  searchQuery.value = '';
  get_news(); // 恢復撈取全部資料
  currentPage.value = 1;
};

// 使用 fetch API 搜尋資料庫中的商品
const searchItems = async () => {
  try {
    const response = await fetch('http://illusionlab.local/public/PDO/News/SearchNews.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ query: searchQuery.value }) // 傳送搜尋字串到後端 PHP
    });

    if (!response.ok) {
      throw new Error('搜尋請求失敗');
    }

    const data = await response.json();
    orders.value = data; // 更新 orders 資料
    currentPage.value = 1; // 搜尋後重設為第 1 頁
  } catch (error) {
    console.error('搜尋出錯:', error);
  }
};



// 分頁功能
const itemsPerPage = ref(10);
const currentPage = ref(1);

// 計算總頁數
const totalPages = computed(() => {
  return Math.ceil(filteredItems.value.length / itemsPerPage.value);
});

// 當前頁面的顯示資料
const displayedItems = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage.value;
  const end = start + itemsPerPage.value;
  return filteredItems.value.slice(start, end);
});

// 動態生成頁碼按鈕範圍
const pageRange = computed(() => {
  const rangeSize = 5;
  const start = Math.max(1, currentPage.value - Math.floor(rangeSize / 2));
  const end = Math.min(totalPages.value, start + rangeSize - 1);
  return Array.from({ length: end - start + 1 }, (_, i) => start + i);
});


// 切換頁數
const goToPage = (page) => {
  if (page >= 1 && page <= totalPages.value) {
    currentPage.value = page;
  }
};


/*點擊編輯按鈕彈出編輯內容====================*/
// 0.配置項數據材料
const editOpacity = ref(1)
const dbcheck = ref(false)
const current_edit = ref(null);
const select_number = ref('');

// 是否在新增模式下(開始)======================
const isCreating = ref(false);
// 1.點擊新增按鈕彈出編輯視窗內容(新增產品視窗)
const openAddProduct = () => {
  current_edit.value = null; // 清空當前編輯的索引
  isCreating.value = true;   // 設置為新增模式
  editOpacity.value = 1;     // 顯示彈出視窗
};


const order_list = ref([
  // 這裡可以填入初始的訂單商品列表
  // 例如:
  // [
  //   { product_name: '商品A', quantity: 2, order_detail_price: 456 },
  //   { product_name: '商品B', quantity: 3, order_detail_price: 234 },
  //   { product_name: '商品C', quantity: 4, order_detail_price: 444 }
  // ]
])



// 1.點擊編輯按鈕彈出v-if內容(@click="edit(key)")
const edit = (index) => {
  // 使用 filteredItems 的索引來查找對應的 orders 項目
  const filteredItem = displayedItems.value[index];
  const originalIndex = orders.value.findIndex(item => item.NEWS_ID === filteredItem.NEWS_ID);

  
  if (originalIndex !== -1) {
    current_edit.value = originalIndex;
    editOpacity.value = 1;
    select_number.value = orders.value[originalIndex].NEWS_ID;

  }
};

// 2.當子組件 OrderTicketPopCMS 中的 f_close及f_save 被觸發時，會通過 emit 通知父組件，從而更新父組件中的 editOpacity 值，達到控制彈出視窗顯示或隱藏的效果。
// 2.1 @close-edit事件回調函式
const handleCloseEdit = ({ opacity, edit }) => {
  editOpacity.value = opacity; // 更新 editOpacity 的值
  current_edit.value = edit;   // 更新 current_edit 的值
  isCreating.value = false;    // 結束新增模式
};

// 2.2 @save-edit事件回調函式
const handleSaveEdit = async (updatedOrder) => {
  if (current_edit.value !== null) {
    orders.value[current_edit.value] = updatedOrder;
    initialItems.value = [...orders.value]; // 編輯後更新 initialItems
  }

    // 重新撈取更新後的資料
    await get_news();
// 測試註解
// 測試註解2
  editOpacity.value = 0;
  current_edit.value = null;
  }
  


</script>


<template>
    <div class="info">
        <div class="info-title">
        <div class="code-input">
            <p>消息管理</p>
            <div class="add">
                <button @click="openAddProduct">新增
                  <img src="../assets/images/flat-color-icons_plus.png" alt="">
                </button>  
            </div>
        </div>
        <div class="inner">
            <div class="code-input">
                <div class="fill">
                    <input type="text" placeholder="請輸入文章編號" v-model="searchQuery" />
                    <button @click="searchItems">搜尋</button>  
                    <button @click="resetSearch">顯示全部</button>
                </div>
            </div>
        </div>
        </div>

        <div class="detail">
        <div class="order-summary">
            <div class="order-header">
            <span>文章編號</span>
            <span>上架日期</span>
            <span>標題</span>
            <span>上下架</span>
            <span>最後更新日期</span>
            <span>操作</span>
            </div>
            <hr>

            
            <div v-for="(item, index) in displayedItems" :key="item.id" class="order-text">
            <span>{{ item.NEWS_ID }}</span>
            <span>{{ item.PUBLISH_DATE }}</span>
            <span>{{ item.NEWS_TITLE }}</span>
            <span>{{ item.STATUS }}</span>
            <span>{{ item.EDITOR }}</span>
            <span @click="edit(index)">編輯</span>
            </div>
        </div> 
        </div> 
        
        <div class="pagination">
            <button
            v-for="page in pageRange"
            :key="page"
            @click="goToPage(page)"
            :disabled="page === currentPage"
            :class="{ active: page === currentPage }"
            >
            {{ page }}
            </button>
        </div>
       <!-- 編輯視窗 -->
       <div class="n-order_edit" v-if="current_edit !== null || isCreating" :style="{ opacity: editOpacity }">
            <!-- 0.a  在 template 中使用 @close-edit="handleCloseEdit" 來監聽子組件的關閉按鈕的事件，並在 handleCloseEdit 函式中更新 editOpacity 的值。 -->

            <!-- 0.b  在 template 中使用 @save-edit="handleSaveEdit" 來監聽子組件的儲存按鈕的事件，並在 handleSaveEdit 函式中更新 editOpacity 的值。 -->
              <NewsPopCMS
              :order="isCreating ? {} : orders[current_edit]"
              @close-edit="handleCloseEdit"
              @save-edit="handleSaveEdit"/>
            </div>

            <div id="hide" v-if="current_edit !== null || isCreating"></div>


            <!-- 1.點擊視窗的儲存或關閉按鈕，畫面要隱藏或持續顯示v-if -->
            <!-- <double-check v-if="dbcheck" @save="sss" @cancel="ccc"></double-check> -->
    </div>
</template>

<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');

.info{
  height: 100vh;
}

.detail{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 470px;
    border-radius: 10px;
    padding: 16px;
    padding-left: 20px;
    padding-right: 20px;
    
    background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
    margin-bottom: 20px;
    
}
.info-title{
    width: 100%;
    display: flex;
    justify-content: space-between;

}

.info-title > p{
    font-size: 28px;
    font-weight: 700;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    margin-bottom: 20px;
}

.fill{
    display: flex;
    gap: 8px;
}

// input輸入欄位樣式開始

.fill > input{
    /* border: 1px solid red; */
    width: 80%;
    height: 28px;
    background-color: #F7F7F7;
    border: 1px solid #F7F7F7;
    border-radius: 6px; 
    padding: 0 8px;
    font-size: 16px;
    color: #313131;
    transition: border-color 0.3s ease-in-out;
}

.fill > input:focus {
    border-color: #FCB600;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3); /* 暈染效果 */
    outline: none; /* 移除默認的黑框 */
}

// input輸入欄位樣式結束

// 搜尋按鈕樣式開始

.fill button{
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 140px;
    height: 29.48px;
    line-height: 29.48px;
    border: none;
    background: var(--Color-2, #FCB600);
    border-radius: 6px;
    cursor: pointer;
}

// 搜尋按鈕樣式結束

.code-input{
    display: flex;
    justify-content: space-between;
    gap: 40px;
}
.code-input > p{
    font-size: 28px;
    font-weight: 700;
    line-height: 1.6rem;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    margin-bottom: 20px;
}

.add button{
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 100px;
    height: 29.48px;
    line-height: 29.48px;
    border: none;
    background: var(--Color-2, #FCB600);
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    padding-left: 24px;
}

.add img{
    position: absolute;
    left: 12px;
    top: 4px;
    width: 22px;
    height: 22px;
}

.order-summary{
    width: 100%;
    height: 100%;
}

.order-header {
    display: grid;
    grid-template-columns: 0.8fr 1fr 3fr 1fr 1.2fr 1fr ;
    font-weight: bold;
    color: #313131;
    font-size: 18px;
}

.order-summary > hr{
    height: 3px;
    background-color: #313131;
    border: none;
    border-radius: 2.5px; /* 讓線條變得更加圓潤 */
}

.order-text {
    display: grid;
    grid-template-columns: 0.8fr 1fr 3fr 1fr 1.2fr 1fr ;
    font-weight: normal;
    color: #313131;
    font-size: 18px;
    padding-top: 9px;
    padding-bottom: 9px;
    cursor: default;
    font-family: "Noto Sans TC";
    transition: background-color 0.3s ease, border-radius 0.3s ease;
    gap: 3px;
}
.order-text:hover{
  background-color: #FCB600;
  border-radius: 5px;

}

.order-text span:last-child{
    text-align: center;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    width: 80px;
    height: 22px;
    line-height: 22px;
    border: none;
    background: #22247A;
    border-radius: 12px;
    cursor: pointer;
}

.order-text span.status-normal {
    background: #22247A; /* 正常状态背景色 */
}

.order-text span.status-disabled {
    background: #F44336; /* 停权状态红色背景 */
}


.confirm{
    
    width: 100%;
    display: flex;
    justify-content: right;
    align-items: center;
    margin-top: 20px;
    margin-bottom: 20px;
}

.confirm button{
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    width: 140px;
    height: 28px;
    line-height: 28px;
    border: none;
    background: #22247A;
    border-radius: 12px;
    cursor: pointer;
}

.item-header{
    display: grid;
    grid-template-columns: 2fr 1fr 3fr;
    background-color: #22247A;
    font-weight: bold;
    color: #fff;
    font-size: 18px;
    padding: 10px;
}

.order-item{
    display: grid;
    align-items: center;
    grid-template-columns: 2fr 1fr 3fr;
    font-size: 16px;
    color: #313131;
    font-family: "Noto Sans TC";
    font-weight: 600;
    padding: 10px;
    background: #F7F7F7;
}

.product-info{
    display: flex;
    align-items: center;
    gap: 16px;
}


// 動態分頁按鈕樣式


.pagination {
  display: flex;
  justify-content: right;
}

.pagination button {
  background-color: #FDE7B1; /* 淡黃色背景 */
  border: none;
  padding: 15px 20px;
  margin: 0 5px;
  cursor: pointer;
  border-radius: 50%;
  color: #000; /* 黑色字體 */
  font-size: 16px;
  transition: background-color 0.3s ease;
}

.pagination button.active {
  background-color: #F9A825; /* 深黃色背景 */
  color: #000; /* 黑色字體 */
}

/*編輯視窗*/
// 1.彈出視窗樣式
.n-order_edit{
  width: 800px;
  height: 90%;
  max-height: 1150px;
  border-radius: 10px;
  overflow: hidden;
  position: fixed;
  left: 54%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  z-index: 2;
  // background-color: #ffffff;
  overflow-y: auto;
}

// 2.彈出視窗後，背景加上灰階濾鏡(使用V-if判斷濾鏡顯示狀況)
#hide {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  z-index: 1;
}


</style>