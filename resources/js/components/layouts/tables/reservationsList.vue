<template>
  <div>

    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addReservationModal"> Add Reservation </button>

    <div class="modal" id="addReservationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Reservation</h5>
            <button type="button" class="close" data-dismiss="modal" @click="refreshReservations" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <reservationForm></reservationForm>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="refreshReservations" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th> Event Date </th>
            <th> Event Time </th>
            <th> Requested Group</th>
            <th> Reserve Status </th>
            <th colspan="2"> Options </th>
        </tr>
        <tr v-for="reservation in reservationList" :key="reservation.request_form_no">
            <td> {{ reservation.date_request_occupy }} </td>
            <td> {{ reservation.time_request_occupy | eventTimeFilter }} </td>
            <td> {{ reservation.requested_group }} </td>
            <td> {{ reservation.reserve_status }} </td>
            <td> <button class="btn btn-primary" data-toggle="modal" data-target="#updateModal" @click="editReservation(reservation.request_form_no)"> Edit </button></td>
            <td> <button class="btn btn-success" data-toggle="modal" data-target="#statusModal"  @click="changeStatus(reservation.request_form_no)"> Change Status </button></td>
        </tr>
    </table>


    <ul class="pagination">
        <li v-bind:class="[{disabled: !getPagination.prev_page_url}]" class="page-item"><a @click="refreshList(getPagination.prev_page_url)" class="page-link"> Prev </a></li>
        <li class="page-item disabled"><a class="page-link"> {{getPagination.current}} of {{getPagination.last_page}} </a></li>
        <li v-bind:class="[{disabled: !getPagination.next_page_url}]" class="page-item"><a @click="refreshList(getPagination.next_page_url)" class="page-link"> Next </a></li>
    </ul>

    <div class="modal" id="updateModal" tabindex="-1" role="dialog" v-if="is_edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Update Reservation</h5>
            <button type="button" class="close" data-dismiss="modal" @click="refreshReservations" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <reservationFormToUpdate></reservationFormToUpdate>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

      <div class="modal" id="statusModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> Change Status </h5>
            <button type="button" class="close" data-dismiss="modal" @click="refreshReservations" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <changeStatus></changeStatus>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  @click="refreshReservations" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <!-- <reservationForm></reservationForm> -->

  </div>
</template>

<script>
import  {mapGetters, mapActions, mapState} from 'vuex';
import reservationFormToUpdate from '../forms/form_reservation_to_update';
import reservationForm from '../forms/form_reservation';
import changeStatus from '../forms/form_reserve_status';
export default {
    components: {
        reservationFormToUpdate,
        reservationForm,
        changeStatus
    },
    data() {
        return {
            is_edit: false,
            reservationToEdit: [],
        }
    },
    created() {
       this.allReservation();
    },
    computed: {
         ...mapGetters({
            reservationList: 'reservationModule/getAllReservation',
            getPagination: 'reservationModule/getPagination',
            getSpecificReservation: 'reservationModule/getSpecificReservation',
        }),

    },
    methods: {
        ...mapActions('reservationModule', ['allReservation', 'fetchSpecificReservation', 'removeSuccessAndErrorMsg', 'statusOfSpecificReservation']),
        refreshList(page_url) {
    		this.allReservation(page_url);
        },
        editReservation(request_form_no) {
           this.fetchSpecificReservation(request_form_no);   
           this.is_edit = true;  
       
        },
        refreshReservations() {
             this.allReservation();
             this.removeSuccessAndErrorMsg()
           
        },
        changeStatus(request_form_no) {
            this.statusOfSpecificReservation(request_form_no);
        }
 
    },
    filters: {
        eventTimeFilter(eventTime) {
            if (eventTime == 'am') {
                return 'AM';
            }
            else if(eventTime == 'pm') {
                return 'PM';
            }
            else {
                return 'Whole Day';
            }
        }
    }

}
</script>

<style scoped>
.pagination{
    cursor: pointer;
}
</style>