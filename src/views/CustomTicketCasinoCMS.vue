<script setup>
import { ref, computed} from 'vue';
const profileTests = ref([
{ id: '1', cardimage: ''},
{ id: '2', cardimage: ''},
{ id: '3', cardimage: ''}
]);

const modelTests = ref([
{ id: '1', cardimage: ''},
{ id: '2', cardimage: ''},
{ id: '3', cardimage: ''}
]);

const bgcTests = ref([
  { id: '1', colorCode: '#313131' },
  { id: '2', colorCode: '#FF5733' },
  { id: '3', colorCode: '#33FF57' },
  { id: '4', colorCode: '#3357FF' },
  { id: '5', colorCode: '#F3FF33' },
  { id: '6', colorCode: '#FF33D4' },
]);

const fcTests = ref([
  { id: '1', colorCode: '#FCB600' },
  { id: '2', colorCode: '#FF5733' },
  { id: '3', colorCode: '#33FF57' },
  { id: '4', colorCode: '#3357FF' },
  { id: '5', colorCode: '#F3FF33' },
  { id: '6', colorCode: '#FF33D4' },
]);

const borderTests = ref([
{ id: '1', cardimage: ''},
{ id: '2', cardimage: ''},
{ id: '3', cardimage: ''}
]);

const iconTests = ref([
  { id: '1', cardimage: '' },
  { id: '2', cardimage: '' },
  { id: '3', cardimage: '' },
  { id: '4', cardimage: '' },
  { id: '5', cardimage: '' },
  { id: '6', cardimage: '' },
  { id: '7', cardimage: '' },
  { id: '8', cardimage: '' },
  { id: '9', cardimage: '' },
  { id: '10', cardimage: '' },
  { id: '11', cardimage: '' },
  { id: '12', cardimage: '' },
  { id: '13', cardimage: '' },
  { id: '14', cardimage: '' },
  { id: '15', cardimage: '' },
  { id: '16', cardimage: '' },
  { id: '17', cardimage: '' },
  { id: '18', cardimage: '' }
]);


/*色碼輸入預覽顏色=============*/
// 1.背景底色
// (前端程式預覽)
const updateColor_bg = (event, index) => {
  bgcTests.value[index].colorCode = event.target.value;
};

// (後端程式存入資料庫)
// const saveColorsToDatabase = async () => {
//   try {
//     const response = await fetch('你的後端上傳接口URL', {
//       method: 'POST',
//       headers: {
//         'Content-Type': 'application/json',
//       },
//       body: JSON.stringify(bgcTests.value),
//     });
    
//     if (response.ok) {
//       console.log('色碼已成功保存到資料庫');
//     } else {
//       console.error('保存色碼失敗');
//     }
//   } catch (error) {
//     console.error('保存色碼過程中出現錯誤:', error);
//   }
// };

// 2.字體底色
// (前端程式預覽)
const updateColor_ft = (event, index) => {
    fcTests.value[index].colorCode = event.target.value;
};

/*======================*/


/*文件上傳方法(實現上傳圖片預覽功能)=======================*/
// 1.頭貼預覽
// (前端程式預覽)
const upload_img_pro = (event, index) => {
  const file = event.target.files[0];
  if (file) {

    // 單純以base64圖片code，實現網頁預覽功能，無串接資料庫存取圖片，只能寫在上述假資料中
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
        profileTests.value[index].cardimage = reader.result;
    };
    }
};

// (後端程式存取)

    // 實現將圖片檔案透過form php傳遞檔案給資料庫，並回傳檔案顯示在上述資料數組中
    // (前端程式)
    // 如果需要上傳到服務器，可以在這裡處理文件上傳邏輯
    // const formData = new FormData();
    // formData.append('file', file);
    
    // 使用fetch或其他方式上傳圖片到服務器
    // try {
    //   const response = await fetch('你的後端上傳接口URL', {
    //     method: 'POST',
    //     body: formData,
    //   });

    //   if (response.ok) {
    //     const data = await response.json();
    //     arrayRef.value[index].cardimage = data.filePath; // 將服務器返回的文件路徑保存到數組中
    //   } else {
    //     console.error('文件上傳失敗');
    //   }
    // } catch (error) {
    //   console.error('上傳過程中出現錯誤:', error);
    // }
    // (後端程式) >>請參考金魚腦 >> 将上传的图片文件信息存储到 MySQL 数据库
    
    // php傳遞檔案給資料庫結束線


