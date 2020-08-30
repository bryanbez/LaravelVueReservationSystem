import Vuex from 'vuex';
import Vue from 'vue';
import reservationModule from './modules/reservation/reservationAction.js';
import eventCalendarModule from './modules/calendar/eventCalendar.js';
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        reservationModule,
        eventCalendarModule
        
    }
});