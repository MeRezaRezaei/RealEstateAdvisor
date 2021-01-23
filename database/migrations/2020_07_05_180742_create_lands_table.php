<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            //increment
            $table->id();
            // relation
            // integers
            // tiny integer
            $table->unsignedTinyInteger('gozar')->comment('عرض خیابان یا کوچه کنار زمین');
            // option
            $table->unsignedTinyInteger('document_type')   ->comment('نوع سند ملک');
            $table->unsignedTinyInteger('document_status') ->comment('وضعیت سند ملک');
            $table->unsignedTinyInteger('use_for')         ->comment('نوع کاربری زمین چیست');
            $table->unsignedTinyInteger('direction')       ->comment('جهت ملک را مشخص می کند');
            $table->unsignedTinyInteger('neighbourhood')   ->comment('ملک در کدام محله واقع هست');
            $table->unsignedTinyInteger('deal')            ->comment('نوع معامله را مشخص میکند');
            // small integer
            $table->unsignedSmallInteger('bar')->comment('طول از زمین که در راستای خیابان یا کوچه است');
            // medium integer
            $table->unsignedMediumInteger('area')->comment('مساحت ملک به متر مربع چقدر است');
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
        Schema::dropIfExists('lands');
    }
}
