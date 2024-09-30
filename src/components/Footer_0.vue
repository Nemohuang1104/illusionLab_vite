<script setup>

function goToPage() {
    window.scrollTo({
        top: 0,  // 頁面的頂部
        behavior: 'auto'  // 平滑滾動
    });
} 
</script>

<template>

    <!-- 幻境LOGO -->
    <div class="outline">
        <div class="content">
            <router-link to="/Home">
                <img src="../assets/images/illusionLab_logo.png" alt="">
            </router-link>
            <div class="items">
                <router-link to="PP_privacy_policy">
                    <span>隱私權政策</span>
                </router-link>
                <router-link to="">
                    <span>製作團隊</span>
                </router-link>
                <router-link @click="goToPage" to="/News">
                    <span>最新消息</span>
                </router-link>
                <router-link to="PP_termOfUse">
                    <span>使用辦法</span>
                </router-link>
            </div>
            <p>本網站為緯育TibaMe【第93期】前端工程師專業技術養成班學員作品，僅供學習、展示之用途。</p>
            <p>Copyright &copy; 2024 幻浸實驗室 All rights reserved</p>

        </div>
    </div>


</template>



<style lang="scss" scoped>
// 幻境LOGO
.outline {
    // width: 100vw;
    width: 100%;
    // max-width: 1440px;
    //height: 200px; //高度無法寫死，會有空白留在下面
    background: var(--header-footer, #000354);
    display: flex;
    justify-content: center;
}

.content {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.content img {
    margin-top: 12px;
    margin-bottom: 12px;
}


.outline .content img {
    border-right: none;
    /* 確保 logo 不受此樣式影響 */
}



a {
    font-size: 20px;
    line-height: 1.6rem;
    flex-basis: 0%;
    color: var(--Color-6, #FFF);
    font-family: "Noto Sans TC";
    // border-right: 1px solid #FFF;
    padding: 0 4px;
    cursor: pointer;

}

.outline .content .items a {
    border-right: 1px solid #FFF;
}


.outline .content .items a:last-child {
    border-right: none;
}

.content p {
    font-size: 10px;
    line-height: 1.6rem;
    flex-basis: 0%;
    color: #FFF;
    font-family: "Noto Sans TC";

}

@media (max-width: 768px) {
    .content p {
        font-size: 8px;
    }
}
</style>