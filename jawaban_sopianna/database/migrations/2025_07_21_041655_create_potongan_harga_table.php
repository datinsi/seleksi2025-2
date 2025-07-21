<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * id_potongan_harga (Primary Key, BIGINT, Auto Increment): Identifikasi unik untuk setiap aturan potongan.
     * nama_potongan (VARCHAR(100)): Nama potongan, misalnya "Diskon 50%".
     * persyaratan (INT): Nilai modulo (500, 100, atau 40).
     * persentase_diskon (DECIMAL(5,2)): Persentase diskon, misalnya 50.00 atau 10.00.
     * comments (TEXT): Keterangan tambahan tentang aturan potongan.
     */
    public function up(): void
    {
        Schema::create('potongan_harga', function (Blueprint $table) {
            $table->bigIncrements('id_potongan_harga');
            $table->string('nama_potongan', 100);
            $table->integer('persyaratan');
            $table->decimal('persentase_diskon', 5, 2);
            $table->text('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potongan_harga');
    }
};
