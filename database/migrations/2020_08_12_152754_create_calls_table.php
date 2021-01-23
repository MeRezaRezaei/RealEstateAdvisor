<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            // string
            $table->string('phone',11)->comment('شماره ی تلفن شخص درخواست دهنده');
            $table->string('name',60)->nullable()->comment('نام و نام خوانوادگی شخص درخواست دهنده');
            // boolean
            $table->boolean('have_seen')->comment('ایا این شماره قبلا به اطلاع مدیر رسیده');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
}
