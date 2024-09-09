<script setup>
import Header_0 from '@/components/Header_0.vue';
import Quizfinal01 from '@/assets/images/Quizch4.png'
</script>


<template>

  <Header_0 class="header"></Header_0>

  <div class="container">
    <!-- {{ data }} -->
    <template v-for="(question, key) in data">
      <div v-if="activeIndex === 0 && key === 0" :key="key" class="enter_title">
        <div class="smoke">
          <img src="../assets/images/quiz_middlebluesmoke.png" alt="" class="pic1">
          <img src="../assets/images/quiz-enter_hand.png" alt="" class="pic2">
          <img src="../assets/images/quiz_longsmoke.png" alt="" class="pic3">
        </div>
        <p>準備好踏入奇幻世界，探索最適合你的沉浸式體驗活動嗎？<br>
          透過這個簡單的小測驗，我們將引導你找到最適合你的沉浸式體驗，<br>
          讓我們一起尋找那個能讓你全心投入的夢幻之地吧！</p>
        <button @click="activeIndex = 1" class="enter"> START! </button>
      </div>

      <div v-if="activeIndex === key && key !== 0 && key !== data.length - 1" :key="key" class="question">
        <img :src="question.image" alt="" class="question-image">
        <div class="title">{{ question.label }}</div>
        <div class="answer_flex">
          <div class="answer" v-for="(answer, subkey) in question.values" :key="subkey">
            <div class="btn" @click="next(question, answer)" v-html="answer.name"></div>
          </div>
        </div>

          <div class="progress-bar">
            <div v-for="(item, index) in data.length-2" :key="index" 
                :class="{'progress-segment': true, 'active': index < activeIndex }">
            </div>
          </div>
      </div>

      <div v-if="activeIndex === key && key === data.length - 1 && final_answer" :key="key" class="result">
        <div v-if="start_animation === true" class="start_animation">
          <img src="../assets/images/quiz_middlebluesmoke.png" alt="" class="middlebluesmoke">
            <img src="../assets/images/Quizfinalcircleshine.png" alt="" class="finalcircleshine">
          <img src="../assets/images/Quizfinalhand.png" alt="" class="finalhand">
          <img src="../assets/images/Quizfinallongcloud.png" alt="" class="finallongcloud">
          <img src="../assets/images/Quizlittleshine.png" alt="" class="littleshine1">
          <img src="../assets/images/Quizlittleshine.png" alt="" class="littleshine2">

          <p>結果計算中...</p>
        </div>
        <div v-else class="finalanswer">
          <h1>結果出爐</h1>
          <img :src="result[1].image" alt="" class="finalanswer-image">
          <div class="answer_text" v-if="result[final_answer] && result[final_answer].text" v-html="result[final_answer].text"></div>
          <button>領取折價卷</button>
        </div>

      </div>
    </template>
  </div>

</template>

