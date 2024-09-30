<!-- <script setup>
import Header_0 from '@/components/Header_0.vue';
import Quizfinal01 from '@/assets/images/Quizch4.png';
import axios from 'axios';
import Swal from 'sweetalert2';
import Loginpopup from '@/components/Loginpopup.vue'
</script> -->


<template>

  <Header_0 :mode="currentMode" class="header"></Header_0>

  <div class="container">



    <!-- {{ data }} -->
    <template v-for="(question, key) in data">
      <transition name="fade">
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
      </transition>

      <transition name="fade">

        <div v-if="activeIndex === key && key !== 0 && key !== data.length - 1" :key="key" class="question">
          <img :src="question.image" alt="" class="question-image">
          <div class="title">{{ question.label }}</div>
          <div class="answer_flex">
            <div class="answer" v-for="(answer, subkey) in question.values" :key="subkey">
              <div class="btn" @click="next(question, answer)" v-html="answer.name"></div>
            </div>
          </div>

          <div class="progress-bar">
            <div v-for="(item, index) in data.length - 2" :key="index"
              :class="{ 'progress-segment': true, 'active': index < activeIndex }">
            </div>
          </div>
        </div>
      </transition>

      <transition name="fade">

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
            <img :src="result[final_answer].image" alt="" class="finalanswer-image">
            <div class="answer_text" v-if="result[final_answer] && result[final_answer].text"
              v-html="result[final_answer].text"></div>
            <button @click="claimCoupon">領取折價卷</button>
          

            <div class="popup" v-if="showLogin">
            <Loginpopup @login-success="handleLoginSuccess" @close-popup="showLogin = false"
            redirect="littlequiz"></Loginpopup>
            </div>
          </div>

         

        </div>
      </transition>
    </template>
  </div>

</template>

<script>
import Header_0 from '@/components/Header_0.vue';
import Loginpopup from '@/components/Loginpopup.vue';
import Quizfinal01 from '@/assets/images/Quizch4.png';
import axios from 'axios';
import Swal from 'sweetalert2';

// const currentMode = ref('one');

