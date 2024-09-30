<script setup>
import Header_0 from '@/components/Header_0.vue';
import Footer_0 from '@/components/Footer_0.vue';
import ShoppingStep from '@/components/ShoppingStep.vue';
import { ref, computed, watch } from 'vue';

import { onMounted } from 'vue';

import { useRouter, useRoute } from 'vue-router';

//sweetalert彈跳視窗
import Swal from 'sweetalert2'; // 在 script setup 中引入
import 'sweetalert2/src/sweetalert2.scss';



const router = useRouter();
const route = useRoute();

// 在頁面載入時，如果 URL 中有傳遞的 storeName 和 storeAddress，則更新變數
onMounted(() => {

    if (route.query.storeName && route.query.storeAddress) {
        name.value = route.query.storeName;
        address.value = route.query.storeAddress;
        orderData.value.store = route.query.storeName; // 使用新的變數名
        orderData.value.address = route.query.storeAddress;
    }

    // 檢查是否有 shippingMethod 參數
    if (route.query.shippingMethod) {
        shippingMethod.value = route.query.shippingMethod; // 設定為 7-11取貨
    }


});

const goToMap = () => {
    router.push('/map_page');
};

// ----------同會員資料/ 同訂購人資訊---------
// 定義 name 和 address 變數
const name = ref('');
const address = ref('');

const formData = ref({
    user_name: '',
    phone_number: '',
    address: '',
});

const orderData = ref({
    address: '',
    store: ''
});

const acceptorData = ref({
    name: '',
    phone: '',
    address: ''
});
async function prefillMemberInfo(event) {
    if (event.target.checked) {

        try {
            const token = sessionStorage.getItem('token');
            // 使用 FormData 傳送 token
            const keyformData = new FormData();
            keyformData.append('token', token);

            const response = await fetch('http://illusionlab.local/public/PDO/Login/GetUserInfo.php', {
                method: 'POST',
                body: keyformData
            });

            if (!response.ok) {
                throw new Error(`伺服器回應錯誤，狀態碼：${response.status}`);
            }

            const memberData = await response.json();


            formData.value = memberData.data;
            // formData.value.phone = memberData.phone;
            // formData.value.address = memberData.address;
        } catch (error) {
            console.error('取得會員資料失敗:', error);
        }
    } else {
        formData.value.user_name = '';
        formData.value.phone_number = '';
        formData.value.address = '';
    }
}




// 使用訂購人資料來填充收件人資訊
function prefillOrdererInfo(event) {
    if (event.target.checked) {
        acceptorData.value.name = formData.value.name;
        acceptorData.value.phone = formData.value.phone;
        acceptorData.value.address = formData.value.address;
    } else {
        acceptorData.value.name = '';
        acceptorData.value.phone = '';
        acceptorData.value.address = '';
    }
}

// ----------同會員資料/ 同訂購人資訊 end---------

// 付款方式
const paymentMethod = ref('');

const shippingMethod = ref('');
const shippingFee = computed(() => {
    if (shippingMethod.value === '7-11取貨') {
        return 60;
    } else if (shippingMethod.value === '宅配到府') {
        return 100;
    } else {
        return 0;
    }
});



const itemsTotal = computed(() => {
    return cartItems.value.reduce((total, item) => {
        return total + item.quantity * item.price;
    }, 0);
});

const totalAmount = computed(() => {
    return itemsTotal.value + shippingFee.value;
});



// 將 v-model 欄位(表單資訊)儲存到 localStorage==========================
watch(formData, (newValue) => {
    localStorage.setItem('formData', JSON.stringify(newValue));

}, { deep: true });

// 將宅配收件人資料acceptorData存入 localStorage
watch(acceptorData, (newValue) => {
    localStorage.setItem('acceptorData', JSON.stringify(newValue));
}, { deep: true });


// 將7-11門市資料orderData存入 localStorage
watch(orderData, (newValue) => {
    localStorage.setItem('orderData', JSON.stringify(newValue));
}, { deep: true });

// 將運送方式shippingMethod存入 localStorage
watch(shippingMethod, (newValue) => {
    localStorage.setItem('shippingMethod', JSON.stringify(newValue));
}, { deep: true });

// 將付款方式paymentMethod存入 localStorage
watch(paymentMethod, (newValue) => {
    localStorage.setItem('paymentMethod', JSON.stringify(newValue));
}, { deep: true });




