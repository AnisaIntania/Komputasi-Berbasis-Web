<?php
$host = "localhost:8111"; // Karena saya pakai port 8111
$user = "root";
$pass = "";
$db = "pw2";

// Buat koneksi ke server MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Conection failed: " . $conn->connect_error);
} 
?>