<template>
  <div class="warpper">
    <Header class="header" :mode="currentMode" />
    <MS_ticket_customer_info 
    mode="two" 
      
      class="customer_info"
      ref="formRef"
      @formCompletionStatus="handleFormCompletion"
      >
    </MS_ticket_customer_info>

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
import MS_ticket_customer_info from '@/components/MS/MS_ticket_customer_info.vue';
import Footer_2 from '@/components/Footer_2.vue';
import Header from '@/components/Header_0.vue';
import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';

export default {
  components: {
    MS_ticket_customer_info,
    Footer_2,
    Header,
    MS_com_buttons,
  },
  data() {
    return {
      currentMode: 'three', // 当前 mode
      formErrors: {}, // 儲存錯誤訊息的狀態
      isFormComplete: false,   // 表单完成状态
      currentStep: 1,         // 当前步骤
      activityMode: 'activity2', // 初始活动模式
      mode: 'two1',            // 初始 mode
      showNext: true,
      currentEventId: 2,
      modeSelect: 'two'
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

<style lang="scss" scoped>
@import "../assets/style";
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

::v-deep * {
  font-family: "Noto Serif TC";
}


::v-deep.warpper {
  background-image: url(@/assets/images/ms/modeBGI2.png);

}

::v-deep .header {
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10;
}

::v-deep .coin {
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

@keyframes opacity {
  0% {
    opacity: 0;
  }

  100% {
    opacity: .3;
  }
}

::v-deep .actitvyBtn {
  // border: 2px solid red;
  margin: 0 auto;
  margin-top: -50px;
}


::v-deep .title {
  text-align: center;
}

::v-deep body {
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
}

;

::v-deep h1 {
  font-size: map-get($map: $fontSize , $key: h1);
  font-weight: 800;
  font-family: map-get($map: $fontStyle, $key: style_2) !important;

  // z-index: 1;
}

::v-deep h2 {
  font-size: map-get($map: $fontSize , $key: h2);
  font-weight: 800;
  font-family: map-get($map: $fontStyle, $key: style_2) !important;

}

::v-deep h3 {
  font-size: map-get($map: $fontSize , $key: h3);
  font-weight: 800;
  font-family: map-get($map: $fontStyle, $key: style_2) !important;

}

::v-deep h4 {
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p);
  font-weight: 400;
}

::v-deep h6 {
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p);
  font-weight: 400;
  transition: .3s;
  font-size: 16px !important;

}

::v-deep h6:hover {
  color: white !important;
}

.soFuckingShinningTitleColor[data-v-3d5d2ec6] {

  &:nth-last-child(2) {
    margin-bottom: 10px;
  }
}

// .options{
//  background-color:rgba(255, 255, 255, 0.5) !important;

// }

::v-deep .options {
  background-color: rgba(255, 255, 255, 0.5) !important;
  background: linear-gradient(180deg, rgba(19, 44, 121, 0.8) 44.5%, rgba(7, 143, 242, 0.7) 100%) !important;
  color: white !important;

  outline: unset;

}



::v-deep .options:hover {
  background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
}

::v-deep .options option {
  background-color: black;
}

@media (max-width: 500px) {

  ::v-deep .options {
    width: 70vw;
  }

  ::v-deep h1 {
    font-size: 30px;
  }

  ::v-deep h3 {
    font-size: 20px;
  }

  ::v-deep h4 {
    font-size: 14px;
  }

  ::v-deep p {
    font-size: 12px;
  }

  ::v-deep .template_mobang {
    padding: 150px 70px;
  }
}

@media (max-width: 430px) {

  ::v-deep .options {
    width: 70vw !important;
  }

  ::v-deep .weNeedAStarlight {
    display: flex;
    background-image: url(@/assets/images/ms/yourAreTheBiggestStar.png);
    background-size: cover;
    background-position-y: -22px !important;
    width: 150px !important;
    height: 100px !important;
    align-items: center;
  }

  ::v-deep h6 {
    font-size: 8px !important;
  }
}
</style>
