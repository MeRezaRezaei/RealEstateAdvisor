<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvisorInfo extends Model
{
    //
    protected $fillable = [
        'role_id'
        ,'name'
        ,'phone'
        ,'pic_path'
    ];
    public function Advisors(){
        return $this->hasMany('App\Advisor','advisor_infos_id','id');
    }
}
