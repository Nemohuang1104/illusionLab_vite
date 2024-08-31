<script setup>
// 等待8秒後觸發UFO縮小並跳轉到另一頁
setTimeout(() => {
    document.getElementById("ufo").style.animation = "ufoGlitch 2s forwards"; // 觸發縮小動畫
    setTimeout(() => {
        window.location.href = "next_page.html"; // 替換成你的跳轉頁面
    }, 2000); // 延遲2秒以便播放完整動畫
}, 8000);

</script>

<template>
    <div class="color">
        <div id="ufo" class="ufo">幽浮上的故障字體特效</div>
    </div>
</template>



<style lang="scss" scoped>
.color{
    background-color: black;
    color: #ffffff;
}
.ufo {
    width: 100px;
    height: 100px;
    background: url('../assets/img/UFO.png') no-repeat center center;
    background-size: cover;
    animation: ufoGlitch 8s linear;
    position: relative;
}

@keyframes ufoGlitch {
    0% {
        transform: scale(1);
    }

    90% {
        transform: scale(1);
    }

    /* 保持大小直到動畫結束前 */
    100% {
        transform: scale(0);
    }

    /* 最後一瞬間縮小 */
}

@keyframes glitchEffect {

    /* 可以放一些簡單的字體故障效果，例如： */
    0% {
        transform: translate(0, 0);
    }

    50% {
        transform: translate(-5px, -5px);
    }

    100% {
        transform: translate(5px, 5px);
    }
}
</style>
