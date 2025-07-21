<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
