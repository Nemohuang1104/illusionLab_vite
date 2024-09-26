<template>
    <div class="buttons"
    >

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
    <router-link :to="nextPage"  @click.native="scrollToTop"
    >
      <div 
      
      class="theOriginal" :class="{ weNeedAStarlight: step === 'two' }">
      <button 
        
        :disabled="disabled"
        v-if="showNext" 
        id="nextStep" 
        @mouseover="hoveringNext = true" 
        @mouseleave="hoveringNext = false">
        <h6 
        @click="handleClick"
        
        :style="{ color: hoveringNext ? buttonHoverColor : buttonColor }"><span>　</span>{{ isLastStep ? '' : 'NEXT STEP →' }}</h6>
      </button>
    </div>
  </router-link>

    </div>
  </template>
  
<script>
  import { computed, ref } from 'vue';
  import { defineEmits } from 'vue';

  // const emit = defineEmits(['save']);
//   const handleClick = () => {
//   emit('save'); // 當按鈕被點擊時，傳遞 'save' 事件
// };

// const handleClick = () => {
//   if (!isFormComplete.value) {
//     emit('alert', "請填寫完整表單");
//   } else {
//     emit('save'); // 當按鈕被點擊時，傳遞 'save' 事件
//   }
// };


  
  export default {
    props: {
  
      formData: Object,
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
      // required: true,
    },
    disabled: {
      type: Boolean,
      default: true
    }
    },
    data() {
      return {
        hoveringPrev: false,
        hoveringNext: false,
      };
    },
    computed: {
      isLastStep() {
      return this.currentStep === 2;
    },

      buttonColor() {
        if (this.step === 'one') {
          return '#FFFFFF';
        } else if (this.step === 'two') {
          return '#000000';
        } else if (this.step === 'three') {
          return '#FDC274';
        }
        return '#FB9D3C';
      },
      buttonHoverColor() {
        if (this.step === 'one') {
          return '#FFD700';
        } else if (this.step === 'two') {
          return '#122a74';
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
      handleClick() {
        console.log('Button clicked, disabled:', this.disabled);
        
      this.$emit('form-submitted'); // 通知父層按鈕被點擊
    },

      //   const errors = {};
      //   console.log(this.formData.quantity);
        
      // if (!this.formData.quantity) {
      //   errors.quantity = "請填寫數量";

      // }
      // if (!this.formData.date) {
      //   errors.date = "請選擇日期";
      // }
      // if (!this.formData.time) {
      //   errors.time = "請選擇時間";
      // }
      //     // 若有錯誤則不進行跳轉，顯示錯誤消息
      //     if (Object.keys(errors).length > 0) {
      //   this.$emit('update:formErrors', errors); // 傳遞錯誤消息給父層
      // } else {
      //   this.$emit('saveData'); // 表單正確，保存並跳轉
      //   this.$router.push(this.nextPage);
      // }
      // if (!this.disabled) {
      //   this.$emit('click');
      // }else{
      //   alert('尚有欄位未輸入')
      // }
    
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
}
  
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
  background-image: url("../../assets/images/ms/yourAreTheBiggestStar.png");
  background-size: cover;
  background-position-y: -50px;
  width: 300px;
  height: 200px;
  align-items: center;
}
.theOriginal{
  margin-left: auto;}
</style>
