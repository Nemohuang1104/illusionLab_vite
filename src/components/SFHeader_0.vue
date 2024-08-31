<template>
    <div class="header1">
        <div class="logo">
            <img src="../assets//images/logo_lifecasino.svg" alt="" class="LS">
            <img src="../assets/images/logo_StrellarFrontierIntro.svg" alt="" class="SF">
            <img src="../assets//images/LoveLogo.png" alt="" class="LI">
        </div>
        <div class="icons">
            <font-awesome-icon icon="fa-solid fa-cart-shopping" class="shoppingicon"/>
            <font-awesome-icon icon="fa-regular fa-face-meh"  class="peopleicon"/>          
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
    background: linear-gradient(360deg, #000 26%, #505050 100%);
    // flex-shrink: 0;
}

.logo{
    // border: 1px solid red;
    width: 70%;
    line-height: 80px;
    display: flex;
    justify-content:flex-end;
    align-items: center;
    padding:10px 20px;

}
.logo img{
    // height: 60px;
    flex-shrink: 0;
    padding:10px 20px;
}

.logo .LS {
    width: 125px;
    flex-shrink: 0;
    // height: 45px;
}

.logo .SF {
    width: 140px;
    flex-shrink: 0;
    // height: 50px;
}

.logo .LI {
    width: 170px;
    flex-shrink: 0;
    
}


//右側ICON
.icons{
    // border: 1px solid red;
    margin: 10px;
    padding: 15px 10px 15px 10px;
    display: flex;
    justify-content: center;
    align-items: center;
   
    padding:10px 20px;
}
.shoppingicon{
    width: 35px;
    height: 25px;
    color: #D9D9D9;
    margin-right: 20px;
}

.peopleicon{
    width: 35px;
    height: 25px;
    color: #D9D9D9;
}
</style>