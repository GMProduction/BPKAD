<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramActivityDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_activity_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('program_activity_id')->unsigned();
            $table->year('year');
            $table->smallInteger('type')->default(0)->comment('0: link, 1: file download');
            $table->text('target');
            $table->timestamps();
            $table->foreign('program_activity_id')->references('id')->on('program_activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_activity_details');
    }
}
