<script setup>
import Header_0 from '@/components/Header_0.vue';
import Footer_0 from '@/components/Footer_0.vue';
import ShoppingStep from '@/components/ShoppingStep.vue';
import { ref, onMounted} from 'vue';
import { useRouter, useRoute } from 'vue-router';
const route = useRoute();
const router = useRouter();

const mainOrder = ref();
const orderDetails = ref();

async function fetchMainOrder() {
  const productOrderId = route.query.productOrderId;
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductOrder/GetNowPO.php?PRODUCT_ORDER_ID=${productOrderId}`);
    const data = await response.json();
    mainOrder.value = data;
    
  } catch (error) {
    console.error('Request failed:', error);
  }
}

async function fetchOrderDetails() {
  const productOrderId = route.query.productOrderId;
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductOrder/FetchProductOrderDetails.php?PRODUCT_ORDER_ID=${productOrderId}`);
    const data = await response.json();
    orderDetails.value = data;
  } catch (error) {
    console.error('Error fetching order details:', error);
  }
}

onMounted(() => {
  fetchOrderDetails();
  fetchMainOrder();
});




// ============ShoppingStep=============//
const highlight = ref({
    1:{  background : 'transparent', fontcolor : '#fff'  },
    2:{  background : 'transparent', fontcolor : '#fff' },
    3:{  background : '#fff', fontcolor : '#22247A' }

    }
  ); 

  const baseUrl = import.meta.env.VITE_IMAGE_URL || import.meta.env.BASE_URL;


const getImageUrl = (imgPath) => {
  return `${baseUrl === '/' ? '' : baseUrl }${imgPath}`;
};
</script>

