require('./bootstrap');

window.Vue = require('vue');

import Router from "vue-router";

import HomeComponent from './components/HomeComponent'
import ArticleComponent from './components/ArticleComponent'
import ArticleCategoryComponent from './components/ArticleCategoryComponent'

Vue.use(Router);

const router = new Router({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
        },
        {
            path: '/*/:id',
            name: 'article',
            component: ArticleComponent
        },
        {
            path: '/:name',
            name: 'category',
            component: ArticleCategoryComponent
        }
    ]
});

const app = new Vue({
    el: '#app',
    router
});
