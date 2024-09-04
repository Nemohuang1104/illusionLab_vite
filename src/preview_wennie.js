import { createApp } from 'vue';
import ElementPlus from 'element-plus'
// import 'element-plus/dist/index.css'
// import ShoppingCar3 from './views/ShoppingCar3.vue';
import ShoppingCar2 from './views/ShoppingCar2.vue';
// import MemberInfo from './views/MemberInfo.vue';
// import PasswordEdit from './views/PasswordEdit.vue';
// import OrderQuery from './views/OrderQuery.vue';
// import RefundQuery from './views/RefundQuery.vue';
// import MemberCenter from './views/MemberCenter.vue';
// import LoginCMS from './views/LoginCMS.vue';
// import MemberCMS from './views/MemberCMS.vue';
import CenterCMS from './views/CenterCMS.vue';
// import MS_com_ticket_intro from './components/MS/MS_com_ticket_intro.vue';
// import MindSpectrum from './views/MindSpectrum.vue';
// import SignUp from './views/SignUp.vue';
// import Header_0 from './components/Header_0.vue';
// import MindSpectrumIndex from './views/MindSpectrum-index.vue';

// import OrderProductPopCMS from './components/OrderProductPopCMS.vue';
// import OrderTicketPopCMS from './components/OrderTicketPopCMS.vue';



// import MS_main from './components/MS/MS_main.vue';
// import MS_ticket_into from './components/MS/MS_ticket_into.vue';
// import MS_com_ticket_intro from './components/MS/MS_com_ticket_intro.vue';
// import MS_ticket_reservation from './components/MS/MS_ticket_reservation.vue';
// import LC_ticket_reservation from './views/LC_ticket_reservation.vue';
// import StrellarFrontier_BookingChange from './views/StrellarFrontier_BookingChange.vue';
// import LC_Question from './views/LC_Question.vue';
// import StrellarFrontier_Homepage from './views/StrellarFrontier_Homepage.vue';
// import LC_QuestionIntro from './views/LC_QuestionIntro.vue';
// import ProductPage from './views/ProductPage.vue';
// import LC_ProductPage from './views/LC_ProductPage.vue';
import LC_ProductInfo from './views/LC_ProductInfo.vue';
/*使用路由preview*/

//1.後臺管理路由========================
// import previewrouter from "./router/preview_wennie_index";
// const app = createApp(CenterCMS);
// app.use(previewrouter).mount('#preview-app');

//2.會員中心路由========================
// import previewrouter from "./router/preview_wennie_index";
// const app = createApp(MemberCenter);
// app.use(previewrouter).mount('#preview-app');

//3.入場須知路由========================
// import previewrouter from "./router/preview_wennie_index";
// const app = createApp(LC_QuestionIntro);
// app.use(previewrouter).mount('#preview-app');

//4.商品頁路由========================
// import previewrouter from "./router/preview_wennie_index";
// const app = createApp(LC_ProductInfo);
// app.use(previewrouter).mount('#preview-app');


 
/*一般頁面preview*/
const app = createApp(LC_ProductInfo);
// app.use(ElementPlus)
app.mount('#preview-app');