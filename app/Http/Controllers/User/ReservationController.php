<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\ReservationModel;
use App\Http\Requests\ReservationInputRequest;


class ReservationController extends Controller
{

    public $reservation;

    public function __construct()
    {
        $this->reservation = new ReservationModel();
    }
  
    public function index()
    {
       // $allReservations = new ReservationModel();
        return $this->reservation->getAllReservation();
    }

    public function create()
    {
        
    }

    public function store(ReservationInputRequest $request)
    {
        
        $validateRequest = $request->validated();

       // $insertReservation = new ReservationModel();
        return $this->reservation->store($request);

    }

    public function show($request_form_no)
    {
        //$reservationByRequestFormNo = new ReservationModel();
        return $this->reservation->getReservationByRequestFormNo($request_form_no);
    }

    public function edit($id)
    {
        //
    }

    public function update(ReservationInputRequest $request)
    {
        $validateSRequest = $request->validated();
       // $updateReservation = new ReservationModel();
        return $this->reservation->updateReservation($request);
    }

    public function destroy($id)
    {
        //
    }

    public function dateAndScheduleList() {
       // $updateReservation = new ReservationModel();
        return $this->reservation->getDateAndSchedule();
    }

    public function getEvents() {
        return $this->reservation->getAllEvents();
    }
}
