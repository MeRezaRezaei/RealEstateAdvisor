@extends('AdminManager.Parent')
@section('style')
    <style>
        .MenuItem {
            font-size: 30px;
        }
    </style>
@endsection
@section('body')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center">
        <h1>ملک مورد نظر را انتخاب کنید</h1>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 FullWidth text-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
                <img class="FullWidth" src="{{$AdvisorInfo->pic_path}}" style="height: 200px">
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
                {{$AdvisorInfo->id}}
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
                {{$AdvisorInfo->name}}
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
                {{$AdvisorInfo->phone}}
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 FullWidth text-center">
            @foreach($AdvisorProperties as $AdvisorProperty)
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth text-center MenuItem">
                    <a href="{{route('Property.show',['id'=>$AdvisorProperty['id'],'type'=>$AdvisorProperty['Number']])}}">نوع {{$AdvisorProperty['PName']}} کد اگهی {{$AdvisorProperty['id']}}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')

@endsection
