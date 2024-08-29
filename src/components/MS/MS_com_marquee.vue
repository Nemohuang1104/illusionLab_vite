<template>
  <main>
    <div class="marquee">
      <div class="marquee-content">
        <span><a href=""><img class="productIMG" src="../../ms/product1.png" alt=""><h4>馬克杯</h4><h5>MUG</h5></a></span>
        <span><a href=""><img class="productIMG" src="../../ms/product2.png" alt=""><h4>驚喜盒</h4><h5>MYSTERY BOX</h5></a></span>
        <span><a href=""><img class="productIMG" src="../../ms/product3.png" alt=""><h4>吸管水杯</h4><h5>STRAW CUP</h5></a></span>
        <span><a href=""><img class="productIMG" src="../../ms/product4.png" alt=""><h4>實體故事書</h4><h5>STORYBOOK</h5></a></span>
        <span><a href=""><img class="productIMG" src="../../ms/product5.png" alt=""><h4>大型貼紙</h4><h5>LARGE STICKERS</h5></a></span>

        <span><a href=""><img class="productIMG" src="../../ms/product1.png" alt=""><h4>馬克杯</h4><h5>MUG</h5></a></span>
        <span><a href=""><img class="productIMG" src="../../ms/product2.png" alt=""><h4>驚喜盒</h4><h5>MYSTERY BOX</h5></a></span>
        <span><a href=""><img class="productIMG" src="../../ms/product3.png" alt=""><h4>吸管水杯</h4><h5>STRAW CUP</h5></a></span>
        <span><a href=""><img class="productIMG" src="../../ms/product4.png" alt=""><h4>實體故事書</h4><h5>STORYBOOK</h5></a></span>
        <span><a href=""><img class="productIMG" src="../../ms/product5.png" alt=""><h4>大型貼紙</h4><h5>LARGE STICKERS</h5></a></span>
      </div>
    </div>
  </main>
</template>

<script setup>
</script>

<style lang="scss" scoped>
.main {
  padding: 2rem 0;
}

.productIMG {
  width: 20vw;
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