// 創建訂單==================================
const submitOrder = async () => {
    // 確保從 localStorage 取出的 formData 不為 null，如果是 null，則設置為空物件
    const formData = JSON.parse(localStorage.getItem('formData')) || {
        user_name: '',
        phone_number: '',
        address: ''
    };


    const cart = JSON.parse(localStorage.getItem('cart')) || []; // 從 localStorage 獲取購物車資料
    const token = sessionStorage.getItem('token'); // 從 sessionStorage 或其他地方取出 token
    const orderDate = new Date().toISOString().slice(0, 19).replace('T', ' '); // 訂單日期
    const paymentDate = new Date().toISOString().slice(0, 19).replace('T', ' '); // 付款日期


    // 資料完整性檢查
    // 訂購人資料完整性檢查
    if (!formData.user_name || !formData.phone_number || !formData.address) {
        Swal.fire({
            title: '訂購人資料不完整',
            text: '請確保訂購人的姓名、手機、地址已填寫完成。',
            icon: 'warning',
            confirmButtonText: '確認'
        });
        return; // 結束函數
    }

    // 收件人資訊檢查（依據運送方式）
    if (shippingMethod.value === '宅配到府' && (!acceptorData.value.name || !acceptorData.value.phone || !acceptorData.value.address)) {
        Swal.fire({
            title: '收件人資訊不完整',
            text: '請確保收件人的姓名、手機和地址已填寫完成。',
            icon: 'warning',
            confirmButtonText: '確認'
        });
        return; // 結束函數
    }

    // 門市取貨資訊檢查（7-11 取貨）
    if (shippingMethod.value === '7-11取貨' && (!orderData.value.store || !orderData.value.address)) {
        Swal.fire({
            title: '門市資訊不完整',
            text: '請選擇 7-11 取貨的門市和門市地址。',
            icon: 'warning',
            confirmButtonText: '確認'
        });
        return; // 結束函數
    }

    // 運送方式檢查
    if (!shippingMethod.value) {
        Swal.fire({
            title: '運送方式不完整',
            text: '請選擇運送方式。',
            icon: 'warning',
            confirmButtonText: '確認'
        });
        return; // 結束函數
    }

    // 付款方式檢查
    if (!paymentMethod.value) {
        Swal.fire({
            title: '付款方式不完整',
            text: '請選擇付款方式。',
            icon: 'warning',
            confirmButtonText: '確認'
        });
        return; // 結束函數
    }

    try {
        const response = await fetch('http://illusionlab.local/public/PDO/ProductOrder/CreateProductOrder.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                token,           // 傳送 token，後端會根據 token 確認 userId
                products: cart,   // 傳送購物車商品
                orderDate,        // 訂單日期
                formData,
                paymentDate,
                shippingMethod: shippingMethod.value,
                paymentMethod: paymentMethod.value,
                orderData: orderData.value,
                acceptorData: acceptorData.value       // 包含訂購人資訊
            })
        });

        const result = await response.json();
        if (result.success) {
            const productOrderId = result.orderId;
            console.log('Order created successfully:', result.orderId);

            // 清空購物車和表單資料
            localStorage.removeItem('cart');
            localStorage.removeItem('formData');

            // 跳轉到下一個頁面，並傳遞 productOrderId
            router.push({ path: '/shop3', query: { productOrderId } });
        } else {
            console.error('Error creating order:', result.message);
        }
    } catch (error) {
        console.error('Error creating order:', error);
    }
};

// ============ShoppingStep=============//
const highlight = ref({
    1: { background: 'transparent', fontcolor: '#fff', fontsize: '12px' },
    2: { background: '#fff', fontcolor: '#22247A', fontsize: '12px' },
    3: { background: 'transparent', fontcolor: '#fff', fontsize: '12px' }

}
);


// const totalPrice = computed(() => {
//     return carts.value.reduce((total, item) => {
//         return total + item.quantity * item.price;
//     }, 0);
// });



// const totalAmount = computed(() => {
//     return totalPrice.value + shippingFee.value;
// });


// ============儲存從 localStorage=====STAR========//


// 購物車商品列表 : cartItems是一個 ref，用來儲存從 localStorage 中撈取的購物車資料。
const carts = ref([]);



// 從 localStorage 撈取購物車資料的函數並存入 carts
function loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    carts.value = cart;
}

// 當組件掛載時撈取資料
onMounted(() => {
    loadCart();
    console.log(carts.value); // 確認 carts 已成功加載
});

watch(carts, (newVal) => {
    console.log('carts updated:', newVal);
});


