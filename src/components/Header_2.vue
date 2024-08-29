<template>
    <div class="header1">
        <div class="logo">
            <img src="../assets/images/StrellarFrontieLOGO.png" alt="">
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
.logo img{
    height: 60px;
    flex-shrink: 0;
    padding:10px 0px 0px 40px;
    
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