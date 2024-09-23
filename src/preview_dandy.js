import { createApp } from 'vue';
import MS_index from '@/components/MS/MS_index.vue';

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faFacebook, faLine, faInstagram, faYoutube, faThreads, faBilibili, faTiktok, faXTwitter, faWeibo } from '@fortawesome/free-brands-svg-icons'

// 将图标添加到库中
library.add(faFacebook, faLine, faInstagram, faYoutube, faThreads, faBilibili, faTiktok, faXTwitter, faWeibo)

const app = createApp(MS_index);

app.component('font-awesome-icon', FontAwesomeIcon);

app.mount('#app');
