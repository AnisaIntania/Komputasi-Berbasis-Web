<?php
include "koneksi.php";

// Cek apakah parameter id dikirim
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<p style='color:red;'>Error: Tidak ada ID berita yang dipilih.</p>";
    exit;
}

$id_berita = intval($_GET['id']); // ubah ke integer untuk keamanan

// Ambil berita berdasarkan ID
$query = "SELECT A.id_berita, B.nm_kategori, A.judul, A.isi, A.pengirim, A.tanggal
          FROM berita A
          JOIN kategori B ON A.id_kategori = B.id_kategori
          WHERE A.id_berita = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_berita);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Berita Lengkap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_berita.php">Arsip Berita</a> |
    <a href="input_berita.php">Input Berita</a>
    <br><br>

    <h2>Berita Lengkap</h2>

<?php
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $judul = htmlspecialchars($row['judul']);
    $isi = nl2br(htmlspecialchars($row['isi']));
    $pengirim = htmlspecialchars($row['pengirim']);
    $tanggal = htmlspecialchars($row['tanggal']);
    $kategori = htmlspecialchars($row['nm_kategori']);

    echo "<h3 style='color:blue;'>$judul</h3>";
    echo "<small>Dikirim oleh <b>$pengirim</b> pada <b>$tanggal</b> di kategori <b>$kategori</b></small>";
    echo "<p>$isi</p>";
} else {
    echo "<p>Berita tidak ditemukan di database.</p>";
}

$stmt->close();
$conn->close();
?>
</body>
</html>
