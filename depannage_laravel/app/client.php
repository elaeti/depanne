<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{    


    public function profils(){
        return $this->morphOne('App\user');
    }
 
}
