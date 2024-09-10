<script setup>
  import Footer_03 from '@/components/Footer_03.vue';
  import TicketChangeSwiper from '@/components/TicketChangeSwiper.vue';
  import SFHeader_0 from '@/components/SFHeader_0.vue';
  import { ref } from 'vue';
  const currentMode = ref('four');
</script>


<template>
<div class="frame">

<SFHeader_0 :mode="currentMode" class="header" :class="header"></SFHeader_0>

<div class="wrapper">
  <h1>票券異動</h1>
  <h2>Ticket changes</h2>
    <div class="change">
      <!-- 左-退票 -->
      <div class="ticket">
        <div class="inside">
        <!-- 卡片正面 -->
        <div class="front">
          <img src="../assets/images/icon-refund.png" alt="">
          <h3>退票</h3>
        </div>

        <!-- 卡片背面 -->
          <div class="back">
          <p>退票時請提供購票者的姓名、購買信箱，退費入帳約需 14 至 25 個工作天，實際日期請依購票時使用信用卡銀行規定為主（特殊情況採ATM退費，入帳時間以客服人員回信為主）。</p>
          <p>若因天災等不可抗力因素，由政府、該縣市主管機關發布停止上班、停演訊息，本專案將暫停演出，並協助全額退費
            詳細的票卷退票規範請查看下方內容。</p>
          </div>
        </div>
      </div>

      <!-- 中-轉讓 -->
      <div class="ticket">
        <div class="inside">
        <!-- 卡片正面 -->
        <div class="front">
          <img src="../assets/images/icon-transfer.png" alt="">
          <h3>轉讓</h3>
        </div>

        <!-- 卡片背面 -->
        <div class="back">
          <p>若您當天無法前來，您可以將票券轉讓給其他朋友，讓他們替您享受這個特別的體驗，或是給他們一個驚喜。</p>
          <p>只需只將訂位確認信轉寄，或截圖給親朋好友即可，並在現場出示確認信，及向櫃檯說明原訂票人姓名，無需擔心任何轉讓問題。讓您的朋友感受到這份驚喜的同時，也能分享活動的美好時光！</p>
        </div>
        </div>
      </div>

      <!-- 右-改期 -->
      <div class="ticket">
        <div class="inside">
        <div class="front">
          <img src="../assets/images/icon-change.png" alt="">
          <h3>改期</h3>
        </div>

        <!-- 卡片背面 -->
          <div class="back">
          <p>本活動僅提供退票服務，無法進行票卷改期，如需更改日期，須取消原訂單並重新下單。如有任何疑問請來電/來信，會由專人為您回覆</p>
          </div>
        </div>
    </div>
</div>

<div class="text">
  <ul>
    <li>退費入帳約需 14 至 25 個工作天，實際日期請依購票時使用信用卡銀行規定為主（特殊情況採ATM退費，入帳時間以客服人員回信為主）。</li>
    <li>預購與劃位注意事項：</li>
    <li>若因天災、國際病毒、戰爭等不可抗力因素，由政府、該縣市主管機關發布停止上班、停演訊息，本專案將暫停演出，並協助全額退費。</li>
    <li>本活動僅提供退票服務，無法進行票卷改期，如需更改日期，須取消原訂單並重新下單。</li>
    <li>收到客製票卷當天起計算，客製票卷資格將保留7天，逾期客製票卷資格將無法使用。</li>
    <li>心靈光譜退換票政策，係依行政院文化部頒定之藝文表演票券定型化契約，第四類級距式退換票方案，收取退換票手續費用。</li>
    <li>訂單成立後若發現訂單內容或時段錯誤，需請於訂單成立後48小時內來電客服，逾時將一律依照退票政策辦理，請於結帳前確認再次訂單資訊。</li>
    <li>若體驗當日若因不可抗力之因素，需臨時異動訂單，請於體驗日後三日內來信客服，並出示相關含姓名日期之證明申請特例改期。特例改期僅開放兩週內日期選擇。心靈光譜保有最終決定權。</li>
    <li>請於活動當天持電子票卷至櫃台兌換實體票卷，並憑實體票卷入場，本活動的驗證僅憑票券進行，請務必妥善保管您的票卷。</li>
    <li>發票若需新增／更改統編、抬頭或電子載具號碼，請於下單後五日（含）內，來信客服信箱: illusionlab@gmail.com 提出需求。逾期及發票一旦開立，恕無法再做調整。</li>
    <li>客服人員服務時間 : 週一到週五 10:00 ~ 20:00 會由專人回覆訊息。</li>
  </ul>
</div>

  <div class="rule">
    <h1>票券退票規則</h1>
    <TicketChangeSwiper></TicketChangeSwiper>
  </div>
</div>
</div>
<Footer_03></Footer_03>
</template>


<style lang="scss" scoped>
@import "../assets/SASS/basic/color";

.frame{
  background-image: url(../assets/images/MS_paperbg.jpg);
  width: 100%;
  font-family:"Noto Sans TC";
  padding-bottom: 1%;
  padding-top: 80px;
}

