<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldAge extends Model
{
    //
    protected $fillable =[
        'total_floor'
        ,'gozar'

        ,'document_type'
        ,'document_status'
        ,'direction'

        ,'construction_year'
        ,'bar'
        ,'total_area'
        ,'foundation_area'

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
