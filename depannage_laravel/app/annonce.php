<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class annonce extends Model
{
    protected $fillable = array('users_id','categories_id','description','titre');
    public static $rules = array('description' => 'required|text',
    	                         'titre' => 'required|string',
                                 'users_id' => 'required|integer',
                                 'categories_id' => 'required|integer',
                                 'date_publication' => 'required|date');

 public function annonce(){
        return $this->belongsTo('App\User');
    }

 public function intervention(){
    return $this->belongsToMany('App\ouvrier')->using('App\Intervention');
}

public function Categorie_annonces(){
    return $this->belongsTo('App\categorie');
}

    

}
