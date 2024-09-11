<template>
    <div>
        <MS_Enter/>
    <!-- <Header mode="four"/> 
    <MS_main/> -->
    <!-- <section>
        <Footer/>
    </section> -->
    </div>
</template>

<script setup>
    import MS_main from '@/components/MS/MS_main.vue';
    import Header from '@/components/SFHeader_0.vue';
    // import Footer from '@/components/Footer_03.vue';
    import MS_Enter from '@/components/MS/MS_Enter.vue';

</script>

<style lang="scss" >
.header-four{
//     position: fixed;
//     z-index: 999;
    height: 65px !important;
} 


.logo > router-link:nth-child(1){
    order: 1 //人生賭場的順序
}

.logo > router-link:nth-child(2){
    order: 3 //星際邊際的順序
}

.logo > router-link:nth-child(3){
    order: 2 //心靈光譜的順序
}

// .logo > router-link:nth-child(1) > img{
//     width: 100px;
// }

// .logo > router-link:nth-child(2) > img{
//     width: 100px;
// }

// .logo > router-link:nth-child(3) > img{
//     width: 130px;

// }

</style>