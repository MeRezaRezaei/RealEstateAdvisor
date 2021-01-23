<?php

namespace App\Http\Controllers;

use App\AdvisorInfo;
use Illuminate\Http\Request;

class AdminManagerController extends Controller
{
    //
    public function Index(){
        return view('AdminManager.Index');
    }

    public function LookAtAnAdvisorPropertiesIndex(){
        $AdvisorInfos = AdvisorInfo::all();
        return view('AdminManager.AdvisorSelection',[
           'AdvisorInfos'=>$AdvisorInfos
        ]);
    }
    public function LookAtAnAdvisorPropertiesSelectingAdvisor($id){
        $AdvisorInfo = AdvisorInfo::findOrFail($id);
        $Advisors = $AdvisorInfo->Advisors;
        $AdvisorProperties = [];
        foreach ($Advisors as $Advisor){
            array_push($AdvisorProperties,[
                 'Number' =>$this->GetPropertyNumber($Advisor->property_type)
                ,'PName'  =>$this->GetPropertyPersianNameByNumber($this->GetPropertyNumber($Advisor->property_type))
                //,'Type'   =>$Advisor->property_type
                ,'id'     =>$Advisor->id
            ]);
        }
        return view('AdminManager.AdvisorPropertyShow',[
             'AdvisorInfo'=>$AdvisorInfo
            ,'AdvisorProperties'=>$AdvisorProperties
        ]);
    }


    public function AdvisorSubmissionStatisticsIndex(){

    }
    public function AddingPropertyIndex(){

    }
    public function AddingAdvisorIndex(){

    }
    public function AddingSubmitterIndex(){

    }
    public function AddingBloggerIndex(){

    }
    public function EditingAdvisorInformationIndex(){

    }
    public function EditingPropertyInformationIndex(){

    }
    public function ChangingAPropertyAdvisorIndex(){

    }
    public function ChangingAllPropertiesAdvisorOfAnAdvisorIndex(){

    }
    public function NewPropertiesSubmissionIndex(){

    }
    public function DeletingAPropertyIndex(){

    }
    public function DeletingAnAdvisorIndex(){

    }
    public function DeletingASubmitterIndex(){

    }
    public function DeletingABloggerIndex(){

    }
    public function ResettingAdvisorPasswordIndex(){

    }
    public function ResettingSubmitterPasswordIndex(){

    }
    public function ResettingBloggerPasswordIndex(){

    }
    public function ExitAdminSessionIndex(){

    }

    protected function GetPropertyNumber($PropertyModelName){
        switch ($PropertyModelName){
            case 'App\Apartment':{
                return '1';
            }
            case 'App\Shop':{
                return '2';
            }
            case 'App\CommercialOffice':{
                return '3';
            }
            case 'App\Garden':{
                return '4';
            }
            case 'App\House':{
                return '5';
            }
            case 'App\VillaGarden':{
                return '6';
            }
            case 'App\Booth':{
                return '7';
            }
            case 'App\OldAge':{
                return '8';
            }
            case 'App\OfficeLocation':{
                return '9';
            }
            case 'App\Land':{
                return '10';
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




}
