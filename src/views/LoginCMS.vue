<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function goToCenterCMS(){
    router.push('/CenterCMS');
}

</script>

<template>
    <div class="wrapper">
        <img src="../assets/images/lab_logo.png" alt="">
        <p>幻浸實驗室後台管理</p>
        <div class="info">
            <div class="inner01">
                <p>帳號:</p>
                <div class="code-input">
                    <div class="fill">
                        <input type="text" />
                    </div>
                </div>
            </div>
            <div class="inner01">
                <p>密碼:</p>
                <div class="code-input">
                    <div class="fill">
                        <input type="text" />
                    </div>
                </div>
            </div>
            <div class="confirm">
                    <button @click="goToCenterCMS">登入</button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');

.wrapper{
    background: linear-gradient(134deg, #22247A 23.77%, #7976BB 100.56%);
    height: 100vh;
}

.wrapper img{
    display: block;
    margin: 0 auto;
    margin-bottom: 2%;
    padding-top: 8%;
    max-width: 30%;
    max-height: 30%;
    object-fit: cover;
    border-radius: 12px;
}

.wrapper p{
    text-align: center;
    font-size: 32px;
    line-height: 36px;
    flex-basis: 20%;
    color: #fff;
    font-family: "Noto Sans TC";
}


.info{
    margin: 0 auto;
    margin-top: 2%;
    width: 100%;
    max-width: 300px;
}

.inner01{
    /* border: 1px solid red; */
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;

}

.inner01 > p{
    font-size: 20px;
    line-height: 16px;
    flex-basis: 20%;
    color: #fff;
    font-weight: 300;
    font-family: "Noto Sans TC";

}

.code-input{
    flex-basis: 80%;
    
}

// input輸入欄位樣式開始

.fill > input{
    /* border: 1px solid red; */
    width: 93%;
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


.confirm{
    
    width: 100%;
    display: flex;
    justify-content: right;
    align-items: center;
    margin-bottom: 60px;
}

.confirm button{
    text-align: center;
    font-size: 20px;
    font-weight: 600;
    color: #505050;
    width: 240px;
    height: 28px;
    line-height: 28px;
    border: none;
    background: var(--Color-2, #FCB600);
    border-radius: 6px;
    cursor: pointer;
}


</style>