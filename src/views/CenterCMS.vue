<script setup>

import Header_CMS from '@/components/Header_CMS.vue';
import { ref, computed } from 'vue';


</script>


<template>
  <div class="wrapper">
    <Header_CMS></Header_CMS>
    <div class="content">
      <div class="tab">
        <RouterLink tag="div" to="/MemberCMS" class="tab-item">會員管理</RouterLink>
        <RouterLink tag="div" to="/OrderCMS" class="tab-item">訂單管理</RouterLink>
        <RouterLink tag="div" to="/ProductCMS" class="tab-item">商品管理</RouterLink>
        <RouterLink tag="div" to="/CustomTicketCMS" class="tab-item">客製化票券管理</RouterLink>
        <RouterLink tag="div" to="/NewsCMS" class="tab-item">消息管理</RouterLink>
      </div>
      <div class="replace">
        <RouterView></RouterView>
        
      </div>
    </div> 
  </div>
</template>

<style lang="scss" scoped>

.wrapper{
    background: linear-gradient(134deg, #22247A 23.77%, #7976BB 100.56%);
    // min-height: 100vh;
    background-size: cover;
    width: 100%;
    // max-width: 1440px;
    // min-height: 100vh; /* 確保背景至少覆蓋視口高度 */
    
    
}

.content{
    display: flex;
    justify-content: space-between;
    margin: 0 auto;
    margin-top: 2%;
    width: 100%;
    max-width:1140px;
    // border: 1px solid white;
    // flex: 1; /* 讓內容區域自適應剩餘空間 */
}

.tab{
    display: flex;
    flex-direction: column;
}

.tab-item{
  text-decoration: none;
    text-align: center;
    font-size: 20px;
    font-weight: 600;
    color: #505050;
    width: 160px;
    line-height: 32px;
    padding: 4px;
    border: none;
    border-radius: 10px;
    background: var(--Color-3, #FFEDBC);
    cursor: pointer;
    margin-bottom: 20%;
    
}

.router-link-active {
  font-weight: bold ; /* 選中狀態下的樣式 */
  background: #FCB600 ; /* 選中時的文字顏色 */
}



.replace{
    flex-basis: 80%;
    
}



</style>