<script setup>
import Footer_03 from '@/components/Footer_03.vue';
</script>

<template>
  <div class="wrapper">
    <!-- 頁首 -->
    <header></header>

  <!-- 標題&英文 -->
   <div class="title">
    <h1>常見問題</h1>
    <p>FAQ</p>
   </div>

   <!-- 中間區塊 -->
   <main>
    <div class="card">
      <div class="inside">
        <!-- 卡片正面 -->
        <div class="front">
          <img src="../assets/images/MS-ticket.png" alt="">
          <h2>票卷</h2>
          <p>ticket</p>
        </div>

        <!-- 卡片背面 -->
        <div class="back">
          <h3>票卷退換貨規則</h3>
          <p>本活動僅提供退票服務，無法進行票卷交換，如需更改日期，須取消原訂單並重新下單。</p>

          <h3>訂單完成後：</h3>
          <p>在訂單完成後，我們將發送一個網址到您的電子郵件信箱中，您可透過該網址進行客製票卷操作。</p>

          <h3>客製票卷：</h3>
          <p>自收到客製票卷當日起，客製票卷資格有效期為7天，逾期後，客製票卷資格將無法再使用。</p>

          <h3>票卷兌換：</h3>
          <p>請於活動當天持電子票卷至櫃台兌換實體票卷，並憑實體票卷入場。本活動的驗證僅憑票券進行，請務必妥善保管您的票卷。</p>
          
          <p>關於退換貨詳細資訊請至 <a href="">票券異動</a>查看，或來信客服信箱: illusionlab@gmail.com ，由專人為您服務</p>

        </div> 
      </div>
    </div>

    <div class="card">
      <div class="inside">
        <!-- 卡片正面 -->
        <div class="front">
          <img src="../assets/images/MS-cake.png" alt="">
          <h2>來源</h2>
          <p>source</p>
        </div>

        <!-- 卡片背面 -->
        <div class="back">
          <h3>甜點的食品來源為何？</h3>
          <p>我們非常重視參與者的飲食安全與體驗品質，因此所有甜點均選用天然且新鮮的食材製作。精選本地供應商所提供的食材。無論是使用的水果、乳製品，還是各種配料，我們都採用符合嚴格品質標準的原料，並確保食材的可追溯性，讓您在享受甜點的同時，能夠放心品嚐每一份美味。</p>
        </div>
      </div>
    </div>

      <div class="card">
        <div class="inside">
          <div class="front">
            <img src="../assets/images/MS-car.png" alt="">
            <h2>交通</h2>
            <p>transportation</p>
          </div>

          <!-- 卡片背面 -->
          <div class="back">
            <h3>捷運：</h3>
            <p>搭乘台北捷運松山新店線（綠線），在 南京復興站 下車，從 8 號出口步行約 3 分鐘即可抵達。</p>

            <h3>公車：</h3>
            <p>可搭乘公車至 捷運南京復興 公車站站牌，步行3分鐘即可抵達。
              主要公車路線包括 306、307、南京幹線 等。</p>

            <h3>開車：</h3>
            <p>沿南京東路三段行駛，於 219 號旁尋找停車場或路邊停車位後，步行即可抵達。</p>
          </div>
        </div>
    </div>

    <div class="card">
      <div class="inside">
        <!-- 卡片正面 -->
        <div class="front">
          <img src="../assets/images/MS-pet.png" alt="">
          <h2>寵物</h2>
          <p>pet</p>
        </div>

        <!-- 卡片背面 -->
        <div class="back">
          <h3>體驗時是否能攜帶寵物一起參與？</h3>
          <p>很抱歉，活動現場不允許攜帶寵物參與體驗。然而，我們貼心地提供臨時寵物旅館服務，您可以將心愛的毛小孩暫時寄放在寵物旅館中，體驗結束後再將牠們領回。我們會確保您的寵物在您體驗期間獲得良好的照顧。</p>
        </div>
      </div>
    </div>

      <div class="card">
        <div class="inside">
          <!-- 卡片正面 -->
          <div class="front">
            <img src="../assets/images/MS-dizzy.png" alt="">
            <h2>眩暈</h2>
            <p>dizzy</p>
          </div>

          <!-- 卡片背面 -->
          <div class="back">
            <h3>觀看 3D 投影時會引起暈眩嗎？</h3>
            <p>由於 3D 投影技術透過創造深度和立體感，部分觀眾在觀看時可能會感到輕微的暈眩或不適。為了減少不適感，我們在設計投影內容時特別注重畫面的平穩性和舒適度，提供更自然的視覺體驗。若您在觀看過程中感到不適，建議您暫時閉上眼睛等待感覺緩解後再繼續觀賞。</p>
          </div>
        </div>
    </div>


    <div class="card">
      <div class="inside">
        <!-- 卡片正面 -->
        <div class="front">
          <img src="../assets/images/MS-vegan.png" alt="">
          <h2>素食</h2>
          <p>vegetarian</p>
        </div>

        <!-- 卡片背面 -->
        <div class="back">
            <h3>甜點是否為素食？</h3>
            <p>我們提供的甜點為蛋奶素食。所有甜點均不含肉類或魚類成分，主要使用蛋類、乳製品、穀物和水果等天然食材製作。如果您有特定的飲食需求或過敏反應，請聯絡客服人員，我們將竭力為您提供更合適的選擇。</p>
        </div>
      </div>
    </div>

   </main>

   <Footer_03></Footer_03>

  </div>
