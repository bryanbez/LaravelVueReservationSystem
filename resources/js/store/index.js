import Vuex from 'vuex';
import Vue from 'vue';
import reservation from './modules/reservation.js';
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        reservation
    }
});