<!DOCTYPE html>
<html>
<head>
    <title>Daftar Guru</title>
</head>
<body>
    <h1>Daftar Guru</h1>
    <a href="{{ route('guru.create') }}">Tambah Guru</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Mata Pelajaran</th>
            <th>Tanggal Lahir</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        @foreach($gurus as $guru)
        <tr>
            <td>{{ $guru->nip }}</td>
            <td>{{ $guru->nama }}</td>
            <td>{{ $guru->alamat }}</td>
            <td>{{ $guru->mata_pelajaran }}</td>
            <td>{{ $guru->tanggal_lahir }}</td>
            <td>{{ $guru->telepon }}</td>
            <td>
                <a href="{{ route('guru.show', $guru->nip) }}">Lihat</a>
                <a href="{{ route('guru.edit', $guru->nip) }}">Edit</a>
                <form action="{{ route('guru.destroy', $guru->nip) }}" method="POST" style="display:inline;">
                    @csrf
                    @ method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>