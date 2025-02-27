<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengembalian</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
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
        <h1>Daftar Pengembalian</h1>
        <a href="{{ route('pengembalian.create') }}" class="btn btn-primary">Tambah Pengembalian</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID Pengembalian</th>
                    <th>ID Peminjaman</th>
                    <th>Tanggal Kembali</th>
                    <th>Jumlah</th>
                    <th>Kondisi Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengembalian as $item)
                    <tr>
                        <td>{{ $item->id_pengembalian }}</td>
                        <td>{{ $item->id_peminjaman }}</td>
                        <td>{{ $item->tanggal_kembali }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->kondisi_barang }}</td>
                        <td>
                            <a href="{{ route('pengembalian.show', $item->id_pengembalian) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('pengembalian.edit', $item->id_pengembalian) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pengembalian.destroy', $item->id_pengembalian) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengembalian ini?');">
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