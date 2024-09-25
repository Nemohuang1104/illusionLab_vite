<template>
  <main>
    <div class="marquee">
      <div class="marquee-content" draggable="false">
        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product1.png" alt=""><h4>馬克杯</h4><h5>MUG</h5></a></span>
        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product2.png" alt=""><h4>驚喜盒</h4><h5>MYSTERY BOX</h5></a></span>
        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product3.png" alt=""><h4>吸管水杯</h4><h5>STRAW CUP</h5></a></span>
        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product4.png" alt=""><h4>實體故事書</h4><h5>STORYBOOK</h5></a></span>
        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product5.png" alt=""><h4>大型貼紙</h4><h5>LARGE STICKERS</h5></a></span>

        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product1.png" alt=""><h4>馬克杯</h4><h5>MUG</h5></a></span>
        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product2.png" alt=""><h4>驚喜盒</h4><h5>MYSTERY BOX</h5></a></span>
        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product3.png" alt=""><h4>吸管水杯</h4><h5>STRAW CUP</h5></a></span>
        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product4.png" alt=""><h4>實體故事書</h4><h5>STORYBOOK</h5></a></span>
        <span><a href=""><img class="productIMG" draggable="false" src="../../assets/images/ms/product5.png" alt=""><h4>大型貼紙</h4><h5>LARGE STICKERS</h5></a></span>
      </div>
    </div>
  </main>
</template>

<script setup>
</script>

<style lang="scss" scoped>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap');
    .noto-sans-tc-regular {
    font-family: "Noto Sans TC", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }


    h1{font-size: 32px;}
    h2{font-size: 28px;}
    h3{font-size: 18px;}
    h4{font-size: 16px;}
    h5{font-size: 14px;}
    h6{font-size: 16px;}
     p{font-size: 14px;}

    a{
        text-decoration: none;
    }

    h1,h2,h3,h4,h5,h6,p{
        font-family:'Noto Sans TC';
        color: #855F49;
        font-weight: bold;
        text-align: center;
        line-height: 150%;
    }

    .template{
        background-image: url(../ms/ms_bgi.jpg);
        display: flex;
        padding: 150px 200px;
        flex-direction: column;
        align-items: center;
        gap: 100px;
    }

    .top{
        display: flex;
        flex-direction: column;
        gap: 50px;

    }
    main{
        display: flex;
        flex-direction: column;
        gap: 60px;
    }
    .options{
        box-sizing: border-box;
        margin: 0 auto;
        width: 40vw;
        display: flex;
        padding:15px 20px  ;
        background: transparent;
        justify-content: flex-end;
        align-items: center;
        border-radius: 40px;
        border: 2px solid #855F49;
    }
    .selection{
        width: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .selections{
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }
    
.main {
  padding: 2rem 0;
}

.productIMG {
  width: 20vw;
  user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -webkit-user-drag: none;
}

.marquee {
  width: 100%;
  overflow: hidden;
  white-space: nowrap;
  box-sizing: border-box;
}

.marquee-content {
  display: inline-block;
  animation: marquee 15s linear infinite;
}

.marquee-content span {
  display: inline-block;
  padding: 0 2rem;
  font-size: 33px;
  text-align: center;
}

@keyframes marquee {
  from {
    transform: translateX(0%);
  }
  to {
    transform: translateX(-50%);
  }
}
</style>
