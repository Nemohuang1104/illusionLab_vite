import { createRouter, createWebHistory } from "vue-router";


// import g2 from "../views/Guide.vue";
// import Enter from "../views/Enter.vue";
// import Back from "../views/Back.vue";
// import Home from "../views/home.vue";

// import MemberInfo from '@/components/MemberInfo.vue';
// import ChangePassword from '@/components/ChangePassword.vue';
// import OrderInquiry from '@/components/OrderInquiry.vue';

// import Header_0 from '@/components/Header_0.vue';
// import Footer_0 from '@/components/Footer_0.vue';

/*會員中心頁面vue註冊*/
// import MemberInfo from "@/views/MemberInfo.vue";
// import PasswordEdit from "@/views/PasswordEdit.vue";
// import OrderQuery from "@/views/OrderQuery.vue";
// import RefundQuery from "@/views/RefundQuery.vue";
// import OrderQueryTicket from "@/views/OrderQueryTicket.vue";
// import OrderQueryProduct from "@/views/OrderQueryProduct.vue";
// import RefundQueryProduct from "@/views/RefundQueryProduct.vue";
// import RefundQueryTicket from "@/views/RefundQueryTicket.vue";

/*後台管理頁面vue註冊*/
// import LoginCMS from "@/views/LoginCMS.vue";
// import CenterCMS from "@/views/CenterCMS.vue";
// import MemberCMS from "@/views/MemberCMS.vue";
// import OrderCMS from "@/views/OrderCMS.vue";
// import OrderTicketCMS from "@/views/OrderTicketCMS.vue";
// import OrderProductCMS from "@/views/OrderProductCMS.vue";
// import ProductCMS from "@/views/ProductCMS.vue";
// import CustomTicketCMS from "@/views/CustomTicketCMS.vue";
// import CustomTicketCasinoCMS from "@/views/CustomTicketCasinoCMS.vue";
// import CustomTicketMindCMS from "@/views/CustomTicketMindCMS.vue";
// import CustomTicketStrellaCMS from "@/views/CustomTicketStrellaCMS.vue";
// import NewsCMS from "@/views/NewsCMS.vue";


/*LC入場須知頁面vue註冊*/
// import LC_Question from "@/views/LC_Question.vue";
// import LC_TicketRule from "@/views/LC_TicketRule.vue";
// import LC_TicketChange from "@/views/LC_TicketChange.vue";

/*LC商品頁面vue註冊*/
// import LC_ProductPage from "@/views/LC_ProductPage.vue";




// 記得有在以下配置出的所有組件路由，都要記得在上面import對應組件的路徑，以下沒有配置到的，也不允許在上面import，不然絕對預覽不出來
// 同步在組件內也必須在template內加上routerlink和routerview，才能預覽得出來
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    // 1.會員中心路由配置preview開始
       // 根路徑為MemberCenter，進入MemberCenter再重定向到 '/Member' (MemberInfo)
    //    {
    //     path: '/preview_wennie.html',
    //     redirect: '/Member'
    //   },,
    // {
    //     path: '/Member',
    //     name: 'MemberInfo',
    //     component: MemberInfo
    //   },
    // {
    //     path: '/change-password',
    //     name: 'PasswordEdit',
    //     component: PasswordEdit
    //   },
    //   {
    //     path: '/order-query',
    //     name: 'OrderQuery',
    //     component: OrderQuery,
    //     children: [
    //       { path: '/order-query', redirect: '/OrderQueryTicket' },
    //       { path: '/OrderQueryTicket', component: OrderQueryTicket },
    //       { path: '/OrderQueryProduct', component: OrderQueryProduct },
    //     ],
    //   },
    //   {
    //     path: '/refund-query',
    //     name: 'RefundQuery',
    //     component: RefundQuery,
    //     children: [
    //       { path: '/refund-query', redirect: '/RefundQueryTicket' },
    //       { path: '/RefundQueryTicket', component: RefundQueryTicket },
    //       { path: '/RefundQueryProduct', component: RefundQueryProduct },
    //     ],
    //   },

    // 會員中心路由配置preview結束

    // 2.後台管理中心路由配置preview開始
    // 根路徑為CenterCMS，進入CenterCMS再重定向到 '/Member' (MemberCMS)
  //   {
  //     path: '/preview_wennie.html',
  //     redirect: '/MemberCMS'
  //   },
  // {
  //     path: '/MemberCMS',
  //     name: 'MemberCMS',
  //     component: MemberCMS
  //   },
  // {
  //     path: '/OrderCMS',
  //     name: 'OrderCMS',
  //     component: OrderCMS,
  //     children: [
  //       { path: '/OrderCMS', redirect: '/OrderTicketCMS' },
  //       { path: '/OrderTicketCMS', component: OrderTicketCMS },
  //       { path: '/OrderProductCMS', component: OrderProductCMS },
  //     ],
  //   },
  //   {
  //     path: '/ProductCMS',
  //     name: 'ProductCMS',
  //     component: ProductCMS
  //   },
  //   {
  //     path: '/CustomTicketCMS',
  //     name: 'CustomTicketCMS',
  //     component: CustomTicketCMS,
  //     children: [
  //       { path: '/CustomTicketCMS', redirect: '/CustomTicketCasinoCMS' },
  //       { path: '/CustomTicketCasinoCMS', component: CustomTicketCasinoCMS },
  //       { path: '/CustomTicketMindCMS', component: CustomTicketMindCMS },
  //       { path: '/CustomTicketStrellaCMS', component: CustomTicketStrellaCMS },
  //     ]
  //   },
  //   {
  //     path: '/NewsCMS',
  //     name: 'NewsCMS',
  //     component: NewsCMS
  //   }


    // 後台管理中心路由配置preview結束
    
    // 3.LC入場須知頁面路由配置preview開始
    // 根路徑為LC_QuestionIntro，進入LC_QuestionIntro再重定向到 '/LC_Question' (LC_Question)
  
  //     {
  //     path: '/preview_wennie.html',
  //     redirect: '/LC_Question'
  //   },
  // {
  //     path: '/LC_Question',
  //     name: 'LC_Question',
  //     component: LC_Question
  //   },
  // {
  //     path: '/LC_TicketRule',
  //     name: 'LC_TicketRule',
  //     component: LC_TicketRule,
      
  //   },
  //   {
  //     path: '/LC_TicketChange',
  //     name: 'LC_TicketChange',
  //     component: LC_TicketChange
  //   },


    // 4.LC商品頁面路由配置preview開始
    // 
  
   
  // {
  //     path: '/LC_ProductPage',
  //     name: 'LC_ProductPage',
  //     component: LC_ProductPage
  //   },
  //   {
  //     path: '/LoginCMS',
  //     name: 'LoginCMS',
  //     component: LoginCMS,
      
  //   },
  // {
  //     path: '/SF_ProductPage',
  //     name: 'SF_ProductPage',
  //     component: SF_ProductPage,
      
  //   },
  //   {
  //     path: '/MS_ProductPage',
  //     name: 'MS_ProductPage',
  //     component: MS_ProductPage
  //   },
  
    
  ]

})


export default router

