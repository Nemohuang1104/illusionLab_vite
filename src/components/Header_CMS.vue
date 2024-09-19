<template>
    <div class="header1">
        <div class="logo">
            <RouterLink to="/Home">
                <img src="../assets/images/illusionLab_logo.png" alt="">
            </RouterLink>
            
        </div>
        <div class="title">幻浸實驗室後台管理</div>
        <div class="icons">
            <RouterLink to="/logincms" >
                <button>帳號登出</button>
                
            </RouterLink>
        </div>
        <img src="../assets/images/solar_logout-outline.svg" alt="">
        
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.header1{
    display: grid;
    grid-template-columns: 0.5fr 3.5fr 0.4fr 0.4fr;
    justify-content: left;
    align-items: center;
    width: 100%;
    
    // height: 80px;
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
    margin-left: 20px;
}

.icons{
    justify-self: flex-start;
}

.icons button{
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #505050;
    width: 100px;
    height: 29.48px;
    line-height: 29.48px;
    border: none;
    background: var(--Color-2, #FFEDBC);
    border-radius: 6px;
    cursor: pointer;
}
</style>