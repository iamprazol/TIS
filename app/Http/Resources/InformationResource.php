<?php

namespace App\Http\Resources;
use Carbon\Carbon;

use Illuminate\Http\Resources\Json\JsonResource;

class InformationResource extends JsonResource
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
            'id' => $this->id,
            'tourist_name' => $this->tourist_name,
            'country_name' => $this->country_name,
            'age' => $this->age,
            'purpose' => $this->purpose->purpose,
            'visa_period' => Carbon::parse($this->visa_period)->format('d/m/Y'),
        ];
    }
}
