<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $fillable = ['barang_id', 'jumlah_beli', 'total_harga', 'harga_akhir', 'comments'];

public function barang()
{
    return $this->belongsTo(Barang::class);
}

}
