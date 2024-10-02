<script setup>

import { ref, onMounted, computed, watch } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import Header_0 from '@/components/Header_0.vue';
const currentMode = ref('one');

import ShoppingStep from '@/components/ShoppingStep.vue';
import Footer from '@/components/Footer_0.vue';

//sweetalert彈跳視窗
import Swal from 'sweetalert2'; // 在 script setup 中引入
import 'sweetalert2/src/sweetalert2.scss';

// ================在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(開始)


const productInfo = ref([
    // { id: '1', cardImage: '../src/assets/images/MS_Product1.svg', productName: '繪本風格悠遊卡卡夾', price: '300' },
    // { id: '2', cardImage: '../src/assets/images/MS_Product2.svg', productName: '繪本風格筆記本', price: '180' },
    // { id: '3', cardImage: '../src/assets/images/MS_Product3.svg', productName: '繪本風格帆布袋', price: '590' },
    // { id: '4', cardImage: '../src/assets/images/MS_Product4.svg', productName: '繪本風格小貼紙', price: '100' },
    // { id: '5', cardImage: '../src/assets/images/MS_Product5.svg', productName: '繪本風格悠遊抱枕', price: '990' },
    // { id: '6', cardImage: '../src/assets/images/MS_Product6.svg', productName: '繪本風格防摔手機殼', price: '1280' },
])


async function fetchProducts() {
    try {
        // 從三個不同的 PHP 檔案分別撈取兩項商品
        const response1 = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/LC_FetchProducts.php`);
        const data1 = await response1.json();
        console.log('LC Products:', data1);  // 檢查第一個 API 返回的數據

        const response2 = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/SF_FetchProducts.php`);
        const data2 = await response2.json();
        console.log('SF Products:', data2);  // 檢查第二個 API 返回的數據


        const response3 = await fetch(`${import.meta.env.VITE_API_URL}/ProductData/MS_FetchProducts.php`);
        const data3 = await response3.json();
        console.log('MS Products:', data3);  // 檢查第三個 API 返回的數據  


        // 將三次 API 返回的商品資料合併在一起
        productInfo.value = [
            ...data1.slice(0, 2), // 從第一個 PHP 檔案取前兩個商品
            ...data2.slice(4, 6), // 從第二個 PHP 檔案取前兩個商品
            ...data3.slice(0, 2), // 從第三個 PHP 檔案取第一個商品
        ];

    } catch (error) {
        console.error('Error fetching products:', error);
    }
}



function getProductDetailRoute(item) {
    console.log('item.EVENT_ID:', typeof item.EVENT_ID, item.EVENT_ID);

  switch (Number(item.EVENT_ID)) {
    case 1:
      router.push({ name: 'LC_ProductInfo', params: { id: item.PRODUCT_ID } });
      break;
    case 2:
      router.push({ name: 'SF_DetailList', params: { id: item.PRODUCT_ID } });
      break;
    case 3:
      router.push({ name: 'MS_ProductList', params: { id: item.PRODUCT_ID } });
      break;
    default:
    console.warn('Unknown EVENT_ID:', item.EVENT_ID);
  }
}




onMounted(() => {
    fetchProducts(); // 當頁面加載時撈取資料
    // getProductDetailRoute();
});
// ================在你的 Vue.js 商品總覽頁中，透過 fetch API 撈取資料庫資料，並將其顯示在頁面上================(結束)


// ============ShoppingStep=====STAR========//
const highlight = ref({
    1: { background: '#fff', fontcolor: '#22247A' },
    2: { background: 'transparent', fontcolor: '#fff' },
    3: { background: 'transparent', fontcolor: '#fff' }

}
);

// ============ShoppingStep======END=======//

// ============儲存從 localStorage=====STAR========//

// 注入購物車
import { inject } from 'vue';
const cart_data = inject('cart');
// 購物車商品列表 : cartItems是一個 ref，用來儲存從 localStorage 中撈取的購物車資料。
const carts = ref([]);


// 從 localStorage 撈取購物車資料的函數並存入 carts
function loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    carts.value = cart;

    // 初始化 checkedItems 的布爾值為 false
    checkedItems.value = carts.value.map(() => false);
}

// 當組件掛載時撈取資料
onMounted(() => {
    loadCart();
});

