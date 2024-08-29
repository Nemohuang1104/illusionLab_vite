import { createRouter, createWebHistory } from "vue-router";
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



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
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

})

export default router