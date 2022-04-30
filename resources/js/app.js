require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);


import App from './App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from 'vue';
// import Vue from 'vue';


// Components
import Home from '../js/components/Home';
import Customer from '../js/components/Customer';

Vue.use(VueAxios, axios);

const routes = [
    {
        name: '/',
        path: '/',
        component: Home
    },
    {
        name: '/customer',
        path: '/customer',
        component: Customer
    }
];


const router = new VueRouter({mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
