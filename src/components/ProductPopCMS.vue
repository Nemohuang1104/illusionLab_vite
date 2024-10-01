<script setup>
import Header_0 from '@/components/Header_0.vue';
import { defineProps, ref, defineEmits } from 'vue';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';


/* 文件上傳方法(實現上傳圖片預覽功能) */
// 處理圖片上傳的方法
const upload_img = (event) => {
  const file = event.target.files[0];
  if (file) {
    localOrder.value.imageFile = file; // 儲存圖片檔案以便後續上傳
    const reader = new FileReader();
    reader.onload = (e) => {
      localOrder.value.PRODUCT_IMG = e.target.result; // 預覽圖片（Base64 用於預覽）
    };
    reader.readAsDataURL(file);
  }
};

/* 定義父組件的 props */
const props = defineProps({
  order: Object,
  default: () => ({})  // 默認是空對象，用於新增產品
});

/* 定義 emit 事件 */
const emit = defineEmits(['close-edit', 'save-edit']);

// 創建本地狀態來保存父組件的原始數據
const localOrder = ref({ ...props.order });

/* 關閉編輯視窗的事件 */
const f_close = () => {
  emit('close-edit', { opacity: 0, edit: null });
};

/* 儲存修改並發送到後端 */
const f_save = async () => {
  const formData = new FormData();
  if (!localOrder.value.PRODUCT_ID) {
    // 新增產品
    formData.append('EVENT_ID', localOrder.value.EVENT_ID);
    formData.append('PRODUCT_NAME', localOrder.value.PRODUCT_NAME);
    formData.append('PRODUCT_PRICE', localOrder.value.PRODUCT_PRICE);
    formData.append('PRODUCT_STATUS', localOrder.value.PRODUCT_STATUS);
    formData.append('MATERIAL', localOrder.value.MATERIAL);
    formData.append('PRODUCT_SIZE', localOrder.value.PRODUCT_SIZE);

    if (localOrder.value.imageFile) {
      formData.append('image', localOrder.value.imageFile);
    }

    try {
      // const response = await fetch('${import.meta.env.VITE_API_URL}/ProductData/AddProduct.php', {
      const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/AddProduct.php`, {
        method: 'POST',
        body: formData,
      });

      const result = await response.json();
      if (response.ok) {
        console.log('新增產品成功:', result);
        emit('save-edit', result); // 傳遞結果給父組件
        Swal.fire({
          icon: 'success',
          title: '新增商品成功',
          showConfirmButton: false,
          timer: 1200
        })
        f_close();
      } else {
        console.error('新增產品失敗:', result.message);
      }
    } catch (error) {
      console.error('發送儲存請求時發生錯誤:', error);
    }
  } else {
    // 編輯已有產品
    formData.append('PRODUCT_ID', localOrder.value.PRODUCT_ID);
    formData.append('EVENT_ID', localOrder.value.EVENT_ID);
    formData.append('PRODUCT_NAME', localOrder.value.PRODUCT_NAME);
    formData.append('PRODUCT_PRICE', localOrder.value.PRODUCT_PRICE);
    formData.append('PRODUCT_STATUS', localOrder.value.PRODUCT_STATUS);
    formData.append('MATERIAL', localOrder.value.MATERIAL);
    formData.append('PRODUCT_SIZE', localOrder.value.PRODUCT_SIZE);

    if (localOrder.value.imageFile) {
      formData.append('image', localOrder.value.imageFile);
    }

    try {
      // const response = await fetch('${import.meta.env.VITE_API_URL}/ProductData/SaveProductData.php', {
      const response = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/SaveProductData.php`, {
        method: 'POST',
        body: formData,
      });

      const result = await response.json();
      if (result.status === 'success') {
        emit('save-edit', localOrder.value);
        Swal.fire({
          icon: 'success',
          title: '儲存成功',
          showConfirmButton: false,
          timer: 1200
        })
        f_close();
      } else {
        console.error('儲存失敗:', result.message);
      }
    } catch (error) {
      console.error('發送儲存請求時發生錯誤:', error);
    }
  }
};

