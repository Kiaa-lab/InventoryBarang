<!DOCTYPE html>
<html>
<head>
    <title>Tambah Guru</title>
</head>
<body>
    <h1>Tambah Guru</h1>
    <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        <label for="nip">NIP:</label>
        <input type="text" name="nip" required>
        <br>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <br>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat">
        <br>
        <label for="mata_pelajaran">Mata Pelajaran:</label>
        <input type="text" name="mata_pelajaran">
        <br>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir">
        <br>
        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon">
        <br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('guru.index') }}">Kembali</a>
</body>
</html>