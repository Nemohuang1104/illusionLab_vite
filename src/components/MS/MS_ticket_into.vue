<template>
    <div class="template">
        <div class="top">
            <MS_com_title 
            mode="three"
            mainTitle="訂購流程" 
            subTitle="ORDERING PROCESS"
            intro="
            活動時長：120分鐘。<br>
            活動價格：每人新台幣2,200元。<br>
            活動地點：臺北市中山區南京東路三段219號（南京復興捷運8號出口）。
            "/>
        </div>
        <main>
            <article>
                <MS_com_title 
                mode="three"
                introTitle="Step 1. 選擇活動人數"
                intro="
                <br>
                參與活動將獲得神秘禮品，同行夥伴越多好禮越多！<br>
                心靈光譜最多允許六人同行，若是您有更多人數需求請聯絡我們。
                "/>
                <div class="ticketIntros">
                    <MS_com_ticket_intro 
                    participantNumber="獨自一人"
                    gift="
                    特調飲品(小)*1<br>
                    神秘禮品(小)*1<br>
                    特製甜點禮盒(小)*1
                    "/>
                    <MS_com_ticket_intro 
                    participantNumber="兩人以上"
                    gift="
                    特調飲品(中)*2<br>
                    神秘禮品(中)*2<br>
                    特製甜點禮盒(小)*2
                    "/>
                    <MS_com_ticket_intro 
                    participantNumber="四人以上"
                    gift="
                    特調飲品(中)*4<br>
                    神秘禮品(中)*4<br>
                    特製甜點禮盒(中)*4
                    "/>
                    <MS_com_ticket_intro 
                    participantNumber="六人同行"
                    gift="
                    特調飲品(大)*6<br>
                    神秘禮品(大)*6<br>
                    特製甜點禮盒(大)*6
                    "/>
                </div>
                <h4>※以上為離場時贈送的周邊好禮，入場時仍有餐點供享用。</h4>
            </article>
            <article>
                <MS_com_title 
                mode="three"
                introTitle="Step 2. 挑選您喜歡的活動場次"
                intro="
                <br>
                根據您的安排選擇想參與的場次時間。<br>
                若您有更改場次的需求請在活動五日前告知，心靈光譜將協助您更改活動場次。
                "/>
            </article>
            <article>
                <MS_com_title 
                mode="three"
                introTitle="Step 3. 客製化您的票券"
                intro="
                <br>
                您可以在訂單完成後依照喜好客製您的票券。<br>
                活動當天請至報到處領取票券後入場，本活動驗證僅憑票券請妥善保管。
                "/>
            </article>
        </main>
        <MS_com_buttons mode="one1" step="three"/>
    </div>
</template>

<script setup>
    import MS_com_title from '@/components/MS/MS_com_title.vue';
    import MS_com_ticket_intro from '@/components/MS/MS_com_ticket_intro.vue';
    import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
</script>

<style lang="scss" scoped>
  @import "../../assets/SASS/component/ms";

    .ticketIntros{
        margin: 50px 0;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        align-self: stretch;
        gap: 10px;
    }
    article{
        display: flex;
        padding: 30px 40px;
        flex-direction: column;
        align-self: stretch;
        border-radius: 12px;
        background: rgba(184, 153, 119, 0.20);
    }
</style>