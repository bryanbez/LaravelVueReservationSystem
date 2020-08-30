"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vuex = _interopRequireDefault(require("vuex"));

var _vue = _interopRequireDefault(require("vue"));

var _reservationAction = _interopRequireDefault(require("./modules/reservation/reservationAction.js"));

var _eventCalendar = _interopRequireDefault(require("./modules/calendar/eventCalendar.js"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

_vue["default"].use(_vuex["default"]);

var _default = new _vuex["default"].Store({
  modules: {
    reservationModule: _reservationAction["default"],
    eventCalendarModule: _eventCalendar["default"]
  }
});

exports["default"] = _default;