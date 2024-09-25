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
            <label for="">
              <h4 :style="{color: MobangColor }">
                折扣碼：
              </h4>
              <input type="text">
            </label>
            <label for="">
              <h4 :style="{color: MobangColor }">
                總金額：
              </h4>
              <h4 :style="{color: MobangColor } ">
                NT$
              </h4>
              <h3 :style="{color: MobangColor }">
                {{ totalAmount }}
              </h3>
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
    }
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
          totalAmount: this.ticketStore.totalAmount,
          comments: this.ticketStore.comments,
          paymentMethod: '信用卡付款', // 固定顯示
          orderStatus: '成立', // 固定顯示
        };

        // 發送 POST 請求到 PHP
        const response = await axios.post(`${import.meta.env.VITE_API_URL}/TicketOrder/ticket_submit_order.php`, orderData);

        console.log('Response:', response.data); // 打印返回的響應

        if (response.data.success) {
          console.log('訂單提交成功');
          Swal.fire({
          position: "center",
          icon: "success",
          title: "付款成功! ",
          html: '訂單已完成，已存到會員中心<br>即將前往客製化票卷頁面，製作屬於您的專屬票卷',  // 這是內文
          showConfirmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
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
  },
  mounted() {
    // 可以在此 console.log 檢查 store 是否成功引入
    console.log(this.ticketStore);
    this.fetchEventPrice();
    
    this.fetchEventName();
    this.fetchEventDetails(this.eventId);
    
  },
};
</script>

<!-- <script>
export default {

  props: {
    mode: {
      type: String,
      default: 'one',
      validator: value => ['one', 'two', 'three'].includes(value),
    },
  },
  computed: {
    holyShitBGI(){
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
  },
};
</script>
<script setup>
   import { computed } from 'vue';
    import MS_com_title from '@/components/MS/MS_com_title.vue';
    import { useTicketStore } from '@/stores/ticketStore'; // 引入 Pinia store

    const ticketStore = useTicketStore();
    console.log(ticketStore);
    

    const guestNumber = computed(() => ticketStore.guestNumber);
    const date = computed(() => ticketStore.date);
    const time = computed(() => ticketStore.time);
    const name = computed(() => ticketStore.name);
    const phone = computed(() => ticketStore.phone);
    const email = computed(() => ticketStore.email);
    const taxID = computed(() => ticketStore.taxID);
    const companyName = computed(() => ticketStore.companyName);
    const comments = computed(() => ticketStore.comments);

   
</script> -->

<style lang="scss" scoped>
.noto-sans-tc-regular {
    font-family: "Noto Sans TC", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }
    h1{font-size: 30px;}
    h2{font-size: 28px;}
    h3{font-size: 18px;}
    h4{font-size: 16px;}
    h5{font-size: 14px;}
    h6{font-size: 16px;}
     p{font-size: 14px;}

    a{
        text-decoration: none;
    }

    h1,h2,h3,h4,h5,h6,p{
        font-family:'Noto Sans TC';
        color: #855F49;
        font-weight: bold;
        text-align: center;
        line-height: 150%;
    }

    .template_mobang{
        display: flex;
        padding: 150px 200px;
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
        // background-image: url('../src/ms/modeBGI2.png');

    }
    .template_mobangThree{
        background-image: url('../src/ms/modeBGI3.jpg');
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

  /* 彈窗樣式 */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: white;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
}
</style>