// 2.模板預覽
// (前端程式預覽)
    // 單純以base64圖片code，實現網頁預覽功能，無串接資料庫存取圖片，只能寫在上述假資料中
    const upload_img_mod = (event, index) => {
    const file = event.target.files[0];
    if (file) {

        // 單純以base64圖片code，實現網頁預覽功能，無串接資料庫存取圖片，只能寫在上述假資料中
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            modelTests.value[index].cardimage = reader.result;
        };
    }
};

// 3.邊框預覽
// (前端程式預覽)
    // 單純以base64圖片code，實現網頁預覽功能，無串接資料庫存取圖片，只能寫在上述假資料中
    const upload_img_border = (event, index) => {
    const file = event.target.files[0];
    if (file) {

        // 單純以base64圖片code，實現網頁預覽功能，無串接資料庫存取圖片，只能寫在上述假資料中
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            borderTests.value[index].cardimage = reader.result;
        };
    }
};

// 4.貼圖預覽
// (前端程式預覽)
    // 單純以base64圖片code，實現網頁預覽功能，無串接資料庫存取圖片，只能寫在上述假資料中
    const upload_img_icon = (event, index) => {
    const file = event.target.files[0];
    if (file) {

        // 單純以base64圖片code，實現網頁預覽功能，無串接資料庫存取圖片，只能寫在上述假資料中
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            iconTests.value[index].cardimage = reader.result;
        };
    }
};


/*==================================*/

</script>

