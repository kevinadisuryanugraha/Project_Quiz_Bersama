<?php
$db = new SQLite3('../quiz.sqlite');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Quiz</title>
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
            max-width: 800px;
            width: 100%;
            background: #fff;
            box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            overflow: hidden;
        }

        .container h1 {
            padding: 2rem 1rem;
            text-align: center;
            background: #393E46;
            color: #f7f7f7; 
            font-size: 1.5rem;
        }

        .ranking {
            padding: 10px;
            max-height: 400px;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem;
            text-align: center;
            border: 1px solid #aab7b8;
        }

        th {
            background-color: #424949;
            color: white;
            font-size: 1.2rem;
        }

        tr:nth-child(even) {
            background-color: #ccc;
        }

        td {
            font-size: 1rem;
            color: #000;
        }

        .back-link {
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

        .back-link:hover {
            background: #474C52;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ranking Quiz</h1>
        <div class="ranking">
        <a href="index.php" class="back-link"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
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
                    $result = $db->query("SELECT nama, nomor, hasil FROM data_siswa ORDER BY hasil DESC, id ASC");
                    $no = 1;
                    while ($row = $result->fetchArray()): ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td><?php echo htmlspecialchars($row['nomor']); ?></td>
                            <td><?php echo htmlspecialchars($row['hasil']); ?></td>
                        </tr>
                    <?php
                        $no++;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
