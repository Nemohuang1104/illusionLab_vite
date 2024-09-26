<template>
  <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_confirmation mode="one" class="customer_info"
      :eventId="currentEventId">
        
      </MS_ticket_confirmation>
      <MS_com_buttons
      class="actitvyBtn"
      :disabled="!isFormComplete"
      :currentStep="currentStep"
      :isLastStep="isLastStep"
        :mode="mode" :step="modeSelect" :activityMode="activityMode"></MS_com_buttons>
      <CoinFall class="coin"/>
  <Footer_1 class="footer"></Footer_1>
</div>
</template>
<script>
import MS_ticket_confirmation from '@/components/MS/MS_ticket_confirmation.vue';
import Footer_1 from '@/components/Footer_1.vue';
import Header from '@/components/Header_0.vue';
import CoinFall from '@/components/CoinFall.vue';
import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';


export default {
  components: {
    MS_ticket_confirmation,
    Footer_1,
    Header,
    CoinFall,
    MS_com_buttons,
  },
  data() {
    return {
      currentMode: 'two', // 当前 mode
      // 引用的變量移到 data 中
      currentStep: 2, // 当前步骤
      activityMode: 'activity1', // 初始活动模式
      mode: 'three1', // 初始 mode
      currentEventId: 1,
      isFormComplete: true,
    };
  },
  methods: {

  },
  mounted() {
   
  },
};
</script>

<!-- <script>
export default {
  data() {
    return {
      currentStep: 2, // 当前步骤
      activityMode: 'activity1', // 初始活动模式
      mode: 'three1' // 初始 mode
    };
  },
}
</script>

<script setup>
  import MS_ticket_confirmation from '@/components/MS/MS_ticket_confirmation.vue';
  import Footer_1 from '@/components/Footer_1.vue';
  import Header from '@/components/Header_0.vue';
  import { ref } from 'vue';
  import CoinFall from '@/components/CoinFall.vue';
  import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
  import { useTicketStore } from '@/stores/ticketStore'; // 引入 Pinia store

  const ticketStore = useTicketStore();

  const currentMode = ref('three1');
  const currentStep = ref(2); // 当前步骤
  const activityMode = ref('activity1'); // 初始活动模式
  const mode = ref('three1'); // 初始 mode

  // 這裡假設你可能需要保存一些數據，這裡的 saveData 可以根據實際需要進行調整
  const saveData = () => {
    // 保存數據邏輯
  };

    

    
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

.sbmit{
  font-family: map-get($map: $fontStyle, $key: style_2) !important;

}

</style>