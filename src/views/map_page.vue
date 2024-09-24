<template>
  <div class="wrap">
    <header>
      <div class="container">
        <h1>7-ELEVEN</h1>
        <div class="text_block">
          <h2>電子地圖查詢系統</h2>
          <h3>E - Map</h3>
        </div>
      </div>
    </header>
    <nav>
      <ul>
        <li>街道名稱</li>
        <li>門市名稱</li>
        <li>門市店號</li>
      </ul>
    </nav>

    <div class="emap-container">
     <div class="main">
       <p class="text">取貨不付款取貨時，需出示與取件人相同的身分證明文件方可取件。</p>
       <hr>
     </div>
        <div class="form_flex">
          <!-- 查詢表單部分 -->
          <div class="search-form">
              <div class="form-group">
              <label for="city">請選擇縣市</label>
              <select id="city" v-model="selectedCity" @change="onCityChange">
                  <option disabled value="">請選擇</option>
                  <option v-for="city in cities" :key="city">{{ city }}</option>
              </select>
              </div>
      
              <div class="form-group">
              <label for="area">請選擇鄉、鎮、市、區</label>
              <select id="area" v-model="selectedArea" :disabled="!selectedCity" @change="onAreaChange">
                  <option disabled value="">請選擇</option>
                  <option v-for="area in filteredAreas" :key="area">{{ area }}</option>
              </select>
              </div>
      
              <div class="form-group">
                <label for="street">請選擇街道</label>
                <select id="street" v-model="selectedStreet" :disabled="!selectedArea" @change="onStreetChange">
                    <option disabled value="">請選擇</option>
                    <option v-for="street in filteredStreets" :key="street">{{ street }}</option>
                </select>
              </div>
          </div>

          <div class="right_block">

            <div class="choosepart">
              <p class="choose">請選擇門市</p>
            </div>
              <!-- 查詢結果顯示部分 -->
              <div class="store-info" v-if="selectedStore" @click="selectStore(selectedStore.name, selectedStore.address)">
                  <p class="storeName">{{ selectedStore.name }}</p>
                  <p class="storeAddress">{{ selectedStore.address }}</p>
              </div>
          </div>
        </div>
      </div>
  </div>
</template>
  
  <script setup>
  import { ref, computed } from 'vue';
  import { useRouter } from 'vue-router';

  // 模擬資料
  const stores = ref([
    { city: '台北市', area: '緯育區', street: '提拔密路', name: '幻浸門市', address: '台北市緯育區提拔密一路1樓' },
    { city: '新北市', area: '幻浸區', street: '人生路', name: '實驗門市', address: '台北市幻浸區人生路666號' },
  ]);
  
  // 選擇狀態
  const selectedCity = ref('');
  const selectedArea = ref('');
  const selectedStreet = ref('');
  const selectedStore = ref(null);
  
  // 縣市列表
  const cities = computed(() => [...new Set(stores.value.map(store => store.city))]);
  
  // 根據選擇的縣市篩選區域
  const filteredAreas = computed(() => {
    return selectedCity.value
      ? [...new Set(stores.value.filter(store => store.city === selectedCity.value).map(store => store.area))]
      : [];
  });
  
  // 根據選擇的區域篩選街道
  const filteredStreets = computed(() => {
    return selectedArea.value
      ? [...new Set(stores.value.filter(store => store.area === selectedArea.value).map(store => store.street))]
      : [];
  });
  
  // 當縣市改變時
  const onCityChange = () => {
    selectedArea.value = '';
    selectedStreet.value = '';
    selectedStore.value = null;
  };
  
  // 當區域改變時
  const onAreaChange = () => {
    selectedStreet.value = '';
    selectedStore.value = null;
  };
  
  // 當街道改變時
  const onStreetChange = () => {
    selectedStore.value = stores.value.find(
      store => store.city === selectedCity.value && store.area === selectedArea.value && store.street === selectedStreet.value
    );
  };



const router = useRouter();

// 選擇門市後，將門市名稱和地址作為 query 參數傳回 shop2 頁面
const selectStore = () => {
  if (selectedStore.value) {
    router.push({
      path: '/shop2',
      query: {
        storeName: selectedStore.value.name,
        storeAddress: selectedStore.value.address,
        shippingMethod: '7-11取貨' 
      }
    });
  } else {
    console.error('請選擇一個有效的門市');
  }
};

  </script>
  
  <style scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
  *{
    font-family: "Noto Sans TC";

  }

  .wrap{
    width: 100%;
    max-width: 1003px;
    margin: 0 auto;
    background: #f8f8f8;
    box-sizing: border-box;
    height: 100%;
    min-height: 500px;
  }
  
  .emap-container {
    margin: 15px;
    background: #fff;
    padding: 15px;
  }

  .text{
    color: #f60;
    font-weight: 500;
    padding-bottom: 10px;
  }

  hr{
    border: none;
    border-bottom: solid 1px #dadada;
    margin-bottom: 10px;
  }

  .container{
    display: flex;
    padding: 0 20px;
    margin: 0 auto;
    width: 100%;
    align-items: center;
  }

  nav{
    background: #02a64f;
    height: 8px;
    display: block;
    position: relative;
  }
  
  nav ul{
    position: absolute;
    right: 0;
    bottom: 0;
    width: 100%;
    text-align: right;
    padding: 0 30px;
  }
  
  nav ul li{
    position: relative;
    display: inline-block;
    background: #02a64f;
    border: solid 1px #02a64f;
    border-radius: 10px;
    color: #eee;
    padding: 15px 35px;
    margin: 0 3px;
  }

  header{
    background: #eee;
    padding: 10px ;
  }

  h1,h2{
    color: #02a64f;
  }

  h3{
    color: #828282;
  }

  header .text_block {
    border-left: solid 1px #02a64f;
    padding-left: 15px;
    margin-left: 15px;
  }

  h1 {
    font-size: 24px;
    font-weight: bold;
  }
  
  .search-form {
    display: flex;
    flex-direction: column;
    width: calc(100% / 4);
  }
  
  .form-group {
    margin-bottom: 15px;
  }
  
  label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
  }
  
  select {
    width: 100%;
    padding: 5px;
    max-width: 200px;
    color: #565656;
  }
  
  .store-info {
    background-color: #ffffff;
    padding: 15px;
    width: 300px;
    cursor: pointer;
  }

  .storeName{
    color: #565656;
  }

  .storeAddress{
    color: #aaaaaa;
    font-size: 14px;
    margin-top: 10px;
  }

  .form_flex{
    display: flex;
  }

  .right_block{
    background: #f1f1f1;
    width: calc(100% / 4* 3 - 20px);
  }

 .store-info{
    margin: 10px;
    border-radius: 4px;
    box-shadow: 0 2px 1px rgba(0,0,0,.1);
  }

  .store-info:hover{
    border: .5px solid #d7d7d7;
  }

  .choosepart{
    background: #fff;
    margin-bottom: 15px;
  }

  .choose::before{
    content: '*';
    color: #f60;
    margin-left: -1em;
    width: 1em;
    display: inline-block;
    text-align: center;
    font-size: 1.6rem;
    vertical-align: middle;
    
  }
  </style>