<template>
    <div class="top2">
        <img class="IntroText" src="../../assets/images/ms/MyPrince/IntroText.png" alt="">
    </div>
</template>

<script setup>
    document.addEventListener('DOMContentLoaded', function() {
        const IntroText = document.querySelector('.IntroText');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    IntroText.classList.add('visible');
                } else {
                    IntroText.classList.remove('visible');
                }
            });
        });

        observer.observe(IntroText);
    });
</script>

<style lang="scss" scoped>

    .top2{
        position: relative;
        width: 100%;
        height: 100vh;
    }
    
    .IntroText {
    position: absolute;
    width: 40vw;
    top: 45vh;
    left: calc( 50vw - 20vw);
    transition: opacity 1.5s ease-out, filter 1.5s ease-out;
    animation: blurIn 1.5s ease-out;
}

    .IntroText.visible {
    animation: blurIn 1.5s ease-out forwards;
}

    @keyframes blurIn {
    0% {
        filter: blur(10px); /* 初始狀態：模糊 */
        opacity: 0; /* 初始狀態：透明 */
    }
    100% {
        filter: blur(0px); /* 最終狀態：清晰 */
        opacity: 1; /* 最終狀態：完全不透明 */
    }
    }
</style>