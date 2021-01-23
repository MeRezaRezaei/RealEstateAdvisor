@extends('Site.parent')
@section('style')
    <style>
        .InfoItem{
            border: 2px solid gold;
            border-left: 5px solid gold;
            border-bottom: 3px solid gold;
            background-color: #333333;
        }
        .InfoItemHolder :nth-child(2n){
            background-color: gold;
            color: black;
            border: 5px solid #333333;
        }
        /*.InfoItemHolder  :nth-child(odd){*/
        /*    background-color: #333333;*/
        /*    color: gold;*/
        /*}*/
    </style>
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
@endsection
@section('body')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth flex-row-reverse text-right">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 row FullWidth flex-row-reverse text-right">
            <h1>اطلاعات ملک</h1>
        </div>
        @if($PropertyInfos['Luxury'])
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 FullWidth  text-center">
            <h1 class="">این ملک لاکچری است</h1>
        </div>
        @endif
    </div>
    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 row  FullWidth flex-row-reverse InfoItemHolder">
        @foreach($InfoSection as $PropertyInfo)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 FullWidth row flex-row-reverse text-center InfoItem">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  FullWidth text-center">
                    {{$PropertyInfo[0]}}
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    {{$PropertyInfo[1]}}
                </div>
            </div>
        @endforeach
{{--            Address--}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth row flex-row-reverse text-center InfoItem">
            <p>ادرس</p>{{$PropertyInfos['Address']}}&nbsp;:&nbsp;
        </div>
{{--            Description--}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth row flex-row-reverse text-center InfoItem">
            <p>توضیحات</p>{{$PropertyInfos['Description']}}&nbsp;:&nbsp;
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12  FullWidth">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
            مشاور این ملک
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  FullWidth">
            <img class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" src="Logo.jpeg" style="width: 100%;height: 200px">
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
            {{$PropertyInfos['AdvisorName']}}
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
            {{$PropertyInfos['AdvisorPhone']}}
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
            <a class="btn btn-success" href="{{$PropertyInfos['AdvisorLink']}}">
                اطلاعات مشاور
            </a>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
            <h2>قصد معامله این ملک را دارید؟</h2>
            <h3> شماره تلفن خود را وارد کنید تا مشاوران ما با شما تماس بگیرند</h3>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  text-center" style="padding: 10px">
        <a class="btn btn-warning" href="{{route('CallInsert')}}">ثبت شماره تلفن</a>
        </div>
    </div>

{{--    Pictures--}}
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth flex-row-reverse text-right">
        <h1>تصاویر ملک</h1>
    </div>
    @if(count($PropertyInfos['Photos']) >0)
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth flex-row-reverse">
        @foreach($PropertyInfos['Photos'] as $Photos)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth">
                <img class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" src="{{$Photos}}" style="height: 400px;border: 5px solid gold;padding: 5px">
            </div>
        @endforeach
    </div>
    @else
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row FullWidth flex-row-reverse text-right">
            تصاویر برای این ملک در پایگاه داده موجود نیست
        </div>
    @endif
@endsection
@section('script')
@endsection
