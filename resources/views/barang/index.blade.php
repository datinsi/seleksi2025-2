<h2>Tambah Barang</h2>
<form method="POST" action="/barang">
    @csrf
    Nama: <input type="text" name="nama"><br>
    Harga: <input type="number" name="harga"><br>
    Stok: <input type="number" name="jumlah_stok"><br>
    <button type="submit">Simpan</button>
</form>

<hr>

<h3>Data Barang</h3>
<ul>
@foreach($barangs as $barang)
    <li>{{ $barang->nama }} - {{ $barang->harga }} - Stok: {{ $barang->jumlah_stok }}</li>
@endforeach
</ul>

<a href="/pembelian">Ke Pembelian</a>