<template>
    <div class="wrapper">
        <div><Header_0></Header_0></div>
        <div class="ShoppingStep"><ShoppingStep :styles="highlight"></ShoppingStep></div>

        <div class="content" v-for="(item, index) in mainOrder" :key="index">
            <p class="result">訂單完成!</p>
            <p class="result">謝謝您的訂購，我們會在確認商品後盡速為您安排出貨</p>
            <p class="orderno">訂單編號:{{ item.PRODUCT_ORDER_LIST }}</p>
            <div class="order_profile" >
                <p>訂購人資訊</p>
                <div class="inner01">
                    <p>姓名 :</p>
                    <div class="code-input">
                        {{ item.BUYER_NAME }}
                    </div>
                </div>
                <div class="inner01">
                    <p>手機 :</p>
                    <div class="code-input">
                        {{ item.BUYER_PHONE_NUMBER }}
                    </div>
                </div>
                <div class="inner01">
                    <p>地址 :</p>
                    <div class="code-input">
                        {{ item.BUYER_ADDRESS }}
                    </div>
                </div>
                <div class="inner01">
                    <p>運送方式 :</p>
                    <div class="code-input">
                        {{ item.SHIPMENT }}
                    </div>
                </div>
                <div class="inner01">
                    <p>付款方式 :</p>
                    <div class="code-input">
                        {{ item.PAYMENT_METHOD }}
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
                <div class="order-item" v-for="(item, index) in orderDetails" :key="index" >
                    <div class="product-info">
                        <img :src="getImageUrl(item.PRODUCT_IMG)" alt="商品圖片" class="product-image">
                        <span class="product-name">{{ item.PRODUCT_NAME }}</span>
                    </div>
                    <span class="product-quantity">{{ item.QUANTITY }}</span>
                    <span class="product-price">${{ item.PRICE_AT_PURCHASE }}</span>
                </div>
                <hr>
            </div>
            <div class="payment">

                <div class="total" v-for="(item, index) in mainOrder" :key="index">
                    <div class="count">
                        <h3>商品金額</h3>
                        <p>${{ item.PRE_TOTAL_PRICE }}</p>
                    </div>
                    <div class="shipping-fee">
                        <h3>運費</h3>
                        <p>${{ item.SHIPMENT_FEE }}</p>
                    </div>
                    <div class="discount-fee">
                        <h3>折扣金額</h3>
                        <p>${{ item.DISCOUNT_AMOUNT }}</p>
                    </div>
                    <hr>
                    <div class="total-fee">
                        <h3>總金額</h3>
                        <p>${{ item.TOTAL_PRICE }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="confirm">
            <RouterLink to="/home"><button>返回首頁</button></RouterLink>
        </div>
        <Footer_0></Footer_0>
    </div>
</template>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');

.wrapper {
    background: linear-gradient(134deg, #22247A 23.77%, #7976BB 100.56%);
}

.ShoppingStep{
    padding-top: 100px;
}

.content {
    margin: 0 auto;
    margin-top: 20px;
    width: 100%;
    max-width: 1000px;
    // border: 1px solid white;
}

.result {
    text-align: center;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}

.orderno {
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin-top: 20px;
    margin-bottom: 20px;
}

.order_profile {
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 16px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;

}

.order_profile>p {
    margin-bottom: 12px;

}

.inner01 {
    display: flex;
    text-align: center;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 16px;
    font-weight: 300;
    line-height: normal;
    margin-bottom: 12px;

}

.inner01 p {
    flex-basis: 10%;
    text-align: left;
}

.order-summary {
    margin-bottom: 32px;
}

.order-summary hr {
    height: 2px;
    background-color: #FFF;
    border: none;
    border-radius: 2.5px;
    /* 讓線條變得更加圓潤 */
}

.order-title {
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

.order-item {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    padding: 10px;
    align-items: center;
    color: var(--Color-6, #FFF);
    font-size: 18px;
    font-family: "Noto Sans TC";
}

.order-item img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 12px;
        margin: 12px;
}
.product-info {
    display: flex;
    gap: 20px;
    align-items: center;
    font-weight: bold;
    color: var(--Color-6, #FFF);
    font-size: 18px;
}

.payment {
    background: var(--header-footer, #000354);
    width: 100%;
    max-width: 1000px;
    height: 200px;
    border-radius: 10px;
    flex-grow: 0;
    margin-bottom: 40px;
    font-family: "Noto Sans TC";

}

.payment h2 {
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}

.total {
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

.total hr {
    height: 2px;
    background-color: #FFF;
    border: none;
    border-radius: 2.5px;
    /* 讓線條變得更加圓潤 */
}

.count {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.shipping-fee {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.discount-fee {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.total-fee {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 20px;
}

.total-fee h3 {
    font-size: 20px;
    line-height: 1.6rem;
    flex-basis: 23%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}

.confirm {
    display: flex;
    width: 240px;
    margin: 0 auto;
    margin-bottom: 80px;
    gap: 56px;
    justify-content: center;
}

.confirm button {
    font-size: 16px;
    width: 120px;
    height: 40px;
    padding: 4px;
    border: none;
    border-radius: 50px;
    background: var(--Color-3, #FFEDBC);
    cursor: pointer;
}

.confirm button:hover{
    opacity: .9;
}

/* ==========RWD斷點============== */

@media screen and (max-width: 1040px) { 
    .content {
        width: 90%;
        max-width: 1000px;
    }
}

@media screen and (max-width: 780px) {

    
    .inner01 p {
        flex-basis: 25%;
        text-align: left;
    }

    .code-input{
        text-align: left;
        flex-basis: 75%;
    }

    .order-item img{
        width:50%;
        object-fit: contain;
        margin: 12px;
    }

    .order-header {
        display: grid;
        grid-template-columns: 4fr 1fr 1fr;
        padding: 10px;
        background-color: #7976BB;
        font-weight: bold;
        color: var(--Color-6, #FFF);
        font-size: 16px;
    }

    .order-item {
        display: grid;
        grid-template-columns: 4fr 1fr 1fr;
        padding: 1%;
        align-items: center;
        color: var(--Color-6, #FFF);
        font-size: 16px;
        font-family: "Noto Sans TC";
        gap: 1%;
    }

    .product-info[data-v-7b3db10d] {
        display: flex;
        gap: 0.5%;
    }

    .product-name{
        font-size: 16px;
    }

    .confirm {
        width: 90vw;
    }
    .confirm button{
        font-size: 16px;
        max-width: 120px;
        width: 90vw;
    }
}
</style>