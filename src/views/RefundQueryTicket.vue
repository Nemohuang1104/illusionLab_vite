<script setup>
import { ref, computed, onMounted } from 'vue';

// import { ref, computed } from 'vue';

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

    const response = await fetch(`${import.meta.env.VITE_API_URL}/TicketOrder/GetUserRefundTO.php`, {
      method: 'POST',
      body: formData
    });
    const data = await response.json();
    
    if (data.status === 'success') {
      orders.value = data.data; // 將訂單資料存入 ref
      // 初始化每個訂單的明細顯示狀態為 false
      orders.value.forEach(order => {
        toggleOrderDetailsMap.value[order.TICKET_ORDER_ID] = false;
      });
    } else {
      console.error(data.message);
    }
  } catch (error) {
    console.error('Error fetching orders:', error);
  }
}

// 切換訂單明細顯示狀態並撈取商品明細
const toggleOrderDetails = (ticketOrderId) => {
  toggleOrderDetailsMap.value[ticketOrderId] = !toggleOrderDetailsMap.value[ticketOrderId];

  if (toggleOrderDetailsMap.value[ticketOrderId] && !orderDetails.value[ticketOrderId]) {
    fetchOrderDetails(ticketOrderId);
  } else {
    selectedOrderId.value = null; // 如果收合明細，清空選中的訂單ID
  }
};


// 撈取訂單商品明細
const fetchOrderDetails = async (ticketOrderId) => {
  const formData = new FormData();
  formData.append('TICKET_ORDER_ID', ticketOrderId);

  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/TicketOrder/GetTicketOrderDetails.php`, {
      method: 'POST',
      body: formData
    });
    const data = await response.json();

    if (data.status === 'success') {
      orderDetails.value[ticketOrderId] = data.data;
    }
  } catch (error) {
    console.error('Error fetching order details:', error);
  }
};

onMounted(() => {
  fetchOrders();

});

// =============彈窗=================//

const isImageModalOpen = ref(false);  // 控制模態框是否顯示
const selectedImage = ref('');        // 存放被點擊的圖片路徑

// 點擊圖片觸發模態框顯示
const openImageModal = (imageSrc) => {
  selectedImage.value = imageSrc;
  isImageModalOpen.value = true;
};

// 關閉模態框
const closeModal = () => {
  isImageModalOpen.value = false;
};

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
        <div v-for="order in orders" :key="order.TICKET_ORDER_ID" class="order-summary">
            <div class="order-grid">
                <span class="order_header grid1">訂單編號</span>
                <span class="order_header grid2">日期</span>
                <span class="order_header grid3">金額</span>
                <span class="order_header grid4">付款方式</span>
                <span class="order_header grid5">訂單狀態</span>
                <span class="order_header grid6">收件人資訊</span>
                <span class="order_text grid7">{{ order.TICKET_ORDER_LIST }}</span>
                <span class="order_text grid8">{{ order.ORDER_DATE }}</span>
                <span class="order_text grid9">${{ order.TOTAL_PRICE }}</span>
                <span class="order_text grid10">{{ order.PAYMENT_METHOD }}</span>
                <span class="order_text grid11">{{ order.ORDER_STATUS }}</span>
                <span class="order_text grid12">詳細資訊</span>
            </div>
            <div class="confirm">
                    <button   @click="toggleOrderDetails(order.TICKET_ORDER_ID)" 
                    :class="{ 'view_detail': !toggleOrderDetailsMap[order.TICKET_ORDER_ID], 'close_detail': toggleOrderDetailsMap[order.TICKET_ORDER_ID] }">{{ toggleOrderDetailsMap[order.TICKET_ORDER_ID] ? '收合明細' : '查看明細' }}</button>
            </div>
                <div class="OrderDetail"  v-if="toggleOrderDetailsMap[order.TICKET_ORDER_ID]">
                <div class="item-header">
                    <span>票卷樣式</span>
                    <span>活動場次</span>
                    <span>訂票數量</span>
                    <span>金額</span>
                </div>
                <div v-if=orderDetails[order.TICKET_ORDER_ID]  class="order-item">
                    <div class="product-info" @click="openImageModal(orderDetails[order.TICKET_ORDER_ID].TICKET_IMAGE_PATH)">
                        <img :src="orderDetails[order.TICKET_ORDER_ID].TICKET_IMAGE_PATH" alt="票卷樣式" class="product-image">
                        <div class="font_warp">
                                <font-awesome-icon icon="up-right-and-down-left-from-center" class="roll" />
                            </div>
                    </div>
                    <div class="item-text">
                        <p>{{orderDetails[order.TICKET_ORDER_ID].EVENT_NAME }}</p>
                        <p>{{orderDetails[order.TICKET_ORDER_ID].DATE }}</p>
                        <p>{{orderDetails[order.TICKET_ORDER_ID].TIME }}</p>
                        
                    </div>
                    <span class="product-quantity">{{ orderDetails[order.TICKET_ORDER_ID].QUANTITY }}</span>
                    <span class="product-price">${{ orderDetails[order.TICKET_ORDER_ID].TOTAL_PRICE }}</span>
                </div>
            
            </div>
            
        </div>
      </div>
    </div>

        <!-- 彈窗 -->
        <transition name="zoom">
            <div  v-if="isImageModalOpen" 
                class="modal"  
                @click="closeModal"
                >
                <span class="close" @click="closeModal">&times;</span>
                <div class="modal-content" @click.stop>
                    <img :src="selectedImage"  class="modal-image" />
                </div>
                </div>
        </transition>

</template>


<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
@import "../assets/style";


.detail{
    width: 100%;
    height: 100%;
    border-radius: 0 10px 10px 10px;
    background: #FFF;
    margin-bottom: 32px;
    padding: 20px;
    box-sizing: border-box;
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
    transition: background-color 0.3s ease;
}

.item-header{
    display: grid;
    grid-template-columns: 1.2fr 1fr 1fr 1fr;
    background-color: #22247A;
    font-weight: bold;
    color: #fff;
    font-size: 18px;
    padding: 10px;
}

.order-item{
    display: grid;
    align-items: center;
    grid-template-columns: 1.2fr 1fr 1fr 1fr;
    font-size: 16px;
    color: #313131;
    font-family: "Noto Sans TC";
    font-weight: 600;
    padding: 10px;
    background: #F7F7F7;
    padding: 20px 10px;

    p{
        margin: 8px 0;
    }
}

.product-info{
    // display: flex;
    // align-items: center;
    // gap: 16px;
    position: relative;
    cursor: pointer;

    img{
        max-width: 150px;
    }

    .font_warp{
        background-color: map-get($map: $color_0, $key:btn_purple);
        position: absolute;
        bottom: -15px;
        right: 70px;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height:14px ;

        .roll{
            color: white;
            font-size: 12px;
            
            
        }
    }
}

//查看明細 收合明細樣式
.view_detail{
    background-color: #22247A ; 
}

.close_detail{
    background-color: #7976BB !important;
}

.OrderDetail{
    margin-bottom: 50px;
    border-bottom: 1.5px solid #FCB600;
}

// ==================圖片彈窗=================//
.modal {
    display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  z-index: 1000;
  left: calc(50vw - (600px/2));
  bottom: calc(50vh - (400px/2));
  width: 100%;
  max-width: 600px;
  height: 100%;
  max-height: 350px;
  background-color:rgba(255, 255, 255, 0.922);
  border-radius: 20px;
  transition: opacity 0.3s ease;
  border:2px solid #7976BB
}

.modal-content {
    position: relative;
  max-width: 80%;
  max-height: 80%;
  overflow: hidden;
  transition: transform 0.3s ease;
}

.modal-image {
//   max-width:500px;
  width: 100%;
//   max-height: 260px;
  width: 100%;
  object-fit: cover;
  border-radius: 12px;
}

.close {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 30px;
  font-weight: bold;
  color: #fff;
  cursor: pointer;
  border-radius: 50%;
  width: 25px;
  height:25px;
  border: 1px solid white;
  background-color: #FCB600;
  text-align: center;
  line-height: 25px;
}


/* Zoom animation with bounce effect */
@keyframes zoomBounce {
  0% {
    transform: scale(0);
  }
  40% {
    transform: scale(1.1);
  }
  80% {
    transform: scale(0.95);
  }
  100% {
    transform: scale(1);
  }
}

.zoom-enter-active {
  animation: zoomBounce 0.3s ease;
}

.zoom-leave-active {
  transition: transform 0.2s ease;
}

.zoom-leave-to {
  transform: scale(0);
}

.modal-enter-active {
  opacity: 1;
}

.modal-leave-active {
  opacity: 0;
}

.no-orders {
    
    color: #ff6347;  // 例如紅色文字提示
    font-size: 18px;
    padding: 0px 0 20vh 0;
    font-weight: bold;

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
        grid-row: 5/6;

    }
    .grid5{
        grid-column: 2/3;
        grid-row: 3/4;

    }
    .grid11{
        grid-column: 2/3;
        grid-row: 5/6;

    }
    .grid6{
        grid-column: 3/4;
        grid-row: 3/4;

    }
    .grid12{
        grid-column: 3/4;
        grid-row: 5/6;

    }

    .item-header{
        display: grid;
        grid-template-columns: 1.2fr 1fr 1fr 1fr;
        font-size: 16px;
    }

    .order-item{
        display: grid;
        align-items: center;
        grid-template-columns: 1.2fr 1fr 1fr 1fr;
        font-size: 16px;
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

.product-info .font_warp[data-v-3c8632e4] {
    position: absolute;
    bottom: -15px;
    right: 30px;
    width: 15px;
    height: 15px;
    text-align: center;
    line-height: 10px;

    .roll{
        font-size: 10px;
    }
}

.modal {
  position: fixed;
  left: calc(50vw - (350px/2));
  bottom: calc(50vh - (250px/2));
  width: 100%;
  max-width: 350px;
  height: 100%;
  max-height: 250px;
  background-color:rgba(255, 255, 255, 0.922);
  border-radius: 20px;
  border:2px solid #7976BB
}
}

</style>