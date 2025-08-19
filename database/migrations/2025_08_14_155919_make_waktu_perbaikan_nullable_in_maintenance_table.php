<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk mengubah kolom.
     */
    public function up(): void
    {
        Schema::table('maintenance', function (Blueprint $table) {
            // Mengubah kolom menjadi tipe string (VARCHAR) dan boleh kosong (nullable)
            $table->string('waktu_perbaikan')->nullable()->change();
        });
    }

    /**
     * Mengembalikan migrasi jika diperlukan.
     */
    public function down(): void
    {
        Schema::table('maintenance', function (Blueprint $table) {
            // Mengembalikan kolom ke tipe time jika migrasi di-rollback
            $table->time('waktu_perbaikan')->nullable()->change();
        });
    }
};