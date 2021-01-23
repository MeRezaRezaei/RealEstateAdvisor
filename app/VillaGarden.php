<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VillaGarden extends Model
{
    //
    protected $fillable = [
        'total_floor'

        ,'unit_status'
        ,'document_type'
        ,'document_status'
        ,'facade'

        ,'construction_year'
        ,'total_area'
        ,'foundation_area'
        ,'tree_number'

        ,'water'
        ,'electricity'
        ,'plumbing_gas'
        ,'phone'
        ,'swimming_pool'
        ,'sauna'
        ,'jacuzzi'
        ,'luxury'

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
