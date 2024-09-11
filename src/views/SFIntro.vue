<template>

    <div class="container">
        <div class="UFOimgout">
            <img class="UFOimg" src="../assets/images/UFO.png" alt="">
        </div>
        <div class="text line1" data-text="各位飛行者，請注意，即將進行倒數啟動。請確認安全帶已經繫好，並放鬆心情，準備迎接一段令人難忘的旅程">
            各位飛行者，請注意<br>即將進行倒數啟動<br>請確認安全帶已經繫好<br>並放鬆心情，準備迎接一段令人難忘的旅程
        </div>
    </div>
    <!-- <p class="line2">5... 4... 3... 2... 1...</p> -->
    <canvas id="myCanvas"></canvas>
</template>

<script setup>
//背景canvs
import { onMounted, onBeforeUnmount } from 'vue';
//myCanvas元素變亮 //ctx 2D 繪圖
let myCanvas, ctx;
//控制星星的移動方向和速度
let xMod = 0;
let yMod = 0;
let warpSpeed = 0;
//存儲所有星星對象的陣列
let starField = [];
//調整畫布尺寸
const resizeCanvas = () => {
    myCanvas.width = window.innerWidth;
    myCanvas.height = window.innerHeight;
};

const Star = function () {
    this.myX = Math.random() * window.innerWidth;
    this.myY = Math.random() * window.innerHeight;
    this.myColor = 0;
};

Star.prototype.updatePos = function () {
    let speedMult = 0.02;
    if (warpSpeed) speedMult = 0.028;
    this.myX += xMod + (this.myX - window.innerWidth / 2) * speedMult;
    this.myY += yMod + (this.myY - window.innerHeight / 2) * speedMult;
    this.updateColor();

    if (this.myX > window.innerWidth || this.myX < 0) {
        this.myX = Math.random() * window.innerWidth;
        this.myColor = 0;
    }
    if (this.myY > window.innerHeight || this.myY < 0) {
        this.myY = Math.random() * window.innerHeight;
        this.myColor = 0;
    }
};

Star.prototype.updateColor = function () {
    if (this.myColor < 255) {
        this.myColor += 5;
    } else {
        this.myColor = 255;
    }
};

const init = () => {
    myCanvas.focus();
    window.requestAnimationFrame(draw);
};

const draw = () => {
    if (warpSpeed === 0) {
        ctx.fillStyle = 'rgba(0,0,0,0.2)';
        ctx.fillRect(0, 0, window.innerWidth, window.innerHeight);
    }
    for (let i = 0; i < starField.length; i++) {
        ctx.fillStyle = `rgb(${starField[i].myColor},${starField[i].myColor},${starField[i].myColor})`;
        ctx.fillRect(starField[i].myX, starField[i].myY, starField[i].myColor / 128, starField[i].myColor / 128);
        starField[i].updatePos();
    }
    window.requestAnimationFrame(draw);
};

onMounted(() => {
    myCanvas = document.getElementById('myCanvas');
    ctx = myCanvas.getContext('2d');

    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    for (let i = 0; i < 200; i++) {
        starField.push(new Star());
    }

    document.onkeydown = (event) => {
        const code = event.code;
        switch (code) {
            case 'Space':
                warpSpeed = 1;
                break;
            case 'ArrowLeft':
                xMod < 6 ? (xMod += 0.3) : (xMod = 6);
                break;
            case 'ArrowUp':
                yMod < 6 ? (yMod += 0.3) : (yMod = 6);
                break;
            case 'ArrowRight':
                xMod > -6 ? (xMod -= 0.3) : (xMod = -6);
                break;
            case 'ArrowDown':
                yMod > -6 ? (yMod -= 0.3) : (yMod = -6);
                break;
        }
        event.preventDefault();
    };

    document.onkeyup = (event) => {
        const code = event.code;
        switch (code) {
            case 'Space':
                warpSpeed = 0;
                break;
            case 'ArrowLeft':
            case 'ArrowUp':
            case 'ArrowRight':
            case 'ArrowDown':
                xMod = 0;
                yMod = 0;
                break;
        }
        event.preventDefault();
    };

    document.onmousedown = () => (warpSpeed = 1);
    document.onmouseup = () => (warpSpeed = 0);
    document.addEventListener('touchstart', (event) => {
        event.preventDefault();
        warpSpeed = 1;
    });
    document.addEventListener('touchend', () => (warpSpeed = 0));

    init();
});

onBeforeUnmount(() => {
    window.removeEventListener('resize', resizeCanvas);
});


//前導頁導至主活動頁
// 設置定時器，XX秒後自動跳轉到主頁面
// setTimeout(function () {
//     document.body.style.transition = "opacity 1s";
//     document.body.style.opacity = "0";
//     // document.getElementById("ufo").style.animation = "tixtGlitch 2s forwards";
//     // document.getElementById("text").style.animation = "tixtGlitch 2s forwards"; 
//     setTimeout(function () {
//         window.location.href = "/SF_Homepage";// 放置主页面URL
//     }, 300); // 等待1秒淡出動畫结束
// }, 6400);// 1000毫秒 = 1秒

</script>

<style scoped>
/* 背景穿梭 */
@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

* {
    font-family: "Noto Serif TC";

}

.title {
    font-family: "Noto Serif TC";
    font-size: 24px;
    color: #eed6fe;
    position: absolute;
    top: 5px;
    left: 5px;

}

