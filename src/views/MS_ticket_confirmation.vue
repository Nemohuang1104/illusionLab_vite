<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_confirmation mode="three" activityMode="activity3" class="customer_info"
      :eventId="currentEventId">
        
      </MS_ticket_confirmation>
      <MS_com_buttons
          class="actitvyBtn"
          :disabled="!isFormComplete"
          :currentStep="currentStep"
          :mode="mode" 
          :step="modeSelect" :activityMode="activityMode"
        ></MS_com_buttons>
      
  <Footer_3 class="footer"></Footer_3>

</div>
</template>

<script>
import MS_ticket_confirmation from '@/components/MS/MS_ticket_confirmation.vue';
import Footer_3 from '@/components/Footer_03.vue';
import Header from '@/components/Header_0.vue';
import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';

export default {
  components: {
    MS_ticket_confirmation,
    Footer_3,
    Header,
    MS_com_buttons,
  },
  data() {
    return {
      currentMode: 'four', // 当前 mode

      currentStep: 3, // 当前步骤
      activityMode: 'activity3', // 初始活动模式
      mode: 'three1', // 初始 mode
      modeSelect: 'three',
      currentEventId: 3,
      isFormComplete: true,
    };
  },
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

::v-deep .theOriginal[data-v-5a144230]{
  display: none;
}

::v-deep .title[data-v-3d5d2ec6]{
  text-align: center;
  color: rgb(133, 95, 73);

}

::v-deep body{
  font-family: map-get($map: $fontStyle, $key: style_1);
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
  font-size: map-get($map: $fontSize , $key: h3);
  font-weight: 800;
}

::v-deep h4{
  font-family: map-get($map: $fontStyle, $key: style_1) !important;
  font-size: map-get($map: $fontSize , $key: p) ;
  font-weight: 600;
}

::v-deep h6{
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

::v-deep .options{
 background-color:rgba(255, 255, 255, 0.5) !important;
  
}
::v-deep .sbmit[data-v-d09fc348]{
  color: rgb(133, 95, 73);
  border: 1px solid rgb(133, 95, 73);

  &:hover{
    background-color: #ffffffac;
    box-shadow: 1px 3px 12px 0px rgba(109, 109, 109, 0.52);
      scale: 1.1;
  }
}
</style>

