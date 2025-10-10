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

// Buat database mydb
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
