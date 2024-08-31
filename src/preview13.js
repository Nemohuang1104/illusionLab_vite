// src/preview.js
import { createApp } from 'vue';
// import StrellarFrontierIntro from './views/StrellarFrontierIntro.vue';
// import StrellarFrontier from './views/StrellarFrontierHomepage.vue';
import ProductPage from './views/ProductPage.vue';
// import StrellarFrontierAdventuresTitle from './views/StrellarFrontierAdventuresTitle.vue';
// import Header_0 from './components/Header_0.vue';
// import Header_2 from './components/Header_2.vue';
// import Footer_0 from './components/Footer_0.vue';
// import Footer_2 from './components/Footer_2.vue';
// import DetailList from './views/DetailList.vue';
// import SFHeader_0 from './components/SFHeader_0.vue';
// import OrderTicketPopCMS from './components/OrderTicketPopCMS.vue';




// ========================
//這裡要引入font-aswone的css
//參考網址: https://reurl.cc/4dQ4gD
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


//新增icon連結在下面 import { faFaceMeh } from '@fortawesome/free-solid-svg-icons'
import { faCartShopping } from '@fortawesome/free-solid-svg-icons'
import { faFaceSmile } from '@fortawesome/free-solid-svg-icons'
import { faArrowRightLong } from '@fortawesome/free-solid-svg-icons'
import { faArrowLeftLong } from '@fortawesome/free-solid-svg-icons'
import { faFaceMeh } from '@fortawesome/free-regular-svg-icons'



library.add(faCartShopping,faFaceSmile,faArrowRightLong,faArrowLeftLong,faFaceMeh);

const app = createApp(ProductPage);


app.component('font-awesome-icon', FontAwesomeIcon).mount("#preview-app");

// app.mount('#preview-app');