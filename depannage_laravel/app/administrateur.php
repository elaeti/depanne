<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrateur extends Model
{
    

        public function profils(){
             return $this->morphOne('App\user');
                                }
}
