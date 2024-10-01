<script setup>
import LC_Text3 from '@/components/LC_Text3.vue';
import Btn3_Lifecasino from "@/components/Btn3_Lifecasino.vue";
import Btn2_Lifecasino from "@/components/Btn2_Lifecasino.vue";
</script>

<template>

    <div class="wrapper">
      <div class="tab">

        <RouterLink tag="div" to="/LC_Question" class="tab-item" replace >
        <Btn3_Lifecasino Button="常見問題"></Btn3_Lifecasino>
        </RouterLink>

        <RouterLink tag="div" to="/LC_TicketRule" class="tab-item" replace>
        <Btn3_Lifecasino Button="票務規則"></Btn3_Lifecasino>
        <!-- <component :is="currentComponent" @click="currentButton.value = 'tab3'" Button="票務規則"/> -->
        </RouterLink>

        <RouterLink tag="div" to="/LC_TicketChange" class="tab-item" replace>
        <Btn2_Lifecasino Button="退換票政策"></Btn2_Lifecasino>
        </RouterLink>
        </div>

        <div class="top_img">
        <img src="../assets/images/Line 24.png" alt="">
        </div>
      <div class="title">
        <LC_Text3
          Title1="退換票政策"
          English="Change Your Booking">
        </LC_Text3> 
      </div>
      <section class="info">
        <div class="text_offset">
            <p><img class="first" src="../assets/images/bi_coin.svg" alt="">購票後若需要退費，或是劃位後需要退費、改期和轉讓，請來信客服詢問並附上所需資料：
              illusionlab@gmail.com。</p>
            <p><img src="../assets/images/f7_tickets.svg" alt="">退票政策：</p>
            <div class="text-item">
              <p>◎ 活動開始前14天及以上：全額退款。</p>
              <p>◎ 活動開始前7至13天：退還50%票價。</p>
              <p>◎ 活動開始前7天內：恕不退款。</p>

            </div>
            
            <p><img src="../assets/images/f7_tickets.svg" alt="">換票政策：</p>

            <div class="text-item">
              <p>◎ 活動開始前7天及以上，可免費更換至其他日期或場次，視空位而定。</p>
              <p>◎ 活動開始前7天內，恕不接受換票申請。</p>
            </div>
            

            <p><img src="../assets/images/f7_tickets.svg" alt="">不可抗力：</p>

            <div class="text-item">
              <p>◎ 若因不可抗力（如天災、政府規定等）導致活動取消，將全額退款或提供選擇更換至其他場次。</p>
            </div>
            
            <p><img src="../assets/images/f7_tickets.svg" alt="">票務處理：</p>

            <div class="text-item">
              <p>◎ 所有退換票申請需通過官方網站或指定票務平台進行。</p>
              <p>◎ 退款將在申請受理後10個工作日內處理完畢。</p>
            </div>
            






        </div>
      </section>

    </div>


</template>



<style scoped lang="scss">

@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');

@import "../assets/style";

.wrapper{
  z-index: 10;
}


.top_img{
  img{
    max-width: 800px;
  width: 100%;

  }
  
  display: flex;
  justify-content: center;
  margin: 0 10px;
  margin-bottom: 4%;

}

.text_offset p{
  text-align: left;
  color: map-get($colorfont_0, white);
  font-weight: 500;
  font-family: map-get($fontStyle, style_2);
  line-height: 20px;
  font-size: 16px;
  margin-bottom: 2%;
}

.text_offset p img{
  opacity: 0;
  vertical-align: text-top;
  margin-right: 0.8%;
  
}

.text_offset p .first{
  opacity: 1;
  vertical-align: text-top;
  margin-right: 1%;
}

.text-item p{
  margin-left: 6%;
}


.title{
  margin-bottom: 32px;
}

.title h1{
  width: 100%;
  text-align: center;
  font-size: map-get($fontSize, h1);
  font-weight: bold;
  font-family: map-get($fontStyle, style_2);
  color: map-get($color_0, btn_orange);
}
.title h3{
  width: 100%;
  text-align: center;
  font-size: map-get($fontSize, h3);
  font-weight: bold;
  font-family: map-get($fontStyle, style_2);
  color: map-get($color_0, btn_orange);
}

.question {
  // padding: 1rem 1.5rem;
  // border: 2px solid hsl(209, 34%, 30%); /* --clr-grey-3 */
  margin-bottom: 1rem;
  border-radius: 0.25rem; /* --radius */
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* --light-shadow */
  background-color: var(--clr-white);
  font-family: map-get($fontStyle, style_2);
  border-radius: 24px;
  font-weight: bold;
  // background: #1E1E2F;
}

.question:last-child {
  // padding: 1rem 1.5rem;
  // border: 2px solid hsl(209, 34%, 30%); /* --clr-grey-3 */
  margin-bottom: 100px;

}

.question h4 {
  color: map-get($colorfont_0, white);
  text-transform: none;
  line-height: 1.5;
  cursor: pointer;
}

.question p {
  color: hsl(210, 22%, 49%); /* --clr-grey-5 */
  // margin-top: 0.5rem;
  margin-left: 0;
  margin-right: 0;
  width: 98%;
  background: map-get($colorfont_0, white);
  // padding: 1rem 0 1rem 1.5rem ;
  padding: 2% 0;
  padding-left: 2%;
  border-radius:  0 0 20px 20px;
  
 
}

.question header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  // background: #1E1E2F;
  padding: 8px 20px;
  // border-radius: 20px 20px ;

}



.content {
  max-height: 0;
  transition: max-height 0.2s ease-out;
  width: 100%;
}

.info {
  margin: 0 auto;
  width: 70%;
  z-index: -1;
  opacity: 1;
  transition: opacity 0.2s ease-out;
  
}

.tab-item{
      max-width: 200px;
      width: 100%;
      
    }

    .tab{
    display: flex;
    gap: 2%;
    max-width: 660px;
    justify-content: space-around;
    margin: 0 auto;
    margin-bottom: 2%;
    padding: 0 20px;
    padding-top: 120px;
    }

  @media (max-width: 430px) {
    .tab{
      gap: 8px;
    }
}


</style>