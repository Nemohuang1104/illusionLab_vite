<template>
    <div class="template">
        <div class="top">
            <MS_com_title 
            mainTitle="門票購入" 
            subTitle="Reservation"
            intro="
            入場價格為新台幣2,200元 / 人 (已含10%服務費)。<br>
            若日期無法選擇，代表該場次已滿，或是當日不開放。
            "/>
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
        <MS_com_buttons mode="two" />
    </div>
</template>

<script setup>
    import MS_com_title from '@/components/MS/MS_com_title.vue';
    import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
</script>

<style lang="scss" scoped> 
    .options{
        text-align: center;
    }
</style>