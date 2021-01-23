<?php


namespace App\Http\InformationArrays;


class Options
{
    const Options = [
         'Number'=>[
             '1'
            ,'2'
            ,'3'
            ,'4'
            ,'5'
            ,'6'
            ,'7'
            ,'8'
            ,'9'
            ,'10'
            ,'11'
            ,'12'
            ,'13'
            ,'14'
            ,'15'
            ,'16'
            ,'17'
            ,'18'
            ,'19'
            ,'20'
        ]
        ,'TrueFalse'=>[
             'دارد'
            ,'ندارد'
        ]
        ,'YesNo'=>[
             'بله'
            ,'خیر'
        ]
        ,'FloorType'=>[
             'سرامیک'
            ,'سنگ'
            ,'موزاییک'
            ,'موکت'
            ,'سیمان'
            ,'پارکت'
        ]
        ,'DocumentStatus'=>[
             'شخصی'
            ,'دولتی'
            ,'تعاونی'
            ,'اوقافی'
            ,'فرمان امام'
            ,'مهر'
            ,'قولنامه ای'
            ,'واگذاری ارگانها'
            ,'بدون سند'
        ]
        ,'DocumentType'=>[
            'عرصه'
            ,'اعیان'
            ,'عرصه و اعیان'
        ]
        ,'HeatingSystem'=>[
             'پکیج'
            ,'فن کویل'
            ,'شومینه'
            ,'بخاری گازی'
            ,'سایر'
        ]
        ,'CoolingSystem'=>[
             'کولر ابی'
            ,'کولر اسپیلت'
            ,'داکت اسپیلت'
            ,'فنکویل'
            ,'چیلر'
            ,'سایر'
        ]
        ,'Direction'=>[
             'شمالی'
            ,'جنوبی'
            ,'شرقی'
            ,'غربی'
            ,'شمال شرقی'
            ,'شمال غربی'
            ,'جنوب شرقی'
            ,'جنوب غربی'
        ]
        ,'Facade'=>[
             'سنگ'
            ,'اجر'
            ,'اجر قرمز'
            ,'سرامیک'
            ,'کامپوزیت'
            ,'ترکیبی'
            ,'رومی'
            ,'سیمان'
            ,'کنیتکس'
            ,'پانل سیمان شسته'
        ]
        ,'ToiletType'=>[
             'ایرانی'
            ,'فرنگی'
            ,'ایرانی و فرنگی'
        ]
        ,'UseFor'=>[
             'مسکونی'
            ,'تجاری'
            ,'تجاری مسکونی'
            ,'اداری تجاری'
            ,'اداری'
            ,'کشاورزی'
            ,'باغ'
            ,'باغ ویلا'
        ]
        ,'UnitStatus'=>[
             'خام'
            ,'تجهیز شده'
        ]
        ,'CupboardType'=>[
             'گالوانیزه'
            ,'MDF'
            ,'های گلس'
            ,'ممبران'
            ,'چوب'
            ,'رزین'
            ,'سایر'
            ,'ندارد'
        ]
        ,'Neighbourhood'=>[
             'معالی اباد'
            ,'فرهنگ شهر'
        ]

    ];
    const Properties = [
        'Apartment'=>[

            [
                 'type'    => 'Option'
                ,'label'   => 'تعداد خواب'
                ,'options' => 'Number'
                ,'id'      => 'ApartmentBedRoom'
                ,'table'   => 'bedroom'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'محله'
                ,'options' => 'Neighbourhood'
                ,'id'      => 'ApartmentNeighbourhood'
                ,'table'   => 'neighbourhood'
            ]
            ,[
                'type'    => 'Option'
                ,'label'   => 'محله'
                ,'options' => 'Neighbourhood'
                ,'id'      => 'ApartmentNeighbourhood'
                ,'table'   => 'neighbourhood'
            ]
            ,[
                'type'    => 'Option'
                ,'label'   => 'نوع معامله'
                ,'options' => 'Deal'
                ,'id'      => 'ApartmentDeal'
                ,'table'   => 'deal'
            ]
            ,[
                 'type'    => 'Number'
                ,'label'   => 'طبقه'
                ,'options' => [0,100]
                ,'id'      => 'ApartmentFloorNumber'
                ,'table'   => 'floor_number'
            ]
            ,[
                 'type'    => 'Number'
                ,'label'   => 'کل طبقات'
                ,'options' => [0,100]
                ,'id'      => 'ApartmentTotalFloors'
                ,'table'   => 'total_floors'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'واحد در طبقه'
                ,'options' => 'Number'
                ,'id'      => 'ApartmentUnitsPerFloorNumber'
                ,'table'   => 'units_per_floor_number'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'پوشش کف'
                ,'options' => 'FloorType'
                ,'id'      => 'ApartmentFloorType'
                ,'table'   => 'floor_type'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'نوع سند'
                ,'options' => 'DocumentType'
                ,'id'      => 'ApartmentDocumentType'
                ,'table'   => 'document_type'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'وضعیت سند'
                ,'options' => 'DocumentStatus'
                ,'id'      => 'ApartmentDocumentStatus'
                ,'table'   => 'document_status'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'سرویس بهداشتی'
                ,'options' => 'ToiletType'
                ,'id'      => 'ApartmentToiletType'
                ,'table'   => 'toilet_type'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'سیستم گرمایش'
                ,'options' => 'HeatingSystem'
                ,'id'      => 'ApartmentHeatingSystem'
                ,'table'   => 'heating_system'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'سیستم سرمایش'
                ,'options' => 'CoolingSystem'
                ,'id'      => 'ApartmentCoolingSystem'
                ,'table'   => 'cooling_system'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'نما'
                ,'options' => 'Facade'
                ,'id'      => 'ApartmentFacade'
                ,'table'   => 'facade'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'جهت'
                ,'options' => 'Direction'
                ,'id'      => 'ApartmentDirection'
                ,'table'   => 'direction'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'تجهیزات'
                ,'options' => 'UnitStatus'
                ,'id'      => 'ApartmentUnitStatus'
                ,'table'   => 'unit_status'
            ]
            ,[
                 'type'    => 'Number'
                ,'label'   => 'سال ساخت'
                ,'options' => [1300,1500]
                ,'id'      => 'ApartmentConstructionYear'
                ,'table'   => 'construction_year'
            ]
            ,[
                 'type'    => 'Number'
                ,'label'   => 'مساحت'
                ,'options' => [1,5000]
                ,'id'      => 'ApartmentArea'
                ,'table'   => 'area'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'بالکن'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentBalcony'
                ,'table'   => 'balcony'
            ]
            ,[
                'type'    => 'Option'
                ,'label'   => 'پارکینگ'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentParking'
                ,'table'   => 'parking'
            ]
            ,[
                'type'    => 'Option'
                ,'label'   => 'اسانسور'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentElevator'
                ,'table'   => 'elevator'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'انبار'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentWarehouse'
                ,'table'   => 'warehouse'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'استخر'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentSwimmingPool'
                ,'table'   => 'swimming_pool'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'سونا'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentSauna'
                ,'table'   => 'sauna'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'جکوزی'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentJacuzzi'
                ,'table'   => 'jacuzzi'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'تلفن'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentPhone'
                ,'table'   => 'phone'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'مستر'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentMasterBedroom'
                ,'table'   => 'master_bedroom'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'کابینت'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentCupboard'
                ,'table'   => 'cupboard'
            ]
            ,[
                 'type'    => 'Option'
                ,'label'   => 'گاز شهری'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentPlumbingGas'
                ,'table'   => 'plumbing_gas'
            ]
            ,[
                'type'    => 'Option'
                ,'label'   => 'لابی'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentLobby'
                ,'table'   => 'lobby'
            ]
            ,[
                'type'    => 'Option'
                ,'label'   => 'هود'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentHood'
                ,'table'   => 'hood'
            ]
            ,[
                'type'    => 'Option'
                ,'label'   => 'گاز صفحه ای'
                ,'options' => 'TrueFalse'
                ,'id'      => 'ApartmentPlateGas'
                ,'table'   => 'plate_gas'
            ]
            ,[
                'type'    => 'Option'
                ,'label'   => 'لاکچری'
                ,'options' => 'YesNo'
                ,'id'      => 'ApartmentLuxury'
                ,'table'   => 'luxury'
            ]
            ,[
                'type'    => 'String'
                ,'label'   => 'ادرس'
                ,'options' => 'Address'
                ,'id'      => 'ApartmentAddress'
                ,'table'   => 'address'
            ]
            ,[
                'type'    => 'String'
                ,'label'   => 'توضیحات'
                ,'options' => 'Description'
                ,'id'      => 'ApartmentDescription'
                ,'table'   => 'description'
            ]

        ]
    ];
    public function Options(){
        return self::Options;
    }

