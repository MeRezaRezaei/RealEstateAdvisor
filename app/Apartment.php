<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    // todo: complete Mass assignment
    protected $fillable = [
        // tiny int
        'room'
        ,'floor_number'
        ,'total_floors'
        ,'units_per_floor_number'
        // options
        ,'floor_type'
        ,'document_type'
        ,'document_status'
        ,'toilet_type'
        ,'heating_system'
        ,'cooling_system'
        ,'facade'
        ,'direction'
        ,'cupboard'
        ,'price'
        ,'deal'
        ,'neighbourhood'
        // integers
        ,'construction_year'
        ,'area'
        // boolean
        ,'unit_status'
        ,'water_heater'
        ,'balcony'
        ,'parking'
        ,'elevator'
        ,'warehouse'
        ,'swimming_pool'
        ,'sauna'
        ,'jacuzzi'
        ,'phone'
        ,'master_bedroom'
        ,'plumbing_gas'
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
    public function Photo()
    {
        return $this->morphOne('App\Photo','image');
    }
    public function advisor(){
        return $this->morphOne('App\Advisor','property');
    }
    public function Rent(){
        return $this->morphOne('App\Rent','property');
    }
    public function SellRent(){
        return $this->morphOne('App\SellRent','property');
    }
    public function Neighbourhood(){
        return $this->hasOne('App\Neighbourhood', 'id', 'neighbourhood');
    }

//    public function Property(){
//        return $this->morphOne('App\Property','propertyable');
//    }
//    public function Buy()
//    {
//        return $this->belongsTo('App\Buy');
//    }

}
