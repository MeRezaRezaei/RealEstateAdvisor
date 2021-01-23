<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta dir="rtl" >
    <title>مشاور املاک سبک نو</title>
    <!--<loading bootstrap from cdn>-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--</loading bootstrap from cdn>-->
    <!--<loading font-awesome from cdn>-->
    <script src="https://kit.fontawesome.com/33d42cfb1e.js" crossorigin="anonymous"></script>
    <!--</loading font-awesome from cdn>-->
{{-- loading more cdn libs if needed   --}}
    @yield('CDNLib')
{{--    styles--}}
    {{--<animation>--}}
    <style>
        @keyframes ComeFromLeft {
            from {
                left: 1000px;

            }
            to {left:0px}
        }
        @keyframes ComeFromRight {
            from {
                right: 1000px;

            }
            to {right:0px}
        }
        @keyframes ComeFromTop {
            from {
                bottom: 1000px;

            }
            to {bottom:0px}
        }
        @keyframes ComeFromBottom {
            from {
                top: 1000px;

            }
            to {top:0px}
        }
    </style>
    {{--</animation>--}}
    {{--<HeaderFooterStyle>--}}
    <style>
        body{
            color: gold;
            overflow-x: hidden;
            background-color: #333;
        }
        label{
            font-size: 20px;
        }
        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
            cursor: pointer;
        }
        .FullWidth {
                     border: 0;
                     padding: 0;
                     margin: 0;
                     width: 100%;
                 }
        .Logo{
            animation-name: ComeFromTop;
            animation-duration: 4s;
        }
        .Navigation{
            overflow: hidden;
            background-color: #333;
            /*position: fixed; /*    Set the navbar to fixed position */
            top: 0px; /* Position the navbar at the top of the page */
            width: 100%; /* Full width */
            animation-name: ComeFromLeft;
            animation-duration: 4s;

        }
        .Navigation a{
            /*border: 1px solid gold;*/
            float: none;
            display: block;
            color: gold;
            text-align: center;
            padding: 5px 6px;
            text-decoration: none;
            font-size: 20px;
            font-weight: bolder;

        }
        .Navigation a:hover {
            background-color: gold;
            color: black;
        }

        .FontBlack{
            color: black;
        }
        .SearchNavigation{
            text-align: center;
            align-content: center;
            border-radius:  100px 0 0 0;
            border: 1px solid #333;
            border-top: 10px solid #333;
            border-right: 10px solid #333;
            color: #333;
            text-blink: none;
            text-decoration: none;
        }
        .SearchNavigation a {
            float: none;
            display: block;
            width: 100%;
        }
        .SearchNavigation a:hover{

            background-color: #333;
            color: gold;
        }

    </style>
    {{--</HeaderFooterStyle>--}}
{{--    styles--}}
{{--    More Styles If Needed--}}
    @yield('style')
