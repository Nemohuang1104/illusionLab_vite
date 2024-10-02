<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_confirmation 
      mode="two" 
      class="customer_info"
      :eventId="currentEventId"
      >
        
      </MS_ticket_confirmation>
      <MS_com_buttons
        class="actitvyBtn"
        :disabled="!isFormComplete"
        :currentStep="currentStep"
        :isLastStep="isLastStep"
        :mode="mode" 
        :step="modeSelect" 
        :activityMode="activityMode"
        >
      </MS_com_buttons>
      
  <Footer_2 class="footer"></Footer_2>
</div>
</template>
<script>
import MS_ticket_confirmation from '@/components/MS/MS_ticket_confirmation.vue';
import Footer_2 from '@/components/Footer_2.vue';
import Header from '@/components/Header_0.vue';
import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';

export default {
  components: {
    MS_ticket_confirmation,
    Footer_2,
    Header,
    MS_com_buttons,
  },
  data() {
    return {
      currentMode: 'three', // 当前 mode
      currentStep: 2, // 当前步骤
      activityMode: 'activity2', // 初始活动模式
      mode: 'three1',// 初始 mode
      modeSelect: 'two',
      currentEventId: 2,
      isFormComplete: true,
    };
  },
}
</script>

<style lang="scss" scoped>
@import "../assets/style";
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

.warpper{
  background-image: url(@/assets/images/ms/modeBGI2.png);

}
.actitvyBtn{
  // border: 2px solid red;
  margin: 0 auto;
  margin-top: -50px;
}

::v-deep .header{
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

::v-deep *{
  font-family: "Noto Serif TC" !important;
}

::v-deep.title{
  text-align: center;
}

::v-deep body{
  font-family: map-get($map: $fontStyle, $key: style_2);
};

::v-deep h1{
  font-size: map-get($map: $fontSize , $key: h1);
  font-weight: 800;
  // z-index: 1;
}

::v-deep h2{
  font-size: map-get($map: $fontSize , $key: h2);
  font-weight: 800;
}

::v-deep h3{
  font-size: map-get($map: $fontSize , $key: h3) ;
  font-family: map-get($map: $fontStyle, $key: style_2) !important;

  font-weight: 800;
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
  transition: .3s;
  font-size: 16px  !important;
}

::v-deep h6:hover{
  color: white  !important;
}

::v-deep p{
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

::v-deep .theOriginal{
  display: none !important;
  opacity: 0;
}

@media (max-width: 500px){
  ::v-deep main{
    width: 90vw;
    padding: 40px 20px;
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
    padding: 150px 40px;
  }

  
@media (max-width: 430px){

::v-deep .options{
  width: 70vw !important;
}

::v-deep .weNeedAStarlight{
    display: flex;
    background-image: url(@/assets/images/ms/yourAreTheBiggestStar.png);
    background-size: cover;
    background-position-y: -22px!important;
    width: 150px!important;
    height: 100px!important;
    align-items: center;
}

::v-deep h6{
  font-size: 6px !important;
}
}

 
@media (max-width: 390px){
  ::v-deep main{
    width: 90vw;
    padding: 40px 10px;
  }

::v-deep .options{
  width: 90vw !important;
}

::v-deep .eventInfo,::v-deep .memberInfo {
  padding: 0px 20px !important;
}

::v-deep .weNeedAStarlight{
    display: flex;
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

}




</style>

