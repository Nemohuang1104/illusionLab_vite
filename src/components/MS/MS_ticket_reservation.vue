<template>
  <div class="template_mobang" :class=holyShitBGI>
  <div class="top">
      <MS_com_title 
      :mode="modeSelect"  
      mainTitle="門票購入" 
      subTitle="Reservation"
      :intro="OurIntro" />
  </div>
  <main>
      <form 
      class="selections" 
      action="" 
      method="post"
      @submit.prevent="handleSubmit">
      <div class="selection">
          <h4 :style="{ color: MobangColor }">人數 Guests</h4>
          <input 
          v-model="formData.quantity" 
          type="number" 
          min="1" 
          :max="maxGuests" 
          class="options" 
          :style="{ borderColor: MobangColor }" 
          @input="handleInput"
        />
        <p v-if="errorMessage" :style="{ color: 'red' }">{{ errorMessage }}</p>
        <h5 class="remind" v-if="errors.quantity">{{ errors.quantity }}</h5>
      </div>
      <div class="selection">
          <h4 :style="{color: MobangColor }">日期 Date</h4>
          <input 
          v-model="formData.date"
          class="options" 
          type="date" 
          :style="{ borderColor: MobangColor }"
          @input="updateFormData('date', formData.date)"
          @change="handleDateChange"
          ref="dateInput"  /><!-- 用來設置最小、最大日期 -->
          <h5 class="remind" v-if="errors.date">{{ errors.date }}</h5>
      </div>
      <div class="selection">
          <h4 :style="{color: MobangColor }">時間 Select Time</h4>
          <select 
          v-model="formData.time"
          class="options" 
          :style="{ borderColor: MobangColor }"
          @change="updateFormData('time', formData.time)"
          placeholder="timeMessage"
          >
          <option disabled selected value="">請選擇時間</option>
          <option v-for="time in availableTimes" :key="time" :value="time.time" :disabled="time.tickets < formData.quantity"
          @input="handleInput">
            {{ time.time }} (剩餘位子: {{ time.tickets }})
          </option>
          </select>
          <h5 class="remind" v-if="errors.time">{{ errors.time }}</h5>
          <h5 v-if="timeMessage" class="remind">{{ timeMessage }}</h5> <!-- 顯示無可用座位時的訊息 -->
      </div>
      </form>
  </main>
  </div>
</template>
  
<script>
 import MS_com_title from '@/components/MS/MS_com_title.vue';
import axios from 'axios';
import { useTicketStore } from '@/stores/ticketStore';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';


