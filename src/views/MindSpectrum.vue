<template>
    <!-- <div><MS_main/></div> -->
    <!-- <div><MS_termOfUse/></div> -->
    <!-- <div><MS_privacy_policy/></div> -->
    
    <div><MS_ticket_into/></div>
    <div><MS_ticket_customer_info/></div>
    <div><MS_ticket_reservation/></div>

    <!-- <div><MS_com_marquee/></div> -->
    <!-- <div><MS_com_caro/></div> -->
</template>

<script setup>
    import MS_main from '@/components/MS/MS_main.vue';
    import MS_ticket_into from '@/components/MS/MS_ticket_into.vue';
    import MS_ticket_reservation from '@/components/MS/MS_ticket_reservation.vue';
    import MS_ticket_customer_info from '@/components/MS/MS_ticket_customer_info.vue';
    import MS_ticket_confirmation from '@/components/MS/MS_ticket_confirmation.vue';
    import MS_com_marquee from '@/components/MS/MS_com_marquee.vue';
    import MS_com_caro from '@/components/MS/MS_com_caro.vue';
    import MS_termOfUse from '@/components/MS/MS_termOfUse.vue';
    import MS_privacy_policy from '@/components/MS/MS_privacy_policy.vue';

</script>

<style lang="scss">
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
    .noto-sans-tc-regular {
    font-family: "Noto Sans TC", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }
    h1{font-size: 30px;}
    h2{font-size: 28px;}
    h3{font-size: 18px;}
    h4{font-size: 16px;}
    h5{font-size: 14px;}
    h6{font-size: 16px;}
     p{font-size: 14px;}

    a{
        text-decoration: none;
    }

    h1,h2,h3,h4,h5,h6,p{
        font-family:'Noto Sans TC';
        color: #855F49;
        font-weight: bold;
        text-align: center;
        line-height: 150%;
    }

    .template{
        background-image: url(../ms/ms_bgi.jpg);
        display: flex;
        padding: 150px 200px;
        flex-direction: column;
        align-items: center;
        gap: 100px;
    }

    .top{
        display: flex;
        flex-direction: column;
        gap: 50px;

    }
    main{
        display: flex;
        flex-direction: column;
        gap: 60px;
    }
    .options{
        box-sizing: border-box;
        margin: 0 auto;
        width: 40vw;
        display: flex;
        padding:15px 20px  ;
        background: transparent;
        justify-content: flex-end;
        align-items: center;
        border-radius: 40px;
        border: 2px solid #855F49;
    }
    .selection{
        width: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .selections{
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }
</style>