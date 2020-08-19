<template>
  <div>

         <form @submit.prevent="addReservation" method="post">

            <div v-if="reservationMsg" class="alert alert-primary"> {{ reservationMsg }} </div>
            <div v-if="errorMsg" class="alert alert-primary"> {{ errorMsg }} </div>

            <label for="txt_date_request_occupy">Event Date</label>
            <input type="date" v-model="reservation.txt_date_request_occupy" class="form-control mb-3">

            <label for="rdb_time_request_occupy">Event Time</label>
            <br />
            <label class="radio-inline mr-5">
                <input type="radio" v-model="reservation.rdb_time_request_occupy" value="am" id=""> AM
            </label>
            <label class="radio-inline mr-5">
                <input type="radio" v-model="reservation.rdb_time_request_occupy" value="pm" id=""> PM
            </label>
            <label class="radio-inline mr-5">
                <input type="radio" v-model="reservation.rdb_time_request_occupy" value="whole_day" id=""> Whole Day
            </label>
            <br />

            <label for="txt_requested_group">Requested Group Name</label>
            <input type="text" v-model="reservation.txt_requested_group" class="form-control mb-3">

            <label for="txt_requested_group_contact">Requested Group Contact No.</label>
            <input type="text" v-model="reservation.txt_requested_group_contact" class="form-control mb-3">

            <label for="txt_requested_group_email">Requested Group Email </label>
            <input type="text" v-model="reservation.txt_requested_group_email" class="form-control mb-3">

            <label for="">Request Facilities</label>
            <br />
            <div class="form-check">
                <input type="checkbox" class="form-check-input" v-model="reservation.rb_request_use_facilities" id="rb_poolside" value="poolside">
                <label for="rb_poolside" class="form-check-label">
                     Poolside
                </label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" v-model="reservation.rb_request_use_facilities" id="rb_function_hall" value="function_hall">
                <label for="rb_function_hall" class="form-check-label">
                    Function Hall
                </label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" v-model="reservation.rb_request_use_facilities" id="rb_private_room" value="private_room">
                <label for="rb_private_room" class="form-check-label">
                     Private Room
                </label>
            </div>
            <br />

            <label for="txt_people_count"> People Count </label>
            <input type="text" v-model="reservation.txt_people_count" class="form-control mb-3">

            <label for="txt_reserve_purpose"> Reserve Purpose </label>
            <textarea v-model="reservation.txt_reserve_purpose" class="form-control mb-3" cols="30" rows="10"></textarea>
           
            <input type="submit" name="addreservationdata" class="btn btn-primary mb-5" value="Add Reservation">
        </form>
  </div>
</template>

<script>
import  {mapGetters, mapActions} from 'vuex';
export default {
    data() {
        return {
            reservation: {
                txt_date_request_occupy: '',
                rdb_time_request_occupy: '',
                txt_requested_group: '',
                txt_requested_group_contact: '',
                txt_requested_group_email: '',
                rb_request_use_facilities: [],
                txt_people_count: '',
                txt_reserve_purpose: ''
            },
            reservation_message: ''
        }
    },
    computed: {
        ...mapGetters({
            reservationMsg: 'reservationModule/getReservationMsg',
            sampleLang: 'reservationModule/getSampleMsg',
            errorMsg: 'reservationModule/getErrorMsg'
        })
    },
    methods: {
        ...mapActions('reservationModule', ['saveReservation']),
        addReservation() {
            this.$store.dispatch('reservationModule/saveReservation', this.reservation);
         
        }
    }

}
</script>

<style>

</style>