<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_customer_info 
      mode="one"
      activityMode="activity1" 
      class="customer_info"
       ref="formRef"
       @formCompletionStatus="handleFormCompletion"
      >
        
      </MS_ticket_customer_info>
      <!-- :step="modeSelect" -->
      <MS_com_buttons
        class="actitvyBtn"
        :currentStep="currentStep"
        :mode="mode"  
        :activityMode="activityMode"
        :disabled="!isFormComplete"
        @form-submitted="handleFormSubmit"
        
        ></MS_com_buttons>
      <CoinFall class="coin"/>
  <Footer_1 class="footer"></Footer_1>
</div>
</template>

<script>
import MS_ticket_customer_info from '@/components/MS/MS_ticket_customer_info.vue';
import Footer_1 from '@/components/Footer_1.vue';
import Header from '@/components/Header_0.vue';
import CoinFall from '@/components/CoinFall.vue';
import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
import { useTicketStore } from '@/stores/ticketStore'; // 引入 Pinia store


export default {
  components: {
    MS_ticket_customer_info,
    Footer_1,
    Header,
    CoinFall,
    MS_com_buttons,
  },
  data() {
    return {
      currentMode: 'two', // 当前 mode
      formErrors: {}, // 儲存錯誤訊息的狀態
      isFormComplete: false,   // 表单完成状态
      currentStep: 1,         // 当前步骤
      activityMode: 'activity1', // 初始活动模式
      mode: 'two1',            // 初始 mode
      showNext: true,
      currentEventId: 1,
    };
  },

  methods: {
    handleFormCompletion(status) {
      this.isFormComplete = status; // 接收到來自 Form 組件的完成狀態
    },
    handleFormSubmit() {
       // 透過 ref 調用 form 組件內的 validateForm 方法
       const formIsValid = this.$refs.formRef.validateForm();
      if (formIsValid) {
        // 表單通過驗證，執行下一步邏輯，例如跳轉或其他操作
        
        this.$router.push(this.nextPage);
    }
  
  },
}
}
</script>


<!-- <script setup>
import MS_ticket_customer_info from '@/components/MS/MS_ticket_customer_info.vue';
import Footer_1 from '@/components/Footer_1.vue';
import Header from '@/components/Header_0.vue';
import { ref } from 'vue';
import CoinFall from '@/components/CoinFall.vue';
import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
import { useTicketStore } from '@/stores/ticketStore'; // 引入 Pinia store

const ticketStore = useTicketStore(); // 初始化 store

const formData = ref({
  name: '',
  phone: '',
  email: '',
  taxID: '',
  companyName: '',
  comments: '',
  agreePrivacyPolicy: false,
  agreeRefundPolicy: false
});

const updateFormData = (data) => {
  formData.value = data;
    };

const saveData = () => {
  ticketStore.setName(formData.value.name);
  ticketStore.setPhone(formData.value.phone);
  ticketStore.setEmail(formData.value.email);
  ticketStore.setTaxID(formData.value.taxID);
  ticketStore.setCompanyName(formData.value.companyName);
  ticketStore.setComments(formData.value.comments);
  ticketStore.setAgreePrivacyPolicy(formData.value.agreePrivacyPolicy);
  ticketStore.setAgreeRefundPolicy(formData.value.agreeRefundPolicy);
};

const currentMode = ref('two');
</script> -->
<!-- <script>
export default {
  data() {
    return {
      currentStep: 1, // 当前步骤
      activityMode: 'activity1', // 初始活动模式
      mode: 'two1', // 初始 mode
      isFormComplete: false,
      showNext: true,
      currentEventId: 1,
    isFormComplete: false,
      
    };
  },
  methods: {
    checkFormCompletion() {
      this.isFormComplete = this.formData.name && this.formData.phone && this.formData.email && this.formData.agreePrivacyPolicy && this.formData.agreeRefundPolicy;
    },
    updateFormData(data) {
      this.formData = data;
      this.checkFormCompletion(); // 每次更新表單後檢查
    },
    saveData() {
      if (this.isFormComplete) {
        // 將資料保存到 Pinia
        this.ticketStore.setGuestNumber(this.formData.quantity);
        this.ticketStore.setDate(this.formData.date);
        this.ticketStore.setTime(this.formData.time);
      } else {
        console.warn("表單未完成，無法保存數據");
      }
    },
    handleNextStep() {
      // 在這裡處理點擊後的邏輯，例如跳轉
      if (this.isFormComplete) {
        this.$router.push(this.nextRoute);
      }
    }
  }
}
</script> -->

<style lang="scss" scoped>
@import "../assets/style";
.actitvyBtn{
  // border: 2px solid red;
  margin: 0 auto;
  margin-top: -50px;
  margin-bottom: 50px;
}

.warpper{
  position: relative;
  background-image: url(../assets/images/lifecasino_bg2.png);
  background-repeat: no-repeat;
  background-size: cover;
  // background-position: center;
  position: relative;
  z-index: 0;
  // border: 2px solid rgb(0, 255, 17);

  &::before{
        z-index: -1;
        content: "";
        position: absolute;
        left: 0;
        top: 0px;
        width: 100%;
        height: 100vh;
        background-color: black;
        mask: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 1.5%, #000 26.17%, #000 40.67%, rgba(102, 102, 102, 0.00) 100%);
        
    }
  
}

.header{
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10;
}

.coin{
  position: fixed;
  left: 0;
  top: -100;
  z-index: -1;
  // border: 2px solid rgb(47, 0, 255);
  height: 100%;
  // max-width:800px;
  overflow: hidden;
  opacity: .3;
  animation: opacity 10s linear;
}

@keyframes opacity{
    0%{
        opacity: 0;
    }
    100%{
        opacity: .3;
    }
}

::v-deep .title{
  text-align: center;
}

::v-deep body{
  font-family: map-get($map: $fontStyle, $key: style_2);
  
};

::v-deep h1{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: h1);
  font-weight: 800;
  // z-index: 1;
}

::v-deep h2{
  font-size: map-get($map: $fontSize , $key: h2);
  font-weight: 800;
}

::v-deep h3{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;

  font-size: map-get($map: $fontSize , $key: h3);
  font-weight: 800;
}

::v-deep h4{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p) ;
  font-weight: 600 !important;
}

::v-deep h6{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p) ;
  font-weight: 400;
  transition: .3s;
}

.soFuckingShinningTitleColor[data-v-3d5d2ec6]{
  
  &:nth-last-child(2){
    margin-bottom: 10px;
  }
}

::v-deep .options{
 background-color:rgba(255, 255, 255, 0.5) !important;
  
}



</style>

<style lang="scss">
@import "../assets/style";



</style>