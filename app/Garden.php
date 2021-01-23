<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    //
    protected $fillable = [
        'document_type'
        ,'document_status'
        ,'area'
        ,'tree_number'
        ,'room'
        ,'address'
        ,'description'
    ];
    public function Photos()
    {
        return $this->morphMany('App\Photo','image');
    }
    public function Property(){
        return $this->morphOne('App\Property','propertyable');
    }
}
