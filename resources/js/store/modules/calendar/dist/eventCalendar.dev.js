"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _axios = _interopRequireDefault(require("axios"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var state = {
  allevents: [],
  error_msg: [],
  toPasteEvent: []
};
var getters = {
  getAllEvents: function getAllEvents(state) {
    return state.allevents;
  },
  getErrorMsg: function getErrorMsg(state) {
    return state.error_msg;
  },
  getToCalendarEvent: function getToCalendarEvent(state) {
    return state.toPasteEvent;
  }
};
var actions = {
  fetchAllEvents: function fetchAllEvents(_ref) {
    var commit;
    return regeneratorRuntime.async(function fetchAllEvents$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            commit = _ref.commit;

            _axios["default"].get('http://127.0.0.1:8000/api/getallevents').then(function (response) {
              commit('PASTE_ALL_EVENTS', response.data);
              commit('TO_CALENDAR_EVENT', response.data);
            })["catch"](function (error) {
              commit('SET_ERROR_MSG', error.response.data.errors);
            });

          case 2:
          case "end":
            return _context.stop();
        }
      }
    });
  }
};
var mutations = {
  PASTE_ALL_EVENTS: function PASTE_ALL_EVENTS(state, response) {
    return state.allevents = response;
  },
  SET_ERROR_MSG: function SET_ERROR_MSG(state, error) {
    return state.error_msg = error;
  },
  TO_CALENDAR_EVENT: function TO_CALENDAR_EVENT(state, response) {
    $.each(response, function (key, value) {
      state.toPasteEvent.push({
        title: value['reserve_purpose'],
        date: value['date_request_occupy']
      });
    });
  }
};
var _default = {
  namespaced: true,
  state: state,
  getters: getters,
  actions: actions,
  mutations: mutations
};
exports["default"] = _default;