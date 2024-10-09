<?php

$db = new SQLite3('../quiz.sqlite');


$total_benar = 0;

foreach ($_POST as $key => $value) {
    if (strpos($key, 'jawaban') === 0) {
        $id = str_replace('jawaban', '', $key);
        $correct = $_POST['benar' . $id];
        if ($value == $correct) {
            $total_benar++;
        }
    }
}


$nama = $_POST['nama'];
$nomor = $_POST['nomor'];


$db->query("UPDATE data_siswa SET hasil = '$total_benar' WHERE nama = '$nama' AND nomor = '$nomor'");


$result = $db->query("SELECT * FROM data_siswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #37b7c3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #71c9ce;
            color: white;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border: 5px solid white; 
        }
        .result {
            font-size: 24px;
            color: white;
        }
        .score {
            font-size: 40px;
            margin: 20px 0;
            color: white;
        }
        .button {
            background-color: white;
            color: #37b7c3;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #ebf4f6;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Hasil Quiz</h2>
    <div class="result">
        Anda berhasil menjawab <span class="score"><?php echo $total_benar; ?></span> dengan benar, dari 10 soal.
    </div>
    <button class="button" onclick="window.location.href='index.php'">Kembali ke Beranda</button>
</div>

</body>
</html>
