<template>
  <div id="SlotMachine">
    <div class="container">
      <Gift
        v-for="(config, index) in configs"
        @finished="isFinished"
        :trigger="trigger"
        :config="config"
        :key="index">
      </Gift>
    </div>
    <button
      class="start"
      @click="turn"
      :disabled="disabled">
      START
    </button>
  </div>
</template>

<script>
import Gift from '../components/Gift.vue'
export default {
  name: 'SlotMachine',
  components: {
    Gift
  },
  data () {
    return {
      trigger: null,
      disabled: false,
      configs: [
        {
          duration: 4000,
          fontSize: 100,
          height: 100,
          width: 200,
          gifts: Array.from(new Array(10), (val, index) => { return { type: 'text', name: index } })
        },
        {
          duration: 5000,
          fontSize: 100,
          height: 100,
          width: 200,
          gifts: Array.from(new Array(10), (val, index) => { return { type: 'text', name: index } })
        },
        {
          duration: 6000,
          fontSize: 100,
          height: 100,
          width: 200,
          gifts: Array.from(new Array(10), (val, index) => { return { type: 'text', name: index } })
        }
      ],
      result: [],
      resultHistory: []
    }
  },
  methods: {
    turn () {
      this.disabled = true
      this.trigger = new Date()
    },
    isFinished (val) {
      const autoTurnList = this.$el.querySelectorAll('.autoTurn')
      this.result.push(val)
      if (autoTurnList.length === 1) {
        this.disabled = false
        this.resultHistory.push(this.result)
        this.result = []
      }
      console.log(this.resultHistory)
    }
  }
}
</script>

<style lang="scss">
#SlotMachine {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  .container {
    display: flex;
  }
  .start {
    position: absolute;
    bottom: 10vh;
    padding: 15px 30px;
    outline: none;
    border: none;
    border-radius: 10px;
    background-color: #4DA1FF;
    color: #ffffff;
    cursor: pointer;
    transition: 150ms;
    user-select: none;
    &:disabled {
      background-color: #ddd;
      cursor: not-allowed;
    }
  }
}
</style>