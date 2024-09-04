<template>
    <div class="header1">
        <div class="logo">
           <img src="../assets/images/illusionLab_logo.png" alt="" @click="goToHome">
          
        </div>
        <div class="icons">
            <font-awesome-icon @click="goToShop" icon="fa-solid fa-cart-shopping" class="shoppingicon"/>
            <font-awesome-icon  @click="goToSignUp" icon="fa-regular fa-face-meh"   class="peopleicon" /> 
        </div>
        
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function goToSignUp(){
  router.push('/login');
}

function goToHome(){
  router.push('/home');
}

function goToShop(){
  router.push('/shop');
}
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
    cursor: pointer;
    
}

//右側ICON
.icons{
    display: flex;
    justify-content: center;
    align-items: center;
    padding:10px 20px;
    // border: 1px solid red;
}
.shoppingicon{
    width: 35px;
    height: 25px;
    color: #FFF;
    margin-right: 20px;
    cursor: pointer;

}

.peopleicon{
    width: 35px;
    height: 25px;
    color: #FFF;
    cursor: pointer;

}
</style>