<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('transactions', 'metode_pembayaran')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->string('metode_pembayaran')->nullable()->after('status');
            });
        }
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('metode_pembayaran');
        });
    }
};
