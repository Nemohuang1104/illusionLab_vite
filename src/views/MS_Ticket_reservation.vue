<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_reservation 
      mode="three" 
      activityMode="activity3" 
      class="reservation"
      :eventId="currentEventId"
        ref="formRef"
       @formCompletionStatus="handleFormCompletion">
        
      </MS_ticket_reservation>
      <MS_com_buttons
        class="actitvyBtn"
        :currentStep="currentStep"
        :mode="mode" 
        :step="modeSelect" 
        :activityMode="activityMode"
        :disabled="!isFormComplete"
        @form-submitted="handleFormSubmit">
      </MS_com_buttons>
      
  <Footer_3 class="footer"></Footer_3>

</div>
</template>

<script>
 import MS_ticket_reservation from '@/components/MS/MS_ticket_reservation.vue';
  import Footer_3 from '@/components/Footer_03.vue';
  import Header from '@/components/Header_0.vue';
  import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';

export default {
  components: {
      MS_ticket_reservation,
      Footer_3,
      Header,
      MS_com_buttons
    },
  data() {
    return {
      currentMode: 'four', // 当前 mode

      currentStep: 1, // 当前步骤
      activityMode: 'activity3', // 初始活动模式
      mode: 'two1', // 初始 mode
      modeSelect: 'three',
      formErrors: {}, // 儲存錯誤訊息的狀態
      isFormComplete: false, // 表單是否完整的狀態
      currentEventId: 3, // 當前活動的 EVENT_ID，例如 1

    };
  },
  methods: {
      handleFormCompletion(status) {
      this.isFormComplete = status; // 接收到來自 Form 組件的完成狀態
    },
    handleFormSubmit() {
      console.log(this.$refs.formRef);
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

<style lang="scss" scoped>
  @import "../assets/style";
.actitvyBtn{
  // border: 2px solid red;
  margin: 0 auto;
  margin-top: -50px;
  margin-bottom: 50px;
}

.warpper{
  background-image: url(@/assets/images/ms/modeBGI3.jpg);
  
  
}

.header{
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10;
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

.title[data-v-3d5d2ec6]{
  text-align: center;
  color: rgb(133, 95, 73);

}

body{
  font-family: map-get($map: $fontStyle, $key: style_1);
};

h1{
  font-size: map-get($map: $fontSize , $key: h1);
  font-weight: 800;
  // z-index: 1;
}

h2{
  font-size: map-get($map: $fontSize , $key: h2);
  font-weight: 800;
}

h3{
  font-size: map-get($map: $fontSize , $key: h3);
  font-weight: 800;
}

h4{
  font-family: map-get($map: $fontStyle, $key: style_1) !important;
  font-size: map-get($map: $fontSize , $key: p) ;
  font-weight: 400;
}

h6{
  font-family: map-get($map: $fontStyle, $key: style_1) !important;
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