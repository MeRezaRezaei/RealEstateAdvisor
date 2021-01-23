<?php

namespace App\Http\Controllers;

use App\Neighbourhood;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function Index(){
        return view('Site.index',[
            'Neighbourhood'   =>Neighbourhood::all()
        ]);
    }
}
