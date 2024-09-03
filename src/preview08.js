// src / preview.js
import { createApp } from 'vue';

import SF_TicketDesign from './views/SF_TicketDesign.vue';
import MS_customization from './components/MS/MS_customization.vue';



import ProductPage from './views/ProductPage.vue';





const app = createApp(ProductPage);


app.mount('#preview-app');
