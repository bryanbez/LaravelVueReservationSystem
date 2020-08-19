const { default: VueRouter } = require('vue-router');

require('./bootstrap');

window.Vue = require('vue');
window.VueRouter = require('vue-router').default;
window.VueAxios = require('axios');
import AllRoutes from './routes.js';
import storeVuex from './store';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: AllRoutes
});

Vue.component('mainpage', require('./components/Index.vue').default);

const app = new Vue({
    store: storeVuex,
    router: router,
    el: '#app',
});
