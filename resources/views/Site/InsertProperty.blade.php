@extends('Site.parent')
@section('style')
    <style>
        body {
            text-align: center;
            align-items: inherit;
        }

        .Options {
            font-size: 20px;
            font-stretch: expanded;
        }
    </style>
    <style>
        .Border{
            border:5px solid gold;
            padding: 5px;

            border-radius: 100px 100px 100px 100px;
        }
        .Label{
            text-align: center;
            font-size: 20px;
            color: gold;
            background-color: #333333;
        }
        .Input{
            text-align: center;
            font-size: 20px;
            border:5px solid gold;
            border-radius: 100px 100px 100px 100px;
            color: gold;
            background-color: #333333;

        }
        .Error{
            text-align: center;
            font-size: 20px;
            color: gold;
            background-color: #333333;
        }

    </style>
@endsection
@section('body')
    <div class="container-fluid float-right text-right" style="padding: 0px;margin: 0px;border: 0px">
        <form method="post" action="/InsertProperty"  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" onsubmit="return Validator()">
            @method('put')
            @csrf
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth" >

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth Border">
                    <div class="col  text-center Options Label" >
                        لطفا نوع ملک را انتخاب کنید
                    </div>
                    <select name="PropertyName" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth custom-select custom-select-lg text-center Input"
                            id="PropertySelecting" onchange="AfterPropertySelection()">
                        <option value="NOT" selected>انتخاب کنید</option>
                        <option value="1">اپارتمان مسکونی</option>
                        <option value="2">مغازه</option>
                        <option value="3">اداری تجاری</option>
                        <option value="4">باغ</option>
                        <option value="5">ویلایی</option>
                        <option value="6">باغ ویلا</option>
                        <option value="7">غرفه</option>
                        <option value="8">کلنگی</option>
                        <option value="9">موقعیت اداری</option>
                        <option value="10">زمین</option>

                    </select>
                    <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth badge-secondary text-right Options Error text-center'  id='" + id + "Error'>برای شروع نوع ملک را انتخاب کنید</div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" id="">
                    <p></p>
                </div>
                {{-- property items will include here --}}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth text-center InfoItemHolder" style="padding: 0px;margin: 0px;border: 0px" id="PropertyForm">

                </div>
{{--                Picture--}}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth text-center Border" id="PictureController">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2  FullWidth text-center align-items-center" style="font-size: 50px" >
                        <div onclick="AddPicture()" class="fas fa-plus-circle align-self-center"></div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8  FullWidth text-center Border "style="font-size: 30px" id="PicNumber" >
                        1
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2  FullWidth text-center align-items-center" style="font-size: 50px" >
                        <div onclick="OmitPicture()" class="fas fa-minus-circle align-self-center"></div>
                    </div>
                </div>
                <div id="PicArr">
                    <input type="hidden" name="PicNum" value="1" id="PicNumHidden">
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth text-center" id="PictureHolder">

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row flex-row-reverse FullWidth text-center" >
                        <input class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth Input" type="file" name="pic1">
                    </div>
                </div>
                <div class="col-12" id="">
                    <p></p>
                </div>
                {{-- deal selecting section will include here --}}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth text-center" style="padding: 0px;margin: 0px;border: 0px" id="DealSelection">

                </div>
                <div class="col-12" id="">
                    <p></p>
                </div>
                {{-- deal items will include here --}}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth text-center" style="padding: 0px;margin: 0px;border: 0px" id="DealForm">

                </div>
                {{-- you can use check values whit this button --}}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth text-center" style="padding: 0px;margin: 0px;border: 0px" id="">
                    <button type="button" class="btn btn-primary btn-block" style="font-size: 50px" onclick="Validator()">چک کردن داده ها</button>
                </div>
                {{-- validation items will include here--}}
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth text-center" style="padding: 0px;margin: 0px;border: 0px" id="Validate">

                </div>

                <div class="col-12" id="">
                    <p></p>
                </div>
                <div class="col-12" id="">
                    <p></p>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
{{--<OtherScripts>--}}
<script>
    $(document).ready(() => {
        $("#PropertySelecting").val('NOT');
    });
