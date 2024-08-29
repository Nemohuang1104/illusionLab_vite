<template>
    <div class="header1">
        <div class="logo">
            <img src="../assets/images/illusionLab_logo.png" alt="">
        </div>
        <div class="title">幻浸實驗室後台管理</div>
        <div class="icons">
            <font-awesome-icon icon="shopping-cart" />
            <font-awesome-icon icon="user" />
        </div>
        
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.header1{
    display: flex;
    justify-content: left;
    align-items: flex-end;
    width: 100%;
    max-width: 1440px;
    height: 80px;
    background: linear-gradient(180deg, #15104A 26.17%, rgba(42, 36, 106, 0.00) 99.67%);
}
.logo img{
    height: 80px;
    flex-shrink: 0;
}

.title{
    font-size: 24px;
    font-weight: 600;
    line-height: 28px;
    flex-basis: 30%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    margin-bottom: 20px;
    margin-left: 20px;
}
</style>