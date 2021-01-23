<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchResolveController extends Controller
{
    //
    protected $Property;
    protected $Deal;
    protected $PriceRange;
    protected $PriceOrder;
    protected $Neighbourhood;
    protected $RoomNumber;
    protected $Area;
    protected $Rent;
    protected $PreRent;

    public function Start(Request $Request){
        if (   $Request->has('Property')
            && $Request->has('Deal')
            && $Request->has('PriceRange')
            && $Request->has('PriceOrder')
            && $Request->has('Neighbourhood')
            && is_numeric($Request->get('Property'))
            && is_numeric($Request->get('Deal'))
            && is_numeric($Request->get('PriceRange'))
            && is_numeric($Request->get('PriceOrder'))
            && is_numeric($Request->get('Neighbourhood'))
        ){
            $this->Property      = $Request->get('Property');
            $this->Deal          = $Request->get('Deal');
            $this->PriceRange    = $Request->get('PriceRange');
            $this->PriceOrder    = $Request->get('PriceOrder');
            $this->Neighbourhood = $Request->get('Neighbourhood');

            if ($Request->has('RoomNumber') && is_numeric($Request->get('RoomNumber'))){
                $this->RoomNumber = $Request->get('RoomNumber');
            }
            else{
                unset($this->RoomNumber);
            }
            if ($Request->has('Area') && is_numeric($Request->get('Area'))){
                $this->Area = $Request->get('Area');
            }
            else{
                unset($this->Area);
            }
            if ($Request->has('Rent') && is_numeric($Request->get('Rent'))){
                $this->Rent = $Request->get('Rent');
            }
            else{
                unset($this->Rent);
            }
            if ($Request->has('PreRent') && is_numeric($Request->get('PreRent'))){
                $this->PreRent = $Request->get('PreRent');
            }
            else{
                unset($this->PreRent);
            }
            if ($this->Deal == '3'){
                if (isset($this->Area) && isset($this->RoomNumber))
                    return redirect()->route('WithRoomRent',[
                        'Property'       =>$this->Property
                        ,'Deal'          =>$this->Deal
                        ,'PriceRange'    =>$this->PriceRange
                        ,'PriceOrder'    =>$this->PriceOrder
                        ,'Area'          =>$this->Area
                        ,'Neighbourhood' =>$this->Neighbourhood
                        ,'RoomNumber'    =>$this->RoomNumber
                        ,'Rent'          =>$this->Rent
                        ,'PreRent'       =>$this->PreRent
                    ]);
                else
                    return redirect()->route('WithoutRoomRent',[
                        'Property'       =>$this->Property
                        ,'Deal'          =>$this->Deal
                        ,'PriceRange'    =>$this->PriceRange
                        ,'PriceOrder'    =>$this->PriceOrder
                        ,'Neighbourhood' =>$this->Neighbourhood
                        ,'Rent'          =>$this->Rent
                        ,'PreRent'       =>$this->PreRent
                    ]);
            }
            else{
                if (isset($this->Area) && isset($this->RoomNumber)){
                    return redirect()->route('WithRoom',[
                        'Property'       =>$this->Property
                        ,'Deal'          =>$this->Deal
                        ,'PriceRange'    =>$this->PriceRange
                        ,'PriceOrder'    =>$this->PriceOrder
                        ,'Area'          =>$this->Area
                        ,'Neighbourhood' =>$this->Neighbourhood
                        ,'RoomNumber'    =>$this->RoomNumber

                    ]);
                }
                else{
                    return redirect()->route('WithoutRoom',[
                        'Property'       =>$this->Property
                        ,'Deal'          =>$this->Deal
                        ,'PriceRange'    =>$this->PriceRange
                        ,'PriceOrder'    =>$this->PriceOrder
                        ,'Neighbourhood' =>$this->Neighbourhood

                    ]);
                }
            }
        }
        else{
            return 'Missing Arguments';
        }
    }
}
