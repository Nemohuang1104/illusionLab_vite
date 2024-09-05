<script setup>

</script>


<template>

          <div class="wrapper">
            <div class="title">
              <h1>票務規則</h1>
              <h3>Q & A</h3>
            </div>
            <section class="info">
                <div class="img_offset">
                    <div class="step">
                        <img src="../assets/images/ticket1.svg" alt="">
                        <p>線上完成預約付款。</p>
                    </div>
                    <img src="../assets/images/arrow.svg" alt="">
                    <div class="step">
                        <img src="../assets/images/ticket2.svg" alt="">
                        <p>收到訂單明確認信後，
                        <br>客製自己的專屬票卷。</p>
                    </div>
                    <img src="../assets/images/arrow.svg" alt="">
                    <div class="step">
                        <img src="../assets/images/ticket3-1 1.svg" alt="">
                        <p>現場兌換實體票後，
                        <br>即可憑票入場。</p>
                    </div>
                   

                </div>
                <div class="text_offset">
                    <p>1. 直購形式票券，購票即劃位，可選區段依照劃位網站為主。</p>
                    <p>2. 完成劃位後，將收到訂位確認信。（系統將自動寄出訂位時所填寫之 E-mail，請確保 E-mail 填寫正確及可收發信  
                    件，以免錯過重要訊息。）</p>
                    <p>3. 訂位確認信會附上客製票卷連結，請在活動日前兩天完成票卷設計，否則會以預設的樣式呈現。</p>
                    <p>4. 票券購買前請詳閱更改、退費事項。</p>
                    <p>5. 為確保訂位成功，若無收到訂位確認信，請務必來信客服查詢。</p>
                    <p>6. 本活動現場提供酒精飲料，18歲以下未滿請勿參加，如場時需檢查身分證，若未滿18歲不予入場，以恕不退費，敬請見諒。</p>


                </div>
                
            </section>

          </div>
     
    
  </template>
  
  
  
  <style scoped lang="scss">

    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

    @import "../assets/style";
    .template{
        background: #313131;
        // height: 180vh;
    }



    .top_img{
      width: 100%;
      display: flex;
      justify-content: center;
      margin-bottom: 4%;
      
    }

    .step{
        width: 80%;
        height: 80%;
    }

    .step img{
        width: 100%;
    }

   

    .step p{
        text-align: center;
        color: map-get($colorfont_0, white);
        font-weight: bold;
        font-family: map-get($fontStyle, style_2);
        line-height: 20px;
        font-size: 16px;
    }


    .text_offset p{
        text-align: left;
        color: map-get($colorfont_0, white);
        font-weight: 500;
        font-family: map-get($fontStyle, style_2);
        line-height: 20px;
        font-size: 16px;
        margin-bottom: 2%;
    }

    .title{
        margin: 0 auto;
        width: 32%;
        margin-bottom: 32px;
        border-bottom: 1px solid #eae6eb;
    }

    .title h1{
        width: 100%;
        text-align: center;
        font-size: map-get($fontSize, h1);
        font-weight: bold;
        font-family: map-get($fontStyle, style_2);
        color: map-get($color_0, btn_orange);
    }
    .title h3{
        width: 100%;
        text-align: center;
        font-size: map-get($fontSize, h3);
        font-weight: bold;
        font-family: map-get($fontStyle, style_2);
        color: map-get($color_0, btn_orange);
        margin-bottom: 40px;
    }

    .img_offset{
        margin: 0 auto;
        width: 80%;
        display: flex;
        justify-content: center;
        margin-bottom: 60px;
    }

    .question {
        // padding: 1rem 1.5rem;
        // border: 2px solid hsl(209, 34%, 30%); /* --clr-grey-3 */
        margin-bottom: 1rem;
        border-radius: 0.25rem; /* --radius */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* --light-shadow */
        background-color: var(--clr-white);
        font-family: map-get($fontStyle, style_2);
        border-radius: 24px;
        font-weight: bold;
        background: #1E1E2F;
    }

    .question:last-child {
        // padding: 1rem 1.5rem;
        // border: 2px solid hsl(209, 34%, 30%); /* --clr-grey-3 */
        margin-bottom: 100px;

    }

    .question h4 {
        color: map-get($colorfont_0, white);
        text-transform: none;
        line-height: 1.5;
        cursor: pointer;
    }

    .question p {
        color: hsl(210, 22%, 49%); /* --clr-grey-5 */
        // margin-top: 0.5rem;
        margin-left: 0;
        margin-right: 0;
        width: 98%;
        background: map-get($colorfont_0, white);
        // padding: 1rem 0 1rem 1.5rem ;
        padding: 2% 0;
        padding-left: 2%;
        border-radius:  0 0 20px 20px;
        
       
    }

    .question header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        // background: #1E1E2F;
        padding: 8px 20px;
        // border-radius: 20px 20px ;

    }

    .btn {
        background: transparent;
        border-color: transparent;
        width: 2rem;
        height: 2rem;
        background: #eae6eb; /* --clr-grey-special */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #b4345c; /* --clr-red-special */
        cursor: pointer;
        margin-left: 1rem;
        align-self: center;
        min-width: 2rem;
        z-index: 1;
    }

    .content {
        max-height: 0;
        transition: max-height 0.2s ease-out;
        width: 100%;
    }

    .info {
        margin: 0 auto;
        width: 70%;
        z-index: -1;
        opacity: 1;
        transition: opacity 0.2s ease-out;
        
    }

    .tab{
    display: flex;
    gap: 8px;
    justify-content: center;
    margin-bottom: 2%;
    }

    
</style>
  
  
  