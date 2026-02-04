<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the old outcomes table if it exists
        Schema::dropIfExists('outcomes');

        // Create the new outcomes table with only the needed fields
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('karyawan');
            $table->string('deskripsi');
            $table->string('jumlah');
            $table->string('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outcomes');
    }
};
