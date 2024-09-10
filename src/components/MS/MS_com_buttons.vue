<template>
    <div class="buttons">

    <router-link :to="previousPage"  @click.native="scrollToTop">
      <div  v-if="showPrev" :class="{ weNeedAStarlight: step === 'two' }">
          <button 
            v-if="showPrev" 
            id="prevStep" 
            @mouseover="hoveringPrev = true" 
            @mouseleave="hoveringPrev = false">
            <h6 :style="{ color: hoveringPrev ? buttonHoverColor : buttonColor }">← PREVIOUS STEP<span>　</span></h6>
          </button>
      </div>
    </router-link>
    <router-link :to="nextPage"  @click.native="scrollToTop">
      <div class="theOriginal" :class="{ weNeedAStarlight: step === 'two' }">
      <button 
        v-if="showNext" 
        id="nextStep" 
        @mouseover="hoveringNext = true" 
        @mouseleave="hoveringNext = false">
        <h6 :style="{ color: hoveringNext ? buttonHoverColor : buttonColor }"><span>　</span>{{ isLastStep ? 'Pay Now →' : 'NEXT STEP →' }}</h6>
      </button>
    </div>
  </router-link>

    </div>
  </template>
  
  <script>
  import { computed, ref } from 'vue';
  
  export default {
    props: {
      mode: {
        type: String,
        required: true,

        // default: 'one1',
        // validator: value => ['one1', 'two1', 'three1'].includes(value),
      },
      activityMode: {
      type: String, // 控制活动路由的模式，例如 'activity1', 'activity2', 'activity3'
      required: true,
      // validator: value => ['activity1', 'activity2', 'activity3'].includes(value),
    },
      step: {
        type: String,
        default: 'one',
        // validator: value => ['one', 'two', 'three'].includes(value),
      },
      currentStep: {
      type: Number,
      required: true,
     
    }
    },
    data() {
      return {
        hoveringPrev: false,
        hoveringNext: false,
      };
    },
    computed: {
      buttonColor() {
        if (this.step === 'one') {
          return '#FFFFFF';
        } else if (this.step === 'two') {
          return '#FFFFFF';
        } else if (this.step === 'three') {
          return '#FDC274';
        }
        return '#FB9D3C';
      },
      buttonHoverColor() {
        if (this.step === 'one') {
          return '#FFD700';
        } else if (this.step === 'two') {
          return '#FFFFFF';
        } else if (this.step === 'three') {
          return '#855F49';
        }
        return '#855F49';
      },
      showPrev() {
        return this.mode === 'two1' || this.mode === 'three1';
      },
      showNext() {
        return this.mode === 'one1' || this.mode === 'two1' || this.mode === 'three1';
      },
       // 控制是否显示 "上一步" 按钮
    // showPrevious() {
    //   return this.mode !== 'one1'; // 例如，mode 为 'one1' 时不显示
    // },
    // // 控制是否显示 "下一步" 按钮
    // showNext() {
    //   return this.mode !== 'three1'; // 例如，mode 为 'three1' 时不显示
    // },
    // 判断是否是最后一步

      isLastStep() {
      return this.currentStep === 2;
    },
    // previousPage() {
    //   if (this.mode === 'two1' || this.mode === 'three1') {
    //     return `/LC_Ticket_step${this.currentStep - 1}`; // mode1 回上一步的页面
    //   } else if (this.mode === 'mode2') {
    //     return `/mode2-step${this.currentStep - 1}`; // mode2 回上一步的页面
    //   }
    //   return `/default-step${this.currentStep - 1}`; // 默认的回上一步页面
    // },
    // nextPage() {
    //   if (this.isLastStep || this.mode === 'two3'){
    //     return `/LC_Customization`;

    //   }else if (this.mode === 'one1' || this.mode === 'two1') {
    //     return `/LC_Ticket_step${this.currentStep + 1}`; // mode1 下一步的页面

    //   } else if (this.mode === 'two') {
    //     return `/SF_Ticket_step${this.currentStep + 1}`; // mode2 下一步的页面

    //   }else if (this.mode === 'mode3') {
    //     return `/mode3-step${this.currentStep + 1}`; // mode3 下一步的页面
    //   }
     // 根据 activityMode 和 currentStep 生成 "上一步" 路径
     previousPage() {
      return this.getPreviousPageForActivity();
    },
    // 根据 activityMode 和 currentStep 生成 "下一步" 路径
    nextPage() {
      if (this.isLastStep && this.activityMode === 'activity1') {
        return '/LC_Customization'; // 客製票卷
      } else if (this.isLastStep && this.activityMode === 'activity2'){
        return '/SF_TicketDesign'; // 客製票卷

      }else if (this.isLastStep && this.activityMode === 'activity3'){
        return '/MS_customization'; // 客製票卷

      }
      else {
        return this.getNextPageForActivity();
      }
    },
      
   

    },
    methods: {
     // 根据 activityMode 生成 "上一步" 的路径
     getPreviousPageForActivity() {
      if (this.activityMode === 'activity1') {
        return `/LC_Ticket_step${this.currentStep - 1}`;
      } else if (this.activityMode === 'activity2') {
        return `/SF_Ticket_step${this.currentStep - 1}`;
      } else if (this.activityMode === 'activity3') {
        return `/MS_Ticket_step${this.currentStep - 1}`;
      }
      return '/default';
    },
    // 根据 activityMode 生成 "下一步" 的路径
    getNextPageForActivity() {
      if (this.activityMode === 'activity1') {
        return `/LC_Ticket_step${this.currentStep + 1}`;
      } else if (this.activityMode === 'activity2') {
        return `/SF_Ticket_step${this.currentStep + 1}`;
      } else if (this.activityMode === 'activity3') {
        return `/MS_Ticket_step${this.currentStep + 1}`;
      }
      return '/default';
    },

    // 手动滚动到页面顶部
    scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'auto' // 平滑滚动
      });
    }
  }
  };
  </script>
  
  

<style lang="scss" scoped>
.buttons{
    width: 80vw;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
#prevStep{
    margin-right: auto;
}
#nextStep{
    margin-left: auto;
}
#prevStep, #nextStep {
  margin: 0 auto;
    width: auto;
    display: block;
    font-size: 24px;
    font-weight: bold;
    background-color: transparent;
    border: none;
    cursor: pointer;
}
.weNeedAStarlight{
  display: flex;
  background-image: url("../../ms/yourAreTheBiggestStar.png");
  background-size: cover;
  background-position-y: -50px;
  width: 300px;
  height: 200px;
  align-items: center;
}
.theOriginal{
  margin-left: auto;}
</style>
