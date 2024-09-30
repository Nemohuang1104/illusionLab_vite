<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_reservation 
      mode="two" 
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
        :step="modeSelect" 

        >
      </MS_com_buttons>
  <Footer_2 class="footer"></Footer_2>
</div>
</template>

<script>
  import MS_ticket_reservation from '@/components/MS/MS_ticket_reservation.vue';
  import Footer_2 from '@/components/Footer_2.vue';
  import Header from '@/components/Header_0.vue';
  import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';

export default {
  components: {
      MS_ticket_reservation,
      Footer_2,
      Header,
      MS_com_buttons
    },
  data() {
    return {
      currentMode: 'three', // 当前 mode
      formErrors: {}, // 儲存錯誤訊息的狀態
      isFormComplete: false, // 表單是否完整的狀態
      currentStep: 0, // 当前步骤
      activityMode: 'activity2', // 初始活动模式
      mode: 'one1', // 初始 mode
      modeSelect: 'two',
      currentEventId: 2, // 當前活動的 EVENT_ID，例如 1
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
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');


*{
  font-family: "Noto Serif TC"  !important;
 }
  .warpper{
  background-image: url(@/assets/images/ms/modeBGI2.png);

}

.actitvyBtn{
  // border: 2px solid red;
  margin: 0 auto;
  margin-top: -50px;
  
}

::v-deep.header{
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10;
}




::v-deep.title{
  text-align: center;
}

::v-deep body{
  font-family: map-get($map: $fontStyle, $key: style_2);
};

::v-deep h1{
  font-size: map-get($map: $fontSize , $key: h1);
  // font-size: 28px;
  font-weight: 800;
  // z-index: 1;
  font-family: "Noto Serif TC"  !important;
}

::v-deep h2{
  font-size: map-get($map: $fontSize , $key: h2);
  font-weight: 800;
}

::v-deep h3{
  font-size: map-get($map: $fontSize , $key: h3);
  font-weight: 800;
  font-family: "Noto Serif TC"  !important;
}

::v-deep h4{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p) ;
  font-weight: 400;
}

::v-deep h6{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p) ;
  font-weight: 400;
  font-size: 16px  !important;
  font-family: "Noto Serif TC"  !important;
  transition: .3s;
}

::v-deep h6:hover{
  color: white  !important;
}

.soFuckingShinningTitleColor{
  
  &:nth-last-child(2){
    margin-bottom: 10px;
  }
}


::v-deep .options{
 background-color:rgba(255, 255, 255, 0.5) !important;
 background: linear-gradient(180deg, rgba(19, 44, 121, 0.8) 44.5%, rgba(7, 143, 242, 0.7) 100%)!important;
 color: white !important;

 outline: unset ;
}

::v-deep .options:hover{
  background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
}

::v-deep .options option{
  background-color: black;
}



@media (max-width: 500px){

::v-deep .options{
  width: 70vw;
}

::v-deep h1{
  font-size: 30px;
}
::v-deep h3{
  font-size: 20px;
}
::v-deep h4{
  font-size: 14px;
}
::v-deep p{
  font-size: 12px;
}
::v-deep .template_mobang{
  padding: 150px 70px ;
}
}

@media (max-width: 430px){

::v-deep .options{
  width: 70vw !important;
}

::v-deep .weNeedAStarlight{
    display: flex;
    // background-image: url(/src/ms/yourAreTheBiggestStar.png);
    background-image: url(@/assets/images/ms/yourAreTheBiggestStar.png);
    background-size: cover;
    background-position-y: -22px!important;
    width: 150px!important;
    height: 100px!important;
    align-items: center;
}

::v-deep h6{
  font-size: 8px !important;
}
}



</style>

