<script setup>
    import MS_com_title from '@/components/MS/MS_com_title.vue';
    import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
    import Footer_0 from '@/components/Footer_0.vue';
    import Header_2 from '@/components/Header_2.vue';
</script>

<template>
    <div class="template">
       
        <div class="top">
            <Header_2></Header_2>
            <div class="title">
                <h1>門票購入</h1>
                <h3>Reservation</h3>
            </div>
            <div class="intro">
                <h3><img src="../assets/images/bi_coin.svg" alt="">
                    入場價格為新台幣2,200元 / 人 (已含10%服務費)。</h3>
                <h3><img src="../assets/images/bi_coin.svg" alt="">
                    單一場次最高可容納30人，若有包場需求歡迎來信洽談  illusionlab@gmail.com。</h3>
                <h3><img src="../assets/images/bi_coin.svg" alt="">
                    若日期無法選擇，代表該場次已滿，或是當日不開放。</h3>
                <h3><img src="../assets/images/bi_coin.svg" alt="">
                    現場會提供酒精飲品，故不開放未滿18歲未成年參加，敬請見諒。</h3>
            
                
                
               
            </div>
            
        </div>
        <main>
            <form class="selections" action="" method="post">
                <div class="selection">
                    <h4>人數 Guests</h4>
                    <select class="options">
                        <option value="option1">1人</option>
                        <option value="option2">2人</option>
                        <option value="option3">3人</option>
                        <option value="option3">4人</option>
                        <option value="option3">5人</option>
                        <option value="option3">6人</option>
                    </select>
                </div>
                <div class="selection">
                    <h4>日期 Date</h4>
                    <input class="options" type="date"></input>
                </div>
                <div class="selection">
                    <h4>時間 Select Time</h4>
                    <select class="options">
                        <option value="time1">13:00 ~ 15:00</option>
                        <option value="time2">16:00 ~ 18:00</option>
                        <option value="time3">19:00 ~ 21:00</option>
                        <option value="time3">22:00 ~ 24:00</option>
                    </select>
                </div>
            </form>
        </main>
        <div class="buttons">
            <button v-if="showPrev" id="prevStep">← PREVIOUS STEP</button>
            <button v-if="showNext" id="nextStep">NEXT STEP →</button>
        </div>
        <Footer_0></Footer_0>
    </div>
</template>

<style lang="scss" scoped> 
    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

    @import "../assets/style";

    .template{
        background-image: url(../assets/images/poker_background.jpg);
    }

    .title{
        width: 100%;
        max-width: 1440px;
        margin: 0 auto;
        margin-bottom: 40px;
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
    }

    .intro{
        margin-bottom: 40px
    }

    .intro h3{
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
        padding-left: 12%;
        text-align: left;
        line-height: 32px;
        font-weight: bold;
        font-family: map-get($fontStyle, style_2);
        color: map-get($colorfont_0, white);
    }

    .intro img{
        vertical-align: text-top;
    }

    main{
        width: 100%;
        max-width: 500px;
        // padding-left: 4%;
        margin: 0 auto;
        text-align: center;
        font-family: Noto Serif TC;
    }

    .selections{
        font-family: map-get($fontStyle, style_2);
        font-weight: bold;
        color: map-get($colorfont_0, white);
    }

    .options{
        text-align: center;
    }

    // 輸入框調整樣式
    //人數輸入框==========
    


    // ============
    .options{
    /* border: 1px solid red; */
        width: 50%;
        height: 40px;
        background-color: rgba(255, 255, 0, 0);
        border: 1px solid #FFF;
        border-radius: 20px;
        padding: -1px 8px;
        font-size: 16px;
        color: #FFF;
        transition: border-color 0.3s ease-in-out;
        appearance: none; /* 隱藏默認的箭頭 */
        // background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="white" d="M7 10l5 5 5-5z"/></svg>');
        background-image: url(../assets/images/tdesign_time.svg);
        background-repeat: no-repeat;
        background-position: right 10px center;
    }

    .options:focus {
        border-color: #FCB600;
        box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
        /* 暈染效果 */
        outline: none;
        /* 移除默認的黑框 */
    }

    .selections > .selection:nth-child(1) .options{
        background-image: url(../assets/images/octicon_people-24.svg);
    }

    // .selections > .selection:nth-child(2) .options{
    //     background-image: url(../assets/images/uiw_date.svg);
    // }

    .options[type="date"] {
        position: relative;
        width: 50%;
        height: 40px;
        background-color: rgba(255, 255, 0, 0);
        border: 1px solid #FFF;
        border-radius: 20px;
        padding: -1px 18px;
        font-size: 16px;
        color: #FFF;
        appearance: none; /* 隱藏默認的箭頭 */
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;

        /* 添加自定義箭頭 */
        background-image: url(../assets/images/uiw_date.svg);
        background-repeat: no-repeat;
        background-position: right 10px center;
    }

    .options[type="date"]:focus {
        border-color: #FCB600;
        box-shadow: 0 0 8px rgba(179, 98, 67, 0.3);
        outline: none;
    }

    .options option {
    color: black; /* Option的文字顏色 */
    }



    .selection {
        margin-bottom: 20px;
    }

    .selection h4{
        margin-bottom: 12px;
    }


    //上一步下一步按鈕
    .buttons{
    width: 80vw;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    }
    #prevStep{
        margin-right: auto;
    }
    #nextStep{
        margin-left: auto;
    }
    #prevStep, #nextStep {
        width: auto;
        display: block;
        font-size: 24px;
        font-weight: bold;
        background-color: transparent;
        border: none;
        color: #FB9D3C;
        cursor: pointer;
    }

    #prevStep:hover, #nextStep:hover  {
        color: #855F49;
    }

    
</style>