export default {
  components: {
    Header_0,
    Loginpopup
  },
  data() {
    return {
      currentMode: 'one',
      imgPath: '',
      start_animation: false,
      showLogin: false,
      activeIndex: 0,
      final_answer: 1,
      discountCode: '',
      data: [
        {},
        {
          image: new URL('../assets/images/quizpic.jpg', import.meta.url).href,
          label: '1.你認為哪種生活哲學最適合你？',
          value: '',
          values: [
            { name: `人生是一場遊戲<br>每一步都要謹慎`, value: '1' },
            { name: '人生是一段旅程<br>每次經歷都是成長', value: '2' },
            { name: '人生是一個自我發現的過程<br>重要的是理解自己', value: '3' }
          ]
        },
        {
          image: new URL('../assets/images/Quizch2.png', import.meta.url).href,
          label: '2.你更喜歡哪種類型的環境？',
          value: '',
          values: [
            { name: '放鬆而療癒的咖啡廳', value: '3' },
            { name: '充滿探險<br>和未知的神秘秘境', value: '1' },
            { name: '廣闊而無邊的大草原', value: '2' }
          ]
        },
        {
          image: new URL('../assets/images/Quizch3.png', import.meta.url).href,
          label: '3. 當你面對一個未知的挑戰時，你會選擇怎麼做？',
          value: '',
          values: [
            { name: '好奇心驅使<br>我勇敢邁出第一步', value: '2' },
            { name: '我會先觀察內心的感受<br>再決定如何應對', value: '3' },
            { name: '仔細計劃<br>並衡量所有可能的結果', value: '1' }
          ]
        },
        {
          image: new URL('../assets/images/Quizch4.png', import.meta.url).href,
          label: '4.當你想到一次難忘的體驗時，你最記得的是什麼？',
          value: '',
          values: [
            { name: '當時做出的每一個重要決定', value: '1' },
            { name: '置身於那個<br>與眾不同的場景中', value: '2' },
            { name: '內心的感受<br>與那次體驗的深度連結', value: '3' }
          ]
        },
        {
          image: new URL('../assets/images/Quizch5.png', import.meta.url).href,
          label: '5.如果你能擁有一種超能力，你會選擇哪種？',
          value: '',
          values: [
            { name: '讀懂他人的心思<br>並預測他們的行動', value: '1' },
            { name: '治癒他人的情感傷痛<br>並帶來安慰', value: '3' },
            { name: '能夠在任何環境下<br>都保持冷靜與沉著', value: '2' }
          ]
        },
        {}
      ],
      result: {
        1: {
          image: new URL('../assets/images/Quiz_LCresult.png', import.meta.url).href,
          text: '你適合參加刺激的人生賭場<br>這是一個充滿挑戰和策略的活動<br>讓你感受到生活中的刺激和選擇的重要性。'
        },
        2: {
          image: new URL('../assets/images/Quiz_SFresult.png', import.meta.url).href,
          text: '你適合參加新奇的星際邊際<br>這是一場太空探險<br>適合喜愛探索未知和挑戰自我的人'
        },
        3: {
          image: new URL('../assets/images/Quiz_MSresult.png', import.meta.url).href,
          text: '你適合參加療癒的心靈光譜<br>這個活動專注於心靈療癒和自我反思<br>幫助你找到內心的平靜和力量'
        }
      }
    }
  },
  mounted() {
    // 檢查路由是否有 showLogin=true
    if (this.$route.query.showLogin === 'true') {
      this.showLogin = true;
    }
  },
  watch: {
    '$route.query.showLogin'(newVal) {
      if (newVal === 'true') {
        this.showLogin = true;
      }
    }
  },
  methods: {
    startQuiz() {
      this.activeIndex = 1;
    },
    next(question, answer) {
      question.value = answer.value;
      this.activeIndex++;

      if (this.activeIndex === this.data.length - 1) {
        this.start_animation = true;

        console.log(this.data);

        let final_point = 0;

        for (let index = 0; index < this.data.length; index++) {
          const point = this.data[index].value ? this.data[index].value : 0;
          final_point += Number(point);
        }

        console.log(final_point);

        if (final_point <= 8) {
          this.final_answer = 1;
        } else if (final_point >= 9 && final_point <= 11) {
          this.final_answer = 2;
        } else {
          this.final_answer = 3;
        }

        // 標記測驗完成
        this.markQuizCompleted();

        setTimeout(() => {
          this.start_animation = false;
        }, 2500);
      }
    },
    async markQuizCompleted() {
      const token = sessionStorage.getItem('token');

      if (token) {
        try {
          const response = await axios.post(`${import.meta.env.VITE_API_URL}/Login/SetQuizCompleted.php`, {}, {
            headers: {
              'Authorization': `Bearer ${token}`
            }
          });

          if (response.data.status === 'success') {
            sessionStorage.setItem('quizCompleted', 'true');
            console.log('測驗完成標記已更新。');
          } else {
            // Swal.fire({
            //   icon: 'error',
            //   title: response.data.message,
            //   timer: 2500,
            //   showConfirmButton: false,
            //   backdrop: false,
            //   willOpen: () => {
            //     document.body.style.paddingRight = '0';
            //   }
            // });
          }
        } catch (error) {
          console.error(error);
          Swal.fire({
            icon: 'error',
            title: '標記測驗完成失敗，請稍後再試。',
            timer: 2500,
            showConfirmButton: false,
            backdrop: false,
            willOpen: () => {
                document.body.style.paddingRight = '0';
              }
          });
        }
      }
    },
    async claimCoupon() {
      const token = sessionStorage.getItem('token');

      if (!token) {
        // 設置折扣碼請求標記
        sessionStorage.setItem('couponRequested', 'true');
        // 顯示登入彈窗
        this.showLogin = true;
      } else {
        // 呼叫後端 API 取得折扣碼
        try {
          const response = await axios.post(`http://illusionlab.local/public/PDO/Login/GetTicketCoupon.php`, {}, {
            headers: {
              'Authorization': `Bearer ${token}`
            }
          });

          if (response.data.status === 'success') {
            this.discountCode = response.data.discountCode;
            // Swal.fire({
            //   icon: 'success',
            //   title: `您的折扣碼是: ${response.data.discountCode}`,
            //   timer: 2500,
            //   showConfirmButton: false,
            //   backdrop: false,
            //   willOpen: () => {
            //     document.body.style.paddingRight = '0';
            //   }
            // });
            console.log('即將跳轉到 /LittleQuizResult');
            // 跳轉到結果頁面
              this.$router.push('/LittleQuizResult');
          } else {
            Swal.fire({
              icon: 'error',
              title: response.data.message,
              timer: 2500,
              showConfirmButton: false,
              backdrop: false,
              willOpen: () => {
                document.body.style.paddingRight = '0';
              }
            });
          }
        } catch (error) {
          console.error(error);
          Swal.fire({
            icon: 'error',
            title: '獲取折扣碼失敗，請稍後再試。',
            timer: 2500,
            showConfirmButton: false,
            backdrop: false,
            willOpen: () => {
                document.body.style.paddingRight = '0';
              }
          });
        }
        
      }
      
    },
    async handleLoginSuccess() {
  this.showLogin = false;
  const couponRequested = sessionStorage.getItem('couponRequested');

  if (couponRequested === 'true') {
    sessionStorage.removeItem('couponRequested');
    const token = sessionStorage.getItem(':tcode');

    if (token) {
      try {
        // 先標記測驗完成
        await this.markQuizCompleted();

        // 然後獲取折扣碼
        const response = await axios.post(`http://illusionlab.local/public/PDO/Login/GetTicketCoupon.php`, {}, {
          headers: {
            'Authorization': `Bearer ${code}`
          }
        });

        if (response.data.status === 'success') {
          this.discountCode = response.data.discountCode;
          // Swal.fire({
          //   icon: 'success',
          //   title: `您的折扣碼是: ${response.data.discountCode}`,
          //   timer: 2500,
          //   showConfirmButton: false,
          //   backdrop: false,
          //   willOpen: () => {
          //       document.body.style.paddingRight = '0';
          //     }
          // });
          // 跳轉到結果頁面
          this.$router.push('/LittleQuizResult');
        } else {
          Swal.fire({
            icon: 'error',
            title: response.data.message,
            timer: 2500,
            showConfirmButton: false,
            backdrop: false,
            willOpen: () => {
                document.body.style.paddingRight = '0';
              }
          });
        }
      } catch (error) {
        console.error(error);
        Swal.fire({
          icon: 'error',
          title: '獲取折扣碼失敗，請稍後再試。',
          timer: 2500,
          showConfirmButton: false,
          backdrop: false,
          willOpen: () => {
                document.body.style.paddingRight = '0';
              }
        });
      }
    }
  } else {
    // 若沒有請求優惠券，僅執行標記
    await this.markQuizCompleted();
      }
    }

  }
  
}


