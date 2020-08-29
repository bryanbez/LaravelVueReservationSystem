<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [
            'request_form_no' => $this->request_form_no,
            'date_request_occupy' => $this->date_request_occupy,
            'time_request_occupy' => $this->time_request_occupy,
            'request_use_facilities' => unserialize($this->request_use_facilities),
            'requested_group' => $this->requested_group,
            'requested_group_contact' => $this->requested_group_contact,
            'requested_group_email' => $this->requested_group_email,
            'people_count' => $this->people_count,
            'reserve_purpose' => $this->reserve_purpose,
            'reserve_status' => $this->reserve_status
        ];
    }
}
