<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_reservation 
      mode="one" 
      activityMode="activity1" 
      class="reservation"
      :eventId="currentEventId"
        ref="formRef"
       @formCompletionStatus="handleFormCompletion"
      >
        
      </MS_ticket_reservation>
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
  import MS_ticket_reservation from '@/components/MS/MS_ticket_reservation.vue';
  import Footer_1 from '@/components/Footer_1.vue';
  import Header from '@/components/Header_0.vue';
  import CoinFall from '@/components/CoinFall.vue';
  import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';

  export default {
    components: {
      MS_ticket_reservation,
      Footer_1,
      Header,
      CoinFall,
      MS_com_buttons
    },
    data() {
      return {
        currentMode: 'two', // 当前 mode
        
        formErrors: {}, // 儲存錯誤訊息的狀態
        isFormComplete: false, // 表單是否完整的狀態
        currentStep: 0, // 当前步骤
        activityMode: 'activity1', // 初始活动模式
        mode: 'one1', // 初始 mode
        currentEventId: 1, // 當前活動的 EVENT_ID，例如 1
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
.actitvyBtn{
  // border: 2px solid red;
  margin: 0 auto;
  margin-top: -50px;
  margin-bottom: 50px;
}

@import "../assets/style";
.warpper{
  position: relative;
  background-image: url(../assets/images/lifecasino_bg2.png);
  background-repeat: no-repeat;
  background-size: cover;
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

.reservation{
  // border: 2px solid red;

}

::v-deep .title{
  text-align: center;
}



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
  font-weight: 600;
}

::v-deep h6{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p) ;
  font-weight: 400;
  transition: .3s;
}

::v-deep .soFuckingShinningTitleColor[data-v-3d5d2ec6]{
  
  &:nth-last-child(2){
    margin-bottom: 10px;
  }
}

::v-deep .options{
 background-color:rgba(255, 255, 255, 0.5) !important;
  
}

</style>
