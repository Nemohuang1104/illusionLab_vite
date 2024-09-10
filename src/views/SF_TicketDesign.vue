<script setup>
import { ref,computed } from 'vue';

import StrellarFrontierTitle from '@/components/SFTitle.vue';  // 匯入漸層藍色標題樣式

import SF_planetButton  from "@/components/SF_planetButton.vue";

// 頁首頁尾
import SFHeader_0 from '@/components/Header_0.vue';
const currentMode = ref('three');
import Footer_2 from '@/components/Footer_2.vue';

// 票券完成畫面
import  SF_TicketComplete  from "./SF_TicketComplete.vue";

//票券圖片
import ticket1 from '../assets/images/SFticketDesign_01.svg'; 
import ticket2 from '../assets/images/SFticketDesign_02.svg';
import ticket3 from '../assets/images/SFticketDesign_03.svg';
import ticket4 from '../assets/images/SFticketDesign_04.svg';
import ticket5 from '../assets/images/SFticketDesign_05.svg';

//飛航小物
import sticker1 from '../assets/images/STicon-space.svg';
import sticker2 from '../assets/images/STicon_earth.svg';
import sticker3 from '../assets/images/STicon_moon.svg';
import sticker4 from '../assets/images/STicon_saturn-02.svg';
import sticker5 from '../assets/images/STicon_telescope.svg';
import sticker6 from '../assets/images/STicon_Vector.svg';
import sticker7 from '../assets/images/STicon_astronaut.svg';
import sticker8 from '../assets/images/STicon_shuttle.svg';
import sticker9 from '../assets/images/ST_space-shuttle.svg';




// 公版樣式
const templates = ref([
    { style:ticket2, sticker:sticker2, },
    { style:ticket5, sticker:sticker5, },
    { style:ticket4, sticker:sticker4, }
])

const selectedTemplate = ref(templates.value[0]);
const selectedStyle = ref(selectedTemplate.value.style); // 預設為公版的第一張票券樣式
const selectedSticker = ref(selectedTemplate.value.sticker); // 預設為公版的第一張飛航小物

const clickItem = ref('');

// 票券樣式
const styles = ref([ticket1, ticket2, ticket3, ticket4, ticket5]);

//飛航小物
const stickers = ref([sticker1, sticker2, sticker3,sticker4,sticker5,sticker6,sticker7,sticker8,sticker9]);

// 先隱藏票券完成畫面
const isComplete = ref(false);


function selectTemplate(template){
    clickItem.value = template;

    selectedTemplate.value = template; // 公版樣式
    selectedStyle.value = template.style;
    selectedSticker.value = template.sticker; // 選取飛航小物
}

function selectStyle(style) {
    clickItem.value = style;
    selectedStyle.value = style; // 選取票券樣式
}

function selectSticker(sticker) {
    clickItem.value = sticker;
    selectedSticker.value = sticker; // 選取飛航小物
}

function completeTicket() {
    isComplete.value = true;
}

// 計算最終票券的屬性
const finalTicket = computed(() => ({
    style: selectedStyle.value,       // 自選票券樣式
    sticker: selectedSticker.value    // 自選飛航小物
}));

</script>


<template>
    <SFHeader_0 :mode="currentMode"></SFHeader_0>

    <div class="wrapper">
        <div v-if="!isComplete">
            <div class="fixed-header">
                <div class="title">
                    <StrellarFrontierTitle h1="票券製作" p="TICKET DESIGN"></StrellarFrontierTitle>
                </div>
                <div class="ticket">
                    <div class="finalTicket">
                        <img :src="selectedStyle" alt="Ticket Background" class="ticket-background" />
                        <div v-if="selectedSticker" class="selected-sticker">
                            <img :src="selectedSticker" alt="Selected Sticker" class="selected-sticker-img" />
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="choose-section">
                <div class="template">
                    <p>公版</p>
                    <div class="template-options">
                        <div class="selectTemplate" 
                            v-for="(template, index) in templates" 
                            :key="index" 
                            @click="selectTemplate(template)"
                            :class="{ selected: clickItem === template }"
                            >
                            <div class="finalTicket">
                                <img :src="template.style" alt="Ticket Background" class="ticket-background" />
                                <div  class="selected-sticker">
                                <img :src="template.sticker" alt="Selected Sticker" class="selected-sticker-img" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="style">
                    <p>票券樣式</p>
                    <div class="style-options">
                        <div class="selectStyle" 
                        v-for="(style, index) in styles" 
                        :key="index" 
                        @click="selectStyle(style)"
                        :class="{ selected: clickItem === style }"
                        >
                        <img :src="style" alt="Style Option"/>
                        </div>
                    </div>
                </div>
                <div class="sticker">
                    <p>飛航小物</p>
                    <div class="sticker-options">
                        <div class="selectSticker" 
                        v-for="(sticker, index) in stickers" 
                        :key="index" 
                        @click="selectSticker(sticker)"
                        :class="{ selected: clickItem === sticker  }"
                        >
                            <img :src="sticker" alt="Sticker Option" />
                        </div>
                    </div>
                </div>
            </div>
        
            <div>
                <div class="checkInfo">
                    <label class="custom-checkbox">
                        <input class="checkbox" type="checkbox" />
                        <span>我了解 送出後即無法修改。</span>
                    </label>
                    <label class="custom-checkbox">
                        <input class="checkbox" type="checkbox" />
                        <span>我了解 活動當日憑訂單QR-CODE換實體票卷入場。</span>
                    </label>
                </div>
                <div class="nextStep">
                        <SF_planetButton @click="completeTicket"></SF_planetButton>
                </div>
            </div>
        </div>
        <SF_TicketComplete v-if="isComplete" :ticketData="finalTicket"></SF_TicketComplete>

        <Footer_2></Footer_2>
    </div>
