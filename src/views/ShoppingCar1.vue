<script setup>

import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import Header_0 from '@/components/Header_0.vue';
const currentMode = ref('one');

import ShoppingStep from '@/components/ShoppingStep.vue';
import Footer from '@/components/Footer_0.vue';


const cartItems = ref([
    { name: '繪本風格帆布袋', quantity: 1, price: 590 }
]);


const productInfo = ref([
    // { id: '1', cardImage: '../src/assets/images/MS_Product1.svg', productName: '繪本風格悠遊卡卡夾', price: '300' },
    // { id: '2', cardImage: '../src/assets/images/MS_Product2.svg', productName: '繪本風格筆記本', price: '180' },
    // { id: '3', cardImage: '../src/assets/images/MS_Product3.svg', productName: '繪本風格帆布袋', price: '590' },
    // { id: '4', cardImage: '../src/assets/images/MS_Product4.svg', productName: '繪本風格小貼紙', price: '100' },
    // { id: '5', cardImage: '../src/assets/images/MS_Product5.svg', productName: '繪本風格悠遊抱枕', price: '990' },
    // { id: '6', cardImage: '../src/assets/images/MS_Product6.svg', productName: '繪本風格防摔手機殼', price: '1280' },
])




// ============ShoppingStep=============//
const highlight = ref({
    1: { background: '#fff', fontcolor: '#22247A' },
    2: { background: 'transparent', fontcolor: '#fff' },
    3: { background: 'transparent', fontcolor: '#fff' }

}
);





//在商品細項撈取商品資料
const carts = ref([]);
const route = useRoute();
const productDetail = ref(null);
const totalAmount = ref(0);


