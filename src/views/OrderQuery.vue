<script setup>
import Header_0 from '@/components/Header_0.vue';
import Footer_0 from '@/components/Footer_0.vue';
import { ref, computed} from 'vue';


</script>

<template>
    <!-- <div class="wrapper">
        <Header_0></Header_0>
        <div class="content">
            <div class="title">會員中心</div>
            <div class="tab">
                <RouterLink tag="div" to="/preview_wennie.html/Header_0" class="tab-item">會員資料</RouterLink>
                <RouterLink tag="div" to="/preview_wennie.html/Footer_0" class="tab-item">修改密碼</RouterLink>
                <RouterLink tag="div" to="" class="tab-item">訂單查詢</RouterLink>
                <RouterLink tag="div" to="" class="tab-item">退款查詢</RouterLink>
            </div> -->
            <!-- <div class="detail-order"> -->
                <div class="sub-tab">
                <RouterLink tag="div" to="/OrderQueryTicket" class="sub-tab-item">票券</RouterLink>
                <RouterLink tag="div" to="/OrderQueryProduct" class="sub-tab-item">商品</RouterLink>
                </div>
            

                <div class="replace">
                    <RouterView /> <!--對應的票券或商品訂單的組件會在這裡渲染-->
                    <!-- <div class="detail">
                        <div class="order-summary">
                            <div class="order-header">
                                <span>訂單編號</span>
                                <span>日期</span>
                                <span>金額</span>
                                <span>付款方式</span>
                                <span>付款狀態</span>
                                <span>收件人資訊</span>
                            </div>
                            <hr>
                            <div class="order-text">
                                <span>20240819001</span>
                                <span>2024-08-19</span>
                                <span>$17600</span>
                                <span>信用卡</span>
                                <span>已付款</span>
                                <span>詳細資訊</span>
                            </div>
                            <div class="confirm">
                                <button>查看明細</button>
                            </div>
                            
                            <div class="item-header">
                                <span>場次名稱</span>
                                <span>訂票數量</span>
                                <span>金額</span>
                            </div>
                            <div class="order-item">
                                <div class="product-info">
                                    <img src="../assets/images/life_casino_orderitem.png" alt="商品圖片" class="product-image">
                                    <div class="item-text">
                                        <p>人生賭場</p>
                                        <p>2024/08/19</p>
                                        <p>上午場</p>
                                    </div>
                                </div>
                                <span class="product-quantity">8</span>
                                <span class="product-price">$17600</span>
                            </div>
                        </div>
                    </div> -->

                </div>
            <!-- </div> -->
            
            

            
        <!-- </div>
        <Footer_0></Footer_0>
    </div> -->
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

.title{
    font-size: 28px;
    font-weight: 700;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    margin-bottom: 20px;
}

.tab{
    // border: 1px solid white;
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 40px;
}

.tab-item{
    
    text-align: center;
    vertical-align: baseline;
    font-size: 18px;
    font-weight: 600;
    color: #505050;
    width: 140px;
    height: 28px;
    line-height: 28px;
    padding: 4px;
    border: none;
    border-radius: 6px;
    background: var(--Color-3, #FFEDBC);
    cursor: pointer;
    
}

.tab-item:nth-child(3){
    background-color: #FCB600;
}


.sub-tab{
    // border: 1px solid white;
    width: 100%;
    max-width: 386px;
    display: flex;
    justify-content: space-between;
    
}

.sub-tab-item{
    text-decoration: none; /* 移除底線 */
    text-align: center;
    vertical-align: baseline;
    font-size: 18px;
    font-weight: 600;
    color: #505050;
    width: 190px;
    height: 40px;
    line-height: 40px;
    padding: 4px;
    border: none;
    border-radius: 10px 10px 0 0;
    background: var(--Color-3, #FFEDBC);
    cursor: pointer;
}

// .sub-tab-item:first-child{
//     background: var(--Color-3, #FCB600);
//     cursor: pointer;
// }

.router-link-active {
  font-weight: bold ; /* 選中狀態下的樣式 */
  background: #FCB600 ; /* 選中時的文字顏色 */
}

// ============訂單票券tab樣式開始
.detail-order{
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

// ============訂單票券tab樣式結束


@media screen and (max-width: 454px) { 

    .sub-tab-item{
        width: 42vw;
    }
}

</style>