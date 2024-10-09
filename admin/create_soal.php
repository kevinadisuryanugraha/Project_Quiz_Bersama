<?php
// Koneksi ke database SQLite
$db = new SQLite3('../quiz.sqlite');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Data soal yang di-submit
    $soal = $_POST['soal'];
    $jawaban_A = $_POST['jawaban_A'];
    $jawaban_B = $_POST['jawaban_B'];
    $jawaban_C = $_POST['jawaban_C'];
    $jawaban_D = $_POST['jawaban_D'];
    $jawaban_benar = $_POST['jawaban_benar'];

    // Validasi input
    if (empty($soal) || empty($jawaban_A) || empty($jawaban_B) || empty($jawaban_C) || empty($jawaban_D) || empty($jawaban_benar)) {
        die("Semua field harus diisi!");
    }

    // Insert ke dalam database
    $stmt = $db->prepare("INSERT INTO data_soal (soal, jawaban_A, jawaban_B, jawaban_C, jawaban_D, jawaban_benar) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindValue(1, $soal, SQLITE3_TEXT);
    $stmt->bindValue(2, $jawaban_A, SQLITE3_TEXT);
    $stmt->bindValue(3, $jawaban_B, SQLITE3_TEXT);
    $stmt->bindValue(4, $jawaban_C, SQLITE3_TEXT);
    $stmt->bindValue(5, $jawaban_D, SQLITE3_TEXT);
    $stmt->bindValue(6, $jawaban_benar, SQLITE3_TEXT);
    $stmt->execute();

    // Redirect ke halaman utama
    header('Location: dashboard_soal.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Soal</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Poppins;
        }

        body {
            background-color: #F7F7F7;
            color: #393E46;
        }

        .container {
            max-width: 30%;
            margin: auto;
            margin-top: 1rem;
            display: flex;
            background-color: #EEEEEE;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 0 10px grey;
        }

        .container h1 {
            margin-top: 20px;
        }

        .input-btn {
            border-radius: 5px;
            border: none;
            outline: none;
        }

        .form-card {
            width: 80%;
        }

        .form_group {
            margin-bottom: 1rem;
        }

        .form_group label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .form_group input,
        .form_group textarea {
            width: 100%;
            padding: 0.5rem;
        }

        .btn_submit {
            padding: 10px 20px;
            background-color: #393E46;
            color: #F7F7F7;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-weight: 700;
        }

        .form-card a {
            text-decoration: none;
            color: #393E46;
            font-weight: 700;
        }

        .card-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-btn a {
            font-size: 14px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                max-width: 90%;
            }
        }
        .form_group select {
    width: 100%;
    padding: 0.5rem;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
    appearance: none; /* Menghapus tanda panah default pada select di beberapa browser */
    -webkit-appearance: none; /* Untuk Safari */
    -moz-appearance: none; /* Untuk Firefox */
    background-color: #fff;
    font-family: inherit;
    cursor: pointer;
}

    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Soal</h1>
        <div class="form-card">
            <form action="create_soal.php" method="POST">
                <div class="form_group">
                    <label for="soal">Soal:</label>
                    <textarea name="soal" id="soal" rows="4" class="input-btn" required></textarea>
                </div>
                <div class="form_group">
                    <label for="jawaban_A">Jawaban A:</label>
                    <input type="text" name="jawaban_A" id="jawaban_A" class="input-btn" required>
                </div>
                <div class="form_group">
                    <label for="jawaban_B">Jawaban B:</label>
                    <input type="text" name="jawaban_B" id="jawaban_B" class="input-btn" required>
                </div>
                <div class="form_group">
                    <label for="jawaban_C">Jawaban C:</label>
                    <input type="text" name="jawaban_C" id="jawaban_C" class="input-btn" required>
                </div>
                <div class="form_group">
                    <label for="jawaban_D">Jawaban D:</label>
                    <input type="text" name="jawaban_D" id="jawaban_D" class="input-btn" required>
                </div>
                <div class="form_group">
    <label for="jawaban_benar">Jawaban Benar (A/B/C/D):</label>
    <select name="jawaban_benar" id="jawaban_benar" class="input-btn" required>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
    </select>
</div>


                <div class="card-btn">
                    <button type="submit" class="btn_submit">Tambah Soal</button>
                    <a href="dashboard_soal.php">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>