header{
 position: fixed;
 top: 0;
 left: 0;
}




.wrapper h1{
  font-size: 36px;
  color:map-get($colofont_3,text);
  font-weight: bold;
  text-align: center;
  margin-top: 80px;
}

.wrapper h2{
  font-size: 20px;
  color:map-get($colofont_3,text);
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  text-align: center;
  margin-bottom: 30px;
  padding-top: 8px;
}

.change{
  display: flex;
  justify-content: center;
  gap: 40px;
  margin-bottom: 50px;
}

.change .inside{
  width: 300px;
  height: 450px;
  background-color:map-get($color_3,card_bg);
  border-radius: 20px;
  box-shadow: 8px 8px 4px 0px rgba(0, 0, 0, 0.10);
  box-sizing: border-box;
  position: relative;
  perspective: 1000px;
  transform-style: preserve-3d;
  transition: transform 1s;
  padding: 0px 24px;
}

.ticket:hover>.inside {
  transform: rotateY(180deg);
}

.change .inside .front{
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  position: absolute;
  top: 0;
  left: 0; 
}

.change .inside .front img{
  width: 150px;
  display: block;
  margin: 80px auto 0px;
  margin-bottom: 10px;
}

.change .inside .front h3{
  font-size: 28px;
  color:map-get($colofont_3,text);
  font-weight: bold;
  text-align: center;
}

.change .inside .back{
  width: 100%;
  height: 100%;
  font-size: 16px;
  color:map-get($colofont_3,text);
  line-height: 1.5;
  backface-visibility: hidden;
  position: absolute;
  top: 0;
  left: 0;
  transform: rotateY(180deg);
  padding: 80px 24px;
  box-sizing: border-box;
} 

.change .inside .back p{
  font-size: 16px;
  color:map-get($colofont_3,text);
  line-height: 1.5;
  margin-bottom: 20px;
  
}


.text{
  width: 70%;
  margin: 0 auto;
  margin-bottom: 50px;
}

.text li{
  font-size: 16px;
  color:map-get($colofont_3,text);
  line-height: 1.5;
  list-style-type: square;
}

.rule{
  width: 86%;
  margin: 0 auto;
  margin-bottom: 100px;
}


.rule h1{
  font-size: 36px;
  font-weight: bold;
  color:map-get($colofont_3,text);
  text-align: center;
  margin-bottom: 30px;
}

.cardlist{
  display: flex;
  justify-content: space-between;
}

 

.Refund{
  width: 200px;
  height: 300px;
  background-color:map-get($color_3, ticket);
  border-radius: 20px;
  perspective: 1000px;
  position: relative;
  transform-style: preserve-3d;
  transition: transform 1s;
  text-align: center;
}

.card{
  width: 200px;
}

.card:hover>.Refund {
  transform: rotateY(180deg);
}


.Refund .front{
  backface-visibility: hidden;
  position: absolute;
  width: 100%;
  height: 100%;
  margin: 0 auto;
  position: absolute;
  top: 0;
  left: 0;
}

.Refund .front h4{
  font-size: 24px;
  color:map-get($colofont_1, $key: white);
  line-height: 300px;
}


.Refund .back {
  backface-visibility: hidden;
  transform: rotateY(180deg);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  padding-top: 24px;
}

.Refund .back h5{
  font-size: 20px;
  color:map-get($colofont_3,text);
  font-weight: bold;
  text-align: center;
  line-height: 1.1;
}

.Refund .back p{
  font-size: 14px;
  text-align: center;
  color:map-get($colofont_3,text);
}

.Refund .back img{
  width: 150px;
  display: block;
}

.Refund .back .pic1{
  margin: 57px auto 0px;
}

.Refund .back .pic2{
  margin: 14px auto 0px;
}

.Refund .back .pic3{
  margin: 62px auto 0px;
}

.Refund .back .pic4{
  margin: 57px auto 0px;
}

.Refund .back .pic5{
  margin: 15px auto 0px;
}

.swiper {
  width: 86vw;
  height: 100%;
}

.swiper-slide {
  text-align: center;
  width: 100%;
  /* Center slide text vertically */
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.swiper-slide img {
  display: block;
  object-fit: cover;
}



.swiper-pagination-bullet-active{
  background:#FDC274;
  }

/* ====================RWD斷點=========================== */
@media screen and (max-width:1000px){
  .change{
    flex-flow: column;
  }

  .change .inside{
    width: 100%;
    max-width: 440px;
    height: 300px;
    margin: 2% auto;
  }

  .change .inside .front img{
    width: 40%;
    margin: 10% auto 0px;
    margin-bottom: 4%;
  }

  .change .inside .back{
    padding: 50px 24px;
  }

}

/* ======================螢幕430========================== */
@media screen and (max-width:500px){
  .change .inside{
    max-width: 320px;
    width: 100%;
  }

  .change .inside .front img{
    width: 40%;
    margin: 20% auto 0px;
    margin-bottom: 4%;
  }

  .change .inside .back{
    padding: 24px;
  }

}

</style>
