<template>
    <div class="title">
    <h1>{{ mainTitle }}</h1>
    <h3>{{ subTitle }}</h3>
    </div>
    <div class="title">
        <h3>{{ introTitle }}</h3>
        <h4 v-html="intro" ></h4>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      mainTitle: {
        type: String,
        required: false,
      },
      subTitle: {
        type: String,
        required: false,
      },
      introTitle: {
        type: String,
        required: false,
      },
      intro: {
        type: String,
        required: false,
      },
    },
  }
  </script>

<style lang="scss" scoped>
    .title{
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        }
</style>