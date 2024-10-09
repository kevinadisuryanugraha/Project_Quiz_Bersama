<?php
// Koneksi ke database SQLite
$db = new SQLite3('../quiz.sqlite');

// Ambil ID siswa dari URL
$id = $_GET['id'];

// Hapus siswa dari database
$stmt = $db->prepare('DELETE FROM data_siswa WHERE id = ?');
$stmt->bindValue(1, $id, SQLITE3_INTEGER);
$stmt->execute();

// Redirect ke halaman utama setelah hapus
header('Location: dashboard_siswa.php');
exit();
?>
