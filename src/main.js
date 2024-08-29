// import { createApp } from "vue"
// // import "./style.sass"
// import App from "./App.vue"
// import router from '@/router/index.js'

// createApp(App).use(router).mount("#app")

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import "@/assets/css/reset.css"
// ============fontawsome==================
//參考網址: https://reurl.cc/4dQ4gD
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
// ---以下新增---
import { faChevronDown } from '@fortawesome/free-solid-svg-icons'
import { faFaceMeh } from '@fortawesome/free-solid-svg-icons'




// ---libary也要加---//
library.add(faChevronDown, faFaceMeh)

createApp(App).component('font-awesome-icon', FontAwesomeIcon).use(router).mount("#app");

