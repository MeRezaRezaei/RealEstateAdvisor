<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillaGardensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villa_gardens', function (Blueprint $table) {
            // increment
            $table->id();
            // relations
            // integer
            // tiny integer
            $table->unsignedTinyInteger('total_floor') ->comment('تعداد کل طبقات زیر بنا');
            $table->unsignedTinyInteger('unit_status') ->comment('وضعیت اسباب و وسایل ملک');
            // options
            $table->unsignedTinyInteger('document_type')   ->comment('نوع سند ملک را مشخص می کند');
            $table->unsignedTinyInteger('document_status') ->comment('وضعیت سند را مشخص می کند');
            $table->unsignedTinyInteger('facade')          ->comment('نوع نمای ملک را مشخص می کند');
            $table->unsignedTinyInteger('neighbourhood')   ->comment('ملک در کدام محله واقع هست');
            $table->unsignedTinyInteger('deal')            ->comment('نوع معامله را مشخص میکند');
            // small integer
            $table->unsignedSmallInteger('construction_year') ->comment('سال ساخت ملک');
            // medium integer
            $table->unsignedMediumInteger('total_area')      ->comment('متراژ کل ملک چقدر است');
            $table->unsignedMediumInteger('foundation_area') ->comment('متراژ کل زیر بنا چقدر است');
            $table->unsignedMediumInteger('tree_number')     ->comment('تعداد کل درختان ملک');
            // boolean
            $table->boolean('water')         ->comment('ایا این ملک اب لوله کشی دارد');
            $table->boolean('electricity')   ->comment('ایا این ملک برق دارد');
            $table->boolean('plumbing_gas')  ->comment('ایا ملک گاز لوله کشی دارد');
            $table->boolean('phone')         ->comment('ایا این ملک تلفن ثابت دارد');
            $table->boolean('swimming_pool') ->comment('ایا این ملک استخر شنا دارد');
            $table->boolean('sauna')         ->comment('ایا این ملک سونا دارد');
            $table->boolean('jacuzzi')       ->comment('ایا این ملک جکوزی دارد');
            $table->boolean('luxury')        ->comment('ایا این ملک لاکچری است');
            // text
            $table->string('address',200)                 ->comment('ادرس این ملک چیست');
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
        Schema::dropIfExists('villa_gardens');
    }
}
