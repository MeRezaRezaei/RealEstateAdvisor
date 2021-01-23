<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellRent extends Model
{
    //
    public function Property(){
        return $this->morphTo();
    }
}
