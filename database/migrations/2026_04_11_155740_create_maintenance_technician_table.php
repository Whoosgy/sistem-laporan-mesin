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
    Schema::create('maintenance_technician', function (Blueprint $table) {
        $table->id();
        // Menghubungkan ke tabel maintenance
        $table->foreignId('maintenance_id')->constrained('maintenance')->onDelete('cascade');
        // Menghubungkan ke tabel technicians
        $table->foreignId('technician_id')->constrained('technicians')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_technician');
    }
};
