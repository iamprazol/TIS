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
            'nepali_date' => $this->nepali_date,
            'checkpoint_id' => $this->checkpoint_id,
            'checkpoint_name' => $this->checkpoint->checkpoint_name,
            'country_id' => $this->country_id,
            'country_name' => $this->countries->country_name,
            'tourist_name' => $this->tourist_name,
            'tourist_type' => $this->type(),
            'purpose' => $this->purpose(),
            'duration' => $this->duration,
            'age' => $this->age,
            'gender' => $this->gender,
            'visa_period' => Carbon::parse($this->visa_period)->format('d/m/Y'),
            'passport_number' => $this->passport_number,
            'editable' => $this->editable
        ];
    }

    public function purpose(){
        foreach ($this->userpurpose as $pu ){
            $purpose[] = $pu->purpose->purpose;
        }
        $purposes = implode(",", $purpose);
        return $purpose;
    }

    public function type(){
        if($this->tourist_type == 0){
            return "Domestic";
        } else {
            return "International";
        }
    }
}
