<script setup>
import Header_0 from '../components/Header_0.vue';
import Footer_0 from '../components/Footer_0.vue';
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

        <!-- 選擇地址 -->
        <!-- <div class="city">
          <select name="city">
            <option>請選擇縣市</option>
            <option value="基隆市">基隆市</option>
            <option value="臺北市">臺北市</option>
            <option value="新北市">新北市</option>
            <option value="桃園市">桃園市</option>
            <option value="新竹縣">新竹縣</option>
            <option value="苗栗縣">苗栗縣</option>
            <option value="彰化縣">彰化縣</option>
            <option value="臺中市">臺中市</option>
            <option value="雲林縣">雲林縣</option>
            <option value="嘉義市">嘉義市</option>
            <option value="臺南市">臺南市</option>
            <option value="高雄市">高雄市</option>
            <option value="屏東縣">屏東縣</option>
            <option value="臺東縣">臺東縣</option>
            <option value="花蓮縣">花蓮縣</option>
            <option value="宜蘭縣">宜蘭縣</option>
            <option value="澎湖縣">澎湖縣</option>
            <option value="金門縣">金門縣</option>
            <option value="連江縣">連江縣</option>
          </select>

          <select name="city">
            <option>請選擇鄉鎮</option>
            <option value="基隆市">基隆市</option>
            <option value="臺北市">臺北市</option>
            <option value="新北市">新北市</option>
            <option value="桃園市">桃園市</option>
            <option value="新竹縣">新竹縣</option>
            <option value="苗栗縣">苗栗縣</option>
            <option value="彰化縣">彰化縣</option>
          </select>
        </div> -->
        
        
        <div><v-select
            label="name"
            :reduce="
              (option) => {
                citySelect = option.districts;
                selected =
                  option.districts[0] === '臺北市' ? option.districts[0].name : '';
              }
            "
            placeholder="請選擇縣市"
            :options="cities"
          ></v-select>
        </div>
        <div>
          <v-select
            label="name"
            placeholder="請選擇鄉鎮"
            v-model="selected"
            :options="citySelect"
          >
          </v-select>
	      </div>
        <div>
          <input type="text" placeholder="請輸入地址" class="address">

          <!-- 輸入驗證碼 -->
          <div class="random">
            <input type="text" placeholder="請輸入右方認證碼">
            <!-- <span class="number">3456</span> -->
            <p>3456</p>
            <img src="../assets/images/icon-change.svg" alt="">
          </div>

          <a href="#"><input type="submit" value="註冊" class="button"></a>
        </div>
      </div>
    </main>

    <Footer_0></Footer_0>
 
  </div>
</template>

<script>
  import { ref } from 'vue'
import cities from '@/data/TwCities.json'

export default {
  setup () {
    const citySelect = ref([])
    const selected = ref('')
    return { citySelect, cities, selected }
  }
}
</script>

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

.city {
  display: flex;
  justify-content: space-between;
}

select {
  width: 100%;
  /* 根據需要調整寬度 */
}

/* 針對下拉選單中的選項進行樣式設定 */
option {
  max-height: 200px;
  /* 設置最大高度 */
  overflow-y: auto;
  /* 使其可滾動 */
}

.city select {
  width: 170px;
  height: 32px;
  font-size: 16px;
  border-radius: 80px;
  color: #505050;
  border: 1px solid #FFF;
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  background-color: rgba(255, 255, 255, 0.70);
  ;
  margin-bottom: 10px;
  appearance: none;
  text-align: center;
  cursor: pointer;
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
  ;
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  padding-left: 20px;
  margin-bottom: 20px;
  cursor: pointer;
  outline: none;
}
</style>