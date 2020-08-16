<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class ReservationModel extends Model
{
    public $table = 'tbl_reservation';
    protected $guarded = [];

    public function store($request) {

        $addReservation = new ReservationModel;
        $addReservation->request_form_no = 321734874;
        $addReservation->date_request_occupy = $request->txt_date_request_occupy;
        $addReservation->time_request_occupy = $request->rdb_time_request_occupy;
        $addReservation->request_use_facilities = $request->rb_request_use_facilities;
        $addReservation->requested_group = $request->txt_requested_group;
        $addReservation->requested_group_contact = $request->txt_requested_group_contact;
        $addReservation->requested_group_email = $request->txt_requested_group_email;
        $addReservation->people_count = $request->txt_people_count;
        $addReservation->reserve_purpose = $request->txt_reserve_purpose;
        $addReservation->reserve_status = 'Pending';
        $addReservation->save();

    }
}
