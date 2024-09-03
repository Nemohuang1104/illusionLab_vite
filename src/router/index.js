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
  {
    path: '/back',
    component: () => import('@/views/Back.vue'),
    meta: {
      title: "後台"
    },
    requiredLogin: false
  },
  {
    path: '/home',
    component: () => import('@/views/Home.vue'),
    meta: {
      title: "Illusion Lab首頁"
    },
    requiredLogin: false
  },
  {
    path: '/lifecasino',
    component: () => import('@/views/lifeCasino.vue'),
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
  },

  
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