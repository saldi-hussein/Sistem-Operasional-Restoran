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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('day');
            $table->string('stiwed')->nullable();
            $table->string('tray')->nullable();
            $table->string('tong_sampah')->nullable();
            $table->string('inventaris')->nullable();
            $table->string('kain_lap_waiters')->nullable();
            $table->string('mushola')->nullable();
            $table->string('clear_up_pondok')->nullable();
            $table->string('lap_piring_dapur')->nullable();
            $table->string('tas')->nullable();
            $table->string('mematikan_lampu')->nullable();
        
            // Tambahan
            $table->string('pondok_a')->nullable();
            $table->string('pondok_b')->nullable();
            $table->string('pondok_c')->nullable();
            $table->string('pondok_d')->nullable();
            $table->string('bar')->nullable();
            $table->string('off')->nullable();
            $table->string('pulang_sore')->nullable();
        
            // Jadwal break tambahan
            $table->string('break_1')->nullable();
            $table->string('break_2')->nullable();
            $table->string('break_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