</script>
{{--</OtherScripts>--}}
{{-- <FormObjects> --}}
<script>
    var OptionsArr = {
        'Number':
            {
                '1':'1',
                '2':'2',
                '3':'3',
                '4':'4',
                '5':'5',
                '6':'6',
                '7':'7',
                '8':'8',
                '9':'9',
                '10':'10',
                '11':'11',
                '12':'12',
                '13':'13',
                '14':'14',
                '15':'15',
                '16':'16',
                '17':'17',
                '18':'18',
                '19':'19',
                '20':'20',
            },
        'TrueFalse':
            {
                '1':'دارد' ,
                '0':'ندارد'
            },
        'YesNo':
            {
                '1':'بله' ,
                '0':'خیر'
            },
        'FloorType':
            {
                '1': 'سرامیک',
                '2': 'سنگ',
                '3': 'موزاییک',
                '4': 'موکت',
                '5': 'سیمان',
                '6': 'پارکت',
            },
        'DocumentStatus':
            {
                '1': 'شخصی',
                '2': 'دولتی',
                '3': 'تعاونی',
                '4': 'اوقافی',
                '5': 'فرمان امام',
                '6': 'مهر',
                '7': 'قولنامه ای',
                '8': 'واگذاری ارگانها',
                '9': 'بدون سند',
            },
        'DocumentType':
            {
                '1': 'عرصه',
                '2': 'اعیان',
                '3': 'عرصه و اعیان',
            },
        'HeatingSystem':
            {
                '1': 'پکیج',
                '2': 'فن کویل',
                '3': 'شومینه',
                '4': 'بخاری گازی',
                '5': 'سایر',
            },
        'CoolingSystem':
            {
                '1': 'کولر ابی',
                '2': 'کولر اسپیلت',
                '3': 'داکت اسپیلت',
                '4': 'فنکویل',
                '5': 'چیلر',
                '6': 'سایر',

            },
        'Direction':
            {
                '1': 'شمالی',
                '2': 'جنوبی',
                '3': 'شرقی',
                '4': 'غربی',
                '5': 'شمال شرقی',
                '6': 'شمال غربی',
                '7': 'جنوب شرقی',
                '8': 'جنوب غربی',
            },
        'Facade':
            {
                '1': 'سنگ',
                '2': 'اجر',
                '3': 'اجر قرمز',
                '4': 'سرامیک',
                '5': 'کامپوزیت',
                '6': 'ترکیبی',
                '7': 'رومی',
                '8': 'سیمان',
                '9': 'کنیتکس',
                '10': 'پانل سیمان شسته',
            } ,
        'ToiletType':
            {
                '1':'ایرانی',
                '2':'فرنگی',
                '3':'ایرانی و فرنگی',
            },
        'UseFor':
            {
                '1':'مسکونی',
                '2':'تجاری',
                '3':'تجاری مسکونی',
                '4':'اداری تجاری',
                '5':'اداری',
                '6': 'کشاورزی',
                '7': 'باغ',
                '8': 'باغ ویلا',
            },
        'UnitStatus':
            {
                '1':'خام',
                '2':'تجهیز شده',
            },
        'CupboardType':
            {
                '1':'گالوانیزه',
                '2':'MDF',
                '3':'های گلس',
                '4':'ممبران',
                '5':'چوب',
                '6':'رزین',
                '7':'سایر',
                '8':'ندارد',
            }
    };
    var ApartmentArr = [
        {
            'type': 'Option',
            'label': 'تعداد خواب',
            'options': 'Number',
            'id': 'ApartmentBedRoom'
        },
        {
            'type': 'Number',
            'label': 'طبقه',
            'min': 0,
            'max': 100,
            'id': 'ApartmentFloorNumber'
        },
        {
            'type': 'Number',
            'label': 'کل طبقات',
            'min': 0,
            'max': 100,
            'id': 'ApartmentTotalFloors'
        },
        {
            'type': 'Option',
            'label': 'واحد در طبقه',
            'options': 'Number',
            'id': 'ApartmentUnitsPerFloorNumber'
        },
        {
            'type': 'Option',
            'label': 'پوشش کف',
            'options': 'FloorType',
            'id': 'ApartmentFloorType'
        },
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'ApartmentDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'ApartmentDocumentStatus'
        },
        {
            'type': 'Option',
            'label': 'سرویس بهداشتی',
            'options': 'ToiletType',
            'id': 'ApartmentToiletType'
        },
        {
            'type': 'Option',
            'label': 'سیستم گرمایش',
            'options': 'HeatingSystem',
            'id': 'ApartmentHeatingSystem'
        },
        {
            'type': 'Option',
            'label': 'سیستم سرمایش',
            'options': 'CoolingSystem',
            'id': 'ApartmentCoolingSystem'
        },
        {
            'type': 'Option',
            'label': 'نما',
            'options': 'Facade',
            'id': 'ApartmentFacade'
        },
        {
            'type': 'Option',
            'label': 'جهت',
            'options': 'Direction',
            'id': 'ApartmentDirection'
        },
        {
            'type': 'Option',
            'label': 'وضعیت',
            'options': 'UnitStatus',
            'id': 'ApartmentUnitStatus'
        },
        {
            'type': 'Number',
            'label': 'سال ساخت',
            'min': 1300,
            'max': 1500,
            'id': 'ApartmentConstructionYear'
        },
        {
            'type': 'Number',
            'label': 'مساحت',
            'min': 1,
            'max': 5000,
            'id': 'ApartmentArea'
        },
        {
            'type': 'Option',
            'label': 'بالکن',
            'options': 'TrueFalse',
            'id': 'ApartmentBalcony'
        },
        {
            'type': 'Option',
            'label': 'پارکینگ',
            'options': 'TrueFalse',
            'id': 'ApartmentParking'
        },
        {
            'type': 'Option',
            'label': 'اسانسور',
            'options': 'TrueFalse',
            'id': 'ApartmentElevator'
        },
        {
            'type': 'Option',
            'label': 'انبار',
            'options': 'TrueFalse',
            'id': 'ApartmentWarehouse'
        },
        {
            'type': 'Option',
            'label': 'استخر',
            'options': 'TrueFalse',
            'id': 'ApartmentSwimmingPool'
        },
        {
            'type': 'Option',
            'label': 'سونا',
            'options': 'TrueFalse',
            'id': 'ApartmentSauna'
        },
        {
            'type': 'Option',
            'label': 'جکوزی',
            'options': 'TrueFalse',
            'id': 'ApartmentJacuzzi'
        },
        {
            'type': 'Option',
            'label': 'تلفن',
            'options': 'TrueFalse',
            'id': 'ApartmentPhone'
        },
        {
            'type': 'Option',
            'label': 'مستر',
            'options': 'TrueFalse',
            'id': 'ApartmentMasterBedroom'
        },
        {
            'type': 'Option',
            'label': 'کابینت',
            'options': 'CupboardType',
            'id': 'ApartmentCupboard'
        },
        {
            'type': 'Option',
            'label': 'گاز شهری',
            'options': 'TrueFalse',
            'id': 'ApartmentPlumbingGas'
        },
        {
            'type': 'Option',
            'label': 'لابی',
            'options': 'TrueFalse',
            'id': 'ApartmentLobby'
        },
        {
            'type': 'Option',
            'label': 'هود',
            'options': 'TrueFalse',
            'id': 'ApartmentHood'
        },
        {
            'type': 'Option',
            'label': 'گاز صفحه ای',
            'options': 'TrueFalse',
            'id': 'ApartmentPlateGas'
        },
        {
            'type': 'Option',
            'label': 'لاکچری',
            'options': 'TrueFalse',
            'id': 'ApartmentLuxury'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'ApartmentAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'ApartmentDescription'
        },

    ];
    var ShopArr      = [
        {
            'type': 'Number',
            'label': 'ارتفاع تا سقف',
            'min': 2,
            'max': 6,
            'id': 'ShopUnitHeight'
        },
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'ShopDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'ShopDocumentStatus'
        },
        {
            'type': 'Option',
            'label': 'سیستم گرمایش',
            'options': 'HeatingSystem',
            'id': 'ShopHeatingSystem'
        },
        {
            'type': 'Option',
            'label': 'سیستم سرمایش',
            'options': 'CoolingSystem',
            'id': 'ShopCoolingSystem'
        },
        {
            'type': 'Option',
            'label': 'جهت',
            'options': 'Direction',
            'id': 'ShopDirection'
        },
        {
            'type': 'Number',
            'label': 'سال ساخت ملک به هجری شمسی',
            'min': 1300,
            'max': 1500,
            'id': 'ShopConstructionYear'
        },
        {
            'type': 'Number',
            'label': 'مساحت بالکن(اگر بالکن ندارد صفر وارد کنید)',
            'min': 0,
            'max': 2000,
            'id': 'ShopBalconyHeight'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل',
            'min': 1,
            'max': 5000,
            'id': 'ShopTotalArea'
        },
        {
            'type': 'Number',
            'label': 'مساحت کف',
            'min': 1,
            'max': 5000,
            'id': 'ShopFloorArea'
        },
        {
            'type': 'Option',
            'label': 'اب',
            'options': 'TrueFalse',
            'id': 'ShopWater'
        },
        {
            'type': 'Option',
            'label': 'برق',
            'options': 'TrueFalse',
            'id': 'ShopElectricity'
        },
        {
            'type': 'Option',
            'label': 'گاز شهری',
            'options': 'TrueFalse',
            'id': 'ShopGas'
        },
        {
            'type': 'Option',
            'label': 'تلفن',
            'options': 'TrueFalse',
            'id': 'ShopPhone'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'ShopAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'ShopDescription'
        },

    ];
    var CommercialOfficeArr = [
        {
            'type': 'Option',
            'label': 'تعداد اتاق',
            'options': 'Number',
            'id': 'CommercialOfficeRoom'
        },
        {
            'type': 'Number',
            'label': 'طبقه',
            'min': 0,
            'max': 100,
            'id': 'CommercialOfficeFloorNumber'
        },
        {
            'type': 'Number',
            'label': 'کل طبقات',
            'min': 0,
            'max': 100,
            'id': 'CommercialOfficeTotalFloors'
        },
        {
            'type': 'Option',
            'label': 'واحد در طبقه',
            'options': 'Number',
            'id': 'CommercialOfficeUnitsPerFloorNumber'
        },
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'CommercialOfficeDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'CommercialOfficeDocumentStatus'
        },
        {
            'type': 'Option',
            'label': 'سیستم گرمایش',
            'options': 'HeatingSystem',
            'id': 'CommercialOfficeHeatingSystem'
        },
        {
            'type': 'Option',
            'label': 'سیستم سرمایش',
            'options': 'CoolingSystem',
            'id': 'CommercialOfficeCoolingSystem'
        },
        {
            'type': 'Option',
            'label': 'پوشش کف',
            'options': 'FloorType',
            'id': 'CommercialOfficeFloorType'
        },
        {
            'type': 'Option',
            'label': 'جهت',
            'options': 'Direction',
            'id': 'CommercialOfficeDirection'
        },
        {
            'type': 'Option',
            'label': 'وضعیت',
            'options': 'UnitStatus',
            'id': 'CommercialOfficeUnitStatus'
        },
        {
            'type': 'Number',
            'label': 'سال ساخت',
            'min': 1300,
            'max': 1500,
            'id': 'CommercialOfficeConstructionYear'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل',
            'min': 0,
            'max': 5000,
            'id': 'CommercialOfficeArea'
        },
        {
            'type': 'Option',
            'label': 'پارکینگ',
            'options': 'TrueFalse',
            'id': 'CommercialOfficeParking'
        },
        {
            'type': 'Option',
            'label': 'انباری',
            'options': 'TrueFalse',
            'id': 'CommercialOfficeWarehouse'
        },
        {
            'type': 'Option',
            'label': 'اسانسور',
            'options': 'TrueFalse',
            'id': 'CommercialOfficeElevator'
        },
        {
            'type': 'Option',
            'label': 'بالکن',
            'options': 'TrueFalse',
            'id': 'CommercialOfficeBalcony'
        },
        {
            'type': 'Option',
            'label': 'لابی',
            'options': 'TrueFalse',
            'id': 'CommercialOfficeLobby'
        },
        {
            'type': 'Option',
            'label': 'هود',
            'options': 'TrueFalse',
            'id': 'CommercialOfficeHood'
        },
        {
            'type': 'Option',
            'label': 'گاز صفحه ای',
            'options': 'TrueFalse',
            'id': 'CommercialOfficePlateGas'
        },
        {
            'type': 'Option',
            'label': 'کابینت',
            'options': 'CupboardType',
            'id': 'CommercialOfficeCupboard'
        },
        {
            'type': 'Option',
            'label': 'لاکچری',
            'options': 'TrueFalse',
            'id': 'CommercialOfficeLuxury'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'CommercialOfficeAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'CommercialOfficeDescription'
        },
    ];
    var GardenArr = [
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'GardenDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'GardenDocumentStatus'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل',
            'min': 1,
            'max': 1000000,
            'id': 'GardenArea'
        },
        {
            'type': 'Number',
            'label': 'تعداد درختان',
            'min': 1,
            'max': 1000000,
            'id': 'GardenTreeNumber'
        },
        {
            'type': 'Option',
            'label': 'خانه باغ',
            'options': 'TrueFalse',
            'id': 'GardenBalcony'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'GardenAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'GardenDescription'
        },
    ];
    var HouseArr = [
        {
            'type': 'Number',
            'label': 'کل طبقات',
            'min': 0,
            'max': 100,
            'id': 'HouseTotalFloors'
        },
        {
            'type': 'Number',
            'label': 'طبقه',
            'min': 0,
            'max': 100,
            'id': 'HouseFloorNumber'
        },
        {
            'type': 'Option',
            'label': 'خواب',
            'options': 'Number',
            'id': 'HouseBedRoom'
        },
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'HouseDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'HouseDocumentStatus'
        },
        {
            'type': 'Option',
            'label': 'نما',
            'options': 'Facade',
            'id': 'HouseFacade'
        },
        {
            'type': 'Option',
            'label': 'پوشش کف',
            'options': 'FloorType',
            'id': 'HouseFloorType'
        },
        {
            'type': 'Option',
            'label': 'جهت',
            'options': 'Direction',
            'id': 'HouseDirection'
        },
        {
            'type': 'Option',
            'label': 'وضعیت',
            'options': 'UnitStatus',
            'id': 'HouseUnitStatus'
        },
        {
            'type': 'Number',
            'label': 'سال ساخت',
            'min': 1300,
            'max': 1500,
            'id': 'HouseConstructionYear'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل',
            'min': 1,
            'max': 5000,
            'id': 'HouseArea'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل زیربنا',
            'min': 1,
            'max': 5000,
            'id': 'HouseFoundationArea'
        },
        {
            'type': 'Number',
            'label': 'مساحت هر طبقه',
            'min': 1,
            'max': 5000,
            'id': 'HouseAnyFloorArea'
        },
        {
            'type': 'Option',
            'label': 'بالکن',
            'options': 'TrueFalse',
            'id': 'HouseBalcony'
        },
        {
            'type': 'Option',
            'label': 'فروش یکجا',
            'options': 'YesNo',
            'id': 'HouseComplete'
        },
        {
            'type': 'Option',
            'label': 'پارکینگ',
            'options': 'TrueFalse',
            'id': 'HouseParking'
        },
        {
            'type': 'Option',
            'label': 'اسانسور',
            'options': 'TrueFalse',
            'id': 'HouseElevator'
        },
        {
            'type': 'Option',
            'label': 'انبار',
            'options': 'TrueFalse',
            'id': 'HouseWarehouse'
        },
        {
            'type': 'Option',
            'label': 'گاز شهری',
            'options': 'TrueFalse',
            'id': 'HousePlumbingGas'
        },
        {
            'type': 'Option',
            'label': 'تلفن',
            'options': 'TrueFalse',
            'id': 'HousePhone'
        },
        {
            'type': 'Option',
            'label': 'استخر',
            'options': 'TrueFalse',
            'id': 'HouseSwimmingPool'
        },
        {
            'type': 'Option',
            'label': 'سونا',
            'options': 'TrueFalse',
            'id': 'HouseSauna'
        },
        {
            'type': 'Option',
            'label': 'جکوزی',
            'options': 'TrueFalse',
            'id': 'HouseJacuzzi'
        },
        {
            'type': 'Option',
            'label': 'مستر',
            'options': 'TrueFalse',
            'id': 'HouseMasterBedroom'
        },
        {
            'type': 'Option',
            'label': 'کابینت',
            'options': 'CupboardType',
            'id': 'HouseCupboard'
        },
        {
            'type': 'Option',
            'label': 'هود',
            'options': 'TrueFalse',
            'id': 'HouseHood'
        },
        {
            'type': 'Option',
            'label': 'گاز صفحه ای',
            'options': 'TrueFalse',
            'id': 'HousePlateGas'
        },
        {
            'type': 'Option',
            'label': 'لاکچری',
            'options': 'TrueFalse',
            'id': 'HouseLuxury'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'HouseAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'HouseDescription'
        },
    ];
    var VillaGardenArr = [
        {
            'type': 'Number',
            'label': 'کل طبقات',
            'min': 0,
            'max': 100,
            'id': 'VillaGardenTotalFloors'
        },
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'VillaGardenDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'VillaGardenDocumentStatus'
        },
        {
            'type': 'Option',
            'label': 'نما',
            'options': 'Facade',
            'id': 'VillaGardenFacade'
        },
        {
            'type': 'Option',
            'label': 'وضعیت',
            'options': 'UnitStatus',
            'id': 'VillaGardenUnitStatus'
        },
        {
            'type': 'Number',
            'label': 'سال ساخت',
            'min': 1300,
            'max': 1500,
            'id': 'VilaGardenConstructionYear'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل',
            'min': 0,
            'max': 1000000,
            'id': 'VilaGardenTotalArea'
        },
        {
            'type': 'Number',
            'label': 'مساحت زیربنا',
            'min': 0,
            'max': 2000,
            'id': 'VilaGardenFoundationArea'
        },
        {
            'type': 'Number',
            'label': 'تعداد درختان',
            'min': 0,
            'max': 1000000,
            'id': 'VillaGardenTreeNumber'
        },
        {
            'type': 'Option',
            'label': 'اب',
            'options': 'TrueFalse',
            'id': 'VillaGardenWater'
        },
        {
            'type': 'Option',
            'label': 'برق',
            'options': 'TrueFalse',
            'id': 'VillaGardenElectricity'
        },
        {
            'type': 'Option',
            'label': 'گاز شهری',
            'options': 'TrueFalse',
            'id': 'VillaGardenGas'
        },
        {
            'type': 'Option',
            'label': 'تلفن',
            'options': 'TrueFalse',
            'id': 'VillaGardenPhone'
        },
        {
            'type': 'Option',
            'label': 'استخر',
            'options': 'TrueFalse',
            'id': 'VillaGardenSwimmingPool'
        },
        {
            'type': 'Option',
            'label': 'سونا',
            'options': 'TrueFalse',
            'id': 'VillaGardenSauna'
        },
        {
            'type': 'Option',
            'label': 'جکوزی',
            'options': 'TrueFalse',
            'id': 'VillaGardenJacuzzi'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'VillaGardenAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'VillaGardenDescription'
        },
    ];
    var BoothArr = [
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'BoothDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'BoothDocumentStatus'
        },
        {
            'type': 'Number',
            'label': 'سال ساخت',
            'min': 1300,
            'max': 1500,
            'id': 'BoothConstructionYear'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل',
            'min': 0,
            'max': 16000000,
            'id': 'BoothArea'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'BoothAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'BoothDescription'
        },
    ];
    var OldAgeArr = [
        {
            'type': 'Number',
            'label': 'کل طبقات',
            'min': 0,
            'max': 100,
            'id': 'OldAgeTotalFloor'
        },
        {
            'type': 'Number',
            'label': 'گذر',
            'min': 1,
            'max': 200,
            'id': 'OldAgeGozar'
        },
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'OldAgeDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'OldAgeDocumentStatus'
        },
        {
            'type': 'Option',
            'label': 'جهت',
            'options': 'Direction',
            'id': 'OldAgeDirection'
        },
        {
            'type': 'Number',
            'label': 'سال ساخت',
            'min': 1300,
            'max': 1500,
            'id': 'OldAgeConstructionYear'
        },
        {
            'type': 'Number',
            'label': 'بر',
            'min': 0,
            'max': 10000,
            'id': 'OldAgeBar'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل',
            'min': 1,
            'max': 1000000,
            'id': 'OldAgeTotalArea'
        },
        {
            'type': 'Number',
            'label': 'مساحت زیربنای',
            'min': 1,
            'max': 1000000,
            'id': 'OldAgeFoundationArea'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'OldAgeAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'OldAgeDescription'
        },
    ];
    var OfficeLocationArr = [
        {
            'type': 'Option',
            'label': 'تعداد اتاق',
            'options': 'Number',
            'id': 'OfficeLocationRoom'
        },
        {
            'type': 'Number',
            'label': 'طبقه',
            'min': 0,
            'max': 100,
            'id': 'OfficeLocationFloorNumber'
        },
        {
            'type': 'Number',
            'label': 'کل طبقات',
            'min': 0,
            'max': 100,
            'id': 'OfficeLocationTotalFloors'
        },
        {
            'type': 'Option',
            'label': 'واحد در طبقه',
            'options': 'Number',
            'id': 'OfficeLocationUnitsPerFloorNumber'
        },
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'OfficeLocationDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'OfficeLocationDocumentStatus'
        },
        {
            'type': 'Option',
            'label': 'سیستم گرمایش',
            'options': 'HeatingSystem',
            'id': 'OfficeLocationHeatingSystem'
        },
        {
            'type': 'Option',
            'label': 'سیستم سرمایش',
            'options': 'CoolingSystem',
            'id': 'OfficeLocationCoolingSystem'
        },
        {
            'type': 'Option',
            'label': 'پوشش کف',
            'options': 'FloorType',
            'id': 'OfficeLocationFloorType'
        },
        {
            'type': 'Option',
            'label': 'جهت',
            'options': 'Direction',
            'id': 'OfficeLocationDirection'
        },
        {
            'type': 'Option',
            'label': 'وضعیت',
            'options': 'UnitStatus',
            'id': 'OfficeLocationUnitStatus'
        },
        {
            'type': 'Number',
            'label': 'سال ساخت',
            'min': 1300,
            'max': 1500,
            'id': 'OfficeLocationConstructionYear'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل',
            'min': 1,
            'max': 3000,
            'id': 'OfficeLocationArea'
        },
        {
            'type': 'Option',
            'label': 'پارکینگ',
            'options': 'TrueFalse',
            'id': 'OfficeLocationParking'
        },
        {
            'type': 'Option',
            'label': 'انبار',
            'options': 'TrueFalse',
            'id': 'OfficeLocationWarehouse'
        },
        {
            'type': 'Option',
            'label': 'اسانسور',
            'options': 'TrueFalse',
            'id': 'OfficeLocationElevator'
        },
        {
            'type': 'Option',
            'label': 'بالکن',
            'options': 'TrueFalse',
            'id': 'OfficeLocationBalcony'
        },
        {
            'type': 'Option',
            'label': 'لابی',
            'options': 'TrueFalse',
            'id': 'OfficeLocationLobby'
        },
        {
            'type': 'Option',
            'label': 'هود',
            'options': 'TrueFalse',
            'id': 'OfficeLocationHood'
        },
        {
            'type': 'Option',
            'label': 'گاز صفحه ای',
            'options': 'TrueFalse',
            'id': 'OfficeLocationPlateGas'
        },
        {
            'type': 'Option',
            'label': 'کابینت',
            'options': 'CupboardType',
            'id': 'OfficeLocationCupboard'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'OfficeLocationAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'OfficeLocationDescription'
        },
    ];
    var LandArr = [
        {
            'type': 'Number',
            'label': 'گذر',
            'min': 1,
            'max': 200,
            'id': 'LandGozar'
        },
        {
            'type': 'Option',
            'label': 'نوع سند',
            'options': 'DocumentType',
            'id': 'LandDocumentType'
        },
        {
            'type': 'Option',
            'label': 'وضعیت سند',
            'options': 'DocumentStatus',
            'id': 'LandDocumentStatus'
        },
        {
            'type': 'Option',
            'label': 'کاربری',
            'options': 'UseFor',
            'id': 'LandUseFor'
        },
        {
            'type': 'Option',
            'label': 'جهت',
            'options': 'Direction',
            'id': 'LandDirection'
        },
        {
            'type': 'Number',
            'label': 'بر',
            'min': 1,
            'max': 10000,
            'id': 'LandBar'
        },
        {
            'type': 'Number',
            'label': 'مساحت کل',
            'min': 0,
            'max': 1000000,
            'id': 'LandTotalArea'
        },
        {
            'type': 'Address',
            'label': 'ادرس',
            'id': 'LandAddress'
        },
        {
            'type': 'Description',
            'label': 'توضیحات',
            'id': 'LandDescription'
        },
    ];
