<template>
   <div class="theRock">
    <svg id="one" :class="{'Boom1': isBoom}"  @click="explodeRock('one')" xmlns="http://www.w3.org/2000/svg" width="883" height="899" viewBox="0 0 883 899" fill="none">
        <defs>
            <clipPath id="clipPath">
                <path d="M877.173 490.576L882.505 501.24V530.566L874.507 543.896L855.844 565.224L842.515 578.554L826.519 591.884L810.522 597.216L807.856 607.88V639.872L818.521 682.528V741.18L807.856 762.508L794.527 767.84L749.205 773.172L735.875 778.504H731.432L722.545 781.17L719.879 789.168L690.553 805.164L687.887 810.496L659.894 820.493L661.227 821.16L645.858 827.746L634.567 837.156L613.239 850.486L506.059 781.17L540.559 700.005L613.239 639.872L549.559 647.87L540.559 597.216L466.61 557.226L453.66 493.242L567.917 478.532L647.897 501.24L749.205 430.591L877.173 490.576Z" fill="black"/>
            </clipPath>
        </defs>
        <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899" clip-path="url(#clipPath)"/> 
    </svg>
    <svg id="two" :class="{'Boom1': isBoom.two}" @click="explodeRock('two')" xmlns="http://www.w3.org/2000/svg" width="883" height="899" viewBox="0 0 883 899" fill="none">
        <defs>
            <clipPath id="clipPath2">
                <path d="M613.239 850.486L591.912 861.15H557.254L519.93 866.482L487.938 890.476L466.61 898.474H437.284L431.063 895.808H429.286L407.292 885.811L405.292 885.144L399.963 882.479L399.96 882.478L386.63 869.148V863.816H381.298L373.3 847.82L354.638 829.158L327.978 815.828L319.98 813.162H290.654L263.994 818.494H240L226.67 813.162L218.672 797.166L221.338 738.514L216.006 719.852L202.676 711.854L193.197 700.005L181.348 690.526L165.352 658.534L240 653.202L255.56 543.896L373.3 565.224L364.56 471.914L453.66 493.242L466.61 557.226L540.559 597.216L549.559 647.87L613.239 639.872L540.559 700.005L506.059 781.17L613.239 850.486Z" fill="black"/>
            </clipPath>
        </defs>
        <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899" clip-path="url(#clipPath2)"/> 
    </svg>
    <svg id="three" :class="{'Boom1': isBoom.three}" @click="explodeRock('three')" xmlns="http://www.w3.org/2000/svg" width="883" height="899" viewBox="0 0 883 899" fill="none">
        <defs>
            <clipPath id="clipPath3">
                <path d="M586.519 74.6468L626.509 85.3108L647.837 93.3087V97.8791L653.169 98.6408L655.835 100.774L658.501 101.307L666.499 109.305L666.909 112.176L679.829 130.633L698.491 151.961L711.821 167.957L725.151 189.285L727.817 202.615H733.149L751.811 242.605V247.937H757.143L770.473 285.261L778.471 317.253L799.798 335.915V340.485L805.13 341.247L807.797 343.913V345.246L810.463 346.579L815.795 365.241L821.127 389.235L825.489 394.324L829.125 397.233L828.908 398.314L837.122 407.897L853.118 429.225L866.448 458.551L877.112 490.543L749.145 430.558L647.837 501.207L567.857 478.499L453.6 493.209L439.889 389.235L527.999 398.314L567.857 335.915L519.999 278.499L509.205 189.285L561.999 183.999L604.499 127.967L586.519 74.6468Z" fill="black"/>
            </clipPath>
        </defs>
        <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899" clip-path="url(#clipPath3)"/> 
    </svg>
    <svg id="four" :class="{'Boom1': isBoom.four}" @click="explodeRock('four')"  xmlns="http://www.w3.org/2000/svg" width="883" height="899" viewBox="0 0 883 899" fill="none">
        <defs>
            <clipPath id="clipPath4">
                <path d="M165.292 658.534V653.202L154.628 647.87L149.296 642.538V638.983L146.63 634.54L141.298 626.542L119.97 615.878V610.546L109.306 607.88L87.978 591.884L87.9762 591.882L74.6479 573.222L74.4056 572.495L72.326 569.524L71.9821 570.556L71.5554 568.423L69.316 565.224V557.226H63.984L47.988 525.234L21.328 493.242V485.244H15.996L10.6641 471.914V467.471L7.99805 458.584V430.591L5.33203 418.594L0 397.266L5.33203 383.936L34.658 367.94L50.6541 349.278L58.652 322.618H59.5406L61.318 317.286L69.316 301.29L71.9819 226.642L76.7427 200.934L77.314 194.65L85.312 154.66L87.978 149.328H93.3101L95.976 135.998L101.308 128L102.493 128.395L165.292 301.29L303 226.642L263.934 292.532L303 349.278L348 322.618L453.601 493.242L364.5 471.914L373.24 565.224L255.5 543.896L239.94 653.202L165.292 658.534Z" fill="black"/>
            </clipPath>
        </defs>
        <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899" clip-path="url(#clipPath4)"/> 
    </svg>
    <svg id="five"  :class="{'Boom1': isBoom.five}" @click="explodeRock('five')"  xmlns="http://www.w3.org/2000/svg" width="883" height="899" viewBox="0 0 883 899" fill="none">
        <defs>
            <clipPath id="clipPath5">
                <path d="M439.889 0L453.599 7.61713L455.885 7.99799L463.883 13.33L466.93 17.5194L469.215 18.662L474.547 27.993L485.211 42.656L490.543 47.988L490.133 48.8083L495.875 55.986L509.205 63.984L535.865 61.318H567.857L578.521 66.65L586.519 74.648L604.499 127.968L561.999 184L509.205 189.286L519.999 278.5L567.857 335.916L527.999 398.315L439.889 389.236L453.599 493.21L347.999 322.586L302.999 349.246L263.933 292.5L302.999 226.61L165.291 301.258L102.492 128.363L111.971 117.304L119.969 109.306L133.299 93.31L141.297 87.978L141.487 88.3589L143.478 86.7662L143.963 85.312L145.902 84.8273L151.961 79.98L170.623 71.982L171.956 70.649L173.289 66.65L181.287 61.3181L183.953 58.652L197.283 50.654L203.503 38.2127L205.281 31.992L207.058 31.1033L207.947 29.326L215.945 26.66L221.277 15.996L242.605 7.99799L243.372 7.96149L250.603 5.332L282.595 2.66602L349.245 2.66599L373.239 0H439.889Z" fill="black"/>           
            </clipPath>
        </defs>
        <image href="../assets/images/SF_ROCK.png" x="0" y="0" width="883" height="899" clip-path="url(#clipPath5)"/> 
    </svg>
    <!-- <div class="touchMyBody" @click="boom"></div> -->
</div>
</template>

<script setup>
import { reactive } from 'vue';

const isBoom = reactive({
  one: false,
  two: false,
  three: false,
  four: false,
  five: false
});

const explodeRock = (rockId) => {
  // Reset all rocks to false
  Object.keys(isBoom).forEach(key => {
    isBoom[key] = false;
  });
  // Set clicked rock to true
  isBoom[rockId] = true;
};



</script>

<style lang="scss" scoped>
.theRock {
    position: relative;
    width: 100%;
    height: 100vh;
}

.theRock>svg {
    position: absolute;
    transform: scale(0.5);
    /* 移動至中心 */
    left: calc(50% - (883px / 2));
    top: calc((-449.5px / 2) + 50px);
    cursor: pointer;
    pointer-events: auto;
}


.theRock {
  transform:translateY(-20px); /* 調整這裡的 scale 和 translateY 來改變動作 */
}


.theRock svg {
  z-index: 1;
  pointer-events: visiblePainted; /* 允許可見部分的點擊事件 */
  transition: transform 0.5s ease;
}

.touchMyBody {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0; /* 確保不覆蓋 SVG */
}

</style>




