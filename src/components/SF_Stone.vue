<template>
    <div class="forhight">
        <div class="theRock">
            <svg id="ball1" :class="{ 'active': activePopup === 5 }" xmlns="http://www.w3.org/2000/svg" width="883"
                height="899" viewBox="0 0 883 899" fill="none">
                <defs>
                    <clipPath id="clipPath">
                        <path
                            d="M877.173 490.576L882.505 501.24V530.566L874.507 543.896L855.844 565.224L842.515 578.554L826.519 591.884L810.522 597.216L807.856 607.88V639.872L818.521 682.528V741.18L807.856 762.508L794.527 767.84L749.205 773.172L735.875 778.504H731.432L722.545 781.17L719.879 789.168L690.553 805.164L687.887 810.496L659.894 820.493L661.227 821.16L645.858 827.746L634.567 837.156L613.239 850.486L506.059 781.17L540.559 700.005L613.239 639.872L549.559 647.87L540.559 597.216L466.61 557.226L453.66 493.242L567.917 478.532L647.897 501.24L749.205 430.591L877.173 490.576Z"
                            fill="transparent" />
                    </clipPath>
                </defs>
                <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899"
                    clip-path="url(#clipPath)" />
            </svg>

            <svg id="ball2" :class="{ 'active': activePopup === 3 }" xmlns="http://www.w3.org/2000/svg" width="883"
                height="899" viewBox="0 0 883 899" fill="none">
                <defs>
                    <clipPath id="clipPath2">
                        <path
                            d="M613.239 850.486L591.912 861.15H557.254L519.93 866.482L487.938 890.476L466.61 898.474H437.284L431.063 895.808H429.286L407.292 885.811L405.292 885.144L399.963 882.479L399.96 882.478L386.63 869.148V863.816H381.298L373.3 847.82L354.638 829.158L327.978 815.828L319.98 813.162H290.654L263.994 818.494H240L226.67 813.162L218.672 797.166L221.338 738.514L216.006 719.852L202.676 711.854L193.197 700.005L181.348 690.526L165.352 658.534L240 653.202L255.56 543.896L373.3 565.224L364.56 471.914L453.66 493.242L466.61 557.226L540.559 597.216L549.559 647.87L613.239 639.872L540.559 700.005L506.059 781.17L613.239 850.486Z"
                            fill="transparent" />
                    </clipPath>
                </defs>
                <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899"
                    clip-path="url(#clipPath2)" />
            </svg>

            <svg id="ball3" :class="{ 'active': activePopup === 4 }" xmlns="http://www.w3.org/2000/svg" width="883"
                height="899" viewBox="0 0 883 899" fill="none">
                <defs>
                    <clipPath id="clipPath3">
                        <path
                            d="M586.519 74.6468L626.509 85.3108L647.837 93.3087V97.8791L653.169 98.6408L655.835 100.774L658.501 101.307L666.499 109.305L666.909 112.176L679.829 130.633L698.491 151.961L711.821 167.957L725.151 189.285L727.817 202.615H733.149L751.811 242.605V247.937H757.143L770.473 285.261L778.471 317.253L799.798 335.915V340.485L805.13 341.247L807.797 343.913V345.246L810.463 346.579L815.795 365.241L821.127 389.235L825.489 394.324L829.125 397.233L828.908 398.314L837.122 407.897L853.118 429.225L866.448 458.551L877.112 490.543L749.145 430.558L647.837 501.207L567.857 478.499L453.6 493.209L439.889 389.235L527.999 398.314L567.857 335.915L519.999 278.499L509.205 189.285L561.999 183.999L604.499 127.967L586.519 74.6468Z"
                            fill="transparent" />
                    </clipPath>
                </defs>
                <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899"
                    clip-path="url(#clipPath3)" />
            </svg>

            <svg id="ball4" :class="{ 'active': activePopup === 2 }" xmlns="http://www.w3.org/2000/svg" width="883"
                height="899" viewBox="0 0 883 899" fill="none">
                <defs>
                    <clipPath id="clipPath4">
                        <path
                            d="M165.292 658.534V653.202L154.628 647.87L149.296 642.538V638.983L146.63 634.54L141.298 626.542L119.97 615.878V610.546L109.306 607.88L87.978 591.884L87.9762 591.882L74.6479 573.222L74.4056 572.495L72.326 569.524L71.9821 570.556L71.5554 568.423L69.316 565.224V557.226H63.984L47.988 525.234L21.328 493.242V485.244H15.996L10.6641 471.914V467.471L7.99805 458.584V430.591L5.33203 418.594L0 397.266L5.33203 383.936L34.658 367.94L50.6541 349.278L58.652 322.618H59.5406L61.318 317.286L69.316 301.29L71.9819 226.642L76.7427 200.934L77.314 194.65L85.312 154.66L87.978 149.328H93.3101L95.976 135.998L101.308 128L102.493 128.395L165.292 301.29L303 226.642L263.934 292.532L303 349.278L348 322.618L453.601 493.242L364.5 471.914L373.24 565.224L255.5 543.896L239.94 653.202L165.292 658.534Z"
                            fill="transparent" />
                    </clipPath>
                </defs>
                <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899"
                    clip-path="url(#clipPath4)" />
            </svg>

            <svg id="ball5" :class="{ 'active': activePopup === 1 }" xmlns="http://www.w3.org/2000/svg" width="883"
                height="899" viewBox="0 0 883 899" fill="none">
                <defs>
                    <clipPath id="clipPath5">
                        <path
                            d="M439.889 0L453.599 7.61713L455.885 7.99799L463.883 13.33L466.93 17.5194L469.215 18.662L474.547 27.993L485.211 42.656L490.543 47.988L490.133 48.8083L495.875 55.986L509.205 63.984L535.865 61.318H567.857L578.521 66.65L586.519 74.648L604.499 127.968L561.999 184L509.205 189.286L519.999 278.5L567.857 335.916L527.999 398.315L439.889 389.236L453.599 493.21L347.999 322.586L302.999 349.246L263.933 292.5L302.999 226.61L165.291 301.258L102.492 128.363L111.971 117.304L119.969 109.306L133.299 93.31L141.297 87.978L141.487 88.3589L143.478 86.7662L143.963 85.312L145.902 84.8273L151.961 79.98L170.623 71.982L171.956 70.649L173.289 66.65L181.287 61.3181L183.953 58.652L197.283 50.654L203.503 38.2127L205.281 31.992L207.058 31.1033L207.947 29.326L215.945 26.66L221.277 15.996L242.605 7.99799L243.372 7.96149L250.603 5.332L282.595 2.66602L349.245 2.66599L373.239 0H439.889Z"
                            fill="transparent" />
                    </clipPath>
                </defs>
                <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899"
                    clip-path="url(#clipPath5)" />
            </svg>
            <!-- <svg id="ball_all" xmlns="http://www.w3.org/2000/svg" width="883" height="899" viewBox="0 0 883 899"
                fill="none">
                <path class="ball1 clickPath" @click=" togglePopup(5)"
                    d="M877.173 490.576L882.505 501.24V530.566L874.507 543.896L855.844 565.224L842.515 578.554L826.519 591.884L810.522 597.216L807.856 607.88V639.872L818.521 682.528V741.18L807.856 762.508L794.527 767.84L749.205 773.172L735.875 778.504H731.432L722.545 781.17L719.879 789.168L690.553 805.164L687.887 810.496L659.894 820.493L661.227 821.16L645.858 827.746L634.567 837.156L613.239 850.486L506.059 781.17L540.559 700.005L613.239 639.872L549.559 647.87L540.559 597.216L466.61 557.226L453.66 493.242L567.917 478.532L647.897 501.24L749.205 430.591L877.173 490.576Z"
                    fill="transparent" />
                <path class="ball2 clickPath" @click=" togglePopup(3)"
                    d="M613.239 850.486L591.912 861.15H557.254L519.93 866.482L487.938 890.476L466.61 898.474H437.284L431.063 895.808H429.286L407.292 885.811L405.292 885.144L399.963 882.479L399.96 882.478L386.63 869.148V863.816H381.298L373.3 847.82L354.638 829.158L327.978 815.828L319.98 813.162H290.654L263.994 818.494H240L226.67 813.162L218.672 797.166L221.338 738.514L216.006 719.852L202.676 711.854L193.197 700.005L181.348 690.526L165.352 658.534L240 653.202L255.56 543.896L373.3 565.224L364.56 471.914L453.66 493.242L466.61 557.226L540.559 597.216L549.559 647.87L613.239 639.872L540.559 700.005L506.059 781.17L613.239 850.486Z"
                    fill="transparent" />
                <path class="ball3 clickPath" @click=" togglePopup(4)"
                    d="M586.519 74.6468L626.509 85.3108L647.837 93.3087V97.8791L653.169 98.6408L655.835 100.774L658.501 101.307L666.499 109.305L666.909 112.176L679.829 130.633L698.491 151.961L711.821 167.957L725.151 189.285L727.817 202.615H733.149L751.811 242.605V247.937H757.143L770.473 285.261L778.471 317.253L799.798 335.915V340.485L805.13 341.247L807.797 343.913V345.246L810.463 346.579L815.795 365.241L821.127 389.235L825.489 394.324L829.125 397.233L828.908 398.314L837.122 407.897L853.118 429.225L866.448 458.551L877.112 490.543L749.145 430.558L647.837 501.207L567.857 478.499L453.6 493.209L439.889 389.235L527.999 398.314L567.857 335.915L519.999 278.499L509.205 189.285L561.999 183.999L604.499 127.967L586.519 74.6468Z"
                    fill="transparent" />
                <path class="ball4 clickPath" @click=" togglePopup(2)"
                    d="M165.292 658.534V653.202L154.628 647.87L149.296 642.538V638.983L146.63 634.54L141.298 626.542L119.97 615.878V610.546L109.306 607.88L87.978 591.884L87.9762 591.882L74.6479 573.222L74.4056 572.495L72.326 569.524L71.9821 570.556L71.5554 568.423L69.316 565.224V557.226H63.984L47.988 525.234L21.328 493.242V485.244H15.996L10.6641 471.914V467.471L7.99805 458.584V430.591L5.33203 418.594L0 397.266L5.33203 383.936L34.658 367.94L50.6541 349.278L58.652 322.618H59.5406L61.318 317.286L69.316 301.29L71.9819 226.642L76.7427 200.934L77.314 194.65L85.312 154.66L87.978 149.328H93.3101L95.976 135.998L101.308 128L102.493 128.395L165.292 301.29L303 226.642L263.934 292.532L303 349.278L348 322.618L453.601 493.242L364.5 471.914L373.24 565.224L255.5 543.896L239.94 653.202L165.292 658.534Z"
                    fill="transparent" />
                <path class="ball5 clickPath" @click=" togglePopup(1)"
                    d="M439.889 0L453.599 7.61713L455.885 7.99799L463.883 13.33L466.93 17.5194L469.215 18.662L474.547 27.993L485.211 42.656L490.543 47.988L490.133 48.8083L495.875 55.986L509.205 63.984L535.865 61.318H567.857L578.521 66.65L586.519 74.648L604.499 127.968L561.999 184L509.205 189.286L519.999 278.5L567.857 335.916L527.999 398.315L439.889 389.236L453.599 493.21L347.999 322.586L302.999 349.246L263.933 292.5L302.999 226.61L165.291 301.258L102.492 128.363L111.971 117.304L119.969 109.306L133.299 93.31L141.297 87.978L141.487 88.3589L143.478 86.7662L143.963 85.312L145.902 84.8273L151.961 79.98L170.623 71.982L171.956 70.649L173.289 66.65L181.287 61.3181L183.953 58.652L197.283 50.654L203.503 38.2127L205.281 31.992L207.058 31.1033L207.947 29.326L215.945 26.66L221.277 15.996L242.605 7.99799L243.372 7.96149L250.603 5.332L282.595 2.66602L349.245 2.66599L373.239 0H439.889Z"
                    fill="transparent" />
            </svg> -->

            <svg id="ball_all" width="1004" height="1030" viewBox="0 0 1004 1030" fill="none"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                <path
                    d="M670.018 81L715.841 93.775L740.28 103.356V108.831L746.39 109.744L749.445 112.299L752.5 112.938L761.665 122.519L762.135 125.958L776.939 148.069L798.323 173.619L813.598 192.781L828.872 218.331L831.927 234.3H838.037L859.421 282.206V288.594H865.531L880.805 333.306L889.97 371.631L914.409 393.987V399.462L920.518 400.375L923.573 403.569L923.573 405.166L926.628 406.762L932.738 429.119L938.848 457.862L943.846 463.96L948.012 467.444L947.764 468.738L957.177 480.219L975.506 505.769L990.78 540.9L1003 579.225L856.366 507.366L740.28 592L648.634 564.797L517.711 582.419L502 457.862L602.962 468.738L648.634 393.987L593.795 325.206L581.427 218.331L641.922 211.999L690.621 144.875L670.018 81Z"
                    fill="#000" class="clickPath" stroke="#fff" @click="togglePopup(4)" />
                <path
                    d="M1004 580.143V588.714V620.143L994.899 634.429L973.662 657.286L958.494 671.571L940.291 685.857L922.089 691.571L919.055 703V737.286L931.19 783V845.857L919.055 868.714L903.886 874.429L852.313 880.143L837.144 885.857H832.088L821.975 888.714L818.941 897.286L785.57 914.429L782.536 920.143L750.682 930.857L752.199 931.571L734.71 938.63L721.861 948.714L694.5 973.5L631 931.571L570 891.5L609.5 798L692.5 725L620.5 734.5L609.5 674.5L523 627.5L516 580.143L646.018 564.378L737.03 588.714L859 506L1004 580.143Z"
                    fill="#000" class="clickPath" stroke="#fff" @click="togglePopup(5)" />
                <path
                    d="M694.013 973.299L669.49 985.899H629.638L586.722 992.199L549.936 1020.55L525.412 1030H491.692L484.539 1026.85H482.496L457.206 1015.04L454.906 1014.25L448.779 1011.1L448.775 1011.1L433.448 995.349V989.049H427.317L418.121 970.149L396.662 948.099L366.007 932.349L356.811 929.199H323.091L292.436 935.499H264.847L249.519 929.199L240.323 910.299L243.388 840.999L237.257 818.949L221.93 809.499L211.031 795.499L197.406 784.299L189 776L264.847 740.199L292.436 641L427.317 666.999L418 556L516.513 581.5L525.412 626.799L610.443 674.049L620.792 733.899L694.013 724.449L610.443 798.999L570.773 891.399L694.013 973.299Z"
                    fill="#000" class="clickPath" stroke="#fff" @click="togglePopup(3)" />
                <path
                    d="M189.852 778V771.699L177.604 765.397L171.479 759.095V754.894L168.417 749.643L162.293 740.191L137.796 727.588V721.286L125.547 718.136L101.05 699.231L101.048 699.228L85.7397 677.176L85.4614 676.317L83.0727 672.805L82.6776 674.025L82.1877 671.505L79.6154 667.724V658.271H73.4912L55.1184 620.462L24.4971 582.653V573.201H18.3728L12.2485 557.447V552.196L9.1864 541.693V508.611L6.12427 494.432L0 469.226L6.12427 453.472L39.8077 434.568L58.1805 412.513L67.3669 381.005H68.3876L70.4291 374.704L79.6154 355.799L82.6776 267.578L88.1457 237.196L88.8018 229.769L97.9883 182.508L101.05 176.206H107.175L110.237 160.452L116.361 151L117.722 151.467L189.852 355.799L348.022 267.578L303.151 345.449L348.022 412.513L399.708 381.005L521 582.653L418.66 557.447L428.699 667.724L293.464 642.518L265 740.191L189.852 778Z"
                    fill="#000" class="clickPath" stroke="#fff" @click="togglePopup(2)" />
                <path
                    d="M504.8 0L520.559 9.00385L523.185 9.45405L532.378 15.7568L535.88 20.7089L538.506 22.0595L544.635 33.0892L556.892 50.4216L563.021 56.7243L562.549 57.694L569.149 66.1784L584.47 75.6324L615.113 72.4811L651.884 72.4811L664.141 78.7838L673.334 88.2378L694 151.265L645.151 217.498L584.47 223.746L596.877 329.202L651.884 397.07L606.072 470.829L504.8 460.097L520.559 583L399.182 381.314L347.46 412.827L302.558 345.75L347.46 267.865L189.18 356.103L117 151.732L127.895 138.659L137.088 129.205L152.409 110.297L161.602 103.995L161.821 104.445L164.109 102.562L164.666 100.843L166.895 100.27L173.859 94.5405L195.309 85.0865L196.841 83.5108L198.373 78.7838L207.566 72.4812L210.63 69.3297L225.952 59.8757L233.102 45.1695L235.144 37.8162L237.187 36.7658L238.209 34.6649L247.401 31.5135L253.53 18.9081L278.044 9.45405L278.926 9.41089L287.237 6.3027L324.008 3.15137L400.615 3.15135L428.193 0H504.8Z"
                    fill="#000" class="clickPath" stroke="#fff" @click="togglePopup(1)" />
            </svg>

        </div>
        <div class="ohMyGod" @click="ballsGoHome"></div>

        <!-- 彈出框 -->
        <div v-if="activePopup === 1" class="popup">
            <div class="popup-content  popupone">
                <span class="popup-title">星球探索</span>
                <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark" @click="closePopup"></div>
                <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
                <p>虛擬行星探索: 創建虛擬現實或擴增實境體驗，讓體驗者“登陸”，探索不同的地形、生物和環境。</p>
            </div>
        </div>

        <div v-if="activePopup === 2" class="popup ">
            <div class="popup-content popuptwo">
                <span class="popup-title">太空人生活</span>
                <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark" @click="closePopup"></div>
                <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
                <p>從服裝到飲食，日常活動到駕駛飛行船，一次體驗宇航者生活!</p>
            </div>
        </div>

        <div v-if="activePopup === 3" class="popup ">
            <div class="popup-content popupthree">
                <span class="popup-title">外星文明</span>
                <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark" @click="closePopup"></div>
                <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
                <p>探索神秘的外星文化，另一個地球。銀河系中至少有36個與地球相似的、活躍的、科技發達的智慧文明。或者說外星文明。</p>
            </div>
        </div>

        <div v-if="activePopup === 4" class="popup ">
            <div class="popup-content popupfour">
                <span class="popup-title">互動體驗</span>
                <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark" @click="closePopup"></div>
                <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
                <p>交互式星圖，可以探索星座、行星和其他天體。</p>
            </div>
        </div>

        <div v-if="activePopup === 5" class="popup">
            <div class="popup-content  popupfive">
                <span class="popup-title">視聽覺饗宴</span>
                <div><img src="../assets/images/icon-xmark.svg" alt="" class="icon-xmark" @click="closePopup"></div>
                <!-- <font-awesome-icon icon="fa-regular fa-circle-xmark" class="icon-xmark" /> -->
                <p>360度的宇宙全景影片，感受身臨其境的星際旅行。</p>
            </div>

        </div>
    </div>
