// import
import MainPage from './components/pages/MainPage';
import EventCalendar from './components/pages/user/EventCalendar';
import AddReservation from './components/pages/user/AddReservation';
//export
export default [
    { path: '/', component: MainPage },
    // user
    { path: '/eventcalendar', component: EventCalendar },
    { path: '/addreservation', component: AddReservation }
]