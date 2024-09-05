// src/preview.js
import { createApp } from 'vue';
// import MyComponent from './components/Btn_Lifecasino.vue';
// import MyComponent from './views/OrderProductPopCMS.vue';
import "@/assets/css/reset.css";



// library.add(faFaceMeh)

// ========================
import { library, text } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// import { faFaceMeh } from '@fortawesome/free-solid-svg-icons';
import { faFaceMeh } from '@fortawesome/free-regular-svg-icons';
// import OrderProductPopCMS from './components/OrderProductPopCMS.vue';
// import LC_text from './components/LC_text.vue';
// import LC_h2Text from './components/LC_h2Text.vue';
// import test from'./views/test.vue'
// import LC_Jackpot from './components/LC_Jackpot.vue';
// import SlotMachine from './components/SlotMachine.vue';
// import MindSpectrum from './views/MindSpectrum.vue';
// import LC_Reviews from './components/LC_Reviews.vue';
import LC_Nav from './components/LC_Nav.vue';
// import Gift from './components/Gift.vue';



library.add(faFaceMeh);


const app = createApp(LC_Nav);
// app.mount('#preview-app');

app.component('font-awesome-icon', FontAwesomeIcon).mount("#preview-app");
