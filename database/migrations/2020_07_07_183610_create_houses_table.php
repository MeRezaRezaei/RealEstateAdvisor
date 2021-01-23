<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            // increment
            $table->id();
            // relation
            // integer
            // tiny integer
            $table->unsignedTinyInteger('total_floor')  ->comment('تعداد طبغات این ملک');
            $table->unsignedTinyInteger('floor_number') ->comment('ملک در کدام طبقه واقع شده');
            $table->unsignedTinyInteger('room')      ->comment('تعداد اتاق خواب ملک');
            $table->unsignedTinyInteger('unit_status')  ->comment('وضعیت اسباب و وسایل ملک');
            // option
            $table->unsignedTinyInteger('document_type')   ->comment('نوع سند ملک چگونه است');
            $table->unsignedTinyInteger('document_status') ->comment('وضعیت سند ملک چگونه است');
            $table->unsignedTinyInteger('facade')          ->comment('نمای ساختمان چگونه است');
            $table->unsignedTinyInteger('floor_type')      ->comment('نوع پوشش کف ملک چیست');
            $table->unsignedTinyInteger('direction')       ->comment('جهت ملک را مشخص می کند');
            $table->unsignedTinyInteger('cupboard')        ->comment('نوع کابینت این ملک');
            $table->unsignedTinyInteger('neighbourhood')   ->comment('ملک در کدام محله واقع هست');
            $table->unsignedTinyInteger('deal')            ->comment('نوع معامله را مشخص میکند');
            // small integer
            $table->unsignedSmallInteger('construction_year') ->comment('سال ساخت ملک');

            // medium integer
            $table->unsignedMediumInteger('area')            ->comment('مساحت زمین ملک');
            $table->unsignedMediumInteger('foundation_area') ->comment('مساحت زیر بنا ملک');
            $table->unsignedMediumInteger('any_floor_area')  ->comment('مساحت هر طبقه');
            // boolean
            $table->boolean('balcony')        ->comment('ایا این ملک بالکن دارد');
            $table->boolean('parking')        ->comment('ایا ملک پارکینگ دارد');
            $table->boolean('elevator')       ->comment('ایا ملک اسانسور دارد');
            $table->boolean('warehouse')      ->comment('ایا ملک انباری دارد');
            $table->boolean('plumbing_gas')   ->comment('ایا ملک گاز لوله کشی دارد');
            $table->boolean('phone')          ->comment('ایا این ملک دارای خط تلفن ثابت هست');
            $table->boolean('swimming_pool')  ->comment('ایا این ملک استخر دارد');
            $table->boolean('sauna')          ->comment('ایا این ملک سونا دارد');
            $table->boolean('jacuzzi')        ->comment('ایا این ملک جکوزی دارد');
            $table->boolean('master_bedroom') ->comment('ایا این ملک اتاق خواب مستر دارد');
            $table->boolean('luxury')         ->comment('ایا این ملک لاکچری است');
            $table->boolean('hole_sell')      ->comment('ایا ملک برای فروش یکجا هست');
            $table->boolean('hood')           ->comment('ایا این ملک هود دارد');
            $table->boolean('plate_gas')      ->comment('ایا این ملک گاز صفحه ای دارد');
            // text
            $table->string('address',200)     ->comment('ادرس ملک');
            $table->string('description',200) ->comment('توضیخات در رابطه با این ملک');
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
        Schema::dropIfExists('houses');
    }
}
