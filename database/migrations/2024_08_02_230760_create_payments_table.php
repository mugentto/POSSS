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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sales_id");
            $table->unsignedBigInteger("products_id");
            $table->integer("quantity");
            $table->integer("unit_price")->unsigned();
            $table->integer("subtotal")->unsigned();
          
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('sales_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