</template>

<script setup>
//隕石


//文字框設定 
// import { ref } from 'vue';

import { ref, onMounted, onBeforeUnmount } from 'vue';

// 定義 activePopup 狀態
const activePopup = ref(null);

// 切換對應的 Popup 顯示狀態
function togglePopup(popupNumber, id) {
    console.log(popupNumber, id);

    activePopup.value = popupNumber;


}

// 關閉 Popup並讓隕石也回家
function closePopup() {
    activePopup.value = null;

}


// 全局點擊事件處理
function handleGlobalClick(event) {
    // 檢查點擊的目標是否在隕石或彈出框內
    if (!event.target.closest('.clickPath') && !event.target.closest('.popup-content')) {
        closePopup();  // 關閉彈出框並重置隕石
    }
}

// 在組件掛載時添加全局點擊事件
onMounted(() => {
    document.addEventListener('click', handleGlobalClick);
});

// 在組件銷毀前移除全局點擊事件
onBeforeUnmount(() => {
    document.removeEventListener('click', handleGlobalClick);
});


</script>


<style lang="scss" scoped>
.forhight {
    height: 500px;
}

// svg {
//   transition: transform 0.3s ease, filter 0.3s ease;

// }



/* 定義閃爍動畫 */
@keyframes flicker {
    0% {
        filter: drop-shadow(0px 0px 5px rgba(255, 255, 255, 0.5));
    }

    50% {
        filter: drop-shadow(0px 0px 15px rgba(255, 255, 255, 1));
    }

    100% {
        filter: drop-shadow(0px 0px 5px rgba(255, 255, 255, 0.5));
    }
}

