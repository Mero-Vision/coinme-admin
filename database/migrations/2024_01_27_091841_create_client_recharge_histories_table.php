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
        Schema::create('client_recharge_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
            $table->string('client_name')->nullable();
            $table->string('coin_type')->nullable();
            $table->string('coin_value')->nullable();
            $table->string('recharge_amount')->nullable();
            $table->string('equivalent_coin_amount')->nullable();
            $table->string('status')->default('paid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_recharge_histories');
    }
};