// 計算購物車總價:是一個 computed 屬性，用來計算購物車中所有商品的總價
const totalPrice = computed(() => {
    return carts.value.reduce((sum, item) => {
        return sum + item.price * item.quantity;
    }, 0);
});

// 計算總金額，包含商品金額、運費及折扣
const calculatedTotalPrice = computed(() => {
    return totalPrice.value + shippingFee.value;
});

</script>

<template>
    <div class="wrapper">
        <div class="header">
            <Header_0></Header_0>
        </div>

        <!--購物車流程數字圖示_組件模板開始線-->
        <div class="ShoppingStep">
            <ShoppingStep :styles="highlight"></ShoppingStep>
        </div>

        <!-- 購物車流程數字圖示_組件模板結束線 -->

        <div class="content">
            <div class="order">
                <h2>訂單資訊</h2>
                <div class="content-1">
                    <!--處理重要介紹文在寬度1140px內置中排版-->
                    <div class="inner0">
                        <p>訂購人資訊</p>
                        <label class="custom-checkbox">
                            <input type="checkbox" @change="prefillMemberInfo" />
                            <span class="checkmark"></span>
                            <span class="text">同會員資料</span>
                        </label>
                    </div>
                    <div class="inner01">
                        <p>*姓名:</p>
                        <div class="code-input">
                            <div class="fill">
                                <input type="text" v-model="formData.user_name" />
                            </div>
                        </div>
                    </div>
                    <div class="inner02">
                        <p>*手機:</p>
                        <div class="code-input">
                            <div class="fill">
                                <input type="text" v-model="formData.phone_number" />
                            </div>
                        </div>
                    </div>
                    <div class="inner03">
                        <p>地址:</p>
                        <div class="code-input">
                            <div class="fill">
                                <input type="text" v-model="formData.address" />
                            </div>
                        </div>
                    </div>
                    <div class="inner04">
                        <p>*運送方式:</p>
                        <div class="form-check">
                            <label class="custom-checkbox">
                                <input type="radio" name="shipping" value="宅配到府" v-model="shippingMethod" />
                                <span class="checkmark"></span>
                                <span class="text">宅配到府(運費 $100元)</span>
                            </label>
                            <div v-if="shippingMethod === '宅配到府' && shippingMethod !== '現場取貨'" class="delivery-form">
                                <div class="member_info">
                                    <span class="text">收件人資訊:</span>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" @change="prefillOrdererInfo" />
                                        <span class="checkmark"></span>
                                        <span class="text">同訂購人資訊</span>
                                    </label>
                                </div>
                                <br>
                                <label>*姓名: <input type="text" v-model="acceptorData.name" /></label>
                                <br>
                                <br>
                                <label>*手機: <input type="text" v-model="acceptorData.phone" /></label>
                                <br>
                                <br>
                                <label>*地址: <input type="text" v-model="acceptorData.address" /></label>
                            </div>

                            <label class="custom-checkbox">
                                <input type="radio" name="shipping" value="7-11取貨" v-model="shippingMethod" />
                                <span class="checkmark"></span>
                                <span class="text">7-11取貨(運費 $60元)</span>
                            </label>
                            <div v-if="shippingMethod === '7-11取貨' && shippingMethod !== '現場取貨'" class="pickup-form">
                                <div class="member_info">
                                    <span class="text">收件人資訊:</span>
                                </div>
                                <br>
                                <label class="store">7-11門市
                                    <button class="storechoose" @click="goToMap">選擇門市</button>
                                </label>
                                <!-- 顯示選擇的門市和地址 -->
                                <p class="orderData">門市名稱: {{ orderData.store }}</p>
                                <p class="orderData">門市地址: {{ orderData.address }}</p>
                            </div>
                            <label class="custom-checkbox">
                                <input type="radio" name="shipping" value="現場取貨" v-model="shippingMethod" />
                                <span class="checkmark"></span>
                                <span class="text">現場取貨</span>
                            </label>

                        </div>


                    </div>
                    <div class="inner05">
                        <p>*付款方式:</p>
                        <div class="form-check">
                            <label class="custom-checkbox">
                                <input type="radio" name="pay" v-model="paymentMethod" value="信用卡" />
                                <span class="checkmark"></span>
                                <span class="text">信用卡/金融卡</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="radio" name="pay" disabled />
                                <span class="checkmark"></span>
                                <span class="text">轉帳付款(尚未開放)</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="radio" name="pay" disabled />
                                <span class="checkmark"></span>
                                <span class="text">街口支付(尚未開放)</span>
                            </label>
                        </div>

                    </div>
                </div>
            </div>



            <div class="payment">

                <div class="total">
                    <h2>商品明細</h2>
                    <hr>
                    <div class="item" v-for="(item, index) in carts" :key="index">
                        <img :src="item.img" alt="商品圖片">
                        <div class="item_content">
                            <h3>{{ item.name }}</h3>
                            <div class="time">
                                <div v-if="item.size" class="size-select">尺寸: {{ item.size }}</div>
                                <div v-if="item.style" class="selectedStyle">樣式 : {{ item.style }}</div>
                                <div>數量: {{ item.quantity }}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="count">
                        <h3>商品金額</h3>
                        <!-- <p>${{ itemsTotal }}</p> -->
                        <p>${{ totalPrice }}</p>
                    </div>
                    <div class="shipping-fee">
                        <h3>運費</h3>
                        <p>${{ shippingFee }}</p>
                    </div>
                    <div class="discount-fee">
                        <h3>折扣</h3>
                        <!-- <p v-if="coupon.value.discount_amount !== 0">${{ coupon.value.discount_amount }}</p>
                        <p v-else>$0</p> -->
                    </div>
                    <hr>
                    <div class="total-fee" v-if="carts.length">
                        <h3>總金額</h3>
                        <p>${{ calculatedTotalPrice }}</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="confirm">
            <RouterLink to="/shop"><button>返回</button></RouterLink>
            <button @click="submitOrder">結帳</button>

        </div>
        <Footer_0></Footer_0>
    </div>
