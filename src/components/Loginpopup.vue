<!-- Loginpopup.vue -->
<script setup>
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';
import axios from 'axios';
import { ref, defineEmits, defineProps, computed } from 'vue';
import { useRouter } from 'vue-router';

const props = defineProps({
  redirect: {
    type: String,
    default: ''
  }
});

const redirectLink = computed(() => {
  if (props.redirect) {
    return { path: '/SignUp', query: { redirect: props.redirect } };
  }
  return '/SignUp';
});

const router = useRouter();
const emit = defineEmits(['login-success', 'close-popup']);

// 表单字段
const email = ref('');
const password = ref('');

// 错误信息
const emailError = ref('');
const passwordError = ref('');

// 電子信箱驗證規則
const checkEmail = () => {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email.value) {
    emailError.value = '請輸入電子郵件';
  } else if (!emailRegex.test(email.value)) {
    emailError.value = '請輸入有效的電子郵件';
  } else {
    emailError.value = '';
  }
};

// 密碼驗證規則
const checkPassword = () => {
  const passwordRegex = /^[a-zA-Z][a-zA-Z0-9_]{7,16}$/;
  if (!password.value) {
    passwordError.value = '請輸入密碼';
  } else if (password.value.length < 8) {
    passwordError.value = '密碼須為(數字+英文8-16位，開頭字母必須是英文字母)';
  } else if (!passwordRegex.test(password.value)) {
    passwordError.value = '請輸入有效的密碼(數字+英文8-16位，開頭字母必須是英文字母)';
  } else {
    passwordError.value = '';
  }
};

// 忘記密碼功能（可根據需求實現）
const forgotPassword = () => {
  Swal.fire({
    title: "請輸入電子信箱",
    input: "email",
    inputLabel: "Your email address",
    inputPlaceholder: "請輸入電子信箱"
  }).then((result) => {
    if (result.isConfirmed) {
      // 處理忘記密碼邏輯
      Swal.fire({
        position: "center",
        icon: "success",
        title: "已寄送信件至您的電子信箱中",
        showConfirmButton: false,
        timer: 1500
      });
    }
  });
};

// 表單提交
const onSubmit = async () => {
  checkEmail();
  checkPassword();

  if (!emailError.value && !passwordError.value) {
    try {
      const formData = new FormData();
      formData.append('email', email.value);
      formData.append('password', password.value);

      const response = await axios.post('http://illusionlab.local/public/PDO/Login/Login.php', formData, {
        headers: { 'Content-Type': 'multipart/form-data' }
      });

      if (response.data.status === 'success') {
        const token = response.data.token;
        sessionStorage.setItem('token', token);

        Swal.fire({
          icon: 'success',
          title: '歡迎進入幻浸實驗室',
          timer: 1200,
          showConfirmButton: false,
        }).then(() => {
          emit('login-success'); // 發出登入成功事件
          emit('close-popup'); // 關閉彈窗
          // 不再自動跳轉，父組件會處理
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: response.data.message,
          timer: 1500,
          showConfirmButton: false,
        });
      }
    } catch (error) {
      Swal.fire({
        icon: 'error',
        title: '登入失敗，請確認是否註冊。',
        timer: 1500,
        showConfirmButton: false,
      });
    }
  } else {
    Swal.fire({
      icon: 'warning',
      title: '請重新檢視表單',
      timer: 1200,
      showConfirmButton: false,
    });
  }
};
</script>

<template>
  <main>
    <h1>會員登入</h1>
    <div class="form">
      <span v-if="emailError" class="error">{{ emailError }}</span>
      <input type="text" placeholder="請輸入您的電子信箱" class="text" v-model="email" @blur="checkEmail">

      <span v-if="passwordError" class="error">{{ passwordError }}</span>
      <input type="password" placeholder="請輸入您的密碼" class="text" v-model="password" @blur="checkPassword">

      <a href="#" class="forgot" @click="forgotPassword">忘記密碼 ?</a>
      <button @click="onSubmit" class="login">登入</button>

      <p>其他登入方式</p>
      <div class="other">
        <a href=""><img src="../assets/images/icon-facebook.svg" alt=""></a>
        <a href=""><img src="../assets/images/icon-google.svg" alt=""></a>
      </div>
      <p>還不是會員? 前往註冊</p>
      <router-link :to="redirectLink"><input type="submit" value="註冊" class="signup"></router-link>
    </div>
  </main>
</template>



<style lang="scss" scoped>
@import "../assets/SASS/basic/color";

main{
width: 520px;
height: auto;
border-radius: 20px;
border: 1px solid  map-get($colorfont_0,white);
background: linear-gradient(146deg, rgba(255, 255, 255, 0.70) 2.68%, rgba(255, 255, 255, 0.70) 96.55%);
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
backdrop-filter: blur(50px);
margin: 50px auto 20px;
position: absolute;
top: 50px;
left:calc(50vw - (520px/2));
}

h1{
color: #fff;
text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
font-family: "Noto Sans TC";
font-size: 32px;
font-weight: 700;
text-align: center;
margin-top: 20px;
}

.form{
width: 360px;
margin: 0 auto;
margin-top: 20px;
}

.form .text{
width: 340px;
height: 36px;
font-size: 16px;
border-radius: 80px;
border: 1px solid #FFF;
box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
background-color: transparent;
padding-left: 20px;
margin-bottom: 12px;
outline: none;
margin-top: 4px;
}

.error{
  font-size: 12px;
  color: #000354;
  padding-left: 10px;
}

.form .text:focus{
border: 1px solid #7976BB;
}

.form .forgot{
display: block;
text-align: right;
margin-bottom: 16px;
text-decoration: none;
font-size: 16px;
color: #505050;
}

.form p{
font-size: 16px;
color: #505050;
text-align: center;
margin-bottom: 16px;
}

.form .login{
width: 360px;
height: 36px;
border-radius: 80px;
border: 1px solid #FFF;
background: rgba(255, 255, 255, 0.70);
box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
font-size: 16px;
color: #505050;
margin-bottom: 20px;
cursor: pointer;
}

.form .login:hover{
color: #505050;
background-color: #fff;
}

.form .other{
text-align: center;
}

.form img{
margin: 0px 12px 12px;
}


.form .signup{
width: 360px;
height: 36px;
border-radius: 80px;
border: 1px solid #FFF;
background: rgba(255, 255, 255, 0.70);
box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
font-size: 16px;
color: #505050;
cursor: pointer;
margin-bottom: 50px;
}

.form .signup:hover{
color: #505050;
background-color:#fff;
}


//========================RWD=================================
@media screen and (max-width:1000px){
  .form{
    width: 270px;
  }
  .form .text{
    width: 250px;
  }

 .form .login,.form .signup{
    width: 270px;
  }
}

@media screen and (max-width:800px){
  main{
    width: 350px;
    top: 50px;
    left:calc(50vw - (350px/2));
    background: linear-gradient(146deg, rgba(255, 255, 255, 0.90) 2.68%, #7976BB 96.55%);
  }

  h1{
    color: #7976BB;
  }
}
</style>
