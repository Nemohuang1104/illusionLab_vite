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
            
            @input="updateFormData('quantity', formData.quantity)"
          />
          <p v-if="errorMessage" :style="{ color: 'red' }">{{ errorMessage }}</p>
        </div>
        <div class="selection">
            <h4 :style="{color: MobangColor }">日期 Date</h4>
            <input 
            v-model="formData.date"
            class="options" 
            type="date" 
            :style="{ borderColor: MobangColor }"
            @input="updateFormData('date', formData.date)"/>
        </div>
        <div class="selection">
            <h4 :style="{color: MobangColor }">時間 Select Time</h4>
            <select 
            v-model="formData.time"
            class="options" 
            :style="{ borderColor: MobangColor }"
            @change="updateFormData('time', formData.time)"
            >
            <option value="time1">13:00 ~ 15:00</option>
            <option value="time2">16:00 ~ 18:00</option>
            <option value="time3">19:00 ~ 21:00</option>
            <option value="time4">22:00 ~ 24:00</option>
            
            </select>
        </div>
        </form>
    </main>
<!--     
    <MS_com_buttons 
     :currentStep="currentStep"
        :mode="mode" :step="modeSelect" :activityMode="activityMode"
    /> -->
 
    </div>
</template>
  
  
<script>
export default {
  data() {
    return {
      formData: {
        quantity: 1,
        date: '',
        time: '',
      },
      maxGuests: 0, // 從後端獲取的最大人數
      errorMessage: '', // 錯誤訊息
    };
  },

  props: {
    mode: {
      type: String,
      default: 'one',
      validator: value => ['one', 'two', 'three'].includes(value),
    },
    currentStep: {
      type: Number,
      required: true,
      validator: value => ['mode1', 'mode2', 'mode3'].includes(value),
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

  },
  methods: {
    setMaxGuests() {
      if (this.modeSelect === 'one') {
        this.maxGuests = 30; // EVENT_ID = 1
      } else if (this.modeSelect === 'two') {
        this.maxGuests = 6;  // EVENT_ID = 2
      } else if (this.modeSelect === 'three') {
        this.maxGuests = 6;  // EVENT_ID = 3
      }
    },
    checkMaxGuests() {
      if (this.formData.quantity > this.maxGuests) {
        this.errorMessage = `最多只能選擇 ${this.maxGuests} 人。`;
      } else {
        this.errorMessage = '';
      }
    },
    async getMaxGuests() {
      const eventId = this.mode === 'one' ? 1 : this.mode === 'two' ? 2 : 3;
      const response = await fetch(`http://illusionlab.local/public/PDO/TicketOrder/get_max_guests.php?event_id=${eventId}`);
      const result = await response.json();
      this.maxGuests = result.maxGuests;
    },
    async submitForm() {
      if (!this.errorMessage) {
        // 發送表單資料到後端
        const response = await fetch('http://illusionlab.local/public/PDO/TicketOrder/submit_order.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams({
            USER_ID: 123, // 假設用戶ID
            COMPANY: '幻浸實驗室',
            EVENT_ID: this.modeSelect === 'one' ? 1 : this.modeSelect === 'two' ? 2 : 3,
            QUANTITY: this.formData.quantity,
            TOTAL_PRICE: this.calculateTotalPrice(),
            SCHEDULE_DATE: this.formData.date,
            SCHEDULE_TIME: this.formData.time,
          }),
        });

        const result = await response.json();
        if (result.message) {
          alert('訂單提交成功!');
        } else {
          alert('訂單提交失敗: ' + result.error);
        }
      }
    },
    calculateTotalPrice() {
      const pricePerPerson = this.modeSelect === 'one' ? 2200 : this.modeSelect === 'two' ? 3000 : 2200;
      return pricePerPerson * this.formData.quantity;
    },
  },
  mounted() {
    this.setMaxGuests(); // 設置最大人數
  }
};
</script>

  

<script setup >
    import MS_com_title from '@/components/MS/MS_com_title.vue';
    import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
    import { defineProps, ref, onMounted, computed } from 'vue';
    import { defineEmits } from 'vue';
    import { useTicketStore } from '@/stores/ticketStore';

    const events = ref([]);
    

    const props = defineProps();
    const emit = defineEmits(['update:formData']);

    const localFormData = ref({
      quantity: '',
      date: '',
      time: ''
    });

    const updateFormData = (field, value) => {
      localFormData.value[field] = value;
      emit('update:formData', localFormData.value);
    };

    const handleSubmit = () => {
      // 在提交表單時將數據發送給父組件
      emit('saveData');
    };

    onMounted(() => {
      fetch('http://illusionlab.local/public/PDO/ProductData/get_events.php')
        .then((response) => response.json())
        .then((data) => {
          events.value = data;
        })
        .catch((error) => {
          console.error('Error fetching events:', error);
        });
    });
</script>

<style lang="scss" scoped> 
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
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
        background-image: url('../src/ms/modeBGI2.png');

    }
    .template_mobangThree{
        background-image: url('../src/ms/modeBGI3.jpg');
    }
</style>