// 計算購物車總價:是一個 computed 屬性，用來計算購物車中所有商品的總價
const totalPrice = computed(() => {
    return carts.value.reduce((sum, item) => {
        return sum + item.price * item.quantity;
    }, 0);
});

// //數量增加的function
// function addQuantity(index){
//     carts.value[index].quantity++;
//     updateLocalStorage(); // 更新 localStorage
// };


//數量增加的function
function addQuantity(index) {
    // 創建一個新的對象並更新數量
    const updatedItem = { ...carts.value[index], quantity: carts.value[index].quantity + 1 };

    // 使用 splice 替換該項目，這樣 Vue 可以檢測到變化
    carts.value.splice(index, 1, updatedItem);

    // 更新 localStorage 中的購物車數據
    updateLocalStorage();
}


// //數量減少的function 
// function minusQuantity(index){
//    if(carts.value[index].quantity > 0){
//     carts.value[index].quantity--;
//     updateLocalStorage(); // 更新 localStorage
//     }
// };



//數量減少的function
function minusQuantity(index) {
    if (carts.value[index].quantity > 1) {
        carts.value[index].quantity -= 1;
        updateLocalStorage(); // 更新 localStorage


    } else {
        // 商品數量為1，彈出確認框
        Swal.fire({
            title: '商品數量為 1 ',
            text: '是否要將此商品從購物車中移除？',
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "確定",
            cancelButtonText: "我再想想 ! ",
        }).then((result) => {
            if (result.isConfirmed) {
                removeItem(index); // 移除商品並更新localStorage
                // 顯示成功提示
                Swal.fire({
                    title: ' QQ 我在商品頁等你 !',
                    text: '已成功刪除商品！',
                    icon: "success",
                    timer: 1200, // 自動消失
                    showConfirmButton: false // 隱藏確認按鈕
                });
            }
        });
    }
}


const checkedItems = ref(carts.value.map(() => false)); // 每個商品是否被選中的狀態

//刪除商品的function
function removeItem(index) {
    // 移除指定索引的商品
    carts.value.splice(index, 1);
    checkedItems.value.splice(index, 1); // 同時移除該商品的選中狀態
    updateLocalStorage(); // 更新 localStorage

}

// 全部刪除
function removeSelectedItems() {
    // 彈出 SweetAlert 提示，確認是否刪除
    Swal.fire({
        text: '是否要將此商品從購物車中移除？',
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "確定",
        cancelButtonText: "我再想想！",
    }).then((result) => {
        // 如果使用者確認，執行刪除操作
        if (result.isConfirmed) {
            // 反向迭代，避免刪除索引錯誤
            for (let i = carts.value.length - 1; i >= 0; i--) {
                if (checkedItems.value[i]) {
                    removeItem(i); // 刪除選中的項目
                }
            }

            // 顯示成功提示
            Swal.fire({
                title: 'QQ 我在商品頁等你！',
                text: '已成功刪除商品！',
                icon: "success",
                timer: 1200,  // 自動消失
                showConfirmButton: false,  // 隱藏確認按鈕
            });
        }
    });
}


//ICON點擊刪除商品
function removeCartItem(index) {
    // 彈出 SweetAlert 提示，確認是否刪除
    Swal.fire({
        text: '是否要將此商品從購物車中移除？',
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "確定",
        cancelButtonText: "我再想想！",
    }).then((result) => {
        // 如果使用者確認，執行刪除操作
        if (result.isConfirmed) {
            carts.value.splice(index, 1);  // 刪除購物車中的商品
            checkedItems.value.splice(index, 1);
            updateLocalStorage();  // 更新 localStorage

            console.log(cart_data.value);

            // 顯示成功提示
            Swal.fire({
                title: 'QQ 我在商品頁等你！',
                text: '已成功刪除商品！',
                icon: "success",
                timer: 1200,  // 自動消失
                showConfirmButton: false,  // 隱藏確認按鈕
            });
        }
    });
}


//更新任何東西都會來到這個函式執行
function updateLocalStorage() {
    // 將 carts.value 存入 localStorage 中
    localStorage.setItem('cart', JSON.stringify(carts.value));

    // 更新注入的 cart_data
    cart_data.value = carts.value;
}

// ============儲存從 localStorage=====END========//


// ============優惠券開始=====STAR========//

//導入路由設定
const router = useRouter();
const route = useRoute();

// 商品優惠券自動填入碼
const coupon = ref({
    discount_code: '',
    discount_amount: ''
});

