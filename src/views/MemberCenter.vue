<script setup>
import Header_0 from '@/components/Header_0.vue';
import Footer_0 from '@/components/Footer_0.vue';
import { ref, computed } from 'vue';
</script>

<template>
    <div class="wrapper">
        <Header_0></Header_0>
        <div class="content">
            <div class="title">會員中心</div>
            <div class="tab">
                <RouterLink tag="div" to="/Member" class="tab-item">會員資料</RouterLink>
                <RouterLink tag="div" to="/change-password" class="tab-item">修改密碼</RouterLink>
                <RouterLink tag="div" to="/order-query" class="tab-item">訂單查詢</RouterLink>
                <RouterLink tag="div" to="/refund-query" class="tab-item">退款查詢</RouterLink>
            </div>
            <div class="replace">
                <RouterView />
            </div>
            
            
            <!-- <div class="confirm">
                <button>儲存</button>
            </div> -->


        </div>
        <Footer_0></Footer_0>
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
    text-decoration: none; /* 移除底線 */
    text-align: center;
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

// .tab-item:first-child{
//     background: #FCB600;
// }

.router-link-active {
  font-weight: bold ; /* 選中狀態下的樣式 */
  background: #FCB600 ; /* 選中時的文字顏色 */
}

.detail{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    height: 350px;
    border-radius: 10px;
    background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
    margin-bottom: 32px;
}

.detail img{
    display: block;
    margin: auto 6%;
    max-width: 90%;
    max-height: 90%;
    object-fit: cover;
}

.info{
    flex-basis: 50%;
    
    
    
}

.inner01{
    /* border: 1px solid red; */
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;

}

.inner01 > p{
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: #313131;
    font-family: "Noto Sans TC";

}

.inner02{
    display: flex;
    align-items: center;
    justify-content: space-between;
    
    margin-bottom: 24px;
    

    
}

.form-check{
    display: flex;
    flex-basis: 80%;
}

.inner02 > p{
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: #313131;
    font-family: "Noto Sans TC";


}

.inner03{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;

    
}

.inner03 > p{
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: #313131;
    font-family: "Noto Sans TC";


}

.code-input{
    flex-basis: 80%;
    
}

.inner04{
    display: flex;
    align-items: start;
    justify-content: space-between;
    margin-bottom: 24px;

    
}

.inner04 > p{
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: #313131;
    font-family: "Noto Sans TC";


}

.inner05{
    display: flex;
    align-items: start;
    justify-content: space-between;

    
}

.inner05 > p{
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: #313131;
    font-family: "Noto Sans TC";


}

// input輸入欄位樣式開始

.fill > input{
    /* border: 1px solid red; */
    width: 80%;
    height: 28px;
    background-color: #F7F7F7;
    border: 1px solid #F7F7F7;
    border-radius: 6px; 
    padding: 0 8px;
    font-size: 16px;
    color: #313131;
    transition: border-color 0.3s ease-in-out;
}

.fill > input:focus {
    border-color: #FCB600;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3); /* 暈染效果 */
    outline: none; /* 移除默認的黑框 */
}

.address-1{
    flex-basis: 80%;
    width: 89%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 16px;

}

.address-1 .fill{
    flex-basis: 80%;
}

.address-1 .fill > input{
    /* border: 1px solid red; */
    width: 80%;
    height: 28px;
    background-color: #F7F7F7;
    border: 1px solid #F7F7F7;
    border-radius: 6px; 
    // padding: 0 8px;
    font-size: 16px;
    color: #313131;
    transition: border-color 0.3s ease-in-out;
}

// input輸入欄位樣式結束

.custom-checkbox input[type="radio"] ,.custom-checkbox input[type="checkbox"]{
    display: none;
}

/* 自訂的 checkbox 外觀 */
.custom-checkbox {
    /* border: 1px solid red; */

    display: inline-block;
    position: relative;
    padding-left: 28px;
    padding-right: 36px;
    cursor: pointer;
    font-size: 16px;
    color: #313131;
    vertical-align: middle;
    user-select: none;
    font-family: "Noto Sans TC";
}

/* checkbox 的方塊 */
.custom-checkbox .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background-color: #FFEDBC;
    border: 2px solid #FFEDBC;
    
}

/* checkbox 被勾選時的樣式 */
.custom-checkbox input:checked + .checkmark {
    border-radius: 50%;
    background-color: #FCB600;
    border: 2px solid #FCB600;
}

/* 自訂的勾號 */
.custom-checkbox .checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* 勾號的樣式 */
.custom-checkbox input:checked + .checkmark:after {
    display: none;
}

/* 勾號的圖案 */
.custom-checkbox .checkmark:after {
    left: 4px;
    top: 0px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
}



.confirm{
    
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 60px;
}

.confirm button{
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 140px;
    height: 28px;
    line-height: 28px;
    border: none;
    background: var(--Color-2, #FCB600);
    border-radius: 6px;
    cursor: pointer;
}

</style>