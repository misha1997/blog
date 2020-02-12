require('./bootstrap');

window.Vue = require('vue');

import Router from "vue-router";

import HeaderComponent from './components/includes/HeaderComponent'
import FooterComponent from './components/includes/FooterComponent'

import HomeComponent from './components/HomeComponent'
import ArticleComponent from './components/ArticleComponent'
import ArticleCategoryComponent from './components/ArticleCategoryComponent'
import ArticleTagComponent from './components/ArticleTagComponent'

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
            path: '/tag/:name',
            name: 'tag',
            component: ArticleTagComponent
        },
        {
            path: '/:category/:id',
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

router.beforeEach((to, from, next) => {
    next()
})

const app = new Vue({
    el: '#app',
    components: {
        HeaderComponent,
        FooterComponent
    },
    router
});
