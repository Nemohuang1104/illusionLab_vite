<template>
 <div class="container">
  <div class="gallery" id="gallery">
    <div class="gallery-pic"><img src="../assets/images/SF_01.png" alt=""></div>
    <div class="gallery-pic"><img src="../assets/images/SF_02.png" alt=""></div>
    <div class="gallery-pic"><img src="../assets/images/SF_03.png" alt=""></div>
    <div class="gallery-pic"><img src="../assets/images/SF_04.png" alt=""></div>
    <div class="gallery-pic"><img src="../assets/images/SF_05.png" alt=""></div>
  </div>
 
</div>
</template>

<script setup>
function rotateGallery() {
  var gallery = document.getElementById('gallery');
  var degText = gallery.style.transform;
  var deg;
  var reg = /rotateY\((-?\d+)deg\)/;

  if (reg.test(degText)) {
    deg = parseInt(reg.exec(degText)[1], 10);
  } else {
    deg = 0;
  }
  deg -= 60;

  gallery.style.transition = '0.4s';
  gallery.style.transform = 'rotateY(' + deg + 'deg)';
  if (deg < -360) {
    window.requestAnimationFrame(resetDeg);
  }
}

function resetDeg() {
  var gallery = document.getElementById('gallery');
  gallery.style.transition = '0s';
  gallery.style.transform = 'rotateY(0deg)';
  window.requestAnimationFrame(rotateGallery);
}

function setGalleryImage(index) {
  var $gallery = $('#gallery');
  var deg = index * 60;
  $gallery.css({
    transition: '0.4s',
    transform: 'rotateY(' + deg + 'deg'
  });
}

var timer = 0;
function restartTimer() {
  clearInterval(timer);
  timer = setInterval(rotateGallery, 1000);
}
timer = setInterval(rotateGallery, 1000);

$('#buttons').on('click', '.btn', function (event) {
  var $btn= $(this);
  var index = $btn.index();
  setGalleryImage(index);
  restartTimer();
});
</script>

<style lang="scss" scoped>
* {
  margin: 0;
}
$containerWidth: 300px;
$containerHeight: 600px;
$imgWidth: 300px;
$imgHeight: 200px;

.container {
  position: relative;
  width: $containerWidth;
  height: $containerHeight;
  perspective: 1500px;
  margin: 0 auto;
  text-align: center;
}
.gallery {
  position: absolute;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d;
  transition: transform 0.4s;
  transition-timing-function: ease-out;
}
.gallery-pic {
  position: absolute;
  width: $imgWidth;
  height: $imgHeight;
  left: $containerWidth / 2 - $imgWidth / 2;
  top: $containerHeight / 2 - $imgHeight / 2;
  img {
    width: 100%;
    height: 100%;
  }
  @for $i from 1 through 6 {
    &:nth-child(#{$i}) {
      transform: rotateY(60deg*($i - 1)) translateZ(500px);
    }
  }
}


</style>