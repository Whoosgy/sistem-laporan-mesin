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
    // Ubah dari 'maintenances' menjadi 'maintenance'
    Schema::table('maintenance', function (Blueprint $table) {
        // 1. Hapus kolom lama
        $table->dropColumn('nama_teknisi');
        
        // 2. Tambah kolom baru (Foreign Key)
        $table->foreignId('technician_id')->nullable()->constrained('technicians')->onDelete('set null');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('maintenance', function (Blueprint $table) {
        $table->dropForeign(['technician_id']);
        $table->dropColumn('technician_id');
        $table->string('nama_teknisi')->nullable();
    });
}
};
