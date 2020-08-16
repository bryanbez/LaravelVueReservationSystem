const { default: VueRouter } = require('vue-router');

require('./bootstrap');

window.VueRouter = require('vue-router').default;
window.VueAxios = require('axios');
window.Vue = require('vue');
import AllRoutes from './routes.js';
import store from './store';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: AllRoutes
});

Vue.component('mainpage', require('./components/Index.vue').default);

const app = new Vue({
    store,
    router: router,
    el: '#app',
});
