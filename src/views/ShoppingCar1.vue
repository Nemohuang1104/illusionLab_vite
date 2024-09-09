<script setup>

    import { ref } from 'vue';
    import Header_1 from '@/components/Header_0.vue';
    import ShoppingStep from '@/components/ShoppingStep.vue';
    import Footer from '@/components/Footer_0.vue';

    const cartItems = ref([
    { name: '繪本風格帆布袋', quantity: 1, price: 590 }
]);


const productInfo = ref([
  {id:'1',cardImage: '../src/assets/images/LC_Product_item1.svg',productName:'奢華金杯',price:'599'},
  {id:'2',cardImage: '../src/assets/images/LC_Product_item2.svg',productName:'賭聖帽T',price:'1099'},
  {id:'3',cardImage: '../src/assets/images/LC_Product_item3.svg',productName:'暗黑撲克牌組',price:'299'},
  {id:'4',cardImage: '../src/assets/images/LC_Product_item4.svg',productName:'幸運骰子',price:'99'},
  {id:'5',cardImage: '../src/assets/images/LC_Product_item5.svg',productName:'必勝籌碼',price:'199'},
  {id:'6',cardImage: '../src/assets/images/LC_Product_item6.svg',productName:'賭城帆布袋',price:'599'},


]) 

// ============ShoppingStep=============//
const highlight = ref({
    1:{  background : '#fff', fontcolor : '#22247A' },
    2:{  background : 'transparent', fontcolor : '#fff' },
    3:{  background : 'transparent', fontcolor : '#fff' }

    }
  );
</script>
<template>
    <div class="wrapper">
        <div class="header">
            <Header_1></Header_1>
        </div>
        <div class="step">
            <ShoppingStep :styles="highlight"></ShoppingStep>
        </div>
        <div class="contanier">
            <div class="order">
                <p class="title">訂單內容</p>
                <ul>
                    <li class="card">
                        <div class="product-info">
                            <input type="checkbox">
                            <img src="../assets/images/product_ex.jpg" alt="商品圖片" class="product-image">
                            <div class="description">
                                <span class="product-name">繪本風格帆布袋</span>
                                <div class="input">
                                    <select name="" id="">
                                        <option value="0">規格</option>
                                        <option value="1">可愛動物區</option>
                                        <option value="2">內心小女孩</option>
                                        <option value="3">大人釋懷中</option>

                                    </select>
                                </div>
                            </div>
                            
                            <div class="quantity-input"  v-for="(item, index) in cartItems">
                                <button class="quantity-button" id="minus6"
                                    @click="item.quantity > 1 && item.quantity--">-</button>
                                <input type="text" v-model="item.quantity" min="1" />
                                <button class="quantity-button" id="plus6" @click="item.quantity++">+</button>
                            </div>
                            <span>$590</span>
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
                        <p>$590</p>
                    </div>
                </div>
                <div class="checkbutton">
                    <Routerlink to="/shop2">
                        <button class="check">商品確認
                        </button>
                    </Routerlink>
                </div>
            </div>
        </div>
        <hr>
        <div class="ProductAdd">
            <p>商品加購</p>
            <ul class="addProduct_grid" >
                <li class="pro" v-for="(item, index) in productInfo" :key="item.id">
                    <img :src="item.cardImage" alt="">
                    <p>{{ item.productName }}</p>
                    <div class="text">
                        <div class="price">
                        <span>NT${{ item.price }}</span>
                        </div>
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.<path fill="#ffffff" d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48l45.5 0c3.8 0 7.1 2.7 7.9 6.5l51.6 271c6.5 34 36.2 58.5 70.7 58.5L488 384c13.3 0 24-10.7 24-24s-10.7-24-24-24l-288.3 0c-11.5 0-21.4-8.2-23.6-19.5L170.7 288l288.5 0c32.6 0 61.1-21.8 69.5-53.3l41-152.3C576.6 57 557.4 32 531.1 32L360 32l0 102.1 23-23c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-64 64c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l23 23L312 32 120.1 32C111 12.8 91.6 0 69.5 0L24 0zM176 512a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm336-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/></svg>                        </div>
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
    .wrapper{
        background: linear-gradient(125deg, #22247A 23.82%, #7976BB 101.34%);
    }
    
    .contanier{
        display: flex;
        width: 1000px;
        margin: 5% auto 0;
        justify-content: space-between;
    }
    .contanier p, .contanier span{
        color: #FFFFFF;
    }

    .contanier p{
        margin-bottom: 10px;
    }

    .order .title{
        border-radius: 10px;
        background: #000354;
        color: #FFFFFF;
        font-size: 20px;
        font-style: normal;
        padding: 10px;
        width: 90%;
    }
    .order input{
        border: 0;
        background-color: none;
        height: 20px;
        // color: #FFFFFF;
    }

    ul{
        list-style: none;
        margin-top: 10px;
    }
    .card{
        display: flex;
        align-items: center;
    }

    .trash-can{
        cursor: pointer;
    }
    // ======================

    .product-info{
        width: 100%;
        display: grid;
        gap: 10px;
        grid-template-columns: 0.5fr 1fr 2fr 1fr 1fr 1fr;
        padding: 10px;
        align-items: center;
        color: var(--Color-6, #FFF);
        font-size: 18px;
        font-family: "Noto Sans TC";
    }
    // ========================
    .product-image{
        border-radius: 10px;
        // width: 100%;
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


    .input{
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

    }

    .input > select > option {
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

    .quantity-input {
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .quantity-button {
        display: inline-block;
        text-align: center;
        font-size: 1.6rem;
        width: 40px;
        height: 20px; 
        // line-height: 20px; 
        background-color: #FFEDBC; 
        border: 0;
    }

    .quantity-input > button:hover {
        background-color: #B36243;
        transition: 0.3s;
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
        width: 400px;
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
        border-radius: 5px;
        border: #FFFFFF;
        outline: none;
        /* 移除默認的黑框 */
    }


    // 商品確認按鈕
    .payment button{
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

    .discount-fee{
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
        margin: 20px auto;
    }
    // 下方加購
    .ProductAdd{
        width: 100%;
        max-width: 1000px;
        margin: 3% auto;
        padding: 10px;
        color: #FFFFFF;
    }
    .addProduct_grid{
        display: flex;
        gap:20px;

    }
    .ProductAdd p{
       margin-bottom: 25px;
    }    
    // 價格&icon
    .text{
        display: flex;
        justify-content: space-between;
    }

    .pro{
        cursor: pointer;
    }

    .pro p{
        margin: 20px auto;
        font-family: "Noto Sans TC";
    }
    .pro img{
        border-radius: 10px;
        width: 100%;
        max-width: 150px;
    }

   
</style>