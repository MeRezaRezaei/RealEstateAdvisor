<?php

namespace App\Http\Controllers;

use App\AdvisorInfo;
use Illuminate\Http\Request;

class DealFullInfoController extends Controller
{
    //
    public function index($id){
        $Advisor = AdvisorInfo::findOrFail($id);
//        ,'name'
//        ,'phone'
//        ,'pic_path'
        return view('Site.Advisor',['Advisor'=>$Advisor]);
    }
}
