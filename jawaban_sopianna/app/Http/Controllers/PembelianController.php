<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PotonganHarga;
use App\Models\Pembelian;
use App\Models\Barang;

class PembelianController extends Controller
{
    public function hitungPotonganHarga(Request $request)
    {
        $request->validate([
            'jumlah_pembelian' => 'required|integer|min:1',
            'id_barang' => 'required|exists:barang,id_barang',
        ]);

        $jumlahPembelian = $request->input('jumlah_pembelian');
        $idBarang = $request->input('id_barang');

        $barang = Barang::find($idBarang);
        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        $harga = $barang->harga;
        $totalHarga = $harga * $jumlahPembelian;
        $potonganHargaId = null;
        $diskon = 0;

        if ($jumlahPembelian % 500 === 0) {
            $diskon = 50;
            $potonganHarga = PotonganHarga::where('persyaratan', 500)->first();
            $potonganHargaId = $potonganHarga ? $potonganHarga->id_potongan_harga : null;
            $totalHarga *= (1 - $diskon / 100);
        } elseif ($jumlahPembelian % 100 === 0) {
            $diskon = 0;
        } elseif ($jumlahPembelian % 40 === 0) {
            $diskon = 10;
            $potonganHarga = PotonganHarga::where('persyaratan', 40)->first();
            $potonganHargaId = $potonganHarga ? $potonganHarga->id_potongan_harga : null;
            $totalHarga *= (1 - $diskon / 100);
        }

        $pembelian = Pembelian::create([
            'id_barang' => $idBarang,
            'jumlah_pembelian' => $jumlahPembelian,
            'total_harga' => $totalHarga,
            'id_potongan_harga' => $potonganHargaId,
        ]);

        return response()->json([
            'message' => $diskon > 0 ? "Mendapat potongan harga $diskon%" : 'Tidak mendapat potongan harga',
            'total_harga' => $totalHarga,
            'pembelian' => $pembelian,
        ]);
    }
}
