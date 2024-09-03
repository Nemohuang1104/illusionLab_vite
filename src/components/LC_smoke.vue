<template>
  
    <div id="wrap">
    <div id="viewport">
      <div class="smoke"></div>
      <div class="smoke" id="smoke-1"></div>
      <div class="smoke" id="smoke-2"></div>
      <div class="smoke" id="smoke-3"></div>
      <div class="smoke" id="smoke-4"></div>
      <div class="smoke" id="smoke-5"></div>
    </div>
  </div>
</template>

<script setup>
import { gsap } from 'gsap';
import { onMounted } from 'vue';

onMounted(() => {

  // gsap.to("#smoke-1", {
  //   top: -100,
  //   duration: 5,
  //   scale: 1.4,
  //   delay: 1.4,
  //   repeat: -1,
  // })

  // gsap.to("#smoke-2", {
  //   top: -200,
  //   duration: 6,
  //   scale: 1.5,
  //   delay:1.4,
  //   repeat: -1,
  //   opacity: 1
  // },{
  //   top: -100,
  //   duration: 2,
  //   scale: 1,
  //   repeat: -1,
  //   opacity: 0
  // })

  // gsap.to("#smoke-3", {
  //   top: -100,
  //   scale: 1.4,
  //   duration: 6,
  //   delay: 1,
  //   repeat: -1,
  // })

  // gsap.to("#smoke-4", {
  //   top: -100,
  //   scale: 3,
  //   duration: 5,
  //   delay: 3,
  //   repeat: -1,
  // })

  // gsap.fromTo("#smoke-5", {
  //   top: 0,
  //   opacity: 0,
  //   scale: 1,
  //   duration: 5,
  //   delay: 2,
  //   repeat: -1,
  // },
  // {
  //   top: -100,
  //   scale: 1.5,
  //   duration: 5,
  //   opacity: 1,
  //   delay: 2,
  //   repeat: -1,
  // })

  // ================

  gsap.fromTo("#smoke-1", 
  {
    top: 100,
    scale: 1,
    repeat: -1,
    opacity: 1
  },{
    top: -500,
    duration: 5,
    scale: 1.4,
    repeat: -1,
    opacity: 0
  })

  gsap.fromTo("#smoke-2", 
  {
    top: 100,
    scale: 1,
    repeat: -1,
    opacity: 1,
    delay: 2
  },{
    top: -400,
    duration: 10,
    scale: 2,
    repeat: -1,
    opacity: 0,
    delay: 2
  },'<1.5')

  gsap.fromTo("#smoke-3", 
  {
    top: 100,
    right: 200,
    duration: 6,
    scale: 1,
    repeat: -1,
    opacity: 1,
    delay: 3
  },{
    top: -600,
    right: 100,
    duration: 6,
    scale: 2,
    repeat: -1,
    opacity: 0,
    delay: 3
  },'<1.5')


  })




</script>

<style lang="scss" scoped>
#wrap {
  // background-color: #000000;
}
#viewport {
  position: relative;
  width: 100%;
  height: 100vh;
  overflow: hidden;
}

#viewport .smoke {
  position: absolute;
  width: 100%;
  // height: 250px;
  // background: url('https://res.cloudinary.com/da51wkm4r/image/upload/v1461143297/title/smoke.png') no-repeat;
  background: url(@/assets/images/LC_smoke.png) no-repeat;
  bottom: -1000px;
  margin-left: 0px
}
</style>