<script>
export default {
  data() {
    return {
      imgPath: '',
      start_animation: false,
      activeIndex: 0,
      final_answer: 1,
      result: {
        1: {
          image: new URL('../assets/images/carousel1_1_1.png', import.meta.url).href,
          text: '你適合參加刺激的人生賭場<br>這是一個充滿挑戰和策略的活動<br>讓你感受到生活中的刺激和選擇的重要性。'
        },
        2: {
          image: new URL('../assets/images/quizpic.jpg', import.meta.url).href,
          text: '你適合參加新奇的星際邊際<br>這是一場太空探險<br>適合喜愛探索未知和挑戰自我的人'
        },
        3: {
          image: new URL('../assets/images/duck.png', import.meta.url).href,
          text: '你適合參加療癒的心靈光譜<br>這個活動專注於心靈療癒和自我反思<br>幫助你找到內心的平靜和力量'
        }
      },
      data: [
        {

        },
        {
          image: new URL('../assets/images/quizpic.jpg', import.meta.url).href,
          label: '1.你認為哪種生活哲學最適合你？',
          value: '',
          values: [
            { name: `人生是一場遊戲<br>每一步都要謹慎`, value: 'A' },
            { name: '人生是一段旅程<br>每次經歷都是成長', value: 'B' },
            { name: '人生是一個自我發現的過程<br>重要的是理解自己', value: 'C' }
          ]
        },
        {
          image: new URL('../assets/images/Quizch2.png', import.meta.url).href,
          label: '2.你更喜歡哪種類型的環境？',
          value: '',
          values: [
            { name: '放鬆而療癒的咖啡廳', value: 'C' },
            { name: '充滿探險<br>和未知的神秘秘境', value: 'A' },
            { name: '廣闊而無邊的大草原', value: 'B' }
          ]
        },
        {
          image: new URL('../assets/images/Quizch3.png', import.meta.url).href,
          label: '3. 當你面對一個未知的挑戰時，你會選擇怎麼做？',
          value: '',
          values: [
            { name: '好奇心驅使<br>我勇敢邁出第一步', value: 'B' },
            { name: '我會先觀察內心的感受<br>再決定如何應對', value: 'C' },
            { name: '仔細計劃<br>並衡量所有可能的結果', value: 'A' }
          ]
        },
        {
          image: new URL('../assets/images/Quizch4.png', import.meta.url).href,
          label: '4.當你想到一次難忘的體驗時，你最記得的是什麼？',
          value: '',
          values: [
            { name: '當時做出的每一個重要決定', value: 'A' },
            { name: '置身於那個<br>與眾不同的場景中', value: 'B' },
            { name: '內心的感受<br>與那次體驗的深度連結', value: 'C' }
          ]
        },
        {
          image: new URL('../assets/images/Quizch5.png', import.meta.url).href,
          label: '5.如果你能擁有一種超能力，你會選擇哪種？',
          value: '',
          values: [
            { name: '讀懂他人的心思<br>並預測他們的行動', value: 'A' },
            { name: '治癒他人的情感傷痛<br>並帶來安慰', value: 'C' },
            { name: '能夠在任何環境下<br>都保持冷靜與沉著', value: 'B' }
          ]
        },
        {

        },
      ]
    }
  },
  methods: {
    next(question, answer) {
      question.value = answer.value
      this.activeIndex++

      if (this.activeIndex === this.data.length - 1) {
        this.start_animation = true

        setTimeout(() => {
          this.start_animation = false

        }, 2500);
      }
      // question.value = this.answer.value;
      // activeIndex ++
    }

  }
}


</script>

<style lang="scss" scoped>
.enter_title {
  padding-top: 110px;
  background: linear-gradient(115deg, #22247A 22.76%, #7976BB 97.71%);
  box-sizing: border-box;
  padding-bottom: 50px;
  min-height: 100vh;
}

.header{
  position: fixed;
}


.enter_title p {
  font-size: 20px;
  color: #ffffff;
  font-weight: bold;
  text-align: center;
  line-height: 1.5;
  margin-bottom: 20px;
  margin-top: 30px;
}

.smoke img {
  margin-top: 30px;
  display: block;
  max-width: 1000px;
  width: 100%;
  position: relative;
  margin: 0 auto;
  margin-bottom: 40px;
}

.smoke .pic1 {
  display: block;
  width: 280px;
  margin: 0 auto;
  animation: smoke1 3s linear infinite;
}

@keyframes smoke1 {
  0% {
    transform: scale(1);
  }

  50% {
    transform: scale(1.1);
  }

  100% {
    transform: scale(1);
  }
}

.smoke .pic2 {
  display: inline-block;
  width: 160px;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -120%);
  z-index: 1;
}

.smoke .pic3 {
  display: block;
  width: 500px;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -65%);
}


.container {
  background-repeat: no-repeat;
  width: 100%;
  font-family: "Noto Sans TC";
}

