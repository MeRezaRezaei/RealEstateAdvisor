<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGardensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gardens', function (Blueprint $table) {
            // increment
            $table->id();
            // relation
            // todo: decide for direction
            // integer
            // tiny integer
            // option
            $table->unsignedTinyInteger('document_type')   ->comment('نوع سند باغ چگونه است');
            $table->unsignedTinyInteger('document_status') ->comment('وضعیت سند ملک چگونه است');
            $table->unsignedTinyInteger('neighbourhood')   ->comment('ملک در کدام محله واقع هست');
            $table->unsignedTinyInteger('deal')            ->comment('نوع معامله را مشخص میکند');
            // medium integer
            $table->unsignedMediumInteger('area')        ->comment('مساحت ملک بر حسب متر مربع');
            $table->unsignedMediumInteger('tree_number') ->comment('تعداد درختان این باغ');
            // boolean
            $table->boolean('room')->comment('این باغ اتاق یا خانه باغ دارد');
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
        Schema::dropIfExists('gardens');
    }
}
