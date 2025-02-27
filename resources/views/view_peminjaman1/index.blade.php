<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* CSS untuk tampilan */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .container {
            width: 80%;
            margin:0 0;
            padding: 20px;
        }
        .btn {
            padding: 10px 15px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .table {
            width: 120%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #e9ecef;
        }
        .btn-info {
            background-color: green;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        nav {
            margin-top: 20px; /* Menambahkan jarak antara judul dan navbar */
        }
        nav ul {
            display: flex; /* Mengatur daftar untuk berjajar secara horizontal */
            list-style: none; /* Menghilangkan bullet points */
        }
        nav a {
            position: relative;
            font-size: 0.8rem; /* Mengubah ukuran font menjadi lebih kecil */
            font-weight: 500;
            color: #000;
            opacity: 75%;
            text-decoration: none;
            padding: 6px 20px;
            transition: .5s;
        }
        nav a:hover {
            color: #0ef;
        }
        nav a span {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            border-bottom: 2px solid #0ef;
            border-radius: 15;
            transform: scale(0) translateY(50px);
            opacity: 0;
            transition: .5s;
        }
        nav a:hover span {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <ul class="list">
            <li><a href="/barangs">Barang<span></span></a></li>
            <li><a href="/siswa">Siswa<span></span></a></li>
            <li><a href="/peminjaman">Peminjaman<span></span></a></li>
            <li><a href="/pengembalian">Pengembalian<span></span></a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h1>Daftar Peminjaman</h1>
    
    <!-- Form Pencarian -->
    <form action="{{ route('peminjaman.index') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari peminjaman..." style="padding: 10px; width: 300px;">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Peminjaman</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Tanggal Pinjam</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamans as $peminjaman)
            <tr>
                    <td>{{ $peminjaman->id_peminjaman }}</td>
                    <td>{{ $peminjaman->id_barang }}</td>
                    <td>{{ $peminjaman->barang->nama_barang ?? 'Nama barang tidak ditemukan' }}</td>
                    <td>{{ $peminjaman->nisn }}</td> <!-- Menampilkan NISN -->
                    <td>{{ $peminjaman->siswa->nama ?? 'Nama tidak ditemukan' }}</td> <!-- Menampilkan nama siswa -->
                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                    <td>{{ $peminjaman->jumlah ?? 'Jumlah tidak ditemukan' }}</td>
                    <td>{{ $peminjaman->status ?? 'Status tidak ditemukan' }}</td>
                    <td>
                        <a href="{{ route('peminjaman.show', $peminjaman->id_peminjaman) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('peminjaman.edit', $peminjaman->id_peminjaman) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('peminjaman.destroy', $peminjaman->id_peminjaman) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>