</template>


<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');


.wrapper {
    background: linear-gradient(134deg, #22247A 23.77%, #7976BB 100.56%);
}



.step {
    padding-top: 100px;
}

.content {
    margin: 0 auto;
    margin-top: 5%;
    width: 100%;
    max-width: 1000px;
    display: flex;
    justify-content: space-between;
    gap: 4%;
    // border: 1px solid white;
}

.order {
    width: 100%;
    max-width: 520px;
}

.order h2 {
    font-size: 20px;
    font-weight: 700;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}

.content-1 {
    /* border: 1px solid red;  */
    width: 100%;
    max-width: 600px;
    padding: 40px 0;
    margin: 0 auto;
    /* display: flex; */
    // border: 1px solid white;

}

.inner0 {
    /* border: 1px solid red; */
    display: flex;
    align-items: start;
    justify-content: space-between;

}

.inner0>p {
    font-size: 16px;
    line-height: 16px;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.inner01 {
    /* border: 1px solid red; */
    display: flex;
    align-items: start;
    justify-content: space-between;
    margin-bottom: 24px;

}

.inner01>p {
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.inner02 {
    display: flex;
    align-items: start;
    justify-content: space-between;
    margin-bottom: 24px;


}

.inner02>p {
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";


}

.inner03 {
    display: flex;
    align-items: start;
    justify-content: space-between;
    margin-bottom: 44px;


}

.inner03>p {
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";


}

.code-input {
    flex-basis: 80%;

}

.fill>input {
    /* border: 1px solid red; */
    width: 96%;
    height: 24px;
    background-color: rgba(255, 255, 0, 0);
    border: 1px solid #FFF;
    border-radius: 10px;
    padding: 0 8px;
    font-size: 16px;
    color: #FFF;
    transition: border-color 0.3s ease-in-out;
}

.fill>input:focus {
    border-color: #FCB600;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
    /* 暈染效果 */
    outline: none;
    /* 移除默認的黑框 */
}


.inner03>.code-input>.fill>textarea {
    /* border: 1px solid red; */
    width: 100%;
    height: 200px;
    border: 0;
    border: 1px solid #ccc;
    /* border-radius: 4px; */
    padding: 8px 8px;
    font-size: 20px;
    transition: border-color 0.3s ease-in-out;
}

.inner03>.code-input>.fill>textarea:focus {
    border-color: #B36243;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
    /* 暈染效果 */
    outline: none;
    /* 移除默認的黑框 */
}

.inner04 {
    display: flex;
    align-self: start;
    /* border: 1px solid red; */
    margin-bottom: 24px;


}

.inner04>p {
    font-size: 16px;
    line-height: 16px;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}

.form-check {
    display: flex;
    flex-direction: column;
    flex-basis: 80%;
}

// 運送方式下拉式選單樣式開始
/* 過渡效果 */
// .fade-enter-active, .fade-leave-active {
//   transition: opacity 0.5s;
// }
// .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
//   opacity: 0;
// }

/* 基本樣式 */
.delivery-form,
.pickup-form {

    background-color: #000354;
    color: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 15px;
}

.delivery-form>label {
    margin-bottom: 28px;
}

.member_info {
    display: flex;
    justify-content: space-between;
    // align-items: center;
}

.pickup-form>label {
    margin-bottom: 28px;
}

.delivery-form input,
.pickup-form input {
    width: 82%;
    height: 24px;
    background-color: #fff(255, 255, 0, 0);
    border: 1px solid #FFF;
    border-radius: 10px;
    padding: 0 8px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}

.delivery-form input:focus {
    border-color: #FCB600;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
    /* 暈染效果 */
    outline: none;
    /* 移除默認的黑框 */
}

.pickup-form input:focus {
    border-color: #FCB600;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
    /* 暈染效果 */
    outline: none;
    /* 移除默認的黑框 */
}

.store>input {
    width: 76%;
    background-color: #FCB600;
    border: 1px solid #FCB600;
}

// 運送方式下拉式選單樣式結束

.inner05 {
    display: flex;
    align-self: start;
    /* border: 1px solid red; */
    margin-bottom: 24px;


}

.inner05>p {
    font-size: 16px;
    line-height: 16px;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}


.form-check {
    display: flex;
    flex-direction: column;

}

.checkmark {
    font-size: 16px;
    line-height: 16px;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}

.custom-checkbox {
    display: flex;
    margin-bottom: 16px;



}

.custom-checkbox .text {
    vertical-align: text-top;
    font-size: 16px;
    line-height: 16px;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}

/* 調整checkbox的樣式 */
/* 隱藏預設的 checkbox */
.custom-checkbox input[type="radio"],
.custom-checkbox input[type="checkbox"] {
    display: none;
}

/* 自訂的 checkbox 外觀 */
.custom-checkbox {
    /* border: 1px solid red; */


    display: inline-block;
    position: relative;
    padding-left: 35px;
    cursor: pointer;
    font-size: 22px;
    user-select: none;
}

/* checkbox 的方塊 */
.custom-checkbox .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 16px;
    width: 16px;
    background-color: #ffffff00;
    border: 1px solid #FFF;

}

/* checkbox 被勾選時的樣式 */
.custom-checkbox input:checked+.checkmark {
    background-color: #b3634300;
}

/* 自訂的勾號 */
.custom-checkbox .checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* 勾號的樣式 */
.custom-checkbox input:checked+.checkmark:after {
    display: block;
}

/* 勾號的圖案 */
.custom-checkbox .checkmark:after {
    left: 4px;
    top: 0px;
    width: 5px;
    height: 9px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
}


/*  disabled 的樣式 */
.custom-checkbox input[type="radio"]:disabled+.checkmark+.text {
    color: #FFF;
    /* 保持文字顏色一致 */
    opacity: .7;
}

.payment {
    background: var(--header-footer, #000354);
    width: 400px;
    height: 400px;
    border-radius: 10px;
    flex-grow: 0;

}


.payment h2 {
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
}


.total {
    width: 100%;
    max-width: 350px;
    margin: 0 auto;
    padding: 20px;

}

.total hr {
    height: 2px;
    background-color: #FFF;
    border: none;
    border-radius: 2.5px;
    /* 讓線條變得更加圓潤 */
}

.item {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    font-weight: 800;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.item_content {
    width: 50%;
    flex-grow: 0%;
}

.input {
    width: 88%;
    position: relative;
    /* 為了偽元素定位 */
    margin-bottom: 8px;
    border: 0
}

.input select {
    width: 100%;
    height: 20px;
    line-height: 20px;
    /* 確保游標高度與input框高度一致 */
    // border: 1px solid #ccc;
    border-radius: 6px;
    padding: 0 8px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
    appearance: none;
    /* 隱藏默認的下拉箭頭 */
    background: #FFEDBC;
    cursor: pointer;
}

.input>select>option {
    line-height: 20px;
    /* 讓選項的高度與select框一致 */
    vertical-align: middle;
    /* 垂直置中 */
    text-align: left;
    /* 水平靠左對齊 */
    /* 加上內邊距，讓文字與邊框有間隔 */
}

.input::after {
    content: "▼";
    /* 使用自定義的箭頭符號 */
    font-size: 16px;
    color: #B36243;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    /* 確保偽元素不會干擾選擇操作 */
}

.input select:focus {
    // border-color: #B36243;
    box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
    /* 暈染效果 */
    outline: none;
    /* 移除默認的黑框 */
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
    width: 40px;
    height: 20px;
    /* 將高度設置為 40px，與輸入框一致 */
    line-height: 20px;
    /* 將 line-height 設置為 40px，確保文字垂直居中 */
    background-color: #FFEDBC;
    /* 設置背景色，根據需求調整 */
    border: 0;
    cursor: pointer;
}

.quantity-input>button:hover {
    background-color: #B36243;
    transition: 0.3s;
}

.quantity-input>input {
    display: inline-block;
    text-align: center;
    font-size: 16px;
    width: 50px;
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

.item_content i {
    display: flex;
    justify-content: end;
    // border: 1px solid #FFF;
    margin-top: 80px;
}



.count {
    /* border: 1px solid blue; */

    width: 100%;
    /* padding-left: 40px; */
    display: flex;
    justify-content: space-between;

}

.count>h3 {

    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 25%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.count>p {
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 0%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.shipping-fee {
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.shipping-fee>h3 {

    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 20%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.shipping-fee>p {
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 0%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.discount-fee {
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.discount-fee>h3 {
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 25%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.discount-fee>p {
    font-size: 16px;
    line-height: 1.6rem;
    flex-basis: 0%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.total-fee {
    display: flex;
    justify-content: space-between;
}

.total-fee>h3 {
    /* border: 1px solid blue; */

    font-size: 20px;
    line-height: 1.6rem;
    flex-basis: 23%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";

}

.total-fee>p {
    font-size: 20px;
    line-height: 1.6rem;
    flex-basis: 0%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}

.confirm {
    display: flex;
    width: 240px;
    margin: 0 auto;
    margin-bottom: 80px;
    gap: 56px;
    justify-content: center;
}

.confirm button {
    font-size: 16px;
    width: 200px;
    height: 40px;
    padding: 4px;
    border: none;
    border-radius: 50px;
    background: var(--Color-3, #FFEDBC);
    cursor: pointer;
}

.trash {
    display: flex;
    justify-content: end;
}

.trash-can {
    cursor: pointer;
    width: 100%;
    max-width: 20px;
    margin: 12px 0;
}

button:hover {
    opacity: .9;
}


// 門市選擇的字串
.inner04 .orderData {
    margin-bottom: 0;
    margin-top: 20px;
}

.storechoose {
    background: #FFEDBC;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* ==========RWD斷點============== */

@media screen and (max-width: 1040px) {
    .content {
        margin: 0 auto;
        margin-top: 5%;
        width: 80%;
        max-width: 1000px;
        display: flex;
        justify-content: space-between;
        // border: 1px solid white;
        gap: 4%;
    }

    .inner0>p {
        font-size: 16px;
        line-height: 16px;
        flex-basis: 48%;
        color: var(--Color-6, #FFF);
        font-family: "Noto Sans TC";
    }

    .inner04>p {
        font-size: 16px;
        line-height: 16px;
        flex-basis: 32%;
        color: var(--Color-6, #FFF);
        font-family: "Noto Sans TC";
    }

    .inner05>p {
        font-size: 16px;
        line-height: 16px;
        flex-basis: 32%;
        color: var(--Color-6, #FFF);
        font-family: "Noto Sans TC";
    }

}

@media screen and (max-width: 780px) {




    .content {
        margin: 0 auto;
        margin-top: 5%;
        width: 88%;
        max-width: 624px;
        display: flex;
        flex-direction: column;
        gap: 4%;
    }
}

.order {
    width: 100%;
    max-width: 624px;
}

.fill>input {
    /* border: 1px solid red; */
    width: 92%;
}

.delivery-form input,
.pickup-form input {
    width: 65%;
}



.inner04 {
    display: flex;
    flex-direction: column;
    align-self: start;
    margin-bottom: 24px;
}

.inner04 p,
.inner05 p {
    margin-bottom: 24px;
}

.inner05 {
    display: flex;
    flex-direction: column;
    align-self: start;
    margin-bottom: 24px;
}

.payment {
    background: var(--header-footer, #000354);
    width: 100%;
    max-width: 624px;
    height: 100%;
    border-radius: 10px;
    flex-grow: 0;
    margin-bottom: 40px;
}

.total {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;

}

.item img {
    width: 40%;
    object-fit: contain;
    margin: 12px;
}

.confirm {
    width: 90vw;
}

.confirm button {
    font-size: 16px;
    max-width: 120px;
    width: 90vw;
}
</style>
