<template>
    <h1>{{ h1 }}</h1>
    <p>{{ p }}</p>
  </template>
  
  <script setup>
  defineProps({
    h1: {
      type: String,
      default: '星際邊境'
    },
    p: {
      type: String,
      default: 'Strellar Frontier'
    }
  });
  </script>
  
  <style lang="scss" scoped>
  h1 {
    font-size: 28px;
    font-weight: 700;
    background: -webkit-linear-gradient(90deg, #078FF2 2.12%, #0FF 50.65%, #5BCAE8 93.64%);
    // background: -webkit-linear-gradient(90deg, rgba(56, 113, 183, 0.945) 30.6%, rgba(177, 208, 247, 0.945) 69.6%);

    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
    margin-bottom: 0.5%;
  }

  p{
    background: -webkit-linear-gradient(90deg, #078FF2 2.12%, #0FF 50.65%, #5BCAE8 93.64%);
    
    font-weight: 700;
    padding-top: .5%;
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
}
  </style>
  