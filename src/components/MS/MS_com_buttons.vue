<template>
    <div class="buttons">
        <button v-if="showPrev" id="prevStep">← PREVIOUS STEP</button>
        <button v-if="showNext" id="nextStep">NEXT STEP →</button>
    </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    mode: {
        type: String,
        default: 'one', 
        validator: value => ['one', 'two'].includes(value)
    }
});

const showPrev = computed(() => props.mode === 'two');
const showNext = computed(() => props.mode === 'one' || props.mode === 'two');
</script>

<style lang="scss" scoped>
.buttons{
    width: 80vw;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
#prevStep{
    margin-right: auto;
}
#nextStep{
    margin-left: auto;
}
#prevStep, #nextStep {
    width: auto;
    display: block;
    font-size: 24px;
    font-weight: bold;
    background-color: transparent;
    border: none;
    color: #FB9D3C;
    cursor: pointer;
}

#prevStep:hover, #nextStep:hover  {
    color: #855F49;
}
</style>
