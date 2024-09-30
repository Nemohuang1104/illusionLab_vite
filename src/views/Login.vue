<script setup>
import Header_0 from '../components/Header_0.vue';
const currentMode = ref('one');
import Footer_0 from '../components/Footer_0.vue';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';
import axios from 'axios';

import { ref, computed } from 'vue';
import { useRouter, useRoute } from 'vue-router';
//===========================================================
import { auth, GoogleAuthProvider, signInWithPopup } from "../firebase";
//===============================================================


// export default {
//   setup() {
const router = useRouter();
const route = useRoute();
// 表单字段
const email = ref('');
const password = ref('');

// 错误信息
const emailError = ref('');
const passwordError = ref('');

//===================================
const loginError = ref(null);
//=============================


// 電子信箱驗證規則 (簡單驗證)
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

// 密碼驗證規則 (至少 8 個字符)
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

//忘記密碼
const forgotPassword = () => {
  // Swal.fire({
  //   title: "請輸入電子信箱",
  //   input: "text",
  //   inputAttributes: {
  //     autocapitalize: "off"}
  // })
  const { value: email } = Swal.fire({
    title: "請輸入電子信箱",
    input: "email",
    inputLabel: "Your email address",
    inputPlaceholder: "請輸入電子信箱"
  })
    .then(() => {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "已寄送信件至您的電子信箱中",
        showConfirmButton: false,
        timer: 1500
      })
    })
};

//===========================google=======================================
const handleGoogleLogin = async () => {
  loginError.value = null;
  const provider = new GoogleAuthProvider();

  try {
    const result = await signInWithPopup(auth, provider);
    const user = result.user;

    // 取得使用者資料
    const userName = user.displayName;
    const userEmail = user.email;

    // 登入成功後可將資料發送到後端 API
    await sendUserDataToBackend(userEmail, userName);

  } catch (error) {
    loginError.value = "Google 登入失敗，請稍後再試。";
    console.error("登入錯誤:", error);
  }
};

    // 發送使用者資料到後端 API
    const sendUserDataToBackend = async (email, name) => {
      try {
        const response = await fetch(`http://illusionlab.local/public/PDO/Login/GoogleLogin.php`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({ mem_account: email, mem_name: name })
        });

    const result = await response.json();
    console.log("後端回應:", result);

    if (result.memInfo.mem_state === 0) {
      loginError.value = "登入失敗，請聯繫客服人員。";
    } else {
      // 處理登入成功邏輯，例如保存 token 或跳轉
      console.log("登入成功，重定向...");
    }
  } catch (error) {
    console.error("後端 API 錯誤:", error);
  }
};
//================================================================================

