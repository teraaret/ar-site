import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import index_page from './pages/index.vue';
import gallery_page from './pages/gallery.vue';
import about_page from './pages/about.vue';

import nav_style from './style/nav.less';

var router = new VueRouter({
  routes: [
    { path: '/index', component: index_page },
    { path: '/gallery', component: gallery_page },
    { path: '/about', component: about_page },
  ]
})

new Vue({
    el: "#app",
    router: router
})