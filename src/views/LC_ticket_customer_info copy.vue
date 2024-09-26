<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_customer_info 
      mode="one"
      activityMode="activity1" 
       class="customer_info"
      :eventId="currentEventId"
      @update:formData="updateFormData"
      @saveData="saveData"
      :errors="formErrors"
      @update-errors="updateErrors"
     
      >
        
      </MS_ticket_customer_info>
      <!-- :step="modeSelect" -->
      <MS_com_buttons
        class="actitvyBtn"
        :currentStep="currentStep"
        :mode="mode"  
        :activityMode="activityMode"
        :disabled="!isFormComplete"
        :formData="formData"
        
        @validate="validateForm"
        
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
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss';

export default {
  components: {
    MS_ticket_customer_info,
    Footer_1,
    Header,
    CoinFall,
    MS_com_buttons,
  },
  props:{
    // formData: Object,
  },
  data() {
    return {
      currentMode: 'two', // 当前 mode
      formData: {
        name: '',
        phone: '',
        email: '',
        taxID: '',
        companyName: '',
        comments: '',
        agreePrivacyPolicy: true,
        agreeRefundPolicy: true,
      },
   
      formErrors: {}, // 儲存錯誤訊息的狀態
      isFormComplete: false,   // 表单完成状态
      currentStep: 1,         // 当前步骤
      activityMode: 'activity1', // 初始活动模式
      mode: 'two1',            // 初始 mode
      showNext: true,
      currentEventId: 1,
    };
  },
  computed: {
    ticketStore() {
        return useTicketStore(); // 使用 store
      },

  },
  methods: {
    updateErrors(updatedErrors) {
      this.formErrors = { ...this.formErrors, ...updatedErrors };
    },
    checkFormCompletion() {
      // console.log(!this.formData.agreeRefundPolicy);
      
      // 檢查表單是否填寫完成
      this.isFormComplete =
        this.formData.name &&
        this.formData.phone &&
        this.formData.email &&
        !this.formData.agreePrivacyPolicy &&
        !this.formData.agreeRefundPolicy;
    },
    updateFormData(data) {
      // 更新表單數據並檢查是否完成
      this.formData = data;
      this.checkFormCompletion(); // 每次更新表單後檢查
    },
    saveData() {
      if (this.isFormComplete) {
        // 將資料保存到 Pinia
        console.log(this.ticketStore);
        console.log(this.formData);
        
        this.ticketStore.setName(this.formData.name);
        this.ticketStore.setPhone(this.formData.phone);
        this.ticketStore.setEmail(this.formData.email);
        this.ticketStore.setTaxID(this.formData.taxID);
        this.ticketStore.setCompanyName(this.formData.companyName);
        this.ticketStore.setComments(this.formData.comments);
        // this.ticketStore.setAgreePrivacyPolicy(!this.formData.agreePrivacyPolicy);
        // this.ticketStore.setAgreeRefundPolicy(!this.formData.agreeRefundPolicy);

        console.log("表單已成功保存到 Pinia");
      } else {
        console.warn("表單未完成，無法保存數據");
      }
    },
   
    validateForm() {
      const errors = {};
      console.log(this.formData.agreePrivacyPolicy);
      if (!this.formData.name) {
        errors.name = "請填寫姓名";
      }
      if (!this.formData.phone) {
        errors.phone = "請填寫電話";
      }
      if (!this.formData.email) {
        errors.email = "請填寫信箱";
      }
      if (this.formData.agreePrivacyPolicy) {
        errors.agreePrivacyPolicy = "請同意隱私政策";
      }
      if (this.formData.agreeRefundPolicy) {
        errors.agreeRefundPolicy = "請同意退款政策";
      }
      
      // 如果有錯誤，將錯誤消息傳給子組件顯示
      if (Object.keys(errors).length > 0) {
        this.formErrors = errors;
        // alert('尚有欄位未輸入')
        Swal.fire({
          position: "center",
          icon: "warning",
          title: "尚有欄位未輸入",
          showConfirmButton: false,
          timer: 1500
        })
        return false;
      } else {
        
        console.log(this.formData);

        this.saveData(); // 如果表單正確，保存數據並跳轉
        this.$router.push(this.nextPage);
        return true;
      }
    },
  
  },
};
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





</style>

<style lang="scss">
@import "../assets/style";

.title{
  text-align: center;
}

body{
  font-family: map-get($map: $fontStyle, $key: style_2);
};

h1{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: h1);
  font-weight: 800;
  // z-index: 1;
}

h2{
  font-size: map-get($map: $fontSize , $key: h2);
  font-weight: 800;
}

h3{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;

  font-size: map-get($map: $fontSize , $key: h3);
  font-weight: 800;
}

h4{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p) ;
  font-weight: 400;
}

h6{
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

.options{
 background-color:rgba(255, 255, 255, 0.5) !important;
  
}

</style>