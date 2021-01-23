<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $fillable = [
        'price',
        'property',
        'deal'
    ];
    public function propertyable(){
        return $this->morphTo();
    }
    public function advisor(){
        return $this->morphOne('App\Advisor','property');
    }
    public function dealtype(){
        return $this->hasOne('App\DealType');
    }
    public function Photos(){
        return $this->morphMany('App\Photo','image');
    }
}
