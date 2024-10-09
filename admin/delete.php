<?php
// Koneksi ke database SQLite
$db = new SQLite3('../quiz.sqlite');

// Ambil ID soal dari URL
$id = $_GET['id'];

// Hapus soal dari database berdasarkan ID
$stmt = $db->prepare('DELETE FROM data_soal WHERE id = ?');
$stmt->bindValue(1, $id, SQLITE3_INTEGER);
$stmt->execute();

// Redirect ke halaman utama setelah penghapusan
header('Location: dashboard_soal.php');
exit();
?>
