<script setup>
import Header_0 from '@/components/Header_0.vue';
import Footer_0 from '@/components/Footer_0.vue';
import { ref } from 'vue';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';

// 管理密碼的輸入值
const oldPassword = ref('');
const newPassword = ref('');
const confirmPassword = ref('');
const errorMessage = ref('');
const token = sessionStorage.getItem('token'); // 從 sessionStorage 取 token

// 檢查密碼並執行保存邏輯
const savePassword = async () => {
  // 清除之前的錯誤或成功訊息
  errorMessage.value = '';

  // 基本檢查條件
  if (!oldPassword.value || !newPassword.value || !confirmPassword.value) {
    errorMessage.value = '請填寫所有欄位。';
    return;
  }
  if (newPassword.value !== confirmPassword.value) {
    errorMessage.value = '新密碼與確認密碼不一致。';
    return;
  }
  if (newPassword.value.length < 6) {
    errorMessage.value = '新密碼至少需6位字符。';
    return;
  }

  // 發送 API 請求，將新密碼送至後端更新
  try {
    const response = await fetch(`http://illusionlab.local/public/PDO/Login/UpdatePassword.php`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        token: token,
        oldPassword: oldPassword.value,
        newPassword: newPassword.value,
        confirmPassword: confirmPassword.value,
      }),
    });

    const result = await response.json();

    if (result.status === 'success') {
      // 使用 SweetAlert 顯示成功的彈窗
      Swal.fire({
        position: "center",
        icon: "success",
        title: "密碼已成功修改！",
        showConfirmButton: true
      }).then(() => {
        // 清除輸入欄位的資料
        oldPassword.value = '';
        newPassword.value = '';
        confirmPassword.value = '';
        // 成功後可以執行跳轉或其他邏輯
        // router.push('/home');
      });
    } else {
      // 顯示錯誤彈窗
      Swal.fire({
        position: "center",
        icon: "error",
        title: result.message,
        showConfirmButton: false,
        timer: 1200
      }).then(() => {
        // 清除輸入欄位的資料
        oldPassword.value = '';
        newPassword.value = '';
        confirmPassword.value = '';
        // 成功後可以執行跳轉或其他邏輯
        // router.push('/home');
      });
    }
  } catch (error) {
    console.error('Error:', error);
    Swal.fire({
      position: "center",
      icon: "error",
      title: '發生錯誤，請稍後再試',
      showConfirmButton: false,
      timer: 1200
    });
  }
};
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
                <input type="password" placeholder="請輸入舊密碼" v-model="oldPassword" />
              </div>
            </div>
          </div>
          <div class="inner">
            <div class="code-input">
              <div class="fill">
                <input type="password" placeholder="請輸入新密碼" v-model="newPassword" />
              </div>
            </div>
          </div>
          <div class="inner">
            <div class="code-input">
              <div class="fill">
                <input type="password" placeholder="再次輸入新密碼" v-model="confirmPassword" />
              </div>
            </div>
          </div>
          <div class="confirm">
            <button @click="savePassword">儲存</button>
          </div>
          <!-- 顯示錯誤訊息 -->
          <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
        </div>
      </div>
    <!-- </div>
    <Footer_0></Footer_0>
  </div> -->
</template>


<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');

/* 加入一些基本的錯誤訊息樣式 */
.error-message {
  color: red;
  margin-top: 10px;
}

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