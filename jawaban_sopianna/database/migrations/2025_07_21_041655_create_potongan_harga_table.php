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
