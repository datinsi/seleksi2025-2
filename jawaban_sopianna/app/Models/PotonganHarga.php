<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PotonganHarga extends Model
{
    protected $table = 'potongan_harga';
    protected $primaryKey = 'id_potongan_harga';
    protected $fillable = ['nama_potongan', 'persyaratan', 'persentase_diskon', 'comments'];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'id_potongan_harga', 'id_potongan_harga');
    }
}
