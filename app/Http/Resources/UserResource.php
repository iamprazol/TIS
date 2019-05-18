<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
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
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_admin' => $this->is_admin(),
            'checkpoint' => $this->checkpoint()
        ];
    }

    public function is_admin(){
        $admin = $this->is_admin;
        if($admin == 0){
            return 'Checkpoint User';
        } else {
            return 'Admin';
        }
    }

    public function checkpoint(){
        if($this->is_admin == 0) {
            if ($this->checkpointuser != null) {
                return $this->checkpointuser->checkpoint->checkpoint_name;
            } else {
                return null;
            }
        }else {
            return null;
        }
    }

}
