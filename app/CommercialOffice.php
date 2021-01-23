<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommercialOffice extends Model
{
    //
    protected $fillable = [
        'room_number'
        ,'floor_number'
        ,'total_floor'
        ,'units_per_floor_number'
        // options
        ,'unit_status'
        ,'document_type'
        ,'document_status'
        ,'heating_system'
        ,'cooling_system'
        ,'floor_kind'
        ,'direction'
        ,'cupboard'
        // integer
        ,'construction_year'
        ,'area'
        //  yes no
        ,'parking'
        ,'warehouse'
        ,'elevator'
        ,'balcony'
        ,'luxury'
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
