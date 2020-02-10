require('./bootstrap');

window.Vue = require('vue');

import Router from "vue-router";

import HomeComponent from './components/HomeComponent'

Vue.use(Router);

const router = new Router({
    mode: "history",
    routes: [
        { 
            path: '/', 
            name: 'home', 
            component: HomeComponent 
        }
    ]
});

const app = new Vue({
    el: '#app',
    router
});
