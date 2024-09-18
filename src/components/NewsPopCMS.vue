<script setup>
import Header_0 from '@/components/Header_0.vue';
import { defineProps, ref, defineEmits } from 'vue';


/*文件上傳方法(實現上傳圖片預覽功能)=======================*/
// 1.頭貼預覽
// (前端程式預覽)
// 處理圖片上傳的方法
const upload_img = (event) => {
  const file = event.target.files[0];
  if (file) {
    localOrder.value.imageFile = file; // 儲存圖片檔案以便後續上傳
    const reader = new FileReader();
    reader.onload = (e) => {
      localOrder.value.NEWS_IMG = e.target.result; // 預覽圖片（Base64 用於預覽）
    };
    reader.readAsDataURL(file);
  }
};

/*定義 父組件prop 事件的原始夾帶資訊*/
const props = defineProps({
  order: Object,
  default: () => ({})  // 默認是空對象，用於新增產品
});

/*定義 儲存和關閉按鈕emit 事件的夾帶資訊*/
const emit = defineEmits(['close-edit', 'save-edit']);
// 0.創建本地狀態來保存父組件的原始數據，以利後續編輯的數據
const localOrder = ref({ ...props.order });
// 1.處理關閉按鈕emit夾帶的透明度及編輯狀態(讓父組件的編輯視窗消失)
const f_close = () => {
  emit('close-edit', { opacity: 0, edit: null }); // 發出 'close-edit' 事件並傳遞 editOpacity 值
};

/* 儲存修改並發送到後端 */
const f_save = async () => {
  const formData = new FormData();
  if (!localOrder.value.NEWS_ID) {
    // 新增產品
    formData.append('PUBLISH_DATE', localOrder.value.PUBLISH_DATE);
    formData.append('NEWS_TITLE', localOrder.value.NEWS_TITLE);
    formData.append('NEWS_CONTENT', localOrder.value.NEWS_CONTENT);
    formData.append('STATUS', localOrder.value.STATUS);
    formData.append('UPDATE_DATE', localOrder.value.UPDATE_DATE);
    

    if (localOrder.value.imageFile) {
      formData.append('image', localOrder.value.imageFile);
    }

    try {
      const response = await fetch('http://illusionlab.local/public/PDO/News/AddNews.php', {
        method: 'POST',
        body: formData,
      });

      const result = await response.json();
      if (response.ok) {
        console.log('新增產品成功:', result);
        emit('save-edit', result); // 傳遞結果給父組件
        f_close();
      } else {
        console.error('新增產品失敗:', result.message);
      }
    } catch (error) {
      console.error('發送儲存請求時發生錯誤:', error);
    }
  } else {
    // 編輯已有產品
  formData.append('NEWS_ID', localOrder.value.NEWS_ID);
  formData.append('PUBLISH_DATE', localOrder.value.PUBLISH_DATE);
  formData.append('NEWS_TITLE', localOrder.value.NEWS_TITLE);
  formData.append('NEWS_CONTENT', localOrder.value.NEWS_CONTENT);
  formData.append('STATUS', localOrder.value.STATUS);
  formData.append('UPDATE_DATE', localOrder.value.UPDATE_DATE);

  // 如果有上傳的圖片，將圖片加入 FormData
  if (localOrder.value.imageFile) {
    formData.append('image', localOrder.value.imageFile); // 注意這裡上傳的是檔案，而非 Base64
  }

  try {
    const response = await fetch('http://illusionlab.local/public/PDO/NEWS/SaveNewsData.php', {
      method: 'POST',
      body: formData,
    });

    const result = await response.json();
    if (result.status === 'success') {
      emit('save-edit', localOrder.value); // 將編輯的數據傳遞回父組件
      f_close(); // 儲存後關閉彈出視窗
    } else {
      console.error('儲存失敗:', result.message);
    }
  } catch (error) {
    console.error('發送儲存請求時發生錯誤:', error);
  }

}
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
                        <p class="ptext">文章編號 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.NEWS_ID">
                    </div>
                </div>

                <div class="edit_border">
                    <div class="orderinf">
                    <div class="orderdiv">
                        <p class="ptext">文章標題 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.NEWS_TITLE">
                    </div>
                    
                    
                    <div class="orderdiv">
                        <p class="ptext">上下架 : </p>
                        <input class="inputtext" type="text" v-model="localOrder.STATUS">
                    </div>
                </div>
                <div class="orderdiv">
                        <p class="text_ptext">文章內容 : </p>
                        <textarea rows="10" class="textarea"  v-model="localOrder.NEWS_CONTENT"></textarea>
                    </div>
                <div class="upload_div">
                        <p class="upload-product"> 圖片 : </p>
                        <input class="n-customizedCard" type="file" @change="upload_img">
                        <p class="upload">請選擇圖片上傳</p>
                        <div class="n-customized_img">
                            <img v-if="localOrder.NEWS_IMG" :src="localOrder.NEWS_IMG" alt="預覽圖片" class="preview-img">
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
    height: 850px;
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

.text_ptext{
    padding: 1%;
    font-family: Noto Sans TC;
    

}

.textarea{
    border: 2px solid black;
    margin-left: 2%;
    width: 80%;
    font-family: Noto Sans TC;
    
    font-size: 16px;
}

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
    
    display: flex;
    align-items: start;
    // max-width: 800px;
    max-width: 100%;

    // border: 1px solid red;
    gap: 20%;
    flex-wrap: wrap;
    margin-bottom: 20px;
    padding: 1%;

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