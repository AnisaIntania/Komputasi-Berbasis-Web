<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Index Berita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_berita.php">Arsip Berita</a> |
    <a href="input_berita.php">Input Berita</a>
    <br><br>

    <h2>Halaman Depan ~ Lima Berita Terbaru</h2>

<?php
// Ambil 5 berita terbaru
$query = "SELECT A.id_berita, B.nm_kategori, A.judul, A.headline, A.pengirim, A.tanggal
          FROM berita A
          JOIN kategori B ON A.id_kategori = B.id_kategori
          ORDER BY A.id_berita DESC
          LIMIT 5";
$result = mysqli_query($conn, $query);

// Jika ada berita
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_berita = $row['id_berita'];
        $judul = htmlspecialchars($row['judul']);
        $headline = nl2br(htmlspecialchars($row['headline']));
        $pengirim = htmlspecialchars($row['pengirim']);
        $tanggal = htmlspecialchars($row['tanggal']);
        $kategori = htmlspecialchars($row['nm_kategori']);

        // 🔥 Perhatikan bagian href ini, jangan sampai typo
        echo "<h3><a href='berita_lengkap.php?id=" . $id_berita . "'>$judul</a></h3>";
        echo "<small>Dikirim oleh <b>$pengirim</b> pada <b>$tanggal</b> di kategori <b>$kategori</b></small>";
        echo "<p>$headline</p><hr>";
    }
} else {
    echo "<p>Belum ada berita.</p>";
}

mysqli_close($conn);
?>
</body>
</html>
