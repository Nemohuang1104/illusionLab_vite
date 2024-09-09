<script setup>
import Header_CMS from '@/components/Header_CMS.vue';
import { ref, computed } from 'vue';

// import axios from 'axios'; // 註解掉 axios 的引入

// 搜尋資料功能
const searchQuery = ref('');
const allItems = ref([
  { id: 'ILC0001', email: 'anna@example.com', name: 'Anna Smith', phone: '0911222333', status: '正常' },
  { id: 'ILC0002', email: 'john@example.com', name: 'John Doe', phone: '0911111111', status: '停權' },
  { id: 'ILC0003', email: 'jane@example.com', name: 'Jane Roe', phone: '0912333444', status: '正常' },
  { id: 'ILC0004', email: 'mike@example.com', name: 'Mike Johnson', phone: '0922333444', status: '正常' },
  { id: 'ILC0005', email: 'lucy@example.com', name: 'Lucy Brown', phone: '0911000222', status: '停權' },
  { id: 'ILC0006', email: 'maria@example.com', name: 'Maria Garcia', phone: '0933444555', status: '正常' },
  { id: 'ILC0007', email: 'james@example.com', name: 'James Wilson', phone: '0911222000', status: '正常' },
  { id: 'ILC0008', email: 'linda@example.com', name: 'Linda Davis', phone: '0922333555', status: '停權' },
  { id: 'ILC0009', email: 'robert@example.com', name: 'Robert Moore', phone: '0912444555', status: '正常' },
  { id: 'ILC0010', email: 'patricia@example.com', name: 'Patricia Taylor', phone: '0911333444', status: '正常' },
  { id: 'ILC0011', email: 'charles@example.com', name: 'Charles Anderson', phone: '0911222333', status: '正常' },
  { id: 'ILC0012', email: 'barbara@example.com', name: 'Barbara Thomas', phone: '0911555666', status: '停權' },
  { id: 'ILC0013', email: 'michael@example.com', name: 'Michael Jackson', phone: '0911444555', status: '正常' },
  { id: 'ILC0014', email: 'susan@example.com', name: 'Susan Lee', phone: '0911777888', status: '正常' },
  { id: 'ILC0015', email: 'william@example.com', name: 'William Harris', phone: '0922333444', status: '停權' },
  { id: 'ILC0016', email: 'karen@example.com', name: 'Karen Clark', phone: '0911999000', status: '正常' },
  { id: 'ILC0017', email: 'richard@example.com', name: 'Richard Lewis', phone: '0933555666', status: '正常' },
  { id: 'ILC0018', email: 'betty@example.com', name: 'Betty Walker', phone: '0911000333', status: '停權' },
  { id: 'ILC0019', email: 'thomas@example.com', name: 'Thomas Hall', phone: '0911222111', status: '正常' },
  { id: 'ILC0020', email: 'lisa@example.com', name: 'Lisa Allen', phone: '0911222777', status: '正常' },
  { id: 'ILC0021', email: 'donald@example.com', name: 'Donald Young', phone: '0922444666', status: '停權' },
  { id: 'ILC0022', email: 'helen@example.com', name: 'Helen King', phone: '0911444333', status: '正常' },
  { id: 'ILC0023', email: 'steven@example.com', name: 'Steven Wright', phone: '0911555444', status: '正常' },
  { id: 'ILC0024', email: 'doris@example.com', name: 'Doris Green', phone: '0911666777', status: '停權' },
  { id: 'ILC0025', email: 'george@example.com', name: 'George Adams', phone: '0911777888', status: '正常' },
  { id: 'ILC0026', email: 'cynthia@example.com', name: 'Cynthia Baker', phone: '0911888999', status: '正常' },
  { id: 'ILC0027', email: 'mark@example.com', name: 'Mark Campbell', phone: '0911999000', status: '停權' },
  { id: 'ILC0028', email: 'nancy@example.com', name: 'Nancy Carter', phone: '0912000111', status: '正常' },
  { id: 'ILC0029', email: 'paul@example.com', name: 'Paul Parker', phone: '0912111222', status: '正常' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
  { id: 'ILC0030', email: 'mary@example.com', name: 'Mary Evans', phone: '0912222333', status: '停權' },
]);

const initialItems = ref([...allItems.value]); // 保存初始資料的副本

// 过滤后的数据
const filteredItems = computed(() => {
  if (!searchQuery.value) {
    return allItems.value;
  }
  return allItems.value.filter(item =>
    item.id.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    item.name.toLowerCase().includes(searchQuery.value.toLowerCase())
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
            <p>會員管理</p>
            <div class="inner">
              <div class="code-input">
                <div class="fill">
                  <input type="text" placeholder="請輸入會員編號" v-model="searchQuery" />
                  <button @click="searchItems">搜尋</button>  
                  <button @click="resetSearch">顯示全部</button>
                </div>
              </div>
            </div>
          </div>

          <div class="detail">
            <div class="order-summary">
              <div class="order-header">
                <span>編號</span>
                <span>帳號</span>
                <span>姓名</span>
                <span>手機</span>
                <span>帳號狀態</span>
              </div>
              <hr>

              
              <div v-for="item in displayedItems" :key="item.id" class="order-text">
                <span>{{ item.id }}</span>
                <span>{{ item.email }}</span>
                <span>{{ item.name }}</span>
                <span>{{ item.phone }}</span>
                <span  @click="toggleStatus(item)" :class="{'status-normal': item.status === '正常', 'status-disabled': item.status === '停權'}">{{ item.status }}</span>
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

.info-title > p{
    font-size: 28px;
    font-weight: 700;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    margin-bottom: 20px;
}

.order-summary{
    width: 100%;
    height: 100%;
}

.order-header {
    display: grid;
    grid-template-columns: 2fr 3fr 2fr 1.5fr 1fr ;
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
    grid-template-columns: 2fr 3fr 2fr 1.5fr 1fr ;
    font-weight: normal;
    color: #313131;
    font-size: 18px;
    margin-top: 18px;
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
</style>