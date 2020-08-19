<?php

namespace App\Helpers;
use App\Models\User\ReservationModel;
use App\Helpers\GenerateReservationNo;

trait CheckForDuplicates {

    static function checkRequestFormID($generatedRequestFormNo) {

        $request_form_numbers = new ReservationModel;

        if (in_array($generatedRequestFormNo, $request_form_numbers->getAllRequestFormNo())) {
            return true;
        }
        else {
            return false;
        }
        
    }
    
}