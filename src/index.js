import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import index_page from './pages/index.vue';
import books_page from './pages/books.vue';
import about_page from './pages/about.vue';
import book_page from './pages/book.vue';

import Style from './style/main.less';
//import Raidap from './style/raidap.css';
import Raidap2 from './style/raidap2.css';

var router = new VueRouter({
  routes: [
    { path: '/index', component: index_page },
    { path: '/books', component: books_page },
    { path: '/books/:id', name: 'book', component: book_page },
    { path: '/about', component: about_page },
  ]
})

new Vue({
    el: "#app",
    router: router
})