<template>
 
            
            <div class="detail">
                <div class="order-summary">
                    <div class="order-header">
                        
                        <!-- 導入v指令參考範例開始 -->
                            <!-- <div class="profile">
                                <div class="n-customized_group" v-for='(test, index) in tests'>
                                    <label for="group1">圖片0{{index+1}}:</label>
                                    <input type="file" id="group1" @change='upload_img' name="photo[]"
                                        class='n-customizedCard'>
                                    <p>請選擇圖片上傳</p>
                                    <div class="n-customized_img">
                                        <img :src="test.cardimage">
                                    </div>
                                </div>
                            </div> -->
                         <!-- 導入v指令參考範例結束 -->

                         <form enctype="multipart/form-data" name='uploadImages' method='post'>
                            <div class="profile">
                                <p>頭像樣式</p>
                                <div class="profile-flex">
                                    <div class="n-customized_group" v-for='(test, index) in profileTests' :key="test.id">
                                    <label for="group1">圖片{{index+1}}:</label>
                                    <input type="file" id="group1"  @change="upload_img_pro($event, index)"   name="photo[]"
                                        class='n-customizedCard'>
                                    <p>請選擇圖片上傳</p>
                                    <div class="n-customized_img">
                                        <img :src="test.cardimage" >
                                        
                                    </div>
                                    </div>
                                </div>

                                <div class="n-customized_editbtn">
                                    <!-- <button class="n-customized_close">關閉</button>
                                    <button class="n-customized_save">儲存</button> -->
                                    <input type="button" class="n-customized_close" value='關閉'>
                                    <input type="button" class="n-customized_save" value='儲存' onclick='cardSave()'>
                                </div>

                            </div>
                        </form>

                        <form enctype="multipart/form-data" name='uploadImages' method='post'>
                            <div class="model">
                                <p>模板樣式</p>
                                <div class="profile-flex">
                                    <div class="n-customized_group" v-for='(test, index) in modelTests' :key="test.id">
                                    <label for="group2">圖片{{index+1}}:</label>
                                    <input type="file" id="group2" @change="upload_img_mod($event, index)" name="photo[]"
                                        class='n-customizedCard'>
                                    <p>請選擇圖片上傳</p>
                                    <div class="n-customized_img">
                                        <img :src="test.cardimage">
                                        <!-- <p>請選擇圖片上傳</p> -->
                                    </div>
                                    </div>
                                
                                </div>
                                
                                
                                <div class="n-customized_editbtn">
                                    
                                    <input type="button" class="n-customized_close" value='關閉'>
                                    <input type="button" class="n-customized_save" value='儲存' onclick='cardSave()'>
                                </div>
                            </div>
                        </form>

                        <form enctype="multipart/form-data" name='uploadImages' method='post'>
                            <div class="bg-color">
                                <p>模板底色</p>
                                <div class="profile-grid">
                                    <div class="n-customized_group" v-for='(test, index) in bgcTests' :key="test.id">
                                        <label for="group3">色碼{{index+1}}:</label>
                                        <input type="text" id="group3" placeholder="請輸入色碼" @input="event => updateColor_bg(event, index)" name="photo[]"
                                            class='n-customizedColor'>
                                        <!-- <p>請輸入色碼</p> -->
                                        <span class="color-preview" :style="{ backgroundColor: test.colorCode }" style=" display: inline-block; margin-left: 4px; vertical-align: text-top; width: 22px; height: 22px; border-radius: 50%;"></span>
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="n-customized_editbtn">
                                    <!-- <button class="n-customized_close">關閉</button>
                                    <button class="n-customized_save">儲存</button> -->
                                    <input type="button" class="n-customized_close" value='關閉'>
                                    <input type="button" class="n-customized_save" value='儲存' onclick='cardSave()'>
                                </div>
                            </div>

                        </form>

                        <form enctype="multipart/form-data" name='uploadImages' method='post'>
                            <div class="font-color">
                                <p>字體顏色</p>
                                <div class="profile-grid">
                                    <div class="n-customized_group" v-for='(test, index) in fcTests' :key="test.id">
                                        <label for="group3">色碼{{index+1}}:</label>
                                        <input type="text" id="group3" placeholder="請輸入色碼" @input="event => updateColor_ft(event, index)" name="photo[]"
                                            class='n-customizedColor'>
                                        <!-- <p>請輸入色碼</p> -->
                                        <span class="color-preview" :style="{ backgroundColor: test.colorCode }" style=" display: inline-block; margin-left: 4px; vertical-align: text-top; width: 22px; height: 22px; border-radius: 50%;"></span>
                                    </div>
                                </div>
                                
                                
                                <div class="n-customized_editbtn">
                                    <!-- <button class="n-customized_close">關閉</button>
                                    <button class="n-customized_save">儲存</button> -->
                                    <input type="button" class="n-customized_close" value='關閉'>
                                    <input type="button" class="n-customized_save" value='儲存' onclick='cardSave()'>
                                </div>
                            </div>
                        </form>

                        <form enctype="multipart/form-data" name='uploadImages' method='post'>
                            <div class="border">
                                <p>邊框樣式</p>
                                <div class="profile-flex">
                                    <div class="n-customized_group" v-for='(test, index) in borderTests' :key="test.id">
                                    <label for="group5">圖片{{index+1}}:</label>
                                    <input type="file" id="group5" @change="upload_img_border($event, index)" name="photo[]"
                                        class='n-customizedCard'>
                                    <p>請選擇圖片上傳</p>
                                    <div class="n-customized_img">
                                        <img :src="test.cardimage">
                                        <!-- <p>請選擇圖片上傳</p> -->
                                    </div>
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="n-customized_editbtn">
                                    <!-- <button class="n-customized_close">關閉</button>
                                    <button class="n-customized_save">儲存</button> -->
                                    <input type="button" class="n-customized_close" value='關閉'>
                                    <input type="button" class="n-customized_save" value='儲存' onclick='cardSave()'>
                                </div>

                            </div>
                        </form>


                        <form enctype="multipart/form-data" name='uploadImages' method='post'>
                            <div class="icon">
                                <p>貼圖樣式</p>
                                <div class="profile-grid">
                                    <div class="n-customized_group" v-for='(test, index) in iconTests' :key="test.id">
                                        <label for="group6">圖片{{index+1}}:</label>
                                        <input type="file" id="group6"  @change="upload_img_icon($event, index)"  name="photo[]"
                                            class='n-customizedCard'>
                                        <p>請選擇圖片上傳</p>
                                        <div class="n-customized_img">
                                            <img :src="test.cardimage">
                                            <!-- <p>請選擇圖片上傳</p> -->
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="n-customized_editbtn">
                                    <!-- <button class="n-customized_close">關閉</button>
                                    <button class="n-customized_save">儲存</button> -->
                                    <input type="button" class="n-customized_close" value='關閉'>
                                    <input type="button" class="n-customized_save" value='儲存' onclick='cardSave()'>
                                </div>

                            </div>
                        </form>

                    
                    
                    </div> 
                </div> 
            </div>
        
            
</template>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');




.code-input{
    display: flex;
    justify-content: left;
}

.fill{
    width: 100%;
    display: flex;
    justify-content: center;
    gap: 8px;
    
}

// input輸入欄位樣式開始



// input輸入欄位樣式結束

// 搜尋按鈕樣式開始

