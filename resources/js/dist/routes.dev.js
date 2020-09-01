"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _MainPage = _interopRequireDefault(require("./components/pages/MainPage"));

var _EventCalendar = _interopRequireDefault(require("./components/pages/user/EventCalendar"));

var _AddReservation = _interopRequireDefault(require("./components/pages/user/AddReservation"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

// import
//export
var _default = [{
  path: '/',
  component: _MainPage["default"]
}, // user
{
  path: '/eventcalendar',
  component: _EventCalendar["default"]
}, {
  path: '/addreservation',
  component: _AddReservation["default"]
}];
exports["default"] = _default;