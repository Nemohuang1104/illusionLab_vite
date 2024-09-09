<script setup>
import Header_CMS from '@/components/Header_CMS.vue';
import OrderProductPopCMS from '@/components/OrderProductPopCMS.vue';
import { ref, computed } from 'vue';

import axios from 'axios'; // 註解掉 axios 的引入

/* 搜尋資料功能============================*/
const searchQuery = ref('');

const orders = ref([
  {
    order_id: '1',
    order_list: 'TO240821161532',
    account: 'john@example.com',
    payment_status: 0,
    order_status: 2,
    shipping_status: 3,
    order_date: '2024/08/21',
    receiver_name: 'John Doe',
    receiver_phone: '123456789',
    shipping_address: '123 Main St, Anytown, USA',
    shipping_type: '宅配',
    store: 'Store A',
    payment: '信用卡',
    shipping_fee: 60,
    discount_id: 'edr100',
    discount_price: 10
  },
  {
    order_id: "2",
    order_list: "TO240821161533",
    account: "alice@example.com",
    payment_status: 1,
    order_status: 1,
    shipping_status: 2,
    order_date: "2024/08/21",
    receiver_name: "Alice Smith",
    receiver_phone: "987654321",
    shipping_address: "456 Oak St, Smalltown, USA",
    shipping_type: "宅配",
    store: "Store B",
    payment: "銀行轉帳",
    shipping_fee: 60,
    discount_id: "edr101",
    discount_price: 20
  },
  {
    order_id: "3",
    order_list: "TO240821161534",
    account: "bob@example.com",
    payment_status: 0,
    order_status: 2,
    shipping_status: 1,
    order_date: "2024/08/22",
    receiver_name: "Bob Johnson",
    receiver_phone: "234567890",
    shipping_address: "789 Pine St, Bigtown, USA",
    shipping_type: "超商取貨",
    store: "Store C",
    payment: "信用卡",
    shipping_fee: 80,
    discount_id: "edr102",
    discount_price: 15
  },
  {
    order_id: "4",
    order_list: "TO240821161535",
    account: "charlie@example.com",
    payment_status: 1,
    order_status: 3,
    shipping_status: 3,
    order_date: "2024/08/22",
    receiver_name: "Charlie Davis",
    receiver_phone: "345678901",
    shipping_address: "101 Maple St, Villagetown, USA",
    shipping_type: "宅配",
    store: "Store D",
    payment: "電子支付",
    shipping_fee: 50,
    discount_id: "edr103",
    discount_price: 30
  },
  {
    order_id: "5",
    order_list: "TO240821161536",
    account: "david@example.com",
    payment_status: 0,
    order_status: 1,
    shipping_status: 2,
    order_date: "2024/08/23",
    receiver_name: "David Evans",
    receiver_phone: "456789012",
    shipping_address: "202 Elm St, Bigcity, USA",
    shipping_type: "宅配",
    store: "Store E",
    payment: "信用卡",
    shipping_fee: 70,
    discount_id: "edr104",
    discount_price: 25
  },
  {
    order_id: "6",
    order_list: "TO240821161537",
    account: "emma@example.com",
    payment_status: 1,
    order_status: 2,
    shipping_status: 1,
    order_date: "2024/08/23",
    receiver_name: "Emma Foster",
    receiver_phone: "567890123",
    shipping_address: "303 Cedar St, Middletown, USA",
    shipping_type: "超商取貨",
    store: "Store F",
    payment: "銀行轉帳",
    shipping_fee: 60,
    discount_id: "edr105",
    discount_price: 20
  },
  {
    order_id: "7",
    order_list: "TO240821161538",
    account: "frank@example.com",
    payment_status: 0,
    order_status: 1,
    shipping_status: 2,
    order_date: "2024/08/24",
    receiver_name: "Frank Green",
    receiver_phone: "678901234",
    shipping_address: "404 Birch St, Smallcity, USA",
    shipping_type: "宅配",
    store: "Store G",
    payment: "電子支付",
    shipping_fee: 65,
    discount_id: "edr106",
    discount_price: 10
  },
  {
    order_id: "8",
    order_list: "TO240821161539",
    account: "grace@example.com",
    payment_status: 1,
    order_status: 3,
    shipping_status: 3,
    order_date: "2024/08/24",
    receiver_name: "Grace Harris",
    receiver_phone: "789012345",
    shipping_address: "505 Spruce St, Villagecity, USA",
    shipping_type: "宅配",
    store: "Store H",
    payment: "信用卡",
    shipping_fee: 55,
    discount_id: "edr107",
    discount_price: 15
  },
  {
    order_id: "9",
    order_list: "TO240821161540",
    account: "henry@example.com",
    payment_status: 0,
    order_status: 2,
    shipping_status: 1,
    order_date: "2024/08/25",
    receiver_name: "Henry Ingram",
    receiver_phone: "890123456",
    shipping_address: "606 Willow St, Bigtown, USA",
    shipping_type: "超商取貨",
    store: "Store I",
    payment: "銀行轉帳",
    shipping_fee: 60,
    discount_id: "edr108",
    discount_price: 20
  },
  {
    order_id: "10",
    order_list: "TO240821161541",
    account: "irene@example.com",
    payment_status: 1,
    order_status: 1,
    shipping_status: 2,
    order_date: "2024/08/25",
    receiver_name: "Irene Johnson",
    receiver_phone: "901234567",
    shipping_address: "707 Aspen St, Smalltown, USA",
    shipping_type: "宅配",
    store: "Store J",
    payment: "電子支付",
    shipping_fee: 70,
    discount_id: "edr109",
    discount_price: 25
  },
  {
    order_id: "11",
    order_list: "TO240821161542",
    account: "jack@example.com",
    payment_status: 0,
    order_status: 2,
    shipping_status: 3,
    order_date: "2024/08/26",
    receiver_name: "Jack King",
    receiver_phone: "012345678",
    shipping_address: "808 Chestnut St, Bigcity, USA",
    shipping_type: "超商取貨",
    store: "Store K",
    payment: "信用卡",
    shipping_fee: 65,
    discount_id: "edr110",
    discount_price: 30
  }
  
  // 更多訂單數據...
]);


