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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->json('product_category');  
            $table->string('product_brand'); 
            $table->json('product_sizes');  
            $table->text('product_description')->nullable();
            $table->decimal('product_price', 10, 2);
            $table->integer('product_qty');
            $table->string('product_color')->nullable();
            $table->string('product_link')->nullable();
            $table->boolean('product_is_enable')->default(true);
            $table->boolean('product_comming_soon')->default(true);
            $table->string('product_image');
            $table->json('product_list_image')->nullable();     
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
