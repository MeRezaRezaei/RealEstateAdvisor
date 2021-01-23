<?php

namespace App\Http\Controllers;

use App\Http\InformationArrays\Options;
use App\Neighbourhood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class InsertOptionsController extends Controller
{
    //
    const NeighbourhoodArr = [
         [1,'معالی اباد']
        ,[2,'فرهنگ شهر']
    ];
    public function Index(){
        $Neighbourhood = new Neighbourhood();
        foreach (self::NeighbourhoodArr as $name){
            if ($item = $Neighbourhood::find($name[0])){
                if ($item->name == $name[1]){
                    echo 'Exist '.$name[0].' => '.$name[1].'<br>';
                }
                else{
                    $item->name = $name[1];
                    $item->save();
                    echo 'Saved '.$name[0].' => '.$name[1].'<br>';
                }
            }
            else{
                $Neighbourhood::Create([
                    'id'=>$name[0]
                    ,'name'=>$name[1]
                ]);
                echo 'Created '.$name[0].' => '.$name[1].'<br>';
            }
        }
    }
}
