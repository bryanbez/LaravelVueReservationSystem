import axios from 'axios';

const state = {

    reservations: [],
    reservation_msg: '',
    error_msg: '',
    pagination: {},
    reservation_to_modify: {
        request_form_no: '',
        txt_date_request_occupy: '',
        rdb_time_request_occupy: '',
        txt_requested_group: '',
        txt_requested_group_contact: '',
        txt_requested_group_email: '',
        rb_request_use_facilities: [],
        txt_people_count: '',
        txt_reserve_purpose: ''
    },
};

const getters = {
    getReservationMsg: (state) => state.reservation_msg,
    getAllReservation: (state) => state.reservations,
    getErrorMsg: (state) => state.error_msg,
    getPagination: (state) => state.pagination,
    getSpecificReservation: (state) => state.reservation_to_modify
    
};

const mutations = {
    RESERVATION_MSG: (state, response) => (state.reservation_msg = response),
    SET_ERROR_MSG: (state, response) => (state.error_msg = response),
    ALL_RESERVATION: (state, response) => {
        state.reservations = response.data;
        let paginationInfo = {
            next_page_url: response.links.next,
            prev_page_url: response.links.prev,
            first_page_url: response.links.first,
            last_page_url: response.links.last,
            current: response.meta.current_page,
            last_page: response.meta.last_page,
        }
        state.pagination = paginationInfo;
    },
    SPECIFIC_RESERVATION: (state, response) => {
        state.reservation_to_modify.request_form_no = response.request_form_no,
        state.reservation_to_modify.txt_date_request_occupy = response.date_request_occupy,
        state.reservation_to_modify.rdb_time_request_occupy = response.time_request_occupy,
        state.reservation_to_modify.rb_request_use_facilities = response.request_use_facilities,
        state.reservation_to_modify.txt_requested_group = response.requested_group,
        state.reservation_to_modify.txt_requested_group_contact = response.requested_group_contact,
        state.reservation_to_modify.txt_requested_group_email = response.requested_group_email,
        state.reservation_to_modify.txt_people_count = response.people_count,
        state.reservation_to_modify.txt_reserve_purpose = response.reserve_purpose

    }
};

const actions = {
    async saveReservation({commit}, reservation) {
        axios.post('http://127.0.0.1:8000/api/reservation', reservation)
        .then(response => {
            commit('RESERVATION_MSG', response.data);
        }).catch(error => {
            commit('SET_ERROR_MSG',  error.response.data.errors)
        });
    },

    async allReservation({ commit }, page_url) {
        if (page_url == null) {
            const response = await axios.get('http://127.0.0.1:8000/api/reservation');
          
            commit('ALL_RESERVATION', response.data);
        } else {
            const response = await axios.get(page_url);
            commit('ALL_RESERVATION', response.data);
        }    
    },
    async fetchSpecificReservation({ commit }, request_form_no) {
        const response = await axios.get(`http://127.0.0.1:8000/api/reservation/${request_form_no}`);
        commit('SPECIFIC_RESERVATION', response.data.data);
    },

    async updateReservation({commit}, reservation) {
        axios.put(`http://127.0.0.1:8000/api/reservation/${reservation.request_form_no}`, reservation)
        .then(response => {
            commit('RESERVATION_MSG', response.data);
        }).catch(error => {
            commit('SET_ERROR_MSG', response);
        });
        
    }



};


export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,

};