</template>


<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@200..900&display=swap');
@import '@/assets/SASS/basic/_color.scss';

* {
    font-family: "Noto Serif TC" ;
    color:map-get($colofont_2 , text);
}
.wrapper {
    background:linear-gradient(rgba(5, 5, 5, 0.847), rgba(0, 0, 0, 0.63)) ,
    url(../assets/images/STBackground.png);
}

.fixed-header {
  position:sticky;
  top:0;
  z-index: 10;
  background:#000000;
  border-top: 1px solid #303030;
  border-bottom: 1px solid #303030;
}

.title {
    text-align: center;
    margin-top: 8px;
}

.ticket{ // 上方票券區
    margin: 1% auto;
}

.ticket img{
    width: 100%;
    max-width: 470px;
    display: block;
    margin: 0 auto;
}

.finalTicket{
    max-width: 470px;
    aspect-ratio: 100 / 44;
    position: relative;
    margin:auto;
}

.choose-section{
    width: 100%;
    max-width: 60%;
    display: block;
    margin: 3% auto;
}

// 公版
.template{
    margin: 3% auto;
}

// 公版選項&票券選項
.template-options,.style-options{
    display: grid;
    grid-template-columns: repeat(3,2fr) ;
    gap: 10px;
    text-align: center;
    margin-top: 2%;
}

.selectTemplate img{
    width: 100%;
    cursor: pointer;
}

// 票券樣式
.style{
    margin: 3% auto;
}

.style-options img{
    width: 100%;
    cursor: pointer;
}

//飛航小物
.sticker-options{
    display: flex;
    cursor: pointer;
    justify-content: space-between;
    margin: 2% auto;
}


.selected-sticker{
    display: block;
    width: 100%;
    max-width: 8%;
    height: auto;

    position: absolute;
    top: 45%;
    right: 11%;
}

/* 選取時的框線樣式 */
.selected {
    outline: 1px solid rgba(239, 239, 239, 0.842);
    outline-offset: 2px;
}

// 票券確認
.checkInfo {
    display:flex;                
    width: 35%;
    margin: 5% auto;   
    flex-direction: column;
}


.custom-checkbox {
    display: flex;
    align-items: center;
    gap: 15px; // 調整文字和 checkbox 之間的間距
    font-size: 16px; // 可根據需要調整字體大小
    cursor: pointer;
    margin-top: 5%;
    line-height: 1.3;

    .checkbox {
        appearance: none; /* 隱藏原始 checkbox */
        width: 100px;
        max-width: 20px;
        height: 20px;
        border-radius: 2px; /* 圓角效果，可選 */
        border: 2px solid #e8e8e8; /* 自定義背景色 */
        transition: background-color 0.3s, border-color 0.3s;
        cursor: pointer;

        &:checked {
            background-color: #e8e8e8; /* 選中後背景顏色 */
        }

        /* 打勾標記 */
        &:checked::after {
            content: '✔'; /* 選中後顯示的符號 */
            display: block;
            text-align: center;
            line-height: 15px;
            color: #000000; /* 勾勾的顏色 */
            font-size: 16px;
        }
    }
    
}

// 送出按鈕

.nextStep{
    margin: 0 auto;
}




// === RWD ===

@media screen and (max-width: 768px) {

    .template-options , .style-options{
        grid-template-columns:repeat(1, 1fr)
    }
}


// @media screen and (max-width: 600px){

// }
</style>