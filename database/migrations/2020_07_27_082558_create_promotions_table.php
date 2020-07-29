<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {

            $table->id()->nullable();

            $table->string('name');

            $table->date('promotion');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
