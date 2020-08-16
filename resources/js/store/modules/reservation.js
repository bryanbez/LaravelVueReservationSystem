import axios from 'axios';

const state = {

    reservations: [],
    reservation_msg: ''
};

const getters = {

};

const actions = {
    async saveReservation({commit}, reservation) {
        const response = await axios.post('http://127.0.0.1:8000/api/reservation', reservation);
        commit('RESERVATION_MSG_SAVE', response);
    },
};

const mutations = {
    RESERVATION_MSG_SAVE: (state, response) => (state.reservation_msg = response),
};


export default [
    state,
    getters,
    actions,
    mutations
]