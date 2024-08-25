import { createApp } from 'vue';
import ShoppingCar3 from './views/ShoppingCar3.vue';
import ShoppingCar2 from './views/ShoppingCar2.vue';
import '@fortawesome/fontawesome-free/css/all.css' // 引入Font Awesome的CSS

const app = createApp(ShoppingCar2);
app.mount('#preview-app');
