<template>
  <div class="warpper">
    <Header class="header" :mode="currentMode" />
    <MS_ticket_customer_info mode="two" class="customer_info">

    </MS_ticket_customer_info>
    <MS_com_buttons class="actitvyBtn" :currentStep="currentStep" :mode="mode" :step="modeSelect"
      :activityMode="activityMode">
    </MS_com_buttons>
    <Footer_2 class="footer"></Footer_2>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentStep: 1, // 当前步骤
      activityMode: 'activity2', // 初始活动模式
      mode: 'two1', // 初始 mode
      modeSelect: 'two'
    };
  },
}
</script>
<script setup>
import MS_ticket_customer_info from '@/components/MS/MS_ticket_customer_info.vue';
import Footer_2 from '@/components/Footer_2.vue'
import Header from '@/components/Header_0.vue';
import { ref } from 'vue';
import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';



const currentMode = ref('three');

</script>

<style lang="scss" scoped>
@import "../assets/style";
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

::v-deep * {
  font-family: "Noto Serif TC";
}


::v-deep.warpper {
  background-image: url('../src/ms/modeBGI2.png');

}

::v-deep .header {
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10;
}

::v-deep .coin {
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

@keyframes opacity {
  0% {
    opacity: 0;
  }

  100% {
    opacity: .3;
  }
}

::v-deep .actitvyBtn {
  // border: 2px solid red;
  margin: 0 auto;
  margin-top: -50px;
}


::v-deep .title {
  text-align: center;
}

::v-deep body {
  font-family: map-get($map: $fontStyle, $key: style_2);
}

;

::v-deep h1 {
  font-size: map-get($map: $fontSize , $key: h1);
  font-weight: 800;
  // z-index: 1;
}

::v-deep h2 {
  font-size: map-get($map: $fontSize , $key: h2);
  font-weight: 800;
}

::v-deep h3 {
  font-size: map-get($map: $fontSize , $key: h3);
  font-weight: 800;
}

::v-deep h4 {
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p);
  font-weight: 400;
}

::v-deep h6 {
  font-family: map-get($map: $fontStyle, $key: style_2) !important;
  font-size: map-get($map: $fontSize , $key: p);
  font-weight: 400;
  transition: .3s;
  font-size: 16px !important;

}

::v-deep h6:hover {
  color: white !important;
}

.soFuckingShinningTitleColor[data-v-3d5d2ec6] {

  &:nth-last-child(2) {
    margin-bottom: 10px;
  }
}

// .options{
//  background-color:rgba(255, 255, 255, 0.5) !important;

// }

::v-deep .options {
  background-color: rgba(255, 255, 255, 0.5) !important;
  background: linear-gradient(180deg, rgba(19, 44, 121, 0.8) 44.5%, rgba(7, 143, 242, 0.7) 100%) !important;
  color: white !important;

  outline: unset;

}



::v-deep .options:hover {
  background: var(--2, linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%));
}

::v-deep .options option {
  background-color: black;
}

@media (max-width: 500px) {

  ::v-deep .options {
    width: 70vw;
  }

  ::v-deep h1 {
    font-size: 30px;
  }

  ::v-deep h3 {
    font-size: 20px;
  }

  ::v-deep h4 {
    font-size: 14px;
  }

  ::v-deep p {
    font-size: 12px;
  }

  ::v-deep .template_mobang {
    padding: 150px 70px;
  }
}

@media (max-width: 430px) {

  ::v-deep .options {
    width: 70vw !important;
  }

  ::v-deep .weNeedAStarlight {
    display: flex;
    background-image: url(/src/ms/yourAreTheBiggestStar.png);
    background-size: cover;
    background-position-y: -22px !important;
    width: 150px !important;
    height: 100px !important;
    align-items: center;
  }

  ::v-deep h6 {
    font-size: 8px !important;
  }
}
</style>
