<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealType extends Model
{
    //
    protected $fillable = [
        'properties_id'
        ,'month'
        ,'change_able'
        ,'pre_price'
        ,'rent_price'
    ];
    public function property(){
        return $this->belongsTo('App\Property');
    }
}
