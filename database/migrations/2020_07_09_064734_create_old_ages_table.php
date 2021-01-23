<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldAgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_ages', function (Blueprint $table) {
            // increments
            $table->id();
            // relations
            // integer
            // tiny integer
            $table->unsignedTinyInteger('total_floor') ->comment('تعداد کل طبقات ملک');
            $table->unsignedTinyInteger('gozar')       ->comment('عرض خیابان یا کوچه کنار زمین');
            // options
            $table->unsignedTinyInteger('document_type')   ->comment('نوع سند چگونه است');
            $table->unsignedTinyInteger('document_status') ->comment('وضعیت سند چگونه است');
            $table->unsignedTinyInteger('direction')       ->comment('جهت ملک را مشخص می کند');
            $table->unsignedTinyInteger('neighbourhood')   ->comment('ملک در کدام محله واقع هست');
            $table->unsignedTinyInteger('deal')            ->comment('نوع معامله را مشخص میکند');
            // small integer
            $table->unsignedSmallInteger('construction_year') ->comment('سال ساخت ملک');
            $table->unsignedSmallInteger('bar')               ->comment('طول از زمین که در راستای خیابان یا کوچه است');
            // medium integer
            $table->unsignedMediumInteger('total_area')      ->comment('مساحت کل ملک');
            $table->unsignedMediumInteger('foundation_area') ->comment('مساحت زیر بنا چقدر هست');
            // boolean
            // text
            $table->string('address',200)     ->comment('ادرس این ملک چیست');
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
        Schema::dropIfExists('old_ages');
    }
}
