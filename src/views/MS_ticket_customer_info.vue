<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_customer_info mode="three" activityMode="activity3" class="reservation">
        
      </MS_ticket_customer_info>
      <MS_com_buttons
        class="actitvyBtn"
        :currentStep="currentStep"
        :mode="mode" :step="modeSelect" :activityMode="activityMode"></MS_com_buttons>
      
  <Footer_3 class="footer"></Footer_3>

</div>
</template>

<script setup>
    import MS_ticket_customer_info from '@/components/MS/MS_ticket_customer_info.vue';
    import Footer_3 from '@/components/Footer_03.vue'
    import Header from '@/components/Header_0.vue';
    import { ref }from 'vue';
    import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
    

    const currentMode = ref('four');

    
    
</script>
<script>
export default {
  data() {
    return {
      currentStep: 2, // 当前步骤
      activityMode: 'activity3', // 初始活动模式
      mode: 'two1', // 初始 mode
      modeSelect: 'three',

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
  background-image: url('../src/ms/modeBGI3.jpg');
  
  
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