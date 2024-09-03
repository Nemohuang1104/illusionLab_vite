<template>
  <!-- scroll icon -->
  <div class="scroll">
<div class="circle">
  <div class="circle2">
    <font-awesome-icon class="arrow" icon="fa-solid fa-chevron-down" />
  </div>
</div>
<p>scroll</p>
</div>
<div class="movie">
<div class="bg">
<div class="img">
  <div class="text ">
    <div class="line ">
      <h1>沉浸式體驗  Immersive Experience</h1>
    </div>
    <h3>是一種讓參與者完全投入於特定環境或故事中的感官體驗，<br>
        打破傳統觀眾和表演者之間的界限，使參與者成為體驗的一部分，<br>
        從而達到更深層次的情感和心理共鳴。
    </h3>
  </div>
</div> <!--src="@/assets/image/enter1.png" alt=""-->
</div>
<div class="story">
<div class="story-content">
  <h4>我們將帶你進入一個充滿驚喜與探索的沉浸式體驗世界。<br>
      無論你是渴望挑戰命運、探索宇宙的奧秘，還是尋求內心的平靜，<br>
      我們的獨特活動將為你創造前所未有的感官盛宴。<br>
      準備好踏入這場夢境般的旅程，親身體驗不可思議的瞬間吧！<br>
  </h4>
</div>
</div>
<div class="actor">
<ul>
  <li>
    <img src="@/assets/images/lab_logo.png" alt="">
  </li>
</ul>
</div>
</div>

<ul class="scroll-wrap">
<li></li>
<li></li>
<li></li>
</ul>
</template>

<script>
import $ from "jquery";
export default {

data(){
return{
  hasScrolledToBottom:false,
}
},
mounted() {

sessionStorage.removeItem('hasScrolledToBottom');

var lasScrTop = 0;
var opa = 1;
var sca = 5;
$(window).scroll(function () {
let winTop = $(window).scrollTop();
let winMid = $(window).height() / 2 + winTop;
let winBot = $(window).height() + winTop;
let winHeigh = $(window).height();
let docHeight = $(document).height();

console.log("winTop = " + winTop);
console.log("$(window).height() = " + $(window).height());
console.log("docHeight = " + docHeight);
// 判斷是否滾動到底部
// if(winTop + winHeigh === docHeight){
//   window.location.href = "/home";
// }
// if (winTop + $(window).height() >= docHeight) {
//   alert("stop。")
//   // 這裡是滑動到st底部時要執行的行為，例如跳轉到下一頁
//   window.location.href = "/home"; // 替換成你的下一頁網址
// }

//頁面高度小於等於視窗高度，或已經滾動到底部
if(docHeight <= winHeigh || winTop + winHeigh >= docHeight - 1){
      window.location.href = "/home"; // 替換成你的下一頁網址
  
}

// scroll到li,執行動態
$(".scroll-wrap li").each(function () {
  let liHei = $(this).height();
  let liOff = $(this).offset();
  let liTop = liOff.top;
  let liBot = liTop + liHei;

  if (liBot <= winMid || liTop >= winBot) {
    // li滑出視窗時移除 inView
    $(this).removeClass("inView");
  } else if (liTop <= winMid) {
    // li滑到中間時，加入 inView
    $(this).addClass("inView");
  }
  let inViewEq = $(".inView").index() + 1;
  console.log(inViewEq);
  $(".movie")
    .attr("class", "")
    .addClass("movie step-" + inViewEq);
});
// 判斷scroll往上滑或往下滑
if (winTop > lasScrTop) {
  // 往下滑
} else {
  // 往上滑
}
lasScrTop = winTop;
});
}
}

</script>


<style lang="scss" scoped>
.scroll{
// border: 2px solid red;
// max-width: 1200px;
width: 100%;
margin: 0 auto;
position: fixed;
bottom: 10%;
z-index: 10;

}

.circle{
border: 1.5px solid white;
width: 80px;
height: 80px;
margin: auto;
border-radius: 50%;
position: relative;
box-shadow: 1px 0.7px 12px rgba(0, 0, 76, 0.1);
}

.circle2{
border: 1.5px solid white;
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
width: 70px;
height: 70px;
border-radius: 50%;
box-shadow:inset 1px 0.7px 12px rgba(0, 0, 76, 0.05);
}