    public function Number(){
        return self::Options['Number'];
    }
    public function NumberO($Name){
        return self::Options['Number'][(int)$Name];
    }
    public function TrueFalse(){
        return self::Options['TrueFalse'];
    }
    public function TrueFalseO($Name){
        return self::Options['TrueFalse'][(int)$Name];
    }
    public function YesNo(){
        return self::Options['YesNo'];
    }
    public function YesNoO($Name){
        return self::Options['YesNo'][(int)$Name];
    }
    public function FloorType(){
        return self::Options['FloorType'];
    }
    public function FloorTypeO($Name){
        return self::Options['FloorType'][(int)$Name];
    }
    public function DocumentStatus(){
        return self::Options['DocumentStatus'];
    }
    public function DocumentStatusO($Name){
        return self::Options['DocumentStatus'][(int)$Name];
    }
    public function DocumentType(){
        return self::Options['DocumentType'];
    }
    public function DocumentTypeO($Name){
        return self::Options['DocumentType'][(int)$Name];
    }
    public function HeatingSystem(){
        return self::Options['HeatingSystem'];
    }
    public function HeatingSystemO($Name){
        return self::Options['HeatingSystem'][(int)$Name];
    }
    public function CoolingSystem(){
        return self::Options['CoolingSystem'];
    }
    public function CoolingSystemO($Name){
        return self::Options['CoolingSystem'][(int)$Name];
    }
    public function Direction(){
        return self::Options['Direction'];
    }
    public function DirectionO($Name){
        return self::Options['Direction'][(int)$Name];
    }
    public function Facade(){
        return self::Options['Facade'];
    }
    public function FacadeO($Name){
        return self::Options['Facade'][(int)$Name];
    }
    public function ToiletType(){
        return self::Options['ToiletType'];
    }
    public function ToiletTypeO($Name){
        return self::Options['ToiletType'][(int)$Name];
    }
    public function UseFor(){
        return self::Options['UseFor'];
    }
    public function UseForO($Name){
        return self::Options['UseFor'][(int)$Name];
    }
    public function UnitStatus(){
        return self::Options['UnitStatus'];
    }
    public function UnitStatusO($Name){
        return self::Options['UnitStatus'][(int)$Name];
    }
    public function CupboardType(){
        return self::Options['CupboardType'];
    }
    public function CupboardTypeO($Name){
        return self::Options['CupboardType'][(int)$Name];
    }
    public function Neighbourhood(){
        return self::Options['Neighbourhood'];
    }
    public function NeighbourhoodO($Name){
        return self::Options['Neighbourhood'][(int)$Name];
    }
}
