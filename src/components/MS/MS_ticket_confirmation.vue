<template>
    <div class="template">
        <div class="top">
            <div class="titles">
                <h1 class="title">會員資料</h1>
                <h4 class="subTitle">Customer Info</h4>
            </div>
        </div>
        <main>
            <div class="confirmTitle">
                <h3>確認你的資料。</h3>
                <h4>如你在選擇時間時安排有誤，還請自行承擔負責。</h4>
            </div>
            <div class="eventInfo">
                <h4>兩人票</h4>
                <h4>日期：{{$date}}</h4>
                <h4>時段：{{$time}}</h4>
                <h4>張數：{{$nummber}}</h4>
            </div>
            <div class="memberInfo">
                <h5>姓名：{{$name}}</h5>
                <h5>電話：{{$phone}}</h5>
                <h5>姓名：{{$email}}</h5>
                <h5>統一編號：{{$uni}}</h5>
            </div>
        </main>
    </div>
    <MS_com_buttons/>
</template>

<script setup>
    import MS_com_buttons from '@/components/MS/MS_com_buttons.vue';
</script>

<style lang="scss" scoped>

</style>