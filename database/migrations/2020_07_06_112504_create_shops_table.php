<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            // relations
            // integer
            // tiny integer
            $table->unsignedTinyInteger('unit_height')  ->comment('ارتفاع این مغازه چقدر هست');
            // options
            $table->unsignedTinyInteger('document_type')   ->comment('وضعیت سند این مغازه چگونه است');
            $table->unsignedTinyInteger('document_status') ->comment('وضعیت سند این مغازه چگونه است');
            $table->unsignedTinyInteger('heating_system')  ->comment('طریقه ی گرمایش مغازه چگونه است');
            $table->unsignedTinyInteger('cooling_system')  ->comment('طریقه ی سرمایش مغازه چگونه است');
            $table->unsignedTinyInteger('direction')       ->comment('جهت این مغازه چیست');
            $table->unsignedTinyInteger('neighbourhood')   ->comment('ملک در کدام محله واقع هست');
            $table->unsignedTinyInteger('deal')            ->comment('نوع معامله را مشخص میکند');
            // small integer
            $table->unsignedSmallInteger('construction_year') ->comment('سال ساخت ملک');
            $table->unsignedSmallInteger('balcony_area')      ->comment('مساحت بالکن چقدر هست');
            // medium integer
            $table->unsignedMediumInteger('floor_area')->comment('مساحت کف مغازه');
            $table->unsignedMediumInteger('total_area')->comment('مساحت مغازه به متر مربع چقدر است');
            // boolean
            $table->boolean('water')       ->comment('ایا این مغازه اب لوله کشی دارد');
            $table->boolean('electricity') ->comment('ایا این مغازه برق دارد');
            $table->boolean('gas')         ->comment('ایا این مغازه گاز لوله کشی دارد');
            $table->boolean('phone')       ->comment('ایا این مغازه خط تلفن ثابت دارد');
            // text
            $table->string('address',200)     ->comment('ادرس این مغازه چیست');
            $table->string('description',200) ->comment('توضیحات دیگر این ملک اینجا وارد می شود');
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
        Schema::dropIfExists('shops');
    }
}
