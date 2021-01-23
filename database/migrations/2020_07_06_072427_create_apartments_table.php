<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            // increment
/*        */$table->id();
            // relations
            //integers
            // tiny integer
            $table->unsignedTinyInteger('room')                ->comment('تعداد اتاق خواب در ان ملک');
            $table->unsignedTinyInteger('floor_number')           ->comment('ملک در کدام طبقه قرار دارد');
            $table->unsignedTinyInteger('total_floors')           ->comment('تعداد کل طبقات ملک(اپارتمان)');
            $table->unsignedTinyInteger('units_per_floor_number') ->comment('تعداد واحد ها در هر طبقه ملک(اپارتمان)');
            // options
            $table->unsignedTinyInteger('floor_type')     ->comment('نوع پوشش کف ساختمان چیست');
            $table->unsignedTinyInteger('document_type')  ->comment('نوع سند ملک(اپارتمان) چگونه است');
            $table->unsignedTinyInteger('document_status')->comment('وضعیت سند این ملک(ساختمان) چگونه است');
            $table->unsignedTinyInteger('toilet_type')    ->comment('نوع سرویس بهداشتی این ملک(اپارتمان) چگونه است');
            $table->unsignedTinyInteger('heating_system') ->comment('سیستم گرمایش این ساختمان چیست');
            $table->unsignedTinyInteger('cooling_system') ->comment('سیستم سرمایش ملک(اپارتمان) چگونه است');
            // todo: be care full about radiator(heating_system) and water heater change it to yes no
            //$table->unsignedTinyInteger('water_heater')   ->comment('ایا این واحد از ملک(اپارتمان) ابگرمکن دارد');
            $table->unsignedTinyInteger('facade')         ->comment('نمای این ملک(اپارتمان) از چه نوع هست');
            $table->unsignedTinyInteger('direction')      ->comment('جهت ملک را مشخص می کند');
            $table->unsignedTinyInteger('cupboard')       ->comment('نوع کابینت این ملک');
            $table->unsignedTinyInteger('neighbourhood')  ->comment('ملک در کدام محله واقع هست');
            $table->unsignedTinyInteger('deal')           ->comment('نوع معامله را مشخص میکند');
            // small integer
            $table->unsignedSmallInteger('construction_year') ->comment('سال ساخت اپارتمان');
            // medium integer
            $table->unsignedMediumInteger('area')->comment('مساحت ملک(ساختمان) به متر مربع چقدر است');
            // big integer
            $table->unsignedBigInteger('price')->comment('قیمت ملک چقدر است');
            // boolean
            $table->boolean('unit_status')    ->comment('وضعیت اسباب و وسایل ملک');
            $table->boolean('balcony')       ->comment('ایا بالکن دارد');
            $table->boolean('parking')       ->comment('ایا ان واحد در ملک(اپارتمان) پارکینگ دارد');
            $table->boolean('elevator')      ->comment('ایا ان واحد از ملک اسانسور دارد');
            $table->boolean('warehouse')     ->comment('ایا ان واحد از ملک(اپارتمان) انباری دارد');
            $table->boolean('swimming_pool') ->comment('ایا این واحد از ملک(اپارتمان) استخر شنا دارد');
            $table->boolean('sauna')         ->comment('ایا این ملک سونا دارد');
            $table->boolean('jacuzzi')       ->comment('ایا این واحد از ملک(اپارتمان) جکوزی دارد');
            $table->boolean('phone')         ->comment('ایا این واحد از مللک دارای خط تلفن ثابت می باشد');
            $table->boolean('master_bedroom')->comment('ایا این ملک(اپارتمان) دارای اتاق خواب مستر می باشد');
            $table->boolean('plumbing_gas')  ->comment('ایا این واحد از ملک(اپارتمان) گاز لوله کشی دارد');
            $table->boolean('luxury')        ->comment('ایا این ملک لاکچری است');
            $table->boolean('lobby')         ->comment('ایا این ملک لابی دارد');
            $table->boolean('hood')          ->comment('ایا این ملک هود دارد');
            $table->boolean('plate_gas')     ->comment('ایا این ملک گاز صفحه ای دارد');
            // text
            $table->string('address',200)     ->comment('ادرس این ملک(اپارتمان) چیست');
            $table->string('description',200) ->comment('توضیحات اضافه این ملک اینجا نوشته شود');
            // other
            $table->timestamps();
            // todo: decide for the engine of database
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
