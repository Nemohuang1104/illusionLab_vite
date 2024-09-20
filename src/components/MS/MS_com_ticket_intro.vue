<template>
    <div class="ticketIntro">
        <h4>{{ participantNumber }}</h4>
        <h5 v-html="gift" ></h5>
    </div>
</template>

<script>
export default {
  props: {
    participantNumber: {
      type: String,
      required: false,
    },
    gift: {
      type: String,
      required: false,
    },
  },
}
</script>

<style lang="scss" scoped>
  @import "../../assets/SASS/component/ms";
  .ticketIntro{
      display: flex;
      flex-grow: 1;
      padding: 30px 20px ;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      border-radius: 12px;
      opacity: 0.8;
      background: rgba(255, 255, 255, 0.80);
  }
</style>