.fill button{
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 140px;
    height: 29.48px;
    line-height: 29.48px;
    border: none;
    background: var(--Color-2, #FCB600);
    border-radius: 6px;
    cursor: pointer;
}

.code-input{
    margin-bottom: 18px;
}


.detail{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 95.5%;
    height: 100%;
    border-radius: 0 10px 10px 10px;
    padding: 20px;
    padding-left: 20px;
    padding-right: 20px;
    
    background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
    margin-bottom: 20px;
    
}

.order-summary{
    width: 100%;
    height: 100%;
}

.order-header {
    font-weight: bold;
    color: #313131;
    font-size: 18px;
    height: 100%;
}

.profile{
    border: 1.5px solid  #727272 ;
    padding: 12px;
    margin-bottom: 16px;
}

.profile > p,.bg-color > p,.model > p,.font-color > p,.border > p,.icon > p{
    margin-bottom: 12px;
}

.profile-flex{
    display: flex;
    gap: 18px;
    margin-bottom: 20px;
}

.n-customized_group {
    /* border: 1px solid red; */
    position: relative;
    width: 272px;
}

.n-customized_group label {
    /* border: 1px solid blue; */
    font-size: 16px;
    color: #172852;
    font-weight: bold;
    font-family: "Noto Sans TC";
}

.n-customized_group .n-customizedCard {
    /* border: 1px solid purple; */
    position: absolute;
    top: 0;
    left: 60px;
    opacity: 0;
    z-index: 2;
    width: 230px;
}

.n-customized_group > p {
    margin: 0;
    padding: 3px;
    position: absolute;
    top: -3px;
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

.n-customized_group div.n-customized_img {
    border: 1.5px solid #22247A;
    width: 100%;
    height: 130px;
    margin: 0 auto;
    margin-top: 20px;
    padding: 0;
    // margin-right: 25px;
    position: relative;
}

.n-customized_group div.n-customized_img > img {
    max-width: 300px;
    max-height: 125px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.n-customized_editbtn{
    width: 100%;
    display: flex;
    justify-content: center;
    gap: 8px;
    
}

.n-customized_editbtn input{
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

.n-customized_editbtn .n-customized_close {
    background-color: #a3a3a3;
    border: 1px solid #a3a3a3;
}


.n-customized_group .n-customizedColor{
    width: 56%;
    height: 22px;
    background-color: #F7F7F7;
    border: 1.5px solid #22247A;
    border-radius: 6px; 
    padding: 0 8px;
    font-size: 16px;
    font-weight: bold;
    color: #22247A;
    transition: border-color 0.3s ease-in-out;
    margin-left: 7.5%;
}

.n-customized_group .n-customizedColor:focus{
    border-color: #22247A;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3); /* 暈染效果 */
    outline: none; /* 移除默認的黑框 */
}

.model{
    
    border: 1.5px solid  #727272 ;
    padding: 12px;
    margin-bottom: 16px;

}

.bg-color{
    border: 1.5px solid  #727272 ;
    padding: 12px;
    margin-bottom: 16px;
}

.font-color{
    border: 1.5px solid  #727272 ;
    padding: 12px;
    margin-bottom: 16px;
}

.border{
    border: 1.5px solid  #727272 ;
    padding: 12px;
    margin-bottom: 16px;
}

.icon{
    border: 1.5px solid  #727272 ;
    padding: 12px;
    margin-bottom: 16px;
}

.profile-grid{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr ;
    gap: 16px;
    margin-bottom: 20px;
}

.order-text span.status-normal {
    background: #22247A; /* 正常状态背景色 */
}

.order-text span.status-disabled {
    background: #F44336; /* 停权状态红色背景 */
}


.confirm{
    
    width: 100%;
    display: flex;
    justify-content: right;
    align-items: center;
    margin-top: 20px;
    margin-bottom: 20px;
}

.confirm button{
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    width: 140px;
    height: 28px;
    line-height: 28px;
    border: none;
    background: #22247A;
    border-radius: 12px;
    cursor: pointer;
}

.item-header{
    display: grid;
    grid-template-columns: 2fr 1fr 3fr;
    background-color: #22247A;
    font-weight: bold;
    color: #fff;
    font-size: 18px;
    padding: 10px;
}

.order-item{
    display: grid;
    align-items: center;
    grid-template-columns: 2fr 1fr 3fr;
    font-size: 16px;
    color: #313131;
    font-family: "Noto Sans TC";
    font-weight: 600;
    padding: 10px;
    background: #F7F7F7;
}

.product-info{
    display: flex;
    align-items: center;
    gap: 16px;
}


// 動態分頁按鈕樣式


.pagination {
  display: flex;
  justify-content: right;
}

.pagination button {
  background-color: #FDE7B1; /* 淡黃色背景 */
  border: none;
  padding: 15px 20px;
  margin: 0 5px;
  cursor: pointer;
  border-radius: 50%;
  color: #000; /* 黑色字體 */
  font-size: 16px;
  transition: background-color 0.3s ease;
}

.pagination button.active {
  background-color: #F9A825; /* 深黃色背景 */
  color: #000; /* 黑色字體 */
}




</style>