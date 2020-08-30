<template>
  <div>
      <FullCalendar :options="calendarOptions"></FullCalendar>

  </div>
</template>

<script>
import  {mapGetters, mapActions} from 'vuex';
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
export default {
    components: {
        FullCalendar
    },
    data() {
        return {
            calendarOptions: {
                plugins: [ dayGridPlugin, interactionPlugin ],
                initialView: 'dayGridMonth',
                dateClick: this.handleDateClick,
                events: []
            }
        }
    },
    computed: {
        ...mapGetters({
            getAllEvents: 'eventCalendarModule/getAllEvents',
            errorMsg: 'eventCalendarModule/getErrorMsg',
            getToCalendarEvent: 'eventCalendarModule/getToCalendarEvent',
        })
    },
    created() {
        this.fetchAllEvents();
        this.pasteEvents();
    },
    methods: {
        ...mapActions('eventCalendarModule', ['fetchAllEvents']),
        pasteEvents() {
            this.calendarOptions.events = this.getToCalendarEvent
        }
    }
    
}
</script>

<style>

</style>