.enter {
  display: block;
  font-size: 20px;
  font-weight: bold;
  color: #606060;
  background-color: #FFEDBC;
  width: 124px;
  height: 52px;
  border-radius: 20px;
  border: none;
  margin: 0 auto;
  cursor: pointer;
}

.enter:hover {
  background-color: transparent;
  color: #FFEDBC;
  border: 2px solid #FFEDBC;
}

.question {
  background: linear-gradient(115deg, #22247A 22.76%, #7976BB 97.71%);
  box-sizing: border-box;
  min-height: 100vh;
  padding-top: 100px;
}

.question-image {
  display: block;
  margin: 0 auto;
  margin-bottom: 10px;
  width: 38%;
  margin-bottom: 10px;
}

.question .title {
  font-size: 20px;
  color: #fff;
  font-weight: bold;
  text-align: center;
}

.answer_flex {
  display: flex;
  justify-content: center;
}


.btn {
  display: flex;
  font-size: 16px;
  font-weight: bold;
  display: inline-block;
  width: 240px;
  height: 88px;
  padding: 20px;
  text-align: center;
  color: #606060;
  background: #FFEDBC;
  border-radius: 12px;
  border: none;
  margin: 20px 10px;
  line-height:1.5;
  user-select: none;
  box-sizing: border-box;
  align-content: center;
}


//=====================結果轉場動畫=================================
.start_animation{
  box-sizing: border-box;
  padding-top: 3%;
  min-height: 100vh;
  padding-top: 100px;
}

.middlebluesmoke{
  width: 400px;
  display: block;
  margin: 0 auto;
  position: relative;
  animation: middlebluesmoke 3s linear infinite;
}

@keyframes middlebluesmoke {
  0% {
    transform: scale(1);
  }

  50% {
    transform: scale(1.1);
  }

  100% {
    transform: scale(1);
  }
}


.finalcircleshine{
  width: 300px;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -108%);
  z-index: 5;
}

@keyframes circleshine {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

.finalhand{
  width: 210px;
  position: absolute;
  left: 50vw;
  transform: translate(-50%, -133%);
  z-index: 6;
}

.finallongcloud{
  width: 620px;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -70%);
}

.littleshine1{
  width: 50px;
  position: absolute;
  left: 50%;
  transform: translate(200%, -520%);
  animation: littleshine1 3s linear infinite;
}


.littleshine2{
  width: 50px;
  position: absolute;
  left: 50%;
  transform: translate(-260%, -290%);
  animation: littleshine2 3s  linear infinite;
}


.start_animation p{
  font-size: 28px;
  color: #fff;
  font-weight: bold;
  text-align: center;
  margin-top: 3%;
}

//==================結果頁============================================
.result {
  background: linear-gradient(115deg, #22247A 22.76%, #7976BB 97.71%);
  box-sizing: border-box;
  min-height: 100vh;
}

.finalanswer{
  padding-top: 120px;
}

.finalanswer h1 {
  font-size: 32px;
  color: #fff;
  text-align: center;
  font-weight: bold;
}

.finalanswer img{
  width: 400px;
  display: block;
  margin: 10px auto;
}

.answer_text{
  font-size: 20px;
  color: #fff;
  font-weight: bold;
  text-align: center;
  line-height: 1.5;
  margin-bottom: 20px;
}

.finalanswer button{
  display: block;
  font-size: 20px;
  font-weight: bold;
  color: #606060;
  background-color: #FFEDBC;
  width: 124px;
  height: 52px;
  border-radius: 20px;
  border: none;
  margin: 0 auto;
  cursor: pointer;
}

//==================================進度條=========================================

.progress-bar {
  display: flex;
  justify-content: center;
}

.progress-segment {
  width: 50px;
  height: 10px;
  background-color: lightgray;
  margin: 0 5px;
  border-radius: 12px;
  transition: background-color 0.3s;
}

.progress-segment.active {
  background-color: #768BFF;
}


</style>




<style lang="scss" scoped></style>
