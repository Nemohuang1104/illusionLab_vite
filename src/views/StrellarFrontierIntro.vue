<template>
    <div class="leading">
        <p class="leadingtext">各位飛行者，請注意，即將進行倒數啟動。請確認安全帶已經繫好，並放鬆心情，準備迎接一段令人難忘的旅程</p>
        <p class="leadingtext">5... 4... 3... 2... 1...</p>
    </div>
    <img class="UFOimg" src="../assets/images/UFO.png" alt="">
    <canvas id="myCanvas"></canvas>
</template>

<script setup>
import { onMounted, onBeforeUnmount } from 'vue';

let myCanvas, ctx;
let xMod = 0;
let yMod = 0;
let warpSpeed = 0;
let starField = [];

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
</script>

<style scoped>
/* 背景穿梭 */
@import url('https://fonts.googleapis.com/css?family=Audiowide');

.title {
    font-family: Audiowide;
    font-size: 24px;
    color: #eed6fe;
    position: absolute;
    top: 5px;
    left: 5px;
    z-index: 1000;
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



/* 打字機 */

.leading {
    padding-top: 40%;
}

@keyframes typing {
	from { width: 0 }
}

@keyframes caret {
	50% { border-right-color: transparent; }
}

.leadingtext {
    color: #fff;
	font: bold 20% Consolas, Monaco, monospace;
/* 	width: 8.25em; */
	width: 100ch;
	white-space: nowrap;
	overflow: hidden;
	border-right: .03em solid;
	animation: typing 6s steps(100) infinite,
	           caret 1s steps(1) infinite;
}



.UFOimg {
    width: 600px;
    height: 700px;
    ;
}
</style>