// 根據商品 ID 撈取商品細項資料
async function fetchShoppingCar1() {
    try {
        const productId = route.params.id; // 從路由獲取商品 ID
        const response = await fetch(`http://illusionlab.local/public/PDO/ProductData/ShoppingCar1.php?productId=${productId}`, {
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();

            console.log(data);

            carts.value = data;
            calculateTotal(); // 在獲取商品資料後計算總金額
        }
    } catch (error) {
        console.error('Error fetching product details:', error);
    }
}

// 計算總金額
const calculateTotal = () => {
    totalAmount.value = item.value.reduce((total, item) => {
        return total + (item.price * item.quantity); // 假設item有price和quantity屬性
    }, 0);
};

// 在mounted時獲取商品資料
onMounted(() => {
    fetchShoppingCar1(); // 撈取商品細項資料
});
// const addToCart = () => {
//   const userId = currentUser.id;
//   const productId = item.PRODUCT_ID;
//   const quantity = item.quantity;

//   console.log('userId:', userId);
//   console.log('productId:', productId);
//   console.log('quantity:', quantity); // 確認數據是否正確

//   const formData = new FormData();
//   formData.append('userId', userId);
//   formData.append('productId', productId);
//   formData.append('quantity', quantity);

//   fetch('ShoppingCar1.php', {
//     method: 'POST',
//     body: formData
//   })
//   .then(response => response.json())
//   .then(data => {
//     console.log('加入購物車成功:', data);
//   })
//   .catch(error => {
//     console.error('加入購物車失敗:', error);
//   });
// };
</script>
<template>
    <div class="wrapper">
        <div class="header">
            <Header_0 :mode="currentMode"></Header_0>
        </div>
        <div class="step">
            <ShoppingStep :styles="highlight"></ShoppingStep>
        </div>
        <div class="contanier">
            <div class="order">
                <p class="title">訂單內容</p>
                <ul v-if="carts.length > 0">
                    <li class="card" v-for="(item, key) in carts" :key="key">
                        <div class="product-info">
                            <input class="checkbox" type="checkbox">
                            <!-- <img src="../assets/images/product_ex.jpg" alt="商品圖片" class="product-image"> -->
                            <img :src="item.PRODUCT_IMG" alt="商品圖片" class="product-image">
                            <div class="description">
                                <span class="product-name">{{ item.PRODUCT_NAME }}</span>
                                <div class="input">
                                    <select name="" id="">
                                        <option value="0">規格</option>
                                        <option value="1">可愛動物區</option>
                                        <option value="2">內心小女孩</option>
                                        <option value="3">大人釋懷中</option>

                                    </select>
                                </div>
                            </div>
                            <!-- v-for="(item, index) in cartItems" -->
                            <div class="quantity-input">
                                <button class="quantity-button" id="minus6"
                                    @click="item.QUANTITY > 1 && item.QUANTITY--">-</button>
                                <input type="text" v-model="item.QUANTITY" min="1" />
                                <button class="quantity-button" id="plus6" @click="item.QUANTITY++">+</button>
                            </div>
                            <span class="des_span">NT$ {{ item.PRODUCT_PRICE * item.QUANTITY }} </span>
                            <img class="trash-can" src="../assets/images/trashcan.svg">
                        </div>

                    </li>
                </ul>
            </div>
            <div class="payment">
                <p>使用折扣碼</p>
                <input type="text" size="30">
                <div class="total">

                    <div class="count">
                        <h3>商品金額</h3>
                        <p>$590</p>
                    </div>

                    <div class="discount-fee">
                        <h3>折扣</h3>
                        <p>$0</p>
                    </div>
                    <hr>
                    <div class="total-fee">
                        <h3>總金額</h3>
                        <p>${{ totalAmount }}</p>
                    </div>
                </div>
                <div class="checkbutton">
                    <RouterLink to="/shop2">
                        <button class="check">結帳
                        </button>
                    </RouterLink>
                </div>
            </div>
        </div>
        <hr>
        <div class="ProductAdd">
            <p>商品加購</p>
            <ul class="addProduct_grid">
                <li class="pro" v-for="(item, index) in productInfo" :key="item.id">
                    <img :src="item.cardImage" alt="">
                    <p>{{ item.productName }}</p>
                    <div class="text">
                        <div class="price">
                            <span>NT${{ item.price }}</span>
                        </div>
                        <div class="icon">
                            <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <Footer></Footer>
    </div>
</template>



<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');


* {
    font-family: "Noto Sans TC";
}

.wrapper {
    background: linear-gradient(125deg, #22247A 23.82%, #7976BB 101.34%);
}



.step {
    padding-top: 50px;
}

.contanier {
    display: flex;
    width: 100%;
    max-width: 1000px;
    margin: 5% auto 0;
    justify-content: space-between;
}

.contanier p,
.contanier span {
    color: #FFFFFF;
}

.contanier p {
    margin-bottom: 10px;
}

.order .title {
    border-radius: 10px;
    background: #000354;
    color: #FFFFFF;
    font-size: 20px;
    font-style: normal;
    padding: 10px;
    width: 95%;
}

ul {
    list-style: none;
    margin-top: 10px;
}

.card {
    display: flex;
    align-items: center;
}

.trash-can {
    cursor: pointer;
    width: 100%;
    max-width: 20px;
}

// ======================

.product-info {
    width: 100%;
    display: grid;
    grid-template-columns: 0.5fr 1fr 2fr 1fr 1fr 1fr;
    padding: 10px;
    align-items: center;
    justify-items: center;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}

.product-name {
    line-height: 1.2;
}

.checkbox {
    appearance: none;
    /* 隱藏原始 checkbox */
    width: 100px;
    max-width: 16px;
    height: 16px;
    border: 1px solid #ffffff;
    /* 自定義背景色 */
    cursor: pointer;

    &:checked {
        background-color: rgba(255, 255, 255, 0);
        /* 選中後背景顏色 */
    }

    /* 打勾標記 */
    &:checked::after {
        // content: '✔'; /* 選中後顯示的符號 */
        content: '✓';
        display: block;
        text-align: center;
        line-height: 13px;
        color: #ffffff;
        /* 勾勾的顏色 */
        font-size: 16px;
    }
}

// ========================
.product-image {
    border-radius: 10px;
    // width: 100%;
    max-width: 120px;
}

.quantity-input {
    display: flex;
    align-items: center;
    justify-content: start;
}

.quantity-button {
    vertical-align: middle;
    display: inline-block;
    text-align: center;
    font-size: 16px;
    width: 40px;
    height: 16px;
    /* 將高度設置為 40px，與輸入框一致 */
    line-height: 16px;
    /* 將 line-height 設置為 40px，確保文字垂直居中 */
    background-color: #FFEDBC;
    /* 設置背景色，根據需求調整 */
    border: 0
}

.quantity-input>button:hover {
    background-color: #B36243;
    transition: 0.3s;
}

.quantity-input>input {
    display: inline-block;
    text-align: center;
    font-size: 16px;
    width: 50px;
    /* 適當調整寬度，使其與按鈕相匹配 */
    height: 20px;
    /* 將高度設置為 40px，與按鈕一致 */
    line-height: 20px;
    /* 將 line-height 設置為 40px，確保文字垂直居中 */
    background-color: #FFEDBC;
    /* 設置背景色，根據需求調整 */
    margin: 0 2px;
    /* 添加 margin 以確保輸入框與按鈕之間有適當的間距 */
    box-sizing: border-box;
    /* 確保 padding 和 border 不會影響元素的寬度 */
    border: 0;
    // margin-bottom: 80px;
}


.input {
    width: 100%;
    max-width: 94%;
    position: relative;
    margin-top: 10px;
    border: 0
}

.input select{
    width: 90%;
    height: 20px;
    line-height: 20px; 
    // border: 1px solid #ccc;
    border-radius: 6px;
    padding: 0 8px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
    appearance: none; 
    background: #FFEDBC; 
    vertical-align: baseline;
    cursor: pointer;
}

.input>select>option {
    line-height: 20px;
    vertical-align: middle;
    text-align: left;

}

.input::after {
    content: "▼";
    font-size: 16px;
    color: #B36243;
    position: absolute;
    right: 24px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
}

.input select:focus {
    // border-color: #B36243;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
    outline: none;
}

    .quantity-input > input {
        display: inline-block;
        text-align: center;
        font-size: 16px;
        width: 50px; 
        height: 20px; 
        line-height: 20px; 
        background-color: #FFEDBC;
        margin: 0 2px; 
        box-sizing: border-box; 
        border: 0;
        // margin-bottom: 80px;
    }
    .payment{
        border-radius: 10px;
        background:#000354;
        width: 100%;
        max-width: 400px;
        padding: 30px;
        flex-grow: 0;
        color: #FFFFFF;
    }
    .detail{
        width: 100%;
        color: #FFFFFF;
    }
    .payment hr{
        width: 100%;
        max-width: 400px;
        background-color: #FFFFFF;
        margin: 20px auto;
        height: 2px;
        border: none;
        border-radius: 2.5px;
    }
    
    .payment input{
        border-radius: 8px;
        border: 1px solid #FFFFFF;
        outline: none;
        /* 移除默認的黑框 */
        background: none;
        color: #ffffff; //文字顏色
        width: 100%;
        padding: 2px 5px;
        box-sizing: border-box; /* 確保 padding 不會改變 input 的寬度 */
    }

    // 結帳按鈕
    .check:hover{
        opacity: 0.9;
    }

// 商品確認按鈕
.payment button {
    border-radius: 5px;
    background: #FFEDBC;
    border: none;
    color: #58596D;
    font-size: 16px;
    font-style: normal;
    font-weight: 700;
    width: 100%;
    cursor: pointer;
    padding: 5px;
    margin-top: 15px;
}

.discount-fee {
    margin: 10px auto;
}

    .total{
        margin-top: 20px;
    }
    .count, .discount-fee, .total-fee{
        display: flex;
        justify-content: space-between;
    }
    .count p, .discount-fee p, .total-fee p{
        flex-basis: 0%;
    }
    .wrapper hr{
        background-color: #FFFFFF;
        margin: 20px auto;
        height: 2px;
        border: none;
        border-radius: 2.5px;
        width: 100%;
        max-width: 1000px;
    }
    // 下方加購

    .icon svg{
        width: 100%;
        max-width: 20px;
    }

    .icon svg:hover{
        color:#000354;
    }

    .ProductAdd{
        width: 100%;
        max-width: 1000px;
        margin: 3% auto;
        padding: 10px;
        color: #FFFFFF;
    }

.count,
.discount-fee,
.total-fee {
    display: flex;
    justify-content: space-between;
}

.count p,
.discount-fee p,
.total-fee p {
    flex-basis: 0%;
}

.wrapper hr {
    background-color: #FFFFFF;
    margin: 20px auto;
    height: 2px;
    border: none;
    border-radius: 2.5px;
    width: 100%;
    max-width: 1000px;
}

// 下方加購
.ProductAdd {
    width: 100%;
    max-width: 1000px;
    margin: 3% auto;
    padding: 10px;
    color: #FFFFFF;

    position: relative;
}

.addProduct_grid {
    display: grid;
    gap: 20px;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));

}

