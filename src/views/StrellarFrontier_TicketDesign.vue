<script setup>
    import StrellarFrontierTitle from '@/components/StrellarFrontierTitle.vue';  // 匯入漸層藍色標題樣式

    // 客製功能
    import { ref } from 'vue';
    import defaultImage from '../assets/images/StrellarFrontierTicketDesign_01.png';  //預設圖片
    import image2 from '../assets/images/StrellarFrontierTicketDesign_02.svg';
    import image3 from '../assets/images/StrellarFrontierTicketDesign_03.svg';
    import image4 from '../assets/images/StrellarFrontierTicketDesign_04.svg';
    import image5 from '../assets/images/StrellarFrontierTicketDesign_05.svg';

    // 當前選中的頁籤
    const currentTab = ref('style');

    // 樣式選項
    const styles = ref([
    defaultImage,
    image2,
    image3,
    image4,
    image5,
    ]);

    // 貼紙選項（未來可用）
    const stickers = ref([
    '/path/to/sticker1.png',
    '/path/to/sticker2.png',
    '/path/to/sticker3.png',
    // 其他貼紙路徑
    ]);

    // 選中的樣式和貼紙
    const selectedStyle = ref(styles.value[0]);
    const selectedSticker = ref(null); // 尚未使用

    // 時間和日期選項
    const times = ref(['20:00', '21:00', '22:00']);
    const dates = ref(['Aug 31', 'Sep 1', 'Sep 2']);

    // 選中的時間和日期
    const selectedTime = ref(times.value[0]);
    const selectedDate = ref(dates.value[0]);

    // 選擇樣式
    function selectStyle(style) {
    selectedStyle.value = style;
    }

    // 選擇貼紙（未來可用）
    function selectSticker(sticker) {
    selectedSticker.value = sticker;
    }
</script>



<template>
    <div class="wrapper">
        <div class="title">
            <StrellarFrontierTitle h1="票券製作" p="TICKET DESIGN"></StrellarFrontierTitle>
        </div>

        <div class="ticket-creator">
        <!-- 顯示票券 -->
        <hr>
            <div class="ticket">
                <img :src="selectedStyle" alt="Ticket Background" class="ticket-background" />
                <div class="ticket-content">
                    <h2>星際邊境</h2>
                    <p>Earth --✧-- Space</p>
                    <p>Business Class</p>
                    <p>GATE: S125</p>
                    <p>BRARDING TIME: {{ selectedTime }}</p>
                    <p>ZONE: 1</p>
                    <p>{{ selectedTime }} {{ selectedDate }}</p>
                </div>
            </div>
            <hr>

            <!-- 底下的選項卡 -->
            <div class="ticketOptions">
                <div class="tabs">
                <button :class="{ active: currentTab === 'style' }" @click="currentTab = 'style'">Style</button>
                <button :class="{ active: currentTab === 'sticker' }" @click="currentTab = 'sticker'">Sticker</button>
                </div>

                <!-- Style 選項 -->
                <div v-if="currentTab === 'style'" class="style-options">
                    <p class="section-title">選擇樣式</p>
                    <div v-for="(style, index) in styles" :key="index" @click="selectStyle(style)">
                        <img :src="style" alt="Style Option" :class="{ selected: style === selectedStyle }" />
                    </div>
                </div>

                <!-- Sticker 選項 -->
                <div v-if="currentTab === 'sticker'" class="sticker-options">
                    <p class="section-title">飛航幸運小物</p>
                    <div v-for="(sticker, index) in stickers" :key="index" @click="selectSticker(sticker)">
                        <img :src="sticker" alt="Sticker Option" />
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

* {
    font-family: "Noto Serif TC" ;
}

    .wrapper{
    background-image: url(../assets/images/StrellarFrontierBackground.png);
}
.title{
    text-align: center;
    margin-bottom: 5%;
}

.ticket {
    // position: fixed;  
    // top: 20px;            
    // z-index: 1000;  
    margin: 5% auto;
}

.ticket img{
    width: 100%;
    max-width: 800px;
    // 圖片置中
    display: block;
    margin: 0 auto;
}
hr{
    border: 1px solid #fff ;
}
.ticketOptions{
    padding: 7%;
}

.ticket-content {
    position: absolute;
    top: 20%;
    left: 10%;
    color: white;
}

.tabs {
    display: flex;
}

.tabs button {
    padding: 5px 20px;
    border: none;
    cursor: pointer;
    border-radius: 10px 10px 0px 0px;
    font-size: 16px;
    background-color: #024A81; 
    color: white;
}

.tabs button.active {
    color: #024A81;
    background: #7AABD1;
}

.style-options, .sticker-options {
    // display: flex;
    flex-wrap: wrap;
    width: 100%;
    background: linear-gradient(180deg, rgba(38, 104, 200, 0.40) 0%, rgba(211, 224, 244, 0.40) 79.64%, rgba(255, 255, 255, 0.40) 100%);

    display: grid;
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
    justify-content:center;
    text-align: center;
    position: relative;
    // padding: 30px;
}

.style-options img, .sticker-options img {
    width: 100%;
    max-width: 500px;
    margin:3% auto;
    cursor: pointer;
    border: 1px solid transparent;
}

.style-options img.selected {
    border: 1px dashed#ffffff3f; 
}

.section-title {
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 18px;
    padding:10px;
}

.datetime-options {
    margin-top: 20px;
}

.datetime-options select {
    padding: 5px;
}
</style>