</template>



<style lang="scss" scoped>
@import "../assets/SASS/basic/color";

.wrapper {
  background-image: url(../assets/images/MS_paperbg.jpg);
  width: 100%;
  font-family: "Noto Sans TC";
}

header {
  width: 100%;
  height: 80px;
  background-color: #B89977;
}

.title {
  margin: 0 auto;
  text-align: center;
  margin-top: 150px;
  margin-bottom: 50px;
}

.title h1 {
  font-size: 36px;
  color:map-get($colofont_3,title);
  font-weight: bold;
}

.title p {
  font-size: 20px;
  color:map-get($colofont_3,title);
  font-weight: bold;
  font-family:Arial, Helvetica, sans-serif;
}

main {
  display: flex;
  max-width: 1050px;
  width: 100%;
  gap: 2%;
  flex-wrap: wrap;
  margin: 0 auto 50px;

}

.inside{}

.inside {
  width: 330px;
  height: 710px;
  border-radius: 12px;
  background-color:map-get($color_3,card_bg);
  padding: 50px 24px 20px;
  box-sizing: border-box;
  line-height: 1.5;
  box-shadow: 8px 8px 12px 0px rgba(0, 0, 0, 0.20);
  margin-bottom: 30px;
  perspective: 1000px;
  position: relative;
  transform-style: preserve-3d;
  transition: transform 1s;
}

.card:hover>.inside{
  transform: rotateY(180deg);
}

.inside .front {
  width: 100%;
  font-weight: bold;
  color:map-get($colofont_3,text);
  text-align: center;
  backface-visibility: hidden;
  margin: 0 auto;
  position: absolute;
  top: 0;
  left: 0;
}

.inside .front img {
  display: block;
  margin: 80px auto;
  margin-bottom: 20px;
  width: 150px;
}


.inside .front h2 {
  font-size: 36px;
}

.inside .front p {
  font-size: 20px;
  font-family:Arial, Helvetica, sans-serif;
}

.inside .back {
  box-sizing: border-box;
  color:map-get($colofont_3,text);
  backface-visibility: hidden;
  transform: rotateY(180deg);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  padding: 80px 24px;
  box-sizing: border-box;
}


.inside .back h3 {
  font-size: 18px;
  font-weight: bold;
}

.inside .back p {
  font-size: 16px;
  margin-bottom: 10px;
}

.inside .back a {
  font-size: 16px;
  font-weight: bold;
  color:map-get($colofont_3,orange);
  text-decoration: none;
}


</style>