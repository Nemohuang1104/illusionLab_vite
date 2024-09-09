<script setup>
import Header_CMS from '@/components/Header_CMS.vue';
import { ref, computed } from 'vue';

// import axios from 'axios'; // 註解掉 axios 的引入

// 搜尋資料功能
const searchQuery = ref('');
const allItems = ref([
{ id: '1', orderNo: 'TO240821161532', email: 'john@example.com', orderDate: '2024-08-21' },
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
<div class="info">
    <div class="info-title">
        <p>訂單管理</p>
        <div class="sub-tab">
                <RouterLink tag="div" to="/OrderTicketCMS" class="sub-tab-item">票券訂單</RouterLink>
                <RouterLink tag="div" to="/OrderProductCMS" class="sub-tab-item">商品訂單</RouterLink>
        </div>

        <div class="replace">
            <RouterView></RouterView>
            
        </div>

    </div>
        
</div>
</template>

<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');

.info{
  height: 100vh;
}

.info-title{
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

}

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

// 搜尋按鈕樣式結束

.info-title{
    position: relative;
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

.sub-tab{
    // border: 1px solid white;
    width: 100%;
    max-width: 386px;
    display: flex;
    justify-content: space-between;
    z-index: 5;
    
    
}

.sub-tab-item{
    text-decoration: none; /* 移除底線 */
    text-align: center;
    vertical-align: baseline;
    font-size: 18px;
    font-weight: 600;
    color: #505050;
    width: 190px;
    height: 40px;
    line-height: 40px;
    padding: 4px;
    border: none;
    border-radius: 10px 10px 0 0;
    background: var(--Color-3, #FFEDBC);
    cursor: pointer;
}

// .sub-tab-item:first-child{
//     background: var(--Color-3, #FCB600);
//     cursor: pointer;
// }

.router-link-active {
  font-weight: bold ; /* 選中狀態下的樣式 */
  background: #FCB600 ; /* 選中時的文字顏色 */
}


// tab路由替換區(replace)

.replace{
    position: absolute;
    top: 0px;
    left: 0;
    width: 100%;
    z-index: 5;
    position: relative;
}



</style>