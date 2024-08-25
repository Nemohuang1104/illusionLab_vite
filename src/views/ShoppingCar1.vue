<script setup>
    import header_nina from '../components/header_nina.vue';
</script>
<template>
    <div class="wrapper">
        <div class="header">
            <header_nina></header_nina>
        </div>
        <div class="contanier">
            <div class="order">
                <p class="title">訂單內容</p>
                <ul>
                    <li class="card">
                        <div class="picture">
                        <input type="checkbox" style="vertical-align:middle;">
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
            </div>
        </div>
        <hr>
        <div class="ProductAdd">
            <p>商品加購</p>
            <ul>
                <li class="pro">
                    <img src="../assets/img/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/img/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/img/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/img/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/img/Frame 71.jpg" alt="">
                    <p>繪本風格悠遊卡卡夾</p>
                    <div class="text">
                        <div class="price">
                        <span>NT$300</span>
                        </div>
                        <div class="icon"></div>
                    </div>
                </li>
                <li class="pro">
                    <img src="../assets/img/Frame 71.jpg" alt="">
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
        
    </div>
</template>



<style lang="scss" scoped>
    .wrapper{
        background: linear-gradient(125deg, #22247A 23.82%, #7976BB 101.34%);
    }
    .contanier{
        display: flex;
        width: 1000px;
        margin: 0 auto;
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
        width: 100%;
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
    .picture img{
        border-radius: 10px;
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
        margin: 0 auto;
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
    }
    .pro img{
        border-radius: 10px;
        width: 100%;
        max-width: 150px;
    }
</style>