<template>
    <h2>{{ h2 }}</h2>
</template>

<script setup>
defineProps({
  h2: {
    type: String,
    default: '星球探索'
  }
});
</script>

<style lang="scss" scoped>
@import "../assets/css/reset.css";
h2{
    font-size: 24px;
    background: linear-gradient(1deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>

