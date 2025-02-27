<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengembalian</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
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
        .btn-secondary {
            background-color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Pengembalian</h1>
        <form action="{{ route('pengembalian.update', $pengembalian->id_pengembalian) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_peminjaman">ID Peminjaman</ <input type="number" name="id_peminjaman" id="id_peminjaman" class="form-control" value="{{ $pengembalian->id_peminjaman }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ $pengembalian->tanggal_kembali }}" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $pengembalian->jumlah }}" required>
            </div>
            <div class="form-group">
                <label for="kondisi_barang">Kondisi Barang</label>
                <select name="kondisi_barang" id="kondisi_barang" class="form-control">
                    <option value="baik" {{ $pengembalian->kondisi_barang == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ $pengembalian->kondisi_barang == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>