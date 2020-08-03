<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProfilResource extends Resource
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
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'type' => $this->type,
            
            'profillable_id' => $this->profillable_id,
            'profillable_type' => (string) $this->profillable_type,
           
          ];
    }
}
