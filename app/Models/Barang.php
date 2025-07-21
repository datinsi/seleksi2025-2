<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'harga', 'jumlah_stok'];

public function pembelians()
{
    return $this->hasMany(Pembelian::class);
}

}
