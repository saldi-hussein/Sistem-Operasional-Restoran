<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\table;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('stockins', function (Blueprint $table) {
            $table->foreignId('barang_id')->nullable()->constrained('stocks')->nullOnDelete();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('kode')->nullable();
        });

         Schema::table('menus', function (Blueprint $table) {
            $table->string('kategori')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
