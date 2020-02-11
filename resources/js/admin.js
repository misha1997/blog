require('./bootstrap');

window.Vue = require('vue');

import Router from "vue-router";

import DashboardComponent from './components/Admin/DashboardComponent';
import EditArticleComponent from './components/Admin/EditArticleComponent';
import PostArticleComponent from './components/Admin/PostArticleComponent';

Vue.use(Router);

const router = new Router({
    mode: "history",
    routes: [
        {
            path: '/admin',
            name: 'admin',
            component: DashboardComponent
        },
        {
            path: '/admin/article',
            name: 'article',
            component: PostArticleComponent
        },
        {
            path: '/admin/article/:id/',
            name: 'editArticle',
            component: EditArticleComponent
        }
    ]
});

const app = new Vue({
    el: '#admin',
    router
});
