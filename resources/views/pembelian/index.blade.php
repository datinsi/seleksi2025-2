<!DOCTYPE html>
<html>
<head>
    <title>E-Katalog Pemerintah</title>
</head>
<body>
    <h1>E-Katalog Pemerintah</h1>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf
        <label for="barang_id">Pilih Barang:</label>
        <select name="barang_id" required>
            @foreach ($barangs as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama }} - Rp{{ $barang->harga }}</option>
            @endforeach
        </select><br><br>

        <label for="jumlah_beli">Jumlah Beli:</label>
        <input type="number" name="jumlah_beli" min="1" required><br><br>

        <button type="submit">Beli</button>
    </form>

    <h2>Daftar Pembelian</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Harga Akhir</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelians as $p)
                <tr>
                    <td>{{ $p->barang->nama }}</td>
                    <td>{{ $p->jumlah_beli }}</td>
                    <td>Rp{{ number_format($p->total_harga) }}</td>
                    <td>Rp{{ number_format($p->harga_akhir) }}</td>
                    <td>{{ $p->comments }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
