@extends('AdminManager.Parent')
@section('style')
    <style>
        .MenuItem {
            font-size: 30px;
        }
    </style>
@endsection
@section('body')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row flex-row-reverse FullWidth text-center">
{{--        Information--}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('LookAtAnAdvisorProperties')}}"
            >دیدن املاک یک مشاور</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('AdvisorSubmissionStatistics')}}"
            >امار ثبت املاک مشاوران</a>
        </div>
{{--        Adding--}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('AddingProperty')}}"
            >اضافه کردن ملک</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('AddingAdvisor')}}"
            >اضافه کردن مشاور</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('AddingSubmitter')}}"
            >اضافه کردن تایید کننده</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('AddingBlogger')}}"
            >اضافه کردن بلاگر</a>
        </div>
{{--        Editing--}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('EditingAdvisorInformation')}}"
            >تصحیح اطلاعات یک مشاور</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('EditingPropertyInformation')}}"
            >تصحیح اطلاعات یک ملک</a>
        </div>
{{--        Changing--}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('ChangingAPropertyAdvisor')}}"
            >تغییر مشاور یک ملک</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('ChangingAllPropertiesAdvisorOfAnAdvisor')}}"
            >تغییر مشاور تمام املاک یک مشاور</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('NewPropertiesSubmission')}}"
            >تایید نمایش املاک جدید</a>
        </div>
{{--        Deleting--}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('DeletingAProperty')}}"
            >حذف یک ملک</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('DeletingAnAdvisor')}}"
            >حذف یک مشاور</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('DeletingASubmitter')}}"
            >حذف تایید کننده</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('DeletingABlogger')}}"
            >حذف بلاگر</a>
        </div>
{{--        PasswordReset--}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('ResettingAdvisorPassword')}}"
            >ریست پسورد مشاور</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('ResettingSubmitterPassword')}}"
            >ریست پسورد تایید کننده</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('ResettingBloggerPassword')}}"
            >ریست پسورد بلاگر</a>
        </div>
{{--        Space--}}
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth">
            <p></p>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth">
            <p></p>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth">
            <p></p>
        </div>
{{--        Exit--}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 FullWidth MenuItem">
            <a href="{{route('ExitAdminSession')}}"
            >خروج از پنل ادمین</a>
        </div>
{{--        Space--}}
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth">
            <p></p>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth">
            <p></p>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 FullWidth">
            <p></p>
        </div>

    </div>
@endsection
@section('script')
@endsection
