<?php

namespace App\Helpers;
use App\Models\User\ReservationModel;

trait GenerateReservationNo {

    static function generateNo() {
        $randomNum = rand(00000000, 99999999);

        if(self::checkGeneratedNoIfExistInDatabase($randomNum) == false) {
            return $randomNum;
        }
     
    }

    static function checkGeneratedNoIfExistInDatabase($number) {

        $request_form_numbers = new ReservationModel;

        if (in_array($number, $request_form_numbers->getAllRequestFormNo())) {
            return self::generateNo(); // looping the generateNo method until found a unique request form no
        }
        else {
            return false;
        }
    }
}