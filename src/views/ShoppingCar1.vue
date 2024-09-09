<script setup>
    import Header_1 from '@/components/Header_0.vue';
    import ShoppingStep from '@/components/ShoppingStep.vue';
    import Footer from '@/components/Footer_0.vue';
    import { ref } from 'vue';

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
            <ShoppingStep :styles="highlight"></ShoppingStep>
        
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
                            
                            <div class="quantity-input">
                                <button class="quantity-button" id="minus6">-</button>
                                <input  type="text"  min="1" />
                                <button class="quantity-button" id="plus6" >+</button>
                            </div>
                            <span>$590</span>
                            <i class="fa-regular fa-trash-can"></i>
                        </div>
                        
                        <!-- <div class="picture">
                        <input type="checkbox">
                        <img src="../assets/img/Frame 47.jpg">
                        </div>
                        <p @click="text">繪本風格帆布袋</p>
                        <select name="" id=""></select>
                        <div class="quantity-input">
                            <button class="quantity-button" id="minus4">-</button>
                            <input id="input4" type="text" value="1" min="1" max="10" />
                            <button class="quantity-button" id="plus4">+</button>
                        </div>
                        <div class="price">
                            <span>$590</span>
                        </div> -->
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
            </div>
        </div>
        <hr>
        <div class="ProductAdd">
            <p>商品加購</p>
            <ul>
                <li class="pro">
                    <img src="../assets/images/Frame 47.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/imgags/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/images/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/imgags/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/imgags/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/imgags/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
            </ul>
        </div>
        <Footer></Footer>
    </div>
</template>



<style lang="scss" scoped>

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
    .order .title{
        border-radius: 10px;
        background: #000354;
        color: #FFFFFF;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        padding: 10px;
        align-items: center;
        width: 90%;
    }
    .order input{
        border: 0;
        background-color: none;
        height: 20px;
        color: #FFFFFF;
    }

    ul{
        list-style: none;
        margin-top: 10px;
    }
    .card{
        display: flex;
        align-items: center;
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
    .quantity-button {
        display: inline-block;
        text-align: center;
        font-size: 1.6rem;
        width: 40px;
        height: 28px;
        line-height: 28px;
        border: 0;
        color: #58596D;
        background: #FFEDBC;
    }
    .quantity-input > input {
        display: inline-block;
        text-align: center;
        font-size: 1.6rem;
        width: 40px;
        height: 26px;
        line-height: 26px;
        border: 0;
        color: #58596D;
        background: #FFEDBC;
    }

    .input{
    width: 100%;
    position: relative; 
    margin-bottom: 8px;
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
        line-height: 20px; 
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
    .payment {
        color: #FFFFFF;
        // justify-content:space-between;
    }
    
    .payment input{
        border-radius: 10px;
        border: #FFFFFF;
        background-color: #ffffff00;
    }
    .payment button{
        border-radius: 10px;
        background: #FFEDBC;
        border: none;
        color: #58596D;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        width: 100%;
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
    .ProductAdd{
        width: 100%;
        max-width: 1000px;
        margin: 3% auto;
        padding: 10px;
        color: #FFFFFF;
    }
    .ProductAdd ul{
        display: flex;
    }
    .ProductAdd p:first-child{
       margin: 10px;
    }    
    .pro{
        margin-right:20px;
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