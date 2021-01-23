@extends('Site.parent')
@section('style')
    {{--    <mainStyle>--}}
    {{--    <FormMenu>--}}
    <style>
        .FormMenu{
            text-align: center;
            align-content: center;
            border-radius:  100px 0 0 0;
            border: 1px solid gold;
            border-top: 10px solid gold;
            border-right: 10px solid gold;
            padding-right: 15px;
            padding-left: 15px;
            color: gold;
            background-color: #333;
            text-blink: none;
            text-decoration: none;
            -webkit-appearance: none;  /* Override default CSS styles */
            appearance: none;
            font-size: 20px;
            animation-name: ComeFromLeft;
            animation-duration: 4s;

        }
        .FormMenuUnChange{
            border-radius:  100px 0 0 0;
            border: 1px solid gold;
            border-top: 10px solid gold;
            border-right: 10px solid gold;
            color: gold;
            background-color: #333;

        }
        .FormMenuWrong{
            border-radius:  100px 0 0 0;
            border: 1px solid red;
            border-top: 10px solid red;
            border-right: 10px solid red;
            color: red;
            background-color: #333;

        }
        .FormMenuRight{
            border-radius:  100px 0 0 0;
            border: 1px solid green;
            border-top: 10px solid green;
            border-right: 10px solid green;
            color: green;
            background-color: #333;

        }

    </style>
    {{--    </FormMenu>--}}
    <style>
        .FontBlack{
            color: black;
        }
        .FormTransition{
            animation-name: ComeFromBottom;
            animation-duration: 4s;
        }
    </style>
    {{--<pagination>--}}
    <style>
        .pagination{

        }
        .page-item{
            background-color: gold;
            color: black;
        }
        .page-link{
            background-color: gold;
            color: black;
        }
        nav{

        }
    </style>
    {{--</pagination>--}}
{{--    A tag--}}
    <style>
        a {
            display: block;
            text-blink: none;
            text-decoration: none;
            -webkit-appearance: none;  /* Override default CSS styles */
            appearance: none;
            width: 100%;
        }
    </style>
{{--    /A tg--}}
    {{--    </mainStyle>--}}
{{--<SearchStyle>--}}

