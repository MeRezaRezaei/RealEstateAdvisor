@extends('Site.parent')

@section('style')
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
@endsection

@section('body')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth justify-content-center">
        <form class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth row flex-row-reverse" onsubmit="return Validate()">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
                <h3>شماره تماس خود را ثبت کنید کارشناسان ما در اسرع وقت برای کارشناسی و ثبت ملک شما تماس می گیرند</h3>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth text-center">
                <h3>شماره تماس (الزامی)</h3>
                <input class="FormMenu" type="text" name="Phone" id="PhoneNumber">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth text-center">
                <h3>نام و نام خانوادگی</h3>
                <input class="FormMenu" type="text" name="Name">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth text-center">
                <h3>ثبت اطلاعات</h3>
                <input class=" FormMenu" type="submit" value="             ثبت              " name="Sub" onsubmit="return Validate()">
            </div>
        </form>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth justify-content-center">
        <p></p>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth row flex-row-reverse">
        @switch($Condition)
            @case('a')
            <div> تلفن </div>
            <div>&nbsp;</div>
            <div> {{$Phone}} </div>
            <div>&nbsp;</div>
            @if($Name == '')
                <div> بدون نام </div>
                <div>&nbsp;</div>
            @else
                <div> با اسم </div>
                <div>&nbsp;</div>
                <div> {{$Name}} </div>
                <div>&nbsp;</div>
            @endif
            <div> در لیست قرار گرفت </div>
            @break

            @case('b')
            <div>خطا در ثبت اطلاعات لطفا مجددا تلاش کنید</div>
            @break

            @case('c')
            <div>این شماره از قبل ثبت شده است و شما قادر به ثبت مجدد ان نیستید</div>
            @break
        @endswitch
    </div>
@endsection

@section('script')
    <script>
        function Validate() {

            var flag = false;
            var Phone = document.getElementById('PhoneNumber').value;
            var r11 = /^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/
            var r10 = /^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/
            var PhoneCount = 0;
            if(Phone !== ''){
                PhoneCount = Phone.length;
                if (PhoneCount > 0){
                    var dd = false;
                    if(r10.test(Phone)){
                        //alert(Phone.substr(0,1));
                        if (Phone.substr(0,1) === '9')
                            dd = true;
                    }
                    else if(r11.test(Phone)){
                        //alert(Phone.substr(0,2));
                        if (Phone.substr(0,2) === '09')
                            dd = true;
                    }
                    if (dd){
                        return true;
                    }
                    else{
                        alert('شماره ی وارد شده باید مطابق الگوی زیر باشد ' +
                            '\n' +
                            '\n' +
                            '09*********' +
                            '\n' +
                            'یا' +
                            '\n' +
                            '9*********');
                        return false;
                    }

                }
                else {
                    alert('شماره ی تلفن نمی تواند خالی باشد');
                    return false;
                }

            }
            else {
                alert('شماره ی تلفن نمی تواند خالی باشد');
                return false;
            }

        }

    </script>
@endsection
