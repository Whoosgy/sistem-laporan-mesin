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
        Schema::table('maintenance', function (Blueprint $table) {
 
            $table->time('waktu_perbaikan')->nullable()->change();
            $table->time('waktu_selesai')->nullable()->change();
            $table->date('tanggal_selesai')->nullable()->change();
            $table->string('jenis_perbaikan')->nullable()->change();
            $table->string('sparepart')->nullable()->change();
            $table->string('keterangan_maintenance')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('maintenance', function (Blueprint $table) {

            $table->time('waktu_perbaikan')->nullable(false)->change();
            $table->time('waktu_selesai')->nullable(false)->change();
            $table->date('tanggal_selesai')->nullable(false)->change();
            $table->string('jenis_perbaikan')->nullable(false)->change();
            $table->string('sparepart')->nullable(false)->change();
            $table->string('keterangan_maintenance')->nullable(false)->change();
        });
    }
};