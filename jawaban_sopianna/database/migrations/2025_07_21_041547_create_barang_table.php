<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * id_barang (Primary Key) : Identifikasi unik untuk setiap barang.
     * nama (VARCHAR(255)): Nama barang, mendukung teks hingga 255 karakter.
     * harga (DECIMAL(15,2)): Harga barang, mendukung dua desimal untuk presisi mata uang.
     * jumlah_stok (INT): Jumlah stok barang, bilangan bulat.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id_barang');
            $table->string('nama', 255);
            $table->decimal('harga', 15, 2);
            $table->integer('jumlah_stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
