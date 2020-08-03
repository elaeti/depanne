<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class intervention extends Pivot
{
    protected $fillable = array('ouvriers_id','annonces_id','date_fin','note');
    public static $rules = array('ouvriers_id' => 'required|integer',
                                 'annonces_id' => 'required|integer',
                                 'date_fin' => 'required|date',
                                 'note' => 'required|integer');
}
