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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('verified')->default(1);
            $table->string('verification_code')->nullable();
            $table->string('device_id')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreign('image_id')->references('id')->on('media')->onDelete('set null');
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
        Schema::dropIfExists('users');
    }
};