@endsection
@section('body')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" style="">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" >
            <h1>جستجو در املاک</h1>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth FormTransition">
            <form class=" FullWidth row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse" action="{{route('Searching')}}" onsubmit="">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse flex-row-reverse FullWidth">
                    <!-- property type-->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 text-center" id="PropertySearch">
                        <label class="FormLabel">نوع ملک</label>
                        <select class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange" id="PropertyInput" name="Property" onchange="AfterPropertySelection()">
                            <option value="0" selected>انتخاب کنید</option>
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
                    </div>
                    <!-- deal type-->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 text-center" id="DealSearch">

                    </div>
                    <!-- price range -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 text-center" id="PriceRangeSearch">

                    </div>
                    <!-- price order -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 text-center" id="PriceOrderSearch">

                    </div>
                    <!-- Neighbourhood -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 text-center" id="NeighbourhoodSearch">

                    </div>
                    <!-- Area -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 text-center" id="AreaSearch">

                    </div>
                    <!-- Room Number -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  text-center" id="RoomNumberSearch">

                    </div>
                    <!-- Rent -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  text-center" id="RentSearch">

                    </div>
                    <!-- PreRent -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  text-center" id="PreRentSearch">

                    </div>
                    <!-- submit -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 text-center FullWidth" id="SubmitSearch">

                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
                    <p></p>
                </div>
            </form>
        </div>
    </div>
{{--        <hr class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth"  style="background-color: gold;height: 20px">--}}
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse FullWidth text-center" style="background-color: gold;font-size: 20px;padding-bottom: 5px">
{{--        Search Label--}}
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 FullWidth" style="color: black">
            : مورد جستجو
        </div>
{{--        Searched Property--}}
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 FullWidth" style="color: black">
            {{$SearchedPersian['PProperty']}}
        </div>
{{--        Searced Deal--}}
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 FullWidth" style="color: black">
            {{$SearchedPersian['PDeal']}}
        </div>
{{--        Search PriceRange--}}
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 FullWidth" style="color: black">
            {{$SearchedPersian['PPriceRange']}}
        </div>
{{--        Search PriceOrder--}}
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 FullWidth" style="color: black">
            {{$SearchedPersian['PPriceOrder']}}
        </div>
        {{--        Search RoomNumber--}}
        @if(isset($SearchedPersian['PRoomNumber']))
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 FullWidth" style="color: black">
            تعداد اتاق {{$SearchedPersian['PRoomNumber']}}
        </div>
        @endif
        {{--        Search Area--}}
        @if(isset($SearchedPersian['PArea']))
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 FullWidth" style="color: black">
                {{$SearchedPersian['PArea']}}
            </div>
        @endif
{{--        Page--}}
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 FullWidth" style="color: black">
            @if(Count($PropertyInfos)>0)
            {{$SearchedPersian['PageNumber']}} ص
            @endif
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
        <p></p>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" >
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
            @if(!(Count($PropertyInfos)>0))
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center" style="font-size: 40px">
                    <p>هیچ موردی برای درخواست شما پیدا نشد</p>
                </div>
            @else
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse FullWidth" >
                    @foreach($PropertyInfos as $PropertyInfo)
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse FullWidth" style="border: 10px solid gold">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 FullWidth">
                                {{--                        {{$PropertyInfo['photoPath']}} todo add photo path--}}
                                <img class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" src="{{$PropertyInfo['photoPath']}}"  style="width: 100%;height: 300px" >
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 row FullWidth">
{{--                                AD Code--}}
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                        {{$PropertyInfo['Id']}}
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                        کد اگهی
                                    </div>
                                </div>
{{--                                Property Persian --}}
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                        {{$PropertyInfo['PropertyPersian']}}
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                        نوع ملک
                                    </div>
                                </div>
{{--                                Deal Persian --}}
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                        {{$PropertyInfo['DealPersian']}}
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                        برای
                                    </div>
                                </div>
{{--                                Deal --}}
                                @switch($PropertyInfo['DealType'])
                                    @case(1)@case(2)
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['Price']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            قیمت
                                        </div>
                                    </div>
                                    @break
                                    @case(3)
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['PreRent']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            ودیعه
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['Rent']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            اجاره
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            @if($PropertyInfo['Changeable'])
                                                هست
                                            @else
                                                نیست
                                            @endif
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            قابل تبدیل
                                        </div>
                                    </div>
                                    @break
                                    @case(4)
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['PreRent']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            ودیعه
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['Rent']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            اجاره
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['Month']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            ماه
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            @if($PropertyInfo['Changeable'])
                                                هست
                                            @else
                                                نیست
                                            @endif
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            قابل تبدیل
                                        </div>
                                    </div>
                                    @break
                                @endswitch
{{--                                RoomNumber--}}
                                @if(isset($PropertyInfo['Room']))
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['Room']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            تعداد اتاق
                                        </div>
                                    </div>
                                @endif
{{--                                Area--}}
                                @if(isset($PropertyInfo['Area']))
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                        {{$PropertyInfo['Area']}}
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                         مساحت کل
                                    </div>
                                </div>
                                @endif
{{--                            Foundation Area--}}
                                @if(isset($PropertyInfo['FoundationArea']))
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['FoundationArea']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            مساحت زیر بنا
                                        </div>
                                    </div>
                                @endif
{{--                                 Balcony Area--}}
                                @if(isset($PropertyInfo['BalconyArea']))
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['BalconyArea']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            مساحت بالکن
                                        </div>
                                    </div>
                                @endif
{{--                                Floor Area--}}
                                @if(isset($PropertyInfo['FloorArea']))
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['FloorArea']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            مساحت کف
                                        </div>
                                    </div>
                                @endif
{{--                                Bar--}}
                                @if(isset($PropertyInfo['Bar']))
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['Bar']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            بر
                                        </div>
                                    </div>
                                @endif
{{--                                Gozar--}}
                                @if(isset($PropertyInfo['Gozar']))
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['Gozar']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            گذر
                                        </div>
                                    </div>
                                @endif
{{--                                Construction year--}}
                                @if(isset($PropertyInfo['ConstructionYear']))
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-right">
                                            {{$PropertyInfo['ConstructionYear']}}
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                                            سال ساخت
                                        </div>
                                    </div>
                                @endif
{{--                                Address--}}
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth text-center">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-right">
                                        {{$PropertyInfo['Address']}} ادرس
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center" style="padding: 10px">
                                    <a class="btn btn-warning" href="{{$PropertyInfo['PropertyLink']}}">
                                        دیدن اطلاعات کامل
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12  FullWidth">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
                                    مشاور این ملک
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  FullWidth">
                                    <img class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" src="Logo.jpeg" style="width: 100%;height: 150px">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
                                    {{$PropertyInfo['AdvisorName']}}
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
                                    {{$PropertyInfo['AdvisorPhone']}}
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
                                    <a class="btn btn-success" href="{{$PropertyInfo['AdvisorLink']}}">
                                        اطلاعات مشاور
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
                            <p></p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center d-flex justify-content-center">
            {{$Pager->Links()}}
        </div>
    </div>
@endsection
@section('script')
{{--<Objects>--}}
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
</script>
{{--</Objects>--}}
{{--<SearchOptions>--}}
<script>
    function AddArea() {
        var Html;
        Html = "" +
            "<label class=\"FormLabel\">مساحت</label>\n" +
            "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name=\"Area\">\n" +
            "<option value=\"0\" selected>تمامی متراژها</option>\n" +
            "<option value=\"1\">از بیست تا هفتادوپنج</option>\n" +
            "<option value=\"2\">از هفتادوپنج تا صدوبیست</option>\n" +
            "<option value=\"3\">بیشتر از صدوبیست</option>\n" +
            "</select>" +
            "";
        document.getElementById('AreaSearch').innerHTML = Html;
    }
    function AddRoomNumber() {
        var Html;
        var Options;
        for(var i = 1;i<=20;i++){
            Options +="<option value="+i+">"+i+"</option>\n"
        }
        Html = "" +
            "<label class=\"FormLabel\">تعداد اتاق</label>\n" +
            "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name=\"RoomNumber\">\n" +
            "<option value=\"0\" selected>مهم نیست</option>\n" +
            "<option value=\"1\" selected>1</option>\n" +
            "<option value=\"2\" selected>2</option>\n" +
            "<option value=\"3\" selected>3</option>\n" +
            "<option value=\"4\" selected>4</option>\n" +
            "<option value=\"5\" selected>بیشتر از چهار</option>\n" +
            //Options+
            "</select>" +
            "";
        document.getElementById('RoomNumberSearch').innerHTML = Html;
    }
    function AddNeighbourhood() {
        var Html = "" +
            "<label class=\"FormLabel\">محله</label>\n" +
            "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name=\"Neighbourhood\">\n" +
            "<option value=\"0\" selected>کل شیراز</option>\n" +
            @foreach($Neighbourhood as $Item)
            "<option value=\"{{$Item->id}}\">{{$Item->name}}</option>\n" +
            @endforeach
            "</select>" +
            "";
        document.getElementById('NeighbourhoodSearch').innerHTML = Html;
    }
    function AddPriceRange() {
        var Html = "" +
            "<label class=\"FormLabel\">محدوده قیمت</label>\n" +
            "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name=\"PriceRange\">\n" +
            "<option value=\"0\">تمامی قیمت ها</option>\n" +
            "<option value=\"1\">میلیون 0-100</option>\n" +
            "<option value=\"2\">میلیون 100-300</option>\n" +
            "<option value=\"3\">میلیون 300-600</option>\n" +
            "<option value=\"4\">600-1 میلیارد</option>\n" +
            "<option value=\"5\">میلیارد  1-1.5</option>\n" +
            "<option value=\"6\">میلیارد  1.5-2</option>\n" +
            "<option value=\"7\">میلیارد  2-2.5</option>\n" +
            "<option value=\"8\">میلیارد  2.5-3</option>\n" +
            "<option value=\"9\">میلیارد  3-4</option>\n" +
            "<option value=\"10\">میلیارد  4-5</option>\n" +
            "<option value=\"11\">میلیارد  5-6</option>\n" +
            "<option value=\"12\">میلیارد به بالا 6 </option>\n" +
            "</select>" +
            "";
        document.getElementById('PriceRangeSearch').innerHTML = Html;
    }
    function AddPriceOrder() {
        var Html = "" +
            "<label class=\"FormLabel\">قیمت از</label>\n" +
            "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name=\"PriceOrder\">\n" +
            "<option value=\"1\" selected>بیشترین به کمترین</option>\n" +
            "<option value=\"2\">کمترین به بیشترین</option>\n" +
            "</select>" +
            "";
        document.getElementById('PriceOrderSearch').innerHTML = Html;
    }
    function AddSubmit() {
        var Html = "" +
            "<div class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  form-group text-right\" style=\"padding: 30px\">\n" +
            "<input class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 btn FormMenu FormMenuUnChange\" value=\"جستجو\" type=\"submit\" onsubmit=\"return Validate()\" id=\"SubmitInput\">\n" +
            "</div>" +
            "";
        document.getElementById('SubmitSearch').innerHTML = Html;
    }
    function AfterPropertySelection() {
        var Property = document.getElementById('PropertyInput').value;
        document.getElementById('RentSearch').style.display = 'none';
        document.getElementById('PreRentSearch').style.display = 'none';
        switch (Property) {
            case '1':
            case '3':
            case '5':
            case '9':{
                document.getElementById('AreaSearch').style.display = '';
                document.getElementById('RoomNumberSearch').style.display = '';
                SetDeal();
                AddPriceRange();
                AddPriceOrder();
                AddArea();
                AddRoomNumber();
                AddNeighbourhood();
                AddSubmit();
                break;
            }
            case '2':
            case '4':
            case '6':
            case '7':
            case '8':
            case '10':{
                SetDeal();
                AddPriceRange();
                AddPriceOrder();
                AddNeighbourhood();
                AddSubmit();
                document.getElementById('AreaSearch').innerHTML = "";
                document.getElementById('AreaSearch').style.display = 'none';

                document.getElementById('RoomNumberSearch').innerHTML = "";
                document.getElementById('RoomNumberSearch').style.display = 'none';
                break;
            }
        }
    }

    function AddRent() {
        var Html;
        Html = "" +
            "<label class=\"FormLabel\">اجاره</label>\n" +
            "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name=\"Rent\">\n" +
            "<option value=\"0\" selected>تمامی قیمت ها</option>\n" +
            "<option value=\"1\">از بیست تا هفتادوپنج</option>\n" +
            "<option value=\"2\">از هفتادوپنج تا صدوبیست</option>\n" +
            "<option value=\"3\">بیشتر از صدوبیست</option>\n" +
            "</select>" +
            "";
        document.getElementById('RentSearch').innerHTML = Html;
    }
    function AddPreRent() {
        var Html;
        Html = "" +
            "<label class=\"FormLabel\">پیش پرداخت</label>\n" +
            "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name=\"PreRent\">\n" +
            "<option value=\"0\" selected>تمامی قیمت ها</option>\n" +
            "<option value=\"1\">از بیست تا هفتادوپنج</option>\n" +
            "<option value=\"2\">از هفتادوپنج تا صدوبیست</option>\n" +
            "<option value=\"3\">بیشتر از صدوبیست</option>\n" +
            "</select>" +
            "";
        document.getElementById('PreRentSearch').innerHTML = Html;
    }

    function AfterDealSelection() {
        var Deal = document.getElementById('DealInput').value;
        if (Deal === '3'){
            document.getElementById('RentSearch').style.display = '';
            document.getElementById('PreRentSearch').style.display = '';
            AddRent();
            AddPreRent();
        }
        else {
            document.getElementById('RentSearch').style.display = 'none';
            document.getElementById('PreRentSearch').style.display = 'none';
            document.getElementById('RentSearch').innerHTML = '';
            document.getElementById('PreRentSearch').innerHTML = '';
        }
    }
</script>
{{--</SearchOptions>--}}
{{--<ِDealInserting>--}}
<script>

    // this function gets the deal name and return the posible deals for this kind of property to the specific section
    function DealBuilder(DealTypeName) {
        // storing the Deal type
        DealTypeName = DealType[DealTypeName];
        // storing options and add a not selected item
        var options = "<option value='0'>تمامی انواع</option>";
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
            "<label class=\"FormLabel\">نوع معامله</label>\n" +
            "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name=\"Deal\" onchange='AfterDealSelection()' >\n" +
            options+
            "</select>"
        ;
        // return the prepard string
        return Deal;
    }
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
                return 'VillaGarden';
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

    function SetDeal() {
        var PropertyValue = document.getElementById('PropertyInput').value;
        var DealInsert = document.getElementById('DealSearch');
        if(PropertyValue ==='NOT'){
            DealInsert.innerHTML= "" +
                "<label class=\"FormLabel\">نوع معامله</label>\n" +
                "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name='Deal' onchange='AfterDealSelection()'>\n" +
                "<option value=\"0\">تمامی معاملات</option>\n" +
                "</select>" +
                "";
        }
        else{
            var n=GetPropertyName(PropertyValue);
            var str =DealBuilder(n);
            DealInsert.innerHTML= str;
        }
    }
</script>
{{--</ِDealInserting>--}}
{{--<setDefault>--}}
<script>

</script>
{{--</setDefault>--}}
    <script>
        // var na = document.getElementsByTagName('ul');
        // na[0].classList.add('col-xl-12');
        // na[0].classList.add('col-lg-12');
        // na[0].classList.add('col-md-12');
        // na[0].classList.add('text-center');
    </script>
@endsection
