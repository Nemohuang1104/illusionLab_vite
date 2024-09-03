// src/preview.js
import { createApp } from 'vue';
// import MyComponent from './components/Btn_Lifecasino.vue';
// import MyComponent from './views/OrderProductPopCMS.vue';
import "@/assets/css/reset.css";



// library.add(faFaceMeh)

// ========================
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// import { faFaceMeh } from '@fortawesome/free-solid-svg-icons';
import { faFaceMeh } from '@fortawesome/free-regular-svg-icons';
import OrderProductPopCMS from './components/OrderProductPopCMS.vue';



library.add(faFaceMeh);


const app = createApp(OrderProductPopCMS);
// app.mount('#preview-app');

app.component('font-awesome-icon', FontAwesomeIcon).mount("#preview-app");
