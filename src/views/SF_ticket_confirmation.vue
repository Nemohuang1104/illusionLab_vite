<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_confirmation mode="two" class="customer_info">
        
      </MS_ticket_confirmation>
      <MS_com_buttons
      class="actitvyBtn"
      :currentStep="currentStep"
        :mode="mode" :step="modeSelect" :activityMode="activityMode"></MS_com_buttons>
      
  <Footer_2 class="footer"></Footer_2>
</div>
</template>
<script>
export default {
  data() {
    return {
      currentStep: 2, // 当前步骤
      activityMode: 'activity2', // 初始活动模式
      mode: 'three1',// 初始 mode
      modeSelect: 'two'

    };
  },
}
</script>

<script setup>
    import MS_ticket_confirmation from '@/components/MS/MS_ticket_confirmation.vue';
    import Footer_2 from '@/components/Footer_2.vue'
    import Header from '@/components/Header_0.vue';
    import { ref }from 'vue';
    import CoinFall from '@/components/CoinFall.vue';
    import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
    

    const currentMode = ref('three');
    
</script>

<style lang="scss" scoped>
@import "../assets/style";
.warpper{
  background-image: url('../src/ms/modeBGI2.png');

}
.actitvyBtn{
  // border: 2px solid red;
  margin: 0 auto;
  margin-top: -50px;
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

.title{
  text-align: center;
}

body{
  font-family: map-get($map: $fontStyle, $key: style_2);
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
  font-size: map-get($map: $fontSize , $key: h3) ;
  font-family: map-get($map: $fontStyle, $key: style_2) !important;

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

p{
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