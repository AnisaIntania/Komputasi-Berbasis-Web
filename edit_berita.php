<?php

// Aktifkan error reporting biar kelihatan kalau ada error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database
include "koneksi.php";

// --- Cek apakah ID dikirim lewat URL ---
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("<p style='color:red;'>Tidak ada ID berita yang dipilih.</p>");
}

$id_berita = intval($_GET['id']); // pastikan id berupa angka

// --- Ambil data berita berdasarkan ID ---
$stmt = $conn->prepare("SELECT * FROM berita WHERE id_berita = ?");
$stmt->bind_param("i", $id_berita);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("<p style='color:red;'>Data berita tidak ditemukan di database.</p>");
}

$berita = $result->fetch_assoc(); // simpan data berita lama
$stmt->close();

// --- Jika tombol "Edit Berita" diklik (POST) ---
if (isset($_POST['Edit'])) {
    $judul = trim($_POST['judul']);
    $kategori = intval($_POST['kategori']);
    $headline = trim($_POST['headline']);
    $isi = trim($_POST['isi']);
    $pengirim = trim($_POST['pengirim']);

    // Validasi sederhana
    if ($judul == "" || $headline == "" || $isi == "" || $pengirim == "") {
        echo "<p style='color:red;'>Semua kolom wajib diisi!</p>";
    } else {
        $update = $conn->prepare("
            UPDATE berita
            SET id_kategori=?, judul=?, headline=?, isi=?, pengirim=?
            WHERE id_berita=?
        ");
        $update->bind_param("issssi", $kategori, $judul, $headline, $isi, $pengirim, $id_berita);

        if ($update->execute()) {
            echo "<p style='color:blue;'><b>Berita berhasil diedit!</b></p>";
        } else {
            echo "<p style='color:red;'>Gagal mengedit berita: " . $conn->error . "</p>";
        }
        $update->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_berita.php">Arsip Berita</a> |
    <a href="input_berita.php">Input Berita</a>
    <br><br>

    <h2>Edit Berita</h2>

    <form method="post">
        <table cellpadding="5" cellspacing="0">
            <tr>
                <td>Judul Berita</td>
                <td>:</td>
                <td>
                    <input type="text" name="judul" size="50"
                        value="<?php echo htmlspecialchars($berita['judul']); ?>" required>
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>
                    <select name="kategori" required>
                        <?php
                        $kategori_sql = $conn->query("SELECT id_kategori, nm_kategori FROM kategori ORDER BY nm_kategori");
                        while ($row = $kategori_sql->fetch_assoc()) {
                            $selected = ($row['id_kategori'] == $berita['id_kategori']) ? "selected" : "";
                            echo "<option value='{$row['id_kategori']}' $selected>{$row['nm_kategori']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Headline Berita</td>
                <td>:</td>
                <td>
                    <textarea name="headline" cols="50" rows="3" required><?php
                        echo htmlspecialchars($berita['headline']);
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Isi Berita</td>
                <td>:</td>
                <td>
                    <textarea name="isi" cols="50" rows="8" required><?php
                        echo htmlspecialchars($berita['isi']);
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Pengirim</td>
                <td>:</td>
                <td>
                    <input type="text" name="pengirim" size="30"
                        value="<?php echo htmlspecialchars($berita['pengirim']); ?>" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" name="Edit" value="Edit Berita">
                    <input type="reset" value="Cancel">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
