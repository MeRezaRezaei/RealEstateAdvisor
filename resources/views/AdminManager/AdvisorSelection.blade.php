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
        <h1>مشاور مورد نظر را انتخاب کنید</h1>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth">
        @foreach($AdvisorInfos as $AdvisorInfo)
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth">
                    <a class="btn btn-warning" href="{{route('LookAtAnAdvisorPropertiesSelectingAdvisor',['id'=>$AdvisorInfo->id])}}">دیدن اطلاعات</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script')

@endsection
