<?php
$servername = "localhost:8111"; // saya pakai port 8111
$username = "root";
$password = ""; // kosong karena phpMyAdmin tidak minta password

// buat koneksi 
$conn = new mysqli($servername, $username, $password);

// cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
