<script setup>
import Header_0 from '../components/Header_0.vue';
const currentMode = ref('one');
import Footer_0 from '../components/Footer_0.vue';
import vSelect from 'vue-select';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';

import { ref, computed } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import tw_cities from '../data/TwCities.json';

const citySelect = ref([]);
const selected = ref('');
const isRotating = ref(false);
const router = useRouter();
const route = useRoute();





//表單資訊
const email = ref('');
const password = ref('');
const confirmPassword = ref('');
const phone = ref('');
const gender = ref('');
const name = ref('');
const address = ref('');

const selectedCity = ref('');      // 新增縣市選擇
const selectedDistrict = ref('');  // 新增鄉鎮選擇


// 錯誤訊息
const emailError = ref('');
const passwordError = ref('');
const confirmPasswordError = ref('');
const phoneError = ref('');
const genderError = ref('');
const nameError = ref('');
const captchaError = ref('');
const addressError = ref('');

// const cities = tw_cities;
// 城市選擇
const cities = tw_cities;
const selectedDistricts = computed(() => {
  const cityObj = cities.find(city => city.name === selectedCity.value);
  return cityObj ? cityObj.districts : [];
});

//驗證信箱
const validateEmail = () => {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (!email.value) {
    emailError.value = '請輸入電子郵件'
  } else if (!emailPattern.test(email.value)) {
    emailError.value = '請輸入有效的電子郵件'
  } else {
    emailError.value = ''
  }
};

// 驗證密碼
const validatePassword = () => {
  const passwordRegex = /^[a-zA-Z][a-zA-Z0-9_]{7,16}$/;
  if (!password.value) {
    passwordError.value = '密碼不能為空'
  } else if (password.value.length < 8 || password.value.length > 16) {
    passwordError.value = '密碼必須是8到16位之間'
  } else if (!passwordRegex.test(password.value)) {
    passwordError.value = '請輸入有效的密碼(數字+英文8-16位，開頭字符必須是英文字母)';
  } else {
    passwordError.value = '';
  }
};

// 確認密碼
const validateConfirmPassword = () => {
  // const passwordRegex = /^[a-zA-Z][a-zA-Z0-9_]{7,16}$/;
  if (!confirmPassword.value) {
    confirmPasswordError.value = '請確認密碼'
  } else if (confirmPassword.value !== password.value) {
    confirmPasswordError.value = '兩次輸入的密碼不一致'
  } else {
    confirmPasswordError.value = ''
  }
};

//驗證性別
const validateGender = () => {
  if (!gender.value) {
    genderError.value = '請選擇性別'
    return false
  }
  genderError.value = ''
  return true
};

//驗證姓名
const validateName = () => {
  if (!name.value) {
    nameError.value = '姓名不能為空'
    return false
  }
  nameError.value = ''
  return true
};

// 驗證電話
const validatePhone = () => {
  const phonePattern = /^[0-9]{10}$/
  if (!phone.value) {
    phoneError.value = '電話不能為空'
  } else if (!phonePattern.test(phone.value)) {
    phoneError.value = '無效的電話號碼，請輸入10位數字'
  } else {
    phoneError.value = ''
  }
};

//驗證地址
const validateAddress = () => {
  if (!selectedCity.value || !selectedDistrict.value || !address.value) {
    addressError.value = '地址不能為空'
    return false
  }
  addressError.value = ''
  return true
};

// 驗證碼產生
const generateCaptcha = () => {
  return Math.floor(1000 + Math.random() * 9000).toString(); // 確保是四位數字
};
const captcha = ref(generateCaptcha());  // 初始生成驗證碼
const captchaInput = ref('');// 存放使用者輸入的驗證碼
              
const validateCaptcha = () => {
  if (!captchaInput.value) {
    captchaError.value = '驗證碼不能為空'
    return false
  } else if (captchaInput.value !== captcha.value) {
    captchaError.value = '驗證碼不正確'
    return false
  }
  captchaError.value = ''
  return true
};


const refreshCaptcha = () => {
  isRotating.value = true;              // 啟動旋轉效果

  setTimeout(() => {
    captcha.value = generateCaptcha();  // 更新驗證碼
    isRotating.value = false;           // 停止旋轉效果
    captchaInput.value = '';               // 清空使用者輸入
  }, 500); // 旋轉1秒後更新
};

