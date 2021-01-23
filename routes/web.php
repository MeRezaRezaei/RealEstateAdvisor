<?php

use App\AdvisorInfo;
use App\Booth;
use App\CommercialOffice;
use App\Garden;
use App\House;
use App\Land;
use App\OfficeLocation;
use App\OldAge;
use App\Shop;
use App\VillaGarden;
use Illuminate\Support\Facades\Route;
use App\Apartment;
use App\Buy;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
// Show Main page
Route::get('/','IndexController@Index')->name('Index');
// Show Searched Results
Route::get('Search','SearchController@FromIndex')->name('Search');
// Show all Advisor information
Route::get('Advisor/{id}','DealFullInfoController@index')->name('Advisor.show')->where('id', '[0-9]+');
// Show all Property information
Route::get('Property/{id}/{type}','PropertyFullInfoController@index')->name('Property.show')->where('id', '[0-9]+')->where('type', '[0-9]+');
// inserting information
Route::get('InsertProperty',function (){return view('Site.InsertProperty');})->name('InsertPropertyGet');
Route::put('InsertProperty','InsertPropertyController@index')->name('InsertPropertyPut');

// New Routes
// todo set the rules for variable ranges
Route::get('/sSearch','SearchResolveController@Start')->name('Searching');
//
Route::get('/{Property}/{Deal}/{PriceRange}/{PriceOrder}/{Neighbourhood}/{Area}/{RoomNumber}/Search','SearchController@WithRoom')->name('WithRoom');

Route::get('/{Property}/{Deal}/{PriceRange}/{PriceOrder}/{Neighbourhood}/Search','SearchController@WithoutRoom')->name('WithoutRoom');

Route::get('/{Property}/{Deal}/{PriceRange}/{PriceOrder}/{Neighbourhood}/{Rent}/{PreRent}/{Area}/{RoomNumber}/Search','SearchController@WithRoomRent')->name('WithRoomRent');

Route::get('/{Property}/{Deal}/{PriceRange}/{PriceOrder}/{Neighbourhood}/{Rent}/{PreRent}/Search','SearchController@WithoutRoomRent')->name('WithoutRoomRent');
/********************************/

Route::get('/Call','CallInsertController@Index')->name('CallInsert');

/********************************/
// New Routes For Manager
// <MainMenu>
Route::get('AdminManager','AdminManagerController@Index');
// </MainMenu>


// <MainMenu><LookAtAnAdvisorProperties>
Route::get('AdminManager/LookAtAnAdvisorProperties'
      ,  'AdminManagerController@LookAtAnAdvisorPropertiesIndex')->name(
          'LookAtAnAdvisorProperties');
// </MainMenu></LookAtAnAdvisorProperties>
// <MainMenu><LookAtAnAdvisorProperties><SelectingAdvisor>
Route::get('AdminManager/LookAtAnAdvisorPropertiesSelectingAdvisor/{id}'
    ,  'AdminManagerController@LookAtAnAdvisorPropertiesSelectingAdvisor')->name(
    'LookAtAnAdvisorPropertiesSelectingAdvisor')->where('id','[0-9]+');
// </MainMenu></LookAtAnAdvisorProperties></SelectingAdvisor>


// <MainMenu><AdvisorSubmissionStatistics>
Route::get('AdminManager/AdvisorSubmissionStatistics'
    ,  'AdminManagerController@AdvisorSubmissionStatisticsIndex')->name(
    'AdvisorSubmissionStatistics');
// </MainMenu></AdvisorSubmissionStatistics>
// <MainMenu><AddingProperty>
Route::get('AdminManager/AddingProperty'
    ,  'AdminManagerController@AddingPropertyIndex')->name(
    'AddingProperty');
// </MainMenu></AddingProperty>
// <MainMenu><AddingAdvisor>
Route::get('AdminManager/AddingAdvisor'
    ,  'AdminManagerController@AddingAdvisorIndex')->name(
    'AddingAdvisor');
// </MainMenu></AddingAdvisor>
// <MainMenu><AddingSubmitter>
Route::get('AdminManager/AddingSubmitter'
    ,  'AdminManagerController@AddingSubmitterIndex')->name(
    'AddingSubmitter');