// 從 sessionStorage 或其他地方取出 token
const token = sessionStorage.getItem('token');
const handleCheckout = async () => {
    // 檢查購物車內是否有商品
    if (carts.value.length === 0) {
        await Swal.fire({
            title: '購物車是空的!',
            text: '請先選購商品，然後再結帳。',
            icon: 'warning',
            confirmButtonText: '去選購商品'
        });
        console.error('購物車內沒有商品，無法結帳。');
        return;  // 中斷操作，不會繼續執行後面的跳轉邏輯
    }

    // 如果購物車內有商品，可以結帳，不論優惠券狀態
    console.log('購物車內有商品，準備結帳...');

    try {
        // 如果有商品，開始進行結帳操作
        const formData = new FormData();
        formData.append('token', token);

        // 發送資料到伺服器，檢查優惠券的狀態
        const response = await fetch(`${import.meta.env.VITE_API_URL}/Login/UseCoupon.php`, {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        console.log('伺服器回應:', result);

        if (result.status === 'success') {
            // 優惠券有效，結帳成功，跳轉到下一頁
            console.log('優惠券已使用，結帳成功，正在跳轉...');
            router.push('/shop2');
        } else if (result.status === 'no_coupon') {
            // 如果沒有使用優惠券，依然允許結帳
            console.log('沒有使用優惠券，但仍可結帳，正在跳轉...');
            router.push('/shop2');
        } else {
            console.error('結帳失敗:', result.message);
        }
    } catch (error) {
        console.error('結帳過程中發生錯誤:', error);
    }
};

// 請求商品優惠券資料
const getCouponInfo = async () => {
    try {
        // 使用 FormData 傳送 token
        const formData = new FormData();
        formData.append('token', token);

        const response = await fetch(`${import.meta.env.VITE_API_URL}/Login/ShowCoupon.php`, {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        if (data.status === 'success') {
            coupon.value.discount_code = data.data.discount_code;
            coupon.value.discount_amount = data.data.discount_amount;
        } else {
            console.error('Error fetching user info:', data.message);
        }
    } catch (error) {
        console.error('Request failed:', error);
    }
};

// 計算總金額，商品金額減去折扣金額
const calculatedTotalPrice = computed(() => {
    return totalPrice.value - coupon.value.discount_amount;
});

// 監控優惠碼變化，如果優惠碼被清除，重置折扣金額
watch(() => coupon.value.discount_code, (newVal) => {
    if (newVal === '') {
        coupon.value.discount_amount = '0'; // 重置折扣金額為 0
    }
});

// 在組件加載時發起請求
onMounted(() => {
    getCouponInfo();
});


// 使用 beforeRouteEnter 钩子函数刷新頁面
router.beforeEach((to, from, next) => {
    if (to.name === 'shop1') {
        window.location.reload();
    }
    next();
});



// ============優惠券結束=============//

const baseUrl = import.meta.env.VITE_IMAGE_URL

const getImageUrl = (imgPath) => {
  return `${baseUrl === '/' ? '' : baseUrl }${imgPath}`;
};

</script>
<template>
    <div class="wrapper">
        <div class="header">
            <Header_0 :mode="currentMode"></Header_0>
        </div>
        <div class="step">
            <ShoppingStep :styles="highlight"></ShoppingStep>
        </div>
        <div class="contanier">
            <div class="order">
                <div class="title">
                    <p>訂單內容</p>
                    <button class="titlebtn" @click="removeSelectedItems">刪除</button>
                </div>
                <ul v-if="carts.length">
                    <!-- v-if="carts.length > 0" 放在 ul 裡面  -->
                    <li class="card" v-for="(item, index) in carts" :key="index">
                        <div class="product-info">
                            <input class="checkbox" type="checkbox" v-model="checkedItems[index]">
                            <!-- <img src="../assets/images/product_ex.jpg" alt="商品圖片" class="product-image"> -->
                            <img :src="getImageUrl(item.img)" alt="商品圖片" class="product-image">
                            <div class="description">
                                <div class="product-name">{{ item.name }}</div>
                                <!-- <div class="input">
                                    <select name="" id="">
                                        <option value="0">規格</option>
                                        <option value="1">可愛動物區</option>
                                        <option value="2">內心小女孩</option>
                                        <option value="3">大人釋懷中</option>

                                    </select>
                                </div> -->
                                <div v-if="item.size" class="size-select">尺寸: {{ item.size }}</div>
                                <div v-if="item.style" class="selectedStyle">樣式 : {{ item.style }}</div>
                            </div>
                            <!-- v-for="(item, index) in cartItems" -->
                            <div class="quantity-input">
                                <button class="quantity-button" id="minus6" @click="minusQuantity(index)">-</button>
                                <input type="text" v-model="item.quantity" min="1" />
                                <button class="quantity-button" id="plus6" @click="addQuantity(index)">+</button>
                            </div>
                            <span class="des_span">NT$ {{ item.price * item.quantity }} </span>
                            <img class="trash-can" src="../assets/images/trashcan.svg"
                                @click="checkedItems[index] ? removeCartItem(index) : null"
                                :class="{ 'disabled': !checkedItems[index] }" alt="刪除">
                        </div>

                    </li>
                </ul>
                <p v-else>購物車是空的</p>
            </div>
            <div class="payment">
                <p>使用折扣碼</p>
                <input type="text" v-model="coupon.discount_code" size="30">
                <div class="total">

                    <div class="count">
                        <h3>商品金額</h3>
                        <p>${{ totalPrice }}</p>
                    </div>

                    <div class="discount-fee">
                        <!-- <h3>折扣</h3>
                        <p>$0</p> -->
                        <h3>折扣</h3>
                        <!-- 當有折扣金額時，顯示折扣金額，否則顯示 $0 -->
                        <p v-if="coupon.discount_amount !== '' && coupon.discount_amount !== '0'"> -${{
                            coupon.discount_amount }} </p>
                        <p v-else>$0</p>
                    </div>

                    <hr>
                    <div class="total-fee" v-if="carts.length">
                        <h3>總金額</h3>
                        <p>${{ calculatedTotalPrice }}</p>
                    </div>
                </div>
                <div class="checkbutton">

                    <button class="check" @click="handleCheckout">
                        結帳
                    </button>

                </div>
            </div>
        </div>
        <hr>

        <div class="ProductAdd">
            <p>商品加購</p>
            <ul class="addProduct_grid">
                <li class="pro" @click="getProductDetailRoute(item)" v-for="item in productInfo" :key="item.PRODUCT_ID">
                    
                        <img :src="getImageUrl(item.PRODUCT_IMG)" alt="">
                        <p>{{ item.PRODUCT_NAME }}</p>
                        <div class="text">
                            <div class="price">
                                <span>NT${{ item.PRODUCT_PRICE }}</span>
                            </div>
                            <div class="icon">
                                <font-awesome-icon icon="fa-solid fa-cart-arrow-down" class="shoopingcar" />
                            </div>
                        </div>
                  
                </li>
            </ul>
        </div>
        <Footer></Footer>
    </div>
</template>



<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');


* {
    font-family: "Noto Sans TC";
}

.wrapper {
    background: linear-gradient(125deg, #22247A 23.82%, #7976BB 101.34%);
}



.step {
    padding-top: 50px;
}

.contanier {
    display: flex;
    width: 100%;
    max-width: 1000px;
    margin: 5% auto 0;
    justify-content: space-between;
}

.contanier p,
.contanier span {
    color: #FFFFFF;
}

.contanier p {
    margin: 10px 0px;

}

.order .title {
    border-radius: 10px;
    background: #000354;
    color: #FFFFFF;
    font-size: 20px;
    font-style: normal;
    padding: 10px;
    width: 630px;

    max-width: 98%;
    // min-width: 100px;

}

.description {
    // display: flex;
    line-height: 1.6;
}

.title {
    display: flex;
    justify-content: space-between;

}

.titlebtn {
    border-radius: 4px;
    background: #FFEDBC;
    border: none;
    color: #58596D;
    font-size: 16px;
    font-style: normal;
    font-weight: 700;
    width: 90px;
    cursor: pointer;
    padding: 5px;
}

.titlebtn:hover {
    opacity: 0.9
}

ul {
    list-style: none;
    margin-top: 10px;
}

.card {
    display: flex;
    align-items: center;

}

.trash-can {
    cursor: pointer;
    width: 100%;
    max-width: 20px;
}


.trash-can.disabled {
    opacity: 0.5;
    pointer-events: none;
}


// ======================

.product-info {
    width: 100%;
    display: grid;
    grid-template-columns: 0.5fr 1fr 2fr 1fr 1fr 1fr;
    padding: 10px;
    align-items: center;
    justify-items: center;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    text-align: left;
}

.product-name {
    line-height: 1.2;
}

.checkbox {
    appearance: none;
    /* 隱藏原始 checkbox */
    width: 100px;
    max-width: 16px;
    height: 16px;
    border: 1px solid #ffffff;
    /* 自定義背景色 */
    cursor: pointer;

    &:checked {
        background-color: rgba(255, 255, 255, 0);
        /* 選中後背景顏色 */
    }

    /* 打勾標記 */
    &:checked::after {
        // content: '✔'; /* 選中後顯示的符號 */
        content: '✓';
        display: block;
        text-align: center;
        line-height: 13px;
        color: #ffffff;
        /* 勾勾的顏色 */
        font-size: 16px;
    }
}

// ========================
.product-image {
    border-radius: 10px;
    object-fit: cover;
   
   width: 120px;
    height: 120px;
}

.quantity-input {
    display: flex;
    align-items: center;
    justify-content: start;
}

.quantity-button {
    vertical-align: middle;
    display: inline-block;
    text-align: center;
    font-size: 16px;
    width: 35px;
    height: 16px;
    /* 將高度設置為 40px，與輸入框一致 */
    line-height: 16px;
    /* 將 line-height 設置為 40px，確保文字垂直居中 */
    background-color: #FFEDBC;
    /* 設置背景色，根據需求調整 */
    border: 0
}

.quantity-input>button:hover {
    background-color: #B36243;
    transition: 0.3s;
}

.quantity-input>input {
    display: inline-block;
    text-align: center;
    font-size: 16px;
    width: 35px;
    /* 適當調整寬度，使其與按鈕相匹配 */
    height: 20px;
    /* 將高度設置為 40px，與按鈕一致 */
    line-height: 20px;
    /* 將 line-height 設置為 40px，確保文字垂直居中 */
    background-color: #FFEDBC;
    /* 設置背景色，根據需求調整 */
    margin: 0 2px;
    /* 添加 margin 以確保輸入框與按鈕之間有適當的間距 */
    box-sizing: border-box;
    /* 確保 padding 和 border 不會影響元素的寬度 */
    border: 0;
    // margin-bottom: 80px;
}

#minus6 {
    border-radius: 4px 0px 0px 4px;
}

#plus6 {
    border-radius: 0px 4px 4px 0px;
}


.input {
    width: 100%;
    max-width: 94%;
    position: relative;
    margin-top: 10px;
    border: 0
}

.input select {
    width: 90%;
    height: 20px;
    line-height: 20px;
    // border: 1px solid #ccc;
    border-radius: 4px;
    padding: 0 8px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
    appearance: none;
    background: #FFEDBC;
    vertical-align: baseline;
    cursor: pointer;
}

.input>select>option {
    line-height: 20px;
    vertical-align: middle;
    text-align: left;

}

.input::after {
    content: "▼";
    font-size: 16px;
    color: #B36243;
    position: absolute;
    right: 24px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
}

.input select:focus {
    // border-color: #B36243;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
    outline: none;
}

.quantity-input {
    display: flex;
    align-items: center;
    justify-content: start;
}

.quantity-button {
    display: inline-block;
    text-align: center;
    font-size: 1.6rem;
    width: 35px;
    height: 20px;
    // line-height: 20px; 
    background-color: #FFEDBC;
    border: 0;
}

.quantity-input>input {
    display: inline-block;
    text-align: center;
    font-size: 16px;
    width: 35px;
    height: 20px;
    line-height: 20px;
    background-color: #FFEDBC;
    margin: 0 2px;
    box-sizing: border-box;
    border: 0;
    // margin-bottom: 80px;
}

.payment {
    border-radius: 10px;
    background: #000354;
    width: 100%;
    max-width: 350px;
    max-height: 350px;
    padding: 30px;
    flex-grow: 0;
    color: #FFFFFF;
}

.detail {
    width: 100%;
    color: #FFFFFF;
}

.payment hr {
    width: 100%;
    max-width: 400px;

    background-color: #FFFFFF;
    margin: 20px auto;
    height: 2px;
    border: none;
    border-radius: 2.5px;
}

.payment input {
    border-radius: 8px;
    border: 1px solid #FFFFFF;
    outline: none;
    /* 移除默認的黑框 */
    background: none;
    color: #ffffff; //文字顏色
    padding-left: 10px;
    width: 100%;
    box-sizing: border-box;
}

// 結帳按鈕
.check:hover {
    opacity: 0.9;
}

// 商品確認按鈕
.payment button {
    border-radius: 4px;
    background: #FFEDBC;
    border: none;
    color: #58596D;
    font-size: 16px;
    font-style: normal;
    font-weight: 700;
    width: 100%;
    cursor: pointer;
    padding: 5px;
    margin-top: 15px;
}

.discount-fee {
    margin: 10px auto;
}

.total {
    margin-top: 20px;
}

.count,
.discount-fee,
.total-fee {
    display: flex;
    justify-content: space-between;
}

.count p,
.discount-fee p,
.total-fee p {
    flex-basis: 0%;
}


// 下方加購

.icon svg {
    width: 100%;
    max-width: 20px;
}


.count,
.discount-fee,
.total-fee {
    display: flex;
    justify-content: space-between;
}

.count p,
.discount-fee p,
.total-fee p {
    flex-basis: 20%;
}

.wrapper hr {
    background-color: #FFFFFF;
    margin: 20px auto;
    height: 2px;
    border: none;
    border-radius: 2.5px;
    width: 100%;
    max-width: 1000px;
}

// 下方加購
.ProductAdd {
    width: 100%;
    max-width: 1000px;
    margin: 3% auto;
    padding: 10px;
    color: #FFFFFF;

    position: relative;
}

.addProduct_grid {
    display: grid;
    gap: 10px;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));

}

.ProductAdd p {
    margin-bottom: 25px;
}

// 價格&icon
.text {
    display: flex;
    // justify-content: space-around;
    color: #FFFFFF;
    // text-align: left;
    
}

.pro {
    cursor: pointer;
    padding: 20px;
}

.pro p {
    margin: 20px auto;
    font-family: "Noto Sans TC";
    height: 4vh;
    color: #FFFFFF;
}

.pro img {
    border-radius: 10px;
    width: 100%;
    max-width: 150px;
}

.price>span{
    margin-right: 60px;
}


// =====  RWD  =====

@media screen and (max-width: 1024px) {
    .contanier {
        width: 80%;
        gap: 20px;
    }

    .order {
        width: 499px;
    }

    .ProductAdd {
        width: 80%;
    }

    .payment {
        max-width: 300px;
        padding: 20px;
    }

    .input select {
        width: 80%;
        font-size: 14px;
    }

    .input::after {
        font-size: 14px;
    }

    .quantity-input>input {
        width: 40px;
    }

    .quantity-button {
        width: 30px;
    }

}


@media screen and (max-width: 900px) {

    .contanier {
        flex-direction: column;
        align-items: center;
    }

    .product-image {
        grid-column: 2/3;
        grid-row: 1/4;
    }


    .product-info {
        width: 100%;
        display: grid;
        grid-template-columns: 0.2fr 1.5fr 1.5fr 0.2fr;
        padding: 10px;
        align-items: center;
        justify-items: center;
        color: var(--Color-6, #FFF);
        font-family: "Noto Sans TC";
        grid-template-rows: 1fr 1fr 1fr;

    }

    .quantity-input {
        grid-column: 3/4;
        grid-row: 2/3;
        justify-self: start;
    }

    .des_span {
        grid-column: 3/4;
        grid-row: 3/4;
        align-self: start;
        justify-self: start;
    }

    .trash-can {
        grid-column: 4/5;
        grid-row: 3/4;
        justify-self: start;
    }

    .checkbox {
        grid-column: 1/2;
        grid-row: 2/3;
    }

    .description {
        grid-column: 3 / 4;
        grid-row: 1 / 2;
    }
}

@media screen and (max-width: 430px) {

    .quantity-input>input {
        width: 30px;
    }

    .quantity-button {
        width: 15px;
        font-size: 10px;
        font-weight: bold;
    }

    .product-info {
        padding: 0;
        gap: 5px;
    }

    // .order .title {
    //     width: 100%;
    // }

    .order {
        max-width: 560px;
        width: 100%;
    }


    .input::after {
        font-size: 12px;
    }

    .payment {
        max-width: 300px;
    }

    .addProduct_grid {
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr))
    }
}
</style>