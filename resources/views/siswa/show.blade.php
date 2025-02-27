<!-- resources/views/siswa/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
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
        <h1>Detail Siswa</h1>

        <div class="card">
            <h5 class="card-title">Nama: {{ $siswa->nama }}</h5>
            <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
            <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
            <p><strong>Jurusan:</strong> {{ $siswa->jurusan }}</p>
            <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
        </div>

        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>