.ProductAdd p {
    margin-bottom: 25px;
}

// 價格&icon
.text {
    display: flex;
    justify-content: space-between;
}

.pro {
    cursor: pointer;
}

.pro p {
    margin: 20px auto;
    font-family: "Noto Sans TC";
    height: 4vh;
}

.pro img {
    border-radius: 10px;
    width: 100%;
    max-width: 150px;
}


// =====  RWD  =====

@media screen and (max-width: 1024px) {
    .contanier {
        width: 80%;
        gap: 20px;
    }

    .ProductAdd {
        width: 80%;
    }

    .payment {
        max-width: 300px;
        padding: 20px;
    }

    .input select {
        width: 80%;
        font-size: 14px;
    }

    .input::after {
        font-size: 14px;
    }

    .quantity-input>input {
        width: 40px;
    }

    .quantity-button {
        width: 30px;
    }

}


@media screen and (max-width: 900px) {

    .contanier {
        flex-direction: column;
        align-items: center;
    }

    .product-image {
        grid-column: 2/3;
        grid-row: 1/4;
    }


    .product-info {
        width: 100%;
        display: grid;
        grid-template-columns: 0.2fr 1.5fr 1.5fr 0.2fr;
        padding: 10px;
        align-items: center;
        justify-items: center;
        color: var(--Color-6, #FFF);
        font-family: "Noto Sans TC";
        grid-template-rows: 1fr 1fr 1fr;

    }

    .quantity-input {
        grid-column: 3/4;
        grid-row: 2/3;
        justify-self: start;
    }

    .des_span {
        grid-column: 3/4;
        grid-row: 3/4;
        align-self: start;
        justify-self: start;
    }

    .trash-can {
        grid-column: 4/5;
        grid-row: 3/4;
        justify-self: start;
    }

    .checkbox {
        grid-column: 1/2;
        grid-row: 2/3;
    }

    .description {
        grid-column: 3 / 4;
        grid-row: 1 / 2;
    }
}

@media screen and (max-width: 430px) {

    .quantity-input>input {
        width: 30px;
    }

    .quantity-button {
        width: 15px;
        font-size: 10px;
        font-weight: bold;
    }

    .product-info {
        padding: 0;
        gap: 5px;
    }

    .order .title {
        width: 100%;
    }


    .input::after {
        font-size: 12px;
    }

    .payment {
        max-width: 300px;
    }

    .addProduct_grid {
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr))
    }
}
</style>