const register = () => {
  validateEmail()
  validatePassword()
  validateConfirmPassword()
  validatePhone()
  validateName()
  validateGender()
  validateCaptcha()
  validateAddress()
  validateCaptcha()

  // 檢查驗證碼是否正確
  if (captchaInput.value === captcha.value 
  && !emailError.value 
  && !passwordError.value 
  && !confirmPasswordError.value 
  && !phoneError.value
  && !genderError.value
  && !nameError.value
  && !addressError.value
  && !captchaError.value
  ) {
    const formData = new FormData();
    formData.append('username', name.value);
    formData.append('email', email.value);
    formData.append('password', password.value);
    formData.append('repassword', confirmPassword.value);
    formData.append('phoneNumber', phone.value);
    formData.append('gender', gender.value);
    formData.append('address', address.value);
    formData.append('city', selectedCity.value);
    formData.append('district', selectedDistrict.value);

    // 發送 POST 請求到後端
    fetch('http://illusionlab.local/public/PDO/Login/Register.php', {
      method: 'POST',
      body: formData,
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "註冊成功！商品折價券60元已匯入您的帳戶，開始您的幻浸之旅吧!",
          showConfirmButton: true,
          // timer: 10000
        }).then(() =>  {
          // 根據是否有 redirect 參數決定跳轉路由
          if (route.query.redirect) {
            // 將 redirect 參數傳遞給登入頁面
  
            router.push({ path: '/login', query: {redirect: route.query.redirect } });

          } // 根據是否有 redirect 參數決定跳轉路由
          else  {
            // 導回小測驗頁面並添加 showLogin=true
            router.push({ path: '/login', query: { showLogin: 'true' } });
          } 
    
        });
      } else {
        Swal.fire({
          position: "center",
          icon: "error",
          title: data.message,
          showConfirmButton: false,
          timer: 1200
        });
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  } else {
    Swal.fire({
      position: "center",
      icon: "warning",
      title: "請重新檢視表單",
      showConfirmButton: false,
      timer: 1200
    });
  }
};

</script>

<template>
  <div class="wrapper">
    <!-- 頁首 -->
    <Header_0 :mode="currentMode" class="header"></Header_0>

    <!-- 中間會員註冊區 -->
    <main>
      <!-- 表格區塊 -->
      <div class="form">
        <h1>會員註冊</h1>

        <!-- 信箱密碼 -->
        <div class="id">
          <!-- 信箱錯誤時出現的訊息 -->
          <span v-if="emailError" class="error">{{ emailError }}</span>

          <input type="text" placeholder="請輸入您的信箱" 
          v-model="email"
          @blur="validateEmail">

          <!-- 密碼錯誤時出現的訊息 -->
          <span v-if="passwordError" class="error">{{ passwordError }}</span>

          <input type="password" placeholder="請輸入數字+英文8-16位，開頭須為英文字母" 
          v-model="password"
          @blur="validatePassword">

          
          <!-- 密碼錯誤時出現的訊息 -->
          <span v-if="confirmPasswordError" class="error">{{ confirmPasswordError }}</span>

          <input type="password" placeholder="請再次輸入密碼" 
          v-model="confirmPassword"
          @blur="validateConfirmPassword">

          
        </div>

        <!-- 性別 -->
         <!-- 錯誤訊息 -->
         <span v-if="genderError" class="error" >{{ genderError }}</span>
        <div class="gender">
          <input type="radio" name="gender" id="boy" value="male" v-model="gender"  @blur="validateGender">
          <label for="boy">男</label>
          <input type="radio" name="gender" id="girl" value="female" v-model="gender"  @blur="validateGender">
          <label for="girl">女</label>
          <input type="radio" name="gender" id="unknow" value="unknow" v-model="gender"  @blur="validateGender">
          <label for="unknow">不公開</label>
        </div>

        <!-- 姓名&連絡電話 -->
        <div class="name">
          <!-- 錯誤訊息 -->
          <span v-if="nameError" class="error" >{{ nameError }}</span>
          <input type="text" placeholder="請輸入姓名" v-model="name" @blur="validateName">
          <br>

          <!-- 電話錯誤時出現的訊息 -->
          <span v-if="phoneError" class="error" >{{ phoneError }}</span>
          <input type="text" placeholder="請輸入連絡電話" 
          v-model="phone" @blur="validatePhone">
          
        </div>

        <div class="city">
          <div>
            <v-select 
            label="name"
              :reduce="option => option.name"
              placeholder="請選擇縣市" 
              :options="cities" 
              class="custom-v-select" 
              v-model="selectedCity"
              @input="selectedDistrict.value = ''">
              </v-select>
          </div>
          <div>
            <!-- :reduce="option => option.name"，確保選擇的是字串，而不是物件 -->
            <v-select  class="custom-v-select" 
              :reduce="option => option.name"
              label="name" 
              placeholder="請選擇鄉鎮" 
              v-model="selectedDistrict"
              :options="selectedDistricts">
              
              </v-select>
          </div>
        </div>

        <div>
          <span v-if="addressError" class="error">{{ addressError }}</span>
          <input type="text" placeholder="請輸入地址" class="address" v-model="address" @blur="validateAddress">

          <!-- 輸入驗證碼 -->
          <span v-if="captchaError" class="error">{{ captchaError }}</span>
          <div class="random">
            <input v-model="captchaInput" type="text" placeholder="請輸入認證碼" @blur="validateCaptcha">
            <!-- <span class="number">3456</span> -->
            <p>{{ captcha }}</p>
            <img @click="refreshCaptcha" :class="{ rotating: isRotating }" src="../assets/images/icon-change.svg"
              alt="">
          </div>
          <router-link >
          <button class="button" @click="register">註冊</button>
          </router-link>
          <!-- <input type="submit" value="註冊" class="button" @click="register"> -->
        </div>
      </div>
    </main>

    

  </div>
  <Footer_0></Footer_0>
</template>




