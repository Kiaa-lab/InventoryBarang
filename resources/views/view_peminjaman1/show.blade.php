<!-- resources/views/view_peminjaman1/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peminjaman</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* CSS untuk tampilan */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            background-color: #007bff;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .detail {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Peminjaman</h1>

        <div class="detail">
            <strong>ID Peminjaman:</strong> {{ $peminjaman->id_peminjaman }}
        </div>
        <div class="detail">
            <strong>ID Barang:</strong> {{ $peminjaman->id_barang }}
        </div>
        <div class="detail">
            <strong>Nama Barang:</strong> {{ $peminjaman->barang->nama_barang ?? 'Nama tidak ditemukan' }}
        </div>
        <div class="detail">
            <strong>NISN:</strong> {{ $peminjaman->nisn }}
        </div>
        <div class="detail">
            <strong>Nama Siswa:</strong> {{ $peminjaman->siswa->nama ?? 'Nama tidak ditemukan' }}
        </div>
        <div class="detail">
            <strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_pinjam }}
        </div>
        <div class="detail">
            <strong>Jumlah:</strong> {{ $peminjaman->jumlah }}
        </div>
        <div class="detail">
            <strong>Status:</strong> {{ $peminjaman->status }}
        </div>

        <div class="detail">
            <strong>Pencatat:</strong> {{ $peminjaman->guru->nama }}
        </div>

        <div class="text-center">
            <a href="{{ route('peminjaman.edit', $peminjaman->id_peminjaman) }}" class="btn">Edit</a>
            <a href="{{ route('peminjaman.index') }}" class="btn">Kembali</a>
        </div>
    </div>
</body>
</html>