.desc {
    font-size: 0.75em;
}

#myCanvas {
    background-color: #000;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1000;
}


/* 幽浮上下浮動 */

.UFOimgout {
    width: 80%;
    display: block;
    justify-content: center;
    position: relative;

}

.UFOimg {
    max-width: 600px;
    width: 100%;
    /* width: 40%; */
    height: 25%;
    display: block;
    justify-content: center;
    margin-left: 35%;
    animation: balloon_1 3s infinite alternate;


}


@keyframes balloon_1 {
    0% {
        transform: translateY(20px);
    }

    50% {
        transform: translateY(50px);
    }

    100% {
        transform: translateY(20px);
    }
}

/* 文字印在圖上+故障文字 */

/* 文字及飛碟變小 */
.container {
    position: relative;
    display: inline-block;
    /* 可選：設置容器的寬度和高度，以便適應圖片大小 */
    max-width: 1440px;
    width: 100%;
    animation: ufoGlitch 6.75s linear;

}



.text {
    font-family: "Noto Serif SC";
    position: absolute;
    top: 65%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 20px;
    font-weight: bold;
    pointer-events: none;
    /* 可選：使文字無法被點擊 */
    line-height: 2.0;
    /* animation: ufoGlitch 8s linear; */
    text-align: center;


}

.text::before {
    content: attr(data-text);
    background: black;
    position: absolute;
    text-shadow: 2px 0 red;
    left: -2px;
    clip-path: inset(0 0 0 0);
    animation: ani2 1s infinite linear alternate-reverse;
}

.text::after {
    content: attr(data-text);
    background: black;
    position: absolute;
    text-shadow: -2px 0 blue;
    left: -2px;
    clip-path: inset(0 0 0 0);
    animation: ani1 1s infinite linear alternate-reverse;
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



@keyframes ani1 {
    0% {
        clip-path: inset(12px 0 92px 0);
    }

    5% {
        clip-path: inset(30px 0 37px 0);
    }

    10% {
        clip-path: inset(12px 0 4px 0);
    }

    15% {
        clip-path: inset(72px 0 20px 0);
    }

    20% {
        clip-path: inset(83px 0 11px 0);
    }

    25% {
        clip-path: inset(18px 0 67px 0);
    }

    30% {
        clip-path: inset(27px 0 43px 0);
    }

    35% {
        clip-path: inset(31px 0 81px 0);
    }

    40% {
        clip-path: inset(34px 0 5px 0);
    }

    45% {
        clip-path: inset(56px 0 49px 0);
    }

    50% {
        clip-path: inset(45px 0 1px 0);
    }

    55% {
        clip-path: inset(38px 0 49px 0);
    }

    60% {
        clip-path: inset(92px 0 50px 0);
    }

    65% {
        clip-path: inset(32px 0 34px 0);
    }

    70% {
        clip-path: inset(46px 0 100px 0);
    }

    75% {
        clip-path: inset(21px 0 10px 0);
    }

    80% {
        clip-path: inset(14px 0 56px 0);
    }

    85% {
        clip-path: inset(6px 0 82px 0);
    }

    90% {
        clip-path: inset(92px 0 4px 0);
    }

    95% {
        clip-path: inset(55px 0 22px 0);
    }

    100% {
        clip-path: inset(59px 0 42px 0);
    }
}

@keyframes ani2 {
    0% {
        clip-path: inset(20px 0 97px 0);
    }

    5% {
        clip-path: inset(49px 0 19px 0);
    }

    10% {
        clip-path: inset(55px 0 88px 0);
    }

    15% {
        clip-path: inset(22px 0 26px 0);
    }

    20% {
        clip-path: inset(39px 0 56px 0);
    }

    25% {
        clip-path: inset(90px 0 37px 0);
    }

    30% {
        clip-path: inset(99px 0 100px 0);
    }

    35% {
        clip-path: inset(19px 0 44px 0);
    }

    40% {
        clip-path: inset(46px 0 70px 0);
    }

    45% {
        clip-path: inset(37px 0 77px 0);
    }

    50% {
        clip-path: inset(57px 0 85px 0);
    }

    55% {
        clip-path: inset(40px 0 73px 0);
    }

    60% {
        clip-path: inset(37px 0 82px 0);
    }

    65% {
        clip-path: inset(1px 0 27px 0);
    }

    70% {
        clip-path: inset(30px 0 53px 0);
    }

    75% {
        clip-path: inset(87px 0 46px 0);
    }

    80% {
        clip-path: inset(38px 0 26px 0);
    }

    85% {
        clip-path: inset(87px 0 59px 0);
    }

    90% {
        clip-path: inset(43px 0 80px 0);
    }

    95% {
        clip-path: inset(64px 0 32px 0);
    }

    100% {
        clip-path: inset(77px 0 25px 0);
    }


}

@media(max-width: 820px) {
    .UFOimg {
        margin-left: 19vw;
        max-width: 550px;
        font-size: 16px;
    }

    .text {
        top: 60%;
    }
}


@media(max-width: 430px) {
    .UFOimg {
        font-size: 12px;
        margin-left: 15vw;
    }

    .text {
        top: 85%;
        width: 90%;
    }
}


@media(max-width: 390px) {
    .UFOimg {
    font-size: 12px;
    margin-left: 16vw;
    }
    .text{
        top: 110%;
        width: 90%;
}




}
</style>