<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('maintenance', function (Blueprint $table) {
            // Mengubah kolom menjadi boleh kosong (nullable)
            $table->string('nama_teknisi')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('maintenance', function (Blueprint $table) {
            // Mengembalikan ke kondisi semula (tidak boleh kosong)
            $table->string('nama_teknisi')->nullable(false)->change();
        });
    }
};