<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $fillable = [
        'unit_height'
        // options
        ,'document_type'
        ,'document_status'
        ,'heating_system'
        ,'cooling_system'
        ,'direction'
        // integer
        ,'construction_year'
        ,'balcony_area'
        ,'floor_area'
        ,'total_area'
        // Boolean
        ,'water'
        ,'electricity'
        ,'gas'
        ,'phone'
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
