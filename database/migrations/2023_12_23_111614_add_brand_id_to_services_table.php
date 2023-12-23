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
        Schema::table('services', function (Blueprint $table) {
            // $table->unsignedBigInteger('brand_id')->nullable();
            // $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->dropColumn('is_brand');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->boolean('is_brand')->default(0);
            // $table->dropColumn('brand_id');
        });
    }
};
