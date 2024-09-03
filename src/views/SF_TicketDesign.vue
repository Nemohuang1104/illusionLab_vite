<script setup>
import StrellarFrontierTitle from '@/components/SFTitle.vue';  // 匯入漸層藍色標題樣式

import { ref } from 'vue';
//票券圖片
import defaultImage from '../assets/images/SFticketDesign_01.svg';  // 預設圖片
import image2 from '../assets/images/SFticketDesign_02.svg';
import image3 from '../assets/images/SFticketDesign_03.svg';
import image4 from '../assets/images/SFticketDesign_04.svg';
import image5 from '../assets/images/SFticketDesign_05.svg';

//飛航小物
import sticker1 from '../assets/images/STicon_astronaut.svg';
import sticker2 from '../assets/images/STicon_earth.svg';
import sticker3 from '../assets/images/STicon_moon.svg';
import sticker4 from '../assets/images/STicon_saturn-02.svg';
import sticker5 from '../assets/images/STicon_telescope.svg';
import sticker6 from '../assets/images/STicon_Vector.svg';
import sticker7 from '../assets/images/STicon-space.svg';



// 票券樣式
const currentTab = ref('style');
const styles = ref([defaultImage, image2, image3, image4, image5]);
const selectedStyle = ref(styles.value[0]);

//飛航小物
const stickers = ref([sticker1, sticker2, sticker3,sticker4,sticker5,sticker6,sticker7]);

//時間&日期
const times = ref(['20:00', '21:00', '22:00']);
const dates = ref(['Aug 31', 'Sep 1', 'Sep 2']);
const selectedTime = ref(times.value[0]);
const selectedDate = ref(dates.value[0]);

function selectStyle(style) {
    selectedStyle.value = style;
}

function selectSticker(sticker) {
    // 處理選擇貼紙後的邏輯
    console.log('Selected sticker:', sticker);
}

function selectTime(time) {
    selectedTime.value = time;
}

function selectDate(date) {
    selectedDate.value = date;
}
</script>


<template>
    <div class="wrapper">
        <div class="title">
            <StrellarFrontierTitle h1="票券製作" p="TICKET DESIGN"></StrellarFrontierTitle>
        </div>

        <div class="ticket-creator">
            <!-- 票券 -->
            <div class="ticket">
                <img :src="selectedStyle" alt="Ticket Background" class="ticket-background" />
                <div class="time-selected">
                    <p @click="selectTime('20:00')">{{ selectedTime }}</p>
                </div>
                <div class="date-selected">
                    <p @click="selectDate('Aug 31')">{{ selectedTime }} {{ selectedDate }}</p>
                </div>
                
            </div>

            <!-- 小圖選項 -->
            <!-- <img src="你的右側小圖路徑" alt="Small Icon" @click="selectStyle(image2)" /> -->

            <!-- 底下的選項卡 -->
            <div class="ticketOptions">
                <div class="tabs">
                    <button :class="{ active: currentTab === 'style' }" @click="currentTab = 'style'">票券樣式</button>
                    <button :class="{ active: currentTab === 'sticker' }" @click="currentTab = 'sticker'">飛航小物</button>
                </div>

                <div class="choose-section">
                  <!-- 動態顯示 section-title
                    <p class="section-title">
                        {{ currentTab === 'style' ? '選擇樣式' : '飛航幸運小物' }}
                    </p> -->

                    <!-- Style 選項 -->
                    <div  v-if="currentTab === 'style'" class="style-options">
                        <div class="selectStyle" v-for="(style, index) in styles" :key="index" @click="selectStyle(style)">
                            <img :src="style" alt="Style Option" :class="{ selected: style === selectedStyle }" />
                        </div>
                    </div>

                    <!-- Sticker 選項 -->
                    <div v-if="currentTab === 'sticker'" class="sticker-options">
                        <div v-for="(sticker, index) in stickers" :key="index" @click="selectSticker(sticker)">
                            <img :src="sticker" alt="Sticker Option" />
                        </div>
                    </div>
                </div>


                <!-- 時間和日期選項 -->
                <div class="datetime-options">
                    <label for="time">BRARDING TIME:</label>
                    <select id="time" v-model="selectedTime">
                        <option v-for="time in times" :key="time" :value="time">{{ time }}</option>
                    </select>

                    <label for="date">日期:</label>
                    <select id="date" v-model="selectedDate">
                        <option v-for="date in dates" :key="date" :value="date">{{ date }}</option>
                    </select>
                </div>
            </div>
        </div>
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
    url(../assets/images/STBackground.png);
}
p{
    font-weight: normal;
}
.title {
    text-align: center;
}
.ticket{
    margin: 5% auto;
}
.ticket img{
    width: 100%;
    max-width: 50%;
    display: block;
    margin: 0 auto;
}
// .time-selected {  //boardingTime
//     position: absolute; 
//     top: 58%;  
//     left: 46%;
// }

// .date-selected{
//     position: absolute;  /* 時間&日期 */
//     top: 54%;  
//     left: 63%;
// }


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


.section-title{ //選項文字
    text-align: left;
    margin: 3% auto;
}

.style-options{  // 票券樣式
    display: grid;
    grid-template-columns: repeat(2,2fr) ;
    gap: 30px;
    text-align: center;
    margin-top: 3%;
}

.style-options img{
    width: 100%;
    // max-width: 90%;
    cursor: pointer;
}

//飛航小物
.sticker-options{
    display: flex;
    cursor: pointer;
    justify-content: space-around;
    margin: 3%;
}

</style>