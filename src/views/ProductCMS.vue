<script setup>
import Header_CMS from '@/components/Header_CMS.vue';
import { ref, computed, onMounted } from 'vue';
import ProductPopCMS from '@/components/ProductPopCMS.vue';

import axios from 'axios'; // 註解掉 axios 的引入

/* 搜尋資料功能============================*/
const searchQuery = ref('');

const orders = ref([
  // {
  //   product_id: '1',
  //   event_name: '心靈光譜',
  //   product_name: '繪本風格帆布袋',
  //   product_status: 2,
  //   product_price: 599,
  //   cardimage: ''
  // },
  // {
  //   product_id: '2',
  //   event_name: '人生賭場',
  //   product_name: '奢華金杯',
  //   product_status: 2,
  //   product_price: 599,
  //   cardimage: ''
  // },
  // {
  //   product_id: '3',
  //   event_name: '星際邊境',
  //   product_name: '太空鋼杯',
  //   product_status: 2,
  //   product_price: 599,
  //   cardimage: ''
  // },
  // {
  //   product_id: '4',
  //   event_name: '人生賭場',
  //   product_name: '賭城帆布袋',
  //   product_status: 2,
  //   product_price: 299,
  //   cardimage: ''
  // },
 
  
  // 更多訂單數據...
]);

// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(開始)
async function fetchProducts() {
  try {
    const response = await fetch('http://illusionlab.local/public/PDO/ProductData/LC_FetchProducts.php'); // 替換成你實際的 API URL
    const data = await response.json();
    orders.value = data;
  } catch (error) {
    console.error('Error fetching products:', error);
  }
}

onMounted(() => {
  fetchProducts(); // 當頁面加載時撈取資料
});

// 在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(結束)



const initialItems = ref([...orders.value]); // 保存初始資料的副本

