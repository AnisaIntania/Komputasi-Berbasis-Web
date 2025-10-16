<?php include "koneksi.php"; ?>
<html>
<head>
<title>Arsip Berita</title>
<link rel="stylesheet" href="style.css">
<script>
function tanya() {
    return confirm("Apakah Anda yakin akan menghapus berita ini?");
}
</script>
</head>
<body>
<a href="index.php">Halaman Depan</a> |
<a href="arsip_berita.php">Arsip Berita</a> |
<a href="input_berita.php">Input Berita</a>
<h2>Arsip Berita</h2>

<ol>
<?php
// Menampilkan seluruh berita
$query = "SELECT A.id_berita, B.nm_kategori, A.judul, A.pengirim, A.tanggal
          FROM berita A JOIN kategori B ON A.id_kategori = B.id_kategori
          ORDER BY A.id_berita DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($hasil = $result->fetch_assoc()) {
        echo "<li><a href='berita_lengkap.php?id={$hasil['id_berita']}'>{$hasil['judul']}</a><br>
              <small>Oleh <b>{$hasil['pengirim']}</b> ({$hasil['tanggal']}) - {$hasil['nm_kategori']} |
              <a href='edit_berita.php?id={$hasil['id_berita']}'>Edit</a> |
              <a href='delete_berita.php?id={$hasil['id_berita']}' onClick='return tanya()'>Delete</a></small></li><br>";
    }
} else echo "<p>Belum ada berita.</p>";
$conn->close();
?>
</ol>
</body>
</html>
