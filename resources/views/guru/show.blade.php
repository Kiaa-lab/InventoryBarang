<!DOCTYPE html>
<html>
<head>
    <title>Detail Guru</title>
</head>
<body>
    <h1>Detail Guru</h1>
    <p><strong>NIP:</strong> {{ $guru->nip }}</p>
    <p><strong>Nama:</strong> {{ $guru->nama }}</p>
    <p><strong>Alamat:</strong> {{ $guru->alamat }}</p>
    <p><strong>Mata Pelajaran:</strong> {{ $guru->mata_pelajaran }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $guru->tanggal_lahir }}</p>
    <p><strong>Telepon:</strong> {{ $guru->telepon }}</p>
    <a href="{{ route('guru.index') }}">Kembali</a>
</body>
</html>