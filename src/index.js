import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import index_page from './pages/index.vue';
import books_page from './pages/books.vue';
//import book_page from './pages/book.vue';
import races_page from './pages/races.vue';
import heroes_page from './pages/heroes.vue';
import about_page from './pages/about.vue';

import Style from './style/main.less';
import Raidap from './style/raidap.css';

var router = new VueRouter({
  routes: [
    { path: '/index', component: index_page },
//    { path: '/books', component: books_page },
//    { path: '/books/:id', name: 'book', component: book_page },
    { path: '/races', component: races_page },
    { path: '/heroes', component: heroes_page },
    { path: '/about', component: about_page },
  ]
})
router.replace({ path: '/index', redirect: '/' })

new Vue({
    el: "#app",
    router: router
})