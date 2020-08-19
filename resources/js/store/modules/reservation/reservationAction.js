import axios from 'axios';

const state = {

    reservations: [],
    reservation_msg: '',
    error_msg: '',
    sampleMsg: 'GUmagana BA?'
};

const getters = {
    getReservationMsg: (state) => state.reservation_msg,
    getSampleMsg: (state) => state.sampleMsg,
    getErrorMsg: (state) => state.error_msg
};

const mutations = {
    RESERVATION_MSG_SAVE: (state, response) => (state.reservation_msg = response),
    SET_RESERVATION_ERROR_MSG: (state, response) => (state.error_msg = response)
};

const actions = {
    async saveReservation({commit}, reservation) {
        axios.post('http://127.0.0.1:8000/api/reservation', reservation)
        .then(response => {
            commit('RESERVATION_MSG_SAVE', response.data);
        }).catch(error => {
            commit('SET_RESERVATION_ERROR_MSG',  error.response.data.errors)
        });
       
    },
};


export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,

};