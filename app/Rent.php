<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    //
    protected $fillable = [
        'rent'
        ,'pre_rent'
        ,'changeable'
    ];
    public function Property(){
        return $this->morphTo();
    }
}
