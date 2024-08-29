<script setup>

</script>
<<<<<<< HEAD
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
                        <input class="inputtext" type="text" value="2024/08/28">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">訂單編號 : </p>
                        <input class="inputtext" type="text" value="TC202408281522">
                    </div>
                </div>

                <div class="orderinf">
                    <div class="orderdiv">
                        <p class="ptext">會員帳號 : </p>
                        <input class="inputtext" type="text" value="ping@gmail.com">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext"> 收件人姓名 : </p>
                        <input class="inputtext" type="text" value="Doremi">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">收件人手機 : </p>
                        <input class="inputtext" type="text" value="0918989889">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">收件人地址 : </p>
                        <input class="inputtext" type="text" value="台北市中山區南京東路三段219號4F">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">付款方式 : </p>
                        <input class="inputtext" type="text" value="信用卡">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">公司抬頭 : </p>
                        <input class="inputtext" type="text" value="緯育股份有限公司">
                    </div>
                    <div class="orderdiv">
                        <p class="ptext">統一編號 : </p>
                        <input class="inputtext" type="text" value="22552211">
                    </div>
                </div>

                <div>
                    <div class="textdown">
                        <p>訂單場次明細</p>
                        <div class="titlename">
                            <p class="eventname">場次名稱</p>
                            <p class="quantity">訂票數量</p>
                            <p class="price">價格</p>
                        </div>
                    </div>
                    <div class="textdetail">
                        <img src="" alt="">
                        <div>
                            <p>人生賭場</p>
                            <p>2024/08/09</p>
                            <p>上午場</p>
                        </div>
                        <p>8</p>
                        <p> $17,600</p>
                    </div>
                    <div class="total">
                        <div class="orderdiv">
                            <p class="ptext1">小計 : </p>
                            <input class="inputtext1" type="text" value="$17,600">
                        </div>
                        <div class="orderdiv">
                            <p class="ptext1">折扣碼 : </p>
                            <input class="inputtext1" type="text" value="$100">
                        </div>
                        <div class="orderdiv">
                            <p class="ptext1">訂單總金額 : </p>
                            <input class="inputtext1" type="text" value="$17,500">
                        </div>
                    </div>

                </div>
                <div class="fill">
                    <button class="butleft">儲存</button>
                    <button class="butright">顯示全部</button>
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

=======



<template>
    <div>
>>>>>>> f997e5236cf370e04e954ca3a392b6560d8a71f5

    </div>
</template>



<style lang="scss" scoped>
<<<<<<< HEAD
//popup的外框樣式
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');

.wrapper {
    background-color: blue;
}

.detail {
    // display: flex;
    margin: 0 auto;
    align-items: center;
    justify-content: center;
    width: 900px;
    height: 900px;
    border-radius: 10px;
    padding: 16px;
    padding-left: 20px;
    padding-right: 20px;

    background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
    margin-bottom: 20px;

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
    padding: 10px;
    border: 1px solid #FFFFFF;
    border-radius: 8px;
    flex-shrink: 0;
}

.orderinf1 {

    display: flex;
    align-items: center;

    max-width: 800px;
    width: 100%;
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
    max-width: 800px;
    width: 100%;
    padding: 1%;
    // border: 1px solid red;
    gap: 20%;
    flex-wrap: wrap;
    margin-bottom: 20px;

}



.orderdiv {
    display: flex;
    margin-bottom: 2%;
}



// 下表


.textdown>p {
    margin-bottom: 10px;
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

.titlename {
    background-color: #22247A;
    color: #FFFFFF;
    height: 35px;
    display: flex;
    align-items: center;
    flex-direction: row;
    padding-left: 10px;
}



.eventname {

    margin-right: 300px;
}

.quantity {
    margin-right: 150px;
}

.inputtext1 {
    outline: none;
    padding: 10px;
    border: 1px solid #FFFFFF;
    border-radius: 8px;
    flex-shrink: 0;
    text-align: right;
}

.textdetail {
    border: 1px solid red;
    background: linear-gradient(136deg, #FFFFFF 23.13%, rgba(255, 255, 255, 0.30) 97.6%);
}


//按鈕
.fill {
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
}

.butleft {
    width: 100px;
    height: 35px;
    background-color: #FCB600;
    color: block;
    font-weight: bold;
    border-radius: 8px;
    border: none;
    font-size: 20px;
}

.butright {
    width: 100px;
    height: 35px;
    background-color: #FFEDBC;
    color: block;
    font-weight: bold;
    border-radius: 8px;
    border: none;
    font-size: 20px;
}
=======

>>>>>>> f997e5236cf370e04e954ca3a392b6560d8a71f5
</style>