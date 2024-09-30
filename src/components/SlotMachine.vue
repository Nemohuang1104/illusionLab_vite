<template>
  <div id="SlotMachine">
    <!-- <img class="machine" src="../assets/images/LC_game.png" alt=""> -->
  
    <div class="body">
      <div class="window">
        <!--  -->
        <div class="container">
          <Gift
            v-for="(config, index) in configs"
            @finished="isFinished"
            :trigger="trigger"
            :config="config"
            :key="index">
          </Gift>
          <div class="fence1"></div>
          <div class="fence2"></div>
        </div>
        <!--  -->
      </div>
      <div :class="['handler', { 'active': active }, { 'disabled': disabled }]">
        <div class="stick2"></div>
        <div class="stick"></div>
        <div class="ball" @click="!disabled && turn()"></div>
      </div>
    </div>

    <div
       @click.self="openResultList = false"
       :class="['resultList', {'openResultList' : openResultList }]">
      <div class="resultList-container">
        <div class="result" v-for="(result, index) in resultList" :key="index">{{ `Round${index + 1}: ${result}` }}</div>
      </div>
    </div>
    <!-- 動態設置模態框的背景和內容 -->
  <transition name="zoom">
    <div v-if="showModal" :class="['modal', modalStyle]">
      <div class="modal-content">
        <span class="close" @click="showModal = false">&times;</span>
        <!-- <p>{{ modalContent }}</p> -->
      </div>
    </div>
  </transition>
  </div>
</template>

<script>
import Gift from '../components/Gift.vue'
import seven from '@/assets/images/fruits/4.png'
import persimmon from '@/assets/images/fruits/1.png'
import cherry from '@/assets/images/fruits/2.png'
import banana from '@/assets/images/fruits/3.png'
import money from '@/assets/images/fruits/5.png'
import plant from '@/assets/images/fruits/6.png'
import goust from '@/assets/images/fruits/7.png'
import dark from '@/assets/images/fruits/8.png'

export default {
  name: 'SlotMachine',
  components: {
    Gift
  },
  data () {
    return {
      run3D: false,
      trigger: null,
      active: false,
      disabled: false,
      showModal: false,  // 控制模態框的顯示
      modalContent: '',  // 動態設置模態框的內容
      modalStyle: '',    // 動態設置模態框的樣式（如不同背景圖）
      configs: [
        {
          style: 'gift-style',
          gifts:  [
          { type: 'image', name: 'seven', path: seven },
          { type: 'image', name: 'persimmon', path: persimmon },
          { type: 'image', name: 'cherry', path: cherry },
          { type: 'image', name: 'banana', path: banana },
          { type: 'image', name: 'money', path: money },
          { type: 'image', name: 'plant', path: plant },
          { type: 'image', name: 'goust', path: goust },
          { type: 'image', name: 'dark', path: dark },
        ],
          duration: 4000,
          fontSize: 150,
          height: 200,
          width: 200
        },
        {
          style: 'gift-style',
          gifts:   [
          { type: 'image', name: 'seven', path: seven },
          { type: 'image', name: 'persimmon', path: persimmon },
          { type: 'image', name: 'cherry', path: cherry },
          { type: 'image', name: 'banana', path: banana },
          { type: 'image', name: 'money', path: money },
          { type: 'image', name: 'plant', path: plant },
          { type: 'image', name: 'goust', path: goust },
          { type: 'image', name: 'dark', path: dark },
        ],
          duration: 5000,
          fontSize: 150,
          height: 200,
          width: 200
        },
        {
          style: 'gift-style',
          gifts:  [
          { type: 'image', name: 'seven', path: seven },
          { type: 'image', name: 'persimmon', path: persimmon },
          { type: 'image', name: 'cherry', path: cherry },
          { type: 'image', name: 'banana', path: banana },
          { type: 'image', name: 'money', path: money },
          { type: 'image', name: 'plant', path: plant },
          { type: 'image', name: 'goust', path: goust },
          { type: 'image', name: 'dark', path: dark },
        ],
          duration: 6000,
          fontSize: 150,
          height: 200,
          width: 200
        }
      ],
      openResultList: false,
      resultList: [],
      result: []
    }
  },
  methods: {
    turn () {
      this.active = true
      setTimeout(() => {
        this.active = false
      }, 500)
      this.disabled = true
      this.trigger = new Date()
    },
    isFinished(val) {
      const autoTurnList = this.$el.querySelectorAll('.autoTurn')
      this.result.push(val)  // 將每次轉動的結果存入結果陣列
      if (autoTurnList.length === 1) {
        this.disabled = false
        this.resultList.push(this.result)
        
        // 檢查所有結果是否相同
        const allSame = this.result.every((item) => item === this.result[0])
        if (allSame) {
          this.showPopup(this.result[0])  // 傳遞相同的水果名稱
        }
        
        this.result = []  // 重置結果
    }
  },
  showPopup(fruitName) {
    // 根據不同的水果顯示不同的內容
    switch(fruitName) {
      case 'seven':
        // this.modalContent = '恭喜！你轉到了三個蘋果！'
        this.modalStyle = 'seven-bg' // 你可以設置不同背景圖樣式
        break
      case 'persimmon':
        // this.modalContent = '恭喜！你轉到了三個香蕉！'
        this.modalStyle = 'persimmon-bg'
        break
      case 'cherry':
        // this.modalContent = '恭喜！你轉到了三個櫻桃！'
        this.modalStyle = 'cherry-bg'
        break
      case 'banana':
      // this.modalContent = '恭喜！你轉到了三個櫻桃！'
      this.modalStyle = 'banana-bg'
      break
      case 'money':
      // this.modalContent = '恭喜！你轉到了三個櫻桃！'
      this.modalStyle = 'money-bg'
      break
      case 'plant':
      // this.modalContent = '恭喜！你轉到了三個櫻桃！'
      this.modalStyle = 'plant-bg'
      break
      case 'goust':
      // this.modalContent = '恭喜！你轉到了三個櫻桃！'
      this.modalStyle = 'goust-bg'
      break
      case 'dark':
      // this.modalContent = '恭喜！你轉到了三個櫻桃！'
      this.modalStyle = 'dark-bg'
      break
    }
    this.showModal = true  // 顯示模態框
  }
  }
}
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css?family=Lobster');

