import { createApp } from 'vue';
// import ShoppingCar3 from './views/ShoppingCar3.vue';
// import ShoppingCar2 from './views/ShoppingCar2.vue';
// import MemberInfo from './views/MemberInfo.vue';
// import PasswordEdit from './views/PasswordEdit.vue';
// import OrderQuery from './views/OrderQuery.vue';
// import RefundQuery from './views/RefundQuery.vue';
// import MemberCenter from './views/MemberCenter.vue';
// import LoginCMS from './views/LoginCMS.vue';
// import MemberCMS from './views/MemberCMS.vue';
// import CenterCMS from './views/CenterCMS.vue';
// import MS_com_ticket_intro from './components/MS/MS_com_ticket_intro.vue';
import MindSpectrum from './views/MindSpectrum.vue';

/*使用路由preview*/
// import previewrouter from "./router/preview_wennie_index";
// const app = createApp(CenterCMS);
// app.use(previewrouter).mount('#preview-app');


// import previewrouter from "./router/preview_wennie_index";
// const app = createApp(MemberCenter);
// app.use(previewrouter).mount('#preview-app');
 
/*一般頁面preview*/
const app = createApp(MindSpectrum);
app.mount('#preview-app');