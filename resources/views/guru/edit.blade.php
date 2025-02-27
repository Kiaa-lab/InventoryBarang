<!DOCTYPE html>
<html>
<head>
    <title>Edit Guru</title>
</head>
<body>
    <h1>Edit Guru</h1>
    <form action="{{ route('guru.update', $guru->nip) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $guru->nama }}" required>
        <br>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="{{ $guru->alamat }}">
        <br>
        <label for="mata_pelajaran">Mata Pelajaran:</label>
        <input type="text" name="mata_pelajaran" value="{{ $guru->mata_pelajaran }}">
        <br>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="{{ $guru->tanggal_lahir }}">
        <br>
        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" value="{{ $guru->telepon }}">
        <br>
        <button type="submit">Perbarui</button>
    </form>
    <a href="{{ route('guru.index') }}">Kembali</a>
</body>
</html>