/* 為隕石設置閃爍效果 */
svg {
    transition: transform 0.3s ease;
    animation: flicker 1.5s infinite;
    /* 持續閃爍 */
    cursor: pointer;
    /* 提示可以互動 */
}

/* 點擊隕石時放大並保持亮度 */
svg.active {
    transform: scale(1.2);
    filter: drop-shadow(0px 0px 15px rgba(204, 219, 232, 0.8));
    //   animation: none; /* 點擊後停止閃爍效果，保持亮度 */
}



.ohMyGod {
    width: 100%;
    // max-width: 1440px;
    height: 70vh;


}



.theRock>svg {
    position: absolute;

}

// .clickPath {
//     transform: scale(0.75) translate(20px, 40px);
// }

#ball_all,
#ball1,
#ball2,
#ball3,
#ball4,
#ball5 {
    position: absolute;
    // left: calc(72vw - (883px / 2));
    left: calc(100vw - 65%);
    pointer-events: none;

    // transform: ;
    transition: transform 0.8s ease, ;
    // border: 1px solid red;
    cursor: pointer;
    width: 320px !important;
    height: 400px !important;
    margin-top: 20px;

    &.active {
        // width: 400px !important;
        // transform: translate(300px, 0) !important;

        &#ball1 {
            transform: translate(50px, 0px)
        }

        &#ball2 {
            transform: translate(-80px, 50px)
        }

        &#ball3 {
            transform: translate(50px, -50px)
        }

        &#ball4 {
            transform: translate(-80px, 0px)
        }

        &#ball5 {
            transform: translate(-50px, -50px)
        }

    }

}


