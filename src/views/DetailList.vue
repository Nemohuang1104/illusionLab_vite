<script setup>
import { ref } from 'vue';
import Header_2 from '@/components/Header_2.vue';
import Footer_2 from '@/components/Footer_2.vue';




</script>

<template>
    <div>
        <Header_2></Header_2>
    </div>
    <div class="warpper">
        <div class="title">
            <h1>精選商品</h1>
            <p>PRODUCTS</p>
        </div>
        <div aria-label="Breadcrumb">
            <ul class="breadcrumb">
                <li><a href="#">星際邊境</a></li>
                <li><a href="#">星際邊境商品頁</a></li>
            </ul>
        </div>
        <div class="pboxout">
            <div class="pbox">
                <div class="pimg"><img src="../assets/images/productscup.png" alt=""></div>
                <div>
                    <div class="textbox">
                        <p>商品編號 : MS001</p>
                        <h3>太空金屬杯</h3>
                        <p>NT $ 299 </p>
                        <div class="leftlight">
                            <p>作者 : Dandy · Syike </p>
                            <p>與知名插畫家DoMeDo聯名推出</p>
                        </div>
                        <p>材質：雙層鈦金屬</p>
                        <p>商品規格 : 寬 7.5 cm x 高 10 cm</p>
                    </div>
                    <div class="rightdown">
                        <div class="but">
                            <input type="button" value=" - " class="sub">
                            <div class="counter" id="counter">1</div>
                            <input type="button" value=" + " class="add">
                        </div>
                        <div class="size">
                            <select name="size-select" id="">
                                <option value="----- 商品尺寸 -----">----- 商品尺寸 -----</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>

                        <p>加入購物車</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
        <Footer_2></Footer_2>
    </div>
</template>



<style lang="scss" scoped>



.warpper {
    font-family: "Noto Serif SC";
    max-width: 1440px;
    width: 100%;
    height: 600px;
    margin: 0 auto;
    // border: 1px solid red;
    background-image: url(../assets/images/STBackground.png);
    // border: 1px solid red;
 
    text-align: center;


}

//標題
.title {
    max-width: 1440px;
    width: 100%;
    padding-top: 10px;
    margin-bottom: 20px;



}


.title h1 {
    font-size: 40px;
    font-weight: 700;
    margin-bottom: 5px;

    background: -webkit-linear-gradient(90deg, #078FF2 2.12%, #0FF 50.65%, #5BCAE8 93.64%);
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;

}




.title p {
    font-size: 20px;
    font-weight: 700;
    background: -webkit-linear-gradient(90deg, #078FF2 2.12%, #0FF 50.65%, #5BCAE8 93.64%);
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
}

//麵包屑

.breadcrumb {
    list-style: none;
    display: flex;
    padding-left: 22%;

}

.breadcrumb li {
    margin-right: 8px;
    color: #FFFFFF;
}

.breadcrumb li a {
    text-decoration: none;
    color: #ffffff;
}

.breadcrumb li::after {
    content: '>';
    margin-left: 8px;
}

.breadcrumb li:last-child::after {
    content: '';
    /* Remove the last separator */
}

//商品照片及價格框
.pboxout{
    // border: 1px solid red;
    max-width: 1440px;
    width: 100%;
    // height: 800px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.pbox {
    // border: 1px solid red;
    max-width: 700px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

//左側商品照片
.pimg img {
    width: 250px;
    height: 330px;
    border-radius: 12px;
}

//右側上方文字框
.textbox {
    // border: 1px solid red;
    width: 240px;
    // height: 150px;

    // background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
    color: #fff;
    overflow: hidden;
    line-height: 30px;
    text-align: left;
}

.leftlight{
    border-left:5px solid #132C79;
    line-height: 20px;
    padding-left: 10px;
}

.textbox h3 {
    font-size: 32px;
    color:#C1693B;
    font-weight: bold;
}

.textbox p {
    font-size: 16px;
    color: #FFFFFF;
}

.btn {
    flex-direction: row;
}

//數量增減
.but {
    // border: 1px solid red;
    display: flex;
    justify-content: space-between;
    line-height: 50px;
    width: 300px;
    height: 40px;
    line-height: 40px;

    margin-bottom: 20px;
    border-radius: 12px;


    color: #fff;
    outline: none;
    background-color: black;
    border: 1px solid #ffffff;
    outline: none;

}

.counter {
    color: #FFFFFF;
    font-size: 25px;
}

.sub {
    border-radius: 40px 0px 0px 40px;
    color: #ffffff;
    background-color: transparent;
    font-size: 30px;
    border: none;
}

.add {
    border-radius: 40px 0px 0px 40px;
    color: #ffffff;
    background-color: transparent;
    font-size: 30px;
    border: none;
}

//尺寸下拉式選單
.size select {
    width: 300px;
    height: 40px;
    border-radius: 12px;
    display: block;
    text-align: center;
    line-height: 40px;
    margin-bottom: 20px;
    font-size: 20px;
    color: #fff;
    outline: none;
    background-color: black;
    border: 1px solid #fff;
    border: linear-gradient(180deg, rgba(19, 44, 121, 0.80) 44.5%, rgba(7, 143, 242, 0.70) 100%);

}

//將select箭頭刪掉 
.size select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

}

.size option {
    color: #fff;
}

//加入購物車
.rightdown p {
    width: 300px;
    height: 50px;
    border-radius: 40px;
    display: block;
    text-align: center;
    line-height: 50px;
    // display: flex;
    // justify-content: center;
    // align-items: center;


    text-decoration: none;
    font-size: 28px;
    color: #fff;
    background: linear-gradient(180deg, rgba(19, 44, 121, 0.80) 44.5%, rgba(7, 143, 242, 0.70) 100%);
}
</style>