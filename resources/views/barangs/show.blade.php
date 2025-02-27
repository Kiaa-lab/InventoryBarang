<!-- resources/views/barangs/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        /* Container */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        /* Heading */
        h1 {
            margin-bottom: 20px;
        }

        /* Card Styles */
        .card {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            background-color: white;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
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
        <h1>Detail Barang</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Barang: {{ $barang->nama_barang }}</h5>
                <p class="card-text"><strong>Kategori:</strong> {{ $barang->kategori }}</p>
                <p class="card-text"><strong>Stok:</strong> {{ $barang->stok }}</p>
                <p class="card-text"><strong>Kondisi:</strong> {{ $barang->kondisi }}</p>
                <p class="card-text"><strong>Deskripsi:</strong> {{ $barang->deskripsi }}</p>
                <p class="card-text"><strong>Dibuat pada:</strong> {{ $barang->created_at }}</p>
                <p class="card-text"><strong>Diperbarui pada:</strong> {{ $barang->updated_at }}</p>
            </div>
        </div>

        <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>