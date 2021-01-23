<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    //
    protected $fillable = [
        'price',
        'kind',
        'method'
    ];
    public function Apartment()
    {
        return $this->hasOne('App\Apartment');
    }
    public function Shop()
    {
        return $this->hasOne('App\Shop');
    }
    public function buy(){
        return $this->morphTo();
    }
}
