<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
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
            'tel' => $this->tel,
            'name' => $this->name,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
            'profillable_id' => $this->profillable_id,
            'profillable_type' => (string) $this->profillable_type,
           
          ];
    }
}