</script>
<script>
    var DealType = {
        'Apartment':
            {
                '1':'فروش',
                '2':'پیش فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
            },
        'Shop':
            {
                '1':'فروش',
                '2':'پیش فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
            },
        'CommercialOffice':
            {
                '1':'فروش',
                '2':'پیش فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
            },
        'Garden':
            {
                '1':'فروش',
                '2':'پیش فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
            },
        'House':
            {
                '1':'فروش',
                '2':'پیش فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
            },
        'VillaGarden':
            {
                '1':'فروش',
                '2':'پیش فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
            },
        'Booth':
            {
                '1':'فروش',
                '2':'پیش فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
            },
        'OldAge':
            {
                '1':'فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
                '5':'مشارکت در ساخت',
            },
        'OfficeLocation':
            {
                '1':'فروش',
                '2':'پیش فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
            },
        'Land':
            {
                '1':'فروش',
                '2':'پیش فروش',
                '3':'رهن و اجاره',
                '4':'اجاره به شرط تملیک',
                '5':'مشارکت در ساخت',
            },
    }
    var SellArr = [
        {
            'type': 'Number',
            'label': 'قیمت کل (تومان)',
            'min': 1,
            'max': 9000000000000,
            'id': 'Price'
        },
    ];
    var PreSellArr = [
        {
            'type': 'Number',
            'label': 'قیمت کل (تومان)',
            'min': 0,
            'max': 9000000000000,
            'id': 'Price'
        },
    ];
    var RentArr = [
        {
            'type': 'Number',
            'label': 'اجاره(تومان)',
            'min': 0,
            'max': 9000000000000,
            'id': 'Rent'
        },
        {
            'type': 'Number',
            'label': 'ودیعه(تومان)',
            'min': 0,
            'max': 9000000000000,
            'id': 'Deposit'
        },
        {
            'type': 'Option',
            'label': 'قابلیت تبدیل',
            'options': 'TrueFalse',
            'id': 'Translate'
        },
    ];
    var DepositRentArr = [
        {
            'type': 'Number',
            'label': 'قیمت کل(تومان)',
            'min': 0,
            'max': 9000000000000,
            'id': 'TotalPrice'
        },
        {
            'type': 'Number',
            'label': 'پیش پرداخت(تومان)',
            'min': 0,
            'max': 9000000000000,
            'id': 'PrePrice'
        },
        {
            'type': 'Number',
            'label': 'اجاره ی ماهیانه(تومان)',
            'min': 0,
            'max': 9000000000000,
            'id': 'MonthDeposit'
        },
        {
            'type': 'Number',
            'label': 'مدت زمان پرداخت(ماه)',
            'min': 0,
            'max': 1000,
            'id': 'TotalMonth'
        },
        {
            'type': 'Option',
            'label': 'قابلیت تبدیل',
            'options': 'TrueFalse',
            'id': 'Translate'
        },
    ];
