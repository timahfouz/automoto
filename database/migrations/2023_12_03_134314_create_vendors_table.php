<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('geo_lat')->nullable();
            $table->string('geo_lon')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('bio')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('bg_image_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('image_id')->references('id')->on('media')->onDelete('set null');
            $table->foreign('bg_image_id')->references('id')->on('media')->onDelete('set null');
            $table->date('start_time')->nullable()->after('is_driver');
            $table->date('end_time')->nullable()->after('start_time');
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
        Schema::dropIfExists('vendors');
    }
};
