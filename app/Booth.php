<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booth extends Model
{
    //
    protected $fillable =[
        'document_type'
        ,'document_status'
        ,'construction_year'
        ,'area'
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
