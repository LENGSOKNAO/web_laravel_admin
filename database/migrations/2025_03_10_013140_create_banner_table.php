<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->id();
            $table->string('banner_name');
            $table->text('banner_description')->nullable();
            $table->string('banner_image');
            $table->string('banner_small_image')->nullable();
            $table->boolean('banner_is_enable')->default(true);
            $table->string('banner_brand')->nullable();
            $table->string('banner_category')->nullable();
            $table->string('banner_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner');
    }
};