//=============================PHP===================================
// 表單提交
const onSubmit = async () => {
  checkEmail();     // 驗證電子郵件
  checkPassword();  // 驗證密碼

  // 確認沒有錯誤後再發送請求
  if (!emailError.value && !passwordError.value) {
    try {
      // 建立 FormData 物件
      const formData = new FormData();
      formData.append('email', email.value);
      formData.append('password', password.value);

      // 使用 FormData 發送 POST 請求
      const response = await axios.post(`http://illusionlab.local/public/PDO/Login/login.php`, formData, {
        headers: {
          'Content-Type': 'multipart/form-data' // 設定標頭為 FormData
        }
      });

      // 成功登入
      if (response.data.status === 'success') {
        const token = response.data.token;  // 從後端獲取 token
        // sessionStorage.setItem('authToken', token);  // 將 token 儲存在 sessionStorage
        sessionStorage.setItem('token', response.data.token);


        Swal.fire({
          icon: 'success',
          title: '歡迎進入幻浸實驗室',
          timer: 1200
        }).then(async () => {
          // 檢查是否有 redirect 參數

          const redirectPath = route.query.redirect;
          if (route.query.redirect === 'littlequiz' ) {
            if (token) {
              try {
                // 先執行 SetQuizCompleted.php
                const setQuizResponse = await axios.post(`http://illusionlab.local/public/PDO/Login/SetQuizCompleted.php`, {}, {
                  headers: {
                    'Authorization': `Bearer ${token}`
                  }
                });

                if (setQuizResponse.data.status === 'success') {
                  sessionStorage.setItem('quizCompleted', 'true');
                  console.log('測驗完成標記已更新。');

                  // 再執行 GetTicketCoupon.php
                  const couponResponse = await axios.post(`http://illusionlab.local/public/PDO/Login/GetTicketCoupon.php`, {}, {
                    headers: {
                      'Authorization': ` Bearer ${token}`
                    }
                  });

                  if (couponResponse.data.status === 'success') {
                    // Swal.fire({
                    //   icon: 'success',
                    //   title: `您的折扣碼是: ${couponResponse.data.discountCode}`,
                    //   timer: 2500,
                    //   showConfirmButton: false,
                    // });
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: couponResponse.data.message,
                      timer: 2500,
                      showConfirmButton: false,
                    });
                  }
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: setQuizResponse.data.message,
                    timer: 2500,
                    showConfirmButton: false,
                  });
                }
              } catch (error) {
                console.error(error);
                Swal.fire({
                  icon: 'error',
                  title: '操作失敗，請稍後再試。',
                  timer: 2500,
                  showConfirmButton: false,
                });
              }
            }
            router.push({ path: '/LittleQuizResult' });
          } else if (redirectPath) {
            // 如果有 redirect，跳轉到該路徑
            router.push(redirectPath);
          }
          else {
            // 否則跳轉至 導向會員中心
            router.push('/MemberCenter');
          }


        }

        );
      } else {
        // 登入失敗，顯示錯誤訊息
        Swal.fire({
          icon: 'error',
          title: response.data.message, // 後端傳回的訊息
          timer: 1500
        });
      }
    } catch (error) {
      // 處理請求錯誤
      Swal.fire({
        icon: 'error',
        title: '登入失敗，請確認是否註冊。',
        timer: 1500,
        showConfirmButton: false,
      });
    }
  } else {
    // 如果表單有錯誤
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
  <div class="wrapper">
    <!-- 頁首 -->
    <Header_0 :mode="currentMode" class="header"></Header_0>

    <!-- 中間會員登入區塊 -->
    <main>

      <h1>會員登入</h1>
      <!-- 表格區塊 -->
      <div class="form">
        <!-- 信箱錯誤時出現的訊息 -->
        <span v-if="emailError" class="error">{{ emailError }}</span>

        <input type="text" placeholder="請輸入您的電子信箱" class="text" v-model="email" @blur="checkEmail">

        <!-- 密碼錯誤時出現的訊息 -->
        <span v-if="passwordError" class="error">{{ passwordError }}</span>

        <input type="password" placeholder="請輸入您的密碼" class="text" v-model="password" @blur="checkPassword">

        <div></div>
        <!--忘記密碼 -->
        <a href="#" class="forgot" @click="forgotPassword">忘記密碼 ?</a>

        <button @click="onSubmit" class="login">登入</button>

        <div v-if="loginError" class="error">{{ loginError }}</div>
        <p>其他登入方式</p>
        <div class="other">
          <!-- <a href=""><img src="../assets/images/icon-facebook.svg" alt=""></a> 
      <a href=""><img src="../assets/images/icon-google.svg" alt=""></a> -->
          <img src="../assets/images/icon-facebook.svg" alt="">
          <img src="../assets/images/icon-google.svg" alt="" @click="handleGoogleLogin">
        </div>
        <p>還不是會員? 前往註冊</p>
        <router-link :to="{ path: '/SignUp', query: { redirect: route.query.redirect } }"><input type="submit"
            value="註冊" class="signup"></router-link>
      </div>

    </main>

    <!-- 頁尾 -->

  </div>
  <Footer_0></Footer_0>
</template>


<style lang="scss" scoped>
@import "../assets/SASS/basic/color";

.wrapper {
  background: map-get($color_0, bgc_blue);
  background-repeat: no-repeat;
  width: 100%;
  min-height: 100vh;
  height: auto;
  font-family: "Noto Sans TC";
  padding-top: 80px;
  padding-bottom: 30px;
}

.header {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 20;
}

main {
  width: 520px;
  border-radius: 20px;
  border: 1px solid map-get($colorfont_0, white);
  background: map-get($color_0, bgc_white);
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  backdrop-filter: blur(12.5px);
  margin: 0 auto;
  margin-top: 30px;
  margin-bottom: 20px;
}

h1 {
  color: #FFF;
  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  font-family: "Noto Sans TC";
  font-size: 32px;
  font-weight: 700;
  text-align: center;
  margin-top: 20px;
}

.form {
  width: 360px;
  margin: 0 auto;
  margin-top: 20px;
}

.form .text {
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

.error {
  font-size: 12px;
  color: #000354;
  padding-left: 10px;
}

.form .text:focus {
  border: 1px solid #7976BB;
}

.form .forgot {
  display: block;
  text-align: right;
  margin-bottom: 16px;
  text-decoration: none;
  font-size: 16px;
  color: #505050;
}

.form p {
  font-size: 16px;
  color: #505050;
  text-align: center;
  margin-bottom: 16px;
}

button {
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

.form .login:hover {
  color: #505050;
  background-color: #fff;
}

.form .other {
  text-align: center;
  cursor: pointer;
}

.form img {
  margin: 0px 12px 12px;
}


.form .signup {
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

.form .signup:hover {
  color: #505050;
  background-color: #fff;
}

//==========================RWD=========================
@media screen and (max-width:1000px) {
  .form {
    width: 270px;
  }

  .form .text {
    width: 250px;
  }

  .form .login,
  .form .signup {
    width: 270px;
  }
}

@media screen and (max-width:800px) {
  main {
    width: 350px;
  }
}
</style>