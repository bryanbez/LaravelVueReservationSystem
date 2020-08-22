<template>
  <div>

         <form @submit.prevent="addReservation" method="post">

            <div v-if="reservationMsg" class="alert alert-primary"> {{ reservationMsg }} </div>

            <div class="col-md-12 col-lg-12 mb-2">
                <label for="txt_date_request_occupy">Event Date</label>
                <input type="date" v-model="reservation.txt_date_request_occupy" class="form-control">
                <span v-if="errorMsg.txt_date_request_occupy" class="error"> {{ errorMsg.txt_date_request_occupy | trimCharacters }} </span>   
            </div>

            <div class="col-md-12 col-lg-12 mb-2">
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
                 <span v-if="errorMsg.rdb_time_request_occupy" class="error"> {{ errorMsg.rdb_time_request_occupy | trimCharacters }} </span>
            </div>

            <div class="col-md-12 col-lg-12 mb-2">
                <label for="txt_requested_group">Requested Group Name</label>
                <input type="text" v-model="reservation.txt_requested_group" class="form-control">
                <span v-if="errorMsg.txt_requested_group" class="error"> {{ errorMsg.txt_requested_group | trimCharacters }} </span>
            </div>
            
            <div class="col-md-12 col-lg-12 mb-2">
                <label for="txt_requested_group_contact">Requested Group Contact No.</label>
                <input type="text" v-model="reservation.txt_requested_group_contact" class="form-control">
                <span v-if="errorMsg.txt_requested_group_contact" class="error"> {{ errorMsg.txt_requested_group_contact | trimCharacters }} </span>
            </div>

            <div class="col-md-12 col-lg-12 mb-2">
                <label for="txt_requested_group_email">Requested Group Email </label>
                <input type="text" v-model="reservation.txt_requested_group_email" class="form-control">
                <span v-if="errorMsg.txt_requested_group_email" class="error"> {{ errorMsg.txt_requested_group_email | trimCharacters }} </span>
            </div>

            <div class="col-md-12 col-lg-12 mb-2">
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
                 <span v-if="errorMsg.rb_request_use_facilities" class="error"> {{ errorMsg.rb_request_use_facilities | trimCharacters }} </span>
            </div>

            <div class="col-md-12 col-lg-12 mb-2">
                <label for="txt_people_count"> People Count </label>
                <input type="text" v-model="reservation.txt_people_count" class="form-control">
                 <span v-if="errorMsg.txt_people_count" class="error"> {{ errorMsg.txt_people_count | trimCharacters }} </span>
            </div>

            <div class="col-md-12 col-lg-12 mb-2">
                <label for="txt_reserve_purpose"> Reserve Purpose </label>
                <textarea v-model="reservation.txt_reserve_purpose" class="form-control" cols="30" rows="10"></textarea>
                <span v-if="errorMsg.txt_reserve_purpose" class="error"> {{ errorMsg.txt_reserve_purpose | trimCharacters }} </span>
            </div>
           
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
    created() {
        this.setInputValueInEditReservation();
    //    this.reservation.txt_requested_group = this.getSpecificReservation.requested_group
  
    },
    computed: {
        ...mapGetters({
            reservationMsg: 'reservationModule/getReservationMsg',
            errorMsg: 'reservationModule/getErrorMsg',
            getSpecificReservation: 'reservationModule/getSpecificReservation',
        }),
        
    },
    methods: {
        ...mapActions('reservationModule', ['fetchSpecificReservation']),
        setInputValueInEditReservation() {
            console.log(this.getSpecificReservation);
            this.reservation = this.getSpecificReservation
        },
        updateReservation() {
            //this.$store.dispatch('reservationModule/saveReservation', this.reservation);   
        }


    },
    filters: {
        trimCharacters: function(value) {
            return value.toString();
        }
    },

}
</script>

<style scoped>

.error {
    color: rgb(167, 5, 5);

}
</style>