// </MainMenu></AddingSubmitter>
// <MainMenu><AddingBlogger>
Route::get('AdminManager/AddingBlogger'
    ,  'AdminManagerController@AddingBloggerIndex')->name(
    'AddingBlogger');
// </MainMenu></AddingBlogger>
// <MainMenu><EditingAdvisorInformation>
Route::get('AdminManager/EditingAdvisorInformation'
    ,  'AdminManagerController@EditingAdvisorInformationIndex')->name(
    'EditingAdvisorInformation');
// </MainMenu></EditingAdvisorInformation>
// <MainMenu><EditingPropertyInformation>
Route::get('AdminManager/EditingPropertyInformation'
    ,  'AdminManagerController@EditingPropertyInformationIndex')->name(
    'EditingPropertyInformation');
// </MainMenu></EditingPropertyInformation>
// <MainMenu><ChangingAPropertyAdvisor>
Route::get('AdminManager/ChangingAPropertyAdvisor'
    ,  'AdminManagerController@ChangingAPropertyAdvisorIndex')->name(
    'ChangingAPropertyAdvisor');
// </MainMenu></ChangingAPropertyAdvisor>
// <MainMenu><ChangingAllPropertiesAdvisorOfAnAdvisor>
Route::get('AdminManager/ChangingAllPropertiesAdvisorOfAnAdvisor'
    ,  'AdminManagerController@ChangingAllPropertiesAdvisorOfAnAdvisorIndex')->name(
    'ChangingAllPropertiesAdvisorOfAnAdvisor');
// </MainMenu></ChangingAllPropertiesAdvisorOfAnAdvisor>
// <MainMenu><NewPropertiesSubmission>
Route::get('AdminManager/NewPropertiesSubmission'
    ,  'AdminManagerController@NewPropertiesSubmissionIndex')->name(
    'NewPropertiesSubmission');
// </MainMenu></NewPropertiesSubmission>
// <MainMenu><DeletingAProperty>
Route::get('AdminManager/DeletingAProperty'
    ,  'AdminManagerController@DeletingAPropertyIndex')->name(
    'DeletingAProperty');
// </MainMenu></DeletingAProperty>
// <MainMenu><DeletingAnAdvisor>
Route::get('AdminManager/DeletingAnAdvisor'
    ,  'AdminManagerController@DeletingAnAdvisorIndex')->name(
    'DeletingAnAdvisor');
// </MainMenu></DeletingAnAdvisor>
// <MainMenu><DeletingASubmitter>
Route::get('AdminManager/DeletingASubmitter'
    ,  'AdminManagerController@DeletingASubmitterIndex')->name(
    'DeletingASubmitter');
// </MainMenu></DeletingASubmitter>
// <MainMenu><DeletingABlogger>
Route::get('AdminManager/DeletingABlogger'
    ,  'AdminManagerController@DeletingABloggerIndex')->name(
    'DeletingABlogger');
// </MainMenu></DeletingABlogger>
// <MainMenu><ResettingAdvisorPassword>
Route::get('AdminManager/ResettingAdvisorPassword'
    ,  'AdminManagerController@ResettingAdvisorPasswordIndex')->name(
    'ResettingAdvisorPassword');
// </MainMenu></ResettingAdvisorPassword>
// <MainMenu><ResettingSubmitterPassword>
Route::get('AdminManager/ResettingSubmitterPassword'
    ,  'AdminManagerController@ResettingSubmitterPasswordIndex')->name(
    'ResettingSubmitterPassword');
// </MainMenu></ResettingSubmitterPassword>
// <MainMenu><ResettingBloggerPassword>
Route::get('AdminManager/ResettingBloggerPassword'
    ,  'AdminManagerController@ResettingBloggerPasswordIndex')->name(
    'ResettingBloggerPassword');
// </MainMenu></ResettingBloggerPassword>
// <MainMenu><ExitAdminSession>
Route::get('AdminManager/ExitAdminSession'
    ,  'AdminManagerController@ExitAdminSessionIndex')->name(
    'ExitAdminSession');
// </MainMenu></ExitAdminSession>
/********************************/




// Inserting Options into DataBase
Route::get('InsertOptions','InsertOptionsController@Index');