const initialItems = ref([...orders.value]); // 保存初始資料的副本

// 过滤后的数据
const filteredItems = computed(() => {
  if (!searchQuery.value) {
    return orders.value;
  }
  return orders.value.filter(item =>
    item.order_list.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
    item.account.toLowerCase().includes(searchQuery.value.toLowerCase())
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
  const originalIndex = orders.value.findIndex(item => item.order_list === filteredItem.order_list);
  
  if (originalIndex !== -1) {
    current_edit.value = originalIndex;
    editOpacity.value = 1;
    select_number.value = orders.value[originalIndex].order_list;

    const tot = order_list.value[originalIndex];
    total_cost.value = tot.reduce((sum, item) => sum + Number(item.order_detail_price), 0);

    order_cost.value = total_cost.value + Number(orders.value[originalIndex].shipping_fee) - Number(orders.value[originalIndex].discount_price);

    o_pay.value = orders.value[originalIndex].payment_status;
    o_form.value = orders.value[originalIndex].order_status;
    o_ship.value = orders.value[originalIndex].shipping_status;
  }
};
// 2.當子組件 OrderTicketPopCMS 中的 f_close及f_save 被觸發時，會通過 emit 通知父組件，從而更新父組件中的 editOpacity 值，達到控制彈出視窗顯示或隱藏的效果。
// 2.1 @close-edit事件回調函式
const handleCloseEdit = ({ opacity, edit }) => {
  editOpacity.value = opacity; // 更新 editOpacity 的值
  current_edit.value = edit;   // 更新 current_edit 的值
};

// 2.2 @save-edit事件回調函式
const handleSaveEdit = async (updatedOrder) => {
  if (current_edit.value !== null) {
    orders.value[current_edit.value] = updatedOrder;
    initialItems.value = [...orders.value]; // 編輯後更新 initialItems
  }
  editOpacity.value = 0;
  current_edit.value = null;
  }
  // 小春堂範例開始
  // if (current_edit.value === null) return

  // const nIndex = current_edit.value
  // orders.value[nIndex].payment_status = o_pay.value
  // orders.value[nIndex].order_status = o_form.value
  // orders.value[nIndex].shipping_status = o_ship.value

  // current_edit.value = null
  // total_cost.value = 0
  // order_cost.value = 0
  // 小春堂範例結束



// 3.發送 AJAX 請求更新訂單 (帶串接資料庫後再嘗試)
  // try {
  //   const response = await axios.post('../php/n-order_update.php', {
  //     order_list: orders.value[nIndex].order_list,
  //     payment_status: orders.value[nIndex].payment_status,
  //     order_status: orders.value[nIndex].order_status,
  //     shipping_status: orders.value[nIndex].shipping_status,
  //   })
  //   alert("儲存成功")
  // } catch (error) {
  //   alert("儲存失敗: " + error.response.status)
  // }

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

                
                <div v-for="(item, index) in displayedItems" :key="item.id" class="order-text">
                <span>{{ item.order_id }}</span>
                <span>{{ item.order_list }}</span>
                <span>{{ item.account }}</span>
                <span>{{ item.order_status }}</span>
                <span>{{ item.order_date }}</span>
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
              <OrderProductPopCMS
              :order="orders[current_edit]"
              @close-edit="handleCloseEdit"
              @save-edit="handleSaveEdit"/>
            </div>

            <div id="hide" v-if="current_edit !== null"></div>


            <!-- 1.點擊視窗的儲存或關閉按鈕，畫面要隱藏或持續顯示v-if -->
            <!-- <double-check v-if="dbcheck" @save="sss" @cancel="ccc"></double-check> -->
</template>



<style lang="scss" scoped>

.inner{
  width: 100%;
  position: absolute;
  top: -17.5%;
}

.detail[data-v-18691004] {
    width: 100%;
    height: 470px;
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