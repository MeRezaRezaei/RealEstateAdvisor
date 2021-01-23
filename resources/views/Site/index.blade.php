@extends('Site.Parent')
@section('style')
{{--    <swiperStyle>--}}
    <style>
    .swiper-container {
        width: 100%;
        height: 300px;
    }
</style>
{{--    </swiperStyle>--}}
{{--    <cardPorofile>--}}
    <style>

        .card {
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
         max-width: 300px;
         margin: auto;
         text-align: center;
         background-color: #333;
        }
        .card img{
            border-radius: 100px 100px 100px 100px;
            border: 10px solid gold;
        }
        .title {
            color: gold;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: gold;
            background-color: #333;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover, a:hover {

        }
    </style>
{{--    </cardPorofile>--}}

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
            padding: 0px;
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
{{--    </mainStyle>--}}
@endsection
@section('body')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" style="">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" >
            <h1>جستجوی سریع</h1>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth FormTransition">
            <form class=" FullWidth row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse" action="{{route('Searching')}}" onsubmit="">
                <!-- property type-->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  form-group text-center" id="PropertySearch">
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
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  form-group text-center" id="DealSearch">

                </div>
                <!-- price range -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  form-group text-center" id="PriceRangeSearch">

                </div>
                <!-- price order -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  form-group text-center" id="PriceOrderSearch">

                </div>
                <!-- Neighbourhood -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  form-group text-center" id="NeighbourhoodSearch">

                </div>
                <!-- Area -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  form-group text-center" id="AreaSearch">

                </div>
                <!-- Room Number -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  text-center" id="RoomNumberSearch">

                </div>
                <!-- submit -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12  form-group text-center FullWidth" id="SubmitSearch">

                </div>
            </form>
        </div>
        <hr class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth"  style="background-color: gold;height: 20px">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
            <h1>جدید ترین املاک فروشی</h1>
        </div>
        <!--        <swiper>-->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

        <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <!--        </swiper>-->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse FullWidth">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth">
                                <img src="Logo.jpeg" style="width: 100%;height: 300px">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth text-center">
                                <p>اطلاعات ملک</p>
                                <p>ادرس</p>
                                <p>قیمت</p>
                                <p>نوع</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <hr class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth"  style="background-color: gold;height: 20px">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
            <h1>جدید ترین املاک اجاره ای</h1>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <hr class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth"  style="background-color: gold;height: 20px">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
            <h1>گروه مشاوران سبک نو</h1>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth">
                <div class="card">
                    <img src="Logo.jpeg" alt="John" style="width:100%">
                    <h1>فلان فلانی</h1>
                    <p class="title">مدیریت مجموعه ی سبک نو</p>
                    <p><button>درباره ی فلانی</button></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth">
                <div class="card">
                    <img src="Logo.jpeg" alt="John" style="width:100%">
                    <h1>فلان فلانی</h1>
                    <p class="title">مدیریت مجموعه ی سبک نو</p>
                    <p><button>درباره ی فلانی</button></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth">
                <div class="card">
                    <img src="Logo.jpeg" alt="John" style="width:100%">
                    <h1>فلان فلانی</h1>
                    <p class="title">مدیریت مجموعه ی سبک نو</p>
                    <p><button>درباره ی فلانی</button></p>
                </div>
            </div>
        </div>
        <hr class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth"  style="background-color: gold;height: 20px">
    </div>
@endsection
@section('script')
{{--<validation>--}}
{{--</validation>--}}
{{--<swiperInit>--}}
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            autoHeight: true, //enable auto height
            loop: true,
            autoplay: {
                delay: 10000,
            },
            // If we need pagination
            // pagination: {
            //     el: '.swiper-pagination',
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        })
    </script>
{{--<swiperInit>--}}
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
            Options+
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
        var Html = "";
        switch (Property) {
            case '1':
            case '3':
            case '5':
            case '9':{
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
                document.getElementById('RoomNumberSearch').innerHTML = "";
                break;
            }
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
            "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name=\"Deal\" >\n" +
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
    function SetDeal() {
        var PropertyValue = document.getElementById('PropertyInput').value;
        var DealInsert = document.getElementById('DealSearch');
        if(PropertyValue ==='NOT'){
            DealInsert.innerHTML= "" +
                "<label class=\"FormLabel\">نوع معامله</label>\n" +
                "<select class=\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth  form-control FormMenu FormMenuUnChange\" id=\"DealInput\" name='Deal'>\n" +
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
    $(document).ready(() => {
        $("#PropertyInput").val('0');
    });
</script>
{{--</setDefault>--}}
@endsection
