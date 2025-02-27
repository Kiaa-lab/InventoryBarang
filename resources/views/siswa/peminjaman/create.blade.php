<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Barang</title>
</head>
<body>
    <h1>Peminjaman Barang</h1>
    <form action="{{ route('siswa.peminjaman.store') }}" method="POST">
        @csrf
        <label for="id_barang">Pilih Barang:</label>
        <select name="id_barang" id="id_barang" required>
            @foreach($barangs as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
            @endforeach
        </select>

        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" min="1" required>

        <button type="submit">Pinjam</button>
    </form>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>
</html>