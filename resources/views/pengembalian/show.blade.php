<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengembalian</title>
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
        .card {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            background-color: white;
            margin-top: 20px;
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
        .btn-secondary {
            background-color: #6c757d;
        }
        </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pengembalian</h1>
        <table class="table">
            <tr>
                <th>ID Pengembalian</th>
                <td>{{ $pengembalian->id_pengembalian }}</td>
            </tr>
            <tr>
                <th>ID Peminjaman</th>
                <td>{{ $pengembalian->id_peminjaman }}</td>
            </tr>
            <tr>
                <th>Tanggal Kembali</th>
                <td>{{ $pengembalian->tanggal_kembali }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $pengembalian->jumlah }}</td>
            </tr>
            <tr>
                <th>Kondisi Barang</th>
                <td>{{ $pengembalian->kondisi_barang }}</td>
            </tr>
        </table>
        <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>