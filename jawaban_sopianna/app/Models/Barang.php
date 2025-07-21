<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// id_barang (Primary Key) : Identifikasi unik untuk setiap barang.
// nama (VARCHAR(255)): Nama barang, mendukung teks hingga 255 karakter.
// harga (DECIMAL(15,2)): Harga barang, mendukung dua desimal untuk presisi mata uang.
// jumlah_stok (INT): Jumlah stok barang, bilangan bulat.

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama', 'harga', 'jumlah_stok'];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'id_barang', 'id_barang');
    }
}
