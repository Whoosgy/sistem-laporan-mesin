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
        Schema::table('produksi', function (Blueprint $table) {
            // Kode kamu ditaruh di sini
            $table->foreignId('mesin_id')
                  ->nullable() 
                  ->constrained('mesins') // Ini yang bikin garis relasi
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produksi', function (Blueprint $table) {
            $table->dropForeign(['mesin_id']);
            $table->dropColumn('mesin_id');
        });
    }
};
