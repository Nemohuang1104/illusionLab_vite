<script setup>
import Header_CMS from '@/components/Header_CMS.vue';
import { ref, computed } from 'vue';

// import axios from 'axios'; // 註解掉 axios 的引入

// 搜尋資料功能
const searchQuery = ref('');
const allItems = ref([
{ id: '1', orderNo: 'TO240821161532', email: 'john@example.com', status: '已送達', orderDate: '2024-08-21' },
  { id: '2', orderNo: 'TO240822161533', email: 'jane@example.com', orderDate: '2024-08-22' },
  { id: '3', orderNo: 'TO240823161534', email: 'alice@example.com', orderDate: '2024-08-23' },
  { id: '4', orderNo: 'TO240824161535', email: 'bob@example.com', orderDate: '2024-08-24' },
  { id: '5', orderNo: 'TO240825161536', email: 'carol@example.com', orderDate: '2024-08-25' },
  { id: '6', orderNo: 'TO240826161537', email: 'dave@example.com', orderDate: '2024-08-26' },
  { id: '7', orderNo: 'TO240827161538', email: 'eve@example.com', orderDate: '2024-08-27' },
  { id: '8', orderNo: 'TO240828161539', email: 'frank@example.com', orderDate: '2024-08-28' },
  { id: '9', orderNo: 'TO240829161540', email: 'grace@example.com', orderDate: '2024-08-29' },
  { id: '10', orderNo: 'TO240830161541', email: 'heidi@example.com', orderDate: '2024-08-30' },
  { id: '11', orderNo: 'TO240831161542', email: 'ivan@example.com', orderDate: '2024-08-31' },
  { id: '12', orderNo: 'TO240901161543', email: 'judy@example.com', orderDate: '2024-09-01' },
  { id: '13', orderNo: 'TO240902161544', email: 'mallory@example.com', orderDate: '2024-09-02' },
  { id: '14', orderNo: 'TO240903161545', email: 'oscar@example.com', orderDate: '2024-09-03' },
  { id: '15', orderNo: 'TO240904161546', email: 'peggy@example.com', orderDate: '2024-09-04' },
  { id: '16', orderNo: 'TO240905161547', email: 'quentin@example.com', orderDate: '2024-09-05' },
  { id: '17', orderNo: 'TO240906161548', email: 'ruth@example.com', orderDate: '2024-09-06' },
  { id: '18', orderNo: 'TO240907161549', email: 'sam@example.com', orderDate: '2024-09-07' },
  { id: '19', orderNo: 'TO240908161550', email: 'trent@example.com', orderDate: '2024-09-08' },
  { id: '20', orderNo: 'TO240909161551', email: 'ursula@example.com', orderDate: '2024-09-09' },
  { id: '21', orderNo: 'TO240910161552', email: 'victor@example.com', orderDate: '2024-09-10' },
  { id: '22', orderNo: 'TO240911161553', email: 'walter@example.com', orderDate: '2024-09-11' },
  { id: '23', orderNo: 'TO240912161554', email: 'xena@example.com', orderDate: '2024-09-12' },
]);

const initialItems = ref([...allItems.value]); // 保存初始資料的副本

// 过滤后的数据
const filteredItems = computed(() => {
  if (!searchQuery.value) {
    return allItems.value;
  }
  return allItems.value.filter(item =>
    item.orderNo.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    item.email.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});

// 恢復顯示所有資料
const resetSearch = () => {
  searchQuery.value = '';
  allItems.value = [...initialItems.value];
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

// 切換會員狀態
const toggleStatus = (item) => {
  const newStatus = item.status === '正常' ? '停權' : '正常';
  item.status = newStatus;

  // 註解掉 AJAX 請求部分
  /*
  axios.post('/api/update-status.php', {
    id: item.id,
    status: newStatus
  })
  .then(response => {
    console.log('狀態更新成功');
  })
  .catch(error => {
    item.status = item.status === '正常' ? '停權' : '正常';
    console.error('更新狀態失敗:', error);
  });
  */
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
</script>

<template>
    <div class="inner">
                <div class="code-input">
                    <div class="fill">
                        <input type="text" placeholder="請輸入訂單編號" v-model="searchQuery" />
                        <button @click="searchItems">搜尋</button>  
                        <button @click="resetSearch">顯示全部</button>
                    </div>
                </div>
            </div>
            
            <div class="detail">
            <div class="order-summary">
                <div class="order-header">
                <span>編號</span>
                <span>訂單編號</span>
                <span>帳號</span>
                <span>訂單狀態</span>
                <span>訂購日期</span>
                <span>操作</span>
                </div>
                <hr>

                
                <div v-for="item in displayedItems" :key="item.id" class="order-text">
                <span>{{ item.id }}</span>
                <span>{{ item.orderNo }}</span>
                <span>{{ item.email }}</span>
                <span>{{ item.status }}</span>
                <span>{{ item.orderDate }}</span>
                <span>編輯</span>
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
</template>



<style lang="scss" scoped>

.code-input{
    display: flex;
    justify-content: right;
}

.fill{
    width: 40%;
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

.code-input{
    margin-bottom: 18px;
}


.detail{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 95.5%;
    height: 440px;
    border-radius: 0 10px 10px 10px;
    padding: 16px;
    padding-left: 20px;
    padding-right: 20px;
    
    background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
    margin-bottom: 20px;
    
}

.order-summary{
    width: 100%;
    height: 100%;
}

.order-header {
    display: grid;
    grid-template-columns: 1fr 2fr 2.5fr 1fr 1.5fr 1fr;
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
    grid-template-columns: 1fr 2fr 2.5fr 1fr 1.5fr 1fr;
    font-weight: normal;
    color: #313131;
    font-size: 18px;
    margin-top: 18px;
    font-family: "Noto Sans TC";
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


</style>