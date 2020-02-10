require('./bootstrap');

window.Vue = require('vue');

import Router from "vue-router";

import DashboardComponent from './components/Admin/DashboardComponent'

Vue.use(Router);

const router = new Router({
    mode: "history",
    routes: [
        { 
            path: '/admin', 
            name: 'admin', 
            component: DashboardComponent 
        }
    ]
});

const app = new Vue({
    el: '#admin',
    router
});
