<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = array('libelle');
    public static $rules = array('libelle' => 'required|string'
                                 );

       public function Categories_annonces(){
        return $this->hasMany('App\annonce');
    } 
}
