<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Mengganti font menjadi lebih modern */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px; /* Menambahkan padding untuk memberi ruang di sisi */
            background: linear-gradient(145deg, #393E46 30%, #4D545C 50%, #EEEEEE 100%);
            background-size: 400% 400%;
            animation: gradientBackground 10s ease infinite;
        }

        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .card {
            background-color: white;
            padding: 40px; /* Menambah padding untuk memberi ruang lebih */
            border-radius: 20px; /* Membuat sudut lebih melengkung */
            border: 1px solid #D3D3D3; /* Warna border lebih soft */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); /* Shadow lebih lembut */
            text-align: center;
            width: 350px; /* Lebar card sedikit diperbesar */
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Animasi saat card dihover */
        }

        .card:hover {
            transform: translateY(-10px); /* Card akan naik sedikit saat dihover */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15); /* Shadow lebih jelas saat dihover */
        }

        .card h2 {
            margin-bottom: 25px; /* Tambah jarak antara judul dan tombol */
            font-size: 28px;
            color: #393E46; /* Menggunakan warna utama untuk judul */
        }

        .card button {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 10px; /* Membuat sudut tombol lebih membulat */
            background-color: #393E46;
            color: white;
            transition: background-color 0.3s, transform 0.3s;
        }

        .card button:hover {
            background-color: #515151; /* Warna lebih gelap saat hover */
            transform: translateY(-2px); /* Sedikit efek naik pada tombol */
        }

        .card button:focus {
            outline: none;
        }

        /* Responsive Styles */
        @media (max-width: 480px) {
            .card {
                padding: 20px; /* Mengurangi padding pada card di perangkat kecil */
                width: 100%; /* Mengubah lebar card menjadi 100% untuk perangkat kecil */
                max-width: 350px; /* Menetapkan lebar maksimum untuk card */
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Mengurangi efek bayangan pada card */
            }

            .card h2 {
                font-size: 24px; /* Menyesuaikan ukuran font judul */
            }

            .card button {
                padding: 10px; /* Mengurangi padding tombol */
                font-size: 14px; /* Menyesuaikan ukuran font tombol */
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Selamat Datang Di <br> Halaman Admin</h2>
    <button onclick="location.href='dashboard_soal.php'">Dashboard Soal</button>
    <button onclick="location.href='dashboard_siswa.php'">Data Siswa</button>
    <button onclick="location.href='view_ranking.php'">Lihat Score</button>
</div>

</body>
</html>
