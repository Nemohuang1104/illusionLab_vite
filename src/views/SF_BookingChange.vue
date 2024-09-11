<script setup>
    import StrellarFrontierTitle from '@/components/SFTitle.vue';
    import SFHeader_0 from '@/components/SFHeader_0.vue';
    import { ref } from 'vue' ;
    const currentMode = ref('three');
    import Footer_2 from '@/components/Footer_2.vue';
</script>



<template>
    <SFHeader_0 :mode="currentMode"></SFHeader_0>

    <div class="wrapper">
        <div class="bookingChange">
            <div class="Title">
                <StrellarFrontierTitle h1="退換票政策" p="CHANGING YOUR BOOKING"></StrellarFrontierTitle>
            </div>
        </div>
        <hr>
        <div class="directions">
            <div class="method">
                <span class="info">票券若需更改體驗日期、取消退費，請提供相應的資料，來信《幻浸實驗室》客服信箱<br></span>
                <span class="mail">illusionlab@gmail.com</span>
            </div>
            <div class="rules">
                <span class="rulesTitle">‧  退票規則:<br></span>
                <span class="content">購票後，若因個人原因無法參加活動，可在活動開始前15天內申請退票，我們將退還票款的 95% 作為退款。活動開始前7天內申請退票，將退還票款的70%。</span>
            </div>
            <div class="rules">
                <span class="rulesTitle">‧  換票規則:<br></span>
                <span class="content">活動開始前5內，所有票款恕不退款，敬請理解。
                如因特殊原因需更改參加日期，您可在活動開始前10天內聯繫我們申請更改。我們將根據剩餘名額和條件協助更改，但不保證所有申請均能成功處理。
                每張票僅可更改一次日期，且需支付60元的手續費。</span>
            </div>
            <div class="rules">
                <span class="rulesTitle">‧  特別條款:<br></span>
                <span class="content">若活動因不可抗力（如天災、政府禁令等）被取消，我們將提供全額退款或協助安排改期，無需支付任何手續費。</span>
            </div>
            <div class="text">
                <span>‧  申請退票或換票時，請聯繫我們的客服團隊並提供您的訂單號、姓名和聯絡方式。<br></span>
                <span>‧  我們將在 3個工作日內處理您的申請，並在核准後 5個工作日內完成退款或換票操作。</span>
            </div>
        </div>
        <Footer_2></Footer_2>
    </div>
    
</template>



<style lang="scss" scoped>
  @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap');
   * {
    font-family: "Noto Serif TC";
    }
     .wrapper{
        background:linear-gradient(rgba(5, 5, 5, 0.847), rgba(164, 164, 164, 0)) ,
    url(../assets/images/STBackground.png);
    }

    .bookingChange{
        padding-top: 120px;
    }

    .Title{
        text-align: center;
    }
    hr{
        width: 130px;
        margin-top: 20px;
    }
    //下方規則區塊
    .directions{
        margin:5%;
    }
    span{
        color: white;
        line-height: 1.6;
    }
    .method{
        margin-bottom: 50px;
    }
    .method span{
        font-size: 20px;
        display: block;
        text-align: center;
    }
    .mail{
        font-weight: bold;
    }
    .rules{
        margin-top: 3%;
    }
    .rulesTitle{
        font-size: 20px;
    }
    .text{
        margin-top: 5%;
    }
    .text span{
        font-weight: bold;
        display: block;
        margin-top: 2%;
    }

    @media screen and (max-width: 430px){
        .rules{
            margin: 40px auto;
        }

        .text{
            margin: 50px auto;
        }
    }
</style>