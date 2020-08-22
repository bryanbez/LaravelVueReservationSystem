<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationInputRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // all fields are based on vue inputs, not in database column name
        return [
            'txt_date_request_occupy' => 'required',
            'rdb_time_request_occupy' => 'required',
            'rb_request_use_facilities' => 'required',
            'txt_requested_group' => 'required',
            'txt_requested_group_contact' => 'required',
            'txt_requested_group_email' => 'required',
            'txt_people_count' => 'required',
            'txt_reserve_purpose' => 'required',
        ];
       
    }
    public function messages() {
        return [
            'txt_date_request_occupy.required' => 'Date Request Occupy is required',
            'rdb_time_request_occupy.required' => 'Time request occupy is required',
            'rb_request_use_facilities.required' => 'Facilities required',
            'txt_requested_group.required' => 'Name of Group required',
            'txt_requested_group_contact.required' => 'Contact number of group is required',
            'txt_requested_group_email.required' => 'Email of group is required',
            'txt_people_count.required' => 'People Count is required',
            'txt_reserve_purpose.required' => 'Reservation Purpose is required',
        ];

    }
}