</script>
<style lang="scss" scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  // position: absolute !important;
  // top: 0;
  // left: 0;
}

.fade-enter-to,
.fade-leave-from {
  opacity: 1;
}
</style>
<style lang="scss" scoped>

.swal2-shown {
    padding-right: 0 !important; /* 去除右側 padding */
}
.container {
  background: linear-gradient(115deg, #22247A 22.76%, #7976BB 97.71%);
  min-height: 100vh;
  background-repeat: no-repeat;
  width: 100%;
  font-family: "Noto Sans TC";
  position: relative;
  padding-top: 100px;
  overflow-y: hidden !important;
}

.enter_title,
.question,
.result {
  box-sizing: border-box;
  // padding-bottom: 50px;
  // position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  z-index: 10;
}

// .question {
//   // background: linear-gradient(115deg, #22247A 22.76%, #7976BB 97.71%);
//   box-sizing: border-box;
//   // min-height: 100vh;
//   padding-top: 100px;
// }

// .result {
//   // background: linear-gradient(115deg, #22247A 22.76%, #7976BB 97.71%);
//   box-sizing: border-box;
//   // min-height: 100vh;
// }

// .enter_title,

.header {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 50;
}


.enter_title p {
  font-size: 20px;
  color: #ffffff;
  font-weight: bold;
  text-align: center;
  line-height: 1.5;
  margin-bottom: 20px;
  margin-top: 30px;
  user-select: none;
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

// @keyframes smoke1 {
//   0% {
//     transform: scale(1);
//   }

//   50% {
//     transform: scale(1.1);
//   }

//   100% {
//     transform: scale(1);
//   }
// }

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

.question {}

.question-image {
  display: block;
  margin: 0 auto;
  margin-bottom: 10px;
  width: 450px;
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
  line-height: 1.5;
  user-select: none;
  box-sizing: border-box;
  align-content: center;
  cursor: pointer;
}

.btn:hover{
  background:#ffdf88 ;
  color: #ffffff;
}


//=====================結果轉場動畫=================================
.start_animation {
  box-sizing: border-box;
  // min-height: 100vh;
}

.middlebluesmoke {
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


.finalcircleshine {
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

.finalhand {
  width: 210px;
  position: absolute;
  left: 50vw;
  transform: translate(-50%, -133%);
  z-index: 6;
}

.finallongcloud {
  width: 620px;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -70%);
}

.littleshine1 {
  width: 50px;
  position: absolute;
  left: 50%;
  transform: translate(200%, -520%);
  animation: littleshine1 3s linear infinite;
}


.littleshine2 {
  width: 50px;
  position: absolute;
  left: 50%;
  transform: translate(-260%, -290%);
  animation: littleshine2 3s linear infinite;
}


.start_animation p {
  font-size: 28px;
  color: #fff;
  font-weight: bold;
  text-align: center;
  margin-top: 3%;
}

//==================結果頁============================================
element.style{
  padding-right: 0;
}

.finalanswer {
  // padding-top: 120px;
}

.finalanswer h1 {
  font-size: 32px;
  color: #fff;
  text-align: center;
  font-weight: bold;
}

.finalanswer img {
  width: 400px;
  display: block;
  margin: 10px auto;
}

.answer_text {
  font-size: 20px;
  color: #fff;
  font-weight: bold;
  text-align: center;
  line-height: 1.5;
  margin-bottom: 20px;
  user-select: none;
}

.finalanswer button {
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

.finalanswer button:hover{
  background:#ffdf88 ;
  color: #ffffff;
}

// 

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



//============================RWD=====================================
@media screen and (max-width:820px){
  .smoke .pic1{
    width: 200px;
  }

  .smoke .pic2{
    width: 110px;
  }

  .smoke .pic3{
    width: 380px;
  }

  .enter_title p{
    font-size: 18px;
    padding: 0 60px;
  }

  .answer_flex{
    flex-flow: column;
    text-align: center;
  }
}

@media screen and (max-width:520px){
  .question .title{
    font-size: 18px;
  }

  .question-image{
    width: 340px;
  }

  //===============結果轉場動畫==================
  .finallongcloud{
    width: 380px;
  }

  .middlebluesmoke{
    width: 360px;
  }

  .finalanswer img{
    width: 360px;
  }

  .finalanswer button{
    width: 130px;
    font-size: 18px;
  }

}
</style>

