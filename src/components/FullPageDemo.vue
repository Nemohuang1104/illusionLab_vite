<template>
  <div>
    <vue-fullpage :options="fullpageOptions">
      <div class="section">
        <h1>第一屏的内容</h1>
      </div>
      <div class="section">
        <h1>第二屏的内容</h1>
      </div>
      <!-- 添加更多全屏圖片資訊... -->
    </vue-fullpage>
  </div>
</template>

<script setup>
import VueFullpage from 'vue-fullpage.js';

const fullpageOptions = {
  navigation: true,
  anchors: ['section1', 'section2', 'section3'],
  // 更多配置項...
};
</script>