<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Serialize;
use App\Helpers\GenerateReservationNo;

class ReservationModel extends Model
{

    public $table = 'tbl_reservation';
    protected $guarded = [];

    public function getAllReservation() {

        $reservations = ReservationModel::paginate(1);
        return response()->json($reservations);
    }

    public function store($request) {

        $addReservation = new ReservationModel;
        $addReservation->request_form_no = GenerateReservationNo::generateNo();
        $addReservation->date_request_occupy = $request->txt_date_request_occupy;
        $addReservation->time_request_occupy = $request->rdb_time_request_occupy;
        $addReservation->request_use_facilities = Serialize::toSerialized($request->rb_request_use_facilities);
        $addReservation->requested_group = $request->txt_requested_group;
        $addReservation->requested_group_contact = $request->txt_requested_group_contact;
        $addReservation->requested_group_email = $request->txt_requested_group_email;
        $addReservation->people_count = $request->txt_people_count;
        $addReservation->reserve_purpose = $request->txt_reserve_purpose;
        $addReservation->reserve_status = 'Pending';
        $addReservation->save();

       return response()->json('Reservation Created Successfully');

    }

    public function getReservationByRequestFormNo($request_form_no) {
        $reservation = ReservationModel::where('request_form_no', $request_form_no)->get();
        return response()->json($reservation);
    }

    public function getAllRequestFormNo() : array {

        $allRequestFormNo = [];

        $reservations = ReservationModel::all();

        foreach($reservations as $reservation) {
            array_push($allRequestFormNo, $reservation->request_form_no);
        }

        return $allRequestFormNo;
    }
}
