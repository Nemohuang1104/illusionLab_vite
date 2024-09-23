<script setup>
import Header_0 from '@/components/Header_0.vue';
import Footer_0 from '@/components/Footer_0.vue';
import { ref, computed, onMounted } from 'vue';

// 用戶資料
const userInfo = ref({
  user_name: '',
  gender: '',
  email: '',
  phone_number: '',
  address: '',
  city: '',
  district: ''
});

// 從 sessionStorage 或其他地方取出 token
const token = sessionStorage.getItem('token');

// 請求會員資料
const getUserInfo = async () => {
  try {
    // 使用 FormData 傳送 token
    const formData = new FormData();
    formData.append('token', token);

    const response = await fetch('http://illusionlab.local/public/PDO/Login/GetUserInfo.php', {
      method: 'POST',
      body: formData
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const data = await response.json();
    if (data.status === 'success') {
      userInfo.value = data.data;
    } else {
      console.error('Error fetching user info:', data.message);
    }
  } catch (error) {
    console.error('Request failed:', error);
  }
};

// 在組件加載時發起請求
onMounted(() => {
  getUserInfo();
});

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
                <!-- <div class="membercard_rwd">
                    <img src="../assets/images/member_card_final.jpg" alt="">
                </div> -->
                <img  src="../assets/images/member_card_final.jpg" alt="">
                <div class="info">
                    <div class="inner01">
                        <p>姓名:</p>
                        <div class="code-input">
                            <div class="fill">
                                <input type="text" v-model="userInfo.user_name" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="inner02">
                        <p>性別:</p>
                        <div class="form-check">
                            <label class="custom-checkbox">
                                <input type="radio" name="gender" id="boy" value="male" v-model="userInfo.gender" disabled />
                                <span class="checkmark"></span>
                                <span class="text">男性</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="radio" name="gender" id="girl" value="female" v-model="userInfo.gender" disabled />
                                <span class="checkmark"></span>
                                <span class="text">女性</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="radio" name="gender" id="unknow" value="unknow" v-model="userInfo.gender" disabled />
                                <span class="checkmark"></span>
                                <span class="text">不公開</span>
                            </label>
                        </div>
                        
                    </div>
                    <div class="inner03">
                        <p>帳號:</p>
                        <div class="code-input">
                            <div class="fill">
                                <input type="text" v-model="userInfo.email" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="inner04">
                        <p>聯絡電話:</p>
                        <div class="code-input">
                            <div class="fill">
                                <input type="text" v-model="userInfo.phone_number" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="inner05">
                        <p>地址:</p>
                        <div class="code-input">
                            <div class="address-1">
                                <div class="fill">
                                    <input type="text" v-model="userInfo.city" disabled />
                                </div>
                                <div class="fill">
                                    <input type="text" v-model="userInfo.district" disabled />
                                </div>
                            </div>
                            
                            <div class="address-2">
                                <div class="fill">
                                    <input type="text" v-model="userInfo.address" disabled/>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="confirm">
                    <button>儲存</button>
            </div>
            
            <!-- <div class="confirm">
                <button>儲存</button>
            </div>


        </div>
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

.tab-item:first-child{
    background: #FCB600;
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
    max-width: 70%;
    max-height: 70%;
    object-fit: cover;
    border-radius: 12px;
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

.fill > select{
    /* border: 1px solid red; */
    width: 90.5%;
    height: 28px;
    background-color: #F7F7F7;
    border: 1px solid #F7F7F7;
    border-radius: 6px; 
    padding: 0 8px;
    font-size: 16px;
    color: #313131;
    transition: border-color 0.3s ease-in-out;
}

.fill > select:focus {
    border-color: #FCB600;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3); /* 暈染效果 */
    outline: none; /* 移除默認的黑框 */
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
    padding-left: 8%;
    padding-right: 5%;
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

.text{
    padding-left: 3px;
}


.confirm{
    
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 60px;
    display: none;
}

.confirm button{
    text-align: center;
    font-size: 18px;
    font-weight: 600;
    color: #505050;
    width: 140px;
    padding: 8px;
    border: none;
    background: var(--Color-2, #FCB600);
    border-radius: 20px;
    cursor: pointer;
}


/* ==========RWD斷點============== */

@media screen and (max-width: 1040px) { 
    .content{
        width: 85%;
    }

    .detail img{
        width:50%;
        object-fit: contain;
        margin: 12px;
    }
}

@media screen and (max-width: 780px) { 

    
    .detail{
        flex-direction: column;
        height: 100%;
        padding-bottom: 10%;
        padding-top: 4%;
    }

    .detail img{
        width:100%;
        // height: 200px;
        object-fit: cover;
        margin-bottom: 12%;
        // margin: 12px;
    }

    .info {
        flex-basis: 90%;
        margin: 0 auto;
        width: 76vw;
    }

    .code-input {
        flex-basis: 80%;
        width: 100%;
    }

    .fill{
        width: 100%;
    }

    .fill input{
        width: 96%;
        padding: 0px;
        padding-left: 8px;
    }

    .inner01 > p, .inner02 > p,.inner03 > p,.inner04 > p, .inner05 > p {
        font-size: 16px;
        flex-basis: 30%;
    }

   

    .address-1 {
        flex-basis: 80%;
        width: 54.5vw;
        display: flex;
        // gap: 10px;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .address-1 .fill {
        width: 27vw;
    }


    .address-1 .fill:last-child{
        /* border: 1px solid red; */
        display: flex;
        justify-content: end;
    }

}



</style>