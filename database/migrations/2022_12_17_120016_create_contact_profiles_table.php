<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->text('address');
            $table->string('phone');
            $table->text('office_hours');
            $table->text('location');
            $table->json('social_media')->nullable(true);
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
        Schema::dropIfExists('contact_profiles');
    }
}
