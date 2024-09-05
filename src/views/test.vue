<template>
  <div id="app">

<h1>簡單的心理測驗遊戲</h1>

<div class="quest">
  <h3>第{{ curr + 1 }}題: {{ questions[curr].quest }}</h3>
  <label v-for="(answer, index) in questions[curr].options">
    <input type="radio" :value="answer.value" v-model="questions[curr].selected">
    {{ index + 1 }}. {{ answer.ans }}
  </label>

</div>

<button @click="prev()">前一題</button>
<button @click="next()">下一題</button>
<button @click="settlement">看結果</button>
<button @click="reset">重置</button>
</div>

</template>


<script setup>
import { ref, computed } from 'vue';

// 設置響應式數據
const curr = ref(0);
const questions = ref([
  {
    quest: '如果你是童話故事中，想吃掉三隻小豬的大野狼，你認為使用哪一種方法可以容易吃掉他們？',
    options: [
      { ans: '用煙把小豬燻到昏倒',         value: 1 },
      { ans: '從煙囪或其他入口偷偷爬進屋',  value: 2 },
      { ans: '用槌子把門破壞闖入屋內',      value: 3 },
      { ans: '模仿豬媽媽的聲音騙小豬開門',  value: 4 },
    ],
    selected: null,
  },
  {
    quest: '剪刀、石頭、布，你第一直覺會出哪一個？',
    options: [
      { ans: '剪刀', value: 3 },
      { ans: '石頭', value: 2 },
      { ans: '布',   value: 1 },
    ],
    selected: null
  },
  {
    quest: '下列四項運動項目中，假設你要開始嘗試的話，你最想要做哪一項？',
    options: [
      { ans: '潛水',   value: 3 },
      { ans: '滑翔翼', value: 4 },
      { ans: '滑水',   value: 2 },
      { ans: '長途徒步旅行', value: 1 },
    ],
    selected: null,
  }
]);

const selfQuestions = ref([...questions.value]);

// 計算總分
const total = computed(() => {
  return questions.value.reduce((sum, question) => {
    return sum + Number(question.selected || 0);
  }, 0);
});

// 按鈕功能方法
const settlement = () => {
  alert('總分: ' + total.value);
};

const reset = () => {
  questions.value.forEach(question => {
    question.selected = null;
  });
  curr.value = 0;
};

const prev = () => {
  if (validTest()) {
    return;
  }
  if (curr.value > 0) {
    curr.value--;
  }
};

const next = () => {
  if (validTest()) {
    return;
  }
  if (curr.value < questions.value.length - 1) {
    curr.value++;
  }
};

const validTest = () => {
  if (questions.value[curr.value].selected === null) {
    alert('您還沒作答喔');
    return true;
  }
  return false;
};

const save = (fromObj, ToObj) => {
  ToObj.length = 0;
  fromObj.forEach(item => {
    ToObj.push({ ...item });
  });
};
</script>


<style lang="scss" scoped>
   #app {
      font-size: 1.25em;
    }
    button{
      font-size: 1.5em;
    }
    label{
      display: block;
    }
    .quest{
      margin-bottom: 1em;
      padding-bottom: 1em;
      border-bottom: 1px solid #ccc;
    }
</style>