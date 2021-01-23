@extends('Site.parent')
@section('style')
@endsection
@section('body')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  FullWidth">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
           <h1>اطلاعات مشاور</h1>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth text-center">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12  FullWidth">
                <img class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth" src="Logo.jpeg" style="width: 100%;height: 300px">
            </div>
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 row FullWidth text-right">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth ">
                    <h2>{{$Advisor['name']}}</h2>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    <h2>نام</h2>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth ">
                   <h2>{{$Advisor['phone']}}</h2>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 FullWidth text-center">
                    <h2>شماره تلفن</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection

