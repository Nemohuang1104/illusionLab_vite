<template>
    <div class="holo" >
        <img class="swimmingpool" src="../../MS/superFuckingCuteDuck_DoMeDo/swimmingPool.png" alt="">
        <img class="duckLaiYi" :src="cuteDuckWalking" alt="">
        <img class="IWillFireYou" src="../../MS/superFuckingCuteDuck_DoMeDo/IWillFireYou.gif" alt="">
        <img class="yourDuckIsSoHot" src="../../MS/superFuckingCuteDuck_DoMeDo/yourDuckIsSoHot.gif" alt="">
        <h4 class="loadingText">LOADING</h4>
        <div class="loading">
        </div>
        <router-link to="/mindspectrum">
        <div class="letGetStarting" @click="goingToIndex"><h3>進入心靈光譜</h3></div>  
      </router-link> 
        <div class="ourSpecialToolWhichCanGiveThisFuckingDuckSomeColorSeeSee">
            <div class="ducktoolyoyo" @click="letsDancing">
                <img class="duckTool"  src='../../MS/superFuckingCuteDuck_DoMeDo/duckTool_LetsDance.png' alt="">
                <h3>舞</h3>
            </div>
            <div class="ducktoolyoyo" @click="letsWalking">
                <img class="duckTool"  src='../../MS/superFuckingCuteDuck_DoMeDo/duckTool_letMyDuckBack.png' alt="">
                <h3>回</h3>
            </div>
            <div class="ducktoolyoyo" @click="letsWatering">
                <img class="duckTool"  src='../../MS/superFuckingCuteDuck_DoMeDo/duckTool_SoManyWater.png' alt="">
                <h3>水</h3>
            </div>
            <div class="ducktoolyoyo" @click="letsCooking">
                <img class="duckTool"  src='../../MS/superFuckingCuteDuck_DoMeDo/duckTool_YouAreFire.png' alt="">
                <h3>煮</h3>
            </div>
            <div class="ducktoolyoyo" @click="letsEgging">
                <img class="duckTool"  src='../../MS/superFuckingCuteDuck_DoMeDo/duckTool_NeedSomeEggs.png' alt="">
                <h3>蛋</h3>
            </div>
        </div>    
    </div>
</template>

<script>
export default {
  data() {
    return {
      action: 'Walking',
      frameIndex: 1,
      totalFrames1: 6,
      totalFrames2: 8,
      cuteDuckWalking: '../src/MS/superFuckingCuteDuck_DoMeDo/superFuckingCuteDuckWalking_1.png',
      cuteDuckDancing: '../src/MS/superFuckingCuteDuck_DoMeDo/theFuckingDuckDancing_1.png',
      intervalId: null, 
      eggIntervalId: null,
    };
  },
  mounted() {
    this.startAnimation(); 
    this.addLoadingBlocks(0)
  },
  methods: {
    goingToIndex(){
      // router.push('/mindspectrum');
        let ourSpecialToolWhichCanGiveThisFuckingDuckSomeColorSeeSee = document.querySelector(".ourSpecialToolWhichCanGiveThisFuckingDuckSomeColorSeeSee")
        ourSpecialToolWhichCanGiveThisFuckingDuckSomeColorSeeSee.style.transform = 'translateY(200%)'
        let duckLaiYi = document.querySelector(".duckLaiYi")
        duckLaiYi.style.transform = 'translateX(50%) translateY(200%) scale(15)';
        // ourSpecialToolWhichCanGiveThisFuckingDuckSomeColorSeeSee.style.display = 'none'
    },
    addLoadingBlocks(count) {
        if (count < 13) {
            const loadingBlock = document.createElement('div');
            loadingBlock.style.width = '1vw';
            loadingBlock.style.height = '3vh';
            loadingBlock.style.backgroundColor = '#855F49';

            this.$el.querySelector('.loading').appendChild(loadingBlock);

            const delay = Math.random() * 300 + 100;

            setTimeout(() => {
            this.addLoadingBlocks(count + 1); 
            }, delay);
        } else {
            this.$el.querySelector('.loading').style.display = 'none'; 
            this.$el.querySelector('.loadingText').style.display = 'none'; 
            this.$el.querySelector('.letGetStarting').style.display = 'block'; 
        }
        },
    startAnimation() {
      if (this.intervalId) {
        clearInterval(this.intervalId);
      }

      if (this.action === 'Walking') {
        this.startWalkingAnimation();
        } else if (this.action === 'Dancing') {
        this.startDancingAnimation();
        } else if (this.action === 'Swimming') {
        this.startSwimmingAnimation();
        } else if (this.action === 'Firing') {
            this.startFiringAnimation();
        } else if (this.action === 'Egging') {
            this.startEggingAnimation();
        }
    },
    //走路
    startWalkingAnimation() {
    let holo = document.querySelector('.holo');
    let swimmingpool = document.querySelector('.swimmingpool');
    let duck = document.querySelector('.duckLaiYi');
    let IWillFireYou = document.querySelector('.IWillFireYou');
    let yourDuckIsSoHot = document.querySelector('.yourDuckIsSoHot');
    yourDuckIsSoHot.style.display = 'none'
    IWillFireYou.style.display =  'none';
    duck.classList.remove('Duckshake');
    holo.style.backgroundImage = 'url("../src/ms/modeBGI3.jpg")'; 
    swimmingpool.style.display = 'none'; 
    this.clearEggs()
    
    this.intervalId = setInterval(() => {
        this.frameIndex++;
        if (this.frameIndex > this.totalFrames1) {
        this.frameIndex = 1;
        }
        
        this.cuteDuckWalking = `../src/MS/superFuckingCuteDuck_DoMeDo/superFuckingCuteDuckWalking_${this.frameIndex}.png`;
    }, 120);
    },
    //跳舞
    startDancingAnimation() {
    const colors = ["#FF5733", "#33FF57", "#3357FF", "#F33FF5", "#33FFF5", "#F5FF33", "#FF33F5", "#F533FF"]; // 8个颜色
    let holo = document.querySelector('.holo');
    let swimmingpool = document.querySelector('.swimmingpool');
    let duck = document.querySelector('.duckLaiYi');
    let IWillFireYou = document.querySelector('.IWillFireYou');
    let yourDuckIsSoHot = document.querySelector('.yourDuckIsSoHot');
    yourDuckIsSoHot.style.display = 'none'
    IWillFireYou.style.display =  'none';
    duck.classList.remove('Duckshake');
    holo.style.backgroundImage = 'none'; 
    swimmingpool.style.display = 'none'; 
    this.clearEggs()

    this.intervalId = setInterval(() => {
        this.frameIndex++;
        if (this.frameIndex > this.totalFrames2) {
        this.frameIndex = 1;
        }
        

        holo.style.backgroundColor = colors[this.frameIndex - 1]; 

        this.cuteDuckWalking = `../src/MS/superFuckingCuteDuck_DoMeDo/theFuckingDuckDancing_${this.frameIndex}.png`;
    }, 120);
    },
    //游泳
    startSwimmingAnimation(){
        let holo = document.querySelector('.holo');
        let swimmingpool = document.querySelector('.swimmingpool');
        let duck = document.querySelector('.duckLaiYi');
        let IWillFireYou = document.querySelector('.IWillFireYou');
        let yourDuckIsSoHot = document.querySelector('.yourDuckIsSoHot');
        yourDuckIsSoHot.style.display = 'none'
        IWillFireYou.style.display =  'none';
        duck.classList.add('Duckshake');
        holo.style.backgroundImage = 'url("../src/ms/modeBGI3.jpg")'; 
        swimmingpool.style.display = 'block'; 
        this.cuteDuckWalking = `../src/MS/superFuckingCuteDuck_DoMeDo/superFuckingCuteDuckSwimming.png`;
        this.clearEggs()

    },
    //烤鴨
    startFiringAnimation(){

        let holo = document.querySelector('.holo');
        let swimmingpool = document.querySelector('.swimmingpool');
        let duck = document.querySelector('.duckLaiYi');
        let IWillFireYou = document.querySelector('.IWillFireYou');
        let yourDuckIsSoHot = document.querySelector('.yourDuckIsSoHot');
        yourDuckIsSoHot.style.display = 'none'
        IWillFireYou.style.display =  'block';
        duck.classList.remove('Duckshake');
        holo.style.backgroundImage = 'url("../src/ms/modeBGI3.jpg")'; 
        swimmingpool.style.display = 'none'; 
        this.clearEggs()
        this.cuteDuckWalking = `../src/MS/superFuckingCuteDuck_DoMeDo/superFuckingCuteDuckSwimming.png`;

        setTimeout(() => {
        IWillFireYou.style.display = 'none';
        yourDuckIsSoHot.style.display = 'block'
        this.cuteDuckWalking = `../src/MS/superFuckingCuteDuck_DoMeDo/letEatYourDuck.png`;
        }, 2000);
    },
    //生蛋
    startEggingAnimation() {
      this.clearEggs();

      let holo = document.querySelector('.holo');
      let swimmingpool = document.querySelector('.swimmingpool');
      let duck = document.querySelector('.duckLaiYi');
      let IWillFireYou = document.querySelector('.IWillFireYou');
      let yourDuckIsSoHot = document.querySelector('.yourDuckIsSoHot');
      
      yourDuckIsSoHot.style.display = 'none';
      IWillFireYou.style.display =  'none';
      duck.classList.remove('Duckshake');
      holo.style.backgroundImage = 'url("../src/ms/modeBGI3.jpg")'; 
      swimmingpool.style.display = 'none'; 
      this.cuteDuckWalking = `../src/MS/superFuckingCuteDuck_DoMeDo/ohMyGodEgg.png`;

      this.eggIntervalId = setInterval(() => {
        this.eggs();
      }, 50);
    },

    eggs() {
      const holo = document.querySelector('.holo');
      const e = document.createElement('img');
      e.src = '../src/MS/superFuckingCuteDuck_DoMeDo/ohMyGodEgg.png';
      
      e.style.position = 'absolute';
      e.style.top = '-50px';  
      e.style.left = Math.random() * holo.offsetWidth + 'px';  
      
      const size = Math.random() * 40 + 12; 
      e.style.width = `${size}px`;
      e.style.height = 'auto';

      const duration = Math.random() * 3 + 2; 
      e.style.transition = `transform ${duration}s linear, opacity ${duration}s linear`;
      
      e.style.transform = 'translateY(0) rotate(0deg)';
      e.style.opacity = '1';

      holo.appendChild(e);

      setTimeout(() => {
        e.style.transform = `translateY(${window.innerHeight}px) rotate(360deg)`;
        e.style.opacity = '0';
      }, 50);  

      setTimeout(() => {
        holo.removeChild(e);
      }, duration * 1000); 
    },

    clearEggs() {
      if (this.eggIntervalId) {
        clearInterval(this.eggIntervalId); 
        this.eggIntervalId = null;
      }

      const holo = document.querySelector('.holo');
      const eggs = holo.querySelectorAll('.egg'); 
      eggs.forEach(egg => holo.removeChild(egg));
    },

    letsDancing() {
      this.action = 'Dancing';
      this.startAnimation(); // 啟動 dancing 動畫
    },
    letsEgging() {
      this.action = 'Egging';
      this.startAnimation(); // 根據需要啟動對應動畫
    },
    letsWatering() {
      this.action = 'Swimming';
      this.startAnimation(); // 根據需要啟動對應動畫
    },
    letsCooking() {
      this.action = 'Firing';
      this.startAnimation(); // 根據需要啟動對應動畫
    },
    letsWalking() {
      this.action = 'Walking';
      this.startAnimation(); // 根據需要啟動對應動畫
    },

  },
};
</script>




