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
    Schema::create('produksi', function (Blueprint $table) {
        $table->id(); 
        $table->date('tanggal_lapor');
        $table->time('jam_lapor');
        $table->string('shift', 20);
        $table->string('nama_mesin');
        $table->string('plant', 100)->nullable();
        $table->string('nama_pelapor');
        $table->string('bagian_rusak')->nullable();
        $table->text('uraian_kerusakan');
        $table->timestamps(); 
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi');
    }
};
