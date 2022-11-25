<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('information_categories', function (Blueprint $table) {
            $table->bigInteger('category_id')->after('id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('information_categories', function (Blueprint $table) {
            $table->dropForeign('information_categories_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