const baseUrl = import.meta.env.VITE_IMAGE_URL; // or any other method to get baseUrl


const getImageUrl = (imgPath) => {
  return `${baseUrl === '/' ? '' : baseUrl }${imgPath}`;
};
</script>

<template>
  <div class="wrapper">
    <div class="detail">
      <div class="order-summary">
        <div class="order-header">
          <span>編輯</span>
        </div>
        <hr>
        <div class="orderinf1">
          <div class="orderdiv">
            <p class="ptext">商品編號 : </p>
            <input class="inputtext" type="text" v-model="localOrder.PRODUCT_ID" />
          </div>
        </div>

        <div class="edit_border">
          <div class="orderinf">
            <div class="orderdiv">
              <p class="ptext">活動類別 : </p>
              <input class="inputtext" type="text" v-model="localOrder.EVENT_ID" />
            </div>

            <div class="orderdiv">
              <p class="ptext">商品名稱 : </p>
              <input class="inputtext" type="text" v-model="localOrder.PRODUCT_NAME" />
            </div>
            <div class="orderdiv">
              <p class="ptext">價格 : </p>
              <input class="inputtext" type="text" v-model="localOrder.PRODUCT_PRICE" />
            </div>
            <div class="orderdiv">
              <p class="ptext">上下架 : </p>
              <input class="inputtext" type="text" v-model="localOrder.PRODUCT_STATUS" />
            </div>
            <div class="orderdiv">
              <p class="ptext">材質 : </p>
              <input class="inputtext" type="text" v-model="localOrder.MATERIAL" />
            </div>
            <div class="orderdiv">
              <p class="ptext">規格 : </p>
              <input class="inputtext" type="text" v-model="localOrder.PRODUCT_SIZE" />
            </div>
          </div>

          <div class="upload_div">
            <p class="upload-product">圖片 : </p>
            <input class="n-customizedCard" type="file" @change="upload_img" />
            <p class="upload">請選擇圖片上傳</p>
            <div class="n-customized_img">
              <img v-if="getImageUrl(localOrder.PRODUCT_IMG)" :src="getImageUrl(localOrder.PRODUCT_IMG)" alt="預覽圖片" class="preview-img" />
            </div>
          </div>
        </div>

        <div class="n-order_editbtn">
          <button class="n-order_close" @click="f_close">關閉</button>
          <button class="n-order_save" @click="f_save">儲存</button>
        </div>
      </div>
    </div>
  </div>
</template>



<style lang="scss" scoped>
//popup的外框樣式
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');

.wrapper {
    font-family: Noto Sans TC;
    font-weight: bold;
    // background-color: #000354;

}


.detail {
    // display: flex;
    margin: 0 auto;
    align-items: center;
    justify-content: center;
    max-width: 900px;
    width: 95.5%;
    height: 700px;
    border-radius: 10px;
    padding: 2%;
    background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 1) 97.6%);



}

.order-summary {
    width: 100%;
    height: 100%;

}

.order-header {
    display: grid;
    grid-template-columns: 0.8fr 1fr 3fr 1fr 1.2fr 1fr;
    font-weight: bold;
    color: #313131;
    font-size: 18px;
}

.order-summary>hr {
    height: 3px;
    background-color: #313131;
    border: none;
    border-radius: 2.5px;
    /* 讓線條變得更加圓潤 */
}

.order-text {
    display: grid;
    grid-template-columns: 0.8fr 1fr 3fr 1fr 1.2fr 1fr;
    font-weight: normal;
    color: #313131;
    font-size: 18px;
    margin-top: 18px;
    font-family: "Noto Sans TC";
}

.order-text span:last-child {
    text-align: center;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    width: 80px;
    height: 22px;
    line-height: 22px;
    border: none;
    background: #22247A;
    border-radius: 12px;
    cursor: pointer;
}

//與標題有關
.ptext {
    display: flex;
    align-items: center;
    // margin-right: 10px;
    font-weight: bold;
    gap: 10%;
    width: 100px;
}

