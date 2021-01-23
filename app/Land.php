<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $fillable = [
        'gozar'

        ,'document_type'
        ,'document_status'
        ,'use_for'
        ,'direction'

        ,'bar'
        ,'area'

        ,'address'
        ,'description'
    ];
    ///var/www/html/Laravel/RealEstateAdvisor/app/Land.php
    public function Photos()
    {
        return $this->morphMany('App\Photo','image');
    }
    public function Photo()
    {
        return $this->morphOne('App\Photo','image');
    }
    public function Buys()
    {
        return $this->morphMany('App\Buy','buy');
    }
    public function Buy()
    {
        return $this->belongsTo('App\Buy');

    }
    public function propertyable()
    {
        return $this->morphOne('App\Property','propertyable');
    }
    public function Property(){
        return $this->morphOne('App\Property','propertyable');
    }
}
