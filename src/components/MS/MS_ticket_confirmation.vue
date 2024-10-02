<template>
    <div class="template_mobang" :class=holyShitBGI>
        <div class="top">
            <MS_com_title 
            :mode="modeSelect"  
            mainTitle="資料確認" 
            subTitle="Information Confirmation"/>
        </div>
        <main :style="{ borderColor: MobangColor }">
            <div class="confirmTitle" :style="{ borderColor: MobangColor }">
                <h3 :style="{color: MobangColor }">確認你的資料。</h3>
                <h4 :style="{color: MobangColor }">如你在選擇時間時安排有誤，還請自行承擔負責。</h4>
            </div>
            
            <div class="eventInfo">
              <h4 :style="{color: MobangColor }">活動名稱：{{ eventName }}</h4>
                <h4 :style="{color: MobangColor }">預約人數：{{ guestNumber }}人</h4>
                <h4 :style="{color: MobangColor }">日期：{{ date }}</h4>
                <h4 :style="{color: MobangColor }">時段：{{ time }}</h4>
            </div>
            <div class="memberInfo">
                <h4 :style="{color: MobangColor }">姓名：{{ name }}</h4>
                <h4 :style="{color: MobangColor }">電話：{{ phone }}</h4>
                <h4 :style="{color: MobangColor }">電子郵件：{{ email }}</h4>
                <h4 :style="{color: MobangColor }">統一編號：{{ taxID }}</h4>
                <h4 :style="{ color: MobangColor }">公司名稱：{{ companyName }}</h4>
                <h4 :style="{ color: MobangColor }">備註：{{ comments }}</h4>
            </div>
            
        </main>
        <div class="thereAreSoManyShitThatIHaveToCheck">
          <label class="coupon" for="">
            <h4 :style="{ color: MobangColor }">折扣碼：</h4>
            <input type="text" v-model="this.discountCode" @input="checkDiscount" readonly>
          </label>
          <label class="text1" for="">
            <h4 :style="{ color: MobangColor }">售價：</h4>
            <h4 :style="{ color: MobangColor }">NT$</h4>
            <h3 :style="{ color: MobangColor }">{{ totalAmount }}</h3>
          </label>
          <label class="text1" for="">
            <h4 :style="{ color: MobangColor }">折扣：</h4>
            <h4 :style="{ color: MobangColor }">NT$</h4>
            <h3 :style="{ color: MobangColor }">{{ discount }}</h3>
          </label>
          <div class="line"></div>
          <label class="text2" for="">
            <h4 :style="{ color: MobangColor }">總金額：</h4>
            <h4 :style="{ color: MobangColor }">NT$</h4>
            <h3 :style="{ color: MobangColor }">{{ total }}</h3>
          </label>
            
            <!-- <label for="privacy">
              <input type="checkbox" name="" id="privacy">
              <h4 :style="{color: MobangColor }">
                已了解隱私條款
              </h4>
            </label>
            <label for="rule">
              <input type="checkbox" name="" id="rule">
              <h4 :style="{color: MobangColor }">
                已了解入場需知
              </h4>
            </label> -->
            <p :style="{color: MobangColor }">即將跳轉離開網站，進入結帳流程，完成付款。<br>
                完成付款後，Email信箱中會收到訂單QRCODE與客製票卷連結，請前往確認。<br>
                活動當天請持訂單QRCODE至櫃台月換實體票卷</p>
        </div>
    <!-- <MS_com_buttons 
      :mode="currentMode" :currentStep="currentStep"
        mode="two1" :step="modeSelect"
    /> -->
    <button class="sbmit" @click="submitOrder()">PAY NOW</button>
    <!-- 彈窗 -->
  </div>
</template>
<script>
import MS_com_title from '@/components/MS/MS_com_title.vue';
import { useTicketStore } from '@/stores/ticketStore'; // 引入 Pinia store
import axios from 'axios';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';



