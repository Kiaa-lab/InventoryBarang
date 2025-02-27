<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
</head>
<body>
    <h1>Daftar Peminjaman</h1>
    <table>
        <thead>
            <tr>
                <th>Barang</th>
                <th>Tanggal Pinjam</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $pinjam)
                <tr>
                    <td>{{ $pinjam->barang->nama }}</td>
                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                    <td>{{ $pinjam->jumlah }}</td>
                    <td>{{ $pinjam->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>