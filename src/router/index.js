import { createRouter, createWebHistory } from "vue-router";
import g2 from "../views/Guide.vue";
import Enter from "../views/Enter.vue";
import Back from "../views/Back.vue";
import Home from "../views/home.vue";

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
    }
  ]

})

export default router