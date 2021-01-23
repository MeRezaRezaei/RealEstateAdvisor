<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Buy;
use App\Land;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class InsertPropertyController extends Controller
{
    //
    const Number1_20Validate    = [1,20];
    const Number1_100Validate    = [1,100];
    const TrueFalseValidate = [0,1];
    const FloorTypeValidate = [1,6];
    const DocumentStatusValidate = [1,9];
    const DocumentTypeValidate   = [1,3];
    const HeatingSystemValidate  = [1,5];
    const CoolingSystemValidate  = [1,6];
    const DirectionValidate    = [1,8];
    const FacadeValidate       = [1,10];
    const ToiletTypeValidate   = [1,3];
    const UseForValidate       = [1,8];
    const UnitStatusValidate   = [1,2];
    const CupboardTypeValidate =[1,8];
    const ConstructionYearValidate =[1300,1500];
    const ApartmentAreaValidate =[1,5000];

    const ApartmentStringValidate = [
        'ApartmentAddressName'

        ,'ApartmentDescriptionName'
    ];
    const ApartmentNumberValidate = [

         'ApartmentBedRoomName'
         =>self::Number1_20Validate

        ,'ApartmentFloorNumberName'
        =>self::Number1_100Validate

        ,'ApartmentTotalFloorsName'
        =>self::Number1_100Validate

        ,'ApartmentUnitsPerFloorNumberName'
        =>self::Number1_20Validate

        ,'ApartmentFloorTypeName'
        =>self::FloorTypeValidate

        ,'ApartmentDocumentTypeName'
        =>self::DocumentTypeValidate

        ,'ApartmentDocumentStatusName'
        =>self::DocumentStatusValidate

        ,'ApartmentToiletTypeName'
        =>self::ToiletTypeValidate

        ,'ApartmentHeatingSystemName'
        =>self::HeatingSystemValidate

        ,'ApartmentCoolingSystemName'
        =>self::CoolingSystemValidate

        ,'ApartmentFacadeName'
        =>self::FacadeValidate

        ,'ApartmentDirectionName'
        =>self::DirectionValidate

        ,'ApartmentUnitStatusName'
        =>self::UnitStatusValidate

        ,'ApartmentConstructionYearName'
        =>self::ConstructionYearValidate

        ,'ApartmentAreaName'
        =>self::ApartmentAreaValidate

        ,'ApartmentBalconyName'
        =>self::TrueFalseValidate

        ,'ApartmentParkingName'
        =>self::TrueFalseValidate

        ,'ApartmentElevatorName'
        =>self::TrueFalseValidate

        ,'ApartmentWarehouseName'
        =>self::TrueFalseValidate

        ,'ApartmentSwimmingPoolName'
        =>self::TrueFalseValidate

        ,'ApartmentSaunaName'
        =>self::TrueFalseValidate

        ,'ApartmentJacuzziName'
        =>self::TrueFalseValidate

        ,'ApartmentPhoneName'
        =>self::TrueFalseValidate

        ,'ApartmentMasterBedroomName'
        =>self::TrueFalseValidate

        ,'ApartmentCupboardName'
        =>self::CupboardTypeValidate

        ,'ApartmentPlumbingGasName'
        =>self::TrueFalseValidate

        ,'ApartmentLobbyName'
        =>self::TrueFalseValidate

        ,'ApartmentHoodName'
        =>self::TrueFalseValidate

        ,'ApartmentPlateGasName'
        =>self::TrueFalseValidate

        ,'ApartmentLuxuryName'
        =>self::TrueFalseValidate

    ];

    const ApartmentArr = [
         ['bedroom','ApartmentBedRoomName']
        ,['floor_number','ApartmentFloorNumberName']
        ,['total_floors','ApartmentTotalFloorsName']
        ,['units_per_floor_number','ApartmentUnitsPerFloorNumberName']
        ,['floor_type','ApartmentFloorTypeName']
        ,['document_type','ApartmentDocumentTypeName']
        ,['document_status','ApartmentDocumentStatusName']
        ,['toilet_type','ApartmentToiletTypeName']
        ,['heating_system','ApartmentHeatingSystemName']
        ,['cooling_system','ApartmentCoolingSystemName']
        ,['facade','ApartmentFacadeName']
        ,['direction','ApartmentDirectionName']
        ,['unit_status','ApartmentUnitStatusName']
        ,['construction_year','ApartmentConstructionYearName']
        ,['area','ApartmentAreaName']
        ,['balcony','ApartmentBalconyName']
        ,['parking','ApartmentParkingName']
        ,['elevator','ApartmentElevatorName']
        ,['warehouse','ApartmentWarehouseName']
        ,['swimming_pool','ApartmentSwimmingPoolName']
        ,['sauna','ApartmentSaunaName']
        ,['jacuzzi','ApartmentJacuzziName']
        ,['phone','ApartmentPhoneName']
        ,['master_bedroom','ApartmentMasterBedroomName']
        ,['cupboard','ApartmentCupboardName']
        ,['plumbing_gas','ApartmentPlumbingGasName']
        ,['lobby','ApartmentLobbyName']
        ,['hood','ApartmentHoodName']
        ,['plate_gas','ApartmentPlateGasName']
        ,['luxury','ApartmentLuxuryName']
        ,['address','ApartmentAddressName']
        ,['description','ApartmentDescriptionName']
    ];

    public function index(Request $Request){
        if ($Request->has('PropertyName')){
            $Property = $Request->get('PropertyName');
            if (is_numeric($Property)){
                $flag = true;
                switch ($Property){
                    case 1:{
                        foreach (self::ApartmentNumberValidate as $Name => $Range){
                            if ($Request->has($Name)){
                                $Value =$Request->get($Name);
                                if($Value >= $Range[0] && $Value <= $Range[1]){


                                    continue;
                                }
                                else{
                                    $flag = false;
                                    break;
                                }
                            }
                            else{
                                $flag = false;
                                break;
                            }
                        }
                        foreach (self::ApartmentStringValidate as $Name){
                            if ($Request->has($Name)){
                                continue;
                            }
                            else{
                                $flag = false;
                                break;
                            }
                        }
                        if ($flag){
                            $Arr = [];
                            foreach (self::ApartmentArr as $Name ){
                                $Arr += [
                                    $Name[0]=>(int)$Request->get($Name[1])
                                ];
                            }
                            //return $Arr;
                        $Apartment = Apartment::Create($Arr);
                        }
                       break;
                    }
                    case 2:{

                        break;
                    }
                }

            }
        }
        //return $Request->get('ApartmentConstructionYearName');
        //return $Request->all();





        //return $Request->all();
        //return self::ValidateApartment;

    }


}
