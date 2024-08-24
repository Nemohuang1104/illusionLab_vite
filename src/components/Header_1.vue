<template>
    <div class="header1">
        <div class="logo">
            <img src="../assets/images/illusionLab_logo.png" alt="">
        </div>
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
    justify-content: space-between;
    width: 100%;
    max-width: 1440px;
    height: 80px;
    background: linear-gradient(180deg, #15104A 26.17%, rgba(42, 36, 106, 0.00) 99.67%);
}
.logo img{
    height: 80px;
    flex-shrink: 0;
}
</style>