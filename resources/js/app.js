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
import Product from '../js/components/Product';
import Order from '../js/components/Order';
import AddProduct from '../js/components/add/AddProduct';
import AddOrder from '../js/components/add/AddOrder';

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
    },
    {
        name: '/product',
        path: '/product',
        component: Product
    },
    {
        name: '/order',
        path: '/order',
        component: Order
    },
    {
        name: '/add_product',
        path: '/add_product',
        component: AddProduct
    }, 

    {
        name: '/add_order',
        path: '/add_order',
        component: AddOrder
    }
    

];


const router = new VueRouter({mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');
