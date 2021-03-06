<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_rents', function (Blueprint $table) {
            $table->id();
            // relation
            $table->unsignedInteger('property_id');
            $table->string('property_type',20);
            // integer
            $table->unsignedTinyInteger('month')   ->comment('تعداد ماه های اجاره به شرط تملیک');
            $table->unsignedBigInteger('rent')     ->comment('میزان اجاره');
            $table->unsignedBigInteger('pre_rent') ->comment('میزان ودیعه');
            $table->boolean('changeable')          ->comment('ایا قابل تبدیل می باشد');
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
        Schema::dropIfExists('sell_rents');
    }
}
