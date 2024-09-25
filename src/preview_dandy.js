import { createApp } from 'vue';
import MS_index from '@/components/MS/MS_index.vue';

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faFacebook, faLine, faInstagram, faYoutube, faThreads, faBilibili, faTiktok, faXTwitter, faWeibo } from '@fortawesome/free-brands-svg-icons'

// 将图标添加到库中
library.add(faFacebook, faLine, faInstagram, faYoutube, faThreads, faBilibili, faTiktok, faXTwitter, faWeibo ,faCartShopping ,faBars ,faFaceSmile,faCircleUser,faAddressCard)

const app = createApp(MS_index);

app.component('font-awesome-icon', FontAwesomeIcon);

app.mount('#app');


// // ---以下新增---
// import { faChevronDown } from '@fortawesome/free-solid-svg-icons'
import { faCartShopping } from '@fortawesome/free-solid-svg-icons'
// import { faArrowRightLong } from '@fortawesome/free-solid-svg-icons'
// import { faArrowLeftLong } from '@fortawesome/free-solid-svg-icons'
// import { faFaceMeh } from '@fortawesome/free-regular-svg-icons'
// import { faCartArrowDown } from '@fortawesome/free-solid-svg-icons'
import { faBars } from '@fortawesome/free-solid-svg-icons'
// import { faCircleXmark } from '@fortawesome/free-regular-svg-icons'
import { faFaceSmile } from '@fortawesome/free-regular-svg-icons'
import { faAddressCard } from '@fortawesome/free-solid-svg-icons'
import { faCircleUser } from '@fortawesome/free-regular-svg-icons'




// const pinia = createPinia();
// const app = createApp(App);

// app.use(pinia);
// app.mount('#app');




// // ---libary也要加---//
// library.add(faChevronDown,faFaceSmile,faCartShopping,faArrowRightLong,faArrowLeftLong,faFaceMeh,faCartArrowDown,faBars,faCircleXmark,faAddressCard,faCircleUser)


// createApp(App).component('font-awesome-icon', FontAwesomeIcon,"v-select", vSelect).use(router,VueSweetalert2).mount("#app");
