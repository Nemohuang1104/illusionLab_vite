<script setup>

</script>

<template>

    <!-- 幻境LOGO -->
    <div class="outline">
        <div class="content">
            <img src="../assets/images/illusionLab_logo.png" alt="">
            <div class="items">
                <span>隱私權政策</span>
                <span>最新消息</span>
                <span>製作團隊</span>
                <span>使用辦法</span>
            </div>
            <p>本網站為緯育TibaMe【第93期】前端工程師專業技術養成班學員作品，僅供學習、展示之用途。</p>
            <p>Copyright &copy; 2024 幻浸實驗室</p>

        </div>
    </div>

    
</template>



<style lang="scss" scoped>
// 幻境LOGO
.outline{
    width: 100%;
    max-width: 1440px;
    height: 200px;
    background: var(--header-footer, #000354);
    display: flex;
    justify-content: center;
}

.content{
    display: flex;
    flex-direction: column;
    align-items: center;
}

.content img{
    margin-top: 12px;
    margin-bottom: 12px;
}

.items span{
    font-size: 20px;
    line-height: 1.6rem;
    flex-basis: 0%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    border-right: 1px solid #FFF;
    padding: 0 4px;
    cursor: pointer;
    
}

.items span:last-child{
    border-right: none;
}


.content p{
    font-size: 10px;
    line-height: 1.6rem;
    flex-basis: 0%;
    color: #FFF;
    font-family: "Noto Sans TC";
}

</style>