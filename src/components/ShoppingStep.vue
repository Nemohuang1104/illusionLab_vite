<script setup>
const props = defineProps({

   
    styles: {
        type: Object,
        required: true
    },

   
});


</script>
<template>
    <div class="step">
        <div class="step_item">
            <div class="number" :style="{ background: styles[1].background, color: styles[1].fontcolor }">1</div>
            <p >商品確認</p>

        </div>
        <div class="line"></div>
        <div class="step_item">
            <div class="number" :style="{ background: styles[2].background, color: styles[2].fontcolor }">2</div>
            <p>付款資訊</p>

        </div>
        <div class="line"></div>
        <div class="step_item">
            <div class="number" :style="{ background: styles[3].background, color: styles[3].fontcolor }" >3</div>
            <p>訂單確認</p>
        </div>
    </div>
</template>



<style lang="scss" scoped>
header{
    position: unset
}
.step{
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.line{
    margin-top: 30.5px;
    width: 100px;
    height: 2.8px;
    background-color: #fff;

}

.step_item{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.step_item p{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    font-weight: 300;
    line-height: 1.6rem;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}



.number{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 2.8px solid var(--Color-6, #FFF);
    font-size: 32px;
    font-weight: 400;
    line-height: 1.6rem;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
}

@media screen and (max-width: 900px){
    .step{
    width: 70%;
    margin: 0 auto;
    }
}
</style>