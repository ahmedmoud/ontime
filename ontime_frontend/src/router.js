import Vue from 'vue'
import VueRouter from 'vue-router'

import AddItem from './components/AddItem.vue';
import Items from './components/items.vue';
Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    {
      path: "/addItem",
      component: AddItem
    },
     {
      path: "/",
      component: Items
     }
  ]
});

export default router ;
