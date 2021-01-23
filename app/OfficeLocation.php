<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeLocation extends Model
{
    //
    protected $fillable =[
        'room_number'
        ,'floor_number'
        ,'total_floor'
        ,'units_per_floor_number'

        ,'unit_status'
        ,'document_type'
        ,'document_status'
        ,'heating_system'
        ,'cooling_system'
        ,'floor_kind'
        ,'direction'
        ,'cupboard'

        ,'construction_year'
        ,'area'

        ,'balcony'
        ,'parking'
        ,'warehouse'
        ,'elevator'
        ,'lobby'
        ,'hood'
        ,'plate_gas'

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