export default {
  components: {
    MS_com_title
    },
  data() {
    return {
      formData: {
        quantity: '',
        date: '',
        time: '',
        guests: '', // 用戶輸入的賓客數量
      },
      errors: {
        quantity: '',
        date: '',
        time: '',
        guests: '', // 用戶輸入的賓客數量
      },
      formErrors: {},
      maxGuests: 0, // 從後端獲取的最大人數
      errorMessage: '', // 錯誤訊息
      localFormData: {},
      schedules: [],  // 儲存該日期的場次資料
      availableTimes: [], // 存儲可用的時間
      availableDates: [], // 儲存可用日期
      guestError: false // 顯示錯誤信息的標誌
    };
  },

  props: {
 
    // errors: Object, // 父層傳遞的錯誤消息
    // 
  
    mode: {
      type: String,
      default: 'one',
      validator: value => ['one', 'two', 'three'].includes(value),
    },
    // currentStep: {
    //   type: Number,
    //   required: true,
    //   validator: value => ['mode1', 'mode2', 'mode3'].includes(value),
    // },
    eventId: {
      type: Number,
      required: true // 父層傳來的活動 ID
      },
  },

  computed: {
    ticketStore() {
      return useTicketStore();
    },
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
    OurIntro() {
      switch (this.mode) {
        case 'one':
          return `
            入場價格為新台幣2,200元 / 人 (已含10%服務費)。<br>
            單一場次最高可容納30人，若有包場需求歡迎來信洽談  illusionlab@gmail.com。<br>
            若日期無法選擇，代表該場次已滿，或是當日不開放。<br>
            現場會提供酒精飲品，故不開放未滿18歲未成年參加，敬請見諒。`;
        case 'two':
          return `
            入場價格為新台幣3,000元 / 人 (已含10%服務費)。<br>
            若日期無法選擇，代表該場次已滿，或是當日不開放。<br>
            旅行長度 120分鐘/每場次 。<br>
            太空人數 最多六人/每場次。<br>
            門票包含兩份太空餐點及一杯飲品。`;
        case 'three':
          return `
            入場價格為新台幣2,200元 / 人 (已含10%服務費)。<br>
            若日期無法選擇，代表該場次已滿，或是當日不開放。`;
        default:
          return '未知模式';
      }
    },
    isFormComplete() {
      return this.formData.quantity && this.formData.date && this.formData.time;
    }

  },
  watch: {
    isFormComplete(newVal) {
      // 當 form 狀態變化時，將 isFormComplete 傳遞給父層
      this.$emit('formCompletionStatus', newVal);
    }
  },
  methods: {
   
    // 兩個@input打架的解法
    handleInput(event) {
      this.checkMaxGuests(); // 調用 checkMaxGuests 方法
      this.updateFormData('quantity', this.formData.quantity); // 調用 updateFormData 方法
      this.validateGuestNumber();
      // if (this.formData.quantity) {
      //   this.$emit('update-errors', { quantity: '' });  // 將空的錯誤訊息傳回父層
      // }
    },
  updateErrors(updatedErrors) {
      this.errors = { ...this.errors, ...updatedErrors };
    },

  updateFormData(field, value) {
    // 更新特定欄位的值
    this.formData[field] = value;
    
    // 清除該欄位的錯誤訊息
    this.clearError(field);
    
    // 檢查表單是否完成
    this.checkFormCompletion();
    // this.validateGuestNumber();
    // this.checkMaxGuests();
  },

  // 清除指定欄位的錯誤訊息
  clearError(field) {
    if (this.errors[field]) {
      this.errors[field] = ''; // 清空該欄位的錯誤訊息
    }
  },

  // 檢查表單是否完成的邏輯
  checkFormCompletion() {
    // 假設檢查每個欄位是否已填寫
    if (this.formData.quantity && 
        this.formData.date && 
        this.formData.time ) {
      // 假設所有欄位都已填寫，表單完成
      console.log('表單已完成');
    } else {
      // 表單尚未完成
      console.log('表單未完成');
    }
  },
 
    // 紅字警告
    checkMaxGuests() {
      if (this.formData.quantity > this.maxGuests) {
        this.errorMessage = `最多只能選擇 ${this.maxGuests} 人。`;
      } else {
        this.errorMessage = '';
      }
    },
    fetchMaxGuests() {
      // 根據 eventId 發送請求從後端獲取最大人數
      axios.get(`${import.meta.env.VITE_API_URL}/TicketOrder/get_max_guests.php?event_id=${this.eventId}`)

        .then(response => {
          console.log('API Response:', response);
          this.maxGuests = response.data.maxGuests; // 設定最大賓客數
        })
        .catch(error => {
          console.error('Error fetching max guests:', error);
        });
    },
    //不能超過最高人數
    validateGuestNumber() {
      if (this.formData.quantity > this.maxGuests) {
        this.formData.quantity = this.maxGuests; // 如果輸入數字超過 maxGuests，將數字設置為 maxGuests
        this.guestError = true; // 顯示錯誤提示
      } else {
        this.guestError = false; // 隱藏錯誤提示
      }
      // 更新表單資料，確保最後提交的資料正確
      this.updateFormData('quantity', this.formData.quantity);
    },
    
    // 選擇日期
    fetchAvailableDates() {
      axios.get(`${import.meta.env.VITE_API_URL}/TicketOrder/get_schedule_dates.php?event_id=${this.eventId}`)
        .then(response => {
          const dates = response.data;
          if (dates && !dates.error) {
            this.availableDates = dates; // 儲存可用日期
            this.setDateRestrictions();  // 設定日期限制
          } else {
            console.error('No available dates');
          }
        })
        .catch(error => {
          console.error('Error fetching available dates:', error);
        });
    },

    // 設置可選日期限制 (確保不能選擇資料庫中不存在的日期)
    setDateRestrictions() {
      const dateInput = this.$refs.dateInput;

      if (this.availableDates.length > 0) {
        // 設定最小和最大日期
        const minDate = this.availableDates[0]; // 最早日期
        const maxDate = this.availableDates[this.availableDates.length - 1]; // 最晚日期

        dateInput.setAttribute('min', minDate);
        dateInput.setAttribute('max', maxDate);

        // 禁用不可選日期
        dateInput.addEventListener('input', () => {
          const selectedDate = dateInput.value;

    // 檢查所選日期是否在可用日期列表中
          if (!this.availableDates.includes(selectedDate)) {
            dateInput.value = ''; // 重置為空值，禁用無效日期
          } else {
            // 檢查所選日期的可用票數是否大於所選人數
            const selectedSchedule = this.availableTimes.find(schedule => schedule.date === selectedDate);
            if (selectedSchedule && selectedSchedule.tickets < this.formData.quantity) {
              dateInput.value = ''; // 重置為空值，禁用無法滿足人數的日期
            }
          }
        });
      }
    },

          handleDateChange() {
        const selectedDate = this.formData.date;
        const guests = this.formData.quantity; // 選擇的人數

        if (selectedDate && guests) {
          // 發送請求根據 eventId, 賓客數和選擇的日期獲取時間
          axios.get(`${import.meta.env.VITE_API_URL}/TicketOrder/get_schedule.php?event_id=${this.eventId}&date=${selectedDate}&guests=${guests}`)
            .then(response => {
              if (response.data && Array.isArray(response.data)) {
                // 更新 availableTimes 為後端返回的時間
                this.availableTimes = response.data.map(item => {
                  return {
                    date: item.SCHEDULE_DATE,
                    time: item.SCHEDULE_TIME,
                    tickets: item.AVAILABLE_TICKETS
                  };
                });

                // 判斷該日期的所有時間段是否有足夠座位
                if (this.availableTimes.length === 0) {
                  this.timeMessage = `該日期無 ${guests} 人位`; // 如果沒有符合條件的時段
                } else {
                  this.timeMessage = ''; // 有可用的時段，清除提示訊息
                }
              } else {
                console.error('No available times for selected date:', selectedDate);
                this.timeMessage = `該日期無 ${guests} 人位`; // 如果後端返回的結果是空的
              }
            })
            .catch(error => {
              console.error('Error fetching available times:', error);
              this.timeMessage = `該日期無 ${guests} 人位`; // 如果請求出錯
            });
        }

        if (selectedDate) {
          this.$emit('update-errors', { date: '' });  // 清除日期錯誤訊息
        }
      },


  
  // watch: {
  //   eventId: {
  //     immediate: true, // 立即執行
  //     handler(newVal) {
  //       this.fetchMaxGuests(); // 當 eventId 變更時，重新獲取最大人數
  //     }
  //   }
  // },

  saveData() {
      if (this.isFormComplete) {
        // const ticketStore = useTicketStore();
        this.ticketStore.setGuestNumber(this.formData.quantity);
        this.ticketStore.setDate(this.formData.date);
        this.ticketStore.setTime(this.formData.time);
        console.log("表單已成功保存到 Pinia");
        this.$emit("form-submitted"); // 通知父層表單已提交
      } else {
        console.warn("表單未完成，無法保存數據");
      }
    },
    validateForm() {
      console.log(this.formData.name);
      
      const errors = {};
      if (!this.formData.quantity) {
        errors.quantity = "請填寫數量";
      }
      if (!this.formData.date) {
        errors.date = "請選擇日期";
      }
      if (!this.formData.time) {
        errors.time = "請選擇時間";
      }

      if (Object.keys(errors).length > 0) {
        this.updateErrors(errors);
        Swal.fire({
          position: "center",
          icon: "warning",
          title: "尚有欄位未輸入",
          showConfirmButton: false,
          timer: 1500,
        });
        return false; // 停止保存數據
      } else {
        this.saveData();
        return true; // 停止保存數據
      }
    },

  mounted() {
  this.fetchMaxGuests();

    this.fetchAvailableDates(); // 獲取可用日期
    this.fetchSchedule(); // 獲取該活動的日期和時間
  },
},

mounted() {
  this.fetchMaxGuests();
    this.fetchAvailableDates(); // 獲取可用日期
    
  },
}
</script>

  



<style lang="scss" scoped> 
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
    .noto-sans-tc-regular {
    // font-family: "Noto Sans TC", sans-serif;
    font-optical-sizing: auto;
    // font-weight: 400;
    font-style: normal;
    }
   
    // h1{font-size: 30px;}
    // h2{font-size: 28px;}
    // h3{font-size: 18px;}
    // h4{font-size: 16px;}
    // h5{font-size: 14px;}
    // h6{font-size: 16px;}
    //  p{font-size: 14px;}

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
        padding: 20% 10%;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }

    .top{
        display: flex;
        flex-direction: column;
        gap: 50px;

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
        justify-content: center;
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
        font-size: 16px;
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

    .remind{
      font-weight: 600;
      color: red;
    }

    @media screen and (max-width: 820px) {
      .options{
        width: 60vw;
      }
    }
    @media screen and (max-width: 430px) {
      .options{
        width: 80vw;
      }
}

</style>

