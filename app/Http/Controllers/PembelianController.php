<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pembelian;

class PembelianController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $pembelians = Pembelian::with('barang')->latest()->get();
        return view('pembelian.index', compact('barangs', 'pembelians'));
    }

    public function store(Request $request)
    {
        $barang = Barang::findOrFail($request->barang_id);
        $jumlah = $request->jumlah_beli;
        $total = $barang->harga * $jumlah;

        $diskon = 0;
        $comments = 'Tidak ada potongan harga';

        if ($jumlah % 500 == 0) {
            $diskon = 0.5;
            $comments = 'Diskon 50% karena jumlah habis dibagi 500';
        } elseif ($jumlah % 100 == 0) {
            $diskon = 0;
            $comments = 'Tidak ada diskon karena jumlah habis dibagi 100';
        } elseif ($jumlah % 40 == 0) {
            $diskon = 0.1;
            $comments = 'Diskon 10% karena jumlah habis dibagi 40';
        }

        $harga_akhir = $total - ($total * $diskon);

        Pembelian::create([
            'barang_id' => $barang->id,
            'jumlah_beli' => $jumlah,
            'total_harga' => $total,
            'harga_akhir' => $harga_akhir,
            'comments' => $comments
        ]);

        return redirect()->back()->with('success', 'Pembelian berhasil!');
    }
}
