<?php
$db = new SQLite3('../quiz.sqlite');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Quiz</title>
    <style>
        body {
            font-family: 'Comic Sans MS', sans-serif;
            background-color: #37b7c3;
            background-image: radial-gradient(#ebf4f6 2px, transparent 2px), radial-gradient(#ebf4f6 2px, transparent 2px);
            background-size: 61px 61px;
            background-position: 0 0, 30.5px 30.5px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #71c9ce;
            width: 600px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border: 5px solid white; 
        }
        
        h1 {
            font-size: 32px;
            color: white;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            color: white;
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid white;
        }

        th {
            background-color: #5FA9B8;
        }

        .back-link {
            background-color: white;
            color: #37b7c3;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ranking Quiz</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Mengambil data siswa dan mengurutkan berdasarkan hasil
                $result = $db->query("SELECT nama, nomor, hasil FROM data_siswa WHERE hasil IS NOT NULL AND hasil >= 0 ORDER BY hasil DESC");

                $scores = []; // Untuk menyimpan hasil
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    $scores[] = [
                        'nama' => htmlspecialchars($row['nama']),
                        'nomor' => htmlspecialchars($row['nomor']),
                        'hasil' => (int)$row['hasil'] // Ubah ke integer
                    ];
                }

                // Hitung nomor berdasarkan hasil
                $currentRank = 1;
                $scoreGroups = [];

                foreach ($scores as $score) {
                    if (!isset($scoreGroups[$score['hasil']])) {
                        $scoreGroups[$score['hasil']] = [
                            'names' => [],
                            'nomor' => $score['nomor'] // Ambil nomor untuk ditampilkan
                        ];
                    }
                    $scoreGroups[$score['hasil']]['names'][] = $score['nama'];
                }

                // Urutkan berdasarkan skor tertinggi
                krsort($scoreGroups); // Mengurutkan dari yang tertinggi

                // Menampilkan hasil
                foreach ($scoreGroups as $score => $data) {
                    echo "<tr>";
                    echo "<td>" . $currentRank . "</td>";
                    echo "<td>" . implode(', ', $data['names']) . "</td>";
                    echo "<td>" . $data['nomor'] . "</td>";
                    echo "<td>" . $score . "</td>"; // Skor berdasarkan hasil
                    echo "</tr>";
                    $currentRank++; // Update nomor urut untuk selanjutnya
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="back-link">Kembali</a>
    </div>
</body>
</html>
