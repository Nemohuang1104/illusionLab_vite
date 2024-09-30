<template>
      <div class="warpper">
      <Header class="header" :mode="currentMode"/> 
      <MS_ticket_into mode="three" activityMode="activity3" class="reservation">
        
      </MS_ticket_into>
      <MS_com_buttons
        class="actitvyBtn"
        :currentStep="currentStep"
        :mode="mode" 
        :activityMode="activityMode"
        :step="modeSelect"
        :disabled="!isFormComplete"

        >
      </MS_com_buttons>
      
  <Footer_3 class="footer"></Footer_3>
    </div>
</template>

<!-- <script setup>
    import MS_ticket_into from '@/components/MS/MS_ticket_into.vue';
    import Footer_3 from '@/components/Footer_03.vue'
    import Header from '@/components/Header_0.vue';
    import { ref }from 'vue';
    import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';

    const currentMode = ref('four');
    

</script> -->

<script>
import MS_ticket_into from '@/components/MS/MS_ticket_into.vue';
import Footer_3 from '@/components/Footer_03.vue'
import Header from '@/components/Header_0.vue';
import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';


export default {
  components: {
      MS_ticket_into,
      Footer_3,
      Header,
      MS_com_buttons
    },
  data() {
  
    return {
      currentMode: 'four', // 当前 mode
      currentStep: 0, // 当前步骤
      activityMode: 'activity3', // 初始活动模式
      mode: 'one1', // 初始 mode
      modeSelect: 'three',
      isFormComplete: true, // 表單是否完整的狀態
      

    };
  },
}
</script>

<style lang="scss" scoped>
  @import "../assets/SASS/component/ms";
  .warpper{
    background-image: url(@/assets/images/ms/modeBGI3.jpg) !important;

  }

    .ticketIntros{
        margin: 50px 0;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        align-self: stretch;
        gap: 10px;
    }
    article{
        display: flex;
        padding: 30px 40px;
        flex-direction: column;
        align-self: stretch;
        border-radius: 12px;
        background: rgba(184, 153, 119, 0.20);
    }
    .actitvyBtn{
  // border: 2px solid red;
  margin: 0 auto;
  margin-top: -50px;
  margin-bottom: 50px;
}

::v-deep .template[data-v-560a67a3]{
        padding: 20% 10% !important;
    }


::v-deep article[data-v-553648f2]{
  padding: 10% 5% !important;
}

@media screen and (max-width: 820px) {
  ::v-deep .ticketIntros[data-v-553648f2]{
    flex-wrap: wrap;
    }
}
</style>