<script setup>
import { ref,computed } from 'vue';

import StrellarFrontierTitle from '@/components/SFTitle.vue';  // 匯入漸層藍色標題樣式

import SF_planetButton  from "@/components/SF_planetButton.vue";

// 票券完成畫面
import  SF_TicketComplete  from "./SF_TicketComplete.vue";

//票券圖片
import defaultTicket from '../assets/images/SFticketDesign_01.svg';  // 預設圖片
import ticket2 from '../assets/images/SFticketDesign_02.svg';
import ticket3 from '../assets/images/SFticketDesign_03.svg';
import ticket4 from '../assets/images/SFticketDesign_04.svg';
import ticket5 from '../assets/images/SFticketDesign_05.svg';

//飛航小物
import defaultSticker from '../assets/images/STicon-space.svg';
import sticker2 from '../assets/images/STicon_earth.svg';
import sticker3 from '../assets/images/STicon_moon.svg';
import sticker4 from '../assets/images/STicon_saturn-02.svg';
import sticker5 from '../assets/images/STicon_telescope.svg';
import sticker6 from '../assets/images/STicon_Vector.svg';
import sticker7 from '../assets/images/STicon_astronaut.svg';

//公版圖片
import template1 from '../assets/images/SFticketTemplate01.svg';
import template2 from '../assets/images/SFticketTemplate03.svg';
import template3 from '../assets/images/SFticketTemplate04.svg';



// 頁籤狀態預設 : 公版
const currentTab = ref('template');
const templates = ref([template1, template2, template3]);
const selectedTemplate = ref(templates.value[0]);

// 票券樣式
const styles = ref([defaultTicket, ticket2, ticket3, ticket4, ticket5]);
const selectedStyle = ref(styles.value[0]);

//飛航小物
const stickers = ref([defaultSticker, sticker2, sticker3,sticker4,sticker5,sticker6,sticker7]);
const selectedSticker = ref(stickers.value[0]);

// 先隱藏票券完成畫面
const isComplete = ref(false);


function selectTemplate(template){
    selectedTemplate.value = template; // 公版樣式
}

function selectStyle(style) {
    selectedStyle.value = style; // 選取票券樣式
}

function selectSticker(sticker) {
    selectedSticker.value = sticker; // 選取飛航小物
}

function completeTicket() {
    isComplete.value = true;
}

// 計算最終票券的屬性
const finalTicket = computed(() => ({
    template: selectedTemplate.value, // 公版票券圖
    style: selectedStyle.value,       // 自選票券樣式
    sticker: selectedSticker.value    // 自選飛航小物
}));

</script>


<template>
    <div class="wrapper">
        <div v-if="!isComplete">
            <div class="fixed-header">
                <div class="title">
                    <StrellarFrontierTitle h1="票券製作" p="TICKET DESIGN"></StrellarFrontierTitle>
                </div>
                <div class="ticket">
                    <div class="finalTicket">
                        <img :src="currentTab === 'template' ? selectedTemplate : selectedStyle" alt="Ticket Background" class="ticket-background" />
                        <div v-if="currentTab === 'sticker'" class="selected-sticker">
                            <img :src="selectedSticker" alt="Selected Sticker" class="selected-sticker-img" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="ticket-creator">
                <div class="ticketOptions">
                    <div class="tabs">
                        <button :class="{ active: currentTab === 'template' }" @click="currentTab = 'template'">公版</button>
                        <button :class="{ active: currentTab === 'style' }" @click="currentTab = 'style'">票券樣式</button>
                        <button :class="{ active: currentTab === 'sticker' }" @click="currentTab = 'sticker'">飛航小物</button>
                    </div>
                    <div class="choose-section">
                        <div v-if="currentTab === 'template'" class="template-options">
                            <div class="selectTemplate" 
                            v-for="(template, index) in templates" 
                            :key="index" 
                            @click="selectTemplate(template)"
                            :class="{ selected: template === selectedTemplate}" 
                            >
                                <img :src="template" alt="Template Option"/>
                            </div>
                        </div>
                        <div v-if="currentTab === 'style'" class="style-options">
                            <div class="selectStyle" 
                            v-for="(style, index) in styles" 
                            :key="index" 
                            @click="selectStyle(style)"
                            :class="{ selected: style === selectedStyle }" 
                            >
                                <img :src="style" alt="Style Option"/>
                            </div>
                        </div>
                        <div v-if="currentTab === 'sticker'" class="sticker-options">
                            <div class="selectSticker" 
                            v-for="(sticker, index) in stickers" 
                            :key="index" 
                            @click="selectSticker(sticker)"
                            :class="{ selected: sticker === selectedSticker}"
                            >
                                <img :src="sticker" alt="Sticker Option" />
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div v-if="currentTab != 'style'">  <!--頁籤如果在公版&飛航小物再顯示以下區塊-->
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
    background:linear-gradient(rgba(5, 5, 5, 0.847), rgba(164, 164, 164, 0)) ,
    url(../assets/images/STBackground.png) !important;
 
}

.fixed-header {
  position:static;

}

.title {
    text-align: center;
    
}
.ticket{ // 上方票券區
    margin: 2% auto;
    position: relative;
}

.ticket img{
    width: 100%;
    max-width: 600px;
    display: block;
    margin: 0 auto;
}


.tabs, .choose-section{
    width: 100%;
    max-width: 80%;
    display: block;
    margin: 0 auto;
}
//  頁籤選項
.ticketOptions button{
    background: none;
    cursor: pointer;
    border: none;
    font-size: 18px;
    margin-right: 1%;
}

.ticketOptions button.active{
    color: #C1693B;
    font-weight: bold;
}

// 公版
.template-options{
    display: grid;
    grid-template-columns: repeat(2,2fr) ;
    gap: 30px;
    text-align: center;
    margin-top: 3%;
}

.selectTemplate img{
    width: 100%;
    cursor: pointer;
}

// 票券樣式
.style-options{  
    display: grid;
    grid-template-columns: repeat(2,2fr) ;
    gap: 30px;
    text-align: center;
    margin-top: 3%;
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
    margin: 3%;
}
// 小圖&被選取的圖
.sticker-options img, .selected-sticker-img{
    width: 100%;
    max-width: 40px;
    height: 40px;
}
.selected-sticker{
    display: block;
    width: 100%;
    max-width: 40px;
    height: 40px;

    position: absolute;
    top: 10vw;
    right: 31.2vw;
}

/* 選取時的框線樣式 */
.selected {  
    outline: 1px solid rgba(239, 239, 239, 0.842); 
    outline-offset: 4px;
}

select{
    color: #000000;
}

// 票券確認
.checkInfo {
    display:block;                
    width: 100%;
    max-width: 28%;
    margin: 5% auto;               
}


.custom-checkbox {
    display: flex;
    align-items: center;
    gap: 15px; // 調整文字和 checkbox 之間的間距
    font-size: 16px; // 可根據需要調整字體大小
    cursor: pointer;
    margin-top: 3%;

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
</style>