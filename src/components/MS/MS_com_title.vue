<template>
  <div class="title">
    <h1
      :class="titleClass"
      :style="!isGradientMode ? { color: modeColor1 } : {}"
    >
      {{ mainTitle }}
    </h1>
    <h3
      :class="titleClass"
      :style="!isGradientMode ? { color: modeColor1 } : {}"
    >
      {{ subTitle }}
    </h3>
  </div>
  <div class="title">
    <h3 :style="{ color: modeColor2 }">{{ introTitle }}</h3>
    <h4 :style="{ color: modeColor2 }" v-html="intro"></h4>
  </div>
</template>

<script>
export default {
  props: {
    mode: {
      type: String,
      default: 'one',
      validator: value => ['one', 'two', 'three' , 'four'].includes(value),
    },
    mainTitle: {
      type: String,
      required: false,
    },
    subTitle: {
      type: String,
      required: false,
    },
    introTitle: {
      type: String,
      required: false,
    },
    intro: {
      type: String,
      required: false,
    },
  },
  computed: {
    titleClass() {
      if (this.mode === 'two') {
        return 'specialTitleColor';
      } else if (this.mode === 'one') {
        return 'soFuckingShinningTitleColor';
      }
      return '';
    },
    isGradientMode() {
      return this.mode === 'two' || this.mode === 'three';
    },
    modeColor1() {
      if (this.mode === 'one') {
        return '#F2D45C';
      } else if (this.mode === 'four'){
      return '#FFFFFF';
    }
      return '#FB9D3C';
    },
    modeColor2() {
      if (this.mode === 'one') {
        return '#FFFFFF';
      } else if (this.mode === 'two' || this.mode === 'four') {
        return '#FFFFFF';
      }
      return '#855F49';
    },
  },
};
</script>

  

<style lang="scss" scoped>
  @import "../../assets/SASS/component/ms";

  .title{
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  }
  .top > .title > h4{
    text-align: left;
    line-height: 250% ;
  }
  .specialTitleColor {
  background: linear-gradient(90deg, #078FF2 2.12%, #0FF 50.65%, #5BCAE8 93.64%);
  background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: bold;
}
.soFuckingShinningTitleColor {
background: url("../src/MS/LC_text_bg.png") lightgray 50% / cover no-repeat;
background-clip: text;
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
}

</style>