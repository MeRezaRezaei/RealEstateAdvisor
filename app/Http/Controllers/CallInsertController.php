<?php

namespace App\Http\Controllers;

use App\Call;
use Illuminate\Http\Request;

class CallInsertController extends Controller
{
    //
    public function Index(Request $Request){
        $Condition = '';
        if ($Request->has('Phone') && $Request->has('Name')
        ){
            $Phone = $Request->get('Phone');
            $Name = trim($Request->get('Name'));
            if (preg_match("/^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/",$Phone) || preg_match("/^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/",$Phone)
            ){
                if (substr($Phone,0,1) == '9'){
                    $Phone = '0'.$Phone;
                }
                $Call = new Call();
                if ($Call->where('phone',$Phone)->count() == 0){
                    if ($Call->Create([
                        'phone'      =>$Phone
                        ,'name'      =>$Name
                        ,'have_seen' =>false
                    ])){
                        $Condition = 'a';
                    }
                    else{
                        $Condition = 'b';
                    }
                }
                else {
                    $Condition = 'c';
                }
            }
            else{
                return 'error in phone validation';
            }
        }
        if ($Condition == ''){
            return view('Site.Call',[
                'Condition'=>$Condition
            ]);
        }
        return view('Site.Call',[
            'Condition'=>$Condition
            ,'Phone'=>$Phone
            ,'Name'=>$Name
        ]);
    }
}
