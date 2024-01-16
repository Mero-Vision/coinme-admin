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
        Schema::create('client_recharges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_no')->nullable();
            $table->longText('wallet_address')->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_recharges');
    }
};