</script>
{{-- </FormObjects> --}}
{{--<functions>--}}
<script>
    // this function gets the property number and returns their name
    function GetPropertyName(Number) {
        switch (Number){
            case '1': {
                return 'Apartment';
            }
            case '2': {
                return 'Shop';
            }
            case '3': {
                return 'CommercialOffice';
            }
            case '4': {
                return 'Garden';
            }
            case '5': {
                return 'House';
            }
            case '6': {
                return 'VilaGarden';
            }
            case '7': {
                return 'Booth';
            }
            case '8': {
                return 'OldAge';
            }
            case '9': {
                return 'OfficeLocation';
            }
            case '10': {
                return 'Land';
            }
        }
    }
    // this function gets property name or deal name or p(num) or d(num) and returns their object
    function  GetObject(ObjectName) {
        switch (ObjectName){
            case 'P1':
            case 'Apartment':{
                return ApartmentArr;
            }
            case 'P2':
            case 'Shop':{
                return ShopArr;
            }
            case 'P3':
            case 'CommercialOffice': {
                return CommercialOfficeArr;
            }
            case 'P4':
            case 'Garden':{
                return GardenArr;
            }
            case 'P5':
            case 'House':{
                return HouseArr;
            }
            case 'P6':
            case 'VilaGarden':{
                return VillaGardenArr;
            }
            case 'P7':
            case 'Booth':{
                return BoothArr;
            }
            case 'P8':
            case 'OldAge':{
                return OldAgeArr;
            }
            case 'P9':
            case 'OfficeLocation':{
                return OfficeLocationArr;
            }
            case 'P10':
            case 'Land':{
                return LandArr;
            }
            case 'D1':
            case 'Sell':{
                return SellArr;
            }
            case 'D2':
            case 'PreSell':{
                return PreSellArr;
            }
            case 'D3':
            case 'Rent':{
                return RentArr;
            }
            case 'D4':
            case 'DepositRent':{
                return DepositRentArr;
            }
            default:{
                return false;
            }
        }
    }
    // this function acts after a change in property selection section and add the property and deal inputs to the targert div tag
    function AfterPropertySelection() {
        // get the value of the current property selected
        var property = document.getElementById('PropertySelecting').value;
        // store property form
        var Property = "";
        // store Deal form
        var DealType = "";
        // if property selected is not correct
        if(property === "NOT") {
            // set the forms empty
            document.getElementById('PropertyForm').innerHTML = "";
            document.getElementById('DealSelection').innerHTML = "";
        }// if the selected value is correct
        else {
            property = GetPropertyName(property);
            Property += PropertyFormBuilder(property);
            DealType += DealBuilder(property);
        }
        // insert the forms to html
        document.getElementById('PropertyForm').innerHTML = Property;
        document.getElementById('DealSelection').innerHTML = DealType;
        document.getElementById('DealForm').innerHTML = '';
    }
    // this function calculates the price per meeter of any property selected
    function PricePerMeeterCalculate(id) {
        // find and store after changing to number the input value of property price
        var Input = Number(document.getElementById(id+'Input').value);
        // check if the number is correct
        // todo: compare them whit objects min amd max
        if (Input > 0) {
            // storing id of the selected property
            // todo: compare the value whit property objects
            var Area = "";
            // get the property value for searching Area in it
            var Property = document.getElementById('PropertySelecting').value;
            // finding property object
            Property = GetObject('P'+Property);
            // searching Area in Property object
            for (var i in Property){
                var id =Property[i]['id'];
                if(id.includes('Area')){
                    Area = id;
                }
            }
            // finding the area value from finded id
            Area = Number(document.getElementById(Area+'Input').value);
            // storing price per meeter
            var PricePerMeeter = 0;
            // if area is valid
            if (Area > 0){
                // calculating price per meeter
                PricePerMeeter = Input/Area;
                // print the result for user
                document.getElementById('PricePerMeeterError').innerHTML= "" +
                    "قیمت هر متر " +
                    PricePerMeeter+
                    " تومان";
            } // if the area is not valid ask the user to insert a valid one
            else {
                document.getElementById('PricePerMeeterError').innerHTML= "لطفا مساحت ملک را وارد کنید" ;
            }
        }// if the price is not valid ask user to insert a valid one
        else {
            document.getElementById('PricePerMeeterError').innerHTML= "لطفا قیمت ملک را وارد کنید" ;
        }

    }
    // this function gets the Deal number from html and return deal form to specified section
    function DealFormBuilder() {
        // get deal type value
        var DealType = document.getElementById('DealType').value;
        // finding deal object
        var Deal = GetObject('D'+DealType);
        // storing deal form
        var DealForm = "";
        // loop throw deal object and add inputs to the form string
        for (var i in Deal){
            switch (Deal[i]['type']){
                case 'Number':{
                    DealForm += "" +
                        NumberBuilder(
                            Deal[i]['label'],
                            Deal[i]['min'],
                            Deal[i]['max'],
                            Deal[i]['id']
                        )+
                        "" +
                        "";
                    break;
                }
                case 'Option':{
                    DealForm += "" +
                        OptionBuilder(
                            Deal[i]['label'],
                            Deal[i]['options'],
                            Deal[i]['id']
                        )+
                        "";
                    break;
                }
            }
        }
        // adding price per meeter html place if we have some
        if (DealType === '1' || DealType === '2') {
            DealForm += "" +
                "<div class=\"col-12\" id=\"\">\n" +
                "<p></p>\n" +
                "</div>" +
                ""+
                "<div class='col-12 Border' id='PricePerMeeterBorder'>" +
                "<div class='col badge-secondary text-right Options Error' onclick=\"PricePerMeeterCalculate('Price')\"  id='PricePerMeeterError'>هنوز تغییر ایجاد نشده</div>" +
                "</div>" +
                "</div>" +
                "<div class=\"col-12\" id=\"\">\n" +
                "<p></p>\n" +
                "</div>" +
                "";
        }
        // insert the prepared form to the html
        document.getElementById('DealForm').innerHTML = DealForm;
    }
    // this function gets the deal name and return the posible deals for this kind of property to the specific section
    function DealBuilder(DealTypeName) {
        // storing the Deal type
        DealTypeName = DealType[DealTypeName];
        // storing options and add a not selected item
        var options = "<option value='NOT'>انتخاب کنید</option>";
        // loop throw options and add them to the Option variable
        for(var key in DealTypeName){
            var Html1 = "" +
                "<option value=\"" +
                key +
                "\">" +
                DealTypeName[key] +
                "</option>" +
                "";
            options = options + Html1;
        }
        // build an select input and add its options
        var Deal = " " +
            "<div class='col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth Border'  id=''>" +
            "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth badge-secondary  Options Label text-center' >لطفا نوع معامله را انتخاب کنید</div>" +
            "<select name='DealName' class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth custom-select custom-select-lg Input text-center'  id='DealType' onchange='DealFormBuilder()'>" +
            options+
            "</select>" +
            "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth badge-secondary text-right Options Error text-center'  id='Error'>برای شروع نوع معامله را انتخاب کنید</div>" +
            "</div>";
        // return the prepard string
        return Deal;

    }
    // this function gets the property name and return the property input items form as string
    function PropertyFormBuilder(Property) {
        // find the selected property object
        Property = GetObject(Property);
        // storing the property form
        PropertyForm = "";
        // loop throw propert and add its items to form variable
        for (var i in Property) {
            switch (Property[i]['type']) {
                case 'Number': {
                    PropertyForm += "" +
                        NumberBuilder(
                            Property[i]['label'],
                            Property[i]['min'],
                            Property[i]['max'],
                            Property[i]['id']
                        ) +
                        "";
                    break;
                }
                case 'Option': {
                    PropertyForm += "" +
                        OptionBuilder(
                            Property[i]['label'],
                            Property[i]['options'],
                            Property[i]['id']
                        ) +
                        "";
                    break;
                }
                case 'Address': {
                    PropertyForm += "" +
                        AddressBuilder(
                            Property[i]['label'],
                            Property[i]['id']
                        ) +
                        "";
                    break;
                }
                case 'Description': {
                    PropertyForm += "" +
                        DescriptionBuilder(
                            Property[i]['label'],
                            Property[i]['id']
                        ) +
                        "";
                    break;
                }
            }
        }
        // return the prepared string
        return PropertyForm;
    }
    // this function gets the label and id and return an address input as string
    function AddressBuilder(label, id) {
        // add the id and label to the string we need for input
        var Html = "" +
            "<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth Border\"  id='" + id + "Border'>\n" +
            "<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth badge-secondary  Options Label text-center\"  id='" + id + "Label'>" + label + "</div>\n" +
            "<textarea name='"+id+"Name' maxlength='200' placeholder='ادرس را وارد کنید'  class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth custom-select custom-select-lg text-center Input\" style=\"width: 100%;height: 200px\" id=\"" +
            id +
            "Input\" onblur=\"AddressValidate('" + id + "')\"  onchange=\"AddressValidate('" + id + "')\">\n" +
            "</textarea>\n" +
            "<div class='col-12 badge-secondary text-center Options Error'  id='" + id + "Error'>هنوز تغییر ایجاد نشده</div>" +
            "</div>" +
            "<div class=\"col-12\" id=\"\">\n" +
            "<p></p>\n" +
            "</div>" +
            "";
        return Html;
    }
    // this function gets the specific address input id and checks if it is valid if so changes its color to red or green
    function AddressValidate(id) {
        // get the passed id inserted text value
        var Text = document.getElementById(id + 'Input').value;
        Text = Text.trim();
        // check if it is not empty
        if (Text === '') {
            // tell the user it must have some string
            document.getElementById(id + 'Error').innerHTML = 'این فیلد نمی تواند خالی باشد';
            // change their color to red
            ChangeNumberColor('danger', id);
        }// tell the user they are correct
        else {
            document.getElementById(id + 'Error').innerHTML = 'ادرس در این فیلد وارد شده';
            // change the color to green
            ChangeNumberColor('success', id);
        }
    }
    // this function gets label and id and return a description input as string
    function DescriptionBuilder(label, id) {
        var Html = "" +
            "<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth Border\"  id='" + id + "Border'>\n" +
            "<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth badge-secondary  Options Label text-center \"  id='" + id + "Label'>" + label + "</div>\n" +
            "<textarea name='"+id+"Name'  maxlength='200' placeholder='توضیحات خود را وارد کنید'  class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth custom-select custom-select-lg text-center Input\" style=\"width: 100%;height: 200px\" id=\"" +
            id +
            "Input\" onblur=\"DescriptionValidate('" + id + "')\"  onchange=\"DescriptionValidate('" + id + "')\">\n" +
            "</textarea>\n" +
            "<div class='col-12 badge-secondary text-center Options Error'  id='" + id + "Error'>در صورت نیاز توضیحات را وارد کنید</div>" +
            "</div>" +
            "<div class=\"col-12\" id=\"\">\n" +
            "<p></p>\n" +
            "</div>" +
            "";
        return Html;
    }
    // this function gets a description input id and validates it and changes its color to green and gray
    function DescriptionValidate(id) {
        // get the value that needs to validation
        var Text = document.getElementById(id + 'Input').value;
        Text = Text.trim();
        // check if it is not empty
        if (Text === '') {
            // tell the user to insert some if needed and change the color to gray
            document.getElementById(id + 'Error').innerHTML = 'در صورت نیاز توضیحات را وارد کنید';
            ChangeNumberColor('secondary', id);
        }
        else {
            // tell the user it is inserted and change the color to green
            document.getElementById(id + 'Error').innerHTML = 'توضیحات در این فیلد وارد شده';
            ChangeNumberColor('success', id);
        }
    }
    // this function gets label and min and max and id  and returns a numaric input as text
    function NumberBuilder(label, min, max, id) {
        // get the values and insert them into needed places
        var Html = "" +
            "<div class=\"col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 FullWidth\">" +
            "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth Border' id='" + id + "Border'>" +
            "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth badge-secondary text-right Options Label text-center' id='" + id + "Label'  >" + label + "</div>" +
            "<input class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth form-control form-control-lg text-right Input text-center\"  type=\"text\" placeholder=" +
            "\"" +
            "لطفا عدد بین " +
            min +
            " تا " +
            max +
            " وارد کنید" +
            "\"" +
            "" +
            " name='" + id + "Name' id=\"" + id + "Input\" onblur=\"NumberValidate(" + min + "," + max + ",'" + id + "')\" >\n" +
            "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth badge-secondary text-right Options Error text-center'  id='" + id + "Error'>هنوز تغییر ایجاد نشده</div>" +
            "</div>" +
            "</div>" +
            "</div>" +

            "</div>" +
            "</div>" +
            "";
        return Html;
    }
    // this function gets min max and id from specific numeric input and checks if it is valid and changes the color to red or green
    function NumberValidate(min, max, id) {
        // get the number from passed id
        var Number = document.getElementById(id + 'Input').value;
        // get the error DOM object from passed id
        var Error = document.getElementById(id + 'Error');
        // check if the value is empty
        if (Number.trim() === '') {
            Error.innerHTML = '' +
                'این فیلد باید عدد و بین' +
                ' ' + min + ' ' +
                'تا' +
                ' ' + max + ' ' +
                'باشد';
            // tell the user and change color to red
            ChangeNumberColor('danger', id);
            document.getElementById(id + 'Input').value = "";
        }
        else {
            // check if the value is in the object range
            if (Number >= min && Number <= max) {
                // tell the user it is correct and change the color to red
                Error.innerHTML = '' +
                    'اطلاعات این فیلد درست است';
                ChangeNumberColor('success', id);
            }
            else {
                Error.innerHTML = '' +
                    'این فیلد باید عدد و بین' +
                    ' ' + min + ' ' +
                    'تا' +
                    ' ' + max + ' ' +
                    'باشد';
                // tell the user and change the color to red
                ChangeNumberColor('danger', id);
                document.getElementById(id + 'Input').value = "";
            }
        }
    }
    // this function gets label and name of options and id and returns an option input as string
    function OptionBuilder(label, options, id) {
        // storing the default value
        var option = "<option value='NOT'>انتخاب کنید</option>";
        // finding the options by their name
        options = OptionsArr[options];
        // loop throw options and add them
        for (var key in options) {
            var Html1 = "" +
                "<option value=\"" +
                key +
                "\">" +
                options[key] +
                "</option>" +
                "";
            option = option + Html1;
        }
        // insert the prepared valuse to the html string
        var Html = "" +
            "<div class=\"col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 FullWidth\">" +
            "<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth Border\"  id='" + id + "Border'>\n" +
            "<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth badge-secondary text-right Options Label text-center\"  id='" + id + "Label'>" + label + "</div>\n" +
            "<select name='"+id+"Name' class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth custom-select custom-select-lg text-right Input text-center\"  id=\"" +
            id +
            "Input\" onchange=\"OptionValidate('" + id + "')\" onblur=\"OptionValidate('" + id + "')\">\n" +
            option +
            "</select>\n" +
            "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth badge-secondary text-right Options Error text-center'  id='" + id + "Error'>هنوز تغییر ایجاد نشده</div>" +
            "</div>" +
            "<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth\" id=\"\">\n" +
            "<p></p>\n" +
            "</div>" +
            "</div>" +
            "";
        // rturn the prepared string
        return Html;
    }
    // this function gets an option id and checks if it is validate and changes its color to red and green
    function OptionValidate(id) {
        // storing the option value
        var Option = document.getElementById(id + 'Input').value;
        // storing thr error DOM object
        var Error = document.getElementById(id + 'Error');
        // if option is not ok
        if (Option === 'NOT') {
            // tell the user to selec a valid one and change the color to red
            Error.innerHTML = 'لطفا مجددا یکی از موارد را انتخاب کنید';
            ChangeNumberColor('danger', id);
        }
        else {
            // tell the user options are ok
            Error.innerHTML = 'این مورد انتخاب شده است';
            ChangeNumberColor('success', id);
        }
    }
    // this function gets a color name and id for specific input and changes its color to the passed color
    function ChangeNumberColor(Color, id) {
        // gets the DOM objects for the things we want to change their color
        var Border = document.getElementById(id + 'Border');
        var Label = document.getElementById(id + 'Label');
        var Input = document.getElementById(id + 'Input');
        var Error = document.getElementById(id + 'Error');
        // switch betwwen colors and omit the curent color and add new one
        switch (Color) {
            case 'danger': {
                if (Label.classList.contains('badge-secondary')) {
                    Label.classList.remove('badge-secondary');
                    Label.classList.add('badge-danger');
                    Error.classList.remove('badge-secondary');
                    Error.classList.add('badge-danger');
                }
                if (Label.classList.contains('badge-success')) {
                    Label.classList.remove('badge-success');
                    Label.classList.add('badge-danger');
                    Error.classList.remove('badge-success');
                    Error.classList.add('badge-danger');
                }
                Input.style.borderColor = '#dc3545';
                Border.style.borderColor = "#dc3545";
                break;
            }
            case 'success': {
                if (Label.classList.contains('badge-secondary')) {
                    Label.classList.remove('badge-secondary');
                    Label.classList.add('badge-success');
                    Error.classList.remove('badge-secondary');
                    Error.classList.add('badge-success');
                }
                if (Label.classList.contains('badge-danger')) {
                    Label.classList.remove('badge-danger');
                    Label.classList.add('badge-success');
                    Error.classList.remove('badge-danger');
                    Error.classList.add('badge-success');
                }
                Input.style.borderColor = '#28a745';
                Border.style.borderColor = "#28a745";
                break;
            }
            case 'secondary': {
                if (Label.classList.contains('badge-success')) {
                    Label.classList.remove('badge-success');
                    Label.classList.add('badge-secondary');
                    Error.classList.remove('badge-success');
                    Error.classList.add('badge-secondary');
                }
                if (Label.classList.contains('badge-danger')) {
                    Label.classList.remove('badge-danger');
                    Label.classList.add('badge-secondary');
                    Error.classList.remove('badge-danger');
                    Error.classList.add('badge-secondary');
                }
                Input.style.borderColor = '#6c757d';
                Border.style.borderColor = "#6c757d";
                break;
            }

        }
    }
    // this function checks all the inputs validation and write them down whit red or green and if all of them are corect lets the user to submit values
    function Validator() {
        // get the DOM validate div objest for inserting value
        var Validate = document.getElementById('Validate');
        // get the currenrt property value
        var Property = document.getElementById('PropertySelecting').value;
        // get the current deal value
        var Deal     = document.getElementById('DealType').value;
        // storing the result html
        var Html     = "";
        // if the property is valid
        if(Property != 'NOT') {
            // if the deal is valid
            if(Deal != 'NOT'){
                // defining validation flag
                var valid = true;
                // get the property object by inserting its number
                Property = GetObject('P'+Property);
                // set the result validation
                var PropertyValid = [];
                // loop throw properties for validation and store result in array
                for(var i in Property){
                    // finding the current input value
                    var Value = document.getElementById(Property[i]['id']+'Input').value;
                    // finding if the current value is correct and insert ite result in array
                    switch(Property[i]['type']){
                        case 'Number':{
                            if(Value >= Property[i]['min'] &&
                                Value <= Property[i]['max'] &&
                                Value != ''
                            ){
                                PropertyValid.push(1);
                            }
                            else {
                                PropertyValid.push(0);
                            }
                            break;
                        }
                        case 'Option':{
                            if(Value === 'NOT'){
                                PropertyValid.push(0);
                            }
                            else {
                                PropertyValid.push(1);
                            }
                            break;
                        }
                        case 'Address':{
                            Value = Value.trim();
                            if (Value === ''){
                                PropertyValid.push(0);
                            }
                            else {
                                PropertyValid.push(1);
                            }
                            break;
                        }
                        case 'Description':{
                            PropertyValid.push(1);
                            break;
                        }
                    }
                }
                // get the deal object
                Deal = GetObject('D'+Deal);
                // set the result validation
                var DealValid = [];
                // loop throw deal object and checks the validation
                for(var i in Deal){
                    // finding the current deal input value
                    var Value = document.getElementById(Deal[i]['id']+'Input').value;
                    switch(Deal[i]['type']){
                        case 'Number':{
                            if(Value >= Deal[i]['min'] &&
                                Value <= Deal[i]['max'] &&
                                Value !== ""
                            ){
                                DealValid.push(1);
                            }
                            else {
                                DealValid.push(0);
                            }
                            break;
                        }
                        case 'Option':{
                            if(Value === 'NOT'){
                                DealValid.push(0);
                            }
                            else {
                                DealValid.push(1);
                            }
                            break;
                        }
                        case 'Address':{
                            Value = Value.trim();
                            if (Value === ''){
                                DealValid.push(0);
                            }
                            else {
                                DealValid.push(1);
                            }
                            break;
                        }
                        case 'Description':{
                            DealValid.push(1);
                            break;
                        }
                    }
                }
                // loop throw validation arrays and if find some invalid make the flag false
                for(var i in PropertyValid){
                    if(PropertyValid[i] === 0){
                        valid = false;
                    }
                }
                for(var i in DealValid){
                    if(DealValid[i] === 0){
                        valid = false;
                    }
                }
                // loop throw properties and set labels and values into section provided
                for(var i in Property){
                    // find the input
                    var Input = document.getElementById(Property[i]['id']+'Input').value;
                    // find the label
                    var Label = Property[i]['label'];
                    var Color = "";
                    // if the current value is valid
                    if (PropertyValid[i]){
                        // if the type is option find its value
                        if(Property[i]['type'] === 'Option'){
                            var option = Property[i]['options'];
                            Input = OptionsArr[option][Input];
                        }
                        Color = "green";
                    } // if the current value is not valid
                    else {
                        Input = "لطفا داده درست را وارد کنید";
                        Color = "red";
                    }
                    // add the needed information to html template

                    var iid ='#'+Property[i]['id']+'Border';
                    Html += "" +
                        "<div class='col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth Border' style='border-color:"+Color+"' id=''>" +
                        "<a class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 \" href='"+iid+"' >"+
                        "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center  text-right Options Input' style='color:"+Color+";border-color:"+Color+"'   id=''>"+Label+"</div>" +
                        "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center  text-right Options Input' style='color:"+Color+";border-color:"+Color+"'  id=''>"+Input+"</div>" +
                        "</a>" +
                        "</div>" +

                        "";
                }
                // loop throw deal values
                for(var i in Deal){
                    // get the current deal input value
                    var Input = document.getElementById(Deal[i]['id']+'Input').value;
                    // get the current deal label
                    var Label = Deal[i]['label'];
                    // storing color
                    var Color = "";
                    // if the current deal is valid
                    if (DealValid[i]){
                        // if the current deal is option find its value
                        if(Deal[i]['type'] === 'Option'){
                            var option = Deal[i]['options'];
                            Input = OptionsArr[option][Input];
                        }
                        Color = "green";
                    } else {
                        Input = "لطفا داده درست را وارد کنید";
                        Color = "red";
                    }
                    // add the values to html string
                    Html += "" +


                        "<div class='col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth Border' style='border-color:"+Color+"' id=''>" +
                        "<a class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth\" href='#"+Deal[i]['id']+"Border'>"+
                        "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  text-center Options Input' style='color:"+Color+";border-color:"+Color+"'   id=''>"+Label+"</div>" +
                        "<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  text-center Options Input' style='color:"+Color+";border-color:"+Color+"'   id=''>"+Input+"</div>" +
                        "</a>"+
                        "</div>" +
                        "";
                }
                // storing the submit activation status
                var status = "";
                // if hole the items are valid set active to status
                if (valid) {
                    status = "active";
                } // if not set deactive to status
                else {
                    status = "disabled";
                }
                // add the submit button to html
                Html += "" +
                    "<div class=\"col-12\" id=\"\">\n" +
                    "<p></p>\n" +
                    "</div>" +
                    "<input type=\"submit\" value='ثبت اطلاعات' class=\"btn btn-primary btn-block "+
                    status+
                    "\" style=\"font-size: 50px\" onsubmit=\"return Validator()\">" +
                    "";
                // insert the values to the specific section provided
                Validate.innerHTML = Html;
                for(var q = 1;q<= PicNumber;q++){
                    var PicName = 'pic'+q;
                    var PicPath = document.getElementsByName(PicName);
                    PicPath=PicPath[0].value
                    if (PicPath === null || PicPath == ''){
                        valid = false;
                    }
                }
                // if all the items are valid return true to on submit
                if (valid) {
                    return true;
                }// if not return false
                else {
                    return false;
                }

            }
        }
    }



</script>
{{--</functions>--}}
<script>
    var PicNumber = 1;
    function AddPicture() {
        var PicInputs = document.getElementById('PictureHolder');
        PicNumber++;
        var Html = "" +
            "<div class=\"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row flex-row-reverse FullWidth text-center\" id='Pic"+PicNumber+"' >\n" +
            "<input class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth Input\" type=\"file\" name=\"pic"+PicNumber+"\" >\n" +
            "</div>" +
            "";
        PicInputs.innerHTML += Html;

        document.getElementById('PicNumber').innerText = PicNumber;
        document.getElementById('PicNumHidden').value = PicNumber;
    }
    function OmitPicture() {
        if(PicNumber > 1){
            var Input = document.getElementById('Pic'+PicNumber);
            Input.remove();
            PicNumber--;
            document.getElementById('PicNumber').innerText = PicNumber;
            document.getElementById('PicNumHidden').value = PicNumber;
        }

    }
</script>
@endsection

