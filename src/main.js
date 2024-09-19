// import { createApp } from "vue"
// // import "./style.sass"
// import App from "./App.vue"
// import router from '@/router/index.js'

// createApp(App).use(router).mount("#app")

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import "@/assets/css/reset.css";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import VueSweetalert2 from 'vue-sweetalert2'; 
import 'sweetalert2/dist/sweetalert2.min.css';
import { createPinia } from 'pinia';

// ============fontawsome==================
//參考網址: https://reurl.cc/4dQ4gD
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// ---以下新增---
import { faChevronDown } from '@fortawesome/free-solid-svg-icons'
import { faCartShopping } from '@fortawesome/free-solid-svg-icons'
import { faArrowRightLong } from '@fortawesome/free-solid-svg-icons'
import { faArrowLeftLong } from '@fortawesome/free-solid-svg-icons'
import { faFaceMeh } from '@fortawesome/free-regular-svg-icons'
import { faCartArrowDown } from '@fortawesome/free-solid-svg-icons'
import { faBars } from '@fortawesome/free-solid-svg-icons'
import { faCircleXmark } from '@fortawesome/free-regular-svg-icons'
import { faFaceSmile } from '@fortawesome/free-regular-svg-icons'
import { faAddressCard } from '@fortawesome/free-solid-svg-icons'
import { faCircleUser } from '@fortawesome/free-regular-svg-icons'




const pinia = createPinia();
const app = createApp(App);

app.use(pinia);
app.mount('#app');




// ---libary也要加---//
library.add(faChevronDown,faFaceSmile,faCartShopping,faArrowRightLong,faArrowLeftLong,faFaceMeh,faCartArrowDown,faBars,faCircleXmark,faAddressCard,faCircleUser)


createApp(App).component('font-awesome-icon', FontAwesomeIcon,"v-select", vSelect).use(router,VueSweetalert2).mount("#app");

