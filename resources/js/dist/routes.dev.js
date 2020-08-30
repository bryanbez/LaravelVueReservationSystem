"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _MainPage = _interopRequireDefault(require("./components/pages/MainPage"));

var _EventCalendar = _interopRequireDefault(require("./components/pages/EventCalendar"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

// import
//export
var _default = [{
  path: '/',
  component: _MainPage["default"]
}, {
  path: '/eventcalendar',
  component: _EventCalendar["default"]
}];
exports["default"] = _default;