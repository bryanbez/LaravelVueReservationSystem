<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Serialize;
use App\Helpers\GenerateReservationNo;
use App\Http\Resources\ReservationResource;

class ReservationModel extends Model
{

    public $table = 'tbl_reservation';
    protected $guarded = [];

    public function getAllReservation() {

        $reservations = ReservationModel::paginate(5);
        return ReservationResource::collection($reservations);
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
        $reservation = ReservationModel::where('request_form_no', $request_form_no)->first();
        return new ReservationResource($reservation);
    }

    public function getAllRequestFormNo() : array {

        $allRequestFormNo = [];

        $reservations = ReservationModel::all();

        foreach($reservations as $reservation) {
            array_push($allRequestFormNo, $reservation->request_form_no);
        }

        return $allRequestFormNo;
    }

    public function updateReservation($request) {

        try {

            $updateReservation = new ReservationModel();
            $updateReservation::where('request_form_no', $request->request_form_no)->update([
                'date_request_occupy' => $request->txt_date_request_occupy,
                'time_request_occupy' => $request->rdb_time_request_occupy,
                'request_use_facilities' =>  Serialize::toSerialized($request->rb_request_use_facilities),
                'requested_group' => $request->txt_requested_group,
                'requested_group_contact' => $request->txt_requested_group_contact,
                'requested_group_email' => $request->txt_requested_group_email,
                'people_count' => $request->txt_people_count,
                'reserve_purpose' => $request->txt_reserve_purpose
            ]);

            return response()->json('Request Form No: '. $request->request_form_no. ' updated successfully');
    
        }
        catch(Exception $e) {
            return response()->json('Error updating request form no: '. $request->request_form_no);
        }

    }

    public function getDateAndSchedule() {

        $allDate = ReservationModel::get(['date_request_occupy', 'time_request_occupy', 'reserve_status']);
        return response()->json($allDate);
    }

    public function getAllEvents() {
        $getEvents = ReservationModel::where('reserve_status', 'Pending')->get(['date_request_occupy', 'time_request_occupy', 'reserve_purpose']);
        return response()->json($getEvents);
    }


}
