<!-- resources/views/siswa/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
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
        <h1>Edit Siswa</h1>

        <form action="{{ route('siswa.update', $siswa->nisn) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah permintaan PUT untuk update -->
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" class="form-control" required>
                    <option value="X" {{ $siswa->kelas == 'X' ? 'selected' : '' }}>X</option>
                    <option value="XI" {{ $siswa->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                    <option value="XII" {{ $siswa->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select name="jurusan" class="form-control" required>
                    <option value="RPL" {{ $siswa->jurusan == 'RPL' ? 'selected' : '' }}>RPL</option>
                    <option value="TKJ" {{ $siswa->jurusan == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                    <option value="TKI" {{ $siswa->jurusan == 'TKI' ? 'selected' : '' }}>TKI</option>
                    <option value="TEI" {{ $siswa->jurusan == 'TEI' ? 'selected' : '' }}>TEI</option>
                    <option value="BR" {{ $siswa->jurusan == 'BR' ? 'selected' : '' }}>BR</option>
                    <option value="ATPH" {{ $siswa->jurusan == 'ATPH' ? 'selected' : '' }}>ATPH</option>
                    <option value="OR" {{ $siswa->jurusan == 'ORACLE' ? 'selected' : '' }}>ORACLE</option>
                    <option value="OR" {{ $siswa->jurusan == 'AXIOO' ? 'selected' : '' }}>AXIOO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $siswa->alamat }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>