export default {
  components: {
    MS_com_title,
  },
  data() {
    return {
      ticketStore: useTicketStore(),
      eventPrice: 0, // 存儲從後端獲取的單價
      totalAmount: 0, // 總金額
      isLastStep: true,
      eventName: '',
      discountCode: '',
      discount: 0,
      total: 0,
      member: {}, // 用於存儲會員信息
      isDiscountUsed: false, // 新增，用於判斷是否已使用折扣碼
      orderId: null
    };
  },
  props: {
    mode: {
      type: String,
      default: 'one',
      validator: value => ['one', 'two', 'three'].includes(value),
    },
    eventId: {
      type: Number,
      required: true // 父層傳來的活動 ID
      },
  },
  computed: {
    holyShitBGI() {
      if (this.mode === 'one') {
        return 'template_mobangOne';
      } else if (this.mode === 'two') {
        return 'template_mobangTwo';
      } else if (this.mode === 'three') {
        return 'template_mobangThree';
      }
      return 'template_mobangOne';
    },
    modeSelect() {
      if (this.mode === 'one') {
        return 'one';
      } else if (this.mode === 'two') {
        return 'two';
      } else if (this.mode === 'three') {
        return 'three';
      }
      return 'one';
    },
    MobangColor() {
      if (this.mode === 'one' || this.mode === 'two') {
        return '#FFFFFF';
      } else if (this.mode === 'three') {
        return '#855F49';
      }
      return '#FFFFFF';
    },

    // 將 Pinia store 的狀態轉換成 computed
    guestNumber() {
      return this.ticketStore.guestNumber;
    },
    date() {
      return this.ticketStore.date;
    },
    time() {
      return this.ticketStore.time;
    },
    name() {
      return this.ticketStore.name;
    },
    phone() {
      return this.ticketStore.phone;
    },
    email() {
      return this.ticketStore.email;
    },
    taxID() {
      return this.ticketStore.taxID;
    },
    companyName() {
      return this.ticketStore.companyName;
    },
    comments() {
      return this.ticketStore.comments;
    },
    totalAmount() {
      return this.ticketStore.totalAmount; // 讀取 totalAmount
    },
    eventName() {
      return this.ticketStore.eventName;
    },
    eventId() {
      return this.ticketStore.eventId;
    },
    discountCode() {
      return this.ticketStore.discountCode;
    },
    discount() {
      return this.ticketStore.discount;
    },
    total() {
      return this.ticketStore.total;
    },
    orderId() {
      return this.ticketStore.orderId;
    },
    
  },
  data() {
    return {
      ticketStore: useTicketStore(), // 引入 Pinia store 到 data 中
    };
  },
  methods: {
    saveFormData() {
      // 保存當前頁面的資料到 Pinia
      this.ticketStore.name = this.name;
      this.ticketStore.phone = this.phone;
      this.ticketStore.email = this.email;
      this.ticketStore.taxID = this.taxID;
      this.ticketStore.companyName = this.companyName;
      this.ticketStore.comments = this.comments;
      
    },
    async fetchEventDetails(eventId) {
      try {
        const response = await fetch(`${import.meta.env.VITE_API_URL}/TicketOrder/get_event_details.php?event_id=${eventId}`);
        const data = await response.json();
        console.log(data);
        // 這裡可以處理抓到的活動資訊
      } catch (error) {
        console.error('Failed to fetch event details:', error);
      }
    },
    fetchEventPrice() {
      // 假設 event_id 是 1，你可以從其他地方動態獲取
      // const eventId = 1;

      // 向後端請求活動價格
      axios.get(`${import.meta.env.VITE_API_URL}/TicketOrder/get_event_price.php?event_id=${this.eventId}`)

        .then((response) => {
          console.log(response.data); // 檢查返回的價格
          this.eventPrice = response.data.price;
          console.log(this.guestNumber);

          // // 確保 guestNumber 是數字
          // const guestNumberNumeric = Number(this.guestNumber);
          // this.totalAmount = this.eventPrice * this.guestNumber;
          console.log(this.totalAmount);
          const eventPrice = this.eventPrice; // 從 API 獲取的活動價格
          this.ticketStore.totalAmount = eventPrice * this.guestNumber; // 計算並存入 Pinia store
          
        })
        .catch((error) => {
          console.error('Error fetching event price:', error);
        });
    },

    async fetchEventName(eventId) {
      try {
        const response = await axios.get(`${import.meta.env.VITE_API_URL}/TicketOrder/get_event_price.php?event_id=${this.eventId}`, {
        
          params: {
            event_id: eventId,
          },
        });
        const data = response.data;
        if (data.eventName) {
          this.ticketStore.setEventName(data.eventName);
        }
      } catch (error) {
        console.error('Failed to fetch event name:', error);
      }
    },
    async submitOrder() {
      try {
        

        const token = sessionStorage.getItem('token'); // 如果是 localStorage，改用 localStorage.getItem('token')

        if (!token) {
      console.error('Token 不存在，請重新登入');
      return;
    }
        // 組裝資料
        const orderData = {
          name: this.ticketStore.name,
          companyName: this.ticketStore.companyName,
          taxID: this.ticketStore.taxID,
          eventId: this.eventId,
          eventName: this.ticketStore.eventName,
          date: this.ticketStore.date,
          time: this.ticketStore.time,
          guestNumber: this.ticketStore.guestNumber,
          total: this.ticketStore.total,
          comments: this.ticketStore.comments,
          paymentMethod: '信用卡', // 固定顯示
          orderStatus: '已完成', // 固定顯示
        };
    

    // 發送 POST 請求到 PHP，並附帶 Authorization header
    const response = await axios.post(`${import.meta.env.VITE_API_URL}/TicketOrder/ticket_submit_order.php`, orderData, {
      headers: {
        'Authorization': `Bearer ${token}`, // 使用 Bearer Token 格式
        'Content-Type': 'application/json'
      }
    });

    console.log('Response:', response.data); // 打印返回的響應

    if (response.data.success) {
      const orderId = response.data.orderId; // 從後端獲取 orderId
      this.ticketStore.setOrderId(orderId); // 保存 orderId 到 Pinia
      console.log('訂單提交成功');

      // 顯示成功訊息並跳轉頁面
      Swal.fire({
        position: "center",
        icon: "success",
        title: "付款成功! ",
        html: '訂單已完成，已存到會員中心<br>即將前往客製化票卷頁面，製作屬於您的專屬票卷',
        showConfirmButton: true,
        timer: 5000 // 自動關閉的時間
      }).then((result) => {
        if (result.isConfirmed || result.dismiss === Swal.DismissReason.timer) {
          // 根據 eventId 來決定跳轉的路由
          if (this.eventId === 1) {
            this.$router.push('/LC_Customization'); // 活動 1 的路徑
          } else if (this.eventId === 2) {
            this.$router.push('/SF_TicketDesign'); // 活動 2 的路徑
          } else if (this.eventId === 3) {
            this.$router.push('/MS_customization'); // 活動 3 的路徑
          }
        }
      });

    } else {
      console.error('提交失敗', response.data.message);
    }
  } catch (error) {
    console.error('提交訂單時發生錯誤:', error);
  }
      },


      fetchMemberData() {
  const token = sessionStorage.getItem('token'); // 假設 token 存在這個 key 下
  fetch(`${import.meta.env.VITE_API_URL}/TicketOrder/get_member_discount.php`, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}` // 添加 Authorization 標頭
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.status === 'success') {
      // 將會員資料存入 ticketStore
      this.ticketStore.name = data.data.USER_NAME;
      this.ticketStore.email = data.data.EMAIL;
      this.ticketStore.phone = data.data.PHONE_NUMBER;
      // this.ticketStore.total = data.data.TOTAL_PRICE;

      // 檢查 TICKET_CODE_USED 是否為 1
      if (data.data.TICKET_CODE_USED === 1 || data.data.TICKET_DISCOUNT_CODE == null) {
        this.ticketStore.discountCode = null; // 禁用折扣碼
        this.ticketStore.discount = 0;
        this.ticketStore.total = this.ticketStore.totalAmount; // 沒有折扣時的總金額
        console.log('折扣碼已使用過，無法再使用');

      } else if (data.data.TICKET_DISCOUNT_CODE) {
        this.ticketStore.discountCode = data.data.TICKET_DISCOUNT_CODE; // 設置折扣碼
        // 計算折扣
        this.calculateDiscount();
      } else {
        console.log('沒有折扣碼');
       
      }
    } else {
      console.error(data.message);
    }
  })
  .catch(error => {
    console.error('Error fetching member data:', error);
  });
},

// 計算折扣和更新總價
calculateDiscount() {
  if (this.ticketStore.discountCode) {
    this.ticketStore.discount = this.ticketStore.totalAmount * 0.05; // 折扣是 5%
    this.ticketStore.total = this.ticketStore.totalAmount - this.ticketStore.discount; // 折扣後的總金額
  } 
  // else {
  //   this.ticketStore.discount = null;
  //   this.ticketStore.total = this.ticketStore.totalAmount;
  // }
},

async updateDiscountUsage() {
  // 如果折扣碼已經使用過，則不進行更新操作
  if (this.ticketStore.discountCode === null || this.ticketStore.TICKET_CODE_USED === 1) {
    console.log('折扣碼已經使用過，無需再次更新');
    return; // 終止函數執行
  }

  const token = sessionStorage.getItem('token'); // 假設 token 存在這個 key 下
  // 更新資料庫中折扣碼的使用狀態
  const response = await fetch(`${import.meta.env.VITE_API_URL}/TicketOrder/update_discount_usage.php`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${token}` // 添加 Authorization 標頭
    },
    body: JSON.stringify({
      discountCode: this.ticketStore.discountCode
    })
  });

  const data = await response.json();
  if (data.status === 'success') {
    console.log('折扣碼已使用');
  } else {
    console.error('更新折扣碼使用狀態失敗', data.message);
  }
},

