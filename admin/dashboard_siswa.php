<?php
// Sertakan file koneksi ke database SQLite
$db = new SQLite3('../quiz.sqlite');

// Ambil data siswa dari database
$result = $db->query('SELECT * FROM data_siswa');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 1440px;
            width: 100%;
            background: #fff;
            box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
        }
        .container h2 {
            padding: 2rem 1rem;
            text-align: center;
            background: #393E46;
            color: #f7f7f7; 
            font-size: 1.5rem;
        }

        .btn-back-container {
            display: flex;
            margin: 20px;
        }
        .btn-back {
            color: #fff;
            background: #393E46;
            padding: 0.7rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 1rem 0;
            text-align: center;
            transition: background 0.3s;
        }
        .btn-back:hover {
            background: #474C52;
        }
        .tbl-wrapper {
            overflow-x: auto; /* Enable horizontal scrolling */
        }
        .tbl {
            width: 100%;
            border-collapse: collapse;
        }
        .tbl thead {
            background: #424949;
            color: #fff;
        }
        .tbl thead tr th {
            font-size: 21px;
            padding: 1.4rem;
            letter-spacing: 0.2rem;
            vertical-align: top;
            border: 1px solid #aab7b8;
        }
        .tbl tbody tr td {
            font-size: 1rem;
            letter-spacing: 0.2rem;
            font-weight: normal;
            text-align: center;
            border: 1px solid #aab7b8;
            padding: 1rem;
        }
        .tbl tr:nth-child(even) {
            background: #ccc;
            transition: all 0.3s ease-in;
            cursor: pointer;
        }
        .btn_trash {
            background: #e74c3c;
            color: #fff;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                margin: 0 10px;
            }
            .container h2 {
                font-size: 1.5rem;
            }
            .btn-back {
                padding: 0.5rem 1rem;
            }
            .tbl thead tr th {
                font-size: 1rem;
            }
            .tbl tbody tr td {
                font-size: 0.9rem;
                padding: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .btn-back {
                width: 100%; /* Full width button */
            }
            .tbl tbody tr td {
                font-size: 0.8rem; /* Smaller font size for small screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Siswa</h2>
        <div class="btn-back-container">
            <a href="index.php" class="btn-back">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="tbl-wrapper">
            <table class="tbl">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Nomor WA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($row = $result->fetchArray()): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['nomor']); ?></td>
                        <td>
                            <a href="delete_siswa.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                <button class="btn_trash"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
