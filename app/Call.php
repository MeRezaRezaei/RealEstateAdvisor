<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    //
    protected $fillable = [
         'phone'
        ,'name'
        ,'have_seen'
    ];
}
