<script setup>
import Header_1 from '@/components/Header_1.vue';
import Footer from '@/components/Footer.vue';
import ShoppingStep from '@/components/ShoppingStep.vue';
import { ref } from 'vue';
</script>

<template>
    <div class="wrapper">
        <div><Header_1></Header_1></div>
        <div><ShoppingStep></ShoppingStep></div>

        <div class="content">
            <p class="result">訂單完成!</p>
            <p class="result">謝謝您的訂購，我們會在確認商品後盡速為您安排出貨</p>
            <p class="orderno">訂單編號:20240603</p>
            <div class="order_profile">
                <p>訂購人資訊</p>
                <div class="inner01">
                    <p>姓名 :</p>
                    <div class="code-input">
                        美美
                    </div>
                </div>
                <div class="inner01">
                    <p>手機 :</p>
                    <div class="code-input">
                        0983031820
                    </div>
                </div>
                <div class="inner01">
                    <p>地址 :</p>
                    <div class="code-input">
                        104台北市中山區南京東路三段219號4F
                    </div>
                </div>
                <div class="inner01">
                    <p>運送方式 :</p>
                    <div class="code-input">
                        門市自取
                    </div>
                </div>
                <div class="inner01">
                    <p>付款方式 :</p>
                    <div class="code-input">
                        信用卡付款
                    </div>
                </div>
            </div>

            <div class="order-summary">
                <div class="order-title">訂購商品清單</div>
                <div class="order-header">
                    <span>商品名稱</span>
                    <span>數量</span>
                    <span>價格</span>
                </div>
                <div class="order-item">
                    <div class="product-info">
                        <img src="../assets/images/product_ex.jpg" alt="商品圖片" class="product-image">
                        <span class="product-name">繪本風格帆布袋</span>
                    </div>
                    <span class="product-quantity">x1</span>
                    <span class="product-price">$590</span>
                </div>
                <hr>
            </div>
            <div class="payment">
                
                <div class="total">
                    <div class="count">
                        <h3>商品金額</h3>
                        <p>$590</p>
                    </div>
                    <div class="shipping-fee">
                        <h3>運費</h3>
                        <p>$60</p>
                    </div>
                    <div class="discount-fee">
                        <h3>折扣金額</h3>
                        <p>$0</p>
                    </div>
                    <hr>
                    <div class="total-fee">
                        <h3>總金額</h3>
                        <p>$650</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm">
            <button>返回首頁</button>
        </div>
        <Footer></Footer>
    </div>
</template>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
.wrapper{
    background: linear-gradient(134deg, #22247A 23.77%, #7976BB 100.56%);
}

.content{
    margin: 0 auto;
    margin-top: 20px;
    width: 100%;
    max-width:1000px;
    // border: 1px solid white;
}

.result{
    text-align: center;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}

.orderno{
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin-top: 20px;
    margin-bottom: 20px;
}

.order_profile{
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 16px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
   
}

.order_profile > p{
    margin-bottom: 12px;
   
}

.inner01{
    display: flex;
    text-align: center;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 16px;
    font-weight: 300;
    line-height: normal;
    margin-bottom: 12px;

}

.inner01 p{
    flex-basis: 10%;
    text-align: left ;
}

.order-summary{
    margin-bottom: 32px;
}

.order-summary hr{
    height: 2px;
    background-color: #FFF;
    border: none;
    border-radius: 2.5px; /* 讓線條變得更加圓潤 */
}

.order-title{
    background: var(--header-footer, #000354);
    font-weight: bold;
    color: var(--Color-6, #FFF);
    padding: 10px;
    font-size: 18px;
}

.order-header {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    padding: 10px;
    background-color: #7976BB;
    font-weight: bold;
    color: var(--Color-6, #FFF);
    font-size: 18px;
}

.order-item{
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    padding: 10px;
    align-items: center;
    color: var(--Color-6, #FFF);
    font-size: 18px;
    font-family: "Noto Sans TC";
}

.product-info{
    display: flex;
    gap: 20px;
    align-items: center;
    font-weight: bold;
    color: var(--Color-6, #FFF);
    font-size: 18px;
}

.payment{
    background: var(--header-footer, #000354);
    width: 100%;
    max-width: 1000px;
    height: 200px;
    border-radius: 10px;
    flex-grow: 0;
    margin-bottom: 40px;
    
}

.total{
    width: 96%;
    margin: 0 auto;
    padding: 20px;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 16px;
    font-weight: 300;
    line-height: normal;
    margin-bottom: 12px;
}

.total hr{
    height: 2px;
    background-color: #FFF;
    border: none;
    border-radius: 2.5px; /* 讓線條變得更加圓潤 */
}

.count{
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.shipping-fee{
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.discount-fee{
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.total-fee{
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 20px;
}

.confirm{
    display: flex;
    width: 240px;
    margin: 0 auto;
    margin-bottom: 80px;
    gap: 56px;
    justify-content: center;
}

.confirm button{
    font-size: 20px;
    width: 160px;
    height: 40px;
    padding: 4px;
    border: none;
    border-radius: 50px;
    background: var(--Color-3, #FFEDBC);
    cursor: pointer;

}




</style>