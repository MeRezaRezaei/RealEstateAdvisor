<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    //
    protected $fillable = [
        'total_floor'
        ,'floor_number'
        ,'bedroom'

        ,'unit_status'
        ,'document_type'
        ,'document_status'
        ,'facade'
        ,'floor_type'
        ,'direction'
        ,'cupboard'

        ,'construction_year'
        ,'area'
        ,'foundation_area'
        ,'any_floor_area'

        ,'balcony'
        ,'parking'
        ,'elevator'
        ,'warehouse'
        ,'plumbing_gas'
        ,'phone'
        ,'swimming_pool'
        ,'sauna'
        ,'jacuzzi'
        ,'master_bedroom'
        ,'luxury'
        ,'hole_sell'
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
