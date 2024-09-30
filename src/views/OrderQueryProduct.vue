<script setup>
import { ref, computed, onMounted } from 'vue';

// // 控制訂單明細顯示與否
// const toggle_OrderDetail = ref(false)
// // 切換訂單明細的顯示狀態
// const update_toggle_OrderDetail = ()=> {
//     toggle_OrderDetail.value = !toggle_OrderDetail.value
// }

// // 動態計算按鈕顯示的文字
// const buttonText = computed(() => 
//   toggle_OrderDetail.value ? '收合明細' : '查看明細'
// )


// 撈取後端返回的訂單資料並顯示在頁面
const orders = ref([]);
const orderDetails = ref({});
const selectedOrderId = ref(null);
const toggleOrderDetailsMap = ref({}); // 用來儲存每個訂單的顯示狀態
const token = sessionStorage.getItem('token');  // 假設 token 存在 localStorage

// 撈取訂單總覽資料
const fetchOrders = async () => {
  try {
    // 使用 FormData 傳送 token
    const formData = new FormData();
    formData.append('token', token);

    const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductOrder/GetUserPO.php`, {
      method: 'POST',
      body: formData
    });
    const data = await response.json();
    
    if (data.status === 'success') {
      orders.value = data.data; // 將訂單資料存入 ref
      // 初始化每個訂單的明細顯示狀態為 false
      orders.value.forEach(order => {
        toggleOrderDetailsMap.value[order.PRODUCT_ORDER_ID] = false;
      });
    } else {
      console.error(data.message);
    }
  } catch (error) {
    console.error('Error fetching orders:', error);
  }
}

// 切換訂單明細顯示狀態並撈取商品明細
const toggleOrderDetails = (productOrderId) => {
  toggleOrderDetailsMap.value[productOrderId] = !toggleOrderDetailsMap.value[productOrderId];

  if (toggleOrderDetailsMap.value[productOrderId] && !orderDetails.value[productOrderId]) {
    fetchOrderDetails(productOrderId);
  } else {
    selectedOrderId.value = null; // 如果收合明細，清空選中的訂單ID
  }
};


// 點擊訂單，撈取該訂單的商品明細
const fetchOrderDetails = async (productOrderId) => {
  const formData = new FormData();
  formData.append('PRODUCT_ORDER_ID', productOrderId);

  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductOrder/GetOrderDetails.php`, {
      method: 'POST',
      body: formData
    });
    const data = await response.json();

    console.log('Order details response:', data);  // 查看返回的數據

    if (data.status === 'success') {
      orderDetails.value[productOrderId] = data.data;
      selectedOrderId.value = productOrderId;
      console.log('Order details:', orderDetails.value);  // 查看 orderDetails 的數據
      console.log('Selected order ID:', selectedOrderId.value);  // 查看 selectedOrderId 的值
    }
  } catch (error) {
    console.error('Error fetching order details:', error);
  }
};

onMounted(() => {
  fetchOrders();
});
</script>

<template>
    <div class="detail">
        <div v-if="orders.length === 0" class="no-orders">
            <div  class="order-grid">
                <span class="order_header grid1">訂單編號</span>
                <span class="order_header grid2">日期</span>
                <span class="order_header grid3">金額</span>
                <span class="order_header grid4">付款方式</span>
                <span class="order_header grid5">訂單狀態</span>
                <span class="order_header grid6">運送方式</span>
            </div>
        </div>
        <!-- 如果有訂單，顯示訂單列表 -->
        <div v-else>
        <div v-for="order in orders" :key="order.PRODUCT_ORDER_ID" class="order-summary">
            <div  class="order-grid">
                <span class="order_header grid1">訂單編號</span>
                <span class="order_header grid2">日期</span>
                <span class="order_header grid3">金額</span>
                <span class="order_header grid4">付款方式</span>
                <span class="order_header grid5">訂單狀態</span>
                <span class="order_header grid6">運送方式</span>
                <span class="order_text grid7">{{ order.PRODUCT_ORDER_LIST }}</span>
                <span class="order_text grid8">{{ order.ORDER_DATE }}</span>
                <span class="order_text grid9">${{ order.TOTAL_PRICE }}</span>
                <span class="order_text grid10">{{ order.PAYMENT_METHOD }}</span>
                <span class="order_text grid11">{{ order.ORDER_STATUS }}
                </span>
                <span class="order_text grid12">{{ order.SHIPMENT }}</span>
                
                
            </div>
            <div class="confirm">
                    <button   @click="toggleOrderDetails(order.PRODUCT_ORDER_ID)" 
                    :class="{ 'view_detail': !toggleOrderDetailsMap[order.PRODUCT_ORDER_ID], 'close_detail': toggleOrderDetailsMap[order.PRODUCT_ORDER_ID] }">{{ toggleOrderDetailsMap[order.PRODUCT_ORDER_ID] ? '收合明細' : '查看明細' }}</button>
            </div>
            
            
            <div class="OrderDetail"  v-if="toggleOrderDetailsMap[order.PRODUCT_ORDER_ID]">
                <div class="item-header">
                    <span>商品名稱</span>
                    <span>數量</span>
                    <span>金額</span>
                </div>
                <div v-for="item in orderDetails[order.PRODUCT_ORDER_ID]" :key="item.PRODUCT_ORDER_ID" class="order-item">
                    <div class="product-info">
                        <img :src="item.PRODUCT_IMG" alt="商品圖片" class="product-image">
                        <div class="item-text">
                            <p>{{ item.PRODUCT_NAME }}</p>
                            
                        </div>
                    </div>
                    <span class="product-quantity">{{ item.QUANTITY }}</span>
                    <span class="product-price">${{ item.PRICE_AT_PURCHASE }}</span>
                </div>
            </div>
        </div>
        </div>
    </div>

