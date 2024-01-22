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
        Schema::table('trade_transactions', function (Blueprint $table) {
            $table->string('purchase_amount')->nullable()->change();
            $table->string('purchase_price')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trade_transactions', function (Blueprint $table) {
            $table->float('purchase_amount')->nullable()->change();
            $table->float('purchase_price')->nullable()->change();
        });
    }
};