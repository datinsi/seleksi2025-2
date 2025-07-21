<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    use App\Models\Barang;
use Illuminate\Http\Request;

public function index()
{
    $barangs = Barang::all();
    return view('barang.index', compact('barangs'));
}

public function store(Request $request)
{
    Barang::create($request->only('nama', 'harga', 'jumlah_stok'));
    return back()->with('success', 'Barang ditambahkan');
}

}