</head>
<body>
<div class="container-fluid text-right FullWidth row" style="" >
    <header class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" >
    <div class="col-xl-12 col-sm-12 col-12 row FullWidth" style="background-color: gold;">
        <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 col-12 row FullWidth text-center" style="color: black;top: 10px">
            <div class="col-xl-2 col-lg-2 col-md-2  col-sm-2 col-2 row FullWidth text-center">
                <a class="col-xl-6 col-lg-6 col-md-6  col-sm-6 col-6 FullWidth text-center" href="#">
                    <i class="fab fa-instagram-square"></i>
                </a>
                &nbsp;
                <a class="col-xl-6 col-lg-6 col-md-6  col-sm-6 col-6 FullWidth text-center" href="#">
                    <i class="fab fa-telegram-plane"></i>
                </a>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8  col-sm-8 col-8 FullWidth text-center">
                <a href="#">
                    <label>مشاور املاک سبک نو</label>
                    <i class="fas fa-home FontBlack"></i>
                </a>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2  col-sm-2 col-2 FullWidth text-center">
                <a href="#">
                    <i class="fas fa-sign-in-alt"></i>
                </a>
            </div>

        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth text-center">
            <label style="color: black"> معالی اباد جنب بانک صادرات </label>
            <i class="fas fa-map-marker" style="color: black"></i>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-center">
            <label style="color: black"> 09167854123</label>
            <i class="fas fa-mobile-alt" style="color: black"></i>
            <i class="fab fa-whatsapp-square" style="color: black"></i>
        </div>
    </div>

        <div class="col-12 row FullWidth">
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-12 FullWidth Logo">
                <img src="Logo.jpeg" style="width: 100%;height: 150px">
            </div>
            <div class="col-xl-10 col-lg-9 col-md-9 col-sm-12 col-12 FullWidth">
                <div class="col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse FullWidth text-right Navigation" id="NavigationHolder" style="">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " ><a href="{{route('Index')}}">صفحه اصلی</a></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " ><a href="{{route('CallInsert')}}">ثبت املاک شما جهت فروش</a></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " ><a href="{{route('CallInsert')}}">ثبت املاک شما جهت رهن و اجاره</a></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " ><a href="{{route('WithRoomRent', ['Property' => 1 ,'Deal'=>3,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0,'Rent'=>0,'PreRent'=>0]) }}">املاک اجاره ای</a></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " ><a href="{{route('WithRoom',     ['Property' => 1 ,'Deal'=>1,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0])                        }}">املاک فروشی</a></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " ><a href="">قوانین معامله املاک</a></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " ><a href="">وبلاگ</a></div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " ><a href="">درباره ی ما</a></div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" style="background-color: gold">
            <i class="fas fa-comment"></i><span style="color: black" id="ms1"> </span>
        </div>
    </header>
    @yield('body')
    <footer class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse FullWidth  text-center" style="background-color: gold;padding-right: 40px">

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 FullWidth">
                <div class="col-xl-12 col-sm-12 col-12 col-sm-12 col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse  FontBlack SearchNavigation FullWidth text-center" style="padding: 15px;margin: 20px;margin-right: 100px">
                    <span class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" style="font-size: 20px;padding-bottom: 5px;padding-right:15px;text-align: right">جستجوی ملک برحسب نوع</span>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithRoom',    ['Property' => 1 ,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0]) }}">اپارتمان</a></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithoutRoom', ['Property' => 2 ,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0])                           }}">مغازه</a></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithRoom',    ['Property' => 3 ,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0]) }}">اداری تجاری</a></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithoutRoom', ['Property' => 4 ,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0])                           }}">باغ</a></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithRoom',    ['Property' => 5 ,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0]) }}">ویلایی</a></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithoutRoom', ['Property' => 6 ,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0])                           }}">باغ ویلا</a></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithoutRoom', ['Property' => 7 ,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0])                           }}">غرفه</a></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithoutRoom', ['Property' => 8 ,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0])                           }}">کلنگی</a></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithRoom',    ['Property' => 9 ,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0]) }}">موقعیت اداری</a></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth" ><a href="{{route('WithoutRoom', ['Property' => 10,'Deal'=>0,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0])                          }}">زمین</a></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse FullWidth  text-center" style="background-color: gold;padding-right: 40px">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-lg-row-reverse flex-xl-row-reverse flex-md-row-reverse  FontBlack SearchNavigation FullWidth text-center" style="padding: 15px;margin: 20px;margin-left: 40px">
                    <span class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" style="font-size: 20px;padding-bottom: 5px;text-align: right;">جستجوی ملک برحسب معامله</span>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" ><a href="{{route('WithRoom',    ['Property' => 1 ,'Deal'=>1,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0])                        }}">فروش</a></div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" ><a href="{{route('WithRoom',    ['Property' => 1 ,'Deal'=>2,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0])                        }}">پیش فروش</a></div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" ><a href="{{route('WithRoomRent',    ['Property' => 1 ,'Deal'=>3,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0,'Rent'=>0,'PreRent'=>0]) }}">رهن و اجاره</a></div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" ><a href="{{route('WithRoom',    ['Property' => 1 ,'Deal'=>4,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0])                        }}">اجاره به شرط تملیک</a></div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" ><a href="{{route('WithRoom',    ['Property' => 1 ,'Deal'=>5,'PriceRange'=>0,'PriceOrder'=>1,'Neighbourhood'=>0,'Area'=>0,'RoomNumber'=>0])                        }}">مشارکت در ساخت</a></div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-center">
                <label class="FontBlack">نماد اعتماد الکترونیک</label>
                <img src="Logo.jpeg" style="width: 100%;height: 250px;padding: 40px">
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center" style="background-color: gold;">
            <label style="color: black">تمامی حقوق این سایت محفوظ و متعلق به <b>مشاور املاک سبک نو</b> می باشد</label>
        </div>
    </footer>
</div>
{{--<scripts>--}}
<!--<Typer>-->
<script>
    var ms1c = 0;
    var MsSpan1 = document.getElementById('ms1');
    var MsText ="با ما مطمئن معامله کنید مشاور املاک سبک نو     ";
    var textLen = MsText.length;
    function Typer() {
        if (ms1c===textLen){
            ms1c =0;
        }
        var Text = MsText.substring(0,ms1c);
        MsSpan1.innerText=Text;
        ms1c++;
    }
    var s =setInterval(Typer, 300);

</script>
<!--</Typer>-->
{{--</scripts>--}}
{{--More Scripts If Needed--}}
@yield('script')
</body>
</html>
