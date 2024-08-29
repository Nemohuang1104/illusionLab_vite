<script setup>

</script>

<template>
    <div class="sub-tab">
        <RouterLink tag="div" to="/RefundQueryTicket" class="sub-tab-item">票券</RouterLink>
        <RouterLink tag="div" to="/RefundQueryProduct" class="sub-tab-item">商品</RouterLink>
    </div>
            

    <div class="replace">
        <RouterView /> <!--對應的票券或商品訂單的組件會在這裡渲染-->
        

    </div>
</template>

<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');

.sub-tab{
    // border: 1px solid white;
    width: 402px;
    display: flex;
    justify-content: space-between;
    
}

.sub-tab-item{
    text-decoration: none; /* 移除底線 */
    text-align: center;
    vertical-align: baseline;
    font-size: 18px;
    font-weight: 600;
    color: #505050;
    width: 190px;
    height: 40px;
    line-height: 40px;
    padding: 4px;
    border: none;
    border-radius: 10px 10px 0 0;
    background: var(--Color-3, #FFEDBC);
    cursor: pointer;
}

// .sub-tab-item:first-child{
//     background: var(--Color-3, #FCB600);
//     cursor: pointer;
// }

.router-link-active {
  font-weight: bold ; /* 選中狀態下的樣式 */
  background: #FCB600 ; /* 選中時的文字顏色 */
}

</style>