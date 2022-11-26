<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinancialReportDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_report_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('financial_report_id')->unsigned();
            $table->year('year');
            $table->smallInteger('type')->default(0)->comment('0: link, 1: file download');
            $table->text('target');
            $table->timestamps();
            $table->foreign('financial_report_id')->references('id')->on('financial_reports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_report_details');
    }
}
