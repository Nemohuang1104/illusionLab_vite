<script setup>
import Header_0 from '../components/Header_0.vue';
import Footer_0 from '../components/Footer_0.vue';
import vSelect from 'vue-select';

import { ref } from 'vue';
import { useRouter } from 'vue-router';
import tw_cities from '../data/TwCities.json';

const citySelect = ref([]);
const selected = ref('');
const isRotating = ref(false);
const router = useRouter();

const cities = tw_cities;

const generateCaptcha = () => {
  return Math.floor(1000 + Math.random() * 9000).toString(); // 確保是四位數字
};

const captcha = ref(generateCaptcha());  // 初始生成驗證碼
const userInput = ref('');               // 存放使用者輸入的驗證碼

const refreshCaptcha = () => {
  isRotating.value = true;              // 啟動旋轉效果

  setTimeout(() => {
    captcha.value = generateCaptcha();  // 更新驗證碼
    isRotating.value = false;           // 停止旋轉效果
    userInput.value = '';               // 清空使用者輸入
  }, 500); // 旋轉1秒後更新
};

const register = () => {
  // 檢查驗證碼是否正確
  if (userInput.value === captcha.value) {
    // 驗證碼正確，顯示註冊成功訊息
    alert('註冊成功！歡迎加入！');
    router.push('/home');
    // 在這裡可以加入其他的註冊邏輯，比如送出表單資料至伺服器
  } else {
    // 驗證碼錯誤，彈出錯誤訊息
    alert('驗證碼錯誤，請重新輸入。');
  }
};
</script>

<template>
  <div class="wrapper">
    <!-- 頁首 -->
    <Header_0></Header_0>

    <!-- 中間會員註冊區 -->
    <main>
      <!-- 表格區塊 -->
      <div class="form">
        <h1>會員註冊</h1>

        <!-- 信箱密碼 -->
        <div class="id">
          <input type="text" placeholder="請輸入您的信箱">
          <input type="password" placeholder="請輸入密碼 (數字+英文字母8-16位)">
          <input type="password" placeholder="請再次輸入密碼">
        </div>

        <!-- 性別 -->
        <div class="gender">
          <input type="radio" name="gender">
          <p>男</p>
          <input type="radio" name="gender">
          <p>女</p>
          <input type="radio" name="gender">
          <p>不公開</p>
        </div>

        <!-- 姓名&連絡電話 -->
        <div class="name">
          <input type="text" placeholder="請輸入姓名">
          <br>
          <input type="text" placeholder="請輸入連絡電話">
        </div>

        <div class="city">
          <div>
            <v-select label="name"
              :reduce="(option) => { citySelect = option.districts; selected = option.districts[0] ? option.districts[0].name : ''; }"
              placeholder="請選擇縣市" :options="cities" class="custom-v-select"></v-select>
          </div>
          <div>
            <v-select class="custom-v-select" label="name" placeholder="請選擇鄉鎮" v-model="selected"
              :options="citySelect"></v-select>
          </div>
        </div>

        <div>
          <input type="text" placeholder="請輸入地址" class="address">

          <!-- 輸入驗證碼 -->
          <div class="random">
            <input v-model="userInput" type="text" placeholder="請輸入右方認證碼">
            <!-- <span class="number">3456</span> -->
            <p>{{ captcha }}</p>
            <img @click="refreshCaptcha" :class="{ rotating: isRotating }" src="../assets/images/icon-change.svg"
              alt="">
          </div>

          <router-link><input type="submit" value="註冊" class="button" @click="register"></router-link>
        </div>
      </div>
    </main>

    <Footer_0></Footer_0>

  </div>
</template>



<style lang="scss" scoped>
@import "../assets/SASS/basic/color";


.wrapper {
  background: map-get($color_0, bgc_blue);
  background-repeat: no-repeat;
  width: 100%;
  font-family: "Noto Sans TC";
}

main {
  width: 520px;
  height: 520px;
  border-radius: 20px;
  border: 1px solid #FFF;
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.80) 2.33%, rgba(255, 255, 255, 0.50) 97.83%);
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  backdrop-filter: blur(12.5px);
  margin: 0 auto;
  margin-top: 10px;
  margin-bottom: 30px;
}

.form {
  width: 360px;
  margin: 0 auto;
  margin-top: 20px;
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
}

.form .gender {
  display: flex;
  align-items: end;
  padding-left: 10px;
  margin-bottom: 10px;
}

.form .gender input {
  width: 18px;
  height: 18px;
  margin: 0;
}

.form .gender p {
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

.form .button {
  width: 360px;
  height: 32px;
  font-size: 16px;
  color: #505050;
  border-radius: 80px;
  border: 1px solid #FFF;
  background-color: rgba(255, 255, 255, 0.70);
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  padding-left: 20px;
  margin-bottom: 20px;
  cursor: pointer;
  outline: none;
}

.form .button:hover {
  background-color: #fff;
  color: #505050;
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
  width: 170px;
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
</style>