</template>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
.detail{
    width: 100%;
    height: 100%;
    border-radius: 0 10px 10px 10px;
    background: #FFF;
    margin-bottom: 32px;
    padding: 20px;
    box-sizing: border-box;
}

.no-orders {
    
    color: #ff6347;  // 例如紅色文字提示
    font-size: 18px;
    padding: 0px 0 10vh 0;
    font-weight: bold;

}

.OrderDetail{
    margin-bottom: 50px;
    border-bottom: 1.5px solid #FCB600;
}

.detail img{
        width:50%;
        object-fit: contain;
        // margin: 12px;
    }

.order-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 0.6fr;
    // grid-template-columns: repeat(4, 1fr);
    // grid-auto-flow: dense;
    
}

.order_header {
    padding: 10px 0 10px 0;
    border-bottom: 2px solid #313131;
    font-weight: bold;
    color: #313131;
    font-size: 18px;
}



.order_text {
    padding: 10px 0 10px 0;
    font-weight: normal;
    color: #313131;
    font-size: 18px;
    font-family: "Noto Sans TC";
}

.confirm{
    
    width: 100%;
    display: flex;
    justify-content: right;
    align-items: center;
    margin-top: 20px;
    margin-bottom: 20px;
    grid-column: 6/7;
    grid-row: 3/4;

    
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

//查看明細 收合明細樣式
.view_detail{
    background-color: #22247A ; 
}

.close_detail{
    background-color: #7976BB !important;
}


/* ==========RWD斷點============== */

@media screen and (max-width: 1040px) { 
    .content{
        width: 85%;
    }

    .detail img{
        width:50%;
        object-fit: contain;
        // margin: 12px;
    }

    .order-header {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 0.6fr;
        font-weight: bold;
        color: #313131;
        font-size: 18px;
    }
}

@media screen and (max-width: 780px) { 

    .order_header {
        padding: 10px 0 10px 0;
        font-size: 14px;
    }

    .order_text {
        padding: 10px 0 10px 0;
        font-size: 14px;
    }
    .order-grid {
        display: grid;
        
        grid-template-columns: 1.3fr 1fr 0.8fr;
        grid-auto-flow: dense;
        
    }

    .grid1{
        grid-column: 1/2;
        grid-row: 1/2;

    }
    .grid7{
        grid-column: 1/2;
        grid-row: 2/3;

    }

    .grid2{
        grid-column: 2/3;
        grid-row: 1/2;

    }
    .grid8{
        grid-column: 2/3;
        grid-row: 2/3;

    }
    .grid3{
        grid-column: 3/4;
        grid-row: 1/2;

    }
    .grid9{
        grid-column: 3/4;
        grid-row: 2/3;

    }
    .grid4{
        grid-column: 1/2;
        grid-row: 3/4;

    }
    .grid10{
        grid-column: 1/2;
        grid-row: 4/5;

    }
    .grid5{
        grid-column: 2/3;
        grid-row: 3/4;

    }
    .grid11{
        grid-column: 2/3;
        grid-row: 4/5;

    }
    .grid6{
        grid-column: 3/4;
        grid-row: 3/4;

    }
    .grid12{
        grid-column: 3/4;
        grid-row: 4/5;

    }

    .item-header{
        display: grid;
        grid-template-columns: 4fr 1fr 1.3fr;
        font-size: 16px;
    }

    .order-item{
        display: grid;
        align-items: center;
        grid-template-columns: 4fr 1fr 1.3fr;
        font-size: 16px;
    }

    .confirm{
        grid-column: 3/4;
        grid-row: 5/6;
    }

    .confirm button{
        font-size: 13px;
        width: 20vw;
    }
}


 @media screen and (max-width: 454px) { 

    .detail{
        width: 100%;
        height: 100%;
        border-radius: 0 0 10px 10px;
        box-sizing: border-box;
    }

    .product-info[data-v-3c8632e4] {
        display: flex;
        align-items: center;
        gap: 1%;
    }

    .item-header{
        font-size: 14px;
    }

    .order-item{
        font-size: 12px;
    }
}

</style>