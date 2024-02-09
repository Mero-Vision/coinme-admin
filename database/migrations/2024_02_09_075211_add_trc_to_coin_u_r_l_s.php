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
        Schema::table('coin_u_r_l_s', function (Blueprint $table) {
            $table->longText('erc_usdt')->nullable()->after('eth_coin_url');
            $table->longText('trc_usdt')->nullable()->after('erc_usdt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coin_u_r_l_s', function (Blueprint $table) {
            $table->dropColumn('erc_usdt');
            $table->dropColumn('trc_usdt');
        });
    }
};