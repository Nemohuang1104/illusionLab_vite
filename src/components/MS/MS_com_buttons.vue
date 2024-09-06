<template>
    <div class="buttons">
      <div  v-if="showPrev" :class="{ weNeedAStarlight: step === 'two' }">
        <button 
          v-if="showPrev" 
          id="prevStep" 
          @mouseover="hoveringPrev = true" 
          @mouseleave="hoveringPrev = false">
          <h6 :style="{ color: hoveringPrev ? buttonHoverColor : buttonColor }">← PREVIOUS STEP<span>　</span></h6>
        </button>
      </div>
      <div class="theOriginal" :class="{ weNeedAStarlight: step === 'two' }">
      <button 
        v-if="showNext" 
        id="nextStep" 
        @mouseover="hoveringNext = true" 
        @mouseleave="hoveringNext = false">
        <h6 :style="{ color: hoveringNext ? buttonHoverColor : buttonColor }"><span>　</span>NEXT STEP →</h6>
      </button>
    </div>
    </div>
  </template>
  
  <script>
  import { computed, ref } from 'vue';
  
  export default {
    props: {
      mode: {
        type: String,
        default: 'one1',
        validator: value => ['one1', 'two1', 'three1'].includes(value),
      },
      step: {
        type: String,
        default: 'one',
        validator: value => ['one', 'two', 'three'].includes(value),
      },
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
        return this.mode === 'one1' || this.mode === 'two1';
      },
    },
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
