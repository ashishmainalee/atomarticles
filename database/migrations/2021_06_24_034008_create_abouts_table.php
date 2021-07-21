<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('address');
            $table->string('site_logo')->nullable();
            $table->string('site_image')->nullable();
            $table->string('site_banner')->nullable();
            $table->text('site_description');
            $table->string('email');
            $table->string('contact_number');
            $table->string('facebook')->nullable();
            $table->text('site_policy')->nullable();
            $table->text('site_terms')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