.machine{
  border: 2px solid red;
  z-index: 10;
  max-width: 800px;
  max-height: 1000px;
  // object-fit: cover;
  margin-top: 60px;
  
}

#SlotMachine {
  
  //
  $red:linear-gradient(90deg, (#E6BC38) 0%, (#FFE880) 50%, (#E9C54E)70%, (#FAE684)84%, (#C59B36)100%);
  $dark-red: #8f4343;
  $blue: #ffaa01;
  $white: #f4f2e0;
  $border-size: 5px;
  //
  width: 100vw;
  height: 100vh;
  max-width: 900px;
  max-height: 700px;
  background-color: transparent;
  position: relative;
  display: flex;
  
  align-items: center;
  flex-direction: column;
  // justify-content: center;
  user-select: none;
  .badge {
    position: relative;
    margin-top: 30px;
    margin-bottom: 200px;
    display: flex;
    justify-content: center;
    width: 650px;
    height: 260px;
    border: 10px solid $blue;
    border-radius: 50%;
    // background-color: $red;
    background-image: linear-gradient(90deg, (#E6BC38) 0%, (#FFE880) 50%, (#E9C54E)70%, (#FAE684)84%, (#C59B36)100%);
    box-shadow: 0px -5px 0px $white;
    text-align: center;
    span {
      position: absolute;
      top: 25px;
      color: $dark-red;
      font-size: 70px;
      font-family: 'Lobster', cursive;
      &::before {
        position: absolute;
        right: 1px;
        bottom: 1px;
        color: $blue;
        content: 'SlotMachine';
      }
      &::after {
        position: absolute;
        right: 3px;
        bottom: 3px;
        color: $white;
        content: 'SlotMachine';
      }
    }
  }
  .body {
    
    position: absolute;
    padding: 50px;
    // border: $border-size solid $blue;
    border-radius: 50px;
    // background-color: $red;
    background-image: linear-gradient(90deg, (#E6BC38) 0%, (#FFE880) 50%, (#E9C54E)70%, (#FAE684)84%, (#C59B36)100%);
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.461);
    box-shadow: 0px 0px 15px rgba(255, 251, 0, 0.772);
  }
  .window {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    // border: $border-size solid $blue;
    border-radius: 40px;
    overflow: hidden;
    transform: translateZ(0); // for safari border-radius issue
    &::after,
    &::before {
      position: absolute;
      z-index: 5;
      width: 100%;
      height: 100%;
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2) inset;
      content: ' ';
    }
    &::before {
      box-shadow: 0 -10px 15px rgba(0, 0, 0, 0.2) inset;
    }
    .container {
      width: 600px;
      height: 200px;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3) inset;
      overflow: hidden;
      .fence1,
      .fence2 {
        position: absolute;
        z-index: 10;
        left: 190px;
        width: 0;
        height: 200px;
        border-right: 3px dotted $blue;
        opacity: 0.5;
        background-color: $red;
      }
      .fence2 {
        left: 400px;
      }
    }
    .gift-style {
      // font-family: 'Lobster', cursive;
      color: #ff4e01;
      border-right: none;
      border-left: none;
      // border-top: 1px solid #333;
      // border-bottom: 1px solid #333;
      background-color: #f5f2e2;
      // width: 90%;
      img{
        width: 80%;
        object-fit: contain;
      }
    }
  }
  .handler {
    position: absolute;
    top: 50%;
    right: -35px;
    display: flex;
    align-items: center;
    justify-content: center;
    &.active {
      .ball {
        top: 0px;
      }
      .stick {
        top: -10px;
        height: 20px;
      }
    }
    &.disabled {
      .ball {
        cursor: not-allowed;
        animation: none;
      }
    }
    .stick {
      position: absolute;
      top: -90px;
      right: -40px;
      width: 20px;
      height: 100px;
      // border: $border-size solid $blue;
      border-radius: 20px;
      // background-color: $red;
      background-image: linear-gradient(90deg, (#E6BC38) 0%, (#FFE880) 50%, (#E9C54E)70%, (#FAE684)84%, (#C59B36)100%);
      transition: 350ms;

    }
    .stick2 {
      position: absolute;
      top: -10px;
      right: -45px;
      width: 80px;
      height: 20px;
      // border: $border-size solid $blue;
      border-radius: 0 20px 20px 0;
      background-image: linear-gradient(90deg, (#E6BC38) 0%, (#FFE880) 50%, (#E9C54E)70%, (#FAE684)84%, (#C59B36)100%);
      // background-color: $red;
    }
    .ball {
      position: absolute;
      top: -155px;
      right: -67px;
      width: 70px;  
      height: 70px;
      // border: $border-size solid $blue;
      border-radius: 50%;
      // background-color: $red;
      background-image: linear-gradient(90deg, (#E6BC38) 0%, (#FFE880) 50%, (#E9C54E)70%, (#FAE684)84%, (#C59B36)100%);
      cursor: pointer;
      transition: 500ms;
      animation: ballLight 1s infinite alternate-reverse linear;
    }
  }
  .github {
    margin-top: 10px;
    a {
      color: #fff;
    }
  }
  .history {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    white-space: nowrap;
    padding: 15px 30px;
    outline: none;
    border: none;
    border: solid 5px $blue;
    border-radius: 10px;
    background-color: $red;
    color: $white;
    font-size: 30px;
    font-family: 'Lobster', cursive;
    cursor: pointer;

    user-select: none;
    &:after {
      position: absolute;
      padding: 3px;
      width: 100%;
      height: 100%;
      border: solid 3px $white;
      border-radius: 10px;
      left: -6px;
      top: -6px;
      content: ' ';
    }
  }
  .resultList {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 9999;
    display: flex;
    visibility: hidden;
    align-items: center;
    justify-content: center;
    background-color: rgba(0,0,0,0.4);
    opacity: 0;
    transition: 500ms;
    &.openResultList {
      visibility: visible;
      opacity: 1;
    }
    &-container {
      position: absolute;
      padding: 20px;
      min-width: 600px;
      height: 400px;
      border: solid 5px $blue;
      border-radius: 30px;
      background-color: $white;
      box-shadow: 5px 5px 15px rgba(0,0,0,0.4);
      overflow-y: auto;
      .result {
        font-family: 'Lobster', cursive;
        padding: 15px;
        list-style: none;
        color: $blue;
        font-size: 60px;
      }
    }
  }

  @keyframes ballLight {
    from {
      // border: solid 5px $white;
      box-shadow: 0px 0px 10px $white;
    }
    to {
      // border: solid 5px $white;
      box-shadow: 0px 0px 30px $white;
    }
  }
}

.modal {
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  z-index: 1000;
  left: calc(50% - (720px/2));
  bottom: calc(50% - (0px/2));
  width: 100%;
  height: 100%;
  max-width: 720px;
  max-height: 405px;
  // background-color: rgba(0, 0, 0, 0.5);
  border-radius: 25px;
  transition: opacity 0.3s ease;

}

.modal-content {
  transition: transform 0.3s ease;

}

.close {
  position: absolute;
  right: 20px;
  top: 20px;
  font-size: 20px;
  cursor: pointer;
  color: #907500;
}

/* 不同水果的背景樣式 */
.seven-bg {
  background-image: url(@/assets/images/fruits/bg4.jpg);
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
}

.persimmon-bg {
  background-image: url(@/assets/images/fruits/bg1.jpg);
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
}

.cherry-bg {
  background-image: url(@/assets/images/fruits/bg2.jpg);
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
}

.banana-bg {
  background-image: url(@/assets/images/fruits/bg3.jpg);
   background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
}

.money-bg {
  background-image: url(@/assets/images/fruits/bg5.jpg);
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
}

.plant-bg {
  background-image: url(@/assets/images/fruits/bg6.jpg);
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
}

.goust-bg {
  background-image: url(@/assets/images/fruits/bg7.jpg);
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
}

.dark-bg {
  background-image: url(@/assets/images/fruits/bg8.jpg);
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
}

// .default-bg {
//   background-color: #f0f0f0;  /* 可以是默認的背景顏色 */
// }

/* Zoom animation with bounce effect */
@keyframes zoomBounce {
  0% {
    transform: scale(0);
  }
  40% {
    transform: scale(1.1);
  }
  80% {
    transform: scale(0.95);
  }
  100% {
    transform: scale(1);
  }
}

.zoom-enter-active {
  animation: zoomBounce 0.6s ease;
}

.zoom-leave-active {
  transition: transform 0.2s ease;
}

.zoom-leave-to {
  transform: scale(0);
}

.modal-enter-active {
  opacity: 1;
}

.modal-leave-active {
  opacity: 0;
}
</style>
