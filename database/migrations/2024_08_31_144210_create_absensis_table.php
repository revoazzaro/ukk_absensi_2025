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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->dateTime('waktu_masuk');
            $table->dateTime('waktu_pulang')->nullable();
            $table->string('selfie_masuk_path');
            $table->string('selfie_pulang_path')->nullable();
            $table->decimal('latitude_masuk', 10, 8);
            $table->decimal('longitude_masuk', 11, 8);
            $table->decimal('latitude_pulang', 10, 8)->nullable();
            $table->decimal('longitude_pulang', 11, 8)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
