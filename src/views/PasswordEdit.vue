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
                <RouterLink tag="div" to="/Member" class="tab-item">會員資料</RouterLink>
                <RouterLink tag="div" to="/change-password" class="tab-item">修改密碼</RouterLink>
                <RouterLink tag="div" to="" class="tab-item">訂單查詢</RouterLink>
                <RouterLink tag="div" to="" class="tab-item">退款查詢</RouterLink>
            </div> -->
            <div class="detail">
                <div class="info">
                    <div class="inner">
                        <div class="code-input">
                            <div class="fill">
                                <input type="text" placeholder="請輸入舊密碼"/>
                            </div>
                        </div>
                    </div>
                    <div class="inner">
                        <div class="code-input">
                            <div class="fill">
                                <input type="text" placeholder="請輸入新密碼"/>
                            </div>
                        </div>
                    </div>
                    <div class="inner">
                        <div class="code-input">
                            <div class="fill">
                                <input type="text" placeholder="再次輸入新密碼"/>
                            </div>
                        </div>
                    </div>
                    <div class="confirm">
                        <button>儲存</button>
                    </div>
                </div>    
            </div>
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
    font-size: 20px;
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
    margin-bottom: 20px;
}

.tab-item{
    text-align: center;
    vertical-align: baseline;
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 140px;
    height: 20px;
    line-height: 20px;
    padding: 4px;
    border: none;
    border-radius: 6px;
    background: var(--Color-3, #FFEDBC);
    cursor: pointer;
    
}

.tab-item:nth-child(2){
    background-color: #FCB600;
}

.detail{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 350px;
    border-radius: 10px;
    background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
    margin-bottom: 32px;
}

.info{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    // justify-content: space-between;
}

.inner{
    /* border: 1px solid red; */
    
    margin-bottom: 24px;
}

// input輸入欄位樣式開始

.fill > input{
    /* border: 1px solid red; */
    width: 92%;
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


// 按鈕樣式
.confirm{
    display: flex;
    width: 240px;
    margin: 0 auto;
    gap: 56px;
    justify-content: center;
}

.confirm button{
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 160px;
    height: 40px;
    padding: 4px;
    border: none;
    border-radius: 50px;
    background: var(--Color-3, #FCB600);
    cursor: pointer;

}


</style>