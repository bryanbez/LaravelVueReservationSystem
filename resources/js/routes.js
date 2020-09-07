// import
import MainPage from './components/pages/MainPage';
import EventCalendar from './components/pages/user/EventCalendar';
import Reservation from './components/pages/user/Reservations';
//export
export default [
    { path: '/', component: MainPage },
    // user
    { path: '/eventcalendar', component: EventCalendar },
    { path: '/reservations', component: Reservation }
]