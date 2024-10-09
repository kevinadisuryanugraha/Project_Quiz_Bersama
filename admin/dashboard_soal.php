<?php
$db = new SQLite3('../quiz.sqlite');

$result = $db->query("SELECT * FROM data_soal");

if (!$result) {
    echo "Error dalam query: " . $db->lastErrorMsg();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS CRUD Soal</title>
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
        .btn_add_container {
            display: flex;
            justify-content: space-between; 
            margin: 20px;
            gap: 10px;
        }
        .btn_add {
            color: #fff;
            background: #393E46;
            padding: 0.7rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn_add:hover {
            background: #474C52;
        }
        .tbl-wrapper {
            overflow-x: auto; /* Enable horizontal scrolling */
        }
        .tbl {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        .tbl thead {
            background: #424949;
            color: #fff;
        }
        .tbl thead tr th {
            font-size: 1rem;
            padding: 1.4rem;
            letter-spacing: 0.2rem;
            border: 1px solid #aab7b8;
        }
        .tbl tbody tr:nth-child(odd) {
            background-color: #F7F7F7;
        }
        .tbl tbody tr:nth-child(even) {
            background-color: #EEEEEE; 
        }
        .tbl tbody tr td {
            font-size: 1rem;
            letter-spacing: 0.2rem;
            text-align: center;
            border: 1px solid #aab7b8;
            padding: 1rem;
        }
        .tbl td textarea {
            width: 100%;
            border: none;
            background: transparent;
            resize: none;
            text-align: left;
            font-size: 0.9rem;
        }
        .btn_trash {
            background: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 0.5rem;
            cursor: pointer;
        }
        .btn_edit {
            color: #fff;
            background: #1e8449;
            color: #fff;
            border-radius: 5px;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
        }

        /* New styles for action buttons */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                margin: 0 10px;
            }
            .container h2 {
                font-size: 1.2rem;
            }
            .tbl thead tr th {
                font-size: 0.9rem;
            }
            .tbl tbody tr td {
                font-size: 0.9rem;
                padding: 0.5rem;
            }
            .btn_add {
                padding: 0.5rem 1rem;
            }
        }

        @media (max-width: 480px) {
            .btn_add_container {
                flex-direction: column;
                align-items: stretch;
            }
            .btn_add {
                margin-bottom: 10px;
                width: 100%;
            }
            .tbl td textarea {
                font-size: 0.8rem;
            }
            .action-buttons {
                flex-direction: column; /* Ensure buttons stack vertically on small screens */
                gap: 0; /* Remove gap */
            }
            .action-buttons button {
                width: 100%; /* Full width for action buttons */
                margin: 5px 0; /* Add margin for spacing */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tbl_content">
            <h2>CMS CRUD admin</h2>
            <div class="btn_add_container">
                <a href="index.php">
                    <button class="btn_add">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </button>
                </a>
                <a href="create_soal.php">
                    <button class="btn_add">
                        <i class="fa-solid fa-plus"></i> Tambah Soal
                    </button>
                </a>
            </div>

            <div class="tbl-wrapper">
                <table class="tbl">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Soal</th>
                            <th>Opsi Jawaban</th>
                            <th>Kunci Jawaban</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = $result->fetchArray()): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><textarea readonly><?= htmlspecialchars($row['soal']); ?></textarea></td>
                            <td>
                                <textarea readonly>A. <?= htmlspecialchars($row['jawaban_A']); ?></textarea>
                                <textarea readonly>B. <?= htmlspecialchars($row['jawaban_B']); ?></textarea>
                                <textarea readonly>C. <?= htmlspecialchars($row['jawaban_C']); ?></textarea>
                                <textarea readonly>D. <?= htmlspecialchars($row['jawaban_D']); ?></textarea>
                            </td>
                            <td><?= htmlspecialchars($row['jawaban_benar']); ?></td>
                            <td colspan="2">
                                <div class="action-buttons">
                                    <a href="edit_soal.php?id=<?= $row['id']; ?>">
                                        <button class="btn_edit"><i class="fa fa-pencil"></i></button>
                                    </a>
                                    <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                        <button class="btn_trash"><i class="fa fa-trash"></i></button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