//與輸入框有關
.inputtext {
    outline: none;
    padding: 5px 10px 5px 10px;
    border: 1px solid #FFFFFF;
    border-radius: 8px;
    flex-shrink: 0;
    font-family: Noto Sans TC;
    font-weight: bold;
    font-size: 16px;
    background: #FFEDBC;
}

.orderinf1 {
    display: flex;
    align-items: center;
    max-width: 100%;
    padding: 1%;
    margin-top: 20px;
    // border: 1px solid red;
    gap: 20%;
    flex-wrap: wrap;
}


.edit_border{
    border: 1px solid black;
    margin-bottom: 40px;
}

.orderinf {
    
  display: grid;
    align-items: start;
    max-width: 100%;
    gap: 4%;
    flex-wrap: wrap;
    margin-bottom: 20px;
    padding: 1%;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));

}





.orderdiv {
    display: flex;
    margin-bottom: 2%;
    
}

.upload_div{
    position: relative;
}



// 第二表


.textdown>p {
    margin: 10px 0px 10px 0px;
}

.total {
    //  border: 1px solid red;
    display: flex;
    flex-direction: column;
    align-items: end;
    margin-bottom: 20px;
}

.ptext1 {
    display: flex;
    align-items: center;
    // margin-right: 10px;
    font-weight: bold;
    gap: 10%;
    width: 100px;
}

.orderlist{
   width: 100%;

}

.detaillist{
    line-height: 1.6;
} 



.titlename {
    background-color: #22247A;
    color: #FFFFFF;
    height: 35px;
    display: grid;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    grid-template-columns: 1fr 1fr 1fr 1fr;
 
}

.eventname{
    margin: 0 20px;
}


.inputtext1 {
    outline: none;
    padding: 5px 10px 5px 10px;
    border: 1px solid #FFFFFF;
    border-radius: 8px;
    flex-shrink: 0;
    text-align: right;
}

.textdetail {
    // border: 1px solid red;
    background: #F7F7F7;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    align-items: center;
    flex-direction: column;
    height: 180px;
    font-weight: bold;
    margin-bottom: 20px;

}

.textdetail img{
    width: 120px;
    height: 120px;
    margin: 10px 20px;
}



.downbox {
    border: 1px solid black;
    padding: 2%;
    margin-bottom: 80px;
}


//按鈕
.n-order_editbtn{
    width: 100%;
    display: flex;
    justify-content: center;
    gap: 20px;
    
}

.n-order_editbtn .n-order_save {
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 100px;
    height: 29.48px;
    line-height: 29.48px;
    border: none;
    background: var(--Color-2, #FCB600);
    border-radius: 6px;
    cursor: pointer;
}

.n-order_editbtn .n-order_close {
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 100px;
    height: 29.48px;
    line-height: 29.48px;
    border: none;
    background-color: #a3a3a3;
    border: 1px solid #a3a3a3;
    border-radius: 6px;
    cursor: pointer;
}

//上傳圖片預覽

.upload_div{
    padding: 1%;
}

.upload{
    margin: 0;
    padding: 3px;
    position: absolute;
    top: 3px;
    left: 65px;
    border: 1.5px solid #22247A;
    border-radius: 5px;
    overflow: hidden;
    width: 200px;
    font-size: 16px;
    color: #172852;
    font-weight: bold;
    background-image: url(../assets/images/flat-color-icons_plus.png);
    background-repeat: no-repeat;
    background-position: right;
    background-size: contain;
    background-color: #FFF;
    
    
}

.upload-product{
    position: relative;
}

.n-customizedCard {
    /* border: 1px solid purple; */
    position: absolute;
    top: 0;
    left: 60px;
    opacity: 0;
    z-index: 2;
    width: 230px;
}

.n-customized_img {
    border: 1.5px solid #22247A;
    width: 290px;
    height: 150px;
    margin-right: auto;
    margin-top: 20px;
    padding: 0;
    // margin-right: 25px;
    position: relative;

    margin-bottom: 20px;
    
}
.preview-img {
    max-width: 300px;
    max-height: 125px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}


</style>