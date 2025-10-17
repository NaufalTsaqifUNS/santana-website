<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('riwayat_perjalanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobil_id')->constrained('daftar_rental')->onDelete('cascade');
            $table->string('namaMobil');
            $table->string('namaLokasi');
            $table->string('fotoPerjalanan');
            $table->text('deskripsi_perjalanan')->nullable();
            $table->date('tanggal_perjalanan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_perjalanan');
    }
};