<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Booth;
use App\CommercialOffice;
use App\Garden;
use App\House;
use App\Land;
use App\Neighbourhood;
use App\OfficeLocation;
use App\OldAge;
use App\Property;
use App\Shop;
use App\VillaGarden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    const PerPage = 2;

    // Neighbourhood Range


    // Variables
    protected $Property;
    protected $Deal;
    protected $PriceRang;
    protected $PriceOrder;
    protected $Area;
    protected $Neighbourhood;
    protected $RoomNumber;
    protected $Rent;
    protected $PreRent;

    // Main function

    public function FromIndex(Request $Search)
    {
        $Condition = false;
        // the user wants a kind of property from a tag
        if ($Search->has('page') && is_numeric($Search->page)){
            $Condition ='p';
        }// the user wants a kind of property from a tag
        elseif ($Search->has('Property') == true && $Search->has('Deal') == false) {
            $Property = $Search->Property;
            if (is_numeric($Property)){
                $IntProperty = (int)$Property;
                if ($Property == '0'){
                    // Never happen
                    return 0;
                }
                elseif ($IntProperty >= 1 && $IntProperty <= 10){
                    $Condition = '25';
                }
            }

        } // the user wants a kind of deal from a tag
        elseif ($Search->has('Property') == false && $Search->has('Deal') == true) {
            $Deal = $Search->Deal;
            if (is_numeric($Deal)){
                $IntDeal = (int)$Deal;
                if ($Deal == '0'){
                    // Never happen
                    return 0;
                }
                elseif ($IntDeal >= 1 && $IntDeal <= 5){
                    $Condition = '26';
                }
            }

        } // the user sends data from form

        elseif ($Search->has('Property') == true
            && $Search->has('Deal') == true
            && $Search->has('PriceRange') == true
            && $Search->has('PriceOrder') == true
        ) {
            $Property   = $Search->Property;
            $Deal       = $Search->Deal;
            $PriceRange = $Search->PriceRange;
            $PriceOrder = $Search->PriceOrder;
            if (
            is_numeric($Property)
            && is_numeric($Deal)
            && is_numeric($PriceRange)
            && is_numeric($PriceOrder)
            ){
                $IntProperty = (int)$Property;
                $IntDeal = (int)$Deal;
                $IntPriceRange = (int)$PriceRange;
                if ($Property  == '0') {
                    if ($Deal == '0') {
                        if ($PriceRange == '0') {
                            if ($PriceOrder == '1') {
                                //
                                $Condition = '1';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '2';
                            }
                        }
                        elseif ($PriceRange == '12'){
                            if ($PriceOrder == '1') {
                                $Condition = '3';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '4';
                            }
                        }
                        elseif ($IntPriceRange >= 1 && $IntPriceRange <= 11) {
                            if ($PriceOrder == '1') {
                                $Condition = '5';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '6';
                            }
                        }
                    }
                    elseif($IntDeal >= 1 && $IntDeal <= 5) {
                        if ($PriceRange == '0') {
                            if ($PriceOrder == '1') {
                                $Condition = '7';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '8';
                            }
                        }
                        elseif ($PriceRange == '12'){
                            if ($PriceOrder == '1') {
                                $Condition = '9';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '10';
                            }
                        }
                        elseif ($IntPriceRange >= 1 && $IntPriceRange <= 11) {
                            if ($PriceOrder == '1') {
                                $Condition = '11';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '12';
                            }
                        }
                    }
                }
                elseif($IntProperty >= 1 && $IntProperty <= 10) {
                    if ($Deal == '0') {
                        if ($PriceRange == '0') {
                            if ($PriceOrder == '1') {
                                $Condition = '13';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '14';
                            }
                        }
                        elseif ($PriceRange == '12'){
                            if ($PriceOrder == '1') {
                                $Condition = '15';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '16';
                            }
                        }
                        elseif ($IntPriceRange >= 1 && $IntPriceRange <= 11) {
                            if ($PriceOrder == '1') {
                                $Condition = '17';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '18';
                            }
                        }
                    }
                    elseif($IntDeal >= 1 && $IntDeal <= 5) {
                        if ($PriceRange == '0') {
                            if ($PriceOrder == '1') {
                                $Condition = '19';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '20';
                            }
                        }
                        elseif ($PriceRange == '12'){
                            if ($PriceOrder == '1') {
                                $Condition = '21';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '22';
                            }
                        }
                        elseif ($IntPriceRange >= 1 && $IntPriceRange <= 11) {
                            if ($PriceOrder == '1') {
                                $Condition = '23';
                            }
                            elseif ($PriceOrder == '2') {
                                $Condition = '24';
                            }
                        }
                    }
                }
            }
            else{
                // todo return Error;
            }

        }
        if ($Condition == false){
            // return sth is wrong
            return 'Some Thing is Wrong';
        }
        $PropertySearched   = '';
        $DealSearched       = '';
        $PriceRangeSearched = '';
        $PriceOrderSearched = '';

        if($Condition == 'p'){
            if(session()->has('Condition')){
                $Condition = session('Condition');
            }
            else{
                return 'مدت زمان جستجوی فعلی شما به پایان رسیده لطفا برای جستجوی موارد دیگر وارد صفحه اصلی سایت شوید';
            }
            if(session()->has('PropertySearched')){
                $PropertySearched = session('PropertySearched');
            }
            if(session()->has('DealSearched')){
                $DealSearched = session('DealSearched');
            }
            if(session()->has('PriceRangeSearched')){
                $PriceRangeSearched = session('PriceRangeSearched');
            }
            if(session()->has('PriceOrderSearched')){
                $PriceOrderSearched = session('PriceOrderSearched');
            }
        }
        else{
            $PropertySearched   = $Search->Property;
            $DealSearched       = $Search->Deal;
            $PriceRangeSearched = $Search->PriceRange;
            $PriceOrderSearched = $Search->PriceOrder;
            session([
                'Condition'          =>$Condition
                ,'PropertySearched'  =>$PropertySearched
                ,'DealSearched'      =>$DealSearched
                ,'PriceRangeSearched'=>$PriceRangeSearched
                ,'PriceOrderSearched'=>$PriceOrderSearched
            ]);

        }

        //return session()->all();

        $PropertyInfos = [];
        $PropertyDB = $this->GetPropertyInformation($Condition,$PropertySearched,$DealSearched,$PriceRangeSearched);
        foreach ($PropertyDB as $Property){
            array_push($PropertyInfos,$this->GetInformation($Property->id));
        }
        //return $PropertyInfos;


        $PropertyPersian   = $this->GetPropertyPersianNameByNumber($PropertySearched);
        $DealPersian       = $this->GetDealPersianNameByNumber    ($DealSearched);
        $PriceRangePersian = $this->GetPriceRangeByNumber         ($PriceRangeSearched);
        $PriceOrderPersian = $this->GetPriceOrderByName           ($PriceOrderSearched);

        $SearchedPersian = [
             'Property'   =>$PropertyPersian
            ,'Deal'       =>$DealPersian
            ,'PriceRange' =>$PriceRangePersian
            ,'PriceOrder' =>$PriceOrderPersian
            ,'PageNumber' =>$PropertyDB->currentPage()
        ];
        //return ['PropertyInfos'   =>$PropertyInfos,'SearchedPersian' =>$SearchedPersian,'Pager'           => $PropertyDB];
        return view('Site.Search', [
             'PropertyInfos'   =>$PropertyInfos
            ,'SearchedPersian' =>$SearchedPersian
            ,'Pager'           => $PropertyDB
        ]);
    }

    protected function Index(){
        $Table = DB::table($this->GetPropertyTableName());
        $Table->select($this->GetPropertyTableName().'.id');
        if ($this->Deal == '3'){
            $Table->where('deal',3);
            $Table->join('rents',$this->GetPropertyTableName().'.id','rents.property_id')
            ->where('rents.property_type',$this->GetPropertyModelName())
            ->whereBetween('rents.rent',[0,100])
            ->whereBetween('rents.pre_rent',[0,100]);
        }
        elseif($this->Deal != '0'){
            $Table->where('deal','=',(int)$this->Deal);
        }
        switch ($this->PriceRang){
            case '0':{
                break;
            }
            case '1':{
                $Table->whereBetween('price',[0,100000000]);
                break;
            }
            case '2':{
                $Table->whereBetween('price',[100000000,300000000]);
                break;
            }
            case '3':{
                $Table->whereBetween('price',[300000000,600000000]);
                break;
            }
            case '4':{
                $Table->whereBetween('price',[600000000,1000000000]);
                break;
            }
            case '5':{
                $Table->whereBetween('price',[1000000000,1500000000]);
                break;
            }
            case '6':{
                $Table->whereBetween('price',[1500000000,2000000000]);
                break;
            }
            case '7':{
                $Table->whereBetween('price',[2000000000,2500000000]);
                break;
            }
            case '8':{
                $Table->whereBetween('price',[2500000000,3000000000]);
                break;
            }
            case '9':{
                $Table->whereBetween('price',[3000000000,4000000000]);
                break;
            }
            case '10':{
                $Table->whereBetween('price',[4000000000,5000000000]);
                break;
            }
            case '11':{
                $Table->whereBetween('price',[5000000000,6000000000]);
                break;
            }
            case '12':{
                $Table->where('price','>',6000000000);
                break;
            }
        }
        if ($this->PriceOrder == '0'){
            $Table->orderBy('price','desc');
        }
        elseif ($this->PriceOrder == '1'){
            $Table->orderBy('price','asc');
        }
        if (isset($this->Area)){
            switch ($this->Area){
                case '0':{
                    break;
                }
                case '1':{
                    $Table->whereBetween('area',[0,75]);
                    break;
                }
                case '2':{
                    $Table->whereBetween('area',[75,120]);
                    break;
                }
                case '3':{
                    $Table->where('area','>',120);
                    break;
                }
            }
        }
        if (isset($this->RoomNumber)){
            if ($this->RoomNumber == '0')
            {

            }
            elseif ($this->RoomNumber == '5'){
                $Table->where('room','>=',4);
            }
            else{
                $Table->where('room','=',(int)$this->RoomNumber);
            }
        }

        if ($this->Neighbourhood == '0'){

        }
        else{
            $Table->where('neighbourhood','=',(int)$this->Neighbourhood);
        }
        $Pages = $Table->paginate(self::PerPage);
        //dd($Table);
        $Infos = [];
        foreach ($Pages as $Item){
            $PropertyOB = false;
            $Info = [];
            switch ($this->Property){
                case '1':{
                    $PropertyOB = Apartment::find($Item->id);
                    $Info += [
                         'Room'=>$PropertyOB->room
                        ,'Area'=>$this->NumberSeparator($PropertyOB->area)
                        ,'ConstructionYear' =>$PropertyOB->construction_year
                    ];
                    break;
                }
                case '2':{
                    $PropertyOB = Shop::find($Item->id);
                    $Info += [

                         'Area'             =>$this->NumberSeparator($PropertyOB->area)
                        ,'BalconyArea'      =>$this->NumberSeparator($PropertyOB->balcony_area)
                        ,'FloorArea'        =>$this->NumberSeparator($PropertyOB->floor_area)
                        ,'ConstructionYear' =>$PropertyOB->construction_year
                    ];
                    break;
                }
                case '3':{
                    $PropertyOB = CommercialOffice::find($Item->id);
                    $Info += [
                         'Room'=>$PropertyOB->room
                        ,'Area'=>$this->NumberSeparator($PropertyOB->area)
                        ,'ConstructionYear' =>$PropertyOB->construction_year
                    ];
                    break;
                }
                case '4':{
                    $PropertyOB = Garden::find($Item->id);
                    $Info += [
                         'Area'=>$this->NumberSeparator($PropertyOB->area)
                        ,'TreeNumber'=>$PropertyOB->tree_number
                    ];
                    break;
                }
                case '5':{
                    $PropertyOB = House::find($Item->id);
                    $Info += [
                         'Room'=>$PropertyOB->room
                        ,'Area'=>$this->NumberSeparator($PropertyOB->area)
                        ,'FoundationArea'   =>$this->NumberSeparator($PropertyOB->foundation_area)
                        ,'ConstructionYear' =>$PropertyOB->construction_year
                    ];
                    break;
                }
                case '6':{
                    $PropertyOB = VillaGarden::find($Item->id);
                    $Info += [
                         'Area'             =>$this->NumberSeparator($PropertyOB->area)
                        ,'FoundationArea'   =>$this->NumberSeparator($PropertyOB->foundation_area)
                        ,'TreeNumber'       =>$PropertyOB->tree_number
                        ,'ConstructionYear' =>$PropertyOB->construction_year
                    ];
                    break;
                }
                case '7':{
                    $PropertyOB = Booth::find($Item->id);
                    $Info += [
                         'Area'=>$this->NumberSeparator($PropertyOB->area)
                        ,'ConstructionYear' =>$PropertyOB->construction_year
                    ];
                    break;
                }
                case '8':{
                    $PropertyOB = OldAge::find($Item->id);
                    $Info += [
                         'Area'             =>$this->NumberSeparator($PropertyOB->area)
                        ,'Bar'              =>$this->NumberSeparator($PropertyOB->bar)
                        ,'ConstructionYear' =>$PropertyOB->construction_year
                    ];
                    break;
                }
                case '9':{
                    $PropertyOB = OfficeLocation::find($Item->id);
                    $Info += [
                         'Room'=>$PropertyOB->room
                        ,'Area'=>$this->NumberSeparator($PropertyOB->area)
                        ,'ConstructionYear' =>$PropertyOB->construction_year
                    ];
                    break;
                }
                case '10':{
                    $PropertyOB = Land::find($Item->id);
                    $Info += [
                         'Area'  =>$this->NumberSeparator($PropertyOB->area)
                        ,'Bar'   =>$this->NumberSeparator($PropertyOB->propertyable->bar)
                        ,'Gozar' =>$this->NumberSeparator($PropertyOB->propertyable->gozar)
                    ];
                    break;
                }
            }
            switch ($PropertyOB->deal){
                case 3:{
                    $Info += [
                         'Rent'       =>$this->NumberSeparator($PropertyOB->Rent->rent)
                        ,'PreRent'    =>$this->NumberSeparator($PropertyOB->Rent->pre_rent)
                        ,'Changeable' =>$PropertyOB->Rent->changeable
                    ];
                    break;
                }
                case 4:{
                    $Info += [
                         'Rent'       =>$this->NumberSeparator($PropertyOB->SellRent->rent)
                        ,'PreRent'    =>$this->NumberSeparator($PropertyOB->SellRent->pre_rent)
                        ,'Changeable' =>$PropertyOB->SellRent->changeable
                        ,'month'      =>$PropertyOB->SellRent->month
                    ];
                    break;
                }
            }
            $PPersian = $this->GetPropertyPersianNameByNumber($this->Property);
            $DPersian = $this->GetDealPersianNameByNumber($PropertyOB->deal);
            $Info += [
                 'Id'              =>$PropertyOB->id
                ,'Price'           =>$this->NumberSeparator($PropertyOB->price)
                ,'DealPersian'     =>$DPersian
                ,'PropertyPersian' =>$PPersian
                ,'PropertyLink'    =>route('Property.show', ['id' => $PropertyOB->id,'type'=>$this->Property])
                ,'PropertyType'    =>$this->Property
                ,'DealType'        =>$PropertyOB->deal
                ,'Address'         =>$PropertyOB->address
                ,'Neighbourhood'   =>$PropertyOB->Neighbourhood->name
                ,'photoPath'       =>$PropertyOB->Photo->path
                ,'AdvisorPhoto'    =>$PropertyOB->advisor->advisor_infos->pic_path
                ,'AdvisorPhone'    =>$PropertyOB->advisor->advisor_infos->phone
                ,'AdvisorName'     =>$PropertyOB->advisor->advisor_infos->name
                ,'AdvisorLink'     =>route('Advisor.show', ['id' => $PropertyOB->advisor->advisor_infos->id])

            ];
        array_push($Infos,$Info);
        }
        $PropertyPersian   = $this->GetPropertyPersianNameByNumber($this->Property);
        $DealPersian       = $this->GetDealPersianNameByNumber    ($this->Deal);
        $PriceRangePersian = $this->GetPriceRangeByNumber         ($this->PriceRang);
        $PriceOrderPersian = $this->GetPriceOrderByName           ($this->PriceOrder);
        $SearchedPersian = [

             'NProperty'   =>$this->Property
            ,'NDeal'       =>$this->Deal
            ,'NPriceRange' =>$this->PriceRang
            ,'NPriceOrder' =>$this->PriceOrder
            ,'PProperty'   =>$PropertyPersian
            ,'PDeal'       =>$DealPersian
            ,'PPriceRange' =>$PriceRangePersian
            ,'PPriceOrder' =>$PriceOrderPersian
            ,'PageNumber'  =>$Pages->currentPage()
        ];
        if (isset($this->RoomNumber) && isset($this->Area)){
            $SearchedPersian += [
                 'NRent'    =>$this->Area
                ,'PRent'    =>$this->GetRoomNumberPersian()
                ,'NPreRent' =>$this->GetAreaPersian()
                ,'PPreRent' =>$this->GetAreaPersian()
            ];
        }
        // todo add rent Persian
        if (isset($this->Rent) && isset($this->PreRent)){
            $SearchedPersian += [
                'NArea'       =>$this->Area
                ,'PRoomNumber' =>$this->GetRoomNumberPersian()
                ,'PArea'       =>$this->GetAreaPersian()
            ];
        }
        //return dd($Infos);
        return view('Site.Search', [
             'PropertyInfos'   =>$Infos
            ,'SearchedPersian' =>$SearchedPersian
            ,'Pager'           =>$Pages
            ,'Neighbourhood'   =>Neighbourhood::all()
        ]);
    }
    protected function GetRoomNumberPersian(){
        if(isset($this->RoomNumber))
            switch ($this->RoomNumber){
                case '0':{
                    return 'مهم نیست';
                }
                case '1':{
                    return 'یک';
                }
                case '2':{
                    return 'دو';
                }
                case '3':{
                    return 'سه';
                }
                case '4':{
                    return 'چهار';
                }
                case '5':{
                    return 'بیشتر از چهار';
                }
            }
    }

    protected function NumberSeparator($Number){
        //return substr('123456789ab',-3,3);
        $NumberCharacter = (string)$Number;
        $CharacterCount = strlen($NumberCharacter);
        if ($CharacterCount > 3){
            $CharacterDivide = $CharacterCount/3;
            $CharacterDivideInt = (int)$CharacterDivide;
            //echo $NumberCharacter.' '.$CharacterCount.' '.$CharacterDivide.' '.$CharacterDivideInt.'<br>';
            $Time = 0;
            if ($CharacterDivideInt == $CharacterDivide){
                $Time = $CharacterDivideInt;
            }
            elseif($CharacterDivideInt <= $CharacterDivide){

                $Time = $CharacterDivideInt+1;
            }
            $n = 3;
            $StrArr = [];
            for ($i=-3;$i>=$Time*-3;$i-=3){
                array_push($StrArr,substr($NumberCharacter,$i,$n));
                if ($n==3){
                    $n = -3;
                }
                elseif($q = $n - $i <3){
                    $n -= $q;
                }
                else{
                    $n -= 3;
                }
            }
            $StrCount = count($StrArr);
            $Str = '';

            for($j =$StrCount-1;$j>=0;$j--){
                if ($j==0){
                    $Str .= $StrArr[$j];
                }
                else{
                    $Str .= $StrArr[$j].',';
                }

            }
            return $Str;

        }
        else{
            return $NumberCharacter;
        }

    }

    /*protected function GetPropertyModel(){
        switch ($this->Property){
            case '1':{
                return new Apartment();
            }
            case '2':{
                return new Shop();
            }
            case '3':{
                return new CommercialOffice();
            }
            case '4':{
                return new Garden();
            }
            case '5':{
                return new House();
            }
            case '6':{
                return new VillaGarden();
            }
            case '7':{
                return new Booth();
            }
            case '8':{
                return new OldAge();
            }
            case '9':{
                return new OfficeLocation();
            }
            case '10':{
                return new Land();
            }
        }
    }*/

    protected function GetPropertyModelName(){
        switch ($this->Property){
            case '1':{
                return 'App\Apartment';
            }
            case '2':{
                return 'App\Shop';
            }
            case '3':{
                return 'App\CommercialOffice';
            }
            case '4':{
                return 'App\Garden';
            }
            case '5':{
                return 'App\House';
            }
            case '6':{
                return 'App\VillaGarden';
            }
            case '7':{
                return 'App\Booth';
            }
            case '8':{
                return 'App\OldAge';
            }
            case '9':{
                return 'App\OfficeLocation';
            }
            case '10':{
                return 'App\Land';
            }
        }
    }

    protected function GetPropertyTableName(){
        switch ($this->Property){
            case '1':{
                return 'apartments';
            }
            case '2':{
                return 'shops';
            }
            case '3':{
                return 'commercial_offices';
            }
            case '4':{
                return 'gardens';
            }
            case '5':{
                return 'houses';
            }
            case '6':{
                return 'villa_gardens';
            }
            case '7':{
                return 'booths';
            }
            case '8':{
                return 'old_ages';
            }
            case '9':{
                return 'office_locations';
            }
            case '10':{
                return 'lands';
            }
        }
    }

    protected function NeighbourhoodMax(){
        return Neighbourhood::all()->count();
    }

    public function WithRoom($Property,$Deal,$PriceRang,$PriceOrder,$Neighbourhood,$Area,$RoomNumber){
        if (   is_numeric($Property)
            && is_numeric($Deal)
            && is_numeric($PriceRang)
            && is_numeric($PriceOrder)
            && is_numeric($Area)
            && is_numeric($Neighbourhood)
            && is_numeric($RoomNumber)
            && $Property   >  0 && $Property   <= 10
            && $Deal       >= 0 && $Deal       <= 5
            && $PriceRang  >= 0 && $PriceRang  <= 12
            && $PriceOrder == 0 || $PriceOrder == 1
            && $Area       >= 0 && $Area       <= 3
            && $RoomNumber >= 0 && $RoomNumber <= 20
            && $Neighbourhood >= 0 && $Neighbourhood <= $this->NeighbourhoodMax()

        ){

            $this->Property   = $Property;
            $this->Deal       = $Deal;
            $this->PriceRang  = $PriceRang;
            $this->PriceOrder = $PriceOrder;
            $this->Area       = $Area;
            $this->Neighbourhood = $Neighbourhood;
            $this->RoomNumber = $RoomNumber;
            unset($this->Rent);
            unset($this->PreRent);
            return $this->Index();

        }
        else{
            return 'Problem Whit Numbers';
        }

    }

    public function WithoutRoom($Property,$Deal,$PriceRang,$PriceOrder,$Neighbourhood){
        if (   is_numeric($Property)
            && is_numeric($Deal)
            && is_numeric($PriceRang)
            && is_numeric($PriceOrder)
            && is_numeric($Neighbourhood)
            && $Property   >  0 && $Property   <= 10
            && $Deal       >= 0 && $Deal       <= 5
            && $PriceRang  >= 0 && $PriceRang  <= 12
            && $PriceOrder == 0 || $PriceOrder == 1
            && $Neighbourhood >= 0 && $Neighbourhood <= $this->NeighbourhoodMax()
        ){
            $this->Property   = $Property;
            $this->Deal       = $Deal;
            $this->PriceRang  = $PriceRang;
            $this->PriceOrder = $PriceOrder;
            $this->Neighbourhood = $Neighbourhood;
            unset($this->Area);
            unset($this->RoomNumber);
            unset($this->Rent);
            unset($this->PreRent);
            return $this->Index();
        }
        else{
            return 'Problem Whit Numbers';
        }
    }
    // whit rent
    public function WithRoomRent($Property,$Deal,$PriceRang,$PriceOrder,$Neighbourhood,$Rent,$PreRent,$Area,$RoomNumber){
        if (   is_numeric($Property)
            && is_numeric($Deal)
            && is_numeric($PriceRang)
            && is_numeric($PriceOrder)
            && is_numeric($Area)
            && is_numeric($Neighbourhood)
            && is_numeric($RoomNumber)
            && is_numeric($Rent)
            && is_numeric($PreRent)
            && $Rent       >= 0 && $Rent       <= 1
            && $PreRent    >= 0 && $PreRent    <= 1
            && $Property   >  0 && $Property   <= 10
            && $Deal       >= 0 && $Deal       <= 5
            && $PriceRang  >= 0 && $PriceRang  <= 12
            && $PriceOrder == 0 || $PriceOrder == 1
            && $Area       >= 0 && $Area       <= 3
            && $RoomNumber >= 0 && $RoomNumber <= 20
            && $Neighbourhood >= 0 && $Neighbourhood <= $this->NeighbourhoodMax()

        ){

            $this->Property   = $Property;
            $this->Deal       = $Deal;
            $this->PriceRang  = $PriceRang;
            $this->PriceOrder = $PriceOrder;
            $this->Area       = $Area;
            $this->Neighbourhood = $Neighbourhood;
            $this->RoomNumber = $RoomNumber;
            $this->Rent       = $Rent;
            $this->PreRent    = $PreRent;
            return $this->Index();

        }
        else{
            return 'Problem Whit Numbers';
        }

    }

    public function WithoutRoomRent($Property,$Deal,$PriceRang,$PriceOrder,$Neighbourhood,$Rent,$PreRent){
        if (   is_numeric($Property)
            && is_numeric($Deal)
            && is_numeric($PriceRang)
            && is_numeric($PriceOrder)
            && is_numeric($Neighbourhood)
            && is_numeric($Rent)
            && is_numeric($PreRent)
            && $Rent       >= 0 && $Rent       <= 1
            && $PreRent    >= 0 && $PreRent    <= 1
            && $Property   >  0 && $Property   <= 10
            && $Deal       >= 0 && $Deal       <= 5
            && $PriceRang  >= 0 && $PriceRang  <= 12
            && $PriceOrder == 0 || $PriceOrder == 1
            && $Neighbourhood >= 0 && $Neighbourhood <= $this->NeighbourhoodMax()
        ){
            $this->Property   = $Property;
            $this->Deal       = $Deal;
            $this->PriceRang  = $PriceRang;
            $this->PriceOrder = $PriceOrder;
            $this->Neighbourhood = $Neighbourhood;
            $this->Rent       = $Rent;
            $this->PreRent    = $PreRent;
            unset($this->Area);
            unset($this->RoomNumber);
            return $this->Index();
        }
        else{
            return 'Problem Whit Numbers';
        }
    }

    // functions for fetch received data
    protected function GetInformation($id){
        $PropertyOB = Property::findOrFail($id);
        $PropertyInfo = [];
        switch ($PropertyOB->property){
            // Apartment
            case 1:{
                $PropertyInfo += [
                    'Area'              =>$PropertyOB->propertyable->area
                    ,'BedRoom'          =>$PropertyOB->propertyable->bedroom
                    ,'ConstructionYear' =>$PropertyOB->propertyable->construction_year
                ];
                break;
            }
            // Shop
            case 2:{
                $PropertyInfo += [
                    'Area'              =>$PropertyOB->propertyable->total_area
                    ,'BalconyArea'      =>$PropertyOB->propertyable->balcony_area
                    ,'FloorArea'        =>$PropertyOB->propertyable->floor_area
                    ,'ConstructionYear' =>$PropertyOB->propertyable->construction_year
                ];
                break;
            }
            // CommercialOffice
            case 3:{
                $PropertyInfo += [
                    'Area'              =>$PropertyOB->propertyable->area
                    ,'RoomNumber'       =>$PropertyOB->propertyable->room_number
                    ,'ConstructionYear' =>$PropertyOB->propertyable->construction_year
                ];
                break;
            }
            // Garden
            case 4:{
                $PropertyInfo += [
                    'Area'              =>$PropertyOB->propertyable->area
                    ,'TreeNumber'   =>$PropertyOB->propertyable->tree_number
                ];
                break;
            }
            // House
            case 5:{
                $PropertyInfo += [
                    'Area'              =>$PropertyOB->propertyable->area
                    ,'FoundationArea'   =>$PropertyOB->propertyable->foundation_area
                    ,'ConstructionYear' =>$PropertyOB->propertyable->construction_year
                ];
                break;
            }
            // VillaGarden
            case 6:{
                $PropertyInfo += [
                    'Area'              =>$PropertyOB->propertyable->total_area
                    ,'FoundationArea'   =>$PropertyOB->propertyable->foundation_area
                    ,'ConstructionYear' =>$PropertyOB->propertyable->construction_year
                ];
                break;
            }
            // Booth
            case 7:{
                $PropertyInfo += [
                    'Area'              =>$PropertyOB->propertyable->area
                    ,'ConstructionYear' =>$PropertyOB->propertyable->construction_year

                ];
                break;
            }
            // OldAge
            case 8:{
                $PropertyInfo += [
                    'Area'              =>$PropertyOB->propertyable->total_area
                    ,'Bar'              =>$PropertyOB->propertyable->bar
                    ,'ConstructionYear' =>$PropertyOB->propertyable->construction_year

                ];
                break;
            }
            // OfficeLocation
            case 9:{
                $PropertyInfo += [
                    'Area'              =>$PropertyOB->propertyable->area
                    ,'ConstructionYear' =>$PropertyOB->propertyable->construction_year
                    ,'RoomNumber'       =>$PropertyOB->propertyable->room_number
                ];
                break;
            }
            // Land
            case 10:{
                $PropertyInfo = [
                    'Area'         =>$PropertyOB->propertyable->area
                    ,'Bar'          =>$PropertyOB->propertyable->bar
                    ,'Gozar'        =>$PropertyOB->propertyable->gozar

                ];
            }
        }
        switch ($PropertyOB->deal){
            // Rent
            case 3:{
                $PropertyInfo += [
                    'PrePrice'   =>$PropertyOB->dealtype->pre_price
                    ,'RentPrice'  =>$PropertyOB->dealtype->rent_price
                    ,'ChangeAble' =>$PropertyOB->dealtype->change_able
                ];
                break;
            }
            // BuyRent
            case 4:{
                $PropertyInfo += [
                    'Month'      =>$PropertyOB->dealtype->month
                    ,'PrePrice'   =>$PropertyOB->dealtype->pre_price
                    ,'RentPrice'  =>$PropertyOB->dealtype->rent_price
                    ,'ChangeAble' =>$PropertyOB->dealtype->change_able
                ];
                break;
            }
            case 1:case 2:{
            $PropertyInfo += [
                'Price'=>$PropertyOB->price
            ];
                break;
        }
        }
        $PPersian = $this->GetPropertyPersianNameByNumber($PropertyOB->property);
        $DPersian = $this->GetDealPersianNameByNumber($PropertyOB->deal);
        $PhotosTemp =$PropertyOB->propertyable->Photos;
        $Photo = '';
        foreach ($PhotosTemp as $Photos){
            $Photo=$Photos->path;
            break;
        }

        $PropertyInfo += [
            'DealPersian'      =>$DPersian
            ,'PropertyPersian' =>$PPersian
            ,'PropertyLink' =>route('Property.show', ['id' => $PropertyOB->id])
            ,'PropertyType' =>$PropertyOB->property
            ,'DealType'     =>$PropertyOB->deal
            ,'Address'      =>$PropertyOB->propertyable->address
            ,'photoPath'    =>$Photo
            ,'AdvisorPhoto' =>$PropertyOB->advisor     ->advisor_infos->pic_path
            ,'AdvisorPhone' =>$PropertyOB->advisor     ->advisor_infos->phone
            ,'AdvisorName'  =>$PropertyOB->advisor     ->advisor_infos->name
            ,'AdvisorLink'  =>route('Advisor.show', ['id' => $PropertyOB->advisor->advisor_infos->id])
        ];
        return $PropertyInfo;
    }

    protected function GetPropertyInformation($Condition,$Property,$Deal,$PriceRange){
        $data = false;
        switch ($Condition){
            /* 1
            Property   = All
            Deal       = All
            PriceRange = All
            PriceOrder = BTK */
            case '1':{
                $data =
                    DB::table('properties')
                    ->select('id')
                    ->orderBy('price','desc')
                    ->paginate(self::PerPage);
                break;
            }
            /* 2
            Property   = All
            Deal       = All
            PriceRange = All
            PriceOrder = KBT */
            case '2':{
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 3
            Property   = All
            Deal       = All
            PriceRange = 6
            PriceOrder = BTK */
            case '3':{
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('price', '>', 6000000000)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 4
            Property   = All
            Deal       = All
            PriceRange = 6
            PriceOrder = KTB */
            case '4':{
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('price', '>', 6000000000)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 5
            Property   = All
            Deal       = All
            PriceRange = Number
            PriceOrder = BTK */
            case '5':{
                $PriceRange = $this->GetPriceRange($PriceRange);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->whereBetween('price',$PriceRange)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 6
            Property   = All
            Deal       = All
            PriceRange = Number
            PriceOrder = KBT */
            case '6':{
                $PriceRange = $this->GetPriceRange($PriceRange);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->whereBetween('price',$PriceRange)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 7
            Property   = All
            Deal       = Number
            PriceRange = All
            PriceOrder = BTK */
            case '7':case'26':{
                $Deal = $this->GetDealNumber($Deal);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('deal','=',$Deal)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 8
            Property   = All
            Deal       = Number
            PriceRange = All
            PriceOrder = KBT */
            case '8':{
                $Deal = $this->GetDealNumber($Deal);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('deal','=',$Deal)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 9
            Property   = All
            Deal       = Number
            PriceRange = 6
            PriceOrder = BTK */
            case '9':{
                $Deal = $this->GetDealNumber($Deal);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('deal','=',$Deal)
                        ->where('price', '>', 6000000000)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 10
            Property   = All
            Deal       = Number
            PriceRange = 6
            PriceOrder = KTB */
            case '10':{
                $Deal = $this->GetDealNumber($Deal);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('deal','=',$Deal)
                        ->where('price', '>', 6000000000)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 11
            Property   = All
            Deal       = Number
            PriceRange = Number
            PriceOrder = BTK */
            case '11':{
                $Deal = $this->GetDealNumber($Deal);
                $PriceRange = $this->GetPriceRange($PriceRange);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('deal','=',$Deal)
                        ->whereBetween('price',$PriceRange)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 12
            Property   = All
            Deal       = Number
            PriceRange = Number
            PriceOrder = KTB */
            case '12':{
                $Deal = $this->GetDealNumber($Deal);
                $PriceRange = $this->GetPriceRange($PriceRange);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('deal','=',$Deal)
                        ->whereBetween('price',$PriceRange)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 13
            Property   = Number
            Deal       = All
            PriceRange = All
            PriceOrder = BTK */
            case '13':case '25':{
                $Property = $this->GetPropertyNumber($Property);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 14
            Property   = Number
            Deal       = All
            PriceRange = All
            PriceOrder = KTB */
            case '14':{
                $Property = $this->GetPropertyNumber($Property);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 15
            Property   = Number
            Deal       = All
            PriceRange = 6
            PriceOrder = BTK */
            case '15':{
                $Property = $this->GetPropertyNumber($Property);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->where('price', '>', 6000000000)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 16
            Property   = Number
            Deal       = All
            PriceRange = 6
            PriceOrder = KTB */
            case '16':{
                $Property = $this->GetPropertyNumber($Property);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->where('price', '>', 6000000000)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 17
            Property   = Number
            Deal       = All
            PriceRange = Number
            PriceOrder = BTK */
            case '17':{
                $Property = $this->GetPropertyNumber($Property);
                $PriceRange = $this->GetPriceRange($PriceRange);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->whereBetween('price',$PriceRange)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 18
            Property   = Number
            Deal       = All
            PriceRange = Number
            PriceOrder = KTB */
            case '18':{
                $Property = $this->GetPropertyNumber($Property);
                $PriceRange = $this->GetPriceRange($PriceRange);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->whereBetween('price',$PriceRange)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 19
            Property   = Number
            Deal       = Number
            PriceRange = All
            PriceOrder = BTK */
            case '19':{
                $Property = $this->GetPropertyNumber($Property);
                $Deal = $this->GetDealNumber($Deal);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->where('deal','=',$Deal)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 20
            Property   = Number
            Deal       = Number
            PriceRange = All
            PriceOrder = KTB */
            case '20':{
                $Property = $this->GetPropertyNumber($Property);
                $Deal = $this->GetDealNumber($Deal);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->where('deal','=',$Deal)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 21
            Property   = Number
            Deal       = Number
            PriceRange = 6
            PriceOrder = BTK */
            case '21':{
                $Property = $this->GetPropertyNumber($Property);
                $Deal = $this->GetDealNumber($Deal);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->where('deal','=',$Deal)
                        ->where('price', '>', 6000000000)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 22
            Property   = Number
            Deal       = Number
            PriceRange = 6
            PriceOrder = KTB */
            case '22':{
                $Property = $this->GetPropertyNumber($Property);
                $Deal = $this->GetDealNumber($Deal);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->where('deal','=',$Deal)
                        ->where('price', '>', 6000000000)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 23
            Property   = Number
            Deal       = Number
            PriceRange = Number
            PriceOrder = BTK */
            case '23':{
                $Property = $this->GetPropertyNumber($Property);
                $Deal = $this->GetDealNumber($Deal);
                $PriceRange = $this->GetPriceRange($PriceRange);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->where('deal','=',$Deal)
                        ->whereBetween('price',$PriceRange)
                        ->orderBy('price','desc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 24
            Property   = Number
            Deal       = Number
            PriceRange = Number
            PriceOrder = KTB */
            case '24':{
                $Property = $this->GetPropertyNumber($Property);
                $Deal = $this->GetDealNumber($Deal);
                $PriceRange = $this->GetPriceRange($PriceRange);
                $data =
                    DB::table('properties')
                        ->select('id')
                        ->where('property','=',$Property)
                        ->where('deal','=',$Deal)
                        ->whereBetween('price',$PriceRange)
                        ->orderBy('price','asc')
                        ->paginate(self::PerPage);
                break;
            }
            /* 25
            Property   = Number
            Deal       = All
            PriceRange = All
            PriceOrder = BTK */
//            case '25':{
//
//                break;
//            }
            /* 26
            Property   = All
            Deal       = Number
            PriceRange = All
            PriceOrder = BTK */
//            case '26':{
//                $data = DB::table('buys')->paginate(1);
//                break;
//            }
        }
        return $data;
    }

    protected function GetPropertyNumber($PropertyTextNumber)
    {
        switch ($PropertyTextNumber) {
            case '1':
            {
                $Number = 1;
                break;
            }
            case '2':
            {
                $Number = 2;
                break;
            }
            case '3':
            {
                $Number = 3;
                break;
            }
            case '4':
            {
                $Number = 4;
                break;
            }
            case '5':
            {
                $Number = 5;
                break;
            }
            case '6':
            {
                $Number = 6;
                break;
            }
            case '7':
            {
                $Number = 7;
                break;
            }
            case '8':
            {
                $Number = 8;
                break;
            }
            case '9':
            {
                $Number = 9;
                break;
            }
            case '10':
            {
                $Number = 10;
                break;
            }

        }
        return $Number;
    }

    protected function GetDealNumber($DealNumber)
    {
        switch ($DealNumber) {
            case '1':
            {
                $Number = 1;
                break;
            }
            case '2':
            {
                $Number = 2;
                break;
            }
            case '3':
            {
                $Number = 3;
                break;
            }
            case '4':
            {
                $Number = 4;
                break;
            }
            case '5':
            {
                $Number = 5;
                break;
            }
        }
        return $Number;
    }

    protected function GetPriceRange($PriceRangeNumber)
    {
        $Number = [];
        switch ($PriceRangeNumber) {
            case '1':
            {
                array_push($Number, 0, 100000000);
                $flag = true;
                break;
            }
            case '2':
            {
                array_push($Number, 100000000, 300000000);
                $flag = true;
                break;
            }
            case '3':
            {
                array_push($Number, 300000000, 600000000);
                $flag = true;
                break;
            }
            case '4':
            {
                array_push($Number, 600000000, 1000000000);
                $flag = true;
                break;
            }
            case '5':
            {
                array_push($Number, 1000000000, 1500000000);
                $flag = true;
                break;
            }
            case '6':
            {
                array_push($Number, 1500000000, 2000000000);
                $flag = true;
                break;
            }
            case '7':
            {
                array_push($Number, 2000000000, 2500000000);
                $flag = true;
                break;
            }
            case '8':
            {
                array_push($Number, 2500000000, 3000000000);
                $flag = true;
                break;
            }
            case '9':
            {
                array_push($Number, 3000000000, 4000000000);
                $flag = true;
                break;
            }
            case '10':
            {
                array_push($Number, 4000000000, 5000000000);
                $flag = true;
                break;
            }
            case '11':
            {
                array_push($Number, 5000000000, 6000000000);
                $flag = true;
                break;
            }
        }
        return $Number;
    }

    // Get persian info
    protected function GetAreaPersian(){
        if (isset($this->Area))
        switch ($this->Area){
            case '0':{
                return 'تمامی متراژ ها';
            }
            case '1':{
                return 'از بیست تا هفتادوپنج متر';
            }
            case '2':{
                return 'از هفتادوپنج تا صدوبیست متر';
            }
            case '3':{
                return 'بیشتر از صدوبیست متر';
            }
        }
    }

    protected function GetPropertyPersianNameByNumber($PropertyNumber)
    {
        switch ($PropertyNumber) {
            case '0':
            {
                return 'تمامی املاک';
            }
            case '1':
            {
                return 'اپارتمان مسکونی';
            }
            case '2':
            {
                return 'مغازه';
            }
            case '3':
            {
                return 'اداری تجاری';
            }
            case '4':
            {
                return 'باغ';
            }
            case '5':
            {
                return 'ویلایی';
            }
            case '6':
            {
                return 'باغ ویلا';
            }
            case '7':
            {
                return 'غرفه';
            }
            case '8':
            {
                return 'کلنگی';
            }
            case '9':
            {
                return 'موقعیت اداری';
            }
            case '10':
            {
                return 'زمین';
            }
        }
        return false;
    }

    protected function GetDealPersianNameByNumber($DealNumber){
        switch ($DealNumber){
            case '0':{
                return 'تمامی معاملات';
            }
            case '1':{
                return 'فروش';
            }
            case '2':{
                return 'پیش فروش';
            }
            case '3':{
                return 'رهن و اجاره';
            }
            case '4':{
                return 'اجاره به شرط تملیک';
            }
            case '5':{
                return 'مشارکت در ساخت';
            }
        }
    }

    protected function GetPriceRangeByNumber($PriceRangeNumber){
        switch ($PriceRangeNumber){
            case '0':{
                return 'تمامی قیمت ها';
            }
            case '1':{
                return 'صفر تا صد میلیون تومان';
            }
            case '2':{
                return 'صد تا سیصد میلیون تومان';
            }
            case '3':{
                return 'سیصد تا ششصد میلیون تومان';
            }
            case '4':{
                return 'ششصد تا یک میلیارد تومان';
            }
            case '5':{
                return 'یک تا یک و نیم میلیارد تومان';
            }
            case '6':{
                return 'یک و نیم تا دو میلیارد تومان';
            }
            case '7':{
                return 'دو تا دو و نیم میلیارد تومان';
            }
            case '8':{
                return 'دو و نیم تا سه میلیارد تومان';
            }
            case '9':{
                return 'سه تا چهار میلیارد تومان';
            }
            case '10':{
                return 'چهار تا پنج میلیارد تومان';
            }
            case '11':{
                return 'پنج تا شش میلیارد تومان';
            }
            case '12':{
                return 'بیشتر از شش میلیارد تومان';
            }
        }
    }

    protected function GetPriceOrderByName($PriceOrderName){
        switch ($PriceOrderName){
            case '1':{
                return 'بیشترین به کمترین';
            }
            case '2':{
                return 'کمترین به بیشترین';
            }
        }
    }
}
//https://tailwindcss.com/
