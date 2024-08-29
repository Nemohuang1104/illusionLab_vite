<template>
    <div class="template">
        <div class="top">
            <MS_com_title
            mainTitle="會員資料" 
            subTitle="Customer Info"
            intro="
            入場價格為新台幣2,200元 / 人 (已含10%服務費)。<br>
            若日期無法選擇，代表該場次已滿，或是當日不開放。
            "/>
        </div>
        <main>
            <form class="selections" action="" method="post">
                <div class="selection">
                    <h4>* 姓名 Name</h4>
                    <input class="options" type="text"></input>
                </div>
                <div class="selection">
                    <h4>* 電話 Phone Number</h4>
                    <input class="options" type="number"></input>
                </div>
                <div class="selection">
                    <h4>* 電子信箱 Email（預約登記使用，請確保填寫正確。）</h4>
                    <input class="options" type="email"></input>
                </div>
                <div class="selection">
                    <h4>統一編號 Company Tax ID（無開立統編發票不須填寫）</h4>
                    <input class="options" type="email"></input>
                </div>
                <div class="selection">
                    <h4>公司抬頭 Company Name（無開立統編發票不須填寫）</h4>
                    <input class="options" type="email"></input>
                </div>
                <div class="selection">
                    <h4>其他備註 Other Comments</h4>
                    <input class="options" type="textarea"></input>
                </div>
                <div class="check">
                    <input type="radio" value="readed1">
                    <span class="custom-radio-mark"></span>
                    <h4>我已詳閱並遵守隱私條款。</h4>
                </div>
                <div class="check">
                    <input type="radio"  value="readed2">
                    <span class="custom-radio-mark"></span>
                    <h4>我已詳讀並遵守退換票政策心靈光譜退換票政策係依行政院文化部之定型化契約。</h4>
                </div>
            </form>
        </main>
        <MS_com_buttons/>
    </div>
</template>

<script setup>
    import MS_com_title from '@/components/MS/MS_com_title.vue';
    import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
</script>

<style lang="scss" scoped>  
    .check{
        display: flex;
        flex-direction: row;
    }

    .selections{
        display: flex;
        flex-direction: column;
        gap: 60px;
    }
</style>