Route::get('Insert',function (){
    $Advisor_info = AdvisorInfo::Create([
        'role_id'=>1
        ,'name'=>'حسین رضائی'
        ,'phone'=>'09162154325'
        ,'pic_path'=>'helllo'
    ]);
    $Apartment = Apartment::Create([
// tiny int
        'room'=>1
        ,'floor_number'=>1
        ,'total_floors'=>1
        ,'units_per_floor_number'=>1
        // options
        ,'floor_type'=>1
        ,'document_type'=>1
        ,'document_status'=>1
        ,'toilet_type'=>1
        ,'heating_system'=>1
        ,'cooling_system'=>1
        ,'facade'=>1
        ,'direction'=>1
        ,'cupboard'=>1
        ,'price'=>1
        ,'deal'=>1
        ,'neighbourhood'=>1
        // integers
        ,'construction_year'=>1111
        ,'area'=>11111
        // boolean
        ,'unit_status'=>true
        //,'water_heater'=>true
        ,'balcony'=>true
        ,'parking'=>true
        ,'elevator'=>true
        ,'warehouse'=>true
        ,'swimming_pool'=>true
        ,'sauna'=>true
        ,'jacuzzi'=>true
        ,'phone'=>true
        ,'master_bedroom'=>true
        ,'plumbing_gas'=>true
        ,'luxury'=>true
        ,'lobby'=>true
        ,'hood'=>true
        ,'plate_gas'=>true
        ,'address'=>'ggg'
        ,'description'=>'eee'
    ]);
//    $Apartment->Property()->Create([
//        'price'=>10000000023423
//        ,'property'=>1
//        ,'deal'=>3
//    ]);
//    $Apartment->Property->dealtype()->Create([
//        'pre_price'=>23123
//        ,'rent_price'=>3123
//        ,'change_able'=>true
//    ]);
    $Apartment->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $Apartment->Photos()->Create([
        'path'=>'yeah'
    ]);
    $Apartment->Photos()->Create([
        'path'=>'yeah1'
    ]);
    $Apartment->Photos()->Create([
        'path'=>'yeah2'
    ]);
    $Apartment->Rent()->Create([
        'rent'=>1
        ,'pre_rent'=>1
        ,'changeable'=>false
    ]);
    $Shop = Shop::Create([
        'unit_height'=>1
        // options
        ,'document_type'=>1
        ,'document_status'=>1
        ,'heating_system'=>1
        ,'cooling_system'=>1
        ,'direction'=>1
        // integer
        ,'construction_year'=>1111
        ,'balcony_area'=>1
        ,'floor_area'=>1
        ,'total_area'=>1
        // Boolean
        ,'water'=>1
        ,'electricity'=>1
        ,'gas'=>1
        ,'phone'=>0
        ,'address'=>1
        ,'description'=>1
    ]);
    $Shop->Property()->Create([
        'price'=>10000000023423
        ,'property'=>2
        ,'deal'=>1
    ]);
    $Shop->Property->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $Shop->Property->Photos()->Create([
        'path'=>'yeah1'
    ]);
    $Shop->Property->Photos()->Create([
        'path'=>'yeah11'
    ]);
    $Shop->Property->Photos()->Create([
        'path'=>'yeah21'
    ]);
    $CommercialOffice = CommercialOffice::Create([
        'room_number'=>1
        ,'floor_number'=>1
        ,'total_floor'=>1
        ,'units_per_floor_number'=>1
        // options
        ,'unit_status'=>1
        ,'document_type'=>1
        ,'document_status'=>1
        ,'heating_system'=>1
        ,'cooling_system'=>1
        ,'floor_kind'=>1
        ,'direction'=>1
        ,'cupboard'=>1
        // integer
        ,'construction_year'=>1
        ,'area'=>1
        //  yes no
        ,'parking'=>1
        ,'warehouse'=>1
        ,'elevator'=>1
        ,'balcony'=>1
        ,'luxury'=>1
        ,'lobby'=>1
        ,'hood'=>1
        ,'plate_gas'=>1

        ,'address'=>'rt'
        ,'description'=>'sd'
    ]);
    $CommercialOffice->Property()->Create([
        'price'=>10000000023423
        ,'property'=>3
        ,'deal'=>5
    ]);
    $CommercialOffice->Property->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $CommercialOffice->Property->Photos()->Create([
        'path'=>'yeah1'
    ]);
    $Garden = Garden::Create([
        'document_type'=>1
        ,'document_status'=>1
        ,'area'=>1
        ,'tree_number'=>1
        ,'room'=>1
        ,'address'=>1
        ,'description'=>1
    ]);
    $Garden->Property()->Create([
        'price'=>10000003423
        ,'property'=>4
        ,'deal'=>1
    ]);
    $Garden->Property->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $Garden->Property->Photos()->Create([
        'path'=>'yeah1'
    ]);
    $House = House::Create([
        'total_floor'=>1
        ,'floor_number'=>1
        ,'bedroom'=>1

        ,'unit_status'=>1
        ,'document_type'=>1
        ,'document_status'=>1
        ,'facade'=>1
        ,'floor_type'=>1
        ,'direction'=>1
        ,'cupboard'=>1

        ,'construction_year'=>1
        ,'area'=>1
        ,'foundation_area'=>1
        ,'any_floor_area'=>1

        ,'balcony'=>1
        ,'parking'=>1
        ,'elevator'=>1
        ,'warehouse'=>1
        ,'plumbing_gas'=>1
        ,'phone'=>1
        ,'swimming_pool'=>1
        ,'sauna'=>1
        ,'jacuzzi'=>1
        ,'master_bedroom'=>1
        ,'luxury'=>1
        ,'hole_sell'=>1
        ,'hood'=>1
        ,'plate_gas'=>1

        ,'address'=>1
        ,'description'=>1
    ]);
    $House->Property()->Create([
        'price'=>10000003423
        ,'property'=>5
        ,'deal'=>1
    ]);
    $House->Property->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $House->Property->Photos()->Create([
        'path'=>'yeah1'
    ]);
    $VillaGarden = VillaGarden::Create([
        'total_floor'=>1

        ,'unit_status'=>1
        ,'document_type'=>1
        ,'document_status'=>1
        ,'facade'=>1

        ,'construction_year'=>1
        ,'total_area'=>1
        ,'foundation_area'=>1
        ,'tree_number'=>1

        ,'water'=>1
        ,'electricity'=>1
        ,'plumbing_gas'=>1
        ,'phone'=>1
        ,'swimming_pool'=>1
        ,'sauna'=>1
        ,'jacuzzi'=>1
        ,'luxury'=>1

        ,'address'=>1
        ,'description'=>1
    ]);
    $VillaGarden->Property()->Create([
        'price'=>10000003423
        ,'property'=>6
        ,'deal'=>1
    ]);
    $VillaGarden->Property->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $VillaGarden->Property->Photos()->Create([
        'path'=>'yeah1'
    ]);
    $Booth = Booth::Create([
        'document_type'=>1
        ,'document_status'=>1
        ,'construction_year'=>1
        ,'area'=>1
        ,'address'=>1
        ,'description'=>1
    ]);
    $Booth->Property()->Create([
        'price'=>10000003423
        ,'property'=>7
        ,'deal'=>1
    ]);
    $Booth->Property->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $Booth->Property->Photos()->Create([
        'path'=>'yeah1'
    ]);
    $OldAge = OldAge::Create([
        'total_floor'=>1
        ,'gozar'=>1

        ,'document_type'=>1
        ,'document_status'=>1
        ,'direction'=>1

        ,'construction_year'=>1
        ,'bar'=>1
        ,'total_area'=>1
        ,'foundation_area'=>1

        ,'address'=>1
        ,'description'=>1
    ]);
    $OldAge->Property()->Create([
        'price'=>10000003423
        ,'property'=>8
        ,'deal'=>1
    ]);
    $OldAge->Property->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $OldAge->Property->Photos()->Create([
        'path'=>'yeah1'
    ]);
    $OfficeLocation = OfficeLocation::Create([
        'room_number'=>1
        ,'floor_number'=>1
        ,'total_floor'=>1
        ,'units_per_floor_number'=>1

        ,'unit_status'=>1
        ,'document_type'=>1
        ,'document_status'=>1
        ,'heating_system'=>1
        ,'cooling_system'=>1
        ,'floor_kind'=>1
        ,'direction'=>1
        ,'cupboard'=>1

        ,'construction_year'=>1
        ,'area'=>1

        ,'balcony'=>1
        ,'parking'=>1
        ,'warehouse'=>1
        ,'elevator'=>1
        ,'lobby'=>1
        ,'hood'=>1
        ,'plate_gas'=>1

        ,'address'=>1
        ,'description'=>1
    ]);
    $OfficeLocation->Property()->Create([
        'price'=>10000003423
        ,'property'=>9
        ,'deal'=>1
    ]);
    $OfficeLocation->Property->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $OfficeLocation->Property->Photos()->Create([
        'path'=>'yeah1'
    ]);
    $Land = Land::Create([
        'gozar'=>1

        ,'document_type'=>1
        ,'document_status'=>1
        ,'use_for'=>1
        ,'direction'=>1

        ,'bar'=>1
        ,'area'=>1

        ,'address'=>1
        ,'description'=>1
    ]);
    $Land->Property()->Create([
        'price'=>10000003423
        ,'property'=>10
        ,'deal'=>1
    ]);
    $Land->Property->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $Land->Property->Photos()->Create([
        'path'=>'yeah1'
    ]);
});







































