<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoothsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booths', function (Blueprint $table) {
            // increment
            $table->id();
            //relations
            // integers
            //tiny integer
            // options
            $table->unsignedTinyInteger('document_type')->comment('نوع سند ملک چگونه است');
            $table->unsignedTinyInteger('document_status')->comment('وضعیت سند ملک چگونه است');
            $table->unsignedTinyInteger('neighbourhood')  ->comment('ملک در کدام محله واقع هست');
            $table->unsignedTinyInteger('deal')           ->comment('نوع معامله را مشخص میکند');
            // small integer
            $table->unsignedSmallInteger('construction_year')->comment('سال ساخت ملک');
            // medium integer
            $table->unsignedMediumInteger('area')->comment('مساحت ملک چقدر است');
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
        Schema::dropIfExists('booths');
    }
}
