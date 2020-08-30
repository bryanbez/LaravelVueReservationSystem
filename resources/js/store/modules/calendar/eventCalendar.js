import axios from 'axios';

const state = {
    allevents: [],
    error_msg: [],
    toPasteEvent: [],
};

const getters = {
    getAllEvents: (state) => state.allevents,
    getErrorMsg: (state) => state.error_msg,
    getToCalendarEvent: (state) => state.toPasteEvent,
};

const actions = {
    async fetchAllEvents({commit}) {
        axios.get('http://127.0.0.1:8000/api/getallevents')
        .then(response => {
            
            commit('PASTE_ALL_EVENTS', response.data);
            commit('TO_CALENDAR_EVENT', response.data);
        }).catch(error => {
            commit('SET_ERROR_MSG',  error.response.data.errors)
        });
    },
};

const mutations = {
    PASTE_ALL_EVENTS: (state, response) => (state.allevents = response),
    SET_ERROR_MSG: (state, error) => (state.error_msg = error),
    TO_CALENDAR_EVENT: (state, response) => {
        $.each(response, function(key, value) {
            state.toPasteEvent.push({ title: value['reserve_purpose'], date: value['date_request_occupy']});
        });
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}