<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ouvrier extends Model
{
    

     public function interventions(){
        return $this->belongsToMany('App\annonce')->using('App\Intervention');
    } 

    public function profil(){
        return $this->morphOne('App\user');
    }

    
}
