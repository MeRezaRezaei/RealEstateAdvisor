<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Booth;
use App\CommercialOffice;
use App\Garden;
use App\House;
use App\Land;
use App\OfficeLocation;
use App\OldAge;
use App\Shop;
use App\VillaGarden;

class PropertyFullInfoController extends Controller
{
    //
    protected $Property;
    protected $PropertyType;

    public function index($id,$type){
        $this->PropertyType = $type;
        unset($type);
        $this->Property = $this->GetPropertyModel();
        $this->Property = $this->Property->findOrFail($id);
        //$this->Property = $this->Property;
        $PropertyInfos = [];
        $PPersian = $this->GetPropertyPersianNameByNumber($this->PropertyType);
        $DPersian = $this->GetDealPersianNameByNumber($this->Property->deal);
        $InfoSection = [];
        array_push($InfoSection,['کد اگهی',$this->Property->id]);
        array_push($InfoSection,['نوع ملک',$PPersian]);
        array_push($InfoSection,['برای',$DPersian]);
        switch ($this->Property->deal){
            case 1:case 2:{
            array_push($InfoSection,['قیمت(تومان)',$this->NumberSeparator($this->Property->price)]);
            break;
            }
            case 3:{
                array_push($InfoSection,['ودیعه(تومان)',$this->NumberSeparator($this->Property->Rent->pre_price)]);
                array_push($InfoSection,['اجاره(تومان)',$this->NumberSeparator($this->Property->Rent->rent_price)]);
                array_push($InfoSection,['قابلت تبدیل',$this->GetPropertyHaveHaveNot($this->Property->Rent->change_able )]);
                break;
            }
            case 4:{
                array_push($InfoSection,['پیش پرداخت(تومان)',$this->NumberSeparator($this->Property->SellRent->pre_price)]);
                array_push($InfoSection,['اجاره(تومان)',$this->NumberSeparator($this->Property->SellRent->rent_price)]);
                array_push($InfoSection,['قابلیت تبدیل',$this->GetPropertyHaveHaveNot($this->Property->SellRent->change_able)]);
                array_push($InfoSection,['ماه',$this->Property->SellRent->month]);
                break;
            }
        }
        //return $InfoSection;
        switch ($this->PropertyType){
            // Property Apartment
            case 1:{
                $InfoSection += [
                    // tiny int
                     ['اتاق خواب',    $this->Property->bedroom]
                    ,['طبقه',         $this->Property->floor_number]
                    ,['کل طبقات',     $this->Property->total_floors]
                    ,['واحد در طبقه', $this->Property->units_per_floor_number]
                    // options
                    ,['پوشش کف',       $this->GetPropertyFloorType      ($this->Property->floor_type)]
                    ,['نوع سند',       $this->GetPropertyDocumentType   ($this->Property->document_type)]
                    ,['وضعیت سند',     $this->GetPropertyDocumentStatus ($this->Property->document_status)]
                    ,['سرویس بهداشتی', $this->GetPropertyToiletType     ($this->Property->toilet_type)]
                    ,['گرمایش',        $this->GetPropertyHeatingSystem  ($this->Property->heating_system)]
                    ,['سرمایش',        $this->GetPropertyCoolingSystem  ($this->Property->cooling_system)]
                    ,['نما',           $this->GetPropertyFacade         ($this->Property->facade)]
                    ,['جهت',           $this->GetPropertyDirection      ($this->Property->direction)]
                    ,['کابینت',        $this->GetPropertyCupboard       ($this->Property->cupboard)]
                    // integers
                    ,['سال ساخت',$this->Property->construction_year]
                    ,['مساحت کل',$this->NumberSeparator($this->Property->area)]
                    // boolean
                    ,['تجهیزات',      $this->GetPropertyUnitStatus ($this->Property->unit_status)]
                    ,['ابگرمکن',      $this->GetPropertyHaveHaveNot($this->Property->water_heater)]
                    ,['بالکن',        $this->GetPropertyHaveHaveNot($this->Property->balcony)]
                    ,['پارکینگ',      $this->GetPropertyHaveHaveNot($this->Property->parking)]
                    ,['اسانسور',      $this->GetPropertyHaveHaveNot($this->Property->elevator)]
                    ,['انبار',        $this->GetPropertyHaveHaveNot($this->Property->warehouse)]
                    ,['استخر',        $this->GetPropertyHaveHaveNot($this->Property->swimming_pool)]
                    ,['سونا',         $this->GetPropertyHaveHaveNot($this->Property->sauna)]
                    ,['جکوزی',        $this->GetPropertyHaveHaveNot($this->Property->jacuzzi)]
                    ,['تلفن',         $this->GetPropertyHaveHaveNot($this->Property->phone)]
                    ,['مستر',         $this->GetPropertyHaveHaveNot($this->Property->master_bedroom)]
                    ,['گاز لوله کشی', $this->GetPropertyHaveHaveNot($this->Property->plumbing_gas)]
                    ,['لابی',          $this->GetPropertyHaveHaveNot($this->Property->lobby)]
                    ,['هود اشپزخانه', $this->GetPropertyHaveHaveNot($this->Property->hood)]
                    ,['گاز صفحه ای',  $this->GetPropertyHaveHaveNot($this->Property->plate_gas)]

                ];
                break;
            }
            // Shop
            case 2:{
                $InfoSection += [
                     ['ارتفاع سقف',$this->Property->unit_height]
                    // options
                    ,['نوع سند',   $this->GetPropertyDocumentType   ($this->Property->document_type)]
                    ,['وضعیت سند', $this->GetPropertyDocumentStatus ($this->Property->document_status)]
                    ,['گرمایش',    $this->GetPropertyHeatingSystem  ($this->Property->heating_system)]
                    ,['سرمایش',    $this->GetPropertyCoolingSystem  ($this->Property->cooling_system)]
                    ,['جهت',       $this->GetPropertyDirection      ($this->Property->direction)]
                    // integer
                    ,['سال ساخت',    $this->Property->construction_year]
                    ,['مساحت بالکن', $this->NumberSeparator($this->Property->balcony_area)]
                    ,['مساحت کف',    $this->NumberSeparator($this->Property->floor_area)]
                    ,['مساحت کل',    $this->NumberSeparator($this->Property->total_area)]
                        // Boolean
                    ,['اب',   $this->GetPropertyHaveHaveNot($this->Property->water)]
                    ,['برق',  $this->GetPropertyHaveHaveNot($this->Property->electricity)]
                    ,['گاز',  $this->GetPropertyHaveHaveNot($this->Property->gas)]
                    ,['تلفن', $this->GetPropertyHaveHaveNot($this->Property->phone)]
                ];
                break;
            }
            // CommercialOffice
            case 3:{
                $InfoSection += [
                     ['اتاق',         $this->Property->room_number]
                    ,['طبقه',         $this->Property->floor_number]
                    ,['کل طبقات',     $this->Property->total_floor]
                    ,['واحد در طبقه', $this->Property->units_per_floor_number]
                    // options
                    ,['تجهیزات',   $this->GetPropertyUnitStatus     ($this->Property->unit_status)]
                    ,['نوع سند',   $this->GetPropertyDocumentType   ($this->Property->document_type)]
                    ,['وضعیت سند', $this->GetPropertyDocumentStatus ($this->Property->document_status)]
                    ,['گرمایش',    $this->GetPropertyHeatingSystem  ($this->Property->heating_system)]
                    ,['سرمایش',    $this->GetPropertyCoolingSystem  ($this->Property->cooling_system)]
                    ,['پوشش کف',   $this->GetPropertyFloorType      ($this->Property->floor_kind)]
                    ,['جهت',       $this->GetPropertyDirection      ($this->Property->direction)]
                    ,['کابینت',    $this->GetPropertyCupboard       ($this->Property->cupboard)]
                    // integer
                    ,['سال ساخت', $this->Property->construction_year]
                    ,['مساحت کل', $this->NumberSeparator($this->Property->area)]
                    //  yes no
                    ,['پارکینگ',      $this->GetPropertyHaveHaveNot($this->Property->parking)]
                    ,['انبار',        $this->GetPropertyHaveHaveNot($this->Property->warehouse)]
                    ,['اسانسور',      $this->GetPropertyHaveHaveNot($this->Property->elevator)]
                    ,['بالکن',        $this->GetPropertyHaveHaveNot($this->Property->balcony)]
                    ,['لابی',          $this->GetPropertyHaveHaveNot($this->Property->lobby)]
                    ,['هود اشپزخانه', $this->GetPropertyHaveHaveNot($this->Property->hood)]
                    ,['گاز صفحه ای',  $this->GetPropertyHaveHaveNot($this->Property->plate_gas)]
                ];
                break;
            }
            // Garden
            case 4:{
                $InfoSection += [
                     ['نوع سند',      $this->GetPropertyDocumentType   ($this->Property->document_type)]
                    ,['وضعیت سند',    $this->GetPropertyDocumentStatus ($this->Property->document_status)]
                    ,['مساحت کل',     $this->NumberSeparator($this->Property->area)]
                    ,['تعداد درختان', $this->Property->tree_number]
                    ,['خانه باغ',     $this->GetPropertyHaveHaveNot($this->Property->room)]
                ];
                break;
            }
            // House
            case 5:{
                $InfoSection += [

                     ['کل طبقات',  $this->Property->total_floor]
                    ,['طبقه',      $this->Property->floor_number]
                    ,['اتاق خواب', $this->Property->bedroom]

                    ,['تجهیزات',   $this->GetPropertyUnitStatus     ($this->Property->unit_status)]
                    ,['نوع سند',   $this->GetPropertyDocumentType   ($this->Property->document_type)]
                    ,['وضعیت سند', $this->GetPropertyDocumentStatus ($this->Property->document_status)]
                    ,['نما',       $this->GetPropertyFacade         ($this->Property->facade)]
                    ,['پوشش کف',   $this->GetPropertyFloorType      ($this->Property->floor_type)]
                    ,['جهت',       $this->GetPropertyDirection      ($this->Property->direction)]
                    ,['کابینت',    $this->GetPropertyCupboard       ($this->Property->cupboard)]

                    ,['سال ساخت',      $this->Property->construction_year]
                    ,['مساحت کل',      $this->NumberSeparator($this->Property->area)]
                    ,['مساحت زیر بنا', $this->NumberSeparator($this->Property->foundation_area)]
                    ,['مساحت هر طبقه', $this->NumberSeparator($this->Property->any_floor_area)]

                    ,['بالکن',        $this->GetPropertyHaveHaveNot($this->Property->balcony)]
                    ,['پارکینگ',      $this->GetPropertyHaveHaveNot($this->Property->parking)]
                    ,['اسانسور',      $this->GetPropertyHaveHaveNot($this->Property->elevator)]
                    ,['انبار',        $this->GetPropertyHaveHaveNot($this->Property->warehouse)]
                    ,['گاز لوله کشی', $this->GetPropertyHaveHaveNot($this->Property->plumbing_gas)]
                    ,['تلفن',         $this->GetPropertyHaveHaveNot($this->Property->phone)]
                    ,['استخر',        $this->GetPropertyHaveHaveNot($this->Property->swimming_pool)]
                    ,['سونا',         $this->GetPropertyHaveHaveNot($this->Property->sauna)]
                    ,['جکوزی',        $this->GetPropertyHaveHaveNot($this->Property->jacuzzi)]
                    ,['مستر',         $this->GetPropertyHaveHaveNot($this->Property->master_bedroom)]
                    ,['فروش کل ملک',  $this->GetPropertyHaveHaveNot($this->Property->hole_sell)]
                    ,['هود اشپزخانه', $this->GetPropertyHaveHaveNot($this->Property->hood)]
                    ,['گاز صفحه ای',  $this->GetPropertyHaveHaveNot($this->Property->plate_gas)]

                ];
                break;
            }
            // VillaGarden
            case 6:{
                $InfoSection += [
                     ['کل طبقات',$this->Property->total_floor]

                    ,['تجهیزات',   $this->GetPropertyUnitStatus     ($this->Property->unit_status)]
                    ,['نوع سند',   $this->GetPropertyDocumentType   ($this->Property->document_type)]
                    ,['وضعیت سند', $this->GetPropertyDocumentStatus ($this->Property->document_status)]
                    ,['نما',       $this->GetPropertyFacade         ($this->Property->facade)]

                    ,['سال ساخت',     $this->Property->construction_year]
                    ,['مساحت کل',     $this->NumberSeparator($this->Property->total_area)]
                    ,['مساحت زیربنا', $this->NumberSeparator($this->Property->foundation_area)]
                    ,['تعداد درختان', $this->Property->tree_number]

                    ,['اب',           $this->GetPropertyHaveHaveNot($this->Property->water)]
                    ,['برق',          $this->GetPropertyHaveHaveNot($this->Property->electricity)]
                    ,['گاز لوله کشی', $this->GetPropertyHaveHaveNot($this->Property->plumbing_gas)]
                    ,['تلفن',         $this->GetPropertyHaveHaveNot($this->Property->phone)]
                    ,['استخر',        $this->GetPropertyHaveHaveNot($this->Property->swimming_pool)]
                    ,['سونا',         $this->GetPropertyHaveHaveNot($this->Property->sauna)]
                    ,['جکوزی',        $this->GetPropertyHaveHaveNot($this->Property->jacuzzi)]

                ];
                break;
            }
            // Booth
            case 7:{
                array_push($InfoSection,['نوع سند',   $this->GetPropertyDocumentType   ($this->Property->document_type)]);
                array_push($InfoSection,['وضعیت سند', $this->GetPropertyDocumentStatus ($this->Property->document_status)]);
                array_push($InfoSection,['سال ساخت',  $this->Property->construction_year]);
                array_push($InfoSection,['مساحت',     $this->NumberSeparator($this->Property->area)]);
                break;
            }
            // OldAge
            case 8:{
                $InfoSection += [
                     ['کل طبقات', $this->Property->total_floor]
                    ,['گذر',      $this->NumberSeparator($this->Property->gozar)]

                    ,['نوع سند',   $this->GetPropertyDocumentType   ($this->Property->document_type)]
                    ,['وضعیت سند', $this->GetPropertyDocumentStatus ($this->Property->document_status)]
                    ,['جهت',       $this->GetPropertyDirection      ($this->Property->direction)]

                    ,['سال ساخت',      $this->Property->construction_year]
                    ,['بر',            $this->NumberSeparator($this->Property->bar)]
                    ,['مساحت',         $this->NumberSeparator($this->Property->total_area)]
                    ,['مساحت زیر بنا', $this->NumberSeparator($this->Property->foundation_area)]
                ];
                break;
            }
            // OfficeLocation
            case 9:{
                $InfoSection += [
                     ['اتاق',         $this->Property->room_number]
                    ,['طبقه',         $this->Property->floor_number]
                    ,['کل طبقات',     $this->Property->total_floor]
                    ,['واحد در طبقه', $this->Property->units_per_floor_number]

                    ,['تجهیزات',   $this->GetPropertyUnitStatus     ($this->Property->unit_status)]
                    ,['نوع سند',   $this->GetPropertyDocumentType   ($this->Property->document_type)]
                    ,['وضعیت سند', $this->GetPropertyDocumentStatus ($this->Property->document_status)]
                    ,['گرمایش',    $this->GetPropertyHeatingSystem  ($this->Property->heating_system)]
                    ,['سرمایش',    $this->GetPropertyCoolingSystem  ($this->Property->cooling_system)]
                    ,['پوشش کف',   $this->GetPropertyFloorType      ($this->Property->floor_kind)]
                    ,['جهت',       $this->GetPropertyDirection      ($this->Property->direction)]
                    ,['کابینت',    $this->GetPropertyCupboard       ($this->Property->cupboard)]

                    ,['سال ساخت', $this->Property->construction_year]
                    ,['مساحت',    $this->NumberSeparator($this->Property->area)]

                    ,['بالکن',        $this->GetPropertyHaveHaveNot($this->Property->balcony)]
                    ,['پارکینگ',      $this->GetPropertyHaveHaveNot($this->Property->parking)]
                    ,['انبار',        $this->GetPropertyHaveHaveNot($this->Property->warehouse)]
                    ,['اسانسور',      $this->GetPropertyHaveHaveNot($this->Property->elevator)]
                    ,['لابی',          $this->GetPropertyHaveHaveNot($this->Property->lobby)]
                    ,['هود اشپزخانه', $this->GetPropertyHaveHaveNot($this->Property->hood)]
                    ,['گاز صفحه ای',  $this->GetPropertyHaveHaveNot($this->Property->plate_gas)]

                ];
                break;
            }
            // Land
            case 10:{
                $InfoSection += [
                     ['گذر', $this->NumberSeparator($this->Property->gozar)]

                    ,['نوع سند',   $this->GetPropertyDocumentType   ($this->Property->document_type)]
                    ,['وضعیت سند', $this->GetPropertyDocumentStatus ($this->Property->document_status)]
                    ,['کاربری',    $this->GetPropertyUseFor         ($this->Property->use_for)]
                    ,['جهت',       $this->GetPropertyDirection      ($this->Property->direction)]

                    ,['بر',    $this->NumberSeparator($this->Property->bar)]
                    ,['مساحت', $this->NumberSeparator($this->Property->area)]

                ];
                break;
            }

        }
        $PhotosTemp   =$this->Property->Photos;
        $Photos = [];
        foreach ($PhotosTemp as $Photo){
            array_push($Photos,$Photo->path);
        }
        unset($PhotosTemp);
        $PropertyInfos += [
             'PropertyType' =>$this->PropertyType
            ,'DealType'     =>$this->Property->deal
            ,'Address'      =>$this->Property->address
            ,'Description'  =>$this->Property->description
            ,'Luxury'       =>function (){switch ($this->PropertyType){case'1':case'3':case'5':case'6':{return $this->Property->luxury;}default:{return false;}}}
            ,'Photos'       =>$Photos
            ,'AdvisorPhoto' =>$this->Property->advisor     ->advisor_infos->pic_path
            ,'AdvisorPhone' =>$this->Property->advisor     ->advisor_infos->phone
            ,'AdvisorName'  =>$this->Property->advisor     ->advisor_infos->name
            ,'AdvisorLink'  =>route('Advisor.show', ['id' => $this->Property->advisor->advisor_infos->id])
        ];
        return view('Site.Property',['PropertyInfos'=>$PropertyInfos,'InfoSection'=>$InfoSection]);
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

    protected function GetPropertyModel(){
        switch ($this->PropertyType){
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
    }

    protected function GetPropertyFloorType($FloorType){
        switch ($FloorType){
            case 1:{
                return 'سرامیک';
            }
            case 2:{
                return 'سنگ';
            }
            case 3:{
                return 'موزاییک';
            }
            case 4:{
                return 'موکت';
            }
            case 5:{
                return 'سیمان';
            }
        }
    }

    protected function GetPropertyDocumentType($DocumentType){
        switch ($DocumentType){
            case 1:{
                return 'عرصه';
            }
            case 2:{
                return 'اعیان';
            }
            case 3:{
                return 'عرصه و اعیان';
            }
        }
    }

    protected function GetPropertyDocumentStatus($DocumentStatus){
        switch ($DocumentStatus){
            case 1:{
                return 'شخصی';
            }
            case 2:{
                return 'دولتی';
            }
            case 3:{
                return 'تعاونی';
            }
            case 4:{
                return 'اوقافی';
            }
            case 5:{
                return 'فرمان امام';
            }
            case 6:{
                return 'مهر';
            }
            case 7:{
                return 'قولنامه ای';
            }
            case 8:{
                return 'واگذاری ارگانها';
            }
            case 9:{
                return 'بدون سند';
            }
        }
    }

    protected function GetPropertyToiletType($ToiletType){
        switch ($ToiletType){
            case 1:{
                return 'ایرانی';
            }
            case 2:{
                return 'فرنگی';
            }
            case 3:{
                return 'ایرانی و فرنگی';
            }
        }
    }

    protected function GetPropertyHeatingSystem($HeatingSystem){
        switch ($HeatingSystem){
            case 1:{
                return 'پکیج';
            }
            case 2:{
                return 'فن کویل';
            }
            case 3:{
                return 'شومینه';
            }
            case 4:{
                return 'بخاری گازی';
            }
            case 5:{
                return 'سایر';
            }
        }
    }

    protected function GetPropertyCoolingSystem($CoolingSystem){
        switch ($CoolingSystem){
            case 1:{
                return 'کولر ابی';
            }
            case 2:{
                return 'کولر اسپیلت';
            }
            case 3:{
                return 'داکت اسپیلت';
            }
            case 4:{
                return 'فنکویل';
            }
            case 5:{
                return 'چیلر';
            }
            case 6:{
                return 'سایر';
            }
        }
    }

    protected function GetPropertyFacade($Facade){
        switch ($Facade){
            case 1:{
                return 'سنگ';
            }
            case 2:{
                return 'اجر';
            }
            case 3:{
                return 'اجر قرمز';
            }
            case 4:{
                return 'سرامیک';
            }
            case 5:{
                return 'کامپوزیت';
            }
            case 6:{
                return 'ترکیبی';
            }
            case 7:{
                return 'رومی';
            }
            case 8:{
                return 'سیمان';
            }
            case 9:{
                return 'کنیتکس';
            }
            case 10:{
                return 'پانل سیمان شسته';
            }
        }
    }

    protected function GetPropertyDirection($Direction){
        switch ($Direction){
            case 1:{
                return 'شمالی';
            }
            case 2:{
                return 'جنوبی';
            }
            case 3:{
                return 'شرقی';
            }
            case 4:{
                return 'غربی';
            }
            case 5:{
                return 'شمال شرقی';
            }
            case 6:{
                return 'شمال غربی';
            }
            case 7:{
                return 'جنوب شرقی';
            }
            case 8:{
                return 'جنوب غربی';
            }
        }
    }

    protected function GetPropertyCupboard($Cupboard){
        switch ($Cupboard){
            case 1:{
                return 'گالوانیزه';
            }
            case 2:{
                return 'MDF';
            }
            case 3:{
                return 'های گلس';
            }
            case 4:{
                return 'ممبران';
            }
            case 5:{
                return 'چوب';
            }
            case 6:{
                return 'رزین';
            }
            // todo decide for saayer
            case 7:{
                return 'سایر';
            }
            case 8:{
                return 'ندارد';
            }
        }
    }

    protected function GetPropertyHaveHaveNot($HaveHaveNot){
        switch ($HaveHaveNot){
            case true:{
                return 'دارد';
            }
            case false:{
                return 'ندارد';
            }
        }
    }

    protected function GetPropertyUnitStatus($UnitStatus){
        switch ($UnitStatus){
            case true:{
                return 'دارد';
            }
            case false:{
                return 'ندارد';
            }
        }
    }

    protected function GetPropertyUseFor($UseFor){
        switch ($UseFor){
            case 1:{
                return 'مسکونی';
            }
            case 2:{
                return 'تجاری';
            }
            case 3:{
                return 'تجاری مسکونی';
            }
            case 4:{
                return 'اداری تجاری';
            }
            case 5:{
                return 'اداری';
            }
            case 6:{
                return 'کشاورزی';
            }
            case 7:{
                return 'باغ';
            }
            case 8:{
                return 'باغ ویلا';
            }
        }
    }

    protected function GetPropertyYesNo($YesNo){
        switch ($YesNo){
            case true:{
                return 'بله';
            }
            case false:{
                return 'خیر';
            }
        }
    }
    // Get Persian Property
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

}
/*

{{--            BedRoom--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3 FullWidth text-center">
                تعداد اتاق خواب
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3 FullWidth text-center">
                {{$PropertyInfos['bedroom']}}
            </div>
{{--            FloorNumber--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                طبقه
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['floor_number']}}
            </div>
{{--            TotalFloor--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                کل طبقات
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['total_floors']}}
            </div>
{{--            UnitPerFloorNumber--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                واحد در طبقه
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['units_per_floor_number']}}
            </div>
{{--            FloorType--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                پوشش کف
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['floor_type']}}
            </div>
{{--            DocumentType--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                نوع سند
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['document_type']}}
            </div>
{{--            DocumentStatus--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                وضعیت سند
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['document_status']}}
            </div>
{{--            ToiletType--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                سرویس بهداشتی
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['toilet_type']}}
            </div>
{{--            HeatingSystem--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                سیستم گرمایش
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['heating_system']}}
            </div>
{{--            CoolingSystem--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                سیستم سرمایش
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['cooling_system']}}
            </div>
{{--            Facade--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                نما
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['facade']}}
            </div>
{{--            Direction--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                جهت
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['direction']}}
            </div>
{{--            Cupboard--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                کابینت
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['cupboard']}}
            </div>
{{--            ConstructionYear--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                سال ساخت
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['construction_year']}}
            </div>
{{--            Area--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                مساحت کل
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['area']}}
            </div>
{{--            UnitStatus--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                تجهیزات
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['unit_status']}}
            </div>
{{--            WaterHeater--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                ابگرمکن
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['water_heater']}}
            </div>
{{--            Balcony--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                بالکن
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['balcony']}}
            </div>
{{--            Parking--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                پارکینگ
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['parking']}}
            </div>
{{--            Elevator--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                اسانسور
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['elevator']}}
            </div>
{{--            Warehouse--}}
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                انبار
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-6 FullWidth text-center">
                {{$PropertyInfos['warehouse']}}
            </div>
{{--            --}}



*/
/*
  @if($PropertyInfos['PropertyType']==1)
{{--            PropertyId--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    کد اگهی
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['PropertyId']}}
                </div>
            </div>
{{--            PropertyPersian--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    نوع ملک
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['PropertyPersian']}}
                </div>
            </div>
{{--            DealPersian--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    برای
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['DealPersian']}}
                </div>
            </div>
{{--            BedRoom--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    {{$PropertyInfos['bedroom'][0]}}
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['bedroom'][1]}}
                </div>
            </div>
{{--            FloorNumber--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    طبقه
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['floor_number']}}
                </div>
            </div>
{{--            total_floors--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    کل طبقات
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['total_floors']}}
                </div>
            </div>
{{--            units_per_floor_number--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    واحد در طبقه
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['units_per_floor_number']}}
                </div>
            </div>
{{--            floor_type--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    پوشش کف
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['floor_type']}}
                </div>
            </div>
{{--            document_type--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    نوع سند
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['document_type']}}
                </div>
            </div>
{{--            document_status--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    وضعیت سند
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['document_status']}}
                </div>
            </div>
{{--            toilet_type--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    سرویس بهداشتی
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['toilet_type']}}
                </div>
            </div>
{{--            heating_system--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    سیستم گرمایش
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['heating_system']}}
                </div>
            </div>
{{--            cooling_system--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    سیستم سرمایش
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['cooling_system']}}
                </div>
            </div>
{{--            facade--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    نما
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['facade']}}
                </div>
            </div>
{{--            direction--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    جهت
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['direction']}}
                </div>
            </div>
{{--            cupboard--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    کابینت
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['cupboard']}}
                </div>
            </div>
{{--            construction_year--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    سال ساخت
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['construction_year']}}
                </div>
            </div>
{{--            area--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    مساحت کل
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['area']}}
                </div>
            </div>
{{--            unit_status--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    تجهیزات
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['unit_status']}}
                </div>
            </div>
{{--            water_heater--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    ابگرمکن
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['water_heater']}}
                </div>
            </div>
{{--            balcony--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    بالکن
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['balcony']}}
                </div>
            </div>
{{--            parking--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    پارکینگ
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['parking']}}
                </div>
            </div>
{{--            elevator--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    اسانسور
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['elevator']}}
                </div>
            </div>
{{--            warehouse--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    انبار
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['warehouse']}}
                </div>
            </div>
{{--            swimming_pool--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    استخر
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['swimming_pool']}}
                </div>
            </div>
{{--            sauna--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    سونا
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['sauna']}}
                </div>
            </div>
{{--            jacuzzi--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    جکوزی
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['jacuzzi']}}
                </div>
            </div>
{{--            phone--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    تلفن
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['phone']}}
                </div>
            </div>
{{--            master_bedroom--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    مستر
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['master_bedroom']}}
                </div>
            </div>
{{--            plumbing_gas--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    گاز لوله کشی
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['plumbing_gas']}}
                </div>
            </div>
{{--            lobby--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    لابی
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['lobby']}}
                </div>
            </div>
{{--            hood--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    هود اشپزخانه
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['hood']}}
                </div>
            </div>
{{--            plate_gas--}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    گاز صفحه ای
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfos['plate_gas']}}
                </div>
            </div>
{{--            Address--}}
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <p>ادرس</p>{{$PropertyInfos['Address']}}&nbsp;:&nbsp;
            </div>
{{--            Description--}}
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <p>توضیحات</p>{{$PropertyInfos['Description']}}&nbsp;:&nbsp;
            </div>
        @endif


*/
