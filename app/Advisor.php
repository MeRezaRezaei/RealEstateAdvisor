<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Advisor extends Model
{
    //
    protected $fillable = [
        'advisor_infos_id'
    ];
    public function Property(){
        return $this->morphTo();
    }
    public function advisor_infos(){
        return $this->belongsTo('App\AdvisorInfo');
    }
}
