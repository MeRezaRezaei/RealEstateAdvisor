<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighbourhood extends Model
{
    //
    protected $fillable = ['id','name'];
    public $timestamps = false;
}
