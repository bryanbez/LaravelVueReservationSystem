<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\ReservationModel;
use App\Http\Requests\ReservationInputRequest;


class ReservationController extends Controller
{
  
    public function index()
    {
        $allReservations = new ReservationModel();
        return $allReservations->getAllReservation();
    }

    public function create()
    {
        
    }

    public function store(ReservationInputRequest $request)
    {
        
        $validateRequest = $request->validated();

        $insertReservation = new ReservationModel();
        return $insertReservation->store($request);

    }

    public function show($request_form_no)
    {
        $reservationByRequestFormNo = new ReservationModel();
        return $reservationByRequestFormNo->getReservationByRequestFormNo($request_form_no);
    }

    public function edit($id)
    {
        //
    }

    public function update(ReservationInputRequest $request)
    {
        $validateRequest = $request->validated();
        $updateReservation = new ReservationModel();
        return $updateReservation->updateReservation($request);
    }

    public function destroy($id)
    {
        //
    }
}
