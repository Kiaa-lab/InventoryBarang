<!DOCTYPE html>
<html>
<head>
    <title>Detail Peminjaman</title>
    <style>
        /* Tambahkan CSS sesuai kebutuhan */
    </style>
</head>
<body>
    <h1>Detail Peminjaman</h1>
    <p><strong>ID Peminjaman:</strong> {{ $peminjaman->id }}</p>
    <p><strong>Nama Siswa:</strong> {{ $peminjaman->siswa->nama }}</p>
    <p><strong>Nama Barang:</strong> {{ $peminjaman->barang->nama_barang }}</p>
    <p><strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_pinjam }}</p>
    <p><strong>Jumlah:</strong> {{ $peminjaman->jumlah }}</p>
    <p><strong>Status:</strong> {{ $peminjaman->status }}</p>
    <!-- Tambahkan informasi lain yang diperlukan -->
</body>
</html>