/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './views/App.vue';
import Home from './pages/Home.vue';

const router = new VueRouter(
    {
        routes: [
            {
                path: '/',
                name: 'home',
                component: Home,
            },
            {
                path: '/',
                name: 'posts',
                component: Posts,
            },
            {
                path: '/',
                name: 'post',
                component: Post,
            },
            {
                path: '/',
                name: 'about',
                component: About,
            },
        ]
    }
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    render: h => h(App),
});