<style lang="scss" scoped>
@import "../assets/SASS/basic/color";


.wrapper {
  background: map-get($color_0, bgc_blue);
  background-repeat: no-repeat;
  width: 100%;
  font-family: "Noto Sans TC";
  padding-top: 80px;
  height: auto;
  min-height: 100vh;
  padding-bottom: 50px;
}

.header{
  position: fixed;
  top: 0;
  left: 0;
  z-index: 50;
}

main {
  width: 520px;
  border-radius: 20px;
  border: 1px solid #FFF;
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.80) 2.33%, rgba(255, 255, 255, 0.50) 97.83%);
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  backdrop-filter: blur(12.5px);
  margin: 0 auto;
  margin-top: 10px;
}

.form {
  width: 340px;
  margin: 0 auto;
  margin-top: 20px;
  box-sizing: border-box;
}

.form h1 {
  color: #FFF;
  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  font-family: "Noto Sans TC";
  font-size: 32px;
  font-weight: 700;
  text-align: center;
  margin-bottom: 12px;
}

.form .id input {
  width: 340px;
  height: 32px;
  font-size: 16px;
  border-radius: 80px;
  border: 1px solid #FFF;
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  background-color: transparent;
  padding-left: 20px;
  margin-bottom: 10px;
  outline: none;
  box-sizing: border-box;
  margin-top: 4px;
}

.error{
  font-size: 12px;
  color: #000354;
  padding-left: 10px;
  margin-bottom: 4px;
}

.form .gender {
  display: flex;
  align-items: end;
  padding-left: 10px;
  margin-bottom: 10px;
  margin-top: 4px;
}

.form .gender input {
  width: 18px;
  height: 18px;
  margin: 0;
}

.form label {
  font-size: 16px;
  color: #505050;
  margin-left: 8px;
  margin-right: 32px;
}

.form .name input {
  width: 340px;
  height: 32px;
  font-size: 16px;
  border-radius: 80px;
  border: 1px solid #FFF;
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  background-color: transparent;
  padding-left: 20px;
  margin-bottom: 10px;
  outline: none;
  box-sizing: border-box;
  margin-top: 4px;
}



.form .address {
  width: 340px;
  height: 32px;
  font-size: 16px;
  border-radius: 80px;
  border: 1px solid #FFF;
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  background-color: transparent;
  padding-left: 20px;
  margin-bottom: 10px;
  outline: none;
  box-sizing: border-box;
  margin-top: 4px;
}

.form .random {
  margin-bottom: 12px;
}

.form .random>input {
  width: 156px;
  height: 32px;
  font-size: 16px;
  border-radius: 80px;
  border: 1px solid #FFF;
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  background-color: transparent;
  padding-left: 20px;
  outline: none;
  box-sizing: border-box;
  margin-top: 4px;
}

.random p {
  display: inline-block;
  width: 132px;
  height: 32px;
  border: 2px solid #7976BB;
  border-radius: 12px;
  line-height: 32px;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  color: #505050;
  margin-left: 8px;
  font-family: Arial, Helvetica, sans-serif;
  user-select: none;
}

.random img {
  margin-left: 8px;
  cursor: pointer;
  transition: transform 1s ease;
}

.random img.rotating {
  transform: rotate(270deg);
  /* 旋轉360度 */
  
}

.form a {}

.form button {
  width: 340px;
  height: 32px;
  font-size: 16px;
  color: #505050;
  border-radius: 80px;
  border: 1px solid #FFF;
  background-color: rgba(255, 255, 255, 0.70);
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  margin-bottom: 50px;
  cursor: pointer;
  outline: none;
  box-sizing: border-box;
}

.form button:hover {
  background-color: #fff;
  color: #505050;
}

.form .id input:focus{
  border: 1px solid #7976BB;
}

.form .name input:focus{
  border: 1px solid #7976BB;
}

.form .address:focus{
  border: 1px solid #7976BB;
}

.form .random > input:focus{
  border: 1px solid #7976BB;
}



//================================RWD==========================
@media screen and (max-width:600px){
  main{
    width: 90vw;
  }
  .form,.form .id input,.form .name input,.form .address{
    width: 300px;
  }

  .form button{
    width: 300px;
    padding-left: 0;
  }
  
  .form .random > input{
    width: 130px;
  }
  .random p{
    width: 110px;
  }

  .custom-v-select{
    width: 140px;
  }







}
</style>
<!-- =================================縣市下拉選單======================================== -->
<style lang="scss">
.city {
  display: flex;
  justify-content: space-between;
}

.vs__selected {
  color: #505050 !important;
}

.custom-v-select {
  width: 160px;
  height: 32px;
  font-size: 16px;
  border-radius: 80px;
  color: #505050;
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  background-color: rgba(255, 255, 255, 0.70);
  margin-bottom: 10px;
  appearance: none;
  text-align: center;
  cursor: pointer;
  outline: none;
  border: 1px solid #fff;
}

.vs__dropdown-toggle{
  border: none;
}

.vs__search,
.vs__search:focus {
  text-align: center;
}

//==========================sweetalert====================================
#swal2-title.swal2-title{
  font-size: 20px !important;
}


</style>