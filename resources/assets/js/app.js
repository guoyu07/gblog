
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import App from './App.vue';

/**
 * Element ui component
 *
 * load Element ui must after on Vue
 *
 */

import Element from 'element-ui';
import 'element-ui/lib/theme-default/index.css';
Vue.use(Element);


/**
 * 导入vue路由， 后台采用单页面应用
 *
 */

import VueRouter from 'vue-router';
import routes from './route.conf.js';
Vue.use(VueRouter);

const router = new VueRouter({
    routes: routes,
    // mode: 'history',
    // base: __dirname
    // linkActiveClass: 'active'
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
