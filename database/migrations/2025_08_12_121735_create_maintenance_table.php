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
    Schema::create('maintenance', function (Blueprint $table) {
        $table->id();
        $table->foreignId('produksi_id')->constrained('produksi')->onDelete('cascade');
        $table->time('waktu_perbaikan');
        $table->time('waktu_selesai')->nullable();
        $table->date('tanggal_selesai')->nullable();
        $table->string('nama_teknisi');
        $table->string('jenis_perbaikan', 100)->nullable();
        $table->text('sparepart');
        $table->text('keterangan');
        $table->text('keterangan_maintenance')->nullable();
        $table->string('status', 50)->default('Selesai');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance');
    }
};
