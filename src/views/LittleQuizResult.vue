<script setup>
import Header_0 from '@/components/Header_0.vue';
</script>

<template>
  <Header_0 class="header"></Header_0>
<main>
  <div class="coupon">
    <h2>恭喜你 !<br>
      獲得體驗活動卷95折</h2>
    <p>折價卷將會匯入您的會員帳戶中</p>
    <img src="../assets/images/coupon.png" alt="">
    <router-link to="/home" ><button>前往活動</button></router-link>
  </div>
</main>
</template>



<style lang="scss" scoped>
header{
  position: fixed;
  z-index: 10;
}

main{
  background: linear-gradient(115deg, #22247A 22.76%, #7976BB 97.71%);
  height: 100vh;
  background-repeat: no-repeat;
  width: 100%;
  font-family: "Noto Sans TC";
  box-sizing: border-box;
  padding-top: 130px;
}

.coupon{
  width:50%;
  border-radius: 20px;
  border: 1px solid #FFF;
  background: linear-gradient(112deg, rgba(255, 255, 255, 0.50) 5.27%, rgba(153, 153, 153, 0.50) 92.18%);
  backdrop-filter: blur(20px);
  text-align: center;
  box-sizing: border-box;
  padding: 30px;
  margin: auto auto;
}

.coupon h2{
  font-size: 28px;
  color: #fff;
  font-weight: bold;
}

.coupon p{
  font-size: 16px;
  color:#606060;
  margin-top: 8px;
}

.coupon img{
  width:90%;
  display: block;
  margin: 20px auto;
}

.coupon button{
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

</style>