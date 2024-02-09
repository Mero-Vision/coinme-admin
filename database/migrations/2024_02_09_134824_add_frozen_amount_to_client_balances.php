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
        Schema::table('client_balances', function (Blueprint $table) {
            $table->decimal('frozen_amount', 18, 3)->nullable()->after('dollar_balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_balances', function (Blueprint $table) {
            $table->dropColumn('frozen_amount');
        });
    }
};