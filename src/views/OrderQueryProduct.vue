<script setup>

</script>

<template>
    <div class="detail">
        <div class="order-summary">
            <div class="order-header">
                <span>訂單編號</span>
                <span>日期</span>
                <span>金額</span>
                <span>付款方式</span>
                <span>訂單狀態</span>
                <span>收件人資訊</span>
            </div>
            <hr>
            <div class="order-text">
                <span>20240819001</span>
                <span>2024-08-19</span>
                <span>$299</span>
                <span>信用卡</span>
                <span>運送中</span>
                <span>詳細資訊</span>
            </div>
            <div class="confirm">
                <button>查看明細</button>
            </div>
            
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

</template>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
.detail{
    width: 100%;
    height: 350px;
    border-radius: 0 10px 10px 10px;
    background: #FFF;
    margin-bottom: 32px;
    padding: 20px;
    box-sizing: border-box;
}


.order-header {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 0.6fr;
    font-weight: bold;
    color: #313131;
    font-size: 18px;
}

.order-summary hr{
    height: 2px;
    background-color: #313131;
    border: none;
    border-radius: 2.5px; /* 讓線條變得更加圓潤 */
}

.order-text {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 0.6fr;
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

</style>