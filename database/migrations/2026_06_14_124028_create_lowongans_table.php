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
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin', 1); // 'L' atau 'P'
            $table->text('alamat_domisili')->nullable();
            
            // Relasi ke tabel lowongan
            $table->unsignedBigInteger('lowongan_id')->nullable();
            
            // Status verifikasi dokumen
            $table->boolean('is_verified')->default(false);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelamar');
    }
};
