<script setup>
import { ref, computed } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';

const router = useRouter();



// 表单字段
const email = ref('');
const password = ref('');


// 错误信息
const emailError = ref('');
const passwordError = ref('');


 // 表單提交
 const onSubmit = async () => {
 

  // 確認沒有錯誤後再發送請求
  if (!emailError.value && !passwordError.value) {
    try {
      // 建立 FormData 物件
      const formData = new FormData();
      formData.append('email', email.value);
      formData.append('password', password.value);

      // 使用 FormData 發送 POST 請求
      const response = await axios.post(`http://illusionlab.local/public/PDO/Login/LoginCMS.php`, formData, {
        headers: {
          'Content-Type': 'multipart/form-data' // 設定標頭為 FormData
        }
      });

      // 成功登入
      if (response.data.status === 'success') {
        

        Swal.fire({
          icon: 'success',
          title: '歡迎進入幻浸實驗室後台管理中心',
          timer: 1200,
          backdrop: false,
            willOpen: () => {
                document.body.style.paddingRight = '0';
              }
        })
        router.push('/CenterCMS');

      } else {
        // 登入失敗，顯示錯誤訊息
        Swal.fire({
          icon: 'error',
          title: response.data.message, // 後端傳回的訊息
          timer: 1500,
          backdrop: false,
            willOpen: () => {
                document.body.style.paddingRight = '0';
              }
        });
      }
    } catch (error) {
      // 處理請求錯誤
      Swal.fire({
        icon: 'error',
        title: '登入失敗，請確認是否註冊。',
        timer: 1500,
        showConfirmButton: false,
        backdrop: false,
            willOpen: () => {
                document.body.style.paddingRight = '0';
              }
      });
    }
  } else {
    // 如果表單有錯誤
    Swal.fire({
      icon: 'warning',
      title: '請重新檢視表單',
      timer: 1200,
      showConfirmButton: false,
      backdrop: false,
            willOpen: () => {
                document.body.style.paddingRight = '0';
              }
    });
  }
};

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
                        <input type="text" v-model="email"/>
                    </div>
                </div>
            </div>
            <div class="inner01">
                <p>密碼:</p>
                <div class="code-input">
                    <div class="fill">
                        <input type="password"  v-model="password"/>
                    </div>
                </div>
            </div>
            <div class="confirm">
                    <button @click="onSubmit">登入</button>
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
    height: 32px;
    line-height: 28px;
    border: none;
    background: var(--Color-2, #FCB600);
    border-radius: 6px;
    cursor: pointer;
}


</style>