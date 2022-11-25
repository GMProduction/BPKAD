<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('information_category_id')->unsigned();
            $table->year('year');
            $table->smallInteger('type')->comment('0: link, 1: download');
            $table->text('target');
            $table->foreign('information_category_id')->references('id')->on('information_categories');
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
        Schema::dropIfExists('information_details');
    }
}
