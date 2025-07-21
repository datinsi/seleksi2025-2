<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
