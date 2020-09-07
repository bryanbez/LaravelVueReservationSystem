<template>
  <div>

          <form @submit.prevent="updateReservation" method="post">

            <div v-if="reservationMsg" class="alert alert-primary"> {{ reservationMsg }} </div>

            <input type="hidden" v-model="reservation.request_form_no" class="form-control">

            <select v-model="reservation.slt_reserve_status" class="form-control mb-2">
                <option value="Pending"> Pending </option>
                <option value="Approved"> Approved </option>
                <option value="Rejected"> Rejected </option>
            </select>

            <input type="submit" name="updateReservation" class="btn btn-primary mb-2" value="Update Status">

          </form>
  </div>
</template>

<script>
import  {mapGetters, mapActions} from 'vuex';
export default {
    data() {
        return {
            reservation: {
                request_form_no: '',
                slt_reserve_status: ''
            },
        }
      
    },
    computed: {
           ...mapGetters({
            reservationMsg: 'reservationModule/getReservationMsg',
            errorMsg: 'reservationModule/getErrorMsg',
            reservationStatus: 'reservationModule/getReservationStatus',
        }),
    },
    created() {
       this.pasteSpecificReservationStatus();
       
     
    },
    methods: {
         ...mapActions('reservationModule', ['fetchSpecificReservation']),
        pasteSpecificReservationStatus() {
            this.reservation = this.reservationStatus;
        }
    }
}
</script>

<style>

</style>