.arrow{
color: #fff;
display: block;
margin: 20px auto;
font-size: 30px;
animation: scrollDown1 1.5s ease infinite;
text-shadow: 1px 1px 4.7px rgba(0, 0, 76, 0.128);
}

@keyframes scrollDown1{
0%{
    transform: translateY(-15px);
    opacity: 0;
}
50%{
    transform: translateY(0px);
    opacity: 1;
}
100%{
    transform: translateY(15px);
    opacity: 0;
}
}

p{
text-align: center;
font-size: 20px;
margin-top: 10px;
color: #fff;
font-family: "Noto Sans TC";
text-shadow: 1px 1px 4.7px rgba(0, 0, 76, 0.25);

}

ul,
li {
margin: 0;
padding: 0;
list-style: none;
}
.scroll-wrap {
position: relative;
}
.scroll-wrap li {
height: 100vh;
}
.movie {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
color: #fff;
background:#111;
font-family: "Noto Sans TC";
}
.movie .bg {
width: 100vw;
height: 100vh;
/* Center slide text vertically */
display: -webkit-box;
display: -ms-flexbox;
display: -webkit-flex;
display: flex;
-webkit-box-pack: center;
-ms-flex-pack: center;
-webkit-justify-content: center;
justify-content: center;
-webkit-box-align: center;
-ms-flex-align: center;
-webkit-align-items: center;
align-items: center;
}
.movie .bg .text{
// border: 2px solid red;
margin: 0 auto;
margin-top: 15%;
max-width: 800px;
display: block;
text-align: center;
// scale: 1;
// opacity: 1;
transition: 1s;
animation: enter 1s forwards;
}

@keyframes enter{
0%{
  opacity: 0;
  transform: scale(1.5);

}
100%{
  opacity: 1;
  transform: scale(1);

}
}

.movie .bg .line{
// border: 2px solid green;
max-width: 600px;
margin: 0 auto;
padding: 30px 0;
border-bottom: 1.5px solid #FCB600;

}
.movie .bg h1{
font-size: 36px;
color: #22247A;
font-weight: 500;
}

.movie .bg h3{
font-size: 20px;
color: #7976BB;
font-weight: 300;
line-height: 2;
margin-top: 20px;
}

.movie .bg .img {
/*   height:100vh; */
background-image: url('../assets/images/enter1.png');
transition: 1s;
height: 100vh;
width: 100%;
background-repeat: no-repeat;
background-size:cover;
}
.movie.step-2 .bg .img {
transform: scale(1.1);
background-image: url('../assets/images/enter2.png');
filter:brightness(90%);

}
.movie.step-3 .bg .img {
transform: scale(1.2);
background-image: url('../assets/images/enter3.png');
filter:brightness(90%);
}
.story,
.actor {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
// background: rgba(0, 0, 0, 0.5);
text-align: center;
opacity: 0;
transition: 1s;
}
.story:before,
.actor:before {
content: "";
display: inline-block;
height: 100%;
vertical-align: bottom;
}
.story-content,
.actor ul {
display: inline-block;
// text-align: left;
margin-bottom: 20%;
font-size: 20px;
color: #7976BB;
font-weight: 300;
line-height: 2;
// max-width: 600px;
// width: 100%;
transform: scale(2);
transition: 1s;
}
.actor ul{
margin-bottom: 20%;
width: 100%;

}
.actor ul li {
display: inline-block;
vertical-align: top;
margin-top: 5%;
width: 100%;
// border: 2px solid red;
}
.actor ul li img{
max-width: 800px;
width: 100%;
}

.actor ul li + li {
margin-left: 40px;
}
.movie.step-2 .text{
transform: scale(0.5);
opacity: 0;
animation: out 1s forwards;
}

@keyframes out{
0%{
  opacity: 1;
  transform: scale(1);
}
100%{
  opacity: 0;
  transform: scale(1.5);
}
}

.movie.step-3 .text{
transform: scale(0.5);
opacity: 0;
animation: none;
}
.movie.step-2 .story,
.movie.step-3 .story {
opacity: 1;
}
.movie.step-2 .story-content {
transform: scale(1);
}
.movie.step-3 .story-content {
transform: scale(0.5);
opacity: 0;
}
.movie.step-3 .actor {
opacity: 1;
}
.movie.step-3 .actor ul {
transform: scale(1);
}
</style>