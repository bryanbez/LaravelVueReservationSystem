<template>
  <div>
      <h3> Main Pages </h3>
      <reservationTable></reservationTable>
  </div>
</template>

<script>
//import formReservation from '../layouts/forms/form_reservation';
import reservationTable from '../layouts/tables/reservationsList';
export default {
  components: {
    reservationTable,
  }
}
</script>

<style>

</style>