<script setup>

</script>



<template>
    <div class="detail">
        <div class="order-summary">
            <div class="order-header">
            <span>文章編號</span>
            <span>上架日期</span>
            <span>標題</span>
            <span>上下架</span>
            <span>最後更新日期</span>
            <span>操作</span>
            </div>
            <hr>

            
            <div v-for="item in displayedItems" :key="item.id" class="order-text">
            <span>{{ item.id }}</span>
            <span>{{ item.eventName }}</span>
            <span>{{ item.name }}</span>
            <span>{{ item.price }}</span>
            <span>{{ item.status }}</span>
            <span>編輯</span>
            </div>
        </div> 
        </div> 
</template>



<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
.detail{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 95.5%;
    height: 440px;
    border-radius: 10px;
    padding: 16px;
    padding-left: 20px;
    padding-right: 20px;
    
    background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
    margin-bottom: 20px;
    
}
.order-summary{
    width: 100%;
    height: 100%;
}

.order-header {
    display: grid;
    grid-template-columns: 0.8fr 1fr 3fr 1fr 1.2fr 1fr ;
    font-weight: bold;
    color: #313131;
    font-size: 18px;
}

.order-summary > hr{
    height: 3px;
    background-color: #313131;
    border: none;
    border-radius: 2.5px; /* 讓線條變得更加圓潤 */
}

.order-text {
    display: grid;
    grid-template-columns: 0.8fr 1fr 3fr 1fr 1.2fr 1fr ;
    font-weight: normal;
    color: #313131;
    font-size: 18px;
    margin-top: 18px;
    font-family: "Noto Sans TC";
}

.order-text span:last-child{
    text-align: center;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    width: 80px;
    height: 22px;
    line-height: 22px;
    border: none;
    background: #22247A;
    border-radius: 12px;
    cursor: pointer;
}
</style>