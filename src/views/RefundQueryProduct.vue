<script setup>
import { ref, computed } from 'vue';

// 控制訂單明細顯示與否
const toggle_OrderDetail = ref(false)
// 切換訂單明細的顯示狀態
const update_toggle_OrderDetail = ()=> {
    toggle_OrderDetail.value = !toggle_OrderDetail.value
}

// 動態計算按鈕顯示的文字
const buttonText = computed(() => 
  toggle_OrderDetail.value ? '收合明細' : '查看明細'
)
</script>

<template>
    <div class="detail">
        <div class="order-summary">
            <div class="order-grid">
                <span class="order_header grid1">訂單編號</span>
                <span class="order_header grid2">日期</span>
                <span class="order_header grid3">金額</span>
                <span class="order_header grid4">付款方式</span>
                <span class="order_header grid5">訂單狀態</span>
                <span class="order_header grid6">收件人資訊</span>
                <span class="order_text grid7">20240819001</span>
                <span class="order_text grid8">2024-08-19</span>
                <span class="order_text grid9">$299</span>
                <span class="order_text grid10">信用卡</span>
                <span class="order_text grid11">運送中
                </span>
                <span class="order_text grid12">詳細資訊</span>
            </div>
            <div class="confirm">
                <button  @click="update_toggle_OrderDetail" :class="{ 'view_detail': !toggle_OrderDetail , 'close_detail': toggle_OrderDetail}">{{ buttonText }}</button>
            </div>
            
            <div class="OrderDetail"  v-if="toggle_OrderDetail === true">
                <div class="item-header">
                    <span>商品名稱</span>
                    <span>數量</span>
                    <span>金額</span>
                </div>
                <div class="order-item">
                    <div class="product-info">
                        <img src="../assets/images/product_orderitem.png" alt="商品圖片" class="product-image">
                        <div class="item-text">
                            <p>賭城帆布袋</p>
                            
                        </div>
                    </div>
                    <span class="product-quantity">1</span>
                    <span class="product-price">$299</span>
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
        grid-template-columns: 4fr 1fr 1.3fr;
        font-size: 16px;
    }

    .order-item{
        display: grid;
        align-items: center;
        grid-template-columns: 4fr 1fr 1.3fr;
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

    .product-info {
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