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
            'role' => $this->is_admin(),
            'checkpoint' => $this->checkpoint()
        ];
    }

    public function is_admin(){
        $admin = $this->role_id;
        if($admin == 2){
            return 'Checkpoint User';
        } elseif($admin == 1){
            return 'Admin';
        } else {
            return 'Guest';
        }
    }

    public function checkpoint(){
        if($this->role_id == 2) {
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
