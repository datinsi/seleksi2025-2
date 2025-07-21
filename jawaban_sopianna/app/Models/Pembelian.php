<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// id_pembelian (Primary Key, BIGINT, Auto Increment): Identifikasi unik untuk setiap transaksi.
// id_barang (BIGINT, Foreign Key ke tabel barang): Menghubungkan pembelian dengan barang.
// jumlah_pembelian (INT): Jumlah barang yang dibeli.
// total_harga (DECIMAL(15,2)): Total harga setelah potongan (jika ada).
// id_potongan_harga (BIGINT, Foreign Key ke tabel potongan_harga, nullable): Menyimpan ID potongan harga yang diterapkan (jika ada).

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'id_pembelian';
    protected $fillable = ['id_barang', 'jumlah_pembelian', 'total_harga', 'id_potongan_harga'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function potonganHarga()
    {
        return $this->belongsTo(PotonganHarga::class, 'id_potongan_harga', 'id_potongan_harga');
    }
}
