<script setup>
import Header from './Header.vue';
import Footer from '@/components/Footer.vue';
</script>

<template>
  <div class="wrapper">
    <!-- 頁首 -->
  <Header></Header>

<!-- 中間會員登入區塊 -->
<main>

  <h1>會員登入</h1>
  <!-- 表格區塊 -->
  <div class="form">
    <input type="text" placeholder="請輸入您的電子信箱" class="text">
    <input type="password" placeholder="請輸入您的密碼" class="text">
    <!--忘記密碼 -->
    <a href="#" class="forgot">忘記密碼 ?</a>
    <input type="submit" value="登入" class="login">
    <p>其他登入方式</p>
    <div class="other">
      <a href=""><img src="../assets/images/icon-facebook.svg" alt=""></a> 
      <a href=""><img src="../assets/images/icon-google.svg" alt=""></a>
    </div>
    <p>還不是會員? 前往註冊</p>
    <a href="SignUp.html"><input type="submit" value="註冊" class="signup"></a>
  </div>

</main>

<!-- 頁尾 -->
<Footer></Footer>
  </div>
  
</template>


<style lang="scss" scoped>
@import "../assets/SASS/basic/color";

.wrapper{
  background: map-get($color_0, bgc_blue);
  background-repeat: no-repeat;
  width: 100%;
  font-family:"Noto Sans TC";
}

main{
  width: 670px;
  height: 650px;
  border-radius: 20px;
  border: 1px solid  #FFF;
  background: map-get($color_0 ,bgc_white);
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  backdrop-filter: blur(12.5px);
  margin: 0 auto;
  margin-top: 80px;
  margin-bottom: 80px;
}

h1{
  color: map-get($colorfont_0, white );
  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  font-family: "Noto Sans TC";
  font-size: 40px;
  font-weight: 700;
  text-align: center;
  margin-top: 40px;
}

.form{
  width: 410px;
  margin: 0 auto;
  margin-top: 60px;
}

.form .text{
  width: 390px;
  height: 40px;
  font-size: 18px;
  border-radius: 80px;
  border: 1px solid #FFF;
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  background-color: transparent;
  padding-left: 20px;
  margin-bottom: 20px;
  outline: none;
}

.form .text:focus{
  border: 1px solid #7976BB;
}

.form .text+a{
  display: block;
  text-align: right;
  margin-bottom: 40px;
  text-decoration: none;
  font-size: 16px;
  color: map-get($colorfont_0,black3 );
}

.form p{
  font-size: 16px;
  color: map-get($colorfont_0,black3 );
  text-align: center;
  margin-bottom: 20px;
}

.form .login{
  width: 410px;
  height: 40px;
  border-radius: 80px;
  border: 1px solid #FFF;
  background: rgba(255, 255, 255, 0.70);
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  font-size: 18px;
  color: map-get($colorfont_0,black3 );
  margin-bottom: 40px;
  cursor: pointer;
}

.form .other{
  text-align: center;
  
}

.form img{
  margin: 0px 10px 20px;
}

.from a{}

.form .signup{
  width: 410px;
  height: 40px;
  border-radius: 80px;
  border: 1px solid #FFF;
  background: rgba(255, 255, 255, 0.70);
  box-shadow: 2px 4px 4px 0px rgba(0, 0, 0, 0.10);
  font-size: 18px;
  color: map-get($colorfont_0,black3 );
  cursor: pointer;
}

</style>