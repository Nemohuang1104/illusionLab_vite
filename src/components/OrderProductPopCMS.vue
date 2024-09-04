<script setup>
import Header_0 from '@/components/Header_0.vue';
import { defineProps, ref, defineEmits } from 'vue';


/*定義 父組件prop 事件的原始夾帶資訊*/
const props = defineProps({
  order: Object,
});

/*定義 儲存和關閉按鈕emit 事件的夾帶資訊*/
const emit = defineEmits(['close-edit', 'save-edit']);
// 0.創建本地狀態來保存父組件的原始數據，以利後續編輯的數據
const localOrder = ref({ ...props.order });
// 1.處理關閉按鈕emit夾帶的透明度及編輯狀態(讓父組件的編輯視窗消失)
const f_close = () => {
  emit('close-edit', { opacity: 0, edit: null }); // 發出 'close-edit' 事件並傳遞 editOpacity 值
};

// 2.處理儲存按鈕emit夾帶的編輯狀態，並傳回父組件
const f_save = () => {
  emit('save-edit', localOrder.value); // 將本地編輯的數據傳遞回父組件
  f_close(); // 儲存後關閉編輯視窗
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
                        <input class="inputtext" type="text" v-model="localOrder.order_date">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">訂單編號 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.order_list">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">訂單狀態 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.order_status">
                    </div>
                </div>

                <div class="orderinf">
                    <div class="orderdiv">
                        <p class="ptext">會員帳號 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.account">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext"> 收件人姓名 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.receiver_name">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">收件人手機 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.receiver_phone">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">收件人地址 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.shipping_address">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">付款方式 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.payment">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">運送方式 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.shipping_type">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">門市名稱 : </p>
                        <input class="inputtext" type="text" value="7-11土定富門市">
                    </div>
                </div>

                <div class="downbox">
                    <div class="orderlist">
                        <div class="textdown">
                            <p>訂單商品明細</p>
                            <div class="titlename">
                                <p class="eventname">商品名稱</p>
                                <p ></p>
                                <p class="quantity">數量</p>
                                <p class="price">價格</p>
                            </div>
                        </div>
                        <div class="textdetail">
                            <img src="../assets/images/product_orderitem.png" alt="">
                            <div class="detaillist">
                                <p>繪本風格帆布袋</p>
                            </div>
                            <p>1</p>
                            <p> $599</p>
                        </div>
                    </div>
                    <div class="total">
                        <div class="orderdiv">
                            <p class="ptext1">小計 : </p>
                            <input class="inputtext1" type="text" value="$599">
                        </div>
                        <div class="orderdiv">
                            <p class="ptext1">折扣碼 : </p>
                            <input class="inputtext1" type="text" v-model="localOrder.discount_price">
                        </div>
                        <div class="orderdiv">
                            <p class="ptext1">運費 : </p>
                            <input class="inputtext1" type="text" v-model="localOrder.shipping_fee">
                        </div>
                        <div class="orderdiv">
                            <p class="ptext1">訂單總金額 : </p>
                            <input class="inputtext1" type="text" value="$17,500">
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
</template>



<style lang="scss" scoped>
//popup的外框樣式
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');

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
    height: 1000px;
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
 
}

.eventname{
    margin: 0 20px;
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

}

.textdetail img{
    width: 120px;
    height: 120px;
    margin: 10px 20px;
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


</style>