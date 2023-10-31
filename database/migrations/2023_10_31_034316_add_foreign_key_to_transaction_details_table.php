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
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreign('transaksi_id')->references('id')->on('transactions')->onDelete('CASCADE');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropForeign(['transaksi_id', 'menu_id' ]);
            $table->dropColumn(['transaksi_id', 'menu_id' ]);
        });
    }
};
