import { createRouter, createWebHistory } from "vue-router";

// path → component
const routes = [
  {
    path: '/',
    component: () => import('@/views/Guide.vue'),
    meta: {
      title: "Illusion Lab"
    },
    requiredLogin: false  //判斷要不要登入
  },
  {
    path: '/enter',
    component: () => import('@/views/Enter.vue'),
    meta: {
      title: "前導頁"
    },
    requiredLogin: false
  },

  // ====================後台=====================
  {
    path: '/logincms',
    component: () => import('@/views/LoginCMS.vue'),
    meta: {
      title: "後台登入"
    },
    requiredLogin: true,
  },

  {
    path: '/CenterCMS',
    component: () => import('@/views/CenterCMS.vue'),
    meta: {
      title: "後台中心"
    },
    requiredLogin: true,
    redirect: '/MemberCMS',

    children: [
      {
        path: '/MemberCMS',
        name: 'MemberCMS',
        component: () => import('@/views/MemberCMS.vue')
      },

      {
        path: '/OrderCMS',
        name: 'OrderCMS',
        component: () => import('@/views/OrderCMS.vue'),
        children: [
          { path: '/OrderCMS', redirect: '/OrderTicketCMS' },
          { path: '/OrderTicketCMS', component: () => import('@/views/OrderTicketCMS.vue') },
          { path: '/OrderProductCMS', component: () => import('@/views/OrderProductCMS.vue') },
        ],
      },

      {
        path: '/ProductCMS',
        name: 'ProductCMS',
        component: () => import('@/views/ProductCMS.vue')
      },

      {
        path: '/CustomTicketCMS',
        name: 'CustomTicketCMS',
        component: () => import('@/views/CustomTicketCMS.vue'),
        children: [
          { path: '/CustomTicketCMS', redirect: '/CustomTicketCasinoCMS' },
          { path: '/CustomTicketCasinoCMS', component: () => import('@/views/CustomTicketCasinoCMS.vue') },
          { path: '/CustomTicketMindCMS', component: () => import('@/views/CustomTicketMindCMS.vue') },
          { path: '/CustomTicketStrellaCMS', component: () => import('@/views/CustomTicketStrellaCMS.vue') },
        ]
      },
      {
        path: '/NewsCMS',
        name: 'NewsCMS',
        component: () => import('@/views/NewsCMS.vue')
      },

    ]
  },

 
  // ====================後台end=====================

  {
    path: '/home',
    component: () => import('@/views/Home.vue'),
    meta: {
      title: "Illusion Lab首頁"
    },
    requiredLogin: false
  },
  // ====================人生賭場================//
  {
    path: '/lifecasino',
    component: () => import('@/views/lifeCasino.vue'),
    meta: {
      title: "人生賭場"
    },
    requiredLogin: false
  },
  {
    path: '/LC_ProductPage',
    component: () => import('@/views/LC_ProductPage.vue'),
    meta: {
      title: "人生賭場-精選商品"
    },
    requiredLogin: false
  },
  {
    path: '/LC_ProductInfo',
    component: () => import('@/views/LC_ProductInfo.vue'),
    meta: {
      title: "人生賭場-商品細項"
    },
    requiredLogin: false
  },
  {
    path: '/LC_QuestionIntro',
    component: () => import('@/views/LC_QuestionIntro.vue'),
    meta: {
      title: "人生賭場-入場須知"
    },
    redirect: '/LC_Question',
    requiredLogin: false,
    children:[
      {
        path: '/LC_Question',
        name: 'LC_Question',
        component: () => import('@/views/LC_Question.vue'),
      },
    {
        path: '/LC_TicketRule',
        name: 'LC_TicketRule',
        component: () => import('@/views/LC_TicketRule.vue'),
        
      },
      {
        path: '/LC_TicketChange',
        name: 'LC_TicketChange',
        component: () => import('@/views/LC_TicketChange.vue')
      }
    ]
  },
  

// =================星際邊境===============//

  {
    path: '/strellarfrontierintro',
    name: 'strellarfrontierintro',
    component: () => import('@/views/SFIntro.vue'),
    meta: {
      title: "星際邊境"
    },
    requiredLogin: false,
  },
  {
    path: '/SF_Homepage',
    name: 'SF_Homepage',
    component: () => import('@/views/SF_Homepage.vue'),
    meta: {
      title: "星際邊境"
    },
    requiredLogin: false
  },
  {
    path: '/mindspectrum',
    name: 'mindspectrum',
    component: () => import('@/components/MS/MS_main.vue'),
    meta: {
      title: "心靈光譜"
    },
    requiredLogin: false
  },
  {
    path: '/littlequiz',
    name: 'littlequiz',
    component: () => import('@/views/LittleQuizEnter.vue'),
    meta: {
      title: "小測驗"
    },
    requiredLogin: false
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('@/views/Login.vue'),
    meta: {
      title: "會員登入"
    },
    requiredLogin: true
  },
  {
    path: '/shop',
    name: 'shop',
    component: () => import('@/views/ShoppingCar1.vue'),
    meta: {
      title: "購物車"
    },
    requiredLogin: true
  },
  {
    path: '/SF_BookingChange',
    name: 'SF_BookingChange',
    component: () => import('@/views/SF_BookingChange.vue'),
    meta: {
      title: "退換票政策"
    },
    requiredLogin: false
  },
  {
    path: '/ProductPage',
    name: 'ProductPage',
    component: () => import('@/views/ProductPage.vue'),
    meta: {
      title: "商品頁面"
    },
    requiredLogin: false
  },
  {
    path: '/Header_0',
    name: 'Header_0',
    component: () => import('@/components/Header_0.vue'),
    meta: {
      title: "公版頁首"
    },
    requiredLogin: false
  },
  {
    path: '/DetailList',
    name: 'DetailList',
    component: () => import('@/views/DetailList.vue'),
    meta: {
      title: "星際邊際商品一細項"
    },
    requiredLogin: false
  }


];

// 建立 router
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: routes
});

router.beforeEach((to, from, next) => { // 記得加第三個參數 next
  //console.log(to);   // 連到目前的網址的物件資料
  //console.log(from); // 從哪個網址連過來的物件資料

  if (to.meta.requiredLogin) {

    // ======= 以下要取得使用者目前的登入狀態，會是 bool == //
    // 取得是否已登入，可能是從 localStorage 抓資料或從後端判斷。
    let isAuthenticated = true;
    // ============================================== //

    if (isAuthenticated) {
      document.title = to.meta.title;
      next();
    } else { // 未登入，就直接導回到首頁或其它頁面。
      next("/");
    }
  } else {
    document.title = to.meta.title;
    next();
  }

});

// 匯出 router
export default router;