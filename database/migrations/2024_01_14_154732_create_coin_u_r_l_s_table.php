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
        Schema::create('coin_u_r_l_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->longText('usdt_coin_url')->nullable();
            $table->longText('btc_coin_url')->nullable();
            $table->longText('eth_coin_url')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_u_r_l_s');
    }
};