#ball_all {
    border: 1px solid red;
}

#ball_all>.clickPath:hover {
    box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
    border: 1px solid red;
}





#ball_all {
    pointer-events: auto;
    opacity: 0;

}



//我的文字介紹框

.popup {
    position: absolute;
    // position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    /* background-color: white; */
    border: none;
    z-index: 1000;
    transition: transform 0.8s ease;
}

.popup-content {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: end;
    /* 確保子元素居中 */
    width: 350px;
    height: 150px;
    border: 5px solid #2668C866;
    border-radius: 12px;
    padding: 15px;
    box-sizing: border-box;
    background-color: rgba(0, 0, 0, 0.509);
    /* 確保背景透明 */
    animation: draw-border 2.5s forwards;
    /* 邊框動畫 */
}


.popup-title {
    font-weight: bold;
    font-size: 24px;

    background: black;
    /* background-color: red; */
    /* 黑色背景 */
    // background: linear-gradient(136deg, #FFF 3.13%, rgba(255, 255, 255, 0.30) 97.6%);
    // background-clip: text;
    // -webkit-background-clip: text;
    // -webkit-text-fill-color: transparent;


    color: #d1d1d1;
    /* 文字在邊框上 */
    position: fixed;
    top: -15px;
    left: 21px;

}



@keyframes draw-border {
    0% {
        border-color: transparent;
    }

    25% {
        border-top-color: #2668C866;
    }

    50% {
        border-top-color: #2668C866;
        border-right-color: #2668C866;
    }

    75% {
        border-top-color: #2668C866;
        border-right-color: #2668C866;
        border-bottom-color: #2668C866;
    }

    100% {
        border-color: #2668C866;
    }
}