Route::get('testp',function (){
    $Land = Land::Create([
         'gozar'=>1
        ,'document_type'=>1
        ,'document_status'=>1
        ,'use_for'=>1
        ,'direction'=>1
        ,'bar'=>1
        ,'area'=>1
        ,'address'=>1
        ,'description'=>1

    ]);
    $Land->propertyable()->Create([
        'price'=>100000000
        ,'property'=>10
        ,'deal'=>3
    ]);
    $Land->Photos()->Create([
        'path'=>'hello'
    ]);
    $Advisor_info = AdvisorInfo::Create([
        'role_id'=>1
        ,'name'=>'حسین رضائی'
        ,'phone'=>'09162154325'
        ,'pic_path'=>'helllo'
    ]);
    //$Advisor_info->id;
    //dd($Land->propertyable->advisor());
    $Land->propertyable->advisor()->Create([
        'advisor_infos_id'=>$Advisor_info->id
    ]);
    $Land->propertyable->dealtype()->Create([

        'month'=>1
        ,'change_able'=>false
        ,'pre_price'=>21233
        ,'rent_price'=>4563
    ]);
});

Route::get('/test', function () {
    $buy = new Buy();
//    $buy->price  = 19214532;
//    $buy->rent   = 123366552;
//    $buy->kind   = 1;
//    $buy->method = 2;
    $buy_instance = Buy::create([
        'price'=>19214532,
        'rent' =>123366552,
        'kind' =>1,
        'method'=>2
    ]);
    //dd($buy_instance);
    //echo $instance->id;
    $buy = Buy::findOrFail($buy_instance->id);
    $apartment = new Apartment();
    $apartment->bedroom                = 1;
    $apartment->floor_number           = 3;
    $apartment->total_floors           = 5;
    $apartment->units_per_floor_number = 2;
    $apartment->bathroom_number        = 2;
    $apartment->toilet_number          = 2;
    $apartment->construction_year      = 1389;
    $apartment->floor_type             = 1;
    $apartment->document_type          = 2;
    $apartment->toilet_type            = 2;
    $apartment->heating_system         = 1;
    $apartment->cooling_system         = 1;
    $apartment->unit_direction         = 3;
    $apartment->water_heater           = 2;
    $apartment->facade                 = 1;
    $apartment->parking                = 0;
    $apartment->elevator               = 1;
    $apartment->warehouse              = 0;
    $apartment->balcony                = 1;
    $apartment->swimming_pool          = 0;
    $apartment->jacuzzi                = 1;
    $apartment->phone                  = 1;
    $apartment->master_bedroom         = 0;
    $apartment->cupboard               = 0;
    $apartment->plumbing_gas           = 1;
    $apartment->address                = 'f';
    $buy->Apartment()->save($apartment);
    //$buy_instance->Apartment()->save($apartment);

    //
});

Route::get('/PhotoTest', function () {

    $land = Land::findOrFail(8);
    $land->Photos()->create(['path'=>'2hello.jpg']);


});

Route::get('Templates','TemplatesController@index');
Route::get('Templates/SearchMain','TemplatesController@SearchMain');
Route::get('Templates/RentSearchForm','TemplatesController@RentSearchForm');
Route::get('Templates/PropertyInsert','TemplatesController@PropertyInsert');
