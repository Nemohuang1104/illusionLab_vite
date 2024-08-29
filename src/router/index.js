import { createRouter, createWebHistory } from "vue-router";
<<<<<<< HEAD
import g2 from "../views/Guide.vue";
import Enter from "../views/Enter.vue";
import Back from "../views/Back.vue";
import Home from "../views/Home.vue";
import StrellarFrontierIntro from "../views/StrellarFrontierIntro.vue";
import Header_2 from "../components/Header_2.vue";
import ProductPage from "../views/ProductPage.vue";
import DetailList from "../views/DetailList.vue";
import Header_0 from "../components/Header_0.vue";
import SFHeader_0 from "../components/SFHeader_0.vue";
import OrderTicketPopCMS from "../components/OrderTicketPopCMS.vue";
import Footer_0 from "../components/Footer_0.vue";
import Footer_2 from "../components/Footer_2.vue";


=======
>>>>>>> f997e5236cf370e04e954ca3a392b6560d8a71f5

// path → component
const routes = [
  {
    path: '/',
    component:() => import('@/views/Guide.vue'),
    meta: {
      title: "Illusion Lab"
    },
    requiredLogin: false  //判斷要不要登入
  },
  {
    path: '/enter',
    component: () => import('@/views/Enter.vue'),
    meta: {
    title: "前導頁"},
    requiredLogin: false
  },
  {
    path: '/back',
    component: () => import('@/views/Back.vue'),
    meta: {
    title: "後台"},
    requiredLogin: false
  },
  {
    path: '/home',
    component: () => import('@/views/Home.vue'),
    meta: {
    title: "Illusion Lab首頁"},
    requiredLogin: false
  },
  {
    path: '/lifecasino',
    component: () => import('@/views/LifeCasino.vue'),
    meta: {
      title: "人生賭場"
    },
      requiredLogin: false
  },
  {
    path: '/strellarfrontierintro',
    name: 'strellarfrontierintro',
    component: () => import('@/views/StrellarFrontierIntro.vue'),
    meta: {
      title: "星際邊境"
    },
    requiredLogin: false
  },
  {
    path: '/mindspectrum',
    name: 'mindspectrum',
    component: () => import('@/views/MindSpectrum-index.vue'),
    meta: {
      title: "心靈光譜"
    },
    requiredLogin: false
  },
  {
    path: '/littlequiz',
    name: 'littlequiz',
    component: () => import('@/views/LittleQuiz.vue'),
    meta: {
      title: "小測驗"
    },
      requiredLogin: false
  }
  ];

// 建立 router
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
<<<<<<< HEAD
  routes: [
    {
      path: '/',
      name: 'g2',
      component: g2
    },
    {
      path: '/enter',
      name: 'enter',
      component: Enter
    },
    {
      path: '/back',
      name: 'back',
      component: Back
    },
    {
      path: '/home',
      name: 'home',
      component: Home
    },
    {
      path: '/StrellarFrontierIntro',
      name: 'StrellarFrontierIntro',
      component: StrellarFrontierIntro
    },
    {
      path: '/Header_2',
      name: 'Header_2',
      component: Header_2
    },
    {
      path: '/ProductPage',
      name: 'ProductPage',
      component: ProductPage
    },
    {
      path: '/DetailList',
      name: 'DetailList',
      component: DetailList
    },
    {
      path: '/Header_0',
      name: 'Header_0',
      component: Header_0
    },
    {
      path: '/SFHeader_0',
      name: 'SFHeader_0',
      component: SFHeader_0
    },
    {
      path: '/OrderTicketPopCMS',
      name: 'OrderTicketPopCMS',
      component: OrderTicketPopCMS
    },
    {
      path: '/Footer_0',
      name: 'Footer_0',
      component: Footer_0
    },
    {
      path: '/Footer_2',
      name: 'Footer_2',
      component: Footer_2
    }

  ]
=======
  routes: routes
});

router.beforeEach((to, from, next) => { // 記得加第三個參數 next
  //console.log(to);   // 連到目前的網址的物件資料
  //console.log(from); // 從哪個網址連過來的物件資料

  if(to.meta.requiredLogin){
    
    // ======= 以下要取得使用者目前的登入狀態，會是 bool == //
    // 取得是否已登入，可能是從 localStorage 抓資料或從後端判斷。
    let isAuthenticated = true;
    // ============================================== //

    if(isAuthenticated){
      document.title = to.meta.title;
      next();
    }else{ // 未登入，就直接導回到首頁或其它頁面。
      next("/");
    }
  }else{
    document.title = to.meta.title;
    next();
  }
  
});
>>>>>>> f997e5236cf370e04e954ca3a392b6560d8a71f5

// 匯出 router
export default router;