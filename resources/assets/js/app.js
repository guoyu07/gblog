/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Element from 'element-ui';

import App from './App.vue';
import VueRouter from 'vue-router';
import routes from './route.conf2.js';
import 'element-ui/lib/theme-default/index.css';
import VueResource from 'vue-resource';

// 暂时用不到vuex
// import Vuex from 'vuex'
// Vue.use(Vuex)

Vue.use(VueRouter);
Vue.use(VueResource);

Vue.http.interceptors.push(function(request, next) {
  request.headers.set('X-CSRF-TOKEN', window.Laravel.csrfToken);
  request.headers.set('X-Requested-With', 'XMLHttpRequest');
  next();
});

/**
 * ------------------------------------------
 * Element ui component
 *
 * load Element ui must after on Vue
 *
 * ------------------------------------------
 */

Vue.use(Element);


// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

const router = new VueRouter({
    // routes: routes,
    mode: 'history',
    base: __dirname,
    linkActiveClass: 'active',
    routes: routes
});

const app = new Vue(
  Vue.util.extend({ router}, App),
).$mount('#app');
