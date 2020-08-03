<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class InterventionResource extends Resource
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
            'ouvriers_id' => $this->ouvriers_id,
            'annonces_id' => $this->annonces_id,
            'note' => $this->note,
            'date_fin' => $this->date_fin


           
          ];
    }
}
