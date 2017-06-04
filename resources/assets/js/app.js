/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Element from 'element-ui';
import App from './App.vue';
// import VueI18n from 'vue-i18n';
import VueRouter from 'vue-router';
// import locales from './lang';
import routes from './route.conf.js';
import 'element-ui/lib/theme-default/index.css';
import VueResource from 'vue-resource';
import Vuex from 'vuex'

Vue.use(VueRouter);
Vue.use(VueResource);
// Vue.use(VueI18n);
Vue.use(Vuex)

// Vue.config.lang = 'zh_cn';
// Object.keys(locales).forEach(function (lang) {
//     Vue.locale(lang, locales[lang]);
// });


Vue.http.interceptors.push(function(request, next) {
  request.headers.set('X-CSRF-TOKEN', window.Laravel.csrfToken);
  request.headers.set('X-Requested-With', 'XMLHttpRequest');
  // continue to next interceptor
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

// // Vue.component('example', require('./components/Example.vue'));

const router = new VueRouter({
    // routes: routes,
    mode: 'history',
    base: __dirname,
    linkActiveClass: 'active',
    routes: routes
});

const store = new Vuex.Store({
    state: {
        wocao: 0
    },
    mutations: {
        increment (state) {
            state.wocao ++
        }
    }
})


const app = new Vue(
  Vue.util.extend({ router, store}, App),
).$mount('#app');
