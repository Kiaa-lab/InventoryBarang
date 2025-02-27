<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            flex-direction: column; /* Mengatur arah flex menjadi kolom */
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #000;
            color: #fff; /* Mengubah warna teks menjadi putih */
        }
        header {
            text-align: center;
            margin-bottom: 20px; /* Menambahkan jarak antara header dan konten */
        }
        nav {
            margin-top: 20px; /* Menambahkan jarak antara judul dan navbar */
        }
        nav ul {
            display: flex; /* Mengatur daftar untuk berjajar secara horizontal */
            list-style: none; /* Menghilangkan bullet points */
        }
        nav a {
            position: relative;
            font-size: 0.8rem; /* Mengubah ukuran font menjadi lebih kecil */
            font-weight: 500;
            color: #fff;
            opacity: 75%;
            text-decoration: none;
            padding: 6px 20px;
            transition: .5s;
        }
        nav a:hover {
            color: #0ef;
        }
        nav a span {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            border-bottom: 2px solid #0ef;
            border-radius: 15;
            transform: scale(0) translateY(50px);
            opacity: 0;
            transition: .5s;
        }
        nav a:hover span {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
        .content {
            text-align: justify;
            margin: 20px 0; /* Menambahkan jarak antara navbar dan konten */
        }
        .login-button {
            position: absolute; /* Mengatur posisi absolut untuk tombol login */
            top: 10px; /* Jarak dari atas */
            right: 20px; /* Jarak dari kanan */
            background-color: #0ef; /* Warna latar belakang tombol */
            color: #000; /* Warna teks tombol */
            padding: 8px 15px; /* Padding tombol */
            border: none; /* Menghilangkan border */
            border-radius: 5px; /* Membuat sudut tombol melengkung */
            cursor: pointer; /* Mengubah kursor saat hover */
            font-size: 0.8rem; /* Ukuran font tombol */
            transition: background-color 0.3s; /* Transisi untuk hover */
        }
        .login-button:hover {
            background-color: #0bc; /* Warna latar belakang saat hover */
        }
        footer {
            margin-top: auto; /* Memastikan footer berada di bawah */
            padding: 10px 0;
            text-align: center;
            background-color: #222; /* Warna latar belakang footer */
            width: 100%; /* Memastikan footer memenuhi lebar halaman */
        }
    </style>
</head>
<body>

    <header>
        <h1>Dashboard</h1>
        <a href="/login" class="login-button">Login<span></span></a>
        <nav>
            <ul class="list">
                <li><a href="/dashboard">Dashboard<span></span></a></li>
                <li><a href="/info">Info<span></span></a></li>
                <li><a href="/contact">Contact<span></span></a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <h2>SELAMAT DATANG</h2>
        <p>Website Peminjaman Barang RPL SMKN 4 Padalarang</p>
    </div>

    <footer>
        <p>&copy; 2025 Kianti. All rights reserved.</p>
    </footer>

</body>
</html>