<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AnnonceResource extends Resource
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
            'description' => $this->description,
            'titre' => $this->titre,
            'users_id' => $this->users_id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'categories_id' => $this->categories_id
          ];
    }
}
