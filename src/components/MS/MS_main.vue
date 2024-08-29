<template>
    <div class="page-container">
        <div class="section fp-auto-height" id="section1">
            <div class="section-content">
                <section id="landingSection">
                    <img id="land" src="../ms/green_bg.png" alt="">
                    <img id="tree4" src="../ms/tree4.png" alt="">
                    <img id="tree3" src="../ms/tree3.png" alt="">
                    <img id="tree2" src="../ms/tree2.png" alt="">
                    <img id="tree1" src="../ms/tree1.png" alt="">
                    <img id="cloud1" src="../ms/cloud.png" alt="">
                    <img id="cloud2" src="../ms/cloud.png" alt="">
                    <img id="cloud3" src="../ms/cloud.png" alt="">
                    <img id="smallTree1" src="../ms/smallTree1.png" alt="">
                    <img id="smallTree2" src="../ms/smallTree2.png" alt="">
                </section>
            </div>
        </div>
        <div class="blank"></div>
        <div class="blank"></div>
        <div class="section" id="section2">
            <div class="section-content">
                <section id="firstSection">
                    <img id="road" src="../ms/road_image.png" alt="">
                    <img id="bookImg" src="../ms/IMG_0141.png" alt="">
                    <img id="girls" src="../ms/intro_1_girls.png" alt="">
                    <img id="text" src="../ms/text.png" alt="">
                </section>
            </div>
        </div>
        <div class="blank"></div>
        <div class="section" id="section3">
            <div class="section-content">
                <section id="secSection">
                <img id="bear" src="../ms/bear.png" alt="">
                <img id="text2" src="../ms/text2.png" alt="">
            </section>
            </div>
        </div>
        <div class="blank"></div>
        <div class="section" id="section4">
            <div class="section-content">
                <section id="thirdSection">
                    <img id="text3" src="../ms/text3.png" alt="">
                    <img id="rihno" src="../ms/rihno.png" alt="">
                </section>
            </div>
        </div>
        <div class="blank"></div>
        <div class="section" id="section5">
            <div class="section-content">
                <section id="fourSection">
                    <img id="text4" src="../ms/text4.png" alt="">
                    <img id="myGirl" src="../ms/myGirl.png" alt="">
                </section>
            </div>
        </div>
        <img id="bgi2" src="../ms/ms_bgi2.png" alt="">
        <div class="blank"></div>
        <div class="blank"></div>
        <div class="section" id="section6">
            <section id="fiveSection">
                <MS_com_title 
                mainTitle="關於活動" 
                subTitle="ABOUT"
                />
                <div class="specials">
                    <div class="special">
                        <div class="spBorder">
                            <img class="sp" src="../ms/sp1.png" alt="">
                        </div>
                       <h3>融合了光影與創意的尖端科技，模擬出栩栩如生的三維影像。</h3> 
                    </div>
                    <div class="special">
                        <div class="spBorder">
                            <img class="sp" src="../ms/sp2.png" alt="">
                        </div>
                       <h3>知名作家DoMeDo合作繪本。</h3> 
                    </div>
                    <div class="special">
                        <div class="spBorder">
                            <img class="sp" src="../ms/sp3.png" alt="">
                        </div>
                       <h3>Lazy dessert聯名合作，在體驗期間品嘗六樣甜點。</h3> 
                    </div>
                    <div class="special">
                        <div class="spBorder">
                            <img class="sp" src="../ms/sp4.png" alt="">
                        </div>
                       <h3>60分鐘療癒之旅。</h3> 
                    </div>
                </div>
            </section>
        </div>
        <div class="section" id="section7">
            <section id="fiveSection">
                <MS_com_title 
                mainTitle="故事介紹" 
                subTitle="STORYS"
                />
                <div class="books">
                    <MS_com_caro :items="carouselItems" :active="initialActiveIndex" />
                </div>
                <img id="foxChan" src="../ms/whatDoesTheFoxSay.png" alt="">
            </section>
        </div>
        <img id="bgi2" src="../ms/ms_bgi3.png" alt="">
        <div class="blank"></div>
        <div class="section" id="section8">
            <section id="sixSection">
                <MS_com_title 
                mainTitle="周邊商品" 
                subTitle="PERIPHERAL GOODS"
                />
                <MS_com_marquee/>
            </section>
        </div>

    </div>


    <div id="wrapper">


        <div class="blank2"></div>
        <div class="blank2"></div>

        <div class="blank"></div>

        <div class="blank2"></div>

        <div class="blank2"></div>

        <section id="fiveSection">
        </section>
    </div>