watch: {
  // 當 totalAmount 改變時，自動重新計算折扣和總金額
  'ticketStore.totalAmount'() {
    this.calculateDiscount();
  }
}

  },
  mounted() {
    // 可以在此 console.log 檢查 store 是否成功引入
    console.log(this.ticketStore);
    this.fetchEventPrice();
    this.fetchMemberData()
    this.fetchEventName();
    this.fetchEventDetails(this.eventId);
    this.updateDiscountUsage();
  },
};
</script>


<style lang="scss" scoped>
// .noto-sans-tc-regular {
//     font-family: "Noto Sans TC", sans-serif;
//     font-optical-sizing: auto;
//     font-weight: 400;
//     font-style: normal;
//     }
//     h1{font-size: 30px;}
//     h2{font-size: 28px;}
//     h3{font-size: 18px;}
//     h4{font-size: 16px;}
//     h5{font-size: 14px;}
//     h6{font-size: 16px;}
//      p{font-size: 14px;}

    a{
        text-decoration: none;
    }

    h1,h2,h3,h4,h5,h6,p{
        // font-family:'Noto Sans TC';
        // color: #855F49;
        font-weight: bold;
        text-align: center;
        line-height: 150%;
    }

    .template_mobang{
        display: flex;
        padding: 10% 10%;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }

    .top{
        display: flex;
        flex-direction: column;
        gap: 0;

    }
    main{
        display: flex;
        flex-direction: column;
        gap: 60px;
    }
    .options{
        box-sizing: border-box;
        margin: 0 auto;
        width: 40vw;
        display: flex;
        padding:15px 20px  ;
        background: transparent;
        justify-content: flex-end;
        align-items: center;
        border-radius: 40px;
        border: 2px solid #855F49;
        
    }
    .selection{
        width: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .selections{
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    select{
        appearance: none
    }
    .options{
        text-align: center;
    }
    .template_mobangOne{
        // background-image: url('../src/ms/modeBGI1.png');
        background-size:contain;  
    }
    .template_mobangTwo{
        // background-image: url(@/assets/images/ms/modeBGI2.png);

    }
    .template_mobangThree{
        background-image: url(@/assets/images/ms/modeBGI3.jpg);
    }

    .confirmTitle{
    padding-bottom: 20px;
    border-bottom:2px solid #855F49;
}
.eventInfo > h4, .memberInfo > h4{
    text-align: left !important;
    line-height: 180% !important;
}
.eventInfo , .memberInfo{
    padding: 0 60px;
}
main{
    box-sizing: border-box;
    border: 3px solid #855F49 ;
    border-radius: 20px;
    padding: 40px 50px;
    width: 50vw;
}
.thereAreSoManyShitThatIHaveToCheck > label{
    display: flex;
    flex-direction: row;
    align-items:center;

}

.thereAreSoManyShitThatIHaveToCheck{
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.thereAreSoManyShitThatIHaveToCheck > p{
    text-align: left;
    line-height: 240%;
}

  .sbmit{
    border: 1px solid white;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    color: white;
    z-index: 10;
    text-align: center ;
    cursor: pointer;
    font-size: 18px;
    transition: .5s;
    background-color: rgba(131, 131, 131, 0);

    &:hover{
      background: rgba(131, 131, 131, 0.40);
      box-shadow: 1px 3px 12px 0px rgba(0, 0, 0, 0.52);
      scale: 1.1;
    }
  }

  .text1{
    margin: -5px 0;

    h4{
      font-size: 14px ;
    }

    h3{
      font-size: 14px ;
      margin-left: 5px;
    }
  }

  .text2{
    h4{
      font-size:20px ;
    }
    h3{
      font-size:24px ;
      margin-left: 5px;

    }
  }

  .line{
    border-bottom: 1px solid white;
  }

  .coupon{
    margin-bottom: 15px;
  }

  .confirmTitle{
    h3{
      margin-bottom: 10px;
    }
  }

  @media screen and (max-width: 820px) {
      main{
        width: 80vw;
      }
    }

    @media screen and (max-width: 430px) {
      .eventInfo[data-v-d09fc348], .memberInfo[data-v-d09fc348]{
        padding: 0;
      }
    }
</style>