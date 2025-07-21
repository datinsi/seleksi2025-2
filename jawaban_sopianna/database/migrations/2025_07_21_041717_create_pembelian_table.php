<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * id_pembelian (Primary Key, BIGINT, Auto Increment): Identifikasi unik untuk setiap transaksi.
    * id_barang (BIGINT, Foreign Key ke tabel barang): Menghubungkan pembelian dengan barang.
    * jumlah_pembelian (INT): Jumlah barang yang dibeli.
    * total_harga (DECIMAL(15,2)): Total harga setelah potongan (jika ada).
    * id_potongan_harga (BIGINT, Foreign Key ke tabel potongan_harga, nullable): Menyimpan ID potongan harga yang diterapkan (jika ada).
     */
    public function up(): void
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->bigIncrements('id_pembelian');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah_pembelian');
            $table->decimal('total_harga', 15, 2);
            $table->unsignedBigInteger('id_potongan_harga')->nullable();
            $table->timestamps();

            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade');
            $table->foreign('id_potongan_harga')->references('id_potongan_harga')->on('potongan_harga')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