// 过滤后的数据
const filteredItems = computed(() => {
  if (!searchQuery.value) {
    return orders.value;
  }
  return orders.value.filter(item =>
    item.PRODUCT_ID.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    item.PRODUCT_NAME.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});

// 恢復顯示所有資料
const resetSearch = () => {
  searchQuery.value = '';
  initialItems.value = [...orders.value]; // 更新 initialItems 以包含最新的訂單資料
  orders.value = [...initialItems.value];
  currentPage.value = 1;
};

// 搜尋功能
const searchItems = () => {
  // 若使用 axios 進行搜尋，需恢復以下代碼
  /*
  axios.post('/api/search-members', {
    query: searchQuery.value
  })
  .then(response => {
    allItems.value = response.data;
    currentPage.value = 1;
  })
  .catch(error => {
    console.error('搜尋出錯:', error);
  });
  */
  
  // 直接使用本地資料進行搜尋
  currentPage.value = 1; // 搜尋時重設為第1頁
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


const order_list = ref([
  // 這裡可以填入初始的訂單商品列表
  // 例如:
  // [
  //   { product_name: '商品A', quantity: 2, order_detail_price: 456 },
  //   { product_name: '商品B', quantity: 3, order_detail_price: 234 },
  //   { product_name: '商品C', quantity: 4, order_detail_price: 444 }
  // ]
])

const total_cost = ref(0)
const order_cost = ref(0)

const o_pay = ref('')
const o_form = ref('')
const o_ship = ref('')

// 1.點擊編輯按鈕彈出v-if內容(@click="edit(key)")
const edit = (index) => {
  // 使用 filteredItems 的索引來查找對應的 orders 項目
  const filteredItem = displayedItems.value[index];
  const originalIndex = orders.value.findIndex(item => item.PRODUCT_ID === filteredItem.PRODUCT_ID);

  
  if (originalIndex !== -1) {
    current_edit.value = originalIndex;
    editOpacity.value = 1;
    select_number.value = orders.value[originalIndex].PRODUCT_ID;

  }
};
// 2.當子組件 OrderTicketPopCMS 中的 f_close及f_save 被觸發時，會通過 emit 通知父組件，從而更新父組件中的 editOpacity 值，達到控制彈出視窗顯示或隱藏的效果。
// 2.1 @close-edit事件回調函式
const handleCloseEdit = ({ opacity, edit }) => {
  editOpacity.value = opacity; // 更新 editOpacity 的值
  current_edit.value = edit;   // 更新 current_edit 的值
};

// 2.2 @save-edit事件回調函式(本地資料開發使用)(開始)======
// const handleSaveEdit = async (updatedOrder) => {
//   if (current_edit.value !== null) {
//     orders.value[current_edit.value] = updatedOrder;
//     initialItems.value = [...orders.value]; // 編輯後更新 initialItems
//   }
//   editOpacity.value = 0;
//   current_edit.value = null;
//   }

  // (本地資料開發使用)(結束)================
  

// 2.3 @save-edit事件回調函式(串接資料庫開發使用)(開始)======
  const handleSaveEdit = async (updatedOrder) => {
  if (current_edit.value !== null) {
    orders.value[current_edit.value] = updatedOrder;
    initialItems.value = [...orders.value]; // 編輯後更新 initialItems
  }

  // 重新撈取更新後的資料
  await fetchProducts();
  
  editOpacity.value = 0;
  current_edit.value = null;
};

// (串接資料庫開發使用)(結束)======



</script>

<template>
    <div class="info">
        <div class="info-title">
        <div class="code-input">
            <p>商品管理</p>
            <div class="add">
                <button >新增
                  <img src="../assets/images/flat-color-icons_plus.png" alt="">
                </button>  
            </div>
        </div>
        <div class="inner">
            <div class="code-input">
                <div class="fill">
                    <input type="text" placeholder="請輸入商品編號" v-model="searchQuery" />
                    <button @click="searchItems">搜尋</button>  
                    <button @click="resetSearch">顯示全部</button>
                </div>
            </div>
        </div>
        </div>

        <div class="detail">
        <div class="order-summary">
            <div class="order-header">
            <span>商品編號</span>
            <span>活動類別</span>
            <span>名稱</span>
            <span>價格</span>
            <span>上下架</span>
            <span>操作</span>
            </div>
            <hr>

            
            <div v-for="(item, index) in displayedItems" :key="item.id" class="order-text">
            <span>{{ item.PRODUCT_ID }}</span>
            <span>{{ item.EVENT_ID }}</span>
            <span>{{ item.PRODUCT_NAME }}</span>
            <span>{{ item.PRODUCT_PRICE }}</span>
            <span>{{ item.PRODUCT_STATUS }}</span>
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
        <div class="n-order_edit" v-if="current_edit !== null" :style="{ opacity: editOpacity }">
            <!-- 0.a  在 template 中使用 @close-edit="handleCloseEdit" 來監聽子組件的關閉按鈕的事件，並在 handleCloseEdit 函式中更新 editOpacity 的值。 -->

            <!-- 0.b  在 template 中使用 @save-edit="handleSaveEdit" 來監聽子組件的儲存按鈕的事件，並在 handleSaveEdit 函式中更新 editOpacity 的值。 -->
              <ProductPopCMS
              :order="orders[current_edit]"
              @close-edit="handleCloseEdit"
              @save-edit="handleSaveEdit"/>
            </div>

            <div id="hide" v-if="current_edit !== null"></div>


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
    grid-template-columns: 0.8fr 1.5fr 2fr 1fr 1fr 1fr ;
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
    grid-template-columns: 0.8fr 1.5fr 2fr 1fr 1fr 1fr ;
    font-weight: normal;
    color: #313131;
    font-size: 18px;
    padding-top: 9px;
    padding-bottom: 9px;
    cursor: default;
    font-family: "Noto Sans TC";
    transition: background-color 0.3s ease, border-radius 0.3s ease;
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