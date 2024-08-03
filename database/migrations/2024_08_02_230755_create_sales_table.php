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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("users_id");
            $table->integer("total_amount");
            $table->string("payment_method");
            $table->date("sale_date");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign("users_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
