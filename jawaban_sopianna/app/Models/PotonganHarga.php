<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// id_potongan_harga (Primary Key, BIGINT, Auto Increment): Identifikasi unik untuk setiap aturan potongan.
// nama_potongan (VARCHAR(100)): Nama potongan, misalnya "Diskon 50%".
// persyaratan (INT): Nilai modulo (500, 100, atau 40).
// persentase_diskon (DECIMAL(5,2)): Persentase diskon, misalnya 50.00 atau 10.00.
// comments (TEXT): Keterangan tambahan tentang aturan potongan.

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
