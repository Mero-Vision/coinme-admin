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
            $table->decimal('dollar_balance', 18, 5)->nullable()->after('balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_balances', function (Blueprint $table) {
            $table->dropColumn('dollar_balance');
        });
    }
};