</template>
  
<script setup>
    import MS_com_caro      from '@/components/MS/MS_com_caro.vue';
    import MS_com_title     from '@/components/MS/MS_com_title.vue';
    import MS_com_marquee   from '@/components/MS/MS_com_marquee.vue';
    import { onMounted }    from 'vue';

    onMounted(() => {
    const script = document.createElement('script');
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.js';
    script.onload = () => {
        new fullpage('.page-container', {
        navigation: false,
        scrollOverflow: true,
        });
    };
    document.head.appendChild(script);
    });
</script>

<style lang="scss" scoped>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.css);
    section {
    position: relative;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 20px;
}
#landingSection {
    justify-content: flex-start;




}
    #landingSection{
        background-image: url(../ms/sky.png);
    }

    #foxChan{
        position: absolute;
        width: 30vw;
        bottom: -10%;
        left: -5%;
    }
    .books{
        height: 300px;
        position: relative;
    }
    .sp{
        width: 10vw;
    }

    .spBorder{
        width: 10vw;
        display: flex;
        padding: 40px;
        justify-content: center;
        align-items: center;
        border-radius: 200px;
        background: #AD8662;
        box-shadow: 8px 8px 4px 0px rgba(0, 0, 0, 0.50);
    }
    .speical{
        width: 10vw;
    }
    .specials{
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 100px;
        margin: 0 auto;
    }
    
    .titles{
    display: flex;
    flex-direction: column;
    text-align: center;
    }


    .section {
    background-size: cover;
    background-position: center;
    }

    .section-content {
    text-align: center;
    font-size: 3em;
    color: #fff;
    }

    #bgi2{
        position: absolute;
        width: 100vw;
    }
    #cloud1{
        position: absolute;
        width: 20vw;
        left: 10%;
    }
    #cloud2{
        position: absolute;
        width: 15vw;
        top: 25%;
        left: 35%;
    }
    #cloud3{
        position: absolute;
        width: 20vw;
        right: 10%;
    }
    #smallTree1{
        position: absolute;
        width: 20vw;
        top: 70%;
        right: 25%;
    }    
    #smallTree2{
        position: absolute;
        width: 20vw;
        top: 50%;
        left: 25%;
    }

    #land{
        position: absolute;
        width: 100vw;
        left: 0;
    }
    #tree1{
        width: 30vw;
        position: absolute;
        left: 2%;
        top: 30%;
    }
    #tree2{
        width: 25vw;
        position: absolute;
        top: 25%;
        left: -5%;
    }
    #tree3{
        position: absolute;
        width: 35vw;
        top: 35%;
        right: -8%;
    }
    #tree4{
        position: absolute;
        width: 25vw;
        top: 35%;
        right: 10%;
    }
    .blank{
        height: 30vh;
    }
    .blank2{
        height: 20vh;
    }
    template{
        padding: 0;
        width: 100vw;
        overflow-x: hidden;
        
    }
    .page-container{
        background-image: url(../ms/ms_bgi.jpg);
        line-height: 150%;
    }

    #bookImg{
        width: 30vw;
        position: absolute;
        top:10%;
        right: 15%;
    }
    #girls{
        width: 30vw;
        position: absolute;
        top:30%;
        left: 15%;
    }
    #road{
        width: 80vw;
        position: absolute;
        top:45%;
        left: -5%;
    }

    #bear{
        width: 25vw;
        position: absolute;
        top: 25%;
        right: 10%;

    }

    #rihno{
        width: 70vw;
        position: absolute;
        top: 15%;
        left: 0;
    }

    #myGirl{
        width: 30vw;
        position: absolute;
        top:20% ;
        right: 15% ;
    }
    #text{
        width: 30vw;
        position: absolute;
        top:65% ;
        right: 15% ;
    }
    #text2{
        width: 30vw;
        position: absolute;
        top:48% ;
        left: 15% ;
    }
    #text3{
        width: 30vw;
        position: absolute;
        top:35% ;
        right: 15% ;
    }
    #text4{
        width: 30vw;
        position: absolute;
        top:40% ;
        left: 15% ;
    }

</style>
  