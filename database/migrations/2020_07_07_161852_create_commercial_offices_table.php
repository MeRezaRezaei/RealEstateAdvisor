<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_offices', function (Blueprint $table) {
            // table increment
            $table->id();
            // relation
            // integer
            // tiny integer
            $table->unsignedTinyInteger('room')            ->comment('تعداد  اتاق این ملک');
            $table->unsignedTinyInteger('floor_number')           ->comment('این ملک در گدام طبقه هست');
            $table->unsignedTinyInteger('total_floor')            ->comment('تعدا کل طبقات این ملک');
            $table->unsignedTinyInteger('units_per_floor_number') ->comment('در هر طبقه ی این ملک چند واحد وجود دارد');
            $table->unsignedTinyInteger('unit_status')            ->comment('وضعیت اسباب و وسایل ملک');
            // options
            $table->unsignedTinyInteger('document_type')   ->comment('نوع سند این ملک');
            $table->unsignedTinyInteger('document_status') ->comment('وضعیت سند این ملک');
            $table->unsignedTinyInteger('heating_system')  ->comment('سیستم گرمایش ملک چیست');
            $table->unsignedTinyInteger('cooling_system')  ->comment('سیستم سرمایش ملک چیست');
            $table->unsignedTinyInteger('floor_kind')      ->comment('نوع پوشش کف چیست');
            $table->unsignedTinyInteger('direction')       ->comment('جهت ملک را مشخص می کند');
            $table->unsignedTinyInteger('cupboard')        ->comment('نوع کابینت این ملک');
            $table->unsignedTinyInteger('neighbourhood')   ->comment('ملک در کدام محله واقع هست');
            $table->unsignedTinyInteger('deal')            ->comment('نوع معامله را مشخص میکند');
            // small integer
            $table->unsignedSmallInteger('construction_year') ->comment('سال ساخت این ملک');

            // medium integer
            $table->unsignedMediumInteger('area')->comment('مساحت ملک بر حسب متر مربع');
            // boolean
            $table->boolean('parking')   ->comment('ایا این ملک پارکینگ دارد');
            $table->boolean('warehouse') ->comment('ایا این ملک انباری دارد');
            $table->boolean('elevator')  ->comment('ایا این ملک اسانسور دارد');
            $table->boolean('balcony')   ->comment('ایا این ملک بالکن دارد');
            $table->boolean('luxury')    ->comment('ایا این ملک لاکچری است');
            $table->boolean('lobby')     ->comment('ایا این ملک لابی دارد');
            $table->boolean('hood')          ->comment('ایا این ملک هود دارد');
            $table->boolean('plate_gas')     ->comment('ایا این ملک گاز صفحه ای دارد');
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
        Schema::dropIfExists('commercial_offices');
    }
}
