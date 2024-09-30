<script setup>
import Header_CMS from '@/components/Header_CMS.vue';
import { ref, computed, onMounted } from 'vue';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';

// import axios from 'axios'; // 註解掉 axios 的引入

// 搜尋資料功能
const searchQuery = ref('');
const allItems = ref([
  // { id: 'ILC0001', email: 'anna@example.com', name: 'Anna Smith', phone: '0911222333', status: '正常' },
  // { id: 'ILC0002', email: 'john@example.com', name: 'John Doe', phone: '0911111111', status: '停權' },
  // { id: 'ILC0003', email: 'jane@example.com', name: 'Jane Roe', phone: '0912333444', status: '正常' },
  // { id: 'ILC0004', email: 'mike@example.com', name: 'Mike Johnson', phone: '0922333444', status: '正常' },
  // { id: 'ILC0005', email: 'lucy@example.com', name: 'Lucy Brown', phone: '0911000222', status: '停權' },
  // { id: 'ILC0006', email: 'maria@example.com', name: 'Maria Garcia', phone: '0933444555', status: '正常' },
  // { id: 'ILC0007', email: 'james@example.com', name: 'James Wilson', phone: '0911222000', status: '正常' },
  // { id: 'ILC0008', email: 'linda@example.com', name: 'Linda Davis', phone: '0922333555', status: '停權' },
  // { id: 'ILC0009', email: 'robert@example.com', name: 'Robert Moore', phone: '0912444555', status: '正常' },
  // { id: 'ILC0010', email: 'patricia@example.com', name: 'Patricia Taylor', phone: '0911333444', status: '正常' },
  // { id: 'ILC0011', email: 'charles@example.com', name: 'Charles Anderson', phone: '0911222333', status: '正常' },
  
]);

// 在你的 Vue.js 後台管理頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(開始)
async function fetchMembers() {
  try {
    const response = await fetch(`http://illusionlab.local/public/PDO/Login/FetchAllMembers.php`); // 替換成你實際的 API URL
    const data = await response.json();
    allItems.value = data;
  } catch (error) {
    console.error('Error fetching members:', error);
  }
}

onMounted(() => {
  fetchMembers(); // 當頁面加載時撈取資料
});

// 在你的 Vue.js 後台管理頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(結束)


// const initialItems = ref([...allItems.value]); // 保存初始資料的副本

// 过滤后的数据
const filteredItems = computed(() => {
  if (!searchQuery.value) {
    return allItems.value;
  }
  return allItems.value.filter(item =>
    item.USER_CODE.toString().toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    item.EMAIL.toString().toLowerCase().includes(searchQuery.value.toLowerCase())
  );
});



// 恢復顯示所有資料
const resetSearch = () => {
  searchQuery.value = '';
  fetchMembers(); // 恢復撈取全部資料
  currentPage.value = 1;
};

// 使用 fetch API 搜尋資料庫中的會員資料
const searchItems = async () => {
  try {
    const response = await fetch(`http://illusionlab.local/public/PDO/Login/searchMembers.php`, {
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
    console.log('Search Results:', data); // 檢查回傳資料
    allItems.value = data; // 更新 allItems 資料
    currentPage.value = 1; // 搜尋後重設為第 1 頁
  } catch (error) {
    console.error('搜尋出錯:', error);
  }
};



// 切換會員狀態
const toggleStatus = async (item) => {
  const newStatus = item.ACCOUNT_STATUS === '正常' ? '停權' : '正常';

  // 當切換為停權時才顯示 SweetAlert
  if (newStatus === '停權') {
    const result = await Swal.fire({
      position: "center",
      icon: "warning",
      title: "確定將該會員停權嗎?",
      showConfirmButton: true,
      showCancelButton: true,
      confirmButtonText: '確定',
      cancelButtonText: '取消',
      backdrop: false,
            willOpen: () => {
                document.body.style.paddingRight = '0';
              }
    });

    // 如果使用者點擊取消，則終止操作
    if (result.isDismissed) {
      return;
    }
  }

  // 更新會員的狀態
  item.ACCOUNT_STATUS = newStatus;

 

  try {
    const response = await fetch(`http://illusionlab.local/public/PDO/Login/UpdateStatus.php`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        userId: item.USER_ID, // 傳送會員的 USER_ID
        accountStatus: newStatus // 傳送更新後的 ACCOUNT_STATUS
      })
    });

    const data = await response.json();
    if (data.status === 'success') {
      console.log('會員狀態更新成功');
    } else {
      console.error('狀態更新失敗:', data.message);
      // 回復為原狀態，如果更新失敗
      item.ACCOUNT_STATUS = item.ACCOUNT_STATUS === '正常' ? '停權' : '正常';
    }
  } catch (error) {
    console.error('Error Update Status:', error);
    // 回復為原狀態，如果出現錯誤
    item.ACCOUNT_STATUS = item.ACCOUNT_STATUS === '正常' ? '停權' : '正常';
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

              
              <div  v-for="(item, index) in displayedItems" :key="item.id" class="order-text">
                <span>{{ item.USER_CODE }}</span>
                <span>{{ item.EMAIL }}</span>
                <span>{{ item.USER_NAME }}</span>
                <span>{{ item.PHONE_NUMBER }}</span>
                <span  @click="toggleStatus(item)" :class="{'status-normal': item.ACCOUNT_STATUS === '正常', 'status-disabled': item.ACCOUNT_STATUS === '停權'}">{{ item.ACCOUNT_STATUS }}</span>
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
    padding-top: 9px;
    padding-bottom: 9px;
    cursor: default;
    font-family: "Noto Sans TC";
    transition: background-color 0.3s ease, border-radius 0.3s ease;

}

.order-text:hover{
  background-color: #FCB600;
  border-radius: 10px;

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