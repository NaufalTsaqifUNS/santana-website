<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daftar_rental', function (Blueprint $table) {
            $table->id();
            $table->string('namaMobil');
            $table->string('fotoMobil');
            $table->text('deskripsiMobil');
            $table->decimal('hargaMobil', 12, 2);
            $table->enum('jenisMobil', ['MPV', 'Luxury MPV', 'SUV', 'Van', 'Sedan', 'Minibus', 'Bus']);
            $table->integer('seat');
            $table->enum('jenisBahanBakar', ['Bensin', 'Solar', 'Listrik', 'Hybrid']);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daftar_rental');
    }
};