<style lang="scss" scoped>
  @import "../../assets/SASS/component/ms";

.ourSpecialToolWhichCanGiveThisFuckingDuckSomeColorSeeSee{
    transition: transform 0.8s ease;
}

.letGetStarting{
    width: 15vw;
    display: none;
    border: 2px solid #855F49;
    box-sizing: border-box;
    padding: 1vw ;
    border-radius: 20px;
    margin: 0 auto;
    position: absolute;
    left: calc(50vw - 7.5vw);
    bottom: 22vh;
    cursor: pointer;
}

.letGetStarting:hover{
    background-color: #855F49;

}

.letGetStarting:hover h3{
    color: #FFFFFF !important;
}

.yourDuckIsSoHot{
    display: block;
    width: 10vw;
    position: absolute;
    left: calc(50% - 7vw) ;
    top:calc(50% - 17vw)  ;
    z-index: 3;
}
.IWillFireYou{
    display: none;
    width: 36vw;
    position: absolute;
    left: calc(50% - 18vw) ;
    top:calc(50% - 30vw)  ;
    z-index: 3;
}
.swimmingpool{
    display: none;
    width: 20vw;
    position: absolute;
    left: calc(50% - 10vw) ;
    top:calc(50% - 12vw )  ;
    z-index: 1;
}
    .holo{
    overflow-x: hidden;
    overflow-y: hidden;
    position: relative;
    background-image: url(../../ms/modeBGI3.jpg);
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100vh;
    }
    .duckLaiYi{
        width: 20vw;
        margin: 0 auto;
        z-index: 2;
        transition: transform 2s ease;

    }
    .loadingText{
        width: 15vw;
        margin-bottom: 10px;
        position: absolute;
        left: calc(50vw - 7.5vw);
        bottom: 30vh;
    }
    .loading{
        position: absolute;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: left;
        padding:  0 0.5vw;
        width: 20vw;
        height: 4.5vh;
        gap: 0.5vw;
        border: 2px solid #855F49;
        left: calc(50vw - 10vw);
        bottom: 25vh;
    }
    // .loadingBlock{
    //     width: 1vw;
    //     height: 3vh;
    //     background-color:#855F49 ;
    // }
    .ourSpecialToolWhichCanGiveThisFuckingDuckSomeColorSeeSee{
        position: absolute;
        display: flex;
        flex-direction: row;
        gap: 10px;
        bottom: 2%;
        right: 2%;
    }
    .duckTool{
        width: 3vw;
        transition: transform 0.2s ease;
    }
    .ducktoolyoyo{
        cursor: pointer;

    }
    .ducktoolyoyo:hover .duckTool{
        transform: translateY(-100%);
    }

    .Duckshake {
    animation: Duckshake 0.5s ease-in-out infinite;
    }

    @keyframes Duckshake {
    0% { transform: translateX(0) translateY(5px); }
    25% { transform: translateX(-5px) translateY(0px);; }
    50% { transform: translateX(5px) translateY(-5px);; }
    75% { transform: translateX(-5px)translateY(0px); }
    100% { transform: translateX(0) translateY(5px); }
    }




</style>