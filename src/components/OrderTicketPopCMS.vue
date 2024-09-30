<script setup>
import Header_0 from '@/components/Header_0.vue';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';
import { defineProps, ref, defineEmits, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();

/*定義 父組件prop 事件的原始夾帶資訊*/
const props = defineProps({
  order: Object,
});

// 假設你有一個函數來查詢詳細資料
const orderDetails = ref();

// onMounted(() => {
//   fetchOrderDetails(props.productOrderId);
// });

async function fetchTickets() {
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/TicketOrder/FetchTicketOrderDetails.php?TICKET_ORDER_ID=${props.order.TICKET_ORDER_ID}`);
    const data = await response.json();
    orderDetails.value = data; // 將訂單詳細資料設置到本地 state
  } catch (error) {
    console.error('Error fetching ticket details:', error);
  }
}
onMounted(() => {
    fetchTickets(); // 當頁面加載時撈取資料
});

// onMounted(async () => {
//   try {
//     const ticketOrderId = route.params.id;

//     const response = await fetch(`${import.meta.env.VITE_API_URL}/TicketOrder/FetchTicketOrderDetails.php?TICKET_ORDER_ID=${ticketOrderId}`);
//     const data = await response.json();
//     // 更新組件中的資料，例如：
//     orderDetails.value = data;
//   } catch (error) {
//     console.error('Error fetching order details:', error);
//   }
// });

/*定義 儲存和關閉按鈕emit 事件的夾帶資訊*/
const emit = defineEmits(['close-edit', 'save-edit']);
// 0.創建本地狀態來保存父組件的原始數據，以利後續編輯的數據
const localOrder = ref({ ...props.order });
// 1.處理關閉按鈕emit夾帶的透明度及編輯狀態(讓父組件的編輯視窗消失)
const f_close = () => {
  emit('close-edit', { opacity: 0, edit: null }); // 發出 'close-edit' 事件並傳遞 editOpacity 值
};

// 2.處理儲存按鈕emit夾帶的編輯狀態，並傳回父組件
/* 儲存修改並發送到後端 */
const f_save = async () => {
  const formData = new FormData();
  formData.append('TICKET_ORDER_ID', localOrder.value.TICKET_ORDER_ID);
  formData.append('ORDER_STATUS', localOrder.value.ORDER_STATUS);

    try {
      const response = await fetch(`${import.meta.env.VITE_API_URL}/TicketOrder/SaveTO_Data.php`, {
        method: 'POST',
        body: formData,
      });

      const result = await response.json();
      if (result.status === 'success') {
        emit('save-edit', localOrder.value);
        Swal.fire({
          icon: 'success',
          title: '儲存成功',
          showConfirmButton: false,
          timer: 1200,
          backdrop: false,
            willOpen: () => {
                document.body.style.paddingRight = '0';
              }
        })
        f_close();
      } else {
        console.error('儲存失敗:', result.message);
      }
    } catch (error) {
      console.error('發送儲存請求時發生錯誤:', error);
    }
  };

// =============彈窗=================//

// 彈窗狀態和所選卡片
const modalVisible = ref(false);
const selectedCard = ref({});

// 打開彈窗
const openModal = (orderDetails) => {
  selectedCard.value = orderDetails;
  modalVisible.value = true;
};

// 關閉彈窗
const closeModal = () => {
  modalVisible.value = false;
};

</script>
<template>
    <div class="wrapper">
        <div class="detail">
            <div class="order-summary">
                <div class="order-header">
                    <span>編輯</span>
                </div>
                <hr>
                <div class="orderinf1">
                    <div class="orderdiv">
                        <p class="ptext">訂購日期 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.ORDER_DATE">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">訂單編號 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.TICKET_ORDER_LIST">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">訂單狀態 : </p>
                        <select class="inputtext" v-model="localOrder.ORDER_STATUS">
                        <option value="待處理">待處理</option>
                        <option value="已處理">已處理</option>
                        <option value="已取消">已取消</option>
                        <option value="已完成">已完成</option>
                    </select>
                    </div>
                </div>

                <div class="orderinf">
                    <div class="orderdiv">
                        <p class="ptext">會員編號 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.USER_CODE">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext"> 收件人姓名 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.NAME">
                    </div>
                    <!-- <div class="orderdiv">
                        <p class="ptext">收件人手機 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.receiver_phone">
                    </div> -->
                    <!-- <div class="orderdiv">
                        <p class="ptext">收件人地址 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.shipping_address">
                    </div> -->
                    <div class="orderdiv">
                        <p class="ptext">付款方式 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.PAYMENT_METHOD">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">公司抬頭 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.COMPANY">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">統一編號 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.TAX_ID">
                    </div>
                </div>

                <div class="downbox">
                    <div class="orderlist">
                        <div class="textdown">
                            <p>訂單場次明細</p>
                            <div class="titlename">
                                <p class="ticket">票卷樣式</p>
                                <p class="eventname">場次</p>
                                
                                <p class="quantity">訂票數量</p>
                                <p class="price">價格</p>
                            </div>
                        </div>
                        <!-- <div class="textdetail">
                            <img src="../assets/images/lifecasino.png" alt="">
                            <div class="detaillist">
                                <p>人生賭場</p>
                                <p>2024/08/09</p>
                                <p>上午場</p>
                            </div>
                            <p>8</p>
                            <p> $17,600</p>
                        </div> -->
                        <div class="textdetail" v-if="orderDetails">
                        <div class="img_warp" @click="openModal(orderDetails)" >
                            <img :src="orderDetails.TICKET_IMAGE_PATH" class="ticket" alt="" >
                            <div class="font_warp">
                                <font-awesome-icon icon="up-right-and-down-left-from-center" class="roll" />
                            </div>
                        </div>
                            <div class="detaillist">
                                <p>{{ orderDetails.EVENT_NAME }}</p>
                                <p>{{ orderDetails.DATE }}</p>
                                <p> {{ orderDetails.TIME }}</p>
                            </div>
                            <p> {{ orderDetails.QUANTITY }}</p>
                            <p> ${{ orderDetails.TOTAL_PRICE }}</p>
                        </div>
                    </div>

                </div>
                <div class="n-order_editbtn">
                    <button class="n-order_close" @click="f_close">關閉</button>
                    <button class="n-order_save" @click="f_save">儲存</button>
                </div>

                <!-- <div v-for="item in displayedItems" :key="item.id" class="order-text">
                    <span>{{ item.id }}</span>
                    <span>{{ item.eventName }}</span>
                    <span>{{ item.name }}</span>
                    <span>{{ item.price }}</span>
                    <span>{{ item.status }}</span>
                    <span>編輯</span>
                </div> -->
            </div>
        </div>
    </div>
    <!-- 彈窗 -->
    <transition name="zoom">
  <div v-if="modalVisible" 
      class="modal"  
      @click="closeModal"
      >
      <span class="close" @click="closeModal">&times;</span>
      <div class="modal-content" @click.stop>
        <img :src="selectedCard.TICKET_IMAGE_PATH"  class="modal-image" />
      </div>
    </div>
</transition>
</template>



<style lang="scss" scoped>
//popup的外框樣式
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
@import "../assets/style";


.wrapper {
    font-family: Noto Sans TC;
    font-weight: bold;
    // background-color: #000354;

}


.detail {
    // display: flex;
    margin: 0 auto;
    align-items: center;
    justify-content: center;
    max-width: 900px;
    width: 95.5%;
    // height: 900px;
    border-radius: 10px;
    padding: 2%;
    background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 1) 97.6%);



}

.order-summary {
    width: 100%;
    height: 100%;

}

.order-header {
    display: grid;
    grid-template-columns: 0.8fr 1fr 3fr 1fr 1.2fr 1fr;
    font-weight: bold;
    color: #313131;
    font-size: 18px;
}

.order-summary>hr {
    height: 3px;
    background-color: #313131;
    border: none;
    border-radius: 2.5px;
    /* 讓線條變得更加圓潤 */
}

.order-text {
    display: grid;
    grid-template-columns: 0.8fr 1fr 3fr 1fr 1.2fr 1fr;
    font-weight: normal;
    color: #313131;
    font-size: 18px;
    margin-top: 18px;
    font-family: "Noto Sans TC";
}

.order-text span:last-child {
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

//與標題有關
.ptext {
    display: flex;
    align-items: center;
    // margin-right: 10px;
    font-weight: bold;
    gap: 10%;
    width: 100px;
}

//與輸入框有關
.inputtext {
    outline: none;
    padding: 5px 10px 5px 10px;
    border: 1px solid #FFFFFF;
    border-radius: 8px;
    flex-shrink: 0;
    background: #FFEDBC;
}

.orderinf1 {
    display: flex;
    align-items: center;
    max-width: 100%;
    padding: 1%;
    margin-top: 20px;
    // border: 1px solid red;
    gap: 20%;
    flex-wrap: wrap;
}

.orderinf {
    border: 1px solid black;
    display: flex;
    align-items: center;
    // max-width: 800px;
    max-width: 100%;

    // border: 1px solid red;
    gap: 20%;
    flex-wrap: wrap;
    margin-bottom: 20px;
    padding: 1%;

}



.orderdiv {
    display: flex;
    margin-bottom: 2%;
}



// 第二表


.textdown>p {
    margin: 10px 0px 10px 0px;
}

.total {
    //  border: 1px solid red;
    display: flex;
    flex-direction: column;
    align-items: end;
    margin-bottom: 20px;
}

.ptext1 {
    display: flex;
    align-items: center;
    // margin-right: 10px;
    font-weight: bold;
    gap: 10%;
    width: 100px;
}

.orderlist{
   width: 100%;

}

.detaillist{
    line-height: 1.6;
} 



.titlename {
    background-color: #22247A;
    color: #FFFFFF;
    height: 35px;
    display: grid;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    padding: 10px 10px 10px 25px;

 
 
}

.eventname{
    // margin: 0 20px;
}


.inputtext1 {
    outline: none;
    padding: 5px 10px 5px 10px;
    border: 1px solid #FFFFFF;
    border-radius: 8px;
    flex-shrink: 0;
    text-align: right;
}

.textdetail {
    // border: 1px solid red;
    background: #F7F7F7;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    align-items: center;
    flex-direction: column;
    height: 180px;
    font-weight: bold;
    margin-bottom: 20px;
    padding: 10px 10px 10px 25px;
}

.img_warp{
    position: relative;
    cursor: pointer;

    .font_warp{
        background-color: map-get($map: $color_0, $key:btn_purple);
        position: absolute;
        bottom: 30px;
        right: 40px;
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

.textdetail img{
    width: 120px;
    height: 120px;
    // margin: 10px 20px;
    object-fit: contain;
    // scale: 1.8;
    // margin: 0 auto;
}



.downbox {
    border: 1px solid black;
    padding: 2%;
    margin-bottom: 80px;
}


//按鈕
.n-order_editbtn{
    width: 100%;
    display: flex;
    justify-content: center;
    gap: 20px;
    
}

.n-order_editbtn .n-order_save {
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
}

.n-order_editbtn .n-order_close {
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 100px;
    height: 29.48px;
    line-height: 29.48px;
    border: none;
    background-color: #a3a3a3;
    border: 1px solid #a3a3a3;
    border-radius: 6px;
    cursor: pointer;
}

// ==================圖片彈窗=================//
.modal {
    display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  z-index: 1000;
  left: calc(50% - (600px/2));
  bottom: calc(10% - (400px/2));;
  width: 600px;
  height: 350px;
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



// .modal-enter-active {
//   opacity: 1;
// }

// .modal-leave-active {
//   opacity: 0;
// }

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

</style>