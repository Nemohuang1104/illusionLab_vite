import { createRouter, createWebHistory } from "vue-router";

// path → component
const routes = [
  // ====================前台公版=====================
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
  {
    path: '/Home',
    component: () => import('@/views/Home.vue'),
    meta: {
      title: "Illusion Lab首頁"
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
    path: '/login',
    name: 'login',
    component: () => import('@/views/Login.vue'),
    meta: {
      title: "會員登入"
    },
    requiredLogin: true
  },
  {
    path: '/shop/:id',
    name: 'shop',
    component: () => import('@/views/ShoppingCar1.vue'),
    meta: {
      title: "購物車"
    },
    requiredLogin: true
  },
  {
    path: '/SFHeader_0',
    name: 'SFHeader_0',
    component: () => import('@/components/SFHeader_0.vue'),
    meta: {
      title: "公版三個LOGO頁首"
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
  },


  {
    path: '/Header_0',
    name: 'Header_0',
    component: () => import('@/components/Header_0.vue'),
    meta: {
      title: "頁首"
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

  // ====================人生賭場================//
  {
    path: '/lifecasino',
    component: () => import('@/views/lifeCasino.vue'),
    meta: {
      title: "人生賭場"
    },
    requiredLogin: false
  },

  // -----商品區------//
  {
    path: '/LC_ProductPage',
    component: () => import('@/views/LC_ProductPage.vue'),
    name: 'LC_ProductPage',
    meta: {
      title: "人生賭場-精選商品"
    },
    requiredLogin: false
  },
  {
    path: '/LC_ProductInfo/:id',
    component: () => import('@/views/LC_ProductInfo.vue'),
    name: 'LC_ProductInfo',
    meta: {
      title: "人生賭場-商品細項"
    },
    requiredLogin: false,
    props: true // 將路由參數作為 props 傳入組件
  },

  // ------入場須知-------//
  {
    path: '/LC_QuestionIntro',
    component: () => import('@/views/LC_QuestionIntro.vue'),
    meta: {
      title: "人生賭場-入場須知"
    },
    redirect: '/LC_Question',
    requiredLogin: false,
    children: [
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

  // -----購票-----//
  {

    path: '/LC_Ticket_step0',
    component: () => import('@/views/LC_Ticket_reservation2.vue'),
    meta: {
      title: "人生賭場-購票"
    },
    requiredLogin: true
  },
  {
    path: '/LC_Ticket_step1',
    component: () => import('@/views/LC_ticket_customer_info.vue'),
    meta: {
      title: "人生賭場-購票"
    },
    requiredLogin: true
  },
  {
    path: '/LC_Ticket_step2',
    component: () => import('@/views/LC_ticket_confirmation.vue'),
    meta: {
      title: "人生賭場-購票"
    },
    requiredLogin: true
  },
  {
    path: '/LC_Customization',
    component: () => import('@/views/LC_Customization.vue'),
    meta: {
      title: "人生賭場-客製票卷"
    },
    requiredLogin: true
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
    path: '/SF_BookingChange',
    name: 'SF_BookingChange',
    component: () => import('@/views/SF_BookingChange.vue'),
    meta: {
      title: "星際邊境｜退換票政策"
    },
    requiredLogin: false
  },
  {
    path: '/SF_ProductPage',
    name: 'SF_ProductPage',
    component: () => import('@/views/SF_ProductPage.vue'),
    meta: {
      title: "星際邊境｜精選商品"
    },
    requiredLogin: false
  },
  {
    path: '/SF_DetailList/:id',
    name: 'SF_DetailList',
    component: () => import('@/views/SF_DetailList.vue'),
    meta: {
      title: "星際邊境｜商品細項"
    },
    requiredLogin: false,
    props: true // 將路由參數作為 props 傳入組件
  },

  {
    path: '/WeiText2',
    name: 'WeiText2',
    component: () => import('@/views/WeiText2.vue'),
    meta: {
      title: "測試"
    },
    requiredLogin: false
  }, {
    path: '/WeiText',
    name: 'WeiText',
    component: () => import('@/views/WeiText.vue'),
    meta: {
      title: "測試"
    },
    requiredLogin: false
  },
  {
    path: '/SF_TicketDesign',
    name: 'SF_TicketDesign',
    component: () => import('@/views/SF_TicketDesign.vue'),
    meta: {
      title: "星際邊境｜客製票券"
    },
    requiredLogin: false
  },
  {
    path: '/SF_Ticket_step0',
    component: () => import('@/views/SF_Ticket_reservation.vue'),
    meta: {
      title: "星際邊境｜購票"
    },
    requiredLogin: true
  },
  {
    path: '/SF_Ticket_step1',
    component: () => import('@/views/SF_ticket_customer_info.vue'),
    meta: {
      title: "星際邊境｜購票"
    },
    requiredLogin: true
  },
  {
    path: '/SF_Ticket_step2',
    component: () => import('@/views/SF_ticket_confirmation.vue'),
    meta: {
      title: "星際邊境｜購票"
    },
    requiredLogin: true
  },


  // =================心靈光譜===============//
  {
    path: '/MS_Enter',
    name: 'MS_Enter',
    component: () => import('@/components/MS/MS_Enter.vue'),
    meta: {
      title: "心靈光譜"
    },
    requiredLogin: false
  },

  {
    path: '/mindspectrum',
    name: 'mindspectrum',
    component: () => import('@/views/MS_views_index.vue'),
    meta: {
      title: "心靈光譜"
    },
    requiredLogin: false
  },
  {
    path: '/MS_Ticket_step0',
    component: () => import('@/views/MS_ticket_into.vue'),
    meta: {
      title: "心靈光譜-購票"
    },
    requiredLogin: true
  },
  {
    path: '/MS_Ticket_step1',
    component: () => import('@/views/MS_Ticket_reservation.vue'),
    meta: {
      title: "心靈光譜-購票"
    },
    requiredLogin: true
  },
  {
    path: '/MS_Ticket_step2',
    component: () => import('@/views/MS_ticket_customer_info.vue'),
    meta: {
      title: "心靈光譜-購票"
    },
    requiredLogin: true
  },
  {
    path: '/MS_Ticket_step3',
    component: () => import('@/views/MS_ticket_confirmation.vue'),
    meta: {
      title: "心靈光譜-購票"
    },
    requiredLogin: true
  },
  {
    path: '/MS_customization',
    component: () => import('@/components/MS/MS_customization.vue'),
    meta: {
      title: "心靈光譜-客製票卷"
    },
    requiredLogin: true
  },
  {
    path: '/FQA_03',
    component: () => import('@/views/FQA_03.vue'),
    meta: {
      title: "心靈光譜-常見問題"
    },
    requiredLogin: true
  },
  {
    path: '/TicketChange_03',
    component: () => import('@/views/TicketChange_03.vue'),
    meta: {
      title: "心靈光譜-票務資訊"
    },
    requiredLogin: true
  },
  {
    path: '/MS_ProductPage',
    name: '心靈光譜商品頁',
    component: () => import('@/views/MS_ProductPage.vue'),
    meta: {
      title: "心靈光譜商品頁"
    },
    requiredLogin: false
  },
  {
    path: '/MS_ProductList/:id',
    name: '心靈光譜商品細項頁',
    component: () => import('@/views/MS_ProductList.vue'),
    meta: {
      title: "心靈光譜商品頁細項頁"
    },
    name: 'MS_ProductList',
    requiredLogin: false,
    props: true // 將路由參數作為 props 傳入組件
  },

  {
    path: '/FQA_03',
    name: '常見問題',
    component: () => import('@/views/FQA_03.vue'),
    meta: {
      title: "心靈光譜常見問題"
    },
    requiredLogin: false
  },
  {
    path: '/TicketChange_03',
    name: '票務資訊',
    component: () => import('@/views/TicketChange_03.vue'),
    meta: {
      title: "心靈光譜票務資訊"
    },
    requiredLogin: false
  },
  {
    path: '/LittleQuizResult',
    name: 'LittleQuizResult',
    component: () => import('@/views/LittleQuizResult.vue'),
    meta: {
      title: "小測驗結果頁"
    },
    requiredLogin: true
  },


  // ============會員專區============//
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
    path: '/SignUp',
    name: 'SignUp',
    component: () => import('@/views/SignUp.vue'),
    meta: {
      title: "會員註冊"
    },
    requiredLogin: true
  },
  {
    path: '/MemberCenter',
    name: 'MemberCenter',
    component: () => import('@/views/MemberCenter.vue'),
    meta: {
      title: "會員中心"
    },
    requiredLogin: true,
    redirect: '/Member',

    children: [
      {
        path: '/Member',
        name: 'MemberInfo',
        component: () => import('@/views/MemberInfo.vue'),
      },
      {
        path: '/change-password',
        name: 'PasswordEdit',
        component: () => import('@/views/PasswordEdit.vue'),
      },
      {
        path: '/order-query',
        name: 'OrderQuery',
        component: () => import('@/views/OrderQuery.vue'),
        redirect: '/OrderQueryTicket',

        children: [
          {
            path: '/OrderQueryTicket',
            component: () => import('@/views/OrderQueryTicket.vue'),
          },
          {
            path: '/OrderQueryProduct', component: () => import('@/views/OrderQueryProduct.vue'),
          },
        ],
      },
      {
        path: '/refund-query',
        name: 'RefundQuery',
        component: () => import('@/views/RefundQuery.vue'),
        redirect: '/RefundQueryTicket',

        children: [
          {
            path: '/RefundQueryTicket',
            component: () => import('@/views/RefundQueryTicket.vue'),
          },
          {
            path: '/RefundQueryProduct',
            component: () => import('@/views/RefundQueryProduct.vue'),
          },
        ],
      },
    ]
  },

  // =============會員專區end=============//

  // ================購物車===============//
  {
    path: '/shop',
    name: 'shop',
    component: () => import('@/views/ShoppingCar1.vue'),
    meta: {
      title: "購物車",
      requiresAuth: true // 需要认证的路由
    },
    
  },

  {
    path: '/shop2',
    name: 'shop2',
    component: () => import('@/views/ShoppingCar2.vue'),
    meta: {
      title: "購物車"
    },
    requiredLogin: true
  },

  {
    path: '/shop3',
    name: 'shop3',
    component: () => import('@/views/ShoppingCar3.vue'),
    meta: {
      title: "購物車"
    },
    requiredLogin: true
  },

  {
    path: '/map_page',
    name: 'map_page',
    component: () => import('@/views/map_page.vue'),
    meta: {
      title: "門市選擇"
    },
    requiredLogin: true
  },


  {
    path: '/WeiText',
    name: 'WeiText',
    component: () => import('@/views/WeiText.vue'),
    meta: {
      title: "測試用的"
    },
    requiredLogin: false
  },
  {
    path: '/SFHeader_0',
    name: 'SFHeader_0',
    component: () => import('@/components/SFHeader_0.vue'),
    meta: {
      title: "公版頁首"

    },
    requiredLogin: false

  },


  // ==========footer=============//
  {
    path: '/News',
    name: 'News',
    component: () => import('@/views/NewsView.vue'),
    meta: {
      title: "最新消息"
    },
    requiredLogin: false
  },

  {
    path: '/PP_termOfUse',
    name: 'termOfUse',
    component: () => import('@/views/PP_termOfUse.vue'),
    meta: {
      title: "使用條款"
    },
    requiredLogin: false
  },

  {
    path: '/PP_privacy_policy',
    name: 'privacy_policy',
    component: () => import('@/views/PP_privacy_policy.vue'),
    meta: {
      title: "隱私權政策"
    },
    requiredLogin: false
  },

];


// 建立 router
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: routes,

  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      // 如果有保存的滚动位置，返回到保存的位置
      return savedPosition;
    } else {
      // 否则默认滚动到顶部
      return { top: 0 };
    }
  },
});

// 路由守卫，检查需要认证的路由
router.beforeEach((to, from, next) => {
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
  const token = sessionStorage.getItem('token')

  if (requiresAuth && !token) {
    next({ path: '/login', query: { redirect: to.fullPath } })
  } else {
    next()
  }
})


// 匯出 router
export default router;