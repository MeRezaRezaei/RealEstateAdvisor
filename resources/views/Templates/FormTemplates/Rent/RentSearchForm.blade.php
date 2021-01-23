@extends('Templates/FormTemplates/SearchMain')
@section('RentSearchForm')
    <form>
        <div class="col-12 row">
            <div class="col-6 form-group" style="width: 100%">
                <select class="form-control-lg" style="width: 100%" id="sel1">
                    <option value="1">اپارتمان مسکونی</option>
                    <option value="2">مغازه</option>
                    <option value="3">اداری تجاری</option>
                    <option  value="4">ویلایی</option>
                    <option  value="5">غرفه</option>
                    <option  value="6">موقعیت اداری</option>
                </select>
            </div>
            <div class="col-6" style="font-size: 50px">نوع ملک را انتخاب کنید</div>
        </div>

    </form>
@endsection