.icon-xmark {
    margin-bottom: 10px;
    cursor: pointer;
}


.popup-content p {
    color: white;
    line-height: 1.6;
}

/* 控制位置的 */
.popupone {
    position: fixed;
    top: 1990%;
    left: 400%;
    transform: translate(-170%, -150%);
}

.popuptwo {
    position: fixed;
    top: 1880%;
    left: 135%;
    transform: translate(-155%, -25%);
}

.popupthree {
    position: fixed;
    top: 2020%;
    left: 100%;
    transform: translate(-160%, 55%);
}

.popupfour {
    position: fixed;
    top: 2100%;
    left: -100%;
    transform: translate(55%, -130%);
}


.popupfive {
    position: fixed;
    top: 2080%;
    left: -145%;
    transform: translate(65%, 5%);
}

@media (max-width: 1000px) {
    .popupone {
        position: fixed;
        top: 2165%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }

    .popuptwo {
        position: fixed;
        top: 2165%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }

    .popupthree {
        position: fixed;
        top: 2165%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }

    .popupfour {
        position: fixed;
        top: 2165%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }


    .popupfive {
        position: fixed;
        top: 2480%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }

}

@media (max-width: 768px) {

    .forhight {
        margin-top: 40px;
        height: 400px;
    }

    #ball_all,
    #ball1,
    #ball2,
    #ball3,
    #ball4,
    #ball5 {
        left: calc(72vw - 50%);
    }

    .popupone {
        position: fixed;
        top: 1768%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }

    .popuptwo {
        position: fixed;
        top: 1768%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }

    .popupthree {
        position: fixed;
        top: 1768%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }

    .popupfour {
        position: fixed;
        top: 1768%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }


    .popupfive {
        position: fixed;
        top: 1768%;
        left: 1075%;
        transform: translate(-170%, -150%);
    }


}

@media (max-width: 768px) {

    #ball_all,
    #ball1,
    #ball2,
    #ball3,
    #ball4,
    #ball5 {
        width: 280px !important;
        height: 300px !important;
    }

    .popupone {
        position: fixed;
        top: 1200%;
        left: 1095%;
        transform: translate(-170%, -150%);
    }

    .popuptwo {
        position: fixed;
        top: 1200%;
        left: 1095%;
        transform: translate(-170%, -150%);
    }

    .popupthree {
        position: fixed;
        top: 1200%;
        left: 1095%;
        transform: translate(-170%, -150%);
    }

    .popupfour {
        position: fixed;
        top: 1200%;
        left: 1095%;
        transform: translate(-170%, -150%);
    }


    .popupfive {
        position: fixed;
        top: 1200%;
        left: 1095%;
        transform: translate(-170%, -150%);
    }

}

@media (max-width: 768px) {

    .forhight {
        margin-top: 0px;
        
        height: 400px;
    }

    #ball_all,
    #ball1,
    #ball2,
    #ball3,
    #ball4,
    #ball5 {
        width: 